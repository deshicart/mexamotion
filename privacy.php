<?php
/**
 * Mexa Motion — Privacy Notice
 *
 * Version 1 of this website has no database, no admin panel and no analytics
 * or tracking scripts. This page explains what actually happens to the details
 * a visitor submits through the Book Now form.
 *
 * @package MexaMotion
 */

require_once __DIR__ . '/includes/functions.php';

$page_meta = [
    'title'       => 'Privacy Notice | Mexa Motion',
    'description' => 'How Mexa Motion handles information submitted through the project inquiry form on this website.',
    'path'        => 'privacy.php',
    'og'          => 'assets/images/brand/logo-square.png',
];

$page_nav   = '';
$body_class = 'page-privacy';

require __DIR__ . '/includes/header.php';
?>

<section class="page-hero">
    <div class="container">
        <nav class="breadcrumb" aria-label="Breadcrumb">
            <a href="index.php">Home</a><span aria-hidden="true">/</span>
            <span aria-current="page">Privacy Notice</span>
        </nav>
        <div class="page-hero__inner">
            <div data-reveal="hero">
                <p class="eyebrow">
                    <span class="eyebrow__dot" aria-hidden="true"></span>
                    Privacy
                </p>
                <h1 class="page-hero__title">Privacy Notice</h1>
                <p class="page-hero__lead">
                    A short, honest explanation of what happens to information you send through this
                    website.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div style="max-width:44rem">

            <div class="notice notice--info" style="margin-bottom:2rem">
                <?= mm_icon('shield', 18) ?>
                <span>
                    Version 1 of this site is built without a database and without an admin panel.
                    Nothing you submit is stored on the server by this website.
                </span>
            </div>

            <h2 class="section-title" style="font-size:var(--fs-h3)">What the inquiry form does</h2>
            <p>
                When you complete the <a href="book-now.php">Book Now</a> form, your entries are
                validated on the server and then formatted into a readable message. That message is
                shown to you on the confirmation page, and you choose whether to send it to us
                through WhatsApp, email or phone.
            </p>
            <p>
                The prepared message is held in your browser session only long enough to display the
                confirmation page, then discarded. It is never written to a file, a database or an
                email log by this website.
            </p>

            <h2 class="section-title" style="font-size:var(--fs-h3);margin-top:2rem">What we receive</h2>
            <p>
                If you send the message, Mexa Motion receives the details you chose to share &mdash;
                typically your name, a phone or WhatsApp number, an optional email address, and the
                project description you wrote. Those details are used to reply to your inquiry.
            </p>

            <h2 class="section-title" style="font-size:var(--fs-h3);margin-top:2rem">Third parties</h2>
            <p>
                This site loads web fonts from Google Fonts, which means your browser contacts Google
                when the page loads. There are no analytics scripts, advertising pixels, embedded
                videos or social widgets on this site.
            </p>
            <p>
                If you choose to send your inquiry through WhatsApp, that message is handled by
                WhatsApp under its own privacy policy after you send it.
            </p>

            <h2 class="section-title" style="font-size:var(--fs-h3);margin-top:2rem">Your choices</h2>
            <p>
                You can ask us to correct or remove details we hold about you at any time by
                contacting Mexa Motion through the details on this site.
            </p>

            <div style="margin-top:2.25rem;display:flex;flex-wrap:wrap;gap:.75rem">
                <a class="btn btn--primary" href="book-now.php">Start an inquiry</a>
                <a class="btn btn--outline" href="index.php">Back to home</a>
            </div>

            <p class="field__hint" style="margin-top:2rem">
                This notice is provided for transparency and may be revised when the site is updated.
                Last reviewed: <?= (int) date('F Y') ?>.
            </p>

        </div>
    </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>