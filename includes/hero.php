<?php
/**
 * Homepage hero — character-led creative hero.
 *
 * Homepage only: this partial is required by index.php and nowhere else.
 * All styling is scoped to .hero--home so no other page is affected.
 *
 * The floating tool tiles are inline SVG rather than image files so the hero
 * costs zero extra HTTP requests above the fold. They are original,
 * generic creative-tool symbols — not reproductions of any vendor's logo.
 *
 * @package MexaMotion
 */

if (!defined('MM_ABSPATH')) {
    require_once __DIR__ . '/functions.php';
}

/*
 * Floating tool tiles.
 * 'glyph' is a 24×24 path set drawn in white over a tinted rounded square.
 * These represent Mexa Motion's capabilities, not any specific software brand.
 */
$mm_hero_tools = [
    [
        'pos'   => 1,
        'label' => 'Motion graphics and animation',
        'from'  => '#8B5CF6', 'to' => '#6D28D9',
        'glyph' => '<path d="M4 18C10 18 12 6 20 6"/><circle cx="4" cy="18" r="2.5" fill="#FFFFFF" stroke="none"/><circle cx="20" cy="6" r="2.5" fill="#FFFFFF" stroke="none"/>',
    ],
    [
        'pos'   => 2,
        'label' => 'Video editing and timeline work',
        'from'  => '#4C93FF', 'to' => '#1152DF',
        'glyph' => '<rect x="3" y="7.4" width="10" height="3.6" rx="1.8" fill="#FFFFFF" stroke="none"/><rect x="3" y="13" width="15" height="3.6" rx="1.8" fill="#FFFFFF" stroke="none"/><path d="M18.5 5.5v13"/>',
    ],
    [
        'pos'   => 3,
        'label' => 'Thumbnail and visual design',
        'from'  => '#38BDF8', 'to' => '#0891B2',
        'glyph' => '<rect x="3.2" y="5" width="17.6" height="14" rx="2.6"/><circle cx="9" cy="10" r="1.8" fill="#FFFFFF" stroke="none"/><path d="m4 17 5-4.4 4 3.4 3-2.4 4 3.4"/>',
    ],
    [
        'pos'   => 4,
        'label' => 'Colour grading and finishing',
        'from'  => '#FBBF24', 'to' => '#D97706',
        'glyph' => '<path d="M4 7.5h16M4 12h16M4 16.5h16"/><circle cx="9.5" cy="7.5" r="2.5" fill="#FFFFFF" stroke="none"/><circle cx="15" cy="12" r="2.5" fill="#FFFFFF" stroke="none"/><circle cx="7.5" cy="16.5" r="2.5" fill="#FFFFFF" stroke="none"/>',
    ],
    [
        'pos'   => 5,
        'label' => 'YouTube long and short form content',
        'from'  => '#FB7185', 'to' => '#E11D48',
        'glyph' => '<rect x="2.6" y="5.4" width="18.8" height="13.2" rx="4"/><path d="M10.2 9.3 15 12l-4.8 2.7z" fill="#FFFFFF" stroke="none"/>',
    ],
    [
        'pos'   => 6,
        'label' => 'Reels and TikTok short form ads',
        'from'  => '#F472B6', 'to' => '#DB2777',
        'glyph' => '<rect x="6.8" y="2.6" width="10.4" height="18.8" rx="3"/><path d="m10.4 9.6 4 2.4-4 2.4z" fill="#FFFFFF" stroke="none"/>',
    ],
    [
        'pos'   => 7,
        'label' => 'Product and camera video',
        'from'  => '#34D399', 'to' => '#059669',
        'glyph' => '<rect x="2.6" y="7" width="12.8" height="10" rx="2.6"/><path d="m15.4 10.4 6-3.2v9.6l-6-3.2z" fill="#FFFFFF" stroke="none"/>',
    ],
];
?>
<section class="hero hero--home" aria-labelledby="hero-title">
    <div class="hero__backdrop" aria-hidden="true">
        <span class="hero__glow hero__glow--a"></span>
        <span class="hero__glow hero__glow--b"></span>
        <span class="hero__glow hero__glow--c"></span>
        <span class="hero__grid"></span>
    </div>

    <div class="container hero__inner">

        <!-- ── Copy ──────────────────────────────────────────────────── -->
        <div class="hero__copy">
            <p class="eyebrow eyebrow--light">
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
                <a class="btn btn--ghost-light btn--lg" href="services.php">Explore Our Services</a>
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

        <!-- ── Character + floating tool tiles ───────────────────────── -->
        <div class="hero__visual">
            <div class="hero__stage">
                <span class="hero__halo" aria-hidden="true"></span>

                <img class="hero__character"
                     src="<?= e(mm_config('brand.hero_character', 'assets/images/brand/hero-character.svg')) ?>"
                     alt="A Mexa Motion creative editor wearing headphones and reviewing a video timeline."
                     width="480" height="580"
                     loading="eager" decoding="async" fetchpriority="high">

                <ul class="hero__tools" aria-hidden="true">
                    <?php foreach ($mm_hero_tools as $mm_tool) : ?>
                    <li class="hero__tool hero__tool--<?= (int) $mm_tool['pos'] ?>">
                        <svg viewBox="0 0 64 64" role="presentation" focusable="false">
                            <defs>
                                <linearGradient id="mmTool<?= (int) $mm_tool['pos'] ?>" x1="0" y1="0" x2="0" y2="64" gradientUnits="userSpaceOnUse">
                                    <stop offset="0%" stop-color="<?= e($mm_tool['from']) ?>"/>
                                    <stop offset="100%" stop-color="<?= e($mm_tool['to']) ?>"/>
                                </linearGradient>
                            </defs>
                            <rect width="64" height="64" rx="17" fill="url(#mmTool<?= (int) $mm_tool['pos'] ?>)"/>
                            <rect x="1.1" y="1.1" width="61.8" height="61.8" rx="16" fill="none"
                                  stroke="#FFFFFF" stroke-opacity="0.3" stroke-width="1.6"/>
                            <g transform="translate(20 20)" fill="none" stroke="#FFFFFF" stroke-width="2.2"
                               stroke-linecap="round" stroke-linejoin="round"><?= $mm_tool['glyph'] ?></g>
                        </svg>
                        <span class="sr-only"><?= e($mm_tool['label']) ?></span>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>

    </div>
</section>
