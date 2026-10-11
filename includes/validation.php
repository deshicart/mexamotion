<?php
/**
 * Mexa Motion — shared input validation helpers
 * ---------------------------------------------------------------------------
 * Server-side validation for the project inquiry form.
 * All values are treated as untrusted input: stripped, length-limited and
 * escaped on output.
 *
 * @package MexaMotion
 */

if (!defined('MM_ABSPATH')) {
    require_once __DIR__ . '/functions.php';
}

/**
 * Start the session used for CSRF tokens and inquiry hand-off.
 * Safe to call more than once.
 *
 * @return void
 */
function mm_session_start()
{
    if (session_status() === PHP_SESSION_ACTIVE) {
        return;
    }

    // Use secure cookie parameters whenever the site is served over HTTPS.
    $secure = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off');

    session_set_cookie_params(array(
        'lifetime' => 0,
        'path'     => '/',
        'secure'   => $secure,
        'httponly' => true,
        'samesite' => 'Lax',
    ));

    session_start();
}

/**
 * Normalise submitted text.
 *
 * Removes control characters, collapses whitespace and enforces a maximum
 * length. HTML is NOT sanitised away here — output escaping handles that, and
 * stripping tags would silently mangle legitimate content.
 *
 * @param mixed $value
 * @param int   $maxLength
 * @return string
 */
function mm_clean($value, $maxLength = 500)
{
    if (!is_scalar($value)) {
        return '';
    }

    $value = (string) $value;
    $value = str_replace(array("\0", "\x1B"), '', $value);
    $value = preg_replace('/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F]/u', '', $value);
    $value = preg_replace('/\r\n|\r|\n/u', "\n", $value);
    $value = preg_replace('/[ \t]+/u', ' ', $value);
    $value = trim($value);

    if (function_exists('mb_substr')) {
        return mb_substr($value, 0, $maxLength, 'UTF-8');
    }

    return substr($value, 0, $maxLength);
}

/**
 * Validate a required text field.
 *
 * @param string $value
 * @param int    $min
 * @param int    $max
 * @return string  Error message, or an empty string when valid.
 */
function mm_error_text($value, $min = 1, $max = 500)
{
    $length = function_exists('mb_strlen') ? mb_strlen($value, 'UTF-8') : strlen($value);

    if ($length < $min) {
        return 'Please complete this field.';
    }

    if ($length > $max) {
        return 'Please keep this under ' . $max . ' characters.';
    }

    return '';
}

/**
 * Validate an optional email address.
 *
 * @param string $email
 * @return string Error message, or an empty string when valid.
 */
function mm_error_email($email)
{
    if ($email === '') {
        return '';
    }

    if (strlen($email) > 254 || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return 'Please enter a valid email address, or leave this field empty.';
    }

    return '';
}

/**
 * Validate a phone / WhatsApp number without assuming one country format.
 *
 * @param string $phone
 * @return string Error message, or an empty string when valid.
 */
function mm_error_phone($phone)
{
    if ($phone === '') {
        return 'A phone or WhatsApp number is required so we can reply.';
    }

    $stripped = preg_replace('/[^0-9]/', '', $phone);
    $length   = strlen($stripped);

    if ($length < 6 || $length > 15) {
        return 'Please enter a valid phone number including the country code (for example +8801XXXXXXXXX).';
    }

    if (!preg_match('/^[0-9+()\-.\s]+$/', $phone)) {
        return 'Phone numbers can only contain numbers, spaces and the symbols + - ( ) .';
    }

    return '';
}

/**
 * Validate a value against a list of allowed options.
 *
 * @param string $value
 * @param array  $allowed
 * @return string Error message, or an empty string when valid.
 */
function mm_error_choice($value, array $allowed)
{
    if (!in_array($value, $allowed, true)) {
        return 'Please choose one of the available options.';
    }

    return '';
}

/**
 * Validate the hidden honeypot field and minimum completion time.
 *
 * @param array $post     Raw $_POST data.
 * @param int   $startedAt Timestamp stored when the form was rendered.
 * @return string Error message when the submission looks automated.
 */
function mm_error_spam($post, $startedAt)
{
    $honeypotField = (string) mm_config('security.honeypot_field', 'mm_website');

    if (!empty($post[$honeypotField])) {
        return 'Your submission could not be processed.';
    }

    $minimumSeconds = (int) mm_config('security.min_seconds', 3);

    if ($startedAt > 0 && (time() - $startedAt) < $minimumSeconds) {
        return 'Your submission was sent too quickly. Please try again.';
    }

    return '';
}

/**
 * Very small file-based rate limiter, one file per IP per hour bucket.
 *
 * @param string $key
 * @param int    $max
 * @return bool True when the request is allowed.
 */
function mm_rate_limit_ok($key, $max)
{
    $max     = (int) $max;
    $dir     = rtrim(sys_get_temp_dir(), '/') . '/mm-rate';
    $bucket  = (int) floor(time() / 3600);
    $hash    = substr(sha1($key), 0, 24);
    $file    = $dir . '/' . $hash . '-' . $bucket . '.txt';

    if (!is_dir($dir)) {
        @mkdir($dir, 0700, true);
    }

    $count = 0;
    if (is_file($file)) {
        $count = (int) @file_get_contents($file);
    }

    if ($count >= $max) {
        return false;
    }

    // Opportunistic cleanup of previous hours.
    if (random_int(1, 20) === 1) {
        foreach (glob($dir . '/' . $hash . '-*.txt') as $old) {
            if (basename($old) !== basename($file)) {
                @unlink($old);
            }
        }
    }

    @file_put_contents($file, (string) ($count + 1), LOCK_EX);

    return true;
}

/**
 * Best-effort client IP (proxy headers are not trusted blindly).
 *
 * @return string
 */
function mm_client_ip()
{
    return isset($_SERVER['REMOTE_ADDR']) ? substr((string) $_SERVER['REMOTE_ADDR'], 0, 64) : 'unknown';
}

/**
 * Create or validate a per-session form token.
 *
 * @param string|null $submitted
 * @return string
 */
function mm_form_token($submitted = null)
{
    mm_session_start();

    if (empty($_SESSION['mm_form_token'])) {
        $_SESSION['mm_form_token'] = bin2hex(random_bytes(32));
    }

    if ($submitted !== null && !hash_equals($_SESSION['mm_form_token'], (string) $submitted)) {
        return '';
    }

    return $_SESSION['mm_form_token'];
}

/**
 * Safe redirect helper — always stays on this site.
 *
 * @param string $target
 * @return void
 */
function mm_redirect($target)
{
    $target = preg_replace('/[^A-Za-z0-9\/\._-]/', '', (string) $target);

    if (!headers_sent()) {
        header('Location: ' . $target, true, 303);
    }

    exit;
}