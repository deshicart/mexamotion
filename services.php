<?php
/**
 * Mexa Motion — Services
 *
 * Page order:
 *  1. Shared header  5. Creative workflow
 *  2. Services hero  6. Frequently asked questions
 *  3. Overview       7. Final Book Now CTA
 *  4. Service detail 8. Shared footer
 *
 * @package MexaMotion
 */

require_once __DIR__ . '/includes/functions.php';

$page_meta = [
    'title'       => 'Creative Services | Mexa Motion',
    'description' => 'Explore Mexa Motion’s video editing, motion graphics, thumbnail design, brand video, YouTube content, social media ad and product video services. Request a quote for your project.',
    'path'        => 'services.php',
    'og'          => 'assets/images/brand/logo-square.png',
];

$page_nav   = 'services';
$body_class = 'page-services';

$services        = mm_services();
$process_steps   = mm_data('process');
$faqs            = mm_data('faqs');

require __DIR__ . '/includes/header.php';
?>

<!-- ===================================================================== -->
<!-- SERVICES HERO                                                        -->
<!-- ===================================================================== -->
<section class="page-hero">
    <div class="container">
        <nav class="breadcrumb" aria-label="Breadcrumb">
            <a href="index.php">Home</a><span aria-hidden="true">/</span>
            <span aria-current="page">Services</span>
        </nav>

        <div class="page-hero__inner page-hero__inner--split">
            <div data-reveal="hero">
                <p class="eyebrow">
                    <span class="eyebrow__dot" aria-hidden="true"></span>
                    Creative Services
                </p>
                <h1 class="page-hero__title">Creative Services for Content That Stands Out</h1>
                <p class="page-hero__lead">
                    Explore our video, motion, design, and content services. Choose the solution that
                    fits your goals and tell us about your project.
                </p>
                <div class="page-hero__actions">
                    <a class="btn btn--primary btn--lg" href="book-now.php">Book Now <?= mm_icon('arrow-right', 18) ?></a>
                    <a class="btn btn--outline btn--lg" href="#service-list">See all seven services</a>
                </div>
            </div>

            <div class="page-hero__panel" data-reveal="hero" style="--reveal-delay:120ms">
                <img src="assets/images/services/motion-graphics.svg"
                     alt="Placeholder abstract artwork representing motion graphics service work."
                     width="900" height="600" loading="eager" decoding="async">
            </div>
        </div>
    </div>
</section>

<!-- ===================================================================== -->
<!-- SERVICES OVERVIEW                                                    -->
<!-- ===================================================================== -->
<section class="section section--tight" aria-labelledby="overview-title">
    <div class="container">
        <header class="section-head section-head--center" data-reveal="ov">
            <h2 class="section-title" id="overview-title">Seven Services, One Point of Contact</h2>
            <p class="section-lead">
                Most projects combine two or three of these. Tell us what you are making and we will
                tell you which parts of the service apply.
            </p>
        </header>

        <div class="service-grid">
            <?php foreach ($services as $i => $service) : ?>
            <div data-reveal="ov" style="--reveal-delay: <?= (int) ($i % 3) * 70 ?>ms">
                <?php
                $variant = 'compact';
                require __DIR__ . '/includes/service-card.php';
                ?>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ===================================================================== -->
<!-- SEVEN DETAILED SERVICE SECTIONS                                      -->
<!-- ===================================================================== -->
<section class="section section--surface" id="service-list" aria-labelledby="detail-title">
    <div class="container">
        <header class="section-head" data-reveal="detail">
            <p class="eyebrow">
                <span class="eyebrow__dot" aria-hidden="true"></span>
                In Detail
            </p>
            <h2 class="section-title" id="detail-title">What Each Service Includes</h2>
            <p class="section-lead">
                The deliverables below are examples of what a service can cover. Actual scope, pricing,
                revisions and delivery timelines are agreed for each project.
            </p>
        </header>

        <div class="service-list">
            <?php foreach ($services as $i => $service) : ?>
            <article class="service-detail<?= $i % 2 === 1 ? ' service-detail--alt' : '' ?><?= $i % 2 === 1 ? ' service-detail--flip' : '' ?>"
                     id="<?= e($service['slug']) ?>" data-reveal="detail" style="--reveal-delay:<?= (int) ($i % 2) * 60 ?>ms">

                <div class="service-detail__main">
                    <div class="service-detail__head">
                        <span class="service-detail__icon" aria-hidden="true"><?= mm_icon($service['icon'], 26) ?></span>
                        <div>
                            <span class="service-detail__num">Service <?= str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT) ?></span>
                            <h3 class="service-detail__title"><?= e($service['title']) ?></h3>
                            <span class="service-detail__tagline"><?= e($service['tagline']) ?></span>
                        </div>
                    </div>

                    <p class="service-detail__intro"><?= e($service['intro']) ?></p>
                </div>

                <div class="service-detail__media">
                    <img src="<?= e($service['image']) ?>"
                         alt="<?= e($service['alt']) ?>"
                         width="900" height="600" loading="lazy" decoding="async">
                </div>

                <div class="service-detail__cols">
                    <div>
                        <h4 class="service-detail__block-title">
                            <?= mm_icon('target', 16) ?> Common Use Cases
                        </h4>
                        <ul class="service-detail__list">
                            <?php foreach ($service['use_cases'] as $use_case) : ?>
                            <li><?= mm_icon('check', 16) ?><span><?= e($use_case) ?></span></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div>
                        <h4 class="service-detail__block-title">
                            <?= mm_icon('layers', 16) ?> Example Deliverables
                        </h4>
                        <ul class="service-detail__list">
                            <?php foreach ($service['deliverables'] as $item) : ?>
                            <li><?= mm_icon('check', 16) ?><span><?= e($item) ?></span></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>

                <div class="service-detail__cta">
                    <p>Need <strong><?= e($service['title']) ?></strong> for a project?</p>
                    <a class="btn btn--primary"
                       href="book-now.php?service=<?= e(rawurlencode($service['slug'])) ?>">
                        Request a Quote
                        <?= mm_icon('arrow-right', 16) ?>
                    </a>
                </div>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ===================================================================== -->
<!-- PRICING NOTE                                                         -->
<!-- ===================================================================== -->
<section class="section section--tight">
    <div class="container">
        <div class="pricing-note" data-reveal="price">
            <div>
                <h2 class="pricing-note__title">Pricing depends on the project</h2>
                <p class="pricing-note__text">
                    Scope, complexity, deliverables and timeline all affect the quote. We do not publish
                    fixed prices because they would not reflect your actual project.
                </p>
            </div>
            <a class="btn btn--primary btn--lg" href="book-now.php">
                Request a Quote <?= mm_icon('arrow-right', 18) ?>
            </a>
        </div>
    </div>
</section>

<!-- ===================================================================== -->
<!-- CREATIVE WORKFLOW                                                    -->
<!-- ===================================================================== -->
<section class="section" aria-labelledby="workflow-title">
    <div class="container">
        <header class="section-head section-head--center" data-reveal="wf">
            <p class="eyebrow">
                <span class="eyebrow__dot" aria-hidden="true"></span>
                Creative Workflow
            </p>
            <h2 class="section-title" id="workflow-title">How a Project Moves Forward</h2>
        </header>

        <ol class="process">
            <?php foreach ($process_steps as $i => $step) : ?>
            <li class="process__step" data-reveal="wf" style="--reveal-delay: <?= (int) $i * 90 ?>ms">
                <span class="process__number">Step <?= e($step['number']) ?></span>
                <span class="process__icon" aria-hidden="true"><?= mm_icon($step['icon'], 22) ?></span>
                <h3 class="process__title"><?= e($step['title']) ?></h3>
                <p class="process__text"><?= e($step['text']) ?></p>
            </li>
            <?php endforeach; ?>
        </ol>
    </div>
</section>

<!-- ===================================================================== -->
<!-- FAQ                                                                  -->
<!-- ===================================================================== -->
<section class="section section--surface" aria-labelledby="faq-title">
    <div class="container">
        <header class="section-head section-head--center" data-reveal="faq">
            <p class="eyebrow">
                <span class="eyebrow__dot" aria-hidden="true"></span>
                FAQ
            </p>
            <h2 class="section-title" id="faq-title">Frequently Asked Questions</h2>
            <p class="section-lead">
                If your question is not answered here, send it with your project inquiry.
            </p>
        </header>

        <div class="faq" data-reveal="faq">
            <?php foreach ($faqs as $i => $faq) : ?>
            <details class="faq__item"<?= $i === 0 ? ' open' : '' ?>>
                <summary class="faq__q">
                    <span><?= e($faq['q']) ?></span>
                    <?= mm_icon('chevron-down', 20) ?>
                </summary>
                <div class="faq__a">
                    <p><?= e($faq['a']) ?></p>
                </div>
            </details>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ===================================================================== -->
<!-- FINAL CTA                                                            -->
<!-- ===================================================================== -->
<?php
$cta_title   = 'Ready to start a project?';
$cta_text    = 'Tell us what you are making and we will suggest the right creative approach.';
$cta_variant = 'dark';
require __DIR__ . '/includes/cta-banner.php';
?>

<?php require __DIR__ . '/includes/footer.php'; ?>