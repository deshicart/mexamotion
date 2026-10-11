<?php
/**
 * Reusable service card.
 *
 * @var array  $service  Service entry from includes/data.php
 * @var string $variant  'default' | 'compact' | 'feature'
 * @var bool   $show_link
 *
 * @package MexaMotion
 */

if (!defined('MM_ABSPATH')) {
    require_once __DIR__ . '/functions.php';
}

$service   = isset($service) ? $service : [];
$variant   = isset($variant) ? $variant : 'default';
$show_link = isset($show_link) ? (bool) $show_link : true;

if (empty($service['slug'])) {
    return;
}

$mm_link = 'services.php#' . $service['slug'];
?>
<article class="service-card service-card--<?= e($variant) ?>">
    <span class="service-card__icon" aria-hidden="true">
        <?= mm_icon($service['icon'], 24) ?>
    </span>

    <div class="service-card__body">
        <h3 class="service-card__title">
            <a href="<?= e($mm_link) ?>"><?= e($service['title']) ?></a>
        </h3>
        <p class="service-card__tagline"><?= e($service['tagline']) ?></p>
        <?php if ($variant !== 'compact') : ?>
        <p class="service-card__summary"><?= e($service['summary']) ?></p>
        <?php endif; ?>
    </div>

    <?php if ($show_link) : ?>
    <a class="service-card__link" href="<?= e($mm_link) ?>">
        <span>Explore Service</span>
        <?= mm_icon('arrow-right', 16) ?>
    </a>
    <?php endif; ?>
</article>