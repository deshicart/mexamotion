<?php
/**
 * Seven-service visual diagram (mandatory homepage feature).
 *
 * Desktop (>= 1120px) renders the central Mexa Motion logo card connected to
 * seven service cards with thin blue curved SVG paths.
 * Tablet / mobile render the same content as a stacked grid so nothing is
 * shrunk into an unreadable miniature.
 *
 * @package MexaMotion
 */

if (!defined('MM_ABSPATH')) {
    require_once __DIR__ . '/functions.php';
}

$mm_diagram_services = mm_services();

/* Connector geometry (viewBox 0 0 1240 720) — one path per service card. */
$mm_connector_paths = [
    'M 484 320 C 400 320, 330 69, 250 69',
    'M 484 360 C 410 360, 330 360, 250 360',
    'M 484 400 C 400 400, 330 629, 250 629',
    'M 756 320 C 840 320, 910 69, 990 69',
    'M 756 360 C 830 360, 910 360, 990 360',
    'M 756 400 C 840 400, 910 629, 990 629',
    'M 620 280 C 600 240, 640 180, 620 130',
];
?>
<section class="section section--dark diagram-section" id="services" aria-labelledby="diagram-title">
    <div class="container">

        <header class="section-head section-head--center">
            <p class="eyebrow">
                <span class="eyebrow__dot" aria-hidden="true"></span>
                What We Do
            </p>
            <h2 class="section-title" id="diagram-title">Seven Services, One Creative Team</h2>
            <p class="section-lead">
                Every project starts with the same question: what does this content need to achieve?
                These are the services we build around that answer.
            </p>
        </header>

        <div class="diagram" data-diagram>

            <svg class="diagram__lines" viewBox="0 0 1240 720" preserveAspectRatio="xMidYMid meet" aria-hidden="true" focusable="false">
                <defs>
                    <linearGradient id="lineGrad" x1="250" y1="360" x2="990" y2="360" gradientUnits="userSpaceOnUse">
                        <stop offset="0%" stop-color="#1152DF"/>
                        <stop offset="50%" stop-color="#4C93FF"/>
                        <stop offset="100%" stop-color="#1152DF"/>
                    </linearGradient>
                    <filter id="lineGlow" x="-30%" y="-30%" width="160%" height="160%">
                        <feGaussianBlur stdDeviation="4" result="blur"/>
                        <feMerge><feMergeNode in="blur"/><feMergeNode in="SourceGraphic"/></feMerge>
                    </filter>
                </defs>

                <g class="diagram__lines-group">
                    <?php foreach ($mm_connector_paths as $mm_i => $mm_path) : ?>
                    <path class="diagram__line-shadow"
                          d="<?= e($mm_path) ?>"
                          fill="none"
                          stroke="#3B82F6" stroke-opacity="0.22" stroke-width="7" stroke-linecap="round"/>
                    <path class="diagram__line"
                          id="diagram-line-<?= (int) $mm_i + 1 ?>"
                          d="<?= e($mm_path) ?>"
                          fill="none"
                          stroke="url(#lineGrad)"
                          stroke-width="2.2"
                          stroke-linecap="round"
                          filter="url(#lineGlow)"/>
                    <path class="diagram__line-flow"
                          d="<?= e($mm_path) ?>"
                          fill="none"
                          stroke="#BFD9FF" stroke-width="2.2"
                          stroke-linecap="round"
                          stroke-dasharray="6 190"/>
                    <?php endforeach; ?>
                </g>
            </svg>

            <div class="diagram__hub">
                <a class="diagram__hub-card"
                   href="services.php">
                    <span class="diagram__hub-glow" aria-hidden="true"></span>
                    <img class="diagram__hub-logo"
                         src="<?= e(mm_config('brand.logo_mark')) ?>"
                         alt="<?= e(mm_config('brand.name')) ?>"
                         width="120" height="120" loading="lazy" decoding="async">
                    <span class="diagram__hub-name">Mexa Motion</span>
                    <span class="diagram__hub-sub">Creative Content Studio</span>
                    <span class="diagram__hub-cta">
                        View all services <?= mm_icon('arrow-right', 14) ?>
                    </span>
                </a>
            </div>

            <ul class="diagram__nodes">
                <?php foreach ($mm_diagram_services as $mm_i => $mm_service) : ?>
                <li class="diagram__node">
                    <a class="diagram__card"
                       href="services.php#<?= e($mm_service['slug']) ?>"
                       data-diagram-link="<?= (int) $mm_i + 1 ?>">
                        <span class="diagram__card-icon" aria-hidden="true">
                            <?= mm_icon($mm_service['icon'], 22) ?>
                        </span>
                        <span class="diagram__card-body">
                            <span class="diagram__card-title"><?= e($mm_service['title']) ?></span>
                            <span class="diagram__card-tag"><?= e($mm_service['tagline']) ?></span>
                        </span>
                        <span class="diagram__card-arrow" aria-hidden="true">
                            <?= mm_icon('arrow-right', 16) ?>
                        </span>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <p class="diagram__hint">
            <?= mm_icon('target', 16) ?>
            <span>Select any service to see what it includes, or
                <a href="book-now.php">send a project inquiry</a>.</span>
        </p>

    </div>
</section>