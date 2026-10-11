<?php
/**
 * Reusable testimonial / review card.
 *
 * @var array  $review  Review entry from includes/data.php
 * @var string $variant 'default' | 'featured'
 *
 * @package MexaMotion
 */

if (!defined('MM_ABSPATH')) {
    require_once __DIR__ . '/functions.php';
}

$review  = isset($review) ? $review : [];
$variant = isset($variant) ? $variant : 'default';

if (empty($review['text'])) {
    return;
}

$mm_initial = mb_strtoupper(mb_substr($review['name'], 0, 1));
?>
<blockquote class="review-card review-card--<?= e($variant) ?>"
            data-review-slide
            role="group"
            aria-roledescription="slide">

    <span class="review-card__quote" aria-hidden="true"><?= mm_icon('quote', 26) ?></span>

    <?php if (!empty($review['rating'])) : ?>
    <div class="review-card__stars">
        <?= mm_stars($review['rating'], false) ?>
        <span class="review-card__rating-text"><?= (int) $review['rating'] ?>/5</span>
    </div>
    <?php else : ?>
    <p class="review-card__unrated">Rating not yet verified</p>
    <?php endif; ?>

    <p class="review-card__text"><?= e($review['text']) ?></p>

    <footer class="review-card__footer">
        <span class="review-card__avatar" aria-hidden="true"><?= e($mm_initial) ?></span>
        <div class="review-card__person">
            <cite class="review-card__name"><?= e($review['name']) ?></cite>
            <p class="review-card__role">
                <?= e($review['role']) ?>
                <?php if (!empty($review['location'])) : ?>
                <span class="review-card__dot" aria-hidden="true">·</span>
                <span><?= e($review['location']) ?></span>
                <?php endif; ?>
            </p>
        </div>
        <?php if (!empty($review['placeholder'])) : ?>
        <span class="badge badge--sample review-card__badge">Sample text</span>
        <?php endif; ?>
    </footer>
</blockquote>