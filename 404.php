<?php
/**
 * Mexa Motion — 404 page
 *
 * Configure as the Apache ErrorDocument / Nginx error_page target so a missing
 * page still renders the full site design.
 *
 * @package MexaMotion
 */

require_once __DIR__ . '/includes/functions.php';

http_response_code(404);

$page_meta = [
    'title'       => 'Page Not Found (404) | Mexa Motion',
    'description' => 'The page you were looking for could not be found.',
    'path'        => '404.php',
    'og'          => 'assets/images/brand/logo-square.png',
    'noindex'     => true,
];

$page_nav   = '';
$body_class = 'page-404';

require __DIR__ . '/includes/header.php';
?>

<section class="error-page">
    <div class="container">
        <div style="max-width:34rem;text-align:center">
            <p class="error-page__code">404</p>
            <h1 class="section-title">This page could not be found</h1>
            <p class="section-lead" style="margin-bottom:2rem">
                The link may be outdated, or the page may have moved. Try one of the routes below.
            </p>

            <div style="display:flex;flex-wrap:wrap;gap:.75rem;justify-content:center;margin-bottom:2.5rem">
                <a class="btn btn--primary btn--lg" href="index.php">Back to home</a>
                <a class="btn btn--outline btn--lg" href="services.php">Our services</a>
                <a class="btn btn--outline btn--lg" href="portfolio.php">Portfolio</a>
                <a class="btn btn--outline btn--lg" href="book-now.php">Book Now</a>
            </div>

            <nav aria-label="Site sections">
                <p class="field__hint" style="margin-bottom:.6rem">All pages</p>
                <ul style="display:flex;flex-wrap:wrap;gap:.5rem 1.25rem;justify-content:center">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="services.php">Services</a></li>
                    <li><a href="portfolio.php">Portfolio</a></li>
                    <li><a href="reviews.php">Reviews</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="team.php">Our Team</a></li>
                </ul>
            </nav>
        </div>
    </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>