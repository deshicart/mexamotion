<?php
/**
 * Mexa Motion — Our Team
 *
 * Page order:
 *  1. Shared header           4. Team member grid
 *  2. Team hero               5. Creative collaboration
 *  3. Team introduction       6. Final CTA + footer
 *
 * Team entries live in includes/data.php. Placeholder cards are clearly
 * labelled and must be replaced with client-approved profiles before launch.
 *
 * @package MexaMotion
 */

require_once __DIR__ . '/includes/functions.php';

$page_meta = [
    'title'       => 'Meet Our Team | Mexa Motion',
    'description' => 'Meet the creative team behind Mexa Motion — direction, video editing, motion graphics and design for brands and creators.',
    'path'        => 'team.php',
    'og'          => 'assets/images/brand/logo-square.png',
];

$page_nav   = 'team';
$body_class = 'page-team';

$team = mm_team();

$has_real_team = false;
foreach ($team as $member) {
    if (empty($member['placeholder'])) { $has_real_team = true; break; }
}

require __DIR__ . '/includes/header.php';
?>

<!-- ===================================================================== -->
<!-- TEAM HERO                                                            -->
<!-- ===================================================================== -->
<section class="page-hero">
    <div class="container">
        <nav class="breadcrumb" aria-label="Breadcrumb">
            <a href="index.php">Home</a><span aria-hidden="true">/</span>
            <span aria-current="page">Our Team</span>
        </nav>

        <div class="page-hero__inner">
            <div data-reveal="hero">
                <p class="eyebrow">
                    <span class="eyebrow__dot" aria-hidden="true"></span>
                    Our Team
                </p>
                <h1 class="page-hero__title">Meet the Creative Minds Behind Mexa Motion</h1>
                <p class="page-hero__lead">
                    A creative team focused on turning ideas into polished visual content.
                </p>
                <div class="page-hero__actions">
                    <a class="btn btn--primary btn--lg" href="book-now.php">Book Now <?= mm_icon('arrow-right', 18) ?></a>
                    <a class="btn btn--outline btn--lg" href="about.php">About the Studio</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===================================================================== -->
<!-- TEAM INTRODUCTION                                                   -->
<!-- ===================================================================== -->
<section class="section section--tight" aria-labelledby="team-intro-title">
    <div class="container">
        <header class="section-head section-head--center" data-reveal="ti">
            <p class="eyebrow">
                <span class="eyebrow__dot" aria-hidden="true"></span>
                Who Does What
            </p>
            <h2 class="section-title" id="team-intro-title">Small Team, Clear Roles</h2>
            <p class="section-lead">
                Every project is handled by the people whose craft matches the brief, with one point
                of contact from the first conversation to delivery.
            </p>
        </header>
    </div>
</section>

<?php if (!$has_real_team) : ?>
<section class="section" style="padding-top:0">
    <div class="container">
        <p class="notice notice--warn" style="max-width:52rem;margin-inline:auto">
            <?= mm_icon('shield', 18) ?>
            <span>
                <strong>Placeholder profiles.</strong> The names, roles and portraits below are
                placeholders for layout purposes only. They are not real people. Approved team
                names, titles, biographies and photographs will be published here once supplied
                and confirmed by Mexa Motion.
            </span>
        </p>
    </div>
</section>
<?php endif; ?>

<!-- ===================================================================== -->
<!-- TEAM GRID                                                            -->
<!-- ===================================================================== -->
<section class="section" style="padding-top:<?= $has_real_team ? 'clamp(2rem,1.5rem+2vw,3rem)' : '0' ?>" aria-labelledby="team-grid-title">
    <div class="container">
        <h2 class="sr-only" id="team-grid-title">Team members</h2>

        <div class="team-grid">
            <?php foreach ($team as $i => $member) : ?>
            <article class="team-card" data-reveal="tg" style="--reveal-delay: <?= (int) ($i % 4) * 70 ?>ms">
                <div class="team-card__media">
                    <img src="<?= e($member['image']) ?>"
                         alt="<?= empty($member['placeholder']) ? 'Portrait of ' . e($member['name']) : 'Placeholder portrait for the ' . e($member['role']) . ' role' ?>"
                         width="480" height="600" loading="lazy" decoding="async">
                    <?php if (!empty($member['placeholder'])) : ?>
                    <span class="badge badge--sample team-card__badge">Placeholder</span>
                    <?php endif; ?>
                </div>

                <div class="team-card__body">
                    <h3 class="team-card__name"><?= e($member['name']) ?></h3>
                    <p class="team-card__role"><?= e($member['role']) ?></p>
                    <p class="team-card__bio"><?= e($member['bio']) ?></p>

                    <ul class="team-card__skills">
                        <?php foreach ($member['skills'] as $skill) : ?>
                        <li><?= e($skill) ?></li>
                        <?php endforeach; ?>
                    </ul>

                    <?php if (!empty($member['social'])) : ?>
                    <a class="text-link" href="<?= e($member['social']) ?>" target="_blank" rel="noopener noreferrer"
                       style="margin-top:.75rem;font-size:var(--fs-sm)">
                        View profile <?= mm_icon('external', 14) ?>
                    </a>
                    <?php endif; ?>
                </div>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ===================================================================== -->
<!-- CREATIVE COLLABORATION                                              -->
<!-- ===================================================================== -->
<section class="section section--surface" aria-labelledby="collab-title">
    <div class="container">
        <div class="team-collaboration" data-reveal="collab">
            <div>
                <p class="eyebrow">
                    <span class="eyebrow__dot" aria-hidden="true"></span>
                    Collaboration
                </p>
                <h2 class="section-title" id="collab-title">How We Work With Clients</h2>
                <p class="section-lead" style="margin-bottom:0">
                    The relationship matters as much as the edit. These are the working habits we
                    bring to every project.
                </p>
            </div>

            <ul class="team-collaboration__list">
                <li><?= mm_icon('chat', 18) ?><span>One point of contact, so communication stays simple and decisions do not get lost.</span></li>
                <li><?= mm_icon('clipboard', 18) ?><span>Feedback is collected at agreed points rather than scattered through production.</span></li>
                <li><?= mm_icon('target', 18) ?><span>Suggestions come with a reason, so you can judge them against the brief.</span></li>
                <li><?= mm_icon('clock', 18) ?><span>Scope, revision terms and delivery dates are agreed in writing before work starts.</span></li>
                <li><?= mm_icon('shield', 18) ?><span>If a request falls outside what we can do well, we say so early instead of halfway through.</span></li>
            </ul>
        </div>
    </div>
</section>

<!-- ===================================================================== -->
<!-- FINAL CTA                                                            -->
<!-- ===================================================================== -->
<?php
$cta_title   = 'Work with the team';
$cta_text    = 'Tell us what you are making, and we will tell you honestly how we can help.';
$cta_variant = 'dark';
require __DIR__ . '/includes/cta-banner.php';
?>

<?php require __DIR__ . '/includes/footer.php'; ?>