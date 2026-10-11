<?php
/**
 * Mexa Motion — About
 *
 * Page order:
 *  1. Shared header  5. Values
 *  2. About hero     6. Working process
 *  3. Introduction   7. Team preview
 *  4. Mission        8. Final CTA + footer
 *
 * @package MexaMotion
 */

require_once __DIR__ . '/includes/functions.php';

$page_meta = [
    'title'       => 'About Mexa Motion | Creative Studio',
    'description' => 'Mexa Motion is a creative content studio focused on video editing, motion graphics and visual storytelling for brands and creators. Learn about our approach and values.',
    'path'        => 'about.php',
    'og'          => 'assets/images/brand/logo-square.png',
];

$page_nav   = 'about';
$body_class = 'page-about';

$values      = mm_data('values');
$process     = mm_data('process');
$team        = mm_team();

require __DIR__ . '/includes/header.php';
?>

<!-- ===================================================================== -->
<!-- ABOUT HERO                                                           -->
<!-- ===================================================================== -->
<section class="page-hero">
    <div class="container">
        <nav class="breadcrumb" aria-label="Breadcrumb">
            <a href="index.php">Home</a><span aria-hidden="true">/</span>
            <span aria-current="page">About</span>
        </nav>

        <div class="page-hero__inner page-hero__inner--split">
            <div data-reveal="hero">
                <p class="eyebrow">
                    <span class="eyebrow__dot" aria-hidden="true"></span>
                    About Mexa Motion
                </p>
                <h1 class="page-hero__title">Creative Thinking. Thoughtful Execution.</h1>
                <p class="page-hero__lead">
                    Mexa Motion helps brands and creators communicate their ideas through video
                    editing, motion graphics, and visual content.
                </p>
                <div class="page-hero__actions">
                    <a class="btn btn--primary btn--lg" href="book-now.php">Book Now <?= mm_icon('arrow-right', 18) ?></a>
                    <a class="btn btn--outline btn--lg" href="team.php">Meet the Team</a>
                </div>
            </div>

            <div class="page-hero__panel" data-reveal="hero" style="--reveal-delay:120ms">
                <img src="assets/images/about/studio-collage.svg"
                     alt="Placeholder artwork representing a Mexa Motion creative studio collage."
                     width="900" height="700" loading="eager" decoding="async">
            </div>
        </div>
    </div>
</section>

<!-- ===================================================================== -->
<!-- AGENCY INTRODUCTION                                                 -->
<!-- ===================================================================== -->
<section class="section" aria-labelledby="intro-title">
    <div class="container">
        <div class="about-intro">
            <div data-reveal="intro">
                <p class="eyebrow">
                    <span class="eyebrow__dot" aria-hidden="true"></span>
                    Who We Are
                </p>
                <h2 class="section-title" id="intro-title">A Creative Content Studio</h2>

                <p style="font-size:var(--fs-lead);color:var(--ink)">
                    Mexa Motion is a creative studio working across video editing, motion graphics,
                    thumbnail design and social content. We produce visual work for brands that need
                    to explain a product, build a channel, or present an idea clearly.
                </p>

                <p>
                    The problems we are usually asked to solve are practical ones: a launch video that
                    has to land in a week, a channel that needs a consistent look across dozens of
                    uploads, a product that is difficult to describe in words alone, or a campaign
                    that needs several creative versions from a single production day.
                </p>

                <p>
                    We work from the brief. Before any creative decision is made we establish what the
                    content is for, who it is aimed at, where it will be published, and what a good
                    result looks like. The editing, motion and design choices follow from that.
                </p>

                <p>
                    Projects are scoped in writing &mdash; deliverables, formats, style, revision terms
                    and timeline &mdash; so both sides know what is being produced before production
                    starts.
                </p>

                <div style="display:flex;flex-wrap:wrap;gap:.75rem;margin-top:1.75rem">
                    <a class="btn btn--primary" href="services.php">Explore Our Services</a>
                    <a class="btn btn--outline" href="portfolio.php">View Our Work</a>
                </div>
            </div>

            <figure class="about-intro__figure" data-reveal="intro" style="--reveal-delay:120ms;margin:0">
                <img src="assets/images/about/process-board.svg"
                     alt="Placeholder artwork representing the Mexa Motion creative process."
                     width="900" height="700" loading="lazy" decoding="async">
                <figcaption style="padding:.9rem 1rem;font-size:var(--fs-xs);color:var(--ink-2);background:var(--surface);border-top:1px solid var(--line)">
                    Placeholder studio image &mdash; replace with an approved studio or project photograph before launch.
                </figcaption>
            </figure>
        </div>
    </div>
</section>

<!-- ===================================================================== -->
<!-- MISSION & PHILOSOPHY                                                -->
<!-- ===================================================================== -->
<section class="section section--surface" aria-labelledby="mission-title">
    <div class="container">
        <div class="mission-card" data-reveal="mission">
            <p class="mission-card__label">Our Mission &mdash; proposed brand copy</p>
            <h2 class="mission-card__text" id="mission-title">
                Our mission is to turn ideas into clear, engaging visual content that helps brands
                and creators communicate with confidence.
            </h2>
            <p class="mission-card__sub">
                Every project begins with understanding the message, audience, and intended outcome.
                Creative decisions should support the purpose of the content.
            </p>
        </div>
    </div>
</section>

<!-- ===================================================================== -->
<!-- CORE VALUES                                                          -->
<!-- ===================================================================== -->
<section class="section" aria-labelledby="values-title">
    <div class="container">
        <header class="section-head section-head--split" data-reveal="values">
            <div>
                <p class="eyebrow">
                    <span class="eyebrow__dot" aria-hidden="true"></span>
                    Core Values
                </p>
                <h2 class="section-title" id="values-title">What the Work Is Built On</h2>
                <p class="section-lead">
                    Five principles that shape how briefs are handled, how work is reviewed, and how
                    projects are delivered.
                </p>
            </div>
        </header>

        <div class="values-grid">
            <?php foreach ($values as $i => $value) : ?>
            <article class="value-card" data-reveal="values" style="--reveal-delay: <?= (int) ($i % 3) * 70 ?>ms">
                <span class="value-card__icon" aria-hidden="true"><?= mm_icon($value['icon'], 22) ?></span>
                <h3 class="value-card__title"><?= e($value['title']) ?></h3>
                <p class="value-card__text"><?= e($value['text']) ?></p>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ===================================================================== -->
<!-- WORKING PROCESS                                                     -->
<!-- ===================================================================== -->
<section class="section section--surface" aria-labelledby="about-process-title">
    <div class="container">
        <header class="section-head section-head--center" data-reveal="ap">
            <p class="eyebrow">
                <span class="eyebrow__dot" aria-hidden="true"></span>
                Working Process
            </p>
            <h2 class="section-title" id="about-process-title">Four Stages, Every Project</h2>
            <p class="section-lead">
                The same structure we describe on the homepage and the services page.
            </p>
        </header>

        <ol class="process">
            <?php foreach ($process as $i => $step) : ?>
            <li class="process__step" data-reveal="ap" style="--reveal-delay: <?= (int) $i * 90 ?>ms">
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
<!-- TEAM PREVIEW                                                        -->
<!-- ===================================================================== -->
<section class="section" aria-labelledby="team-preview-title">
    <div class="container">
        <header class="section-head section-head--split" data-reveal="tp">
            <div>
                <p class="eyebrow">
                    <span class="eyebrow__dot" aria-hidden="true"></span>
                    The People
                </p>
                <h2 class="section-title" id="team-preview-title">The Team Behind the Work</h2>
                <p class="section-lead">
                    A small creative group covering direction, editing, motion and design.
                </p>
            </div>
            <a class="btn btn--outline" href="team.php">
                Meet the Team <?= mm_icon('arrow-right', 18) ?>
            </a>
        </header>

        <div class="team-grid">
            <?php foreach (array_slice($team, 0, 4) as $i => $member) : ?>
            <div data-reveal="tp" style="--reveal-delay: <?= (int) $i * 70 ?>ms">
                <article class="team-card">
                    <div class="team-card__media">
                        <img src="<?= e($member['image']) ?>"
                             alt="Placeholder portrait for the <?= e($member['role']) ?> role."
                             width="480" height="600" loading="lazy" decoding="async">
                        <?php if (!empty($member['placeholder'])) : ?>
                        <span class="badge badge--sample team-card__badge">Placeholder</span>
                        <?php endif; ?>
                    </div>
                    <div class="team-card__body">
                        <h3 class="team-card__name"><?= e($member['name']) ?></h3>
                        <p class="team-card__role"><?= e($member['role']) ?></p>
                        <ul class="team-card__skills">
                            <?php foreach ($member['skills'] as $skill) : ?>
                            <li><?= e($skill) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </article>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ===================================================================== -->
<!-- FINAL CTA                                                            -->
<!-- ===================================================================== -->
<?php
$cta_title   = 'Let’s build something clear';
$cta_text    = 'Share your brief and we will come back with an honest view of scope, approach and timing.';
$cta_variant = 'dark';
require __DIR__ . '/includes/cta-banner.php';
?>

<?php require __DIR__ . '/includes/footer.php'; ?>