<?php
/**
 * Mexa Motion — Home
 *
 * Page order:
 *  1. Header
 *  2. Hero (magician character + floating service icons)
 *  3. Seven-service diagram (preserved from existing)
 *  4. Trust strip
 *  5. Featured services
 *  6. Portfolio (Long/Short tabs with YouTube embeds)
 *  7. Why Choose Mexa Motion
 *  8. How We Work
 *  9. Customer review carousel
 *  10. Final CTA
 *  11. Footer
 *
 * @package MexaMotion
 */

require_once __DIR__ . '/includes/functions.php';

$page_meta = [
    'title'       => 'Mexa Motion | Video Editing & Creative Content',
    'description' => 'Mexa Motion is a creative content studio in Bangladesh offering video editing, motion graphics, thumbnail design, brand videos, YouTube content, social media ads and product videos.',
    'path'        => 'index.php',
    'og'          => 'assets/images/brand/logo-square.png',
    'scripts'     => ['assets/js/reviews.js?v=1.0.0'],
    'head'        => '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />',
];

$page_nav      = 'home';
$body_class    = 'page-home';
$featured_services = mm_services();
$featured_projects = array_slice(mm_projects(), 0, 6);
$value_strip       = mm_data('value_strip');
$why_choose        = mm_data('why_choose');
$process           = mm_data('process');

require __DIR__ . '/includes/header.php';
?>

<!-- ===================================================================== -->
<!-- HERO — MAGICIAN CHARACTER WITH FLOATING SERVICE ICONS                -->
<!-- ===================================================================== -->
<section class="hero hero--home" aria-labelledby="hero-title">
    <!-- Animated particle background -->
    <div class="hero__particles" aria-hidden="true">
        <span class="particle" style="--i:0"></span>
        <span class="particle" style="--i:1"></span>
        <span class="particle" style="--i:2"></span>
        <span class="particle" style="--i:3"></span>
        <span class="particle" style="--i:4"></span>
        <span class="particle" style="--i:5"></span>
        <span class="particle" style="--i:6"></span>
        <span class="particle" style="--i:7"></span>
        <span class="particle" style="--i:8"></span>
        <span class="particle" style="--i:9"></span>
        <span class="particle" style="--i:10"></span>
        <span class="particle" style="--i:11"></span>
        <span class="particle" style="--i:12"></span>
        <span class="particle" style="--i:13"></span>
        <span class="particle" style="--i:14"></span>
        <span class="particle" style="--i:15"></span>
        <span class="particle" style="--i:16"></span>
        <span class="particle" style="--i:17"></span>
        <span class="particle" style="--i:18"></span>
        <span class="particle" style="--i:19"></span>
    </div>

    <!-- Magician Character (Pure SVG) -->
    <div class="hero__character-wrapper" aria-hidden="true">
        <svg class="hero__character-svg" viewBox="0 0 400 600" preserveAspectRatio="xMidYMid meet" role="img" aria-label="A mysterious magician character conjuring creative services">
            <defs>
                <!-- Gradients for the character -->
                <linearGradient id="hatGrad" x1="0" y1="0" x2="0" y2="1" gradientUnits="userSpaceOnUse">
                    <stop offset="0%" stop-color="#0a0a1a"/>
                    <stop offset="50%" stop-color="#111128"/>
                    <stop offset="100%" stop-color="#0d0d1a"/>
                </linearGradient>
                <linearGradient id="hatHighlight" x1="0" y1="0" x2="0" y2="1" gradientUnits="userSpaceOnUse">
                    <stop offset="0%" stop-color="#1a1a3a" stop-opacity="0.6"/>
                    <stop offset="100%" stop-color="#0a0a1a" stop-opacity="0"/>
                </linearGradient>
                <linearGradient id="hatBandGrad" x1="0" y1="0" x2="1" y2="0" gradientUnits="userSpaceOnUse">
                    <stop offset="0%" stop-color="#1152df"/>
                    <stop offset="50%" stop-color="#3b82f6"/>
                    <stop offset="100%" stop-color="#1152df"/>
                </linearGradient>
                <linearGradient id="cloakGrad" x1="0" y1="0" x2="0" y2="1" gradientUnits="userSpaceOnUse">
                    <stop offset="0%" stop-color="#0d0d1a"/>
                    <stop offset="40%" stop-color="#111128"/>
                    <stop offset="100%" stop-color="#0a0a1a"/>
                </linearGradient>
                <linearGradient id="cloakEdgeGrad" x1="0" y1="0" x2="1" y2="0" gradientUnits="userSpaceOnUse">
                    <stop offset="0%" stop-color="#1152df" stop-opacity="0.4"/>
                    <stop offset="50%" stop-color="#3b82f6" stop-opacity="0.6"/>
                    <stop offset="100%" stop-color="#1152df" stop-opacity="0.4"/>
                </linearGradient>
                <linearGradient id="gloveGrad" x1="0" y1="0" x2="0" y2="1" gradientUnits="userSpaceOnUse">
                    <stop offset="0%" stop-color="#15152e"/>
                    <stop offset="100%" stop-color="#0a0a1a"/>
                </linearGradient>
                <linearGradient id="glowGrad" x1="0" y1="0" x2="0" y2="1" gradientUnits="userSpaceOnUse">
                    <stop offset="0%" stop-color="#1152df" stop-opacity="0.3"/>
                    <stop offset="100%" stop-color="#1152df" stop-opacity="0"/>
                </linearGradient>
                <radialGradient id="auraGrad" cx="50%" cy="50%" r="50%" gradientUnits="userSpaceOnUse">
                    <stop offset="0%" stop-color="#1152df" stop-opacity="0.15"/>
                    <stop offset="50%" stop-color="#1152df" stop-opacity="0.05"/>
                    <stop offset="100%" stop-color="#1152df" stop-opacity="0"/>
                </radialGradient>
                <filter id="softGlow" x="-50%" y="-50%" width="200%" height="200%">
                    <feGaussianBlur stdDeviation="8" result="blur"/>
                    <feMerge>
                        <feMergeNode in="blur"/>
                        <feMergeNode in="SourceGraphic"/>
                    </feMerge>
                </filter>
                <filter id="eyeGlow" x="-100%" y="-100%" width="300%" height="300%">
                    <feGaussianBlur stdDeviation="3" result="blur"/>
                    <feMerge>
                        <feMergeNode in="blur"/>
                        <feMergeNode in="SourceGraphic"/>
                    </feMerge>
                </filter>
            </defs>

            <!-- Aura glow behind character -->
            <ellipse class="hero__aura" cx="200" cy="300" rx="180" ry="280" fill="url(#auraGrad)" filter="url(#softGlow)"/>

            <!-- Energy trails from hands -->
            <g class="hero__energy-trails" fill="none" stroke="#1152df" stroke-width="1.5" stroke-linecap="round" opacity="0.4">
                <path d="M80 320 Q100 280 130 260 Q160 240 190 230" class="trail trail-left"/>
                <path d="M320 320 Q300 280 270 260 Q240 240 210 230" class="trail trail-right"/>
                <path d="M100 380 Q120 350 150 340 Q180 330 200 320" class="trail trail-left-low"/>
                <path d="M300 380 Q280 350 250 340 Q220 330 200 320" class="trail trail-right-low"/>
            </g>

            <!-- Top Hat -->
            <g class="hero__hat">
                <!-- Hat brim -->
                <path d="M70 120 Q100 115 130 118 L130 128 Q100 125 70 128 Z" fill="url(#hatGrad)"/>
                <path d="M330 120 Q300 115 270 118 L270 128 Q300 125 330 128 Z" fill="url(#hatGrad)"/>
                <ellipse cx="200" cy="124" rx="130" ry="8" fill="url(#hatGrad)"/>
                
                <!-- Hat crown -->
                <path d="M105 124 L95 40 Q200 20 305 40 L295 124" fill="url(#hatGrad)"/>
                
                <!-- Hat highlight/shear -->
                <path d="M120 124 L115 50 Q200 35 285 50 L280 124" fill="url(#hatHighlight)"/>
                
                <!-- Hat band -->
                <rect x="100" y="118" width="200" height="12" rx="2" fill="url(#hatBandGrad)"/>
                
                <!-- Glowing eyes under hat brim -->
                <g class="hero__eyes" filter="url(#eyeGlow)">
                    <circle cx="165" cy="118" r="3" fill="#1152df" class="eye-left">
                        <animate attributeName="opacity" values="0.3;0.7;0.3" dur="4s" repeatCount="indefinite" begin="0s"/>
                    </circle>
                    <circle cx="235" cy="118" r="3" fill="#1152df" class="eye-right">
                        <animate attributeName="opacity" values="0.5;0.8;0.5" dur="3.5s" repeatCount="indefinite" begin="0.5s"/>
                    </circle>
                </g>
            </g>

            <!-- High Collar -->
            <g class="hero__collar">
                <path d="M140 160 Q160 145 200 140 Q240 145 260 160 Q250 170 150 170 Z" fill="#0a0a1a" stroke="#1152df" stroke-width="1.5" opacity="0.6"/>
                <path d="M150 165 Q170 155 200 152 Q230 155 250 165 Q240 172 160 172 Z" fill="none" stroke="#1152df" stroke-width="1" opacity="0.4"/>
            </g>

            <!-- Cloak/Coat -->
            <g class="hero__cloak">
                <!-- Main cloak body -->
                <path class="cloak-body" d="M60 160 Q50 200 40 300 Q50 420 80 520 Q120 580 200 570 Q280 580 320 520 Q350 420 360 300 Q350 200 340 160 Q330 150 260 160 Q240 150 200 155 Q160 150 140 160 Z" fill="url(#cloakGrad)"/>
                
                <!-- Cloak edge highlights -->
                <path class="cloak-left-edge" d="M60 160 Q50 200 40 300 Q50 420 80 520" fill="none" stroke="url(#cloakEdgeGrad)" stroke-width="2" stroke-linecap="round"/>
                <path class="cloak-right-edge" d="M340 160 Q350 200 360 300 Q350 420 320 520" fill="none" stroke="url(#cloakEdgeGrad)" stroke-width="2" stroke-linecap="round"/>
                
                <!-- Fabric folds -->
                <g class="cloak-folds" fill="none" stroke="#1a1a3a" stroke-width="0.8" opacity="0.5">
                    <path d="M100 180 Q120 220 110 280 Q100 340 110 400"/>
                    <path d="M140 190 Q150 240 145 300 Q140 360 150 420"/>
                    <path d="M180 185 Q185 250 180 320 Q175 390 185 450"/>
                    <path d="M220 185 Q215 250 220 320 Q225 390 215 450"/>
                    <path d="M260 190 Q250 240 255 300 Q260 360 250 420"/>
                    <path d="M300 180 Q280 220 290 280 Q300 340 290 400"/>
                </g>
                
                <!-- Bottom billowing effect -->
                <g class="cloak-billow" fill="url(#cloakGrad)">
                    <path d="M80 520 Q100 540 120 530 Q140 520 160 540 Q180 560 200 550 Q220 540 240 560 Q260 580 280 550 Q300 520 320 520"/>
                </g>
            </g>

            <!-- Left Arm & Hand (Extended outward, palm up) -->
            <g class="hero__arm-left">
                <!-- Sleeve -->
                <path d="M60 200 Q40 240 30 300 Q25 340 40 380" stroke="url(#cloakGrad)" stroke-width="40" stroke-linecap="round" fill="none"/>
                <!-- Glove hand -->
                <g class="glove" transform="translate(20, 370)">
                    <path d="M0 0 Q-15 20 -10 45 Q5 60 20 55 Q35 50 35 30 Q30 10 20 0 Q10 -5 0 0" fill="url(#gloveGrad)" stroke="#1152df" stroke-width="1" opacity="0.5"/>
                    <path d="M5 15 Q10 25 15 30 Q20 35 25 30 Q30 25 25 20 Q20 15 15 10 Q10 12 5 15" fill="#1152df" opacity="0.3"/>
                </g>
            </g>

            <!-- Right Arm & Hand (Extended outward, palm up) -->
            <g class="hero__arm-right">
                <!-- Sleeve -->
                <path d="M340 200 Q360 240 370 300 Q375 340 360 380" stroke="url(#cloakGrad)" stroke-width="40" stroke-linecap="round" fill="none"/>
                <!-- Glove hand -->
                <g class="glove" transform="translate(330, 370) scale(-1, 1)">
                    <path d="M0 0 Q-15 20 -10 45 Q5 60 20 55 Q35 50 35 30 Q30 10 20 0 Q10 -5 0 0" fill="url(#gloveGrad)" stroke="#1152df" stroke-width="1" opacity="0.5"/>
                    <path d="M5 15 Q10 25 15 30 Q20 35 25 30 Q30 25 25 20 Q20 15 15 10 Q10 12 5 15" fill="#1152df" opacity="0.3"/>
                </g>
            </g>

            <!-- Floating Service Icons Around Hands -->
            <g class="hero__floating-icons">
                <!-- Video Editing - Left side -->
                <g class="floating-icon" data-service="video-editing" transform="translate(30, 340)">
                    <circle r="28" fill="#1152df" opacity="0.15" filter="url(#softGlow)"/>
                    <circle r="24" fill="#1152df" opacity="0.1"/>
                    <svg viewBox="0 0 24 24" width="20" height="20" x="-10" y="-10" fill="none" stroke="#1152df" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="2.5" y="5" width="14" height="14" rx="3"/>
                        <path d="M16.5 10.5 21.5 7.5v9l-5-3z"/>
                        <path d="m7.4 9.6 4 2.4-4 2.4z"/>
                    </svg>
                    <text x="0" y="45" text-anchor="middle" font-size="8" fill="#1152df" opacity="0.8" font-family="Inter, sans-serif">Video Editing</text>
                </g>

                <!-- Thumbnail Design - Left side -->
                <g class="floating-icon" data-service="thumbnail" transform="translate(-20, 280)">
                    <circle r="28" fill="#1152df" opacity="0.15" filter="url(#softGlow)"/>
                    <circle r="24" fill="#1152df" opacity="0.1"/>
                    <svg viewBox="0 0 24 24" width="20" height="20" x="-10" y="-10" fill="none" stroke="#1152df" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="2.5" y="4.5" width="19" height="15" rx="3"/>
                        <circle cx="8.5" cy="10" r="2"/>
                        <path d="m3.5 17 5-4.5 4 3.5 3.5-2.5 5 4"/>
                        <path d="M17 9.5v5"/>
                        <path d="M14.5 12h5"/>
                    </svg>
                    <text x="0" y="45" text-anchor="middle" font-size="8" fill="#1152df" opacity="0.8" font-family="Inter, sans-serif">Thumbnails</text>
                </g>

                <!-- Motion Graphics - Left upper -->
                <g class="floating-icon" data-service="motion-graphics" transform="translate(60, 220)">
                    <circle r="28" fill="#1152df" opacity="0.15" filter="url(#softGlow)"/>
                    <circle r="24" fill="#1152df" opacity="0.1"/>
                    <svg viewBox="0 0 24 24" width="20" height="20" x="-10" y="-10" fill="none" stroke="#1152df" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M3 12h4l2.5-7 5 14L17 12h4"/>
                        <circle cx="3" cy="12" r="1.4"/>
                        <circle cx="21" cy="12" r="1.4"/>
                    </svg>
                    <text x="0" y="45" text-anchor="middle" font-size="8" fill="#1152df" opacity="0.8" font-family="Inter, sans-serif">Motion Graphics</text>
                </g>

                <!-- Sound Design - Right upper -->
                <g class="floating-icon" data-service="sound-design" transform="translate(340, 220)">
                    <circle r="28" fill="#1152df" opacity="0.15" filter="url(#softGlow)"/>
                    <circle r="24" fill="#1152df" opacity="0.1"/>
                    <svg viewBox="0 0 24 24" width="20" height="20" x="-10" y="-10" fill="none" stroke="#1152df" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 20.5c4.7 0 8.5-3.8 8.5-8.5S16.7 3.5 12 3.5 3.5 7.3 3.5 12c0 1.3.3 2.5.9 3.6L3.5 20.5l4.9-.9c1 .6 2.2.9 3.6.9Z"/>
                        <path d="M8.5 10.2v3.6l3-1.8z"/>
                    </svg>
                    <text x="0" y="45" text-anchor="middle" font-size="8" fill="#1152df" opacity="0.8" font-family="Inter, sans-serif">Sound Design</text>
                </g>

                <!-- Short-form/Reels - Right side -->
                <g class="floating-icon" data-service="short-form" transform="translate(370, 280)">
                    <circle r="28" fill="#1152df" opacity="0.15" filter="url(#softGlow)"/>
                    <circle r="24" fill="#1152df" opacity="0.1"/>
                    <svg viewBox="0 0 24 24" width="20" height="20" x="-10" y="-10" fill="none" stroke="#1152df" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="4" y="2" width="16" height="20" rx="4"/>
                        <path d="M8 12h8M12 8v8"/>
                    </svg>
                    <text x="0" y="45" text-anchor="middle" font-size="8" fill="#1152df" opacity="0.8" font-family="Inter, sans-serif">Short-form</text>
                </g>

                <!-- Color Grading - Right side -->
                <g class="floating-icon" data-service="color-grading" transform="translate(350, 340)">
                    <circle r="28" fill="#1152df" opacity="0.15" filter="url(#softGlow)"/>
                    <circle r="24" fill="#1152df" opacity="0.1"/>
                    <svg viewBox="0 0 24 24" width="20" height="20" x="-10" y="-10" fill="none" stroke="#1152df" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="8"/>
                        <path d="M12 4v4M12 16v4M4 12h4M16 12h4"/>
                        <circle cx="12" cy="12" r="3" fill="#1152df"/>
                    </svg>
                    <text x="0" y="45" text-anchor="middle" font-size="8" fill="#1152df" opacity="0.8" font-family="Inter, sans-serif">Color Grading</text>
                </g>

                <!-- Brand Videos - Center top -->
                <g class="floating-icon" data-service="brand-videos" transform="translate(200, 170)">
                    <circle r="28" fill="#1152df" opacity="0.15" filter="url(#softGlow)"/>
                    <circle r="24" fill="#1152df" opacity="0.1"/>
                    <svg viewBox="0 0 24 24" width="20" height="20" x="-10" y="-10" fill="none" stroke="#1152df" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="2.5" y="6" width="19" height="13" rx="3"/>
                        <path d="M6 9.8V15"/>
                        <path d="M9.6 9.8V15"/>
                        <path d="m13 10.2 3.4 2.3-3.4 2.3z"/>
                    </svg>
                    <text x="0" y="45" text-anchor="middle" font-size="8" fill="#1152df" opacity="0.8" font-family="Inter, sans-serif">Brand Videos</text>
                </g>
            </g>

            <!-- Magical particles around hands -->
            <g class="hero__magic-particles" fill="#1152df">
                <circle class="magic-particle" cx="40" cy="380" r="2">
                    <animate attributeName="cy" values="380;360;380" dur="3s" repeatCount="indefinite"/>
                    <animate attributeName="opacity" values="0.3;1;0.3" dur="3s" repeatCount="indefinite"/>
                </circle>
                <circle class="magic-particle" cx="60" cy="350" r="1.5">
                    <animate attributeName="cy" values="350;330;350" dur="2.5s" repeatCount="indefinite" begin="0.5s"/>
                    <animate attributeName="opacity" values="0.2;0.8;0.2" dur="2.5s" repeatCount="indefinite" begin="0.5s"/>
                </circle>
                <circle class="magic-particle" cx="30" cy="360" r="2.5">
                    <animate attributeName="cy" values="360;340;360" dur="3.5s" repeatCount="indefinite" begin="1s"/>
                    <animate attributeName="opacity" values="0.4;1;0.4" dur="3.5s" repeatCount="indefinite" begin="1s"/>
                </circle>
                <circle class="magic-particle" cx="360" cy="380" r="2">
                    <animate attributeName="cy" values="380;360;380" dur="3s" repeatCount="indefinite" begin="0.3s"/>
                    <animate attributeName="opacity" values="0.3;1;0.3" dur="3s" repeatCount="indefinite" begin="0.3s"/>
                </circle>
                <circle class="magic-particle" cx="340" cy="350" r="1.5">
                    <animate attributeName="cy" values="350;330;350" dur="2.5s" repeatCount="indefinite" begin="0.8s"/>
                    <animate attributeName="opacity" values="0.2;0.8;0.2" dur="2.5s" repeatCount="indefinite" begin="0.8s"/>
                </circle>
                <circle class="magic-particle" cx="370" cy="360" r="2.5">
                    <animate attributeName="cy" values="360;340;360" dur="3.5s" repeatCount="indefinite" begin="1.2s"/>
                    <animate attributeName="opacity" values="0.4;1;0.4" dur="3.5s" repeatCount="indefinite" begin="1.2s"/>
                </circle>
                <circle class="magic-particle" cx="200" cy="180" r="1.5">
                    <animate attributeName="cy" values="180;160;180" dur="4s" repeatCount="indefinite"/>
                    <animate attributeName="opacity" values="0.2;0.7;0.2" dur="4s" repeatCount="indefinite"/>
                </circle>
                <circle class="magic-particle" cx="180" cy="160" r="2">
                    <animate attributeName="cy" values="160;140;160" dur="3.5s" repeatCount="indefinite" begin="0.7s"/>
                    <animate attributeName="opacity" values="0.3;0.9;0.3" dur="3.5s" repeatCount="indefinite" begin="0.7s"/>
                </circle>
                <circle class="magic-particle" cx="220" cy="160" r="1.5">
                    <animate attributeName="cy" values="160;140;160" dur="4s" repeatCount="indefinite" begin="1.5s"/>
                    <animate attributeName="opacity" values="0.2;0.8;0.2" dur="4s" repeatCount="indefinite" begin="1.5s"/>
                </circle>
            </g>
        </svg>
    </div>

    <div class="container hero__inner">
        <!-- ── Copy ──────────────────────────────────────────────────── -->
        <div class="hero__copy" data-reveal="hero">
            <p class="eyebrow">
                <span class="eyebrow__dot" aria-hidden="true"></span>
                Creative Content Studio
            </p>

            <h1 class="hero__title" id="hero-title">
                We Craft Visual Stories
                <span class="text-gradient">That Captivate &amp; Convert</span>
            </h1>

            <p class="hero__lead">
                Professional video editing, motion graphics, thumbnail design &amp; YouTube content creation.
                From concept to final cut — we handle it all.
            </p>

            <div class="hero__actions">
                <a class="btn btn--primary btn--lg" href="book-now.php">
                    Start Your Project <?= mm_icon('arrow-right', 18) ?>
                </a>
                <a class="btn btn--ghost btn--lg" href="services.php">Explore Services</a>
            </div>

            <p class="hero__note">
                <?= mm_icon('chat', 16) ?>
                <span>Tell us about your project. We&rsquo;ll respond within 24 hours.</span>
            </p>

            <ul class="hero__pills">
                <?php
                $mm_pills = ['Video Editing', 'Motion Graphics', 'Thumbnails', 'Brand Videos', 'Social Ads', 'YouTube Content', 'Product Videos'];
                foreach ($mm_pills as $mm_pill) :
                ?>
                <li><?= e($mm_pill) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>

        <!-- Visual is handled by the absolute positioned character wrapper above -->
        <div class="hero__visual" aria-hidden="true"></div>
    </div>
</section>

<?php
// Seven-service diagram (preserved from existing)
require __DIR__ . '/includes/service-diagram.php';
?>

<!-- ===================================================================== -->
<!-- TRUST STRIP                                                          -->
<!-- ===================================================================== -->
<?php
$value_strip = mm_data('value_strip');
?>
<section class="value-strip" aria-label="Why clients trust Mexa Motion">
    <div class="container">
        <div class="value-strip__grid">
            <?php foreach ($value_strip as $i => $item) : ?>
            <div class="value-strip__item" data-reveal="trust" style="--reveal-delay: <?= (int) $i * 60 ?>ms">
                <div class="value-strip__icon" aria-hidden="true">
                    <?= mm_icon($item['icon'], 24) ?>
                </div>
                <div>
                    <h3 class="value-strip__title"><?= e($item['title']) ?></h3>
                    <p class="value-strip__text"><?= e($item['text']) ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ===================================================================== -->
<!-- FEATURED SERVICES (Three highlight cards)                            -->
<!-- ===================================================================== -->
<section class="section" aria-labelledby="featured-title">
    <div class="container">
        <header class="section-head section-head--center" data-reveal="feat">
            <p class="eyebrow">
                <span class="eyebrow__dot" aria-hidden="true"></span>
                Popular Services
            </p>
            <h2 class="section-title" id="featured-title">Most Requested Creative Services</h2>
            <p class="section-lead">
                These three services cover the majority of what our clients need. Explore the full range on our Services page.
            </p>
        </header>

        <div class="service-grid">
            <?php
            $highlight_slugs = ['video-editing', 'thumbnail-design', 'motion-graphics'];
            foreach ($featured_services as $i => $service) :
                if (!in_array($service['slug'], $highlight_slugs)) continue;
            ?>
            <div data-reveal="feat" style="--reveal-delay: <?= (int) $i * 80 ?>ms">
                <?php
                $variant = 'feature';
                require __DIR__ . '/includes/service-card.php';
                ?>
            </div>
            <?php endforeach; ?>
        </div>

        <div class="section-cta" data-reveal="feat" style="--reveal-delay: 240ms">
            <a class="btn btn--outline btn--lg" href="services.php">View All 7 Services <?= mm_icon('arrow-right', 18) ?></a>
        </div>
    </div>
</section>

<!-- ===================================================================== -->
<!-- PORTFOLIO SECTION — LONG/SHORT TABS WITH YOUTUBE EMBEDS              -->
<!-- ===================================================================== -->
<section class="section section--dark" id="portfolio" aria-labelledby="portfolio-title">
    <div class="container">
        <header class="section-head section-head--center section-head--light" data-reveal="port">
            <p class="eyebrow">
                <span class="eyebrow__dot" aria-hidden="true"></span>
                Our Work
            </p>
            <h2 class="section-title" id="portfolio-title">Portfolio — Long &amp; Short Form</h2>
            <p class="section-lead">
                Switch between long-form YouTube edits and vertical short-form content.
            </p>
        </header>

        <!-- Tab Navigation -->
        <div class="portfolio-tabs" role="tablist" aria-label="Portfolio format">
            <button class="portfolio-tab is-active" role="tab" aria-selected="true" aria-controls="panel-long" id="tab-long" data-tab="long">
                <span class="portfolio-tab__icon" aria-hidden="true">
                    <i class="fa-solid fa-desktop"></i>
                </span>
                <span class="portfolio-tab__label">Long</span>
                <span class="portfolio-tab__indicator" aria-hidden="true"></span>
            </button>
            <button class="portfolio-tab" role="tab" aria-selected="false" aria-controls="panel-short" id="tab-short" data-tab="short">
                <span class="portfolio-tab__icon" aria-hidden="true">
                    <i class="fa-solid fa-mobile-screen"></i>
                </span>
                <span class="portfolio-tab__label">Short</span>
                <span class="portfolio-tab__indicator" aria-hidden="true"></span>
            </button>
        </div>

        <!-- Long-form Panel (16:9 YouTube Videos) -->
        <div class="portfolio-panel is-active" role="tabpanel" id="panel-long" aria-labelledby="tab-long" data-panel="long">
            <div class="portfolio-grid portfolio-grid--long">
                <?php
                $long_videos = [
                    ['id' => 'dQw4w9WgXcQ', 'title' => 'Brand Documentary — Long Form Edit'],
                    ['id' => 'jNQXAC9IVRw', 'title' => 'Product Launch Video — Full Edit'],
                    ['id' => '9bZkp7q19f0', 'title' => 'Educational Series Episode — Complete Edit'],
                ];
                foreach ($long_videos as $i => $video) :
                ?>
                <article class="portfolio-video portfolio-video--long" data-reveal="port" style="--reveal-delay: <?= (int) $i * 80 ?>ms">
                    <div class="portfolio-video__wrapper">
                        <iframe
                            src="https://www.youtube.com/embed/<?= e($video['id']) ?>?rel=0&amp;modestbranding=1&amp;showinfo=0"
                            title="<?= e($video['title']) ?>"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                    <div class="portfolio-video__meta">
                        <h3 class="portfolio-video__title"><?= e($video['title']) ?></h3>
                        <span class="portfolio-video__format">
                            <i class="fa-solid fa-expand" aria-hidden="true"></i>
                            16:9 YouTube
                        </span>
                    </div>
                </article>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Short-form Panel (9:16 Vertical Videos) -->
        <div class="portfolio-panel" role="tabpanel" id="panel-short" aria-labelledby="tab-short" data-panel="short" hidden>
            <div class="portfolio-grid portfolio-grid--short">
                <?php
                $short_videos = [
                    ['id' => 'dQw4w9WgXcQ', 'title' => 'Instagram Reel — Product Showcase'],
                    ['id' => 'jNQXAC9IVRw', 'title' => 'YouTube Short — Quick Tip'],
                    ['id' => '9bZkp7q19f0', 'title' => 'TikTok Style — Brand Story'],
                ];
                foreach ($short_videos as $i => $video) :
                ?>
                <article class="portfolio-video portfolio-video--short" data-reveal="port" style="--reveal-delay: <?= (int) $i * 80 ?>ms">
                    <div class="portfolio-video__wrapper">
                        <iframe
                            src="https://www.youtube.com/embed/<?= e($video['id']) ?>?rel=0&amp;modestbranding=1&amp;showinfo=0"
                            title="<?= e($video['title']) ?>"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                    <div class="portfolio-video__meta">
                        <h3 class="portfolio-video__title"><?= e($video['title']) ?></h3>
                        <span class="portfolio-video__format">
                            <i class="fa-solid fa-mobile-screen" aria-hidden="true"></i>
                            9:16 Vertical
                        </span>
                    </div>
                </article>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="section-cta" data-reveal="port" style="--reveal-delay: 200ms">
            <a class="btn btn--primary btn--lg" href="portfolio.php">View Full Portfolio <?= mm_icon('arrow-right', 18) ?></a>
        </div>
    </div>
</section>

<?php
// Why Choose section
require_once __DIR__ . '/includes/why-choose.php';
?>

<?php
// Process / How We Work section
require_once __DIR__ . '/includes/process.php';
?>

<?php
// Review Carousel
require_once __DIR__ . '/includes/review-carousel.php';
?>

<!-- ===================================================================== -->
<!-- FINAL CTA                                                            -->
<!-- ===================================================================== -->
<?php
$cta_title   = 'Ready to Elevate Your Content?';
$cta_text    = 'From a single video to a full content strategy — we are ready when you are.';
$cta_variant = 'dark';
require __DIR__ . '/includes/cta-banner.php';
?>

<?php require __DIR__ . '/includes/footer.php'; ?>