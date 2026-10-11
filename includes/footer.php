<?php
/**
 * Mexa Motion — Shared footer and closing scripts.
 *
 * @package MexaMotion
 */

if (!defined('MM_ABSPATH')) {
    require_once __DIR__ . '/functions.php';
}

$mm_footer_services = array_slice(mm_services(), 0, 7);
$mm_social = [
    ['key' => 'facebook',  'label' => 'Facebook',  'icon' => 'facebook'],
    ['key' => 'youtube',   'label' => 'YouTube',   'icon' => 'youtube-icon'],
    ['key' => 'instagram', 'label' => 'Instagram', 'icon' => 'instagram'],
    ['key' => 'linkedin',  'label' => 'LinkedIn',  'icon' => 'linkedin'],
    ['key' => 'behance',   'label' => 'Behance',   'icon' => 'behance'],
    ['key' => 'tiktok',    'label' => 'TikTok',    'icon' => 'tiktok'],
];
?>
</main>

<footer class="site-footer">
    <div class="container">

        <div class="site-footer__top">
            <div class="site-footer__brand">
                <img class="site-footer__logo"
                     src="<?= e(mm_config('brand.logo_lockup')) ?>"
                     alt="<?= e(mm_config('brand.name')) ?>"
                     width="180" height="149" loading="lazy" decoding="async">
                <p class="site-footer__blurb">
                    A creative content studio producing video editing, motion graphics, thumbnails,
                    brand videos and social content for brands and creators.
                </p>
                <a class="btn btn--primary btn--sm" href="book-now.php">Book Now</a>
            </div>

            <nav class="site-footer__nav" aria-label="Footer quick links">
                <h2 class="site-footer__heading">Quick Links</h2>
                <ul>
                    <?php foreach ($mm_nav_items as $item) : ?>
                    <li><a href="<?= e($item['href']) ?>"><?= e($item['label']) ?></a></li>
                    <?php endforeach; ?>
                    <li><a href="book-now.php">Book Now</a></li>
                </ul>
            </nav>

            <nav class="site-footer__nav" aria-label="Footer services">
                <h2 class="site-footer__heading">Services</h2>
                <ul>
                    <?php foreach ($mm_footer_services as $mm_service) : ?>
                    <li><a href="services.php#<?= e($mm_service['slug']) ?>"><?= e($mm_service['title']) ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </nav>

            <div class="site-footer__contact">
                <h2 class="site-footer__heading">Get in Touch</h2>
                <ul class="site-footer__contact-list">
                    <li>
                        <a href="<?= e(mm_whatsapp_link('Hello Mexa Motion, I would like to discuss a project.')) ?>"
                           rel="noopener" target="_blank">
                            <?= mm_icon('whatsapp', 18) ?>
                            <span><?= e(mm_config('contact.whatsapp_label')) ?></span>
                        </a>
                    </li>
                    <li>
                        <a href="mailto:<?= e(mm_config('contact.email')) ?>">
                            <?= mm_icon('mail', 18) ?>
                            <span><?= e(mm_config('contact.email_label')) ?></span>
                        </a>
                    </li>
                    <li>
                        <?= mm_icon('pin', 18) ?>
                        <span><?= e(mm_config('contact.city')) ?>, <?= e(mm_config('contact.country')) ?></span>
                    </li>
                    <li>
                        <?= mm_icon('clock', 18) ?>
                        <span><?= e(mm_config('contact.hours')) ?></span>
                    </li>
                </ul>

                <ul class="site-footer__social" aria-label="Social media">
                    <?php foreach ($mm_social as $mm_s) : ?>
                    <li>
                        <a href="<?= e(mm_config('social.' . $mm_s['key'])) ?>"
                           target="_blank" rel="noopener noreferrer"
                           aria-label="<?= e($mm_s['label']) ?>">
                            <?= mm_icon($mm_s['icon'], 18) ?>
                        </a>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>

        <?php if (mm_config('contact.is_placeholder') || mm_config('social.is_placeholder')) : ?>
        <div class="site-footer__notice" role="note">
            <?= mm_icon('shield', 16) ?>
            <p>
                <strong>Development build.</strong> Contact details, social links and social profile URLs on this
                site are placeholders and will be replaced with the official Mexa Motion details before launch.
            </p>
        </div>
        <?php endif; ?>

        <div class="site-footer__bottom">
            <p class="site-footer__copy">
                &copy; <?= (int) date('Y') ?> <?= e(mm_config('site.copyright')) ?>. All rights reserved.
            </p>
            <ul class="site-footer__legal">
                <li><a href="book-now.php">Project Inquiry</a></li>
                <li><a href="<?= e(mm_url('privacy.php')) ?>">Privacy Notice</a></li>
            </ul>
        </div>
    </div>
</footer>

<button class="to-top" type="button" data-to-top aria-label="Back to top" hidden>
    <?= mm_icon('chevron-down', 20) ?>
</button>

<script src="assets/js/main.js?v=1.0.0" defer></script>
<?php if (!empty($page_meta['scripts'])) : ?>
<?php foreach ((array) $page_meta['scripts'] as $mm_script) : ?>
<script src="<?= e($mm_script) ?>" defer></script>
<?php endforeach; ?>
<?php endif; ?>
</body>
</html>