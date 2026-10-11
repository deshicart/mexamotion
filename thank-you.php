<?php
/**
 * Mexa Motion — inquiry confirmation
 * ---------------------------------------------------------------------------
 * Version 1 has no database and no admin panel, so this page does NOT claim
 * that an inquiry has been received. It shows the details the visitor entered
 * and gives them a prepared WhatsApp message (or an email draft) to send.
 *
 * @package MexaMotion
 */

require_once __DIR__ . '/includes/validation.php';

$page_meta = [
    'title'       => 'Thank You — Inquiry Prepared | Mexa Motion',
    'description' => 'Your Mexa Motion project inquiry has been prepared. Send it to our team using your preferred contact method.',
    'path'        => 'thank-you.php',
    'og'          => 'assets/images/brand/logo-square.png',
    'noindex'     => true,
];

$page_nav   = 'book';
$body_class = 'page-thankyou';

mm_session_start();

$inquiry = isset($_SESSION['mm_inquiry']) ? $_SESSION['mm_inquiry'] : null;

// The prepared message is only needed once — clear it after reading.
unset($_SESSION['mm_inquiry']);

$primary = (string) mm_config('inquiry.primary', 'whatsapp');
$isReal  = !mm_config('contact.is_placeholder');

$messageLines = [];
if ($inquiry) {
    $messageLines[] = 'Hello Mexa Motion, I would like to submit a project inquiry.';
    $messageLines[] = '';
    $messageLines[] = 'Reference: ' . $inquiry['reference'];
    $messageLines[] = 'Service: ' . $inquiry['service_label'];
    if ($inquiry['project_title'] !== '') {
        $messageLines[] = 'Project: ' . $inquiry['project_title'];
    }
    if ($inquiry['platform'] !== '') {
        $messageLines[] = 'Platform / intended use: ' . $inquiry['platform'];
    }
    $messageLines[] = '';
    $messageLines[] = 'Project description:';
    $messageLines[] = $inquiry['description'];
    $messageLines[] = '';
    if ($inquiry['budget'] !== '') {
        $messageLines[] = 'Estimated budget: ' . $inquiry['budget'];
    }
    if ($inquiry['deadline'] !== '') {
        $messageLines[] = 'Desired deadline: ' . $inquiry['deadline'];
    }
    $messageLines[] = '';
    $messageLines[] = 'My details:';
    $messageLines[] = 'Name: ' . $inquiry['full_name'];
    $messageLines[] = 'Phone / WhatsApp: ' . $inquiry['phone'];
    if ($inquiry['email'] !== '') {
        $messageLines[] = 'Email: ' . $inquiry['email'];
    }
    $messageLines[] = 'Preferred contact method: ' . ($inquiry['contact_method'] ?? '');
    $messageLines[] = '';
    $messageLines[] = 'Sent from the Mexa Motion website inquiry form.';
}
$message = implode("\n", $messageLines);

$waLink = $inquiry ? mm_whatsapp_link($message) : '';
$mailSubject = $inquiry ? 'Project inquiry ' . $inquiry['reference'] . ' — ' . $inquiry['service_label'] : '';
$mailBody = rawurlencode($message);

require __DIR__ . '/includes/header.php';
?>

<section class="section">
    <div class="container">
        <div style="max-width:46rem;margin-inline:auto">

            <?php if ($inquiry) : ?>

            <div class="book-card" data-reveal="ok">
                <div class="success-panel">
                    <span class="success-panel__icon" aria-hidden="true"><?= mm_icon('check', 34) ?></span>

                    <h1 class="success-panel__title">Thank you for contacting Mexa Motion!</h1>

                    <p class="success-panel__text">
                        Your project inquiry has been prepared. Please use the contact option provided to
                        send your details to our team.
                    </p>

                    <p class="notice notice--info" style="margin-top:1.5rem;text-align:left">
                        <?= mm_icon('shield', 18) ?>
                        <span>
                            <strong>Your inquiry is not yet with us.</strong> This website has no database
                            and no admin panel. Press the button below, then send the prepared message in
                            WhatsApp so it actually reaches the team.
                        </span>
                    </p>

                    <?php if (!$isReal) : ?>
                    <p class="notice notice--warn" style="margin-top:.85rem;text-align:left">
                        <?= mm_icon('shield', 18) ?>
                        <span>
                            <strong>Development build.</strong> The contact number below is a placeholder,
                            so this message would not reach a real inbox yet.
                        </span>
                    </p>
                    <?php endif; ?>

                    <div class="success-actions">
                        <?php if ($primary === 'whatsapp' || !empty($waLink)) : ?>
                        <a class="wa-button" href="<?= e($waLink) ?>" target="_blank" rel="noopener noreferrer">
                            <?= mm_icon('whatsapp', 20) ?> Send via WhatsApp
                        </a>
                        <?php endif; ?>

                        <a class="btn btn--primary btn--lg" href="mailto:<?= e(mm_config('contact.email')) ?>?subject=<?= e($mailSubject) ?>&body=<?= e($mailBody) ?>">
                            <?= mm_icon('mail', 18) ?> Send by email
                        </a>

                        <a class="btn btn--outline btn--lg" href="book-now.php">Edit and resubmit</a>
                    </div>

                    <p class="field__hint" style="margin-top:1rem">
                        Reference <strong><?= e($inquiry['reference']) ?></strong> &mdash;
                        quote this if you need to follow up.
                    </p>

                    <details class="preview-box">
                        <summary class="preview-box__head" style="cursor:pointer">
                            Preview the message that will be prepared for you
                        </summary>
                        <pre><?= e($message) ?></pre>
                    </details>
                </div>
            </div>

            <div class="aside-card" style="margin-top:1.25rem" data-reveal="ok">
                <h2 class="aside-card__title">What happens next</h2>
                <ul>
                    <li><?= mm_icon('chat', 16) ?><span>Once your message is sent, we read the brief and check it against the services we offer.</span></li>
                    <li><?= mm_icon('clipboard', 16) ?><span>We reply with any scope questions, our approach, and an estimate for that project.</span></li>
                    <li><?= mm_icon('check', 16) ?><span>Nothing is booked until both sides agree the scope and terms in writing.</span></li>
                </ul>
            </div>

            <?php else : ?>

            <div class="book-card">
                <div class="success-panel">
                    <span class="success-panel__icon" aria-hidden="true"><?= mm_icon('mail', 32) ?></span>
                    <h1 class="success-panel__title">No recent inquiry found</h1>
                    <p class="success-panel__text">
                        There is no prepared project inquiry on this device. Start a new one and we will
                        prepare the message for you.
                    </p>
                    <div class="success-actions">
                        <a class="btn btn--primary btn--lg" href="book-now.php">
                            Start a project inquiry <?= mm_icon('arrow-right', 18) ?>
                        </a>
                        <a class="btn btn--outline btn--lg" href="services.php">Explore services</a>
                    </div>
                </div>
            </div>

            <?php endif; ?>

        </div>
    </div>
</section>

<?php
$cta_title   = 'Prefer to send it another way?';
$cta_text    = 'You can message us directly on WhatsApp or by email at any time.';
$cta_variant = 'light';
require __DIR__ . '/includes/cta-banner.php';
?>

<?php require __DIR__ . '/includes/footer.php'; ?>