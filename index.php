<?php
/**
 * Mexa Motion — Home
 *
 * Page order:
 *  1. Header              7. Why Choose Mexa Motion
 *  2. Hero                8. How We Work
 *  3. Seven-service diagram 9. Customer review carousel
 *  4. Trust strip        10. Final CTA
 *  5. Featured services  11. Footer
 *  6. Featured portfolio
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
];

$page_nav      = 'home';
$body_class    = 'page-home';
$featured_services = mm_services();
$featured_projects = array_slice(mm_projects(), 0, 6);
$value_strip       = mm_data('value_strip');
$why_choose        = mm_data('why_choose');
$process_steps     = mm_data('process');

require __DIR__ . '/includes/header.php';
?>

<!-- ===================================================================== -->
<!-- 2. HERO                                                              -->
<!-- ===================================================================== -->
<?php require __DIR__ . '/includes/hero.php'; ?>

<!-- ===================================================================== -->
<!-- 3. SEVEN-SERVICE DIAGRAM                                             -->
<!-- ===================================================================== -->
<?php require __DIR__ . '/includes/service-diagram.php'; ?>

<!-- ===================================================================== -->
<!-- 4. TRUST / VALUE STRIP                                               -->
<!-- ===================================================================== -->
<section class="value-strip" aria-label="How Mexa Motion works">
    <div class="container">
        <ul class="value-strip__grid">
            <?php foreach ($value_strip as $i => $item) : ?>
            <li class="value-strip__item" data-reveal="value-strip" style="--reveal-delay: <?= (int) $i * 70 ?>ms">
                <span class="value-strip__icon" aria-hidden="true"><?= mm_icon($item['icon'], 20) ?></span>
                <div>
                    <h2 class="value-strip__title"><?= e($item['title']) ?></h2>
                    <p class="value-strip__text"><?= e($item['text']) ?></p>
                </div>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>

<!-- ===================================================================== -->
<!-- 5. FEATURED SERVICES                                                 -->
<!-- ===================================================================== -->
<section class="section" id="services" aria-labelledby="services-title">
    <div class="container">

        <header class="section-head section-head--split" data-reveal="services-head">
            <div>
                <p class="eyebrow">
                    <span class="eyebrow__dot" aria-hidden="true"></span>
                    Our Services
                </p>
                <h2 class="section-title" id="services-title">Creative Services Built Around Your Vision</h2>
                <p class="section-lead">
                    From individual content pieces to complete brand videos, explore the creative
                    services that can help bring your ideas to life.
                </p>
            </div>
            <a class="btn btn--outline" href="services.php">
                All services <?= mm_icon('arrow-right', 18) ?>
            </a>
        </header>

        <div class="service-grid">
            <?php foreach ($featured_services as $i => $service) : ?>
            <div data-reveal="services" style="--reveal-delay: <?= (int) ($i % 3) * 80 ?>ms">
                <?php
                $variant = 'default';
                require __DIR__ . '/includes/service-card.php';
                ?>
            </div>
            <?php endforeach; ?>

            <div class="service-card service-card--cta" data-reveal="services" style="--reveal-delay: 240ms">
                <span class="service-card__icon" aria-hidden="true"><?= mm_icon('chat', 24) ?></span>
                <div class="service-card__body">
                    <h3 class="service-card__title">Not sure which service fits?</h3>
                    <p class="service-card__summary">
                        Most projects combine two or more of these. Describe what you are making
                        and we will suggest the right approach.
                    </p>
                </div>
                <a class="service-card__link" href="book-now.php">
                    <span>Tell us about your project</span>
                    <?= mm_icon('arrow-right', 16) ?>
                </a>
            </div>
        </div>

    </div>
</section>

<!-- ===================================================================== -->
<!-- 6. FEATURED PORTFOLIO                                                -->
<!-- ===================================================================== -->
<section class="section section--surface" id="work" aria-labelledby="work-title">
    <div class="container">

        <header class="section-head section-head--split" data-reveal="work-head">
            <div>
                <p class="eyebrow">
                    <span class="eyebrow__dot" aria-hidden="true"></span>
                    Selected Work
                </p>
                <h2 class="section-title" id="work-title">A Look at What We Create</h2>
                <p class="section-lead">
                    A selection of sample projects showing the formats and styles we work in.
                </p>
            </div>
            <a class="btn btn--outline" href="portfolio.php">
                View Full Portfolio <?= mm_icon('arrow-right', 18) ?>
            </a>
        </header>

        <div class="project-grid">
            <?php foreach ($featured_projects as $i => $project) : ?>
            <div data-reveal="work" style="--reveal-delay: <?= (int) ($i % 3) * 80 ?>ms">
                <?php require __DIR__ . '/includes/project-card.php'; ?>
            </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>

<!-- ===================================================================== -->
<!-- 7. WHY CHOOSE MEXA MOTION                                           -->
<!-- ===================================================================== -->
<section class="section" aria-labelledby="why-title">
    <div class="container">
        <div class="why">

            <div class="why__intro" data-reveal="why">
                <p class="eyebrow">
                    <span class="eyebrow__dot" aria-hidden="true"></span>
                    Why Mexa Motion
                </p>
                <h2 class="section-title" id="why-title">Built Around the Message, Not a Template</h2>
                <p class="section-lead" style="margin-bottom:1.75rem">
                    Every project starts by working out what the content needs to achieve. The
                    creative decisions follow from that.
                </p>
                <aside class="why__aside">
                    <p class="why__aside-quote">&ldquo;Clear communication first. Better creative work follows.&rdquo;</p>
                    <p class="why__aside-note">
                        A working principle for the studio &mdash; keep the brief, the audience and the
                        intended outcome visible at every stage of production.
                    </p>
                </aside>
            </div>

            <ul class="why__list">
                <?php foreach ($why_choose as $i => $item) : ?>
                <li class="why__item" data-reveal="why" style="--reveal-delay: <?= (int) $i * 70 ?>ms">
                    <span class="why__icon" aria-hidden="true"><?= mm_icon($item['icon'], 22) ?></span>
                    <div>
                        <h3 class="why__title"><?= e($item['title']) ?></h3>
                        <p class="why__text"><?= e($item['text']) ?></p>
                    </div>
                </li>
                <?php endforeach; ?>
            </ul>

        </div>
    </div>
</section>

<!-- ===================================================================== -->
<!-- 8. HOW WE WORK                                                      -->
<!-- ===================================================================== -->
<section class="section" id="process" aria-labelledby="process-title">
    <div class="container">

        <header class="section-head section-head--center" data-reveal="process-head">
            <p class="eyebrow">
                <span class="eyebrow__dot" aria-hidden="true"></span>
                How We Work
            </p>
            <h2 class="section-title" id="process-title">A Four-Step Creative Process</h2>
            <p class="section-lead">
                The same structure on every project, adapted to the scope and the brief.
            </p>
        </header>

        <ol class="process">
            <?php foreach ($process_steps as $i => $step) : ?>
            <li class="process__step" data-reveal="process" style="--reveal-delay: <?= (int) $i * 90 ?>ms">
                <span class="process__number">Step <?= e($step['number']) ?></span>
                <span class="process__icon" aria-hidden="true"><?= mm_icon($step['icon'], 22) ?></span>
                <h3 class="process__title"><?= e($step['title']) ?></h3>
                <p class="process__text"><?= e($step['text']) ?></p>
            </li>
            <?php endforeach; ?>
        </ol>

        <p class="section-lead" style="text-align:center;max-width:52ch;margin:1.75rem auto 0;font-size:var(--fs-sm)">
            This describes our proposed workflow. Final service terms, revisions and delivery
            timelines are confirmed with you before work begins.
        </p>

    </div>
</section>

<!-- ===================================================================== -->
<!-- 9. CUSTOMER REVIEW CAROUSEL                                          -->
<!-- ===================================================================== -->
<section class="section reviews-section" id="reviews" aria-labelledby="reviews-title">
    <div class="container">

        <header class="section-head section-head--center" data-reveal="reviews-head">
            <p class="eyebrow">
                <span class="eyebrow__dot" aria-hidden="true"></span>
                Client Feedback
            </p>
            <h2 class="section-title" id="reviews-title">What Our Clients Say</h2>
            <p class="section-lead">Hear how clients describe their experience working with Mexa Motion.</p>
        </header>

        <?php
        $carousel_id        = 'home-reviews';
        $carousel_label     = 'Mexa Motion client reviews';
        $carousel_reviews   = mm_reviews();
        $carousel_autoplay  = 7000;
        require __DIR__ . '/includes/review-carousel.php';
        ?>

        <div style="text-align:center;margin-top:1.75rem">
            <a class="btn btn--outline" href="reviews.php">
                Read Client Reviews <?= mm_icon('arrow-right', 18) ?>
            </a>
        </div>

    </div>
</section>

<!-- ===================================================================== -->
<!-- 10. FINAL CTA                                                        -->
<!-- ===================================================================== -->
<?php
$cta_title   = 'Have a Project in Mind?';
$cta_text    = "Let's discuss your idea and find the right creative approach for your project.";
$cta_variant = 'dark';
require __DIR__ . '/includes/cta-banner.php';
?>

<script type="application/ld+json">
<?= json_encode([
    '@context'    => 'https://schema.org',
    '@type'       => 'Organization',
    'name'        => mm_config('brand.name'),
    'url'         => mm_url(''),
    'description' => mm_config('brand.description'),
    'logo'        => mm_url('assets/images/brand/logo-square.png'),
    'image'       => mm_url('assets/images/brand/logo-square.png'),
    'email'       => mm_config('contact.email'),
    'areaServed'  => mm_config('contact.country'),
    'address'     => [
        '@type'           => 'PostalAddress',
        'addressLocality' => mm_config('contact.city'),
        'addressCountry'  => 'BD',
    ],
    'knowsAbout'  => array_map(static function ($s) { return $s['title']; }, mm_services()),
], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?>
</script>

<?php require __DIR__ . '/includes/footer.php'; ?>