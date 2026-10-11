<?php
/**
 * Homepage hero section — Redlab Studio inspired character-led design.
 *
 * @package MexaMotion
 */

if (!defined('MM_ABSPATH')) {
    require_once __DIR__ . '/functions.php';
}
?>
<section class="hero hero--home" aria-labelledby="hero-title">
    <div class="hero__backdrop" aria-hidden="true">
        <span class="hero__glow hero__glow--a"></span>
        <span class="hero__glow hero__glow--b"></span>
        <span class="hero__grid"></span>
    </div>

    <div class="container hero__inner">

        <div class="hero__copy" data-reveal="hero-copy">
            <p class="eyebrow">
                <span class="eyebrow__dot" aria-hidden="true"></span>
                Creative Content Studio
            </p>

            <h1 class="hero__title" id="hero-title">
                Everything Your Brand Needs to
                <span class="text-gradient">Create Better Content</span>
            </h1>

            <p class="hero__lead">
                From video editing to motion graphics, we bring your ideas to life with
                professional creative solutions.
            </p>

            <div class="hero__actions">
                <a class="btn btn--primary btn--lg" href="book-now.php">
                    Book Now <?= mm_icon('arrow-right', 18) ?>
                </a>
                <a class="btn btn--outline btn--lg" href="services.php">Explore Our Services</a>
            </div>

            <p class="hero__note">
                <?= mm_icon('chat', 16) ?>
                <span>Tell us about your project. We&rsquo;ll help you find the right creative solution.</span>
            </p>

            <ul class="hero__pills">
                <?php
                $mm_pills = ['Video Editing', 'Motion Graphics', 'Thumbnails', 'Brand Videos', 'Social Ads'];
                foreach ($mm_pills as $mm_pill) :
                ?>
                <li><?= e($mm_pill) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>

        <div class="hero__visual" aria-hidden="true" data-reveal="hero-visual">

            <!-- Character illustration (centerpiece) -->
            <div class="hero__character-wrap">
                <img class="hero__character"
                     src="<?= e(mm_config('brand.hero_character') ?? 'assets/images/brand/hero-character.svg') ?>"
                     alt=""
                     width="480" height="520"
                     loading="eager"
                     decoding="async"
                     fetchpriority="high">

                <!-- Floating software/service icons -->
                <div class="hero__floaters" aria-hidden="true">
                    <!-- After Effects -->
                    <figure class="hero__floater hero__floater--ae" style="--floater-x: -15%; --floater-y: -10%; --delay: 0ms;">
                        <img src="assets/images/icons/icon-ae.svg" alt="" width="64" height="64" loading="lazy" decoding="async">
                        <figcaption class="sr-only">After Effects — Motion Graphics</figcaption>
                    </figure>

                    <!-- Premiere Pro -->
                    <figure class="hero__floater hero__floater--pr" style="--floater-x: 110%; --floater-y: -5%; --delay: 150ms;">
                        <img src="assets/images/icons/icon-pr.svg" alt="" width="64" height="64" loading="lazy" decoding="async">
                        <figcaption class="sr-only">Premiere Pro — Video Editing</figcaption>
                    </figure>

                    <!-- Photoshop -->
                    <figure class="hero__floater hero__floater--ps" style="--floater-x: 115%; --floater-y: 45%; --delay: 300ms;">
                        <img src="assets/images/icons/icon-ps.svg" alt="" width="64" height="64" loading="lazy" decoding="async">
                        <figcaption class="sr-only">Photoshop — Thumbnail Design</figcaption>
                    </figure>

                    <!-- DaVinci Resolve -->
                    <figure class="hero__floater hero__floater--dv" style="--floater-x: -10%; --floater-y: 105%; --delay: 450ms;">
                        <img src="assets/images/icons/icon-davinci.svg" alt="" width="64" height="64" loading="lazy" decoding="async">
                        <figcaption class="sr-only">DaVinci Resolve — Color & Editing</figcaption>
                    </figure>

                    <!-- YouTube -->
                    <figure class="hero__floater hero__floater--yt" style="--floater-x: 55%; --floater-y: 100%; --delay: 600ms;">
                        <img src="assets/images/icons/icon-youtube.svg" alt="" width="64" height="64" loading="lazy" decoding="async">
                        <figcaption class="sr-only">YouTube — Long & Short Form</figcaption>
                    </figure>

                    <!-- Reels/TikTok -->
                    <figure class="hero__floater hero__floater--reels" style="--floater-x: -20%; --floater-y: 55%; --delay: 750ms;">
                        <img src="assets/images/icons/icon-reels.svg" alt="" width="64" height="64" loading="lazy" decoding="async">
                        <figcaption class="sr-only">Reels & TikTok — Short Form Ads</figcaption>
                    </figure>

                    <!-- Product/Camera -->
                    <figure class="hero__floater hero__floater--cam" style="--floater-x: 100%; --floater-y: 65%; --delay: 900ms;">
                        <img src="assets/images/icons/icon-camera.svg" alt="" width="64" height="64" loading="lazy" decoding="async">
                        <figcaption class="sr-only">Product Videos — Showcase</figcaption>
                    </figure>

                    <!-- Decorative accent particles -->
                    <div class="hero__particles" aria-hidden="true">
                        <span style="--p-x: 5%; --p-y: 15%; --p-size: 8px; --p-color: #3B82F6; --p-delay: 0s;"></span>
                        <span style="--p-x: 95%; --p-y: 8%; --p-size: 6px; --p-color: #F5A524; --p-delay: 0.5s;"></span>
                        <span style="--p-x: 2%; --p-y: 50%; --p-size: 5px; --p-color: #60A5FA; --p-delay: 1s;"></span>
                        <span style="--p-x: 98%; --p-y: 55%; --p-size: 7px; --p-color: #3B82F6; --p-delay: 1.5s;"></span>
                        <span style="--p-x: 15%; --p-y: 92%; --p-size: 6px; --p-color: #F5A524; --p-delay: 2s;"></span>
                        <span style="--p-x: 85%; --p-y: 88%; --p-size: 5px; --p-color: #60A5FA; --p-delay: 2.5s;"></span>
                        <span style="--p-x: 45%; --p-y: 2%; --p-size: 10px; --p-color: #1152DF; --p-delay: 0.8s;"></span>
                        <span style="--p-x: 70%; --p-y: 98%; --p-size: 4px; --p-color: #F5A524; --p-delay: 3s;"></span>
                    </div>
                </div>
            </div>

            <!-- Trust indicators below character -->
            <div class="hero__trust" data-reveal="hero-trust">
                <div class="hero__trust-item">
                    <span class="hero__trust-icon" aria-hidden="true"><?= mm_icon('check', 18) ?></span>
                    <span>7 Specialized Services</span>
                </div>
                <div class="hero__trust-item">
                    <span class="hero__trust-icon" aria-hidden="true"><?= mm_icon('clock', 18) ?></span>
                    <span>Fast Turnaround</span>
                </div>
                <div class="hero__trust-item">
                    <span class="hero__trust-icon" aria-hidden="true"><?= mm_icon('chat', 18) ?></span>
                    <span>Collaborative Process</span>
                </div>
            </div>
        </div>

    </div>
</section>