<?php
/**
 * Why Choose Mexa Motion — Section
 *
 * @package MexaMotion
 */

if (!defined('MM_ABSPATH')) {
    require_once __DIR__ . '/functions.php';
}

$why_choose = mm_data('why_choose');
?>
<!-- ===================================================================== -->
<!-- WHY CHOOSE MEXA MOTION                                               -->
<!-- ===================================================================== -->
<section class="section" id="why" aria-labelledby="why-title">
    <div class="container">
        <header class="section-head section-head--center" data-reveal="why">
            <p class="eyebrow">
                <span class="eyebrow__dot" aria-hidden="true"></span>
                Why Choose Us
            </p>
            <h2 class="section-title" id="why-title">Built Around the Message, Not a Template</h2>
            <p class="section-lead">
                Every project starts by working out what the content needs to achieve. The
                creative decisions follow from that.
            </p>
        </header>

        <div class="why">
            <div class="why__intro" data-reveal="why">
                <?php foreach ($why_choose as $i => $item) : ?>
                <div class="why__item" data-reveal="why" style="--reveal-delay: <?= (int) $i * 70 ?>ms">
                    <span class="why__icon" aria-hidden="true"><?= mm_icon($item['icon'], 22) ?></span>
                    <div>
                        <h3 class="why__title"><?= e($item['title']) ?></h3>
                        <p class="why__text"><?= e($item['text']) ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <aside class="why__aside" data-reveal="why" style="--reveal-delay: 200ms">
                <p class="why__aside-quote">&ldquo;Clear communication first. Better creative work follows.&rdquo;</p>
                <p class="why__aside-note">
                    A working principle for the studio &mdash; keep the brief, the audience and the
                    creative goal aligned so every revision moves the project forward.
                </p>
            </aside>
        </div>
    </div>
</section>