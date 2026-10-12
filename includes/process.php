<?php
/**
 * How We Work / Process — Section
 *
 * @package MexaMotion
 */

if (!defined('MM_ABSPATH')) {
    require_once __DIR__ . '/functions.php';
}

$process = mm_data('process');
?>
<!-- ===================================================================== -->
<!-- HOW WE WORK — PROCESS                                               -->
<!-- ===================================================================== -->
<section class="section" id="process" aria-labelledby="process-title">
    <div class="container">
        <header class="section-head section-head--center" data-reveal="process">
            <p class="eyebrow">
                <span class="eyebrow__dot" aria-hidden="true"></span>
                Our Process
            </p>
            <h2 class="section-title" id="process-title">How a Project Moves Forward</h2>
            <p class="section-lead">
                A clear, repeatable workflow keeps the creative focused and the timeline on track.
            </p>
        </header>

        <ol class="process">
            <?php foreach ($process as $i => $step) : ?>
            <li class="process__step" data-reveal="process" style="--reveal-delay: <?= (int) $i * 90 ?>ms">
                <span class="process__number"><?= e($step['number']) ?></span>
                <span class="process__icon" aria-hidden="true"><?= mm_icon($step['icon'], 22) ?></span>
                <h3 class="process__title"><?= e($step['title']) ?></h3>
                <p class="process__text"><?= e($step['text']) ?></p>
            </li>
            <?php endforeach; ?>
        </ol>
    </div>
</section>