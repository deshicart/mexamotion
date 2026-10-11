<?php
$pageTitle = 'About Us - Mexa Motion';
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/navbar.php';
?>
<main id="main-content" role="main">
  <!-- About Hero -->
  <section class="about-hero" aria-labelledby="about-title">
    <div class="container">
      <span class="section-tag reveal">Our Story</span>
      <h1 id="about-title" class="page-header__title reveal">Crafting Visual Excellence Since 2019</h1>
      <p class="page-header__desc reveal">From a small creative studio in Dhaka to a global motion design partner — our journey is built on passion, precision, and the relentless pursuit of better visual storytelling.</p>
    </div>
  </section>

  <!-- Mission & Vision -->
  <section class="section" aria-labelledby="mission-title">
    <div class="container">
      <div class="grid grid-cols-2 gap-xl" style="align-items: center;">
        <div class="reveal">
          <span class="section-tag">Our Philosophy</span>
          <h2 id="mission-title" class="section-title" style="text-align: left;">Motion with Purpose</h2>
          <p class="section-desc" style="text-align: left; margin-bottom: var(--space-lg);">We believe every frame should serve a purpose. Whether it's a 15-second Reel or a 3-minute brand film, we approach each project with the same question: <strong>How does this move the viewer to action?</strong></p>
          <p style="color: var(--color-text-secondary); margin-bottom: var(--space-lg);">Our process blends creative strategy with technical mastery. We don't just execute briefs — we challenge them, refine them, and elevate them. The result? Visual content that doesn't just look good, it performs.</p>
          <p style="color: var(--color-text-secondary);">Based in Dhaka, Bangladesh, we serve clients across 50+ countries. Our global perspective, combined with local cost advantages, means you get world-class creative at a fraction of agency prices.</p>
        </div>
        <div class="reveal">
          <div style="aspect-ratio: 4/3; border-radius: var(--radius-xl); overflow: hidden; background: var(--color-bg-layer); border: 1px solid var(--color-border);">
            <img src="/assets/images/about/studio.jpg" alt="Mexa Motion creative studio workspace" loading="lazy" width="640" height="480" style="width: 100%; height: 100%; object-fit: cover;">
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Statistics -->
  <section class="section" style="background: var(--color-bg-layer);" aria-labelledby="stats-title">
    <div class="container">
      <header class="section-header reveal">
        <span class="section-tag">By the Numbers</span>
        <h2 id="stats-title" class="section-title">Our Impact in Numbers</h2>
      </header>
      <div class="stats-grid">
        <article class="stat-card reveal" role="listitem">
          <div class="stat-card__value" data-count="500">0</div>
          <div class="stat-card__label">Projects Delivered</div>
        </article>
        <article class="stat-card reveal" role="listitem">
          <div class="stat-card__value" data-count="99">0</div>
          <div class="stat-card__label">Client Satisfaction %</div>
        </article>
        <article class="stat-card reveal" role="listitem">
          <div class="stat-card__value" data-count="50">0</div>
          <div class="stat-card__label">Countries Served</div>
        </article>
        <article class="stat-card reveal" role="listitem">
          <div class="stat-card__value" data-count="24">0</div>
          <div class="stat-card__label">Avg Turnaround (hrs)</div>
        </article>
        <article class="stat-card reveal" role="listitem">
          <div class="stat-card__value" data-count="15">0</div>
          <div class="stat-card__label">Team Members</div>
        </article>
        <article class="stat-card reveal" role="listitem">
          <div class="stat-card__value" data-count="100">0</div>
          <div class="stat-card__label">Repeat Client Rate %</div>
        </article>
        <article class="stat-card reveal" role="listitem">
          <div class="stat-card__value" data-count="50">0</div>
          <div class="stat-card__label">Industries Served</div>
        </article>
        <article class="stat-card reveal" role="listitem">
          <div class="stat-card__value" data-count="10">0</div>
          <div class="stat-card__label">Languages Supported</div>
        </article>
      </div>
    </div>
  </section>

  <!-- Core Values -->
  <section class="about-values" aria-labelledby="values-title">
    <div class="container">
      <header class="section-header reveal">
        <span class="section-tag">Core Values</span>
        <h2 id="values-title" class="section-title">What Drives Us</h2>
      </header>
      <div class="values-grid">
        <article class="value-card reveal" role="listitem">
          <div class="value-card__icon" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
          </div>
          <h3 class="value-card__title">Integrity First</h3>
          <p class="value-card__desc">Transparent pricing, honest timelines, and commitments we keep. No hidden fees, no surprises.</p>
        </article>
        <article class="value-card reveal" role="listitem">
          <div class="value-card__icon" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="16 18 22 12 16 6"/><polyline points="8 18 2 12 8 6"/></svg>
          </div>
          <h3 class="value-card__title">Creative Excellence</h3>
          <p class="value-card__desc">Obsessive attention to detail. Every transition, color grade, and keyframe crafted to the highest standard.</p>
        </article>
        <article class="value-card reveal" role="listitem">
          <div class="value-card__icon" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
          </div>
          <h3 class="value-card__title">Client Partnership</h3>
          <p class="value-card__desc">We're an extension of your team. Proactive communication, collaborative tools, and shared success metrics.</p>
        </article>
        <article class="value-card reveal" role="listitem">
          <div class="value-card__icon" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
          </div>
          <h3 class="value-card__title">Continuous Innovation</h3>
          <p class="value-card__desc">Always learning, always evolving. We invest in the latest tools, techniques, and talent to stay ahead.</p>
        </article>
        <article class="value-card reveal" role="listitem">
          <div class="value-card__icon" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/><polyline points="3.27 6.96 12 12.01 20.73 6.96"/><line x1="12" y1="22.08" x2="12" y2="12"/></svg>
          </div>
          <h3 class="value-card__title">Results-Driven</h3>
          <p class="value-card__desc">Beautiful work that performs. We measure success by your ROI — views, conversions, revenue, growth.</p>
        </article>
        <article class="value-card reveal" role="listitem">
          <div class="value-card__icon" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2L2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5"/><path d="M2 12l10 5 10-5"/></svg>
          </div>
          <h3 class="value-card__title">Global Mindset</h3>
          <p class="value-card__desc">Cultural fluency across markets. We create content that resonates from New York to Dubai to Sydney.</p>
        </article>
      </div>
    </div>
  </section>

  <!-- Journey Timeline -->
  <section class="section" aria-labelledby="journey-title">
    <div class="container">
      <header class="section-header reveal">
        <span class="section-tag">Our Journey</span>
        <h2 id="journey-title" class="section-title">Milestones</h2>
      </header>
      <div style="max-width: 800px; margin: 0 auto;">
        <div class="process-steps" role="list">
          <article class="process-step reveal" role="listitem">
            <div class="process-step__number">2019</div>
            <div class="process-step__content">
              <h3>Founded in Dhaka</h3>
              <p>Started as a 2-person freelance collective helping local YouTubers and startups with video editing.</p>
            </div>
          </article>
          <article class="process-step reveal" role="listitem">
            <div class="process-step__number">2020</div>
            <div class="process-step__content">
              <h3>First International Client</h3>
              <p>Landed our first US-based SaaS client. Began building remote collaboration workflows.</p>
            </div>
          </article>
          <article class="process-step reveal" role="listitem">
            <div class="process-step__number">2021</div>
            <div class="process-step__content">
              <h3>Motion Graphics Division</h3>
              <p>Expanded into motion design, hiring specialized animators. Launched thumbnail design service.</p>
            </div>
          </article>
          <article class="process-step reveal" role="listitem">
            <div class="process-step__number">2022</div>
            <div class="process-step__content">
              <h3>100+ Projects Milestone</div>
              <p>Crossed 100 completed projects. Team grew to 8. Opened dedicated studio space in Dhaka.</p>
            </div>
          </article>
          <article class="process-step reveal" role="listitem">
            <div class="process-step__number">2023</div>
            <div class="process-step__content">
              <h3>Global Scale</h3>
              <p>Serving 30+ countries. Launched social media ads division. 99% client satisfaction rate achieved.</p>
            </div>
          </article>
          <article class="process-step reveal" role="listitem">
            <div class="process-step__number">2024</div>
            <div class="process-step__content">
              <h3>500 Projects & Beyond</h3>
              <p>15-person team. Product video & 3D capabilities added. New website & brand identity launched.</p>
            </div>
          </article>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA Banner -->
  <?php include __DIR__ . '/includes/cta-banner.php'; ?>
</main>

<!-- Booking Modal -->
<div class="modal-backdrop" id="modal-backdrop" aria-hidden="true"></div>
<div class="modal" id="booking-modal" role="dialog" aria-modal="true" aria-labelledby="modal-title" aria-hidden="true">
  <div class="modal__header">
    <h2 id="modal-title" class="modal__title">Start Your Project</h2>
    <button class="modal__close" id="modal-close" aria-label="Close modal">
      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
    </button>
  </div>
  <div class="modal__body">
    <form id="booking-form" class="booking-form" novalidate>
      <div class="form-group">
        <label class="form-label" for="name">Full Name <span class="required" aria-hidden="true">*</span></label>
        <input type="text" id="name" name="name" class="form-input" placeholder="John Doe" required autocomplete="name">
      </div>
      <div class="form-row">
        <div class="form-group">
          <label class="form-label" for="email">Email Address <span class="required" aria-hidden="true">*</span></label>
          <input type="email" id="email" name="email" class="form-input" placeholder="john@example.com" required autocomplete="email">
        </div>
        <div class="form-group">
          <label class="form-label" for="whatsapp">WhatsApp Number <span class="required" aria-hidden="true">*</span></label>
          <input type="tel" id="whatsapp" name="whatsapp" class="form-input" placeholder="+880 1X XXXX XXXX" required autocomplete="tel">
        </div>
      </div>
      <div class="form-group">
        <label class="form-label" for="service">Service Required <span class="required" aria-hidden="true">*</span></label>
        <select id="service" name="service" class="form-select" required>
          <option value="">Select a service</option>
          <option value="video-editing">Video Editing — YouTube & Social Media</option>
          <option value="motion-graphics">Motion Graphics — Animation & Visual Effects</option>
          <option value="thumbnail-design">Thumbnail Design — High-CTR Thumbnails</option>
          <option value="brand-videos">Brand Videos — Promotional & Corporate</option>
          <option value="youtube-content">YouTube Content — Long & Short Form</option>
          <option value="social-media-ads">Social Media Ads — Reels, TikTok & More</option>
          <option value="product-videos">Product Videos — Showcase Your Products</option>
          <option value="custom">Custom / Multiple Services</option>
        </select>
      </div>
      <div class="form-group">
        <label class="form-label" for="budget">Estimated Budget</label>
        <select id="budget" name="budget" class="form-select">
          <option value="">Select budget range</option>
          <option value="under-500">Under $500</option>
          <option value="500-1000">$500 - $1,000</option>
          <option value="1000-3000">$1,000 - $3,000</option>
          <option value="3000-5000">$3,000 - $5,000</option>
          <option value="5000+">$5,000+</option>
          <option value="discuss">Let's discuss</option>
        </select>
      </div>
      <div class="form-group">
        <label class="form-label" for="description">Project Description <span class="required" aria-hidden="true">*</span></label>
        <textarea id="description" name="description" class="form-textarea" placeholder="Tell us about your project, goals, timeline, and any specific requirements..." required></textarea>
      </div>
      <button type="submit" class="btn btn-primary btn-lg form-submit">
        <span class="btn-text">Send Inquiry</span>
        <span class="btn-loading" aria-hidden="true">
          <svg class="spinner" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="12" cy="12" r="10" stroke-opacity="0.25"/><path d="M12 2a10 10 0 0 1 10 10" stroke-linecap="round"/></svg>
          Sending...
        </span>
      </button>
      <div class="form-message" id="form-message" aria-live="polite"></div>
    </form>
  </div>
</div>

<?php include __DIR__ . '/includes/footer.php'; ?>