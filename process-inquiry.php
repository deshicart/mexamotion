<?php
/**
 * Mexa Motion — inquiry processing
 * ---------------------------------------------------------------------------
 * Server-side validation for the Book Now form. On success the inquiry is
 * placed in the session and the visitor is redirected to thank-you.php, which
 * builds the WhatsApp / email hand-off links.
 *
 * Version 1 has no database and no admin panel, so the inquiry is only
 * delivered when the visitor sends the prepared message themselves.
 *
 * @package MexaMotion
 */

require_once __DIR__ . '/includes/validation.php';

if (($_SERVER['REQUEST_METHOD'] ?? '') !== 'POST') {
    mm_redirect('book-now.php');
}

mm_session_start();

$errors    = [];
$old       = [];
$startStep = 4;
$failed    = function ($message, $step = 4) use (&$errors, &$old, &$startStep) {
    $_SESSION['mm_errors']    = $errors;
    $_SESSION['mm_old']       = $old;
    $_SESSION['mm_step']      = $step;
    $_SESSION['mm_form_error'] = $message;
    mm_redirect('book-now.php');
};

/* ---------------------------------------------------------------------------
 * 1. Security checks
 * ------------------------------------------------------------------------ */

if (!mm_form_token($_POST['mm_token'] ?? null)) {
    $failed('Your session expired before the form was sent. Please try again.', 1);
}

$spamError = mm_error_spam($_POST, (int) ($_POST['mm_started'] ?? 0));
if ($spamError !== '') {
    $failed($spamError, 1);
}

if (!mm_rate_limit_ok(mm_client_ip(), (int) mm_config('security.max_per_hour', 8))) {
    $failed('You have sent several inquiries recently. Please wait a little while before sending another.', 1);
}

/* ---------------------------------------------------------------------------
 * 2. Read and clean the submitted fields
 * ------------------------------------------------------------------------ */

$serviceLabelMap = ['other' => 'Other / Custom Project'];
foreach (mm_services() as $service) {
    $serviceLabelMap[$service['slug']] = $service['title'];
}

$old['service']         = mm_clean($_POST['service'] ?? '', 40);
$old['project_title']   = mm_clean($_POST['project_title'] ?? '', 120);
$old['platform']        = mm_clean($_POST['platform'] ?? '', 60);
$old['description']     = mm_clean($_POST['description'] ?? '', 1200);
$old['budget']          = mm_clean($_POST['budget'] ?? '', 60);
$old['deadline']        = mm_clean($_POST['deadline'] ?? '', 60);
$old['full_name']       = mm_clean($_POST['full_name'] ?? '', 80);
$old['phone']           = mm_clean($_POST['phone'] ?? '', 24);
$old['email']           = mm_clean($_POST['email'] ?? '', 120);
$old['contact_method']  = mm_clean($_POST['contact_method'] ?? '', 20);

/* ---------------------------------------------------------------------------
 * 3. Validate
 * ------------------------------------------------------------------------ */

$options = mm_data('form_options');

$serviceSlugs   = $options['services'];
$methodValues   = array_keys($options['contact_methods']);

$error = mm_error_choice($old['service'], $serviceSlugs);
if ($error !== '') { $errors['service'] = $error; $startStep = 1; }

$error = mm_error_text($old['description'], 20, 1200);
if ($error !== '') { $errors['description'] = $error; $startStep = min($startStep ?: 4, 2); }

if ($old['platform'] !== '') {
    $platforms = array_merge($options['platforms'], ['Other']);
    $error = mm_error_choice($old['platform'], $platforms);
    if ($error !== '') { $errors['platform'] = $error; $startStep = min($startStep ?: 4, 2); }
}
if ($old['budget'] !== '') {
    $error = mm_error_choice($old['budget'], $options['budgets']);
    if ($error !== '') { $errors['budget'] = $error; $startStep = min($startStep ?: 4, 2); }
}
if ($old['deadline'] !== '') {
    $error = mm_error_choice($old['deadline'], $options['deadlines']);
    if ($error !== '') { $errors['deadline'] = $error; $startStep = min($startStep ?: 4, 2); }
}

$error = mm_error_text($old['full_name'], 2, 80);
if ($error !== '') { $errors['full_name'] = $error; $startStep = min($startStep ?: 4, 3); }

$error = mm_error_phone($old['phone']);
if ($error !== '') { $errors['phone'] = $error; $startStep = min($startStep ?: 4, 3); }

$error = mm_error_email($old['email']);
if ($error !== '') { $errors['email'] = $error; $startStep = min($startStep ?: 4, 3); }

$error = mm_error_choice($old['contact_method'], $methodValues);
if ($error !== '') { $errors['contact_method'] = $error; $startStep = min($startStep ?: 4, 3); }

if (empty($_POST['consent'])) {
    $errors['consent'] = 'Please confirm the privacy notice before submitting.';
    $startStep = 4;
}

if (!empty($errors)) {
    $_SESSION['mm_errors']     = $errors;
    $_SESSION['mm_old']        = $old;
    $_SESSION['mm_step']       = $startStep;
    $_SESSION['mm_form_error'] = 'Please check the highlighted fields. Nothing has been sent yet.';
    mm_redirect('book-now.php');
}

/* ---------------------------------------------------------------------------
 * 4. Store for the confirmation step (session only, never in the URL)
 * ------------------------------------------------------------------------ */

$_SESSION['mm_inquiry'] = [
    'service'        => $old['service'],
    'service_label'  => $serviceLabelMap[$old['service']] ?? $old['service'],
    'project_title'  => $old['project_title'],
    'platform'       => $old['platform'],
    'description'    => $old['description'],
    'budget'         => $old['budget'],
    'deadline'       => $old['deadline'],
    'full_name'      => $old['full_name'],
    'phone'          => $old['phone'],
    'email'          => $old['email'],
    'contact_method' => $old['contact_method'],
    'created_at'     => time(),
    'reference'      => strtoupper(bin2hex(random_bytes(3))),
];

unset($_SESSION['mm_errors'], $_SESSION['mm_old'], $_SESSION['mm_step'], $_SESSION['mm_form_error']);

mm_redirect('thank-you.php');