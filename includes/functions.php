<?php
/**
 * Mexa Motion — Shared helper functions
 * ---------------------------------------------------------------------------
 * Small, dependency-free utilities used across every page and component.
 *
 * @package MexaMotion
 */

if (!defined('MM_ABSPATH')) {
    define('MM_ABSPATH', dirname(__DIR__));
}

require_once __DIR__ . '/config.php';

/* -------------------------------------------------------------------------
 * Output escaping
 * ---------------------------------------------------------------------- */

/**
 * Escape a value for safe HTML output.
 *
 * @param mixed $value
 * @return string
 */
function e($value)
{
    return htmlspecialchars((string) $value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

/**
 * Escape a value for use inside a JavaScript string / data attribute.
 *
 * @param mixed $value
 * @return string
 */
function ejs($value)
{
    return htmlspecialchars((string) $value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

/**
 * Build a safe absolute URL from a relative path.
 *
 * @param string $path
 * @return string
 */
function mm_asset($path)
{
    return mm_url($path);
}

/**
 * Build a wa.me deep link with a URL-encoded, line-break friendly message.
 *
 * @param string $message
 * @return string
 */
function mm_whatsapp_link($message)
{
    $number = preg_replace('/\D+/', '', (string) mm_config('contact.whatsapp'));
    $clean  = preg_replace("/\r\n|\r|\n/", "\n", (string) $message);
    $text   = rawurlencode($clean);

    return 'https://wa.me/' . $number . '?text=' . $text;
}

/* -------------------------------------------------------------------------
 * Media helpers
 * ---------------------------------------------------------------------- */

/**
 * Return the SVG markup for a named brand icon.
 *
 * Icons are inline SVG (no icon font, no extra request) and use currentColor
 * so they inherit the surrounding text colour.
 *
 * @param string $name
 * @param int    $size
 * @param string $class
 * @return string
 */
function mm_icon($name, $size = 24, $class = '')
{
    static $paths = null;

    if ($paths === null) {
        $paths = [
            'video-editing' => '<rect x="2.5" y="5" width="14" height="14" rx="3"/><path d="M16.5 10.5 21.5 7.5v9l-5-3z"/><path d="m7.4 9.6 4 2.4-4 2.4z"/>',
            'motion-graphics' => '<path d="M3 12h4l2.5-7 5 14L17 12h4"/><circle cx="3" cy="12" r="1.4"/><circle cx="21" cy="12" r="1.4"/>',
            'thumbnail'   => '<rect x="2.5" y="4.5" width="19" height="15" rx="3"/><circle cx="8.5" cy="10" r="2"/><path d="m3.5 17 5-4.5 4 3.5 3.5-2.5 5 4"/><path d="M17 9.5v5"/><path d="M14.5 12h5"/>',
            'brand-video' => '<rect x="2.5" y="6" width="19" height="13" rx="3"/><path d="M6 9.8V15"/><path d="M9.6 9.8V15"/><path d="m13 10.2 3.4 2.3-3.4 2.3z"/>',
            'youtube'     => '<rect x="2.5" y="5" width="19" height="14" rx="4.5"/><path d="m10.2 9.3 4.8 2.7-4.8 2.7z"/>',
            'social-ads'  => '<path d="M12 20.5c4.7 0 8.5-3.8 8.5-8.5S16.7 3.5 12 3.5 3.5 7.3 3.5 12c0 1.3.3 2.5.9 3.6L3.5 20.5l4.9-.9c1 .6 2.2.9 3.6.9Z"/><path d="M8.5 10.2v3.6l3-1.8z"/>',
            'product-video' => '<path d="M3.5 8.5 12 4l8.5 4.5v7L12 20l-8.5-4.5z"/><path d="M3.5 8.5 12 13l8.5-4.5"/><path d="M12 13v7"/>',
            'arrow-right' => '<path d="M4 12h15"/><path d="m13.5 6.5 6 5.5-6 5.5"/>',
            'arrow-left'  => '<path d="M20 12H5"/><path d="m10.5 17.5-6-5.5 6-5.5"/>',
            'chevron-down' => '<path d="m5.5 9 6.5 6.5L18.5 9"/>',
            'check'       => '<path d="m4.5 12.5 4.8 4.8L19.5 7"/>',
            'spark'       => '<path d="M12 3v4M12 17v4M3 12h4M17 12h4M6 6l2.5 2.5M15.5 15.5 18 18M18 6l-2.5 2.5M8.5 15.5 6 18"/>',
            'target'      => '<circle cx="12" cy="12" r="8"/><circle cx="12" cy="12" r="4"/><circle cx="12" cy="12" r="1"/>',
            'layers'      => '<path d="m12 3 8.5 4.5L12 12 3.5 7.5z"/><path d="m3.5 12 8.5 4.5 8.5-4.5"/><path d="m3.5 16.5 8.5 4.5 8.5-4.5"/>',
            'clock'       => '<circle cx="12" cy="12" r="8.5"/><path d="M12 7.5V12l3.2 2"/>',
            'chat'        => '<path d="M20.5 11.5c0 4.1-3.8 7.4-8.5 7.4-1.2 0-2.4-.2-3.4-.6l-5 1.4 1.5-4.4c-1-1.3-1.6-2.8-1.6-4.4 0-4.1 3.8-7.4 8.5-7.4s8.5 3.3 8.5 7.8Z"/>',
            'phone'       => '<path d="M6.5 3.5h3l1.5 4-2 1.4a12 12 0 0 0 6.1 6.1l1.4-2 4 1.5v3a2 2 0 0 1-2.2 2A16.5 16.5 0 0 1 4.5 5.7a2 2 0 0 1 2-2.2Z"/>',
            'mail'        => '<rect x="2.5" y="5" width="19" height="14" rx="3"/><path d="m3.5 7.5 8.5 6 8.5-6"/>',
            'pin'         => '<path d="M12 21s7-5.3 7-11a7 7 0 1 0-14 0c0 5.7 7 11 7 11Z"/><circle cx="12" cy="10" r="2.6"/>',
            'star'        => '<path d="m12 3.6 2.6 5.3 5.8.8-4.2 4.1 1 5.8-5.2-2.8-5.2 2.8 1-5.8L3.6 9.7l5.8-.8z"/>',
            'quote'       => '<path d="M9.5 6.5C6.6 7.6 5 10 5 13v4.5h5.5V12H7.8c.1-1.5.8-2.5 2.2-3.1z"/><path d="M18.5 6.5C15.6 7.6 14 10 14 13v4.5h5.5V12h-2.7c.1-1.5.8-2.5 2.2-3.1z"/>',
            'menu'        => '<path d="M4 7h16M4 12h16M4 17h16"/>',
            'close'       => '<path d="m6 6 12 12M18 6 6 18"/>',
            'play'        => '<path d="M8 5.5 18.5 12 8 18.5z"/>',
            'pause'       => '<path d="M9 5.5v13M15 5.5v13"/>',
            'user'        => '<circle cx="12" cy="8" r="4"/><path d="M4.5 20.5a7.5 7.5 0 0 1 15 0"/>',
            'filter'      => '<path d="M3.5 5.5h17l-6.5 8v6l-4 2v-8z"/>',
            'eye'         => '<path d="M2.5 12S6 6 12 6s9.5 6 9.5 6-3.5 6-9.5 6-9.5-6-9.5-6Z"/><circle cx="12" cy="12" r="2.8"/>',
            'shield'      => '<path d="M12 3.2 19 6v5.6c0 4.2-2.8 7.6-7 9.2-4.2-1.6-7-5-7-9.2V6z"/><path d="m9 12 2.2 2.2L15.3 10"/>',
            'grid'        => '<rect x="3.5" y="3.5" width="7" height="7" rx="2"/><rect x="13.5" y="3.5" width="7" height="7" rx="2"/><rect x="3.5" y="13.5" width="7" height="7" rx="2"/><rect x="13.5" y="13.5" width="7" height="7" rx="2"/>',
            'search'      => '<circle cx="11" cy="11" r="6.5"/><path d="m16 16 4.5 4.5"/>',
            'home'        => '<path d="M3.5 10.5 12 3.5l8.5 7"/><path d="M5.5 9.5V20h13V9.5"/><path d="M9.5 20v-5.5h5V20"/>',
            'clipboard'   => '<rect x="5" y="4.5" width="14" height="16" rx="2.5"/><path d="M9 4.5V3.8A1.3 1.3 0 0 1 10.3 2.5h3.4A1.3 1.3 0 0 1 15 3.8v.7z"/><path d="M9 11h6M9 15h4"/>',
            'external'    => '<path d="M14 4.5h5.5V10"/><path d="m19.5 4.5-8 8"/><path d="M18 14.5v4a1.5 1.5 0 0 1-1.5 1.5h-11A1.5 1.5 0 0 1 4 18.5v-11A1.5 1.5 0 0 1 5.5 6h4"/>',
            'facebook'    => '<path d="M13.5 21v-8h2.7l.4-3.1h-3.1V7.9c0-.9.25-1.5 1.55-1.5h1.65V3.6A22 22 0 0 0 14.3 3.5c-2.4 0-4 1.45-4 4.12V9.9H7.6V13h2.7v8z"/>',
            'youtube-icon'=> '<path d="M21.3 8.3a3 3 0 0 0-2.1-2.1C17.3 5.7 12 5.7 12 5.7s-5.3 0-7.2.5A3 3 0 0 0 2.7 8.3 31 31 0 0 0 2.2 12c0 1.2.2 2.5.5 3.7a3 3 0 0 0 2.1 2.1c1.9.5 7.2.5 7.2.5s5.3 0 7.2-.5a3 3 0 0 0 2.1-2.1c.3-1.2.5-2.5.5-3.7s-.2-2.5-.5-3.7Z"/><path d="m10.2 15.1 4.8-3.1-4.8-3.1z"/>',
            'instagram'   => '<rect x="3.5" y="3.5" width="17" height="17" rx="5"/><circle cx="12" cy="12" r="4"/><path d="M17 7.2h.01"/>',
            'linkedin'    => '<rect x="3.5" y="3.5" width="17" height="17" rx="3"/><path d="M8 10.5V17"/><path d="M8 7.4h.01"/><path d="M12 17v-3.6a2.4 2.4 0 0 1 4.8 0V17"/>',
            'behance'     => '<path d="M3.5 6.5h5.2a3 3 0 0 1 0 6H3.5z"/><path d="M3.5 12.5h5.7a3 3 0 0 1 0 6H3.5z"/><path d="M15.5 10.5a3 3 0 0 1 5.5 1.7h-5.5a2.7 2.7 0 0 0 5.2 1"/><path d="M14 6.5h6"/>',
            'tiktok'      => '<path d="M14.5 3.5v10.9a3.6 3.6 0 1 1-3.2-3.57"/><path d="M14.5 3.5c.5 2.3 2 3.7 4.4 3.9"/>',
            'whatsapp'    => '<path d="M3.8 20.2 5 16.6a7.9 7.9 0 1 1 3 3z"/><path d="M9 8.6c.3-.7.6-.7.9-.7h.6c.2 0 .5 0 .7.6l.8 1.9c.1.3 0 .5-.2.7l-.5.6c-.1.2-.3.4-.1.7a6.6 6.6 0 0 0 3 2.6c.3.1.5 0 .7-.2l.6-.7c.2-.2.4-.2.7-.1l1.8.9c.3.1.5.3.5.5v.6c0 .4-.5 1-1.1 1.2-2.9.9-6.3-1.2-8-3-1.3-1.3-2.2-3-2.2-4.6 0-.6.2-1 .6-1.3Z"/>',
        ];
    }

    if (!isset($paths[$name])) {
        return '';
    }

    $size = (int) $size;
    $cls  = $class !== '' ? ' class="' . e($class) . '"' : '';

    return '<svg' . $cls . ' width="' . $size . '" height="' . $size . '" viewBox="0 0 24 24" fill="none" '
        . 'stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" '
        . 'aria-hidden="true" focusable="false">' . $paths[$name] . '</svg>';
}

/* -------------------------------------------------------------------------
 * Data access helpers (defined in includes/data.php)
 * ---------------------------------------------------------------------- */

/**
 * Return the seven Mexa Motion services.
 *
 * @return array<int,array<string,mixed>>
 */
function mm_services()
{
    return mm_data('services');
}

/**
 * Look up a single service by slug.
 *
 * @param string $slug
 * @return array<string,mixed>|null
 */
function mm_service($slug)
{
    foreach (mm_services() as $service) {
        if ($service['slug'] === $slug) {
            return $service;
        }
    }

    return null;
}

/**
 * Return portfolio projects.
 *
 * @return array<int,array<string,mixed>>
 */
function mm_projects()
{
    return mm_data('projects');
}

/**
 * Return testimonials.
 *
 * @return array<int,array<string,mixed>>
 */
function mm_reviews()
{
    return mm_data('reviews');
}

/**
 * Return team members.
 *
 * @return array<int,array<string,mixed>>
 */
function mm_team()
{
    return mm_data('team');
}

/**
 * Resolve a static content collection by key.
 *
 * @param string $key
 * @return array<int,array<string,mixed>>
 */
function mm_data($key)
{
    static $store = null;

    if ($store === null) {
        require_once __DIR__ . '/data.php';
        $store = mm_all_data();
    }

    return isset($store[$key]) ? $store[$key] : [];
}

/**
 * Normalise a heading into an anchor-friendly id.
 *
 * @param string $text
 * @return string
 */
function mm_slug($text)
{
    $text = strtolower(trim((string) $text));
    $text = preg_replace('/[^a-z0-9]+/', '-', $text);

    return trim($text, '-');
}

/**
 * Render a star rating as an accessible SVG row.
 *
 * @param int  $rating  0–5
 * @param bool $decorative
 * @return string
 */
function mm_stars($rating, $decorative = true)
{
    $rating = max(0, min(5, (int) $rating));
    $star   = '<svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" focusable="false">'
        . '<path d="m12 3.6 2.6 5.3 5.8.8-4.2 4.1 1 5.8-5.2-2.8-5.2 2.8 1-5.8L3.6 9.7l5.8-.8z"/></svg>';

    $attrs = $decorative
        ? ' role="presentation"'
        : ' role="img" aria-label="' . e($rating) . ' out of 5 stars"';

    return '<span class="stars"' . $attrs . '>' . str_repeat($star, $rating) . '</span>';
}