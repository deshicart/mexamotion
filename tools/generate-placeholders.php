<?php
/**
 * Mexa Motion — placeholder artwork generator (development utility)
 * ---------------------------------------------------------------------------
 * Generates lightweight SVG placeholder artwork so the site can be built and
 * reviewed before the client supplies real photography and project media.
 *
 * Usage:  php tools/generate-placeholders.php
 *
 * These files are PLACEHOLDERS. Replace them with real, client-approved
 * assets before launch (keep the same filenames, or update the paths in
 * includes/data.php and includes/config.php).
 *
 * @package MexaMotion
 */

$root = dirname(__DIR__);

/* -------------------------------------------------------------------------
 * Helpers
 * ---------------------------------------------------------------------- */

/**
 * Deterministic pseudo-random generator so output is stable between runs.
 *
 * @param string $seed
 * @return int
 */
function mm_seed($seed)
{
    return crc32($seed);
}

/**
 * Pick a deterministic value from a list.
 *
 * @param array $items
 * @param int   $seed
 * @param int   $salt
 * @return mixed
 */
function mm_pick($items, $seed, $salt = 0)
{
    return $items[($seed + $salt * 31) % count($items)];
}

/**
 * Shared dark background + grain grid.
 *
 * @param int $w
 * @param int $h
 * @param int $seed
 * @return string
 */
function mm_bg($w, $h, $seed)
{
    $tints = [
        ['#0B1220', '#132444'],
        ['#0D1A33', '#16305C'],
        ['#101B31', '#1B2E52'],
        ['#0B1220', '#10203C'],
    ];
    list($a, $b) = mm_pick($tints, $seed, 1);
    $id = 'bg' . $seed;

    $lines = '';
    for ($x = 40; $x < $w; $x += 40) {
        $lines .= '<line x1="' . $x . '" y1="0" x2="' . $x . '" y2="' . $h . '"/>';
    }
    for ($y = 40; $y < $h; $y += 40) {
        $lines .= '<line x1="0" y1="' . $y . '" x2="' . $w . '" y2="' . $y . '"/>';
    }

    return '<defs>'
        . '<linearGradient id="' . $id . '" x1="0" y1="0" x2="1" y2="1">'
        . '<stop offset="0%" stop-color="' . $a . '"/><stop offset="100%" stop-color="' . $b . '"/>'
        . '</linearGradient>'
        . '<radialGradient id="glow' . $seed . '" cx="0.5" cy="0.5" r="0.5">'
        . '<stop offset="0%" stop-color="#3B82F6" stop-opacity="0.55"/>'
        . '<stop offset="100%" stop-color="#1152DF" stop-opacity="0"/>'
        . '</radialGradient>'
        . '</defs>'
        . '<rect width="' . $w . '" height="' . $h . '" fill="url(#' . $id . ')"/>'
        . '<g stroke="#FFFFFF" stroke-opacity="0.045" stroke-width="1">' . $lines . '</g>'
        . '<ellipse cx="' . (($seed % 7) * 80 + 120) . '" cy="' . (($seed % 5) * 60 + 90) . '" rx="' . ($w * 0.45) . '" ry="' . ($h * 0.5) . '" fill="url(#glow' . $seed . ')"/>';
}

/**
 * Motion ribbon: three stacked bezier curves.
 *
 * @param int $w
 * @param int $h
 * @param int $seed
 * @return string
 */
function mm_ribbon($w, $h, $seed)
{
    $y1 = 0.30 + (($seed % 5) * 0.05);
    $y2 = $y1 + 0.22;
    $y3 = $y2 + 0.24;

    $p = function ($v) { return round($v, 2); };

    return '<g fill="none" stroke-linecap="round">'
        . '<path d="M -20 ' . $p($h * $y3) . ' C ' . $p($w * 0.22) . ' ' . $p($h * $y1) . ', ' . $p($w * 0.38) . ' ' . $p($h * $y3) . ', ' . $p($w * 0.55) . ' ' . $p($h * $y2)
        . ' C ' . $p($w * 0.72) . ' ' . $p($h * $y1) . ', ' . $p($w * 0.84) . ' ' . $p($h * $y2) . ', ' . ($w + 20) . ' ' . $p($h * $y1) . '" '
        . 'stroke="#3B82F6" stroke-opacity="0.22" stroke-width="' . ($w * 0.012) . '"/>'
        . '<path d="M -20 ' . $p($h * ($y3 - 0.07)) . ' C ' . $p($w * 0.24) . ' ' . $p($h * ($y1 - 0.05)) . ', ' . $p($w * 0.4) . ' ' . $p($h * ($y3 - 0.07)) . ', ' . $p($w * 0.57) . ' ' . $p($h * ($y2 - 0.05))
        . ' C ' . $p($w * 0.74) . ' ' . $p($h * ($y1 - 0.05)) . ', ' . $p($w * 0.86) . ' ' . $p($h * ($y2 - 0.05)) . ', ' . ($w + 20) . ' ' . $p($h * ($y1 - 0.05)) . '" '
        . 'stroke="#8FC0FF" stroke-opacity="0.55" stroke-width="' . ($w * 0.004) . '" stroke-dasharray="14 18"/>'
        . '</g>';
}

/**
 * Keyframe diamonds and a soft play mark.
 *
 * @param int $w
 * @param int $h
 * @param int $seed
 * @return string
 */
function mm_marks($w, $h, $seed)
{
    $out = '<g stroke="#8FC0FF" stroke-opacity="0.75" stroke-width="2" fill="none">';
    for ($i = 0; $i < 4; $i++) {
        $x = ($seed + $i * 61) % $w;
        $y = ($seed * 3 + $i * 83) % $h;
        $r = 7 + ($i % 3) * 3;
        $out .= '<path d="M ' . $x . ' ' . ($y - $r) . ' l ' . $r . ' ' . $r . ' l -' . $r . ' ' . $r . ' l -' . $r . ' -' . $r . ' Z"/>';
    }
    $out .= '</g>';

    $cx = $w * 0.5;
    $cy = $h * 0.5;
    $r  = min($w, $h) * 0.13;

    $out .= '<g opacity="0.92">'
        . '<circle cx="' . round($cx, 1) . '" cy="' . round($cy, 1) . '" r="' . round($r, 1) . '" fill="#1152DF" fill-opacity="0.2" stroke="#5A9BFF" stroke-opacity="0.6"/>'
        . '<path d="M ' . round($cx - $r * 0.32, 1) . ' ' . round($cy - $r * 0.48, 1)
        . ' L ' . round($cx + $r * 0.46, 1) . ' ' . round($cy, 1)
        . ' L ' . round($cx - $r * 0.32, 1) . ' ' . round($cy + $r * 0.48, 1) . ' Z" fill="#FFFFFF" fill-opacity="0.9"/>'
        . '</g>';

    return $out;
}

/**
 * Small caption so development artwork is never mistaken for client work.
 *
 * @param int $w
 * @param int $h
 * @param string $text
 * @return string
 */
function mm_caption($w, $h, $text)
{
    $size = max(11, round($w * 0.022));
    $pad  = round($size * 0.9);

    return '<g opacity="0.55">'
        . '<rect x="' . $pad . '" y="' . ($h - $pad - $size * 2.1) . '" width="' . round($size * 0.42) . '" height="' . round($size * 0.42) . '" rx="' . round($size * 0.21) . '" fill="#8FC0FF"/>'
        . '<text x="' . round($pad + $size * 1.0) . '" y="' . ($h - $pad - $size * 0.45) . '" fill="#BFD9FF" '
        . 'font-family="Inter, Segoe UI, Arial, sans-serif" font-size="' . $size . '" font-weight="600" '
        . 'letter-spacing="' . round($size * 0.12) . '">' . htmlspecialchars($text, ENT_QUOTES) . '</text>'
        . '</g>';
}

/**
 * Build one abstract artwork SVG.
 *
 * @param string $title
 * @param int    $w
 * @param int    $h
 * @param string $caption
 * @return string
 */
function mm_artwork($title, $w, $h, $caption)
{
    $seed = mm_seed($title);

    return '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 ' . $w . ' ' . $h . '" width="' . $w . '" height="' . $h . '" role="img">'
        . '<title>' . htmlspecialchars($title, ENT_QUOTES) . ' — placeholder artwork</title>'
        . mm_bg($w, $h, $seed)
        . mm_ribbon($w, $h, $seed)
        . mm_marks($w, $h, $seed)
        . mm_caption($w, $h, $caption)
        . '</svg>';
}

/**
 * Build a placeholder team portrait SVG.
 *
 * @param string $title
 * @param int    $w
 * @param int    $h
 * @return string
 */
function mm_portrait($title, $w, $h)
{
    $seed   = mm_seed($title);
    $list   = [
        ['#123A7A', '#2C6DE6'],
        ['#1B2E52', '#4C93FF'],
        ['#0E2A63', '#3B82F6'],
        ['#16305C', '#8FC0FF'],
    ];
    list($a, $b) = mm_pick($list, $seed, 3);
    $id = 'pg' . $seed;
    $cx = $w * 0.5;

    return '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 ' . $w . ' ' . $h . '" width="' . $w . '" height="' . $h . '" role="img">'
        . '<title>' . htmlspecialchars($title, ENT_QUOTES) . ' — placeholder portrait</title>'
        . '<defs><linearGradient id="' . $id . '" x1="0" y1="0" x2="0.6" y2="1">'
        . '<stop offset="0%" stop-color="' . $a . '"/><stop offset="100%" stop-color="' . $b . '"/>'
        . '</linearGradient></defs>'
        . '<rect width="' . $w . '" height="' . $h . '" fill="' . $a . '"/>'
        . '<rect width="' . $w . '" height="' . $h . '" fill="url(#' . $id . ')" opacity="0.9"/>'
        . '<g fill="#FFFFFF" fill-opacity="0.16">'
        . '<circle cx="' . round($cx, 1) . '" cy="' . round($h * 0.38, 1) . '" r="' . round($w * 0.17, 1) . '"/>'
        . '<path d="M ' . round($cx - $w * 0.3, 1) . ' ' . $h . ' a ' . round($w * 0.3, 1) . ' ' . round($h * 0.32, 1) . ' 0 0 1 ' . round($w * 0.6, 1) . ' 0 Z"/>'
        . '</g>'
        . '<rect x="6" y="6" width="' . ($w - 12) . '" height="' . ($h - 12) . '" rx="' . round($w * 0.05, 1) . '" fill="none" stroke="#FFFFFF" stroke-opacity="0.22" stroke-width="2" stroke-dasharray="10 8"/>'
        . mm_caption($w, $h, 'Placeholder portrait')
        . '</svg>';
}

/* -------------------------------------------------------------------------
 * Generate
 * ---------------------------------------------------------------------- */

$files = [];

foreach (array_slice(mx_services_local(), 0, 7) as $slug => $title) {
    $files['assets/images/services/' . $slug . '.svg'] = mm_artwork($title, 900, 600, 'Service artwork · placeholder');
}

$portfolio = [
    'creator-documentary'    => 'Creator Documentary Edit',
    'saas-launch-motion'     => 'SaaS Launch Motion Package',
    'channel-thumbnail-system' => 'Channel Thumbnail System',
    'company-profile-film'   => 'Company Profile Film',
    'long-form-series'       => 'Long-Form Series Editing',
    'vertical-ad-variants'   => 'Vertical Ad Variants',
    'product-showcase-series' => 'Product Showcase Series',
    'podcast-visual-package' => 'Podcast Visual Package',
];

foreach ($portfolio as $slug => $title) {
    $files['assets/images/portfolio/' . $slug . '.svg'] = mm_artwork($title, 960, 600, 'Sample project artwork');
}

$about = [
    'studio-collage' => 'Mexa Motion Studio Collage',
    'process-board'  => 'Creative Process Board',
];
foreach ($about as $slug => $title) {
    $files['assets/images/about/' . $slug . '.svg'] = mm_artwork($title, 900, 700, 'Placeholder studio image');
}

$team = [
    'member-1' => 'Creative Direction',
    'member-2' => 'Video Editing',
    'member-3' => 'Motion Graphics',
    'member-4' => 'Thumbnail Design',
];
foreach ($team as $slug => $title) {
    $files['assets/images/team/' . $slug . '.svg'] = mm_portrait($title, 480, 600);
}

$written = 0;
foreach ($files as $relative => $contents) {
    $path = $root . '/' . $relative;
    $dir  = dirname($path);
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }
    file_put_contents($path, $contents);
    $written++;
    echo 'wrote ' . $relative . PHP_EOL;
}

echo PHP_EOL . 'Generated ' . $written . ' placeholder files.' . PHP_EOL;

/**
 * Service slugs and titles, read from the real data file so the two never
 * drift apart.
 *
 * @return array<string,string>
 */
function mx_services_local()
{
    require_once __DIR__ . '/../includes/data.php';

    $map = [];
    foreach (mm_all_data()['services'] as $service) {
        $map[$service['slug']] = $service['title'];
    }

    return $map;
}