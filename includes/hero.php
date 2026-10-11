<?php
/**
 * Homepage hero section.
 *
 * @package MexaMotion
 */

if (!defined('MM_ABSPATH')) {
    require_once __DIR__ . '/functions.php';
}
?>
<section class="hero">
    <div class="hero__backdrop" aria-hidden="true">
        <span class="hero__glow hero__glow--a"></span>
        <span class="hero__glow hero__glow--b"></span>
        <span class="hero__grid"></span>
    </div>

    <div class="container hero__inner">

        <div class="hero__copy">
            <p class="eyebrow">
                <span class="eyebrow__dot" aria-hidden="true"></span>
                Creative Content Studio
            </p>

            <h1 class="hero__title">
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

        <div class="hero__visual" aria-hidden="true">

            <div class="hero__frame">
                <svg class="hero__art" viewBox="0 0 560 420" fill="none" xmlns="http://www.w3.org/2000/svg" role="presentation">
                    <defs>
                        <linearGradient id="heroRibbon" x1="40" y1="20" x2="520" y2="400" gradientUnits="userSpaceOnUse">
                            <stop offset="0%" stop-color="#3B82F6"/>
                            <stop offset="55%" stop-color="#1152DF"/>
                            <stop offset="100%" stop-color="#0B1220" stop-opacity="0.15"/>
                        </linearGradient>
                        <linearGradient id="heroGlow" x1="0" y1="0" x2="1" y2="1">
                            <stop offset="0%" stop-color="#3B82F6" stop-opacity="0.55"/>
                            <stop offset="100%" stop-color="#1152DF" stop-opacity="0"/>
                        </linearGradient>
                        <clipPath id="heroClip"><rect width="560" height="420" rx="28"/></clipPath>
                    </defs>

                    <g clip-path="url(#heroClip)">
                        <rect width="560" height="420" fill="#0B1220"/>
                        <ellipse cx="150" cy="70" rx="260" ry="200" fill="url(#heroGlow)"/>

                        <!-- fine grid -->
                        <g stroke="#FFFFFF" stroke-opacity="0.05">
                            <?php for ($x = 40; $x < 560; $x += 40) : ?>
                            <line x1="<?= $x ?>" y1="0" x2="<?= $x ?>" y2="420"/>
                            <?php endfor; ?>
                            <?php for ($y = 40; $y < 420; $y += 40) : ?>
                            <line x1="0" y1="<?= $y ?>" x2="560" y2="<?= $y ?>"/>
                            <?php endfor; ?>
                        </g>

                        <!-- motion ribbon -->
                        <path class="hero__ribbon" d="M-20 330 C 120 330, 120 110, 280 110 C 420 110, 420 300, 580 250"
                              stroke="url(#heroRibbon)" stroke-width="10" stroke-linecap="round" fill="none" opacity="0.9"/>
                        <path d="M-20 366 C 130 366, 130 160, 280 160 C 420 160, 430 336, 580 288"
                              stroke="#3B82F6" stroke-opacity="0.28" stroke-width="2" stroke-linecap="round" fill="none"/>

                        <!-- orbit rings -->
                        <circle cx="300" cy="210" r="118" stroke="#FFFFFF" stroke-opacity="0.08"/>
                        <circle cx="300" cy="210" r="76" stroke="#3B82F6" stroke-opacity="0.35" stroke-dasharray="3 9"/>

                        <!-- keyframe diamonds -->
                        <g class="hero__keys" stroke="#8FC0FF" stroke-width="2" fill="#0B1220">
                            <path d="M92 150 l8 8 -8 8 -8-8z"/>
                            <path d="M470 250 l8 8 -8 8 -8-8z"/>
                            <path d="M380 84 l7 7 -7 7 -7-7z"/>
                        </g>

                        <!-- play mark -->
                        <g class="hero__play-mark">
                            <circle cx="300" cy="210" r="46" fill="#1152DF" fill-opacity="0.18" stroke="#5A9BFF" stroke-opacity="0.7"/>
                            <path d="M288 190 L326 210 L288 230 Z" fill="#FFFFFF" fill-opacity="0.95"/>
                        </g>

                        <!-- waveform -->
                        <g class="hero__wave" fill="#3B82F6">
                            <?php
                            $mm_bars = [10, 20, 34, 16, 44, 28, 52, 22, 38, 14, 46, 30, 18, 40, 26, 12, 34, 20];
                            foreach ($mm_bars as $mm_i => $mm_h) :
                            ?>
                            <rect x="<?= 40 + $mm_i * 27 ?>" y="<?= 384 - $mm_h ?>" width="10" height="<?= $mm_h ?>" rx="5" fill-opacity="<?= 0.35 + ($mm_i % 3) * 0.2 ?>"/>
                            <?php endforeach; ?>
                        </g>
                    </g>
                </svg>

                <div class="hero__frame-label">
                    <span class="hero__frame-tag">Creative Studio</span>
                    <span class="hero__frame-sub">Edit · Animate · Design</span>
                </div>
            </div>

            <div class="hero__chip hero__chip--a">
                <?= mm_icon('video-editing', 16) ?>
                <span>Video Editing</span>
            </div>

            <div class="hero__chip hero__chip--b">
                <?= mm_icon('motion-graphics', 16) ?>
                <span>Motion Graphics</span>
            </div>

            <div class="hero__chip hero__chip--c">
                <?= mm_icon('thumbnail', 16) ?>
                <span>Thumbnails</span>
            </div>
        </div>

    </div>
</section>