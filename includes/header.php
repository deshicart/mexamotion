<?php
/**
 * Mexa Motion — Shared document head and page header.
 *
 * Pages set these before including this file:
 *   $page_meta = ['title' => ..., 'description' => ..., 'path' => ..., 'og' => ...]
 *   $page_nav  = 'home' | 'services' | 'portfolio' | 'reviews' | 'about' | 'team' | 'book'
 *   $body_class
 *
 * @package MexaMotion
 */

if (!defined('MM_ABSPATH')) {
    require_once __DIR__ . '/functions.php';
}

$page_meta = isset($page_meta) && is_array($page_meta) ? $page_meta : [];
$page_nav  = isset($page_nav) ? $page_nav : '';
$body_class = isset($body_class) ? $body_class : '';

$mm_title = isset($page_meta['title'])
    ? $page_meta['title']
    : mm_config('brand.name') . ' | Video Editing & Creative Content';

$mm_description = isset($page_meta['description'])
    ? $page_meta['description']
    : mm_config('brand.description');

$mm_path  = isset($page_meta['path']) ? $page_meta['path'] : '/';
$mm_canon = mm_url(ltrim($mm_path, '/'));
$mm_og    = !empty($page_meta['og']) ? $page_meta['og'] : mm_config('seo.og_image');

$mm_nav_items = [
    ['key' => 'home',      'label' => 'Home',      'href' => 'index.php',      'icon' => 'home'],
    ['key' => 'services',  'label' => 'Services',  'href' => 'services.php',   'icon' => 'layers'],
    ['key' => 'portfolio', 'label' => 'Portfolio', 'href' => 'portfolio.php',  'icon' => 'eye'],
    ['key' => 'reviews',   'label' => 'Reviews',   'href' => 'reviews.php',    'icon' => 'star'],
    ['key' => 'about',     'label' => 'About',     'href' => 'about.php',      'icon' => 'spark'],
    ['key' => 'team',      'label' => 'Our Team',  'href' => 'team.php',       'icon' => 'user'],
];

$mm_nav = static function ($key) use ($page_nav) {
    return $key === $page_nav ? ' aria-current="page"' : '';
};
$mm_nav_class = static function ($key) use ($page_nav) {
    return $key === $page_nav ? ' is-active' : '';
};
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= e($mm_title) ?></title>
<meta name="description" content="<?= e($mm_description) ?>">
<?php if (empty(mm_config('seo.indexable')) || !empty($page_meta['noindex'])): ?>
<meta name="robots" content="noindex, follow">
<?php endif; ?>
<link rel="canonical" href="<?= e($mm_canon) ?>">

<!-- Open Graph -->
<meta property="og:type" content="website">
<meta property="og:site_name" content="<?= e(mm_config('brand.name')) ?>">
<meta property="og:locale" content="en_US">
<meta property="og:title" content="<?= e($mm_title) ?>">
<meta property="og:description" content="<?= e($mm_description) ?>">
<meta property="og:url" content="<?= e($mm_canon) ?>">
<meta property="og:image" content="<?= e(mm_url($mm_og)) ?>">
<meta property="og:image:alt" content="<?= e(mm_config('brand.name')) ?>">

<!-- Twitter -->
<meta name="twitter:card" content="<?= e(mm_config('seo.twitter_card')) ?>">
<meta name="twitter:title" content="<?= e($mm_title) ?>">
<meta name="twitter:description" content="<?= e($mm_description) ?>">
<meta name="twitter:image" content="<?= e(mm_url($mm_og)) ?>">

<meta name="theme-color" content="<?= e(mm_config('seo.theme_color')) ?>">
<meta name="author" content="<?= e(mm_config('brand.name')) ?>">

<link rel="icon" type="image/png" href="<?= e(mm_config('brand.favicon')) ?>">
<link rel="apple-touch-icon" href="<?= e(mm_config('brand.apple_touch')) ?>">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="preload" as="image" href="<?= e(mm_config('brand.logo_lockup')) ?>">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:wght@600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="assets/css/style.css?v=1.0.0">

<?php if (!empty($page_meta['head'])) : ?>
<?= $page_meta['head'] /* Trusted, developer-authored markup only. */ ?>
<?php endif; ?>
</head>

<body class="<?= e($body_class) ?>">

<a class="skip-link" href="#main">Skip to main content</a>

<header class="site-header" id="site-header" data-header>
    <div class="container site-header__inner">

        <a class="brand" href="index.php" aria-label="<?= e(mm_config('brand.name')) ?> — home">
            <img class="brand__logo"
                 src="<?= e(mm_config('brand.logo_lockup')) ?>"
                 alt="<?= e(mm_config('brand.name')) ?>"
                 width="526" height="434" loading="eager" decoding="async">
        </a>

        <nav class="site-nav" id="primary-nav" aria-label="Primary">
            <ul class="site-nav__list">
                <?php foreach ($mm_nav_items as $item) : ?>
                <li class="site-nav__item">
                    <a class="site-nav__link<?= $mm_nav_class($item['key']) ?>" href="<?= e($item['href']) ?>"<?= $mm_nav($item['key']) ?>>
                        <?= e($item['label']) ?>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
        </nav>

        <div class="site-header__actions">
            <a class="btn btn--primary btn--sm site-header__cta" href="book-now.php">Book Now</a>

            <button class="nav-toggle"
                    type="button"
                    id="nav-toggle"
                    aria-expanded="false"
                    aria-controls="mobile-nav"
                    aria-label="Open navigation menu">
                <span class="nav-toggle__bars" aria-hidden="true"><span></span><span></span><span></span></span>
            </button>
        </div>

    </div>
</header>

<?php
/*
 * The mobile drawer is intentionally a sibling of <header>, not a child.
 * .site-header uses backdrop-filter, which turns it into the containing block
 * for position:fixed descendants — that trapped the drawer inside the 72px
 * header band and clipped every link. As a direct child of <body> the drawer
 * resolves against the viewport again.
 */
?>
<div class="mobile-nav" id="mobile-nav" data-mobile-nav hidden>
    <div class="mobile-nav__panel" role="dialog" aria-modal="true" aria-label="Site navigation">
        <div class="mobile-nav__head">
            <img class="mobile-nav__logo" src="<?= e(mm_config('brand.logo_lockup')) ?>"
                 alt="<?= e(mm_config('brand.name')) ?>" width="150" height="124" loading="lazy" decoding="async">
            <button class="mobile-nav__close" type="button" data-nav-close aria-label="Close navigation menu">
                <?= mm_icon('close', 22) ?>
            </button>
        </div>

        <nav class="mobile-nav__links" aria-label="Mobile">
            <ul class="mobile-nav__list">
                <?php foreach ($mm_nav_items as $i => $item) : ?>
                <li class="mobile-nav__item" style="--i:<?= (int) $i ?>">
                    <a href="<?= e($item['href']) ?>"
                       class="mobile-nav__link<?= $item['key'] === $page_nav ? ' is-active' : '' ?>"
                       <?= $item['key'] === $page_nav ? 'aria-current="page"' : '' ?>>
                        <span class="mobile-nav__link-icon" aria-hidden="true">
                            <?= mm_icon($item['icon'], 20) ?>
                        </span>
                        <span class="mobile-nav__link-label"><?= e($item['label']) ?></span>
                        <span class="mobile-nav__link-arrow" aria-hidden="true">
                            <?= mm_icon('arrow-right', 18) ?>
                        </span>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
        </nav>

        <div class="mobile-nav__foot">
            <a class="btn btn--primary btn--block" href="book-now.php">Book Now</a>
            <a class="mobile-nav__contact" href="tel:<?= e(preg_replace('/\D+/', '', mm_config('contact.whatsapp'))) ?>">
                <?= mm_icon('phone', 16) ?> <?= e(mm_config('contact.whatsapp_label')) ?>
            </a>
        </div>
    </div>
    <button class="mobile-nav__scrim" type="button" data-nav-close tabindex="-1" aria-hidden="true"></button>
</div>

<main id="main">