<?php
/**
 * Reusable final call-to-action banner.
 *
 * @var string $cta_title
 * @var string $cta_text
 * @var string $cta_service  Optional service slug to prefill the inquiry form.
 * @var string $cta_variant  'light' | 'dark'
 *
 * @package MexaMotion
 */

if (!defined('MM_ABSPATH')) {
    require_once __DIR__ . '/functions.php';
}

$cta_title   = isset($cta_title) ? $cta_title : 'Have a Project in Mind?';
$cta_text    = isset($cta_text) ? $cta_text : "Let's discuss your idea and find the right creative approach for your project.";
$cta_service = isset($cta_service) ? $cta_service : '';
$cta_variant = isset($cta_variant) ? $cta_variant : 'dark';
$cta_href    = 'book-now.php' . ($cta_service !== '' ? '?service=' . rawurlencode($cta_service) : '');
?>
<section class="cta-banner cta-banner--<?= e($cta_variant) ?>">
    <div class="cta-banner__glow" aria-hidden="true"></div>
    <div class="container cta-banner__inner">
        <div class="cta-banner__copy">
            <h2 class="cta-banner__title"><?= e($cta_title) ?></h2>
            <p class="cta-banner__text"><?= e($cta_text) ?></p>
        </div>
        <div class="cta-banner__actions">
            <a class="btn btn--primary btn--lg" href="<?= e($cta_href) ?>">
                Book Now <?= mm_icon('arrow-right', 18) ?>
            </a>
            <a class="btn btn--ghost-light btn--lg" href="mailto:<?= e(mm_config('contact.email')) ?>">
                Contact Us
            </a>
        </div>
    </div>
</section>