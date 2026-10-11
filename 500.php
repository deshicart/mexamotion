<?php
$pageTitle = 'Server Error - Mexa Motion';
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/navbar.php';
?>
<main id="main-content" role="main">
  <section class="section" style="min-height: 70vh; display: flex; align-items: center; justify-content: center; text-align: center;">
    <div class="container">
      <div style="max-width: 480px; margin: 0 auto;" class="reveal">
        <div style="width: 120px; height: 120px; margin: 0 auto var(--space-lg); background: linear-gradient(135deg, var(--color-error), #F97316); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
          <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
        </div>
        <h1 style="margin-bottom: var(--space-md);">Server Error</h1>
        <p style="margin-bottom: var(--space-xl); font-size: var(--fs-lg);">Something went wrong on our end. Our team has been notified and we're working to fix it.</p>
        <div style="display: flex; gap: var(--space-md); justify-content: center; flex-wrap: wrap;">
          <a href="/" class="btn btn-primary btn-lg">Go Home</a>
          <button onclick="location.reload()" class="btn btn-secondary btn-lg">Retry</button>
        </div>
        <p style="margin-top: var(--space-2xl); color: var(--color-text-muted); font-size: var(--fs-sm);">If the problem persists, contact us at <a href="mailto:hello@mexamotion.com" style="color: var(--color-primary);">hello@mexamotion.com</a></p>
      </div>
    </div>
  </section>
</main>
<?php include __DIR__ . '/includes/footer.php'; ?>