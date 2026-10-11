<?php
/**
 * Reusable portfolio project card.
 *
 * @var array $project   Project entry from includes/data.php
 * @var bool  $show_meta
 *
 * @package MexaMotion
 */

if (!defined('MM_ABSPATH')) {
    require_once __DIR__ . '/functions.php';
}

$project    = isset($project) ? $project : [];
$show_meta  = isset($show_meta) ? (bool) $show_meta : true;

if (empty($project['slug'])) {
    return;
}

$mm_media   = isset($project['media']) ? $project['media'] : ['type' => 'image', 'src' => '', 'poster' => ''];
$mm_category = mm_service_label($project['category']);
// Without JavaScript this link scrolls to the card itself; with JavaScript the
// same click opens the detail overlay.
$mm_detail  = 'portfolio.php#project-' . rawurlencode($project['slug']);
$mm_ratio   = isset($project['ratio']) ? $project['ratio'] : '16 / 10';
?>
<article class="project-card"
         id="project-<?= e($project['slug']) ?>"
         data-project-card
         data-category="<?= e($project['category']) ?>"
         data-title="<?= e(strtolower($project['title'])) ?>">

    <a class="project-card__media" href="<?= e($mm_detail) ?>"
       data-project-open="<?= e($project['slug']) ?>">
        <span class="project-card__frame" style="--ratio: <?= e($mm_ratio) ?>">
            <img src="<?= e($mm_media['src']) ?>"
                 alt="<?= e($project['title']) ?>"
                 width="800" height="500"
                 loading="lazy" decoding="async">
            <?php if (!empty($project['placeholder'])) : ?>
            <span class="badge badge--sample project-card__badge">Sample project</span>
            <?php endif; ?>
            <?php if ($mm_media['type'] === 'video' && !empty($mm_media['src'])) : ?>
            <span class="project-card__play" aria-hidden="true"><?= mm_icon('play', 22) ?></span>
            <?php endif; ?>
        </span>
    </a>

    <div class="project-card__body">
        <div class="project-card__meta">
            <span class="project-card__category"><?= e($mm_category) ?></span>
            <?php if ($show_meta && !empty($project['platform'])) : ?>
            <span class="project-card__platform"><?= e($project['platform']) ?></span>
            <?php endif; ?>
        </div>

        <h3 class="project-card__title">
            <a href="<?= e($mm_detail) ?>" data-project-open="<?= e($project['slug']) ?>"><?= e($project['title']) ?></a>
        </h3>

        <?php if (!empty($project['excerpt'])) : ?>
        <p class="project-card__excerpt"><?= e($project['excerpt']) ?></p>
        <?php endif; ?>

        <a class="project-card__link" href="<?= e($mm_detail) ?>" data-project-open="<?= e($project['slug']) ?>">
            <span>View Project</span><?= mm_icon('arrow-right', 16) ?>
        </a>
    </div>
</article>