<?php
$pageTitle = 'Page Not Found - Mexa Motion';
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/navbar.php';
?>
<main id="main-content" role="main">
  <section class="section" style="min-height: 70vh; display: flex; align-items: center; justify-content: center; text-align: center;">
    <div class="container">
      <div style="max-width: 480px; margin: 0 auto;" class="reveal">
        <div style="font-size: 12rem; font-weight: 800; font-family: var(--font-display); background: linear-gradient(135deg, var(--color-primary), var(--color-primary-glow)); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; line-height: 1; margin-bottom: var(--space-lg);">404</div>
        <h1 style="margin-bottom: var(--space-md);">Page Not Found</h1>
        <p style="margin-bottom: var(--space-xl); font-size: var(--fs-lg);">Sorry, we couldn't find the page you're looking for. It might have been moved or doesn't exist.</p>
        <div style="display: flex; gap: var(--space-md); justify-content: center; flex-wrap: wrap;">
          <a href="/" class="btn btn-primary btn-lg">Go Home</a>
          <a href="/portfolio.php" class="btn btn-secondary btn-lg">View Our Work</a>
        </div>
        <p style="margin-top: var(--space-2xl); color: var(--color-text-muted); font-size: var(--fs-sm);">Or contact us at <a href="mailto:hello@mexamotion.com" style="color: var(--color-primary);">hello@mexamotion.com</a></p>
      </div>
    </div>
  </section>
</main>
<?php include __DIR__ . '/includes/footer.php'; ?>