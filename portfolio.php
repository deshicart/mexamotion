<?php
/**
 * Mexa Motion — Portfolio
 *
 * Page order:
 *  1. Shared header    4. Project grid
 *  2. Portfolio hero   5. Project detail overlay
 *  3. Category filters 6. Final CTA
 *                      7. Shared footer
 *
 * Category filtering runs client-side against static PHP data — no database.
 *
 * @package MexaMotion
 */

require_once __DIR__ . '/includes/functions.php';

$page_meta = [
    'title'       => 'Our Creative Portfolio | Mexa Motion',
    'description' => 'Explore selected video edits, motion graphics, thumbnails, brand videos and social content from Mexa Motion. Filter the work by service category.',
    'path'        => 'portfolio.php',
    'og'          => 'assets/images/brand/logo-square.png',
];

$page_nav   = 'portfolio';
$body_class = 'page-portfolio';

$projects = mm_projects();

/* Build the filter list from the actual project data so it never drifts. */
$filters = ['all' => 'All Projects'];
foreach (mm_services() as $service) {
    $filters[$service['slug']] = $service['title'];
}

$category_counts = ['all' => count($projects)];
foreach ($projects as $project) {
    $slug = $project['category'];
    $category_counts[$slug] = ($category_counts[$slug] ?? 0) + 1;
}

require __DIR__ . '/includes/header.php';
?>

<!-- ===================================================================== -->
<!-- PORTFOLIO HERO                                                       -->
<!-- ===================================================================== -->
<section class="page-hero">
    <div class="container">
        <nav class="breadcrumb" aria-label="Breadcrumb">
            <a href="index.php">Home</a><span aria-hidden="true">/</span>
            <span aria-current="page">Portfolio</span>
        </nav>

        <div class="page-hero__inner">
            <div data-reveal="hero">
                <p class="eyebrow">
                    <span class="eyebrow__dot" aria-hidden="true"></span>
                    Selected Work
                </p>
                <h1 class="page-hero__title">Creative Work, Made with Purpose</h1>
                <p class="page-hero__lead">
                    Explore selected video edits, motion graphics, thumbnails, brand videos, and
                    social content.
                </p>
                <div class="page-hero__actions">
                    <a class="btn btn--primary btn--lg" href="book-now.php">Book Now <?= mm_icon('arrow-right', 18) ?></a>
                    <a class="btn btn--outline btn--lg" href="services.php">Explore Our Services</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===================================================================== -->
<!-- CATEGORY FILTERS                                                     -->
<!-- ===================================================================== -->
<div class="filter-bar" data-filters>
    <div class="container filter-bar__inner">
        <div class="filter-bar__scroll" role="group" aria-label="Filter projects by category">
            <?php foreach ($filters as $key => $label) : ?>
            <button class="filter-chip<?= $key === 'all' ? ' is-active' : '' ?>"
                    type="button"
                    data-filter="<?= e($key) ?>"
                    aria-pressed="<?= $key === 'all' ? 'true' : 'false' ?>">
                <?= e($label) ?>
                <span class="filter-chip__count"><?= (int) ($category_counts[$key] ?? 0) ?></span>
            </button>
            <?php endforeach; ?>
        </div>
        <p class="filter-bar__count" data-filter-count aria-live="polite"><?= count($projects) ?> projects</p>
    </div>
</div>

<!-- ===================================================================== -->
<!-- PROJECT GRID                                                         -->
<!-- ===================================================================== -->
<section class="section" aria-labelledby="grid-title">
    <div class="container">
        <h2 class="sr-only" id="grid-title">Projects</h2>

        <div class="project-grid">
            <?php foreach ($projects as $i => $project) : ?>
            <div data-reveal="grid" style="--reveal-delay: <?= (int) ($i % 3) * 70 ?>ms">
                <?php require __DIR__ . '/includes/project-card.php'; ?>
            </div>
            <?php endforeach; ?>
        </div>

        <p class="portfolio-empty" data-portfolio-empty>
            No projects in this category yet. Try another filter, or
            <a href="book-now.php">send us your brief</a>.
        </p>
    </div>
</section>

<!-- ===================================================================== -->
<!-- SAMPLE CONTENT NOTICE                                               -->
<!-- ===================================================================== -->
<?php
$mm_any_sample = false;
foreach ($projects as $project) {
    if (!empty($project['placeholder'])) { $mm_any_sample = true; break; }
}
if ($mm_any_sample) :
?>
<section class="section section--tight" style="padding-top:0">
    <div class="container">
        <p class="notice notice--warn" style="max-width:52rem;margin-inline:auto">
            <?= mm_icon('shield', 18) ?>
            <span>
                <strong>Sample projects.</strong> The work shown above is placeholder artwork created
                for this build so the layout can be reviewed. It is <strong>not</strong> completed
                client work and will be replaced with real, client-approved projects before launch.
            </span>
        </p>
    </div>
</section>
<?php endif; ?>

<!-- ===================================================================== -->
<!-- PROJECT DETAIL OVERLAY                                               -->
<!-- ===================================================================== -->
<dialog class="project-dialog" data-project-dialog aria-labelledby="project-dialog-title">
    <div class="project-dialog__bar">
        <h2 class="project-dialog__title" id="project-dialog-title" data-project-dialog-title>Project</h2>
        <button class="project-dialog__close" type="button" data-project-dialog-close aria-label="Close project details">
            <?= mm_icon('close', 20) ?>
        </button>
    </div>

    <div class="project-dialog__body">
        <div class="project-dialog__media" data-project-dialog-media></div>

        <dl class="project-dialog__meta" data-project-dialog-meta></dl>

        <div class="project-dialog__section">
            <h4>Project overview</h4>
            <p data-project-dialog-overview></p>
        </div>

        <div class="project-dialog__section">
            <h4>Example deliverables</h4>
            <ul class="service-detail__list" data-project-dialog-deliverables></ul>
        </div>

        <div class="project-dialog__section">
            <p style="font-size:var(--fs-sm);color:var(--ink-2)">
                Planning a similar project?
                <a class="text-link" href="book-now.php" data-project-dialog-cta>
                    Send an inquiry <?= mm_icon('arrow-right', 15) ?>
                </a>
            </p>
        </div>
    </div>
</dialog>

<!-- Data for the overlay (static, no database) -->
<script type="application/json" id="portfolio-projects"><?= json_encode(array_map(static function ($project) {
    return [
        'slug'           => $project['slug'],
        'title'          => $project['title'],
        'category'       => $project['category'],
        'category_label' => mm_service_label($project['category']),
        'platform'       => $project['platform'] ?? '',
        'format'         => $project['format'] ?? '',
        'year'           => $project['year'] ?? '',
        'excerpt'        => $project['excerpt'] ?? '',
        'objective'      => $project['objective'] ?? '',
        'deliverables'   => $project['deliverables'] ?? [],
        'media'          => $project['media'] ?? [],
    ];
}, $projects), JSON_UNESCAPED_UNICODE) ?></script>

<?php
// Final CTA
$cta_title   = 'Like what you see?';
$cta_text    = 'Tell us about your own project and we will suggest the right creative approach.';
$cta_variant = 'dark';
require __DIR__ . '/includes/cta-banner.php';
?>

<?php require __DIR__ . '/includes/footer.php'; ?>