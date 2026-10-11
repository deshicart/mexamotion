<?php
/**
 * Mexa Motion — Central Site Configuration
 * ---------------------------------------------------------------------------
 * This is the ONE file to edit for brand, contact and SEO settings.
 * No database is used in Version 1.
 *
 * @package MexaMotion
 */

if (!function_exists('mm_config')) {

    /**
     * Global configuration store.
     *
     * @var array<string,mixed>
     */
    $GLOBALS['MM_CONFIG'] = [

        /* ------------------------------------------------------------------
         * 1. BRAND
         * ---------------------------------------------------------------- */
        'brand' => [
            'name'           => 'Mexa Motion',
            'short_name'     => 'Mexa Motion',
            'legal_name'     => 'Mexa Motion',
            'tagline'        => 'Video Editing, Motion Graphics & Creative Content',
            'description'    => 'Mexa Motion is a creative content studio producing video editing, motion graphics, thumbnails, brand videos and social content for brands and creators.',
            'logo_mark'      => 'assets/images/brand/logo-rounded.png', // Square "M" mark (used in the service diagram)
            'logo_lockup'    => 'assets/images/brand/logo-square.png',   // Full "MEXA MOTION" lockup (header / footer)
            'logo_light'     => 'assets/images/brand/logo-white.svg',   // White variant for dark backgrounds
            'hero_character' => 'assets/images/brand/hero-character.svg', // Homepage hero character illustration
            'favicon'        => 'assets/images/brand/favicon.png',
            'apple_touch'    => 'assets/images/brand/logo-rounded.png',
            'theme_color'    => '#1152DF',
        ],

        /* ------------------------------------------------------------------
         * 2. SITE / URL
         * Update "url" to the live domain before deployment.
         * ---------------------------------------------------------------- */
        'site' => [
            'url'       => 'https://mexamotion.com',
            'locale'    => 'en',
            'language'  => 'English',
            'timezone'  => 'Asia/Dhaka',
            'copyright' => 'Mexa Motion',
        ],

        /* ------------------------------------------------------------------
         * 3. CONTACT DETAILS
         *
         * !! PLACEHOLDER CONTENT — REPLACE BEFORE LAUNCH !!
         * Every contact value below is a placeholder supplied by the build
         * process. Replace each one with the client's real details and set
         * 'is_placeholder' => false so the development notice disappears
         * from the footer and the Book Now form.
         * ---------------------------------------------------------------- */
        'contact' => [
            'is_placeholder' => true, // <-- set to false once real details are added

            // Digits only, with country code and no "+" / spaces. Example: 8801700000000
            'whatsapp'        => '8801700000000',
            'whatsapp_label'  => '+880 1700-000000',

            'email'           => 'hello@mexamotion.com',
            'email_label'     => 'hello@mexamotion.com',

            'hours'           => 'Sunday – Friday, 10:00 – 19:00 (GMT+6)',
            'response_note'   => 'Replies are typically sent within one business day.',

            // Placeholder address — replace or remove before launch.
            'address'         => 'Studio address to be confirmed',
            'city'            => 'Dhaka, Bangladesh',
            'country'         => 'Bangladesh',
        ],

        /* ------------------------------------------------------------------
         * 4. SOCIAL LINKS
         * !! PLACEHOLDER HANDLES — REPLACE BEFORE LAUNCH !!
         * ---------------------------------------------------------------- */
        'social' => [
            'is_placeholder' => true,
            'facebook'       => 'https://facebook.com/',
            'youtube'        => 'https://youtube.com/',
            'instagram'      => 'https://instagram.com/',
            'linkedin'       => 'https://linkedin.com/',
            'behance'        => 'https://behance.net/',
            'tiktok'         => 'https://tiktok.com/',
        ],

        /* ------------------------------------------------------------------
         * 5. SEO DEFAULTS
         * Individual pages override "title" and "description" in their own
         * $page_meta array; these values are used as the fallback.
         * ---------------------------------------------------------------- */
        'seo' => [
            'og_image'        => 'assets/images/brand/logo-square.png',
            'twitter_card'    => 'summary_large_image',
            'theme_color'     => '#1152DF',
            'indexable'       => true,
        ],

        /* ------------------------------------------------------------------
         * 6. INQUIRY HANDOFF
         * 'primary'  — where a validated inquiry is sent after review step.
         *   'whatsapp' : build an encoded wa.me deep link (Version 1 default).
         *   'email'    : send server-side mail() and only report success
         *                when the mail transport reports success.
         * 'show_alternative' — always offer the other channel as a fallback.
         * ---------------------------------------------------------------- */
        'inquiry' => [
            'primary'           => 'whatsapp',
            'show_alternative'  => true,
            'privacy_note'      => 'Your details are only used to reply to this inquiry. Version 1 of this website has no database and no admin panel, so nothing is stored on the server.',
            'terms_note'        => 'Submitting this form sends a project inquiry. It does not confirm an appointment, accept a project, or guarantee a delivery date.',
        ],

        /* ------------------------------------------------------------------
         * 7. FORM SPAM PROTECTION (Version 1)
         * ---------------------------------------------------------------- */
        'security' => [
            'honeypot_field'   => 'mm_website',  // Bots fill this hidden field
            'min_seconds'      => 3,             // Minimum seconds between page load and submit
            'max_per_hour'     => 8,             // Simple file-based rate limit per IP
        ],
    ];

    /**
     * Read a configuration value using dot notation.
     *
     * Example: mm_config('contact.whatsapp')
     *
     * @param string $path
     * @param mixed  $default
     * @return mixed
     */
    function mm_config($path, $default = null)
    {
        $segments = explode('.', $path);
        $node     = $GLOBALS['MM_CONFIG'];

        foreach ($segments as $segment) {
            if (!is_array($node) || !array_key_exists($segment, $node)) {
                return $default;
            }
            $node = $node[$segment];
        }

        return $node;
    }

    /**
     * Base URL helper (no trailing slash).
     *
     * @param string $path
     * @return string
     */
    function mm_url($path = '')
    {
        $base = rtrim((string) mm_config('site.url', ''), '/');
        $path = ltrim((string) $path, '/');

        return $path === '' ? $base : $base . '/' . $path;
    }
}