<?php
/**
 * Mexa Motion — Static Content (Version 1, no database)
 * ---------------------------------------------------------------------------
 * ALL editable website content lives in this file.
 *
 * Replace the clearly-marked PLACEHOLDER entries with client-approved copy,
 * real portfolio work, real testimonials and real team profiles before launch.
 *
 * Every entry keeps a 'placeholder' => true|false flag. While a flag is true
 * the front end renders a discreet "sample content" badge so development
 * content is never mistaken for genuine client work.
 *
 * @package MexaMotion
 */

/**
 * Return every static content collection.
 *
 * @return array<string,array<int,array<string,mixed>>>
 */
function mm_all_data()
{
    static $data = null;

    if ($data !== null) {
        return $data;
    }

    /* =====================================================================
     * SERVICES — the seven Mexa Motion services
     * ================================================================== */
    $services = [
        [
            'slug'        => 'video-editing',
            'title'       => 'Video Editing',
            'tagline'     => 'YouTube & Social Media',
            'icon'        => 'video-editing',
            'summary'     => 'Polished edits for creators, brands, and social platforms.',
            'intro'       => 'Good editing makes a video feel considered rather than assembled. We shape pacing, structure, sound and colour so a cut reads clearly, holds attention, and matches how the audience will actually watch it.',
            'use_cases'   => [
                'YouTube long-form edits',
                'Podcast and interview cut-downs',
                'Promotional and announcement edits',
                'Event recaps and highlight reels',
            ],
            'deliverables' => [
                'Cutting and sequencing of supplied footage',
                'Transitions and pacing',
                'Audio balancing and clean-up',
                'Colour adjustments',
                'Captions or subtitles, where included in scope',
                'Platform-specific export sizes',
            ],
            'image'       => 'assets/images/services/video-editing.svg',
            'alt'         => 'Placeholder illustration representing a video editing timeline.',
            'placeholder' => false,
        ],
        [
            'slug'        => 'motion-graphics',
            'title'       => 'Motion Graphics',
            'tagline'     => 'Animation & Visual Effects',
            'icon'        => 'motion-graphics',
            'summary'     => 'Animated visuals, titles, transitions, and visual effects.',
            'intro'       => 'Motion is used to explain, emphasise and give a production its own visual language. Animated titles, logo stings and interface-style elements help an audience understand complex ideas quickly and remember the brand behind them.',
            'use_cases'   => [
                'Explainer and product-demo animation',
                'Channel intros, outros and stings',
                'Animated logo reveals and brand bumpers',
                'Title sequences and lower thirds',
            ],
            'deliverables' => [
                'Animated titles and text sequences',
                'Logo animation and brand stings',
                'Lower thirds and name straps',
                'Motion-based promotional assets',
                'Visual effects, according to project scope',
            ],
            'image'       => 'assets/images/services/motion-graphics.svg',
            'alt'         => 'Placeholder illustration representing animated motion graphics keyframes.',
            'placeholder' => false,
        ],
        [
            'slug'        => 'thumbnail-design',
            'title'       => 'Thumbnail Design',
            'tagline'     => 'High-CTR Thumbnails',
            'icon'        => 'thumbnail',
            'summary'     => 'Clear, attention-focused visuals for video content.',
            'intro'       => 'A thumbnail has one job: make the video worth clicking. Designs are built around the subject of the video, tested against readable contrast at small sizes, and styled so a channel looks consistent rather than random.',
            'use_cases'   => [
                'YouTube video thumbnails',
                'A/B style thumbnail variations for testing',
                'Branded thumbnail systems for channels',
                'Series and playlist consistency',
            ],
            'deliverables' => [
                'YouTube thumbnail designs',
                'Campaign-specific thumbnail variations',
                'Branded thumbnail styles',
                'Visual concepts aligned with the video subject',
            ],
            'image'       => 'assets/images/services/thumbnail-design.svg',
            'alt'         => 'Placeholder illustration representing thumbnail design layouts.',
            'placeholder' => false,
        ],
        [
            'slug'        => 'brand-videos',
            'title'       => 'Brand Videos',
            'tagline'     => 'Promotional & Corporate',
            'icon'        => 'brand-video',
            'summary'     => 'Promotional and corporate videos that communicate a brand message.',
            'intro'       => 'Brand videos translate a company’s value proposition into something an audience can watch in a minute. We build a clear narrative, consistent visual treatment and a tone of voice that fits the organisation it represents.',
            'use_cases'   => [
                'Company and corporate overviews',
                'Product or service promotional films',
                'Brand introduction and manifesto videos',
                'Campaign video assets and internal communications',
            ],
            'deliverables' => [
                'Promotional edits',
                'Corporate videos',
                'Brand introduction videos',
                'Campaign video assets',
            ],
            'image'       => 'assets/images/services/brand-videos.svg',
            'alt'         => 'Placeholder illustration representing a brand video storyboard.',
            'placeholder' => false,
        ],
        [
            'slug'        => 'youtube-content',
            'title'       => 'YouTube Content',
            'tagline'     => 'Long & Short Form Videos',
            'icon'        => 'youtube',
            'summary'     => 'Editing support for long-form videos and short-form clips.',
            'intro'       => 'Creators publish differently from brands: a long episode, a Short, a clip, and a community post. We keep a consistent look across that output so a channel grows recognisable as it expands.',
            'use_cases'   => [
                'Long-form editing for regular uploads',
                'Short clips pulled from longer recordings',
                'Podcast and stream highlight packages',
                'Intro, outro and channel graphics packages',
            ],
            'deliverables' => [
                'Long-form video editing',
                'Short clips from longer recordings',
                'Intro and outro sequences',
                'Captions and graphics, where included',
                'Consistent visual styling across uploads',
            ],
            'image'       => 'assets/images/services/youtube-content.svg',
            'alt'         => 'Placeholder illustration representing long and short form YouTube content.',
            'placeholder' => false,
        ],
        [
            'slug'        => 'social-media-ads',
            'title'       => 'Social Media Ads',
            'tagline'     => 'Reels, TikTok & More',
            'icon'        => 'social-ads',
            'summary'     => 'Creative video assets for Reels, TikTok, and social campaigns.',
            'intro'       => 'Paid placements have their own rhythm: fast hooks, vertical framing, burned-in captions and a message that lands in the first seconds. We produce creative assets built for that environment and for the testing plan around it.',
            'use_cases'   => [
                'Vertical video ad creatives',
                'Reels and TikTok assets',
                'Promotional social edits',
                'Multiple creative versions for testing, if agreed',
            ],
            'deliverables' => [
                'Vertical video ads',
                'Reels and TikTok creatives',
                'Promotional edits',
                'Different creative versions for testing, if agreed',
            ],
            'image'       => 'assets/images/services/social-media-ads.svg',
            'alt'         => 'Placeholder illustration representing vertical social media ad creatives.',
            'placeholder' => false,
        ],
        [
            'slug'        => 'product-videos',
            'title'       => 'Product Videos',
            'tagline'     => 'Showcase Your Products',
            'icon'        => 'product-video',
            'summary'     => 'Visual storytelling that highlights product features and benefits.',
            'intro'       => 'Product video puts the item at the centre of the frame and makes its features legible in seconds. It works for launches, e-commerce listings, showroom content and social campaigns alike.',
            'use_cases'   => [
                'Product launch videos',
                'E-commerce and marketplace listings',
                'Feature demonstration clips',
                'Showroom and lifestyle product content',
            ],
            'deliverables' => [
                'Product showcase videos',
                'Promotional product edits',
                'Feature highlights',
                'Social media product clips',
            ],
            'image'       => 'assets/images/services/product-videos.svg',
            'alt'         => 'Placeholder illustration representing a product showcase frame.',
            'placeholder' => false,
        ],
    ];

    /* =====================================================================
     * PORTFOLIO PROJECTS
     *
     * !! PLACEHOLDER ENTRIES !!
     * These are clearly marked demo projects created for development only.
     * Replace every entry with real, client-approved work before launch, set
     * 'placeholder' => false, and remove the demo badge.
     * ================================================================== */
    $projects = [
        [
            'slug'        => 'creator-documentary-edit',
            'title'       => 'Creator Documentary Edit',
            'category'    => 'video-editing',
            'client_type' => 'Sample project',
            'platform'    => 'YouTube',
            'year'        => 'Sample',
            'format'      => '16:9 long form',
            'excerpt'     => 'A long-form documentary edit with pacing built around interview footage and a clear narrative arc.',
            'objective'   => 'A multi-hour interview record was cut into a focused documentary. Structure was built from the strongest moments in the footage, with natural sound design and restrained colour work.',
            'deliverables' => ['Full-length edit', 'Chapter markers', 'Short teaser cut'],
            'media'       => [
                'type' => 'image',
                'src'  => 'assets/images/portfolio/creator-documentary.svg',
                'poster' => '',
            ],
            'placeholder' => true,
        ],
        [
            'slug'        => 'saas-launch-motion',
            'title'       => 'SaaS Launch Motion Package',
            'category'    => 'motion-graphics',
            'client_type' => 'Sample project',
            'platform'    => 'Web & Social',
            'year'        => 'Sample',
            'format'      => '16:9 + 9:16',
            'excerpt'     => 'A motion identity package with animated titles, logo sting and interface-style explainer sections.',
            'objective'   => 'A launch film needed a motion language that could stretch across the product site and social channels without losing consistency.',
            'deliverables' => ['Logo sting', 'Animated titles', 'Explainer sections'],
            'media'       => [
                'type' => 'image',
                'src'  => 'assets/images/portfolio/saas-launch-motion.svg',
                'poster' => '',
            ],
            'placeholder' => true,
        ],
        [
            'slug'        => 'channel-thumbnail-system',
            'title'       => 'Channel Thumbnail System',
            'category'    => 'thumbnail-design',
            'client_type' => 'Sample project',
            'platform'    => 'YouTube',
            'year'        => 'Sample',
            'format'      => '1280 × 720',
            'excerpt'     => 'A repeatable thumbnail template that keeps a channel readable at small sizes and visually consistent.',
            'objective'   => 'A creator needed a thumbnail system they could apply quickly without losing a recognisable style across every upload.',
            'deliverables' => ['Master template', 'Six subject layouts', 'Type and colour guide'],
            'media'       => [
                'type' => 'image',
                'src'  => 'assets/images/portfolio/channel-thumbnail-system.svg',
                'poster' => '',
            ],
            'placeholder' => true,
        ],
        [
            'slug'        => 'company-profile-film',
            'title'       => 'Company Profile Film',
            'category'    => 'brand-videos',
            'client_type' => 'Sample project',
            'platform'    => 'Website & Social',
            'year'        => 'Sample',
            'format'      => '16:9 + vertical cutdowns',
            'excerpt'     => 'A brand film that explains what a company does, who it serves, and how it works.',
            'objective'   => 'The brief was to replace a long written profile with a short film that a new customer could watch in ninety seconds.',
            'deliverables' => ['Hero brand film', 'Three vertical cutdowns', 'Subtitle master'],
            'media'       => [
                'type' => 'image',
                'src'  => 'assets/images/portfolio/company-profile-film.svg',
                'poster' => '',
            ],
            'placeholder' => true,
        ],
        [
            'slug'        => 'long-form-series-editing',
            'title'       => 'Long-Form Series Editing',
            'category'    => 'youtube-content',
            'client_type' => 'Sample project',
            'platform'    => 'YouTube',
            'year'        => 'Sample',
            'format'      => 'Long form + Shorts',
            'excerpt'     => 'Ongoing editing support for a weekly series, including Shorts pulled from each episode.',
            'objective'   => 'A weekly upload schedule needed a repeatable edit that kept a consistent visual style without slowing the release calendar.',
            'deliverables' => ['Weekly main edit', 'Three Shorts per episode', 'Channel graphics'],
            'media'       => [
                'type' => 'image',
                'src'  => 'assets/images/portfolio/long-form-series.svg',
                'poster' => '',
            ],
            'placeholder' => true,
        ],
        [
            'slug'        => 'vertical-ad-variants',
            'title'       => 'Vertical Ad Variants',
            'category'    => 'social-media-ads',
            'client_type' => 'Sample project',
            'platform'    => 'Reels / TikTok',
            'year'        => 'Sample',
            'format'      => '9:16',
            'excerpt'     => 'A set of vertical ad creatives built from one shoot, structured for side-by-side testing.',
            'objective'   => 'A single production day needed to produce enough distinct creative versions to test different hooks without reshooting.',
            'deliverables' => ['Four vertical creatives', 'Hook variants', 'Caption burn-ins'],
            'media'       => [
                'type' => 'image',
                'src'  => 'assets/images/portfolio/vertical-ad-variants.svg',
                'poster' => '',
            ],
            'placeholder' => true,
        ],
        [
            'slug'        => 'product-showcase-series',
            'title'       => 'Product Showcase Series',
            'category'    => 'product-videos',
            'client_type' => 'Sample project',
            'platform'    => 'Web & Social',
            'year'        => 'Sample',
            'format'      => '9:16 + 1:1',
            'excerpt'     => 'A short series showing product features in use, cut for both social feeds and a product page.',
            'objective'   => 'Each feature needed to be demonstrated clearly in a short clip that could stand alone in a social feed.',
            'deliverables' => ['Five feature clips', 'Square cutdowns', 'Caption master'],
            'media'       => [
                'type' => 'image',
                'src'  => 'assets/images/portfolio/product-showcase-series.svg',
                'poster' => '',
            ],
            'placeholder' => true,
        ],
        [
            'slug'        => 'podcast-visual-package',
            'title'       => 'Podcast Visual Package',
            'category'    => 'youtube-content',
            'client_type' => 'Sample project',
            'platform'    => 'YouTube',
            'year'        => 'Sample',
            'format'      => 'Video podcast',
            'excerpt'     => 'A multi-camera podcast package with consistent framing, lower thirds and chapter graphics.',
            'objective'   => 'A conversation-format show needed a repeatable visual package so every episode looked like the same production.',
            'deliverables' => ['Multi-cam edit', 'Lower third system', 'Chapter cards'],
            'media'       => [
                'type' => 'image',
                'src'  => 'assets/images/portfolio/podcast-visual-package.svg',
                'poster' => '',
            ],
            'placeholder' => true,
        ],
    ];

    /* =====================================================================
     * TESTIMONIALS
     *
     * !! PLACEHOLDER CONTENT — DO NOT PUBLISH AS GENUINE FEEDBACK !!
     * These sample reviews exist so the carousel can be developed and reviewed.
     * They are NOT real client statements, they carry no real ratings, and
     * each entry is flagged so the UI can label them clearly.
     *
     * BEFORE LAUNCH:
     *   1. Delete this block entirely if approved testimonials are not ready,
     *      or replace it with client-approved, permission-granted reviews.
     *   2. Only set 'rating' to a confirmed value, and 'name' / 'role' to
     *      information the client has approved for public use.
     *   3. Set 'placeholder' => false only for genuine, approved reviews.
     * ================================================================== */
    $reviews = [
        [
            'name'        => 'Sample Reviewer One',
            'role'        => 'Content creator',
            'location'    => 'Placeholder location',
            'rating'      => 0, // 0 = no confirmed rating yet
            'service'     => 'video-editing',
            'text'        => 'This is placeholder text written to demonstrate how a client review will appear in the carousel. Replace it with a real, client-approved testimonial before launch.',
            'placeholder' => true,
        ],
        [
            'name'        => 'Sample Reviewer Two',
            'role'        => 'Marketing lead',
            'location'    => 'Placeholder location',
            'rating'      => 0,
            'service'     => 'motion-graphics',
            'text'        => 'This is placeholder text written to demonstrate how a client review will appear in the carousel. Replace it with a real, client-approved testimonial before launch.',
            'placeholder' => true,
        ],
        [
            'name'        => 'Sample Reviewer Three',
            'role'        => 'Business owner',
            'location'    => 'Placeholder location',
            'rating'      => 0,
            'service'     => 'brand-videos',
            'text'        => 'This is placeholder text written to demonstrate how a client review will appear in the carousel. Replace it with a real, client-approved testimonial before launch.',
            'placeholder' => true,
        ],
        [
            'name'        => 'Sample Reviewer Four',
            'role'        => 'Brand manager',
            'location'    => 'Placeholder location',
            'rating'      => 0,
            'service'     => 'thumbnail-design',
            'text'        => 'This is placeholder text written to demonstrate how a client review will appear in the carousel. Replace it with a real, client-approved testimonial before launch.',
            'placeholder' => true,
        ],
        [
            'name'        => 'Sample Reviewer Five',
            'role'        => 'Independent brand',
            'location'    => 'Placeholder location',
            'rating'      => 0,
            'service'     => 'product-videos',
            'text'        => 'This is placeholder text written to demonstrate how a client review will appear in the carousel. Replace it with a real, client-approved testimonial before launch.',
            'placeholder' => true,
        ],
        [
            'name'        => 'Sample Reviewer Six',
            'role'        => 'Channel owner',
            'location'    => 'Placeholder location',
            'rating'      => 0,
            'service'     => 'youtube-content',
            'text'        => 'This is placeholder text written to demonstrate how a client review will appear in the carousel. Replace it with a real, client-approved testimonial before launch.',
            'placeholder' => true,
        ],
    ];

    /* =====================================================================
     * TEAM
     *
     * !! PLACEHOLDER CONTENT !!
     * Names, roles and portraits below are NOT real people. Replace with
     * client-approved team members, or set 'publish' => false to hide a slot.
     * ================================================================== */
    $team = [
        [
            'name'        => 'Role To Be Confirmed',
            'role'        => 'Creative Direction',
            'bio'         => 'Placeholder profile. Replace with the approved team member name, title and biography before launch.',
            'skills'      => ['Creative direction', 'Visual style', 'Story structure'],
            'image'       => 'assets/images/team/member-1.svg',
            'social'      => '',
            'placeholder' => true,
            'publish'     => true,
        ],
        [
            'name'        => 'Role To Be Confirmed',
            'role'        => 'Video Editing',
            'bio'         => 'Placeholder profile. Replace with the approved team member name, title and biography before launch.',
            'skills'      => ['Long-form editing', 'Short-form editing', 'Sound design'],
            'image'       => 'assets/images/team/member-2.svg',
            'social'      => '',
            'placeholder' => true,
            'publish'     => true,
        ],
        [
            'name'        => 'Role To Be Confirmed',
            'role'        => 'Motion Graphics',
            'bio'         => 'Placeholder profile. Replace with the approved team member name, title and biography before launch.',
            'skills'      => ['Animation', 'Typography', 'Brand systems'],
            'image'       => 'assets/images/team/member-3.svg',
            'social'      => '',
            'placeholder' => true,
            'publish'     => true,
        ],
        [
            'name'        => 'Role To Be Confirmed',
            'role'        => 'Thumbnail Design',
            'bio'         => 'Placeholder profile. Replace with the approved team member name, title and biography before launch.',
            'skills'      => ['Thumbnail design', 'Layout systems', 'Colour and type'],
            'image'       => 'assets/images/team/member-4.svg',
            'social'      => '',
            'placeholder' => true,
            'publish'     => true,
        ],
    ];

    /* =====================================================================
     * TRUST / VALUE STRIP
     * Positioning statements only — never performance statistics.
     * ================================================================== */
    $value_strip = [
        [
            'icon'  => 'spark',
            'title' => 'Creative Solutions',
            'text'  => 'Ideas shaped around the message, not a fixed template.',
        ],
        [
            'icon'  => 'grid',
            'title' => 'Platform-Ready Content',
            'text'  => 'Delivered in the formats each platform actually expects.',
        ],
        [
            'icon'  => 'layers',
            'title' => 'Detail-Focused Editing',
            'text'  => 'Pacing, sound and colour reviewed frame by frame.',
        ],
        [
            'icon'  => 'chat',
            'title' => 'Collaborative Workflow',
            'text'  => 'Clear communication at every stage of the project.',
        ],
    ];

    /* =====================================================================
     * WHY CHOOSE — agency philosophy points
     * No guaranteed results, no delivery-time promises.
     * ================================================================== */
    $why_choose = [
        [
            'icon'  => 'target',
            'title' => 'Creative thinking with a clear purpose',
            'text'  => 'Every creative decision traces back to the message the project needs to communicate.',
        ],
        [
            'icon'  => 'layers',
            'title' => 'Consistent attention to detail',
            'text'  => 'Pacing, transitions, sound levels and colour are checked as a whole, not individually.',
        ],
        [
            'icon'  => 'grid',
            'title' => 'Content adapted to its platform',
            'text'  => 'The same message is framed differently for a thumbnail, a Short and a long-form upload.',
        ],
        [
            'icon'  => 'chat',
            'title' => 'Collaborative communication',
            'text'  => 'Feedback is collected at agreed points so revisions stay focused and scope stays clear.',
        ],
        [
            'icon'  => 'clipboard',
            'title' => 'A workflow built around the brief',
            'text'  => 'Deliverables, style, scope and timeline are defined before production begins.',
        ],
    ];

    /* =====================================================================
     * PROCESS — four steps, consistent across Home / About / Services
     * ================================================================== */
    $process = [
        [
            'number' => '01',
            'icon'   => 'search',
            'title'  => 'Discover',
            'text'   => 'We learn about the project, its goals, audience, and creative direction.',
        ],
        [
            'number' => '02',
            'icon'   => 'clipboard',
            'title'  => 'Plan',
            'text'   => 'We define the required deliverables, style, scope, and timeline.',
        ],
        [
            'number' => '03',
            'icon'   => 'video-editing',
            'title'  => 'Create',
            'text'   => 'The creative work is produced according to the agreed brief.',
        ],
        [
            'number' => '04',
            'icon'   => 'check',
            'title'  => 'Deliver',
            'text'   => 'The completed work is shared according to the agreed delivery and revision terms.',
        ],
    ];

    /* =====================================================================
     * CORE VALUES — About page
     * ================================================================== */
    $values = [
        [
            'icon'  => 'spark',
            'title' => 'Creativity',
            'text'  => 'Explore visual approaches that fit the project instead of defaulting to one style.',
        ],
        [
            'icon'  => 'chat',
            'title' => 'Clarity',
            'text'  => 'Keep communication and project requirements understandable for everyone involved.',
        ],
        [
            'icon'  => 'layers',
            'title' => 'Craftsmanship',
            'text'  => 'Pay attention to editing, pacing, design, and how the final piece is presented.',
        ],
        [
            'icon'  => 'user',
            'title' => 'Collaboration',
            'text'  => 'Build the work around clear client communication and agreed feedback points.',
        ],
        [
            'icon'  => 'check',
            'title' => 'Consistency',
            'text'  => 'Aim for coherent visual quality across every deliverable in a project.',
        ],
    ];

    /* =====================================================================
     * FAQ — Services page
     * Wording avoids unsupported promises.
     * ================================================================== */
    $faqs = [
        [
            'q' => 'Which services are available?',
            'a' => 'We currently offer seven services: Video Editing, Motion Graphics, Thumbnail Design, Brand Videos, YouTube Content, Social Media Ads and Product Videos. If your project combines several of these, describe it in your inquiry and we can scope it as one project.',
        ],
        [
            'q' => 'How do I request a quote?',
            'a' => 'Use the Book Now button on any page, describe your project, and send the prepared inquiry through your preferred contact method. We review the brief and reply with next steps and an estimate for that specific scope.',
        ],
        [
            'q' => 'What information should I provide?',
            'a' => 'The platform the content is for, a short description of the project, and any reference material you already have — raw footage, scripts, brand assets or existing channels. A rough duration and a target deadline help us respond accurately.',
        ],
        [
            'q' => 'Can I request a custom project?',
            'a' => 'Yes. Most projects are some combination of the seven core services, and we regularly build around a brief that does not fit a standard package. Send the details and we will tell you honestly whether it is something we can deliver well.',
        ],
        [
            'q' => 'How are revisions handled?',
            'a' => 'The number of revision rounds, and what counts as a revision, is agreed in writing before work starts. Feedback is collected at agreed points so the final delivery reflects what was approved.',
        ],
        [
            'q' => 'How is the final delivery arranged?',
            'a' => 'Approved work is delivered in the formats agreed for the project, through a link or channel we confirm with you. Delivery timelines depend on the agreed scope and revision terms.',
        ],
    ];

    /* =====================================================================
     * BOOK NOW FORM OPTIONS
     *
     * !! PLACEHOLDER QUALIFICATION RANGES !!
     * Budget ranges are for qualification only. They are NOT official
     * service prices and must be approved or replaced by the client.
     * ================================================================== */
    $form_options = [
        'services' => [
            'video-editing',
            'motion-graphics',
            'thumbnail-design',
            'brand-videos',
            'youtube-content',
            'social-media-ads',
            'product-videos',
            'other',
        ],
        'platforms' => [
            'YouTube',
            'Facebook / Instagram',
            'TikTok / Reels',
            'Business / Product',
            'Multiple Platforms',
            'Other',
        ],
        // PLACEHOLDER budget bands — replace with client-approved ranges.
        'budgets' => [
            'Under BDT 5,000',
            'BDT 5,000 – 10,000',
            'BDT 10,000 – 25,000',
            'BDT 25,000+',
            'Not Sure / Need a Quote',
        ],
        // PLACEHOLDER deadline bands — replace with client-approved ranges.
        'deadlines' => [
            'Within 3 Days',
            'Within 1 Week',
            'Within 2 – 4 Weeks',
            'Flexible',
            'To Be Discussed',
        ],
        'contact_methods' => [
            'whatsapp' => 'WhatsApp',
            'phone'    => 'Phone Call',
            'email'    => 'Email',
        ],
    ];

    $data = [
        'services'    => $services,
        'projects'    => $projects,
        'reviews'     => $reviews,
        'team'        => array_values(array_filter($team, static function ($member) {
            return !empty($member['publish']);
        })),
        'value_strip' => $value_strip,
        'why_choose'  => $why_choose,
        'process'     => $process,
        'values'      => $values,
        'faqs'        => $faqs,
        'form_options' => $form_options,
    ];

    return $data;
}

/**
 * Human-readable label for a service slug.
 *
 * @param string $slug
 * @return string
 */
function mm_service_label($slug)
{
    if ($slug === 'other') {
        return 'Other / Custom Project';
    }

    $service = mm_service($slug);

    return $service ? $service['title'] : $slug;
}