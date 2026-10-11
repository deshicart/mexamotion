<?php
/**
 * Mexa Motion — Reviews
 *
 * Page order:
 *  1. Shared header          4. Main testimonial carousel
 *  2. Reviews hero           5. Additional review grid
 *  3. Rating transparency   6. Final CTA + footer
 *
 * @package MexaMotion
 */

require_once __DIR__ . '/includes/functions.php';

$page_meta = [
    'title'       => 'Client Reviews | Mexa Motion',
    'description' => 'Read client feedback about working with Mexa Motion on video editing, motion graphics, brand video and social content projects.',
    'path'        => 'reviews.php',
    'og'          => 'assets/images/brand/logo-square.png',
    'scripts'     => ['assets/js/reviews.js?v=1.0.0'],
];

$page_nav   = 'reviews';
$body_class = 'page-reviews';

$reviews = mm_reviews();

/* Split reviews so the carousel and the grid do not repeat the same cards. */
$carousel_reviews = array_slice($reviews, 0, 6);
$grid_reviews     = array_slice($reviews, 6);

$has_real_reviews = false;
foreach ($reviews as $review) {
    if (empty($review['placeholder'])) { $has_real_reviews = true; break; }
}

require __DIR__ . '/includes/header.php';
?>

<!-- ===================================================================== -->
<!-- REVIEWS HERO                                                         -->
<!-- ===================================================================== -->
<section class="page-hero">
    <div class="container">
        <nav class="breadcrumb" aria-label="Breadcrumb">
            <a href="index.php">Home</a><span aria-hidden="true">/</span>
            <span aria-current="page">Reviews</span>
        </nav>

        <div class="page-hero__inner">
            <div data-reveal="hero">
                <p class="eyebrow">
                    <span class="eyebrow__dot" aria-hidden="true"></span>
                    Client Experiences
                </p>
                <h1 class="page-hero__title">Client Experiences with Mexa Motion</h1>
                <p class="page-hero__lead">
                    Every project is a collaboration. Explore feedback from clients who have worked
                    with our creative team.
                </p>
                <div class="page-hero__actions">
                    <a class="btn btn--primary btn--lg" href="book-now.php">Book Now <?= mm_icon('arrow-right', 18) ?></a>
                    <a class="btn btn--outline btn--lg" href="portfolio.php">View Our Work</a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php if (!$has_real_reviews) : ?>
<!-- ===================================================================== -->
<!-- RATING TRANSPARENCY NOTE                                             -->
<!-- ===================================================================== -->
<section class="section section--tight" style="padding-bottom:0">
    <div class="container">
        <div class="rating-summary" data-reveal="rating">
            <h2 class="aside-card__title">About the ratings on this page</h2>
            <p class="rating-summary__note">
                Mexa Motion does not publish an average score or a total review count at this time.
                Inventing those figures would misrepresent real customer feedback, so this site
                publishes nothing it cannot verify.
            </p>
            <ul class="rating-summary__list">
                <li class="service-detail__list-item" style="display:flex;gap:.55rem;font-size:var(--fs-sm)">
                    <?= mm_icon('check', 16) ?><span>Each review shows only information the client has approved for public use.</span>
                </li>
                <li style="display:flex;gap:.55rem;font-size:var(--fs-sm)">
                    <?= mm_icon('check', 16) ?><span>Ratings appear only when a confirmed score exists &mdash; otherwise the card says so.</span>
                </li>
                <li style="display:flex;gap:.55rem;font-size:var(--fs-sm)">
                    <?= mm_icon('check', 16) ?><span>No third-party platform badge is shown, because no public review profile exists yet.</span>
                </li>
            </ul>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- ===================================================================== -->
<!-- MAIN CAROUSEL                                                        -->
<!-- ===================================================================== -->
<section class="section" aria-labelledby="carousel-title">
    <div class="container">
        <header class="section-head section-head--center" data-reveal="crs">
            <p class="eyebrow">
                <span class="eyebrow__dot" aria-hidden="true"></span>
                Testimonials
            </p>
            <h2 class="section-title" id="carousel-title">What Our Clients Say</h2>
            <p class="section-lead">Swipe, use the arrows, or focus the slider and use the arrow keys.</p>
        </header>

        <?php
        $carousel_id        = 'reviews-page-carousel';
        $carousel_label     = 'Mexa Motion client testimonial carousel';
        $carousel_autoplay  = 8000;
        require __DIR__ . '/includes/review-carousel.php';
        ?>
    </div>
</section>

<!-- ===================================================================== -->
<!-- ADDITIONAL REVIEWS                                                  -->
<!-- ===================================================================== -->
<section class="section section--surface" aria-labelledby="more-title">
    <div class="container">
        <header class="section-head section-head--center" data-reveal="more">
            <h2 class="section-title" id="more-title">More Feedback</h2>
            <p class="section-lead">
                A quieter layout for reading testimonials at your own pace.
            </p>
        </header>

        <?php if (!empty($grid_reviews)) : ?>
        <div class="review-grid">
            <?php foreach ($grid_reviews as $i => $review) : ?>
            <div data-reveal="more" style="--reveal-delay: <?= (int) ($i % 3) * 70 ?>ms">
                <?php
                $variant = 'default';
                require __DIR__ . '/includes/review-card.php';
                ?>
            </div>
            <?php endforeach; ?>
        </div>
        <?php else : ?>
        <div class="values-grid" data-reveal="more">
            <article class="value-card">
                <span class="value-card__icon" aria-hidden="true"><?= mm_icon('chat', 22) ?></span>
                <h3 class="value-card__title">Collected after delivery</h3>
                <p class="value-card__text">
                    Feedback is requested once the agreed work has been delivered and accepted,
                    so the review reflects a finished project rather than a first impression.
                </p>
            </article>
            <article class="value-card">
                <span class="value-card__icon" aria-hidden="true"><?= mm_icon('shield', 22) ?></span>
                <h3 class="value-card__title">Published with permission</h3>
                <p class="value-card__text">
                    Every review is published only after the client approves the wording and the
                    details shown alongside it. Nothing is published anonymously without consent.
                </p>
            </article>
            <article class="value-card">
                <span class="value-card__icon" aria-hidden="true"><?= mm_icon('check', 22) ?></span>
                <h3 class="value-card__title">No invented ratings</h3>
                <p class="value-card__text">
                    Where a confirmed score does not exist, the card says so. We never publish an
                    average, a total count or a platform badge we cannot verify.
                </p>
            </article>
        </div>
        <p class="carousel__disclaimer" style="margin-inline:auto">
            <?= mm_icon('shield', 15) ?>
            <span>
                Additional reviews will be added here as more client-approved testimonials
                become available.
            </span>
        </p>
        <?php endif; ?>
    </div>
</section>

<!-- ===================================================================== -->
<!-- REVIEW SOURCE NOTE                                                  -->
<!-- ===================================================================== -->
<section class="section section--tight">
    <div class="container">
        <p class="review-source-note" data-reveal="src">
            <?= mm_icon('shield', 18) ?>
            <span>
                <strong>Where these reviews come from.</strong>
                Reviews on this site are collected directly from clients and published only with
                permission. If a public review platform page is created in future, it will be linked
                here with the correct URL rather than represented by a badge.
            </span>
        </p>
    </div>
</section>

<!-- ===================================================================== -->
<!-- FINAL CTA                                                            -->
<!-- ===================================================================== -->
<?php
$cta_title   = 'Want to work together?';
$cta_text    = 'Tell us about your project and we will reply with an honest view of what we can deliver.';
$cta_variant = 'dark';
require __DIR__ . '/includes/cta-banner.php';
?>

<?php require __DIR__ . '/includes/footer.php'; ?>