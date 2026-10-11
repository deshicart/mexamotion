<?php
/**
 * Client review carousel.
 *
 * Touch-friendly scroll-snap track with previous / next controls, position
 * dots, keyboard support, optional restrained autoplay and full
 * prefers-reduced-motion handling.
 *
 * @var string $carousel_id   Unique id (must be unique per page).
 * @var string $carousel_label Accessible label for the carousel region.
 * @var array  $carousel_reviews
 * @var int    $carousel_autoplay  Milliseconds; 0 disables autoplay.
 *
 * @package MexaMotion
 */

if (!defined('MM_ABSPATH')) {
    require_once __DIR__ . '/functions.php';
}

$carousel_id       = isset($carousel_id) ? $carousel_id : 'review-carousel';
$carousel_label    = isset($carousel_label) ? $carousel_label : 'Client reviews carousel';
$carousel_reviews  = isset($carousel_reviews) ? $carousel_reviews : mm_reviews();
$carousel_autoplay = isset($carousel_autoplay) ? (int) $carousel_autoplay : 7000;

if (empty($carousel_reviews)) {
    return;
}

$mm_has_sample = false;
foreach ($carousel_reviews as $mm_r) {
    if (!empty($mm_r['placeholder'])) {
        $mm_has_sample = true;
        break;
    }
}
?>
<div class="carousel"
     data-carousel
     data-autoplay="<?= (int) $carousel_autoplay ?>"
     id="<?= e($carousel_id) ?>">

    <div class="carousel__viewport"
         data-carousel-track
         tabindex="0"
         role="region"
         aria-roledescription="carousel"
         aria-label="<?= e($carousel_label) ?>">

        <?php foreach ($carousel_reviews as $mm_i => $mm_review) : ?>
        <div class="carousel__slide">
            <?php
            $review = $mm_review;
            require __DIR__ . '/review-card.php';
            ?>
        </div>
        <?php endforeach; ?>
    </div>

    <div class="carousel__controls">
        <button class="carousel__btn" type="button" data-carousel-prev aria-controls="<?= e($carousel_id) ?>">
            <?= mm_icon('arrow-left', 20) ?>
            <span class="sr-only">Previous review</span>
        </button>

        <div class="carousel__dots" data-carousel-dots role="tablist" aria-label="Choose review slide"></div>

        <button class="carousel__btn" type="button" data-carousel-next aria-controls="<?= e($carousel_id) ?>">
            <?= mm_icon('arrow-right', 20) ?>
            <span class="sr-only">Next review</span>
        </button>

        <?php if ($carousel_autoplay > 0) : ?>
        <button class="carousel__pause" type="button" data-carousel-toggle hidden aria-label="Pause review autoplay">
            <span class="carousel__pause-icon" aria-hidden="true"><?= mm_icon('pause', 14) ?></span>
            <span data-carousel-toggle-label>Pause</span>
        </button>
        <?php endif; ?>
    </div>

    <p class="sr-only" aria-live="polite" data-carousel-status></p>
</div>

<?php if ($mm_has_sample) : ?>
<p class="carousel__disclaimer">
    <?= mm_icon('shield', 15) ?>
    <span>
        <strong>Sample content.</strong> The reviews below are placeholders written to demonstrate the
        carousel layout. They are not genuine client testimonials and will be replaced with
        client-approved feedback before launch.
    </span>
</p>
<?php endif; ?>