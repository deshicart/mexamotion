<?php
$pageTitle = 'Mexa Motion - Creative Video & Motion Design Studio';
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/navbar.php';
?>
<main id="main-content" role="main">
  <!-- Hero Section -->
  <section class="hero" aria-labelledby="hero-title">
    <div class="hero-bg" aria-hidden="true"></div>
    <div class="container">
      <div class="hero-content">
        <span class="hero-badge" aria-label="Trusted by global brands">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
          Trusted by 500+ Global Brands
        </span>
        <h1 id="hero-title">High-Impact Video Editing &amp; Motion Design That <span class="highlight">Elevates Brands</span></h1>
        <p>From viral social content to premium brand films — we craft visual stories that captivate audiences and drive measurable results. Based in Bangladesh, serving clients worldwide.</p>
        <div class="hero-actions">
          <a href="/portfolio.php" class="btn btn-primary btn-lg">View Our Work</a>
          <a href="#contact" class="btn btn-secondary btn-lg" data-modal-trigger="booking-modal">Start a Project</a>
        </div>
        <div class="hero-stats" role="list" aria-label="Company statistics">
          <div class="stat-item" role="listitem">
            <span class="stat-value" data-count="500">0</span>
            <span class="stat-label">Projects Completed</span>
          </div>
          <div class="stat-item" role="listitem">
            <span class="stat-value" data-count="99">0</span>
            <span class="stat-label">Client Satisfaction %</span>
          </div>
          <div class="stat-item" role="listitem">
            <span class="stat-value" data-count="50">0</span>
            <span class="stat-label">Countries Served</span>
          </div>
          <div class="stat-item" role="listitem">
            <span class="stat-value" data-count="24">0</span>
            <span class="stat-label">Avg Turnaround (hrs)</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Interactive Service Nodes Section -->
  <section class="section service-nodes" aria-labelledby="services-title">
    <div class="container">
      <header class="section-header reveal">
        <span class="section-tag">Our Expertise</span>
        <h2 id="services-title" class="section-title">Seven Pillars of Creative Excellence</h2>
        <p class="section-desc">Explore our core service offerings — each connected to our central creative hub, delivering end-to-end video and motion design solutions.</p>
      </header>

      <!-- SVG Connector Layer -->
      <svg class="service-nodes__svg" aria-hidden="true" viewBox="0 0 1200 600" preserveAspectRatio="none">
        <!-- Paths will be injected via JavaScript -->
      </svg>

      <!-- Service Nodes Grid -->
      <div class="service-nodes__grid" role="list" aria-label="Service offerings">
        <!-- Node 1: Video Editing -->
        <article class="service-node reveal" role="listitem" data-service="video-editing" data-index="0">
          <div class="service-node__icon" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="23 7 16 12 23 17 23 7"/><rect x="1" y="5" width="15" height="14" rx="2" ry="2"/></svg>
          </div>
          <h3 class="service-node__title">Video Editing</h3>
          <p class="service-node__desc">YouTube &amp; Social Media</p>
          <span class="service-node__dot" aria-hidden="true"></span>
        </article>

        <!-- Node 2: Motion Graphics -->
        <article class="service-node reveal" role="listitem" data-service="motion-graphics" data-index="1">
          <div class="service-node__icon" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
          </div>
          <h3 class="service-node__title">Motion Graphics</h3>
          <p class="service-node__desc">Animation &amp; Visual Effects</p>
          <span class="service-node__dot" aria-hidden="true"></span>
        </article>

        <!-- Node 3: Thumbnail Design -->
        <article class="service-node reveal" role="listitem" data-service="thumbnail-design" data-index="2">
          <div class="service-node__icon" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
          </div>
          <h3 class="service-node__title">Thumbnail Design</h3>
          <p class="service-node__desc">High-CTR Thumbnails</p>
          <span class="service-node__dot" aria-hidden="true"></span>
        </article>

        <!-- Central Hub -->
        <div class="service-hub reveal" role="img" aria-label="Mexa Motion Creative Studio Hub">
          <svg class="service-hub__logo" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <rect width="48" height="48" rx="12" fill="url(#hubGradient)"/>
            <path d="M24 12L36 24L24 36" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
            <defs>
              <linearGradient id="hubGradient" x1="0" y1="0" x2="48" y2="48" gradientUnits="userSpaceOnUse">
                <stop offset="0%" stop-color="#1152DF"/>
                <stop offset="100%" stop-color="#3B82F6"/>
              </linearGradient>
            </defs>
          </svg>
          <h3 class="service-hub__title">Mexa Motion</h3>
          <p class="service-hub__subtitle">Creative Studio</p>
        </div>

        <!-- Node 4: Brand Videos -->
        <article class="service-node reveal" role="listitem" data-service="brand-videos" data-index="3">
          <div class="service-node__icon" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15V5a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2v10"/><path d="M3 12h18"/><path d="M9 18h12"/><path d="M15 6v12"/></svg>
          </div>
          <h3 class="service-node__title">Brand Videos</h3>
          <p class="service-node__desc">Promotional &amp; Corporate</p>
          <span class="service-node__dot" aria-hidden="true"></span>
        </article>

        <!-- Node 5: YouTube Content -->
        <article class="service-node reveal" role="listitem" data-service="youtube-content" data-index="4">
          <div class="service-node__icon" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.42a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .42 5.33A2.78 2.78 0 0 0 3.4 19c1.72.42 8.6.42 8.6.42s6.88 0 8.6-.42a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .42-5.33 29 29 0 0 0-.42-5.33z"/><polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02"/></svg>
          </div>
          <h3 class="service-node__title">YouTube Content</h3>
          <p class="service-node__desc">Long &amp; Short Form Videos</p>
          <span class="service-node__dot" aria-hidden="true"></span>
        </article>

        <!-- Node 6: Social Media Ads -->
        <article class="service-node reveal" role="listitem" data-service="social-media-ads" data-index="5">
          <div class="service-node__icon" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
          </div>
          <h3 class="service-node__title">Social Media Ads</h3>
          <p class="service-node__desc">Reels, TikTok &amp; More</p>
          <span class="service-node__dot" aria-hidden="true"></span>
        </article>

        <!-- Node 7: Product Videos -->
        <article class="service-node reveal" role="listitem" data-service="product-videos" data-index="6">
          <div class="service-node__icon" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/><polyline points="3.27 6.96 12 12.01 20.73 6.96"/><line x1="12" y1="22.08" x2="12" y2="12"/></svg>
          </div>
          <h3 class="service-node__title">Product Videos</h3>
          <p class="service-node__desc">Showcase Your Products</p>
          <span class="service-node__dot" aria-hidden="true"></span>
        </article>
      </div>
    </div>
  </section>

  <!-- Featured Portfolio Showcase -->
  <section class="section" aria-labelledby="portfolio-title">
    <div class="container">
      <header class="section-header reveal">
        <span class="section-tag">Featured Work</span>
        <h2 id="portfolio-title" class="section-title">Selected Projects</h2>
        <p class="section-desc">A curated collection of our recent work across industries and formats.</p>
      </header>
      <div class="portfolio-grid" role="list">
        <!-- Project 1 -->
        <article class="portfolio-card reveal" role="listitem">
          <div class="portfolio-card__media">
            <img src="/assets/images/portfolio/project-1.jpg" alt="TechStart Brand Video - Product launch video for SaaS startup" loading="lazy" width="640" height="360">
            <div class="portfolio-card__overlay">
              <button class="portfolio-card__play" data-lightbox-trigger data-lightbox-type="video" data-lightbox-src="https://player.vimeo.com/video/123456789" aria-label="Play TechStart Brand Video">
                <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><polygon points="5 3 19 12 5 21 5 3"/></svg>
              </button>
            </div>
          </div>
          <div class="portfolio-card__content">
            <span class="portfolio-card__category">Brand Video</span>
            <h3 class="portfolio-card__title">TechStart Product Launch</h3>
            <p class="portfolio-card__desc">SaaS startup brand film — 2M+ views, 40% conversion lift</p>
          </div>
        </article>

        <!-- Project 2 -->
        <article class="portfolio-card reveal" role="listitem">
          <div class="portfolio-card__media">
            <img src="/assets/images/portfolio/project-2.jpg" alt="FitLife Social Campaign - Motion graphics for fitness app" loading="lazy" width="640" height="360">
            <div class="portfolio-card__overlay">
              <button class="portfolio-card__play" data-lightbox-trigger data-lightbox-type="video" data-lightbox-src="https://player.vimeo.com/video/123456790" aria-label="Play FitLife Social Campaign">
                <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><polygon points="5 3 19 12 5 21 5 3"/></svg>
              </button>
            </div>
          </div>
          <div class="portfolio-card__content">
            <span class="portfolio-card__category">Motion Graphics</span>
            <h3 class="portfolio-card__title">FitLife App Campaign</h3>
            <p class="portfolio-card__desc">Social media motion series — 500K+ engagements</p>
          </div>
        </article>

        <!-- Project 3 -->
        <article class="portfolio-card reveal" role="listitem">
          <div class="portfolio-card__media">
            <img src="/assets/images/portfolio/project-3.jpg" alt="CreatorHub Thumbnail Pack - High CTR thumbnail designs" loading="lazy" width="640" height="360">
            <div class="portfolio-card__overlay">
              <button class="portfolio-card__play" data-lightbox-trigger data-lightbox-type="image" data-lightbox-src="/assets/images/portfolio/project-3-full.jpg" aria-label="View CreatorHub Thumbnail Pack">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
              </button>
            </div>
          </div>
          <div class="portfolio-card__content">
            <span class="portfolio-card__category">Thumbnail Design</span>
            <h3 class="portfolio-card__title">CreatorHub Thumbnail Pack</h3>
            <p class="portfolio-card__desc">50+ custom thumbnails — 12% avg CTR increase</p>
          </div>
        </article>

        <!-- Project 4 -->
        <article class="portfolio-card reveal" role="listitem">
          <div class="portfolio-card__media">
            <img src="/assets/images/portfolio/project-4.jpg" alt="EcoBrand Social Ads - Reels & TikTok ad creatives" loading="lazy" width="640" height="360">
            <div class="portfolio-card__overlay">
              <button class="portfolio-card__play" data-lightbox-trigger data-lightbox-type="video" data-lightbox-src="https://player.vimeo.com/video/123456791" aria-label="Play EcoBrand Social Ads">
                <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><polygon points="5 3 19 12 5 21 5 3"/></svg>
              </button>
            </div>
          </div>
          <div class="portfolio-card__content">
            <span class="portfolio-card__category">Social Media Ads</span>
            <h3 class="portfolio-card__title">EcoBrand Reels Campaign</h3>
            <p class="portfolio-card__desc">Vertical video ads — 3.2x ROAS, 1M+ impressions</p>
          </div>
        </article>
      </div>
      <div class="text-center reveal" style="margin-top: var(--space-xl);">
        <a href="/portfolio.php" class="btn btn-primary btn-lg">View All Projects</a>
      </div>
    </div>
  </section>

  <!-- Why Choose Mexa Motion -->
  <section class="section" style="background: var(--color-bg-layer);" aria-labelledby="why-title">
    <div class="container">
      <header class="section-header reveal">
        <span class="section-tag">Why Choose Us</span>
        <h2 id="why-title" class="section-title">The Mexa Motion Difference</h2>
        <p class="section-desc">We don't just make videos — we craft visual strategies that deliver ROI.</p>
      </header>
      <div class="features-grid">
        <article class="feature-card reveal" role="listitem">
          <div class="feature-card__icon" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
          </div>
          <h3 class="feature-card__title">Lightning Fast Turnaround</h3>
          <p class="feature-card__desc">24-48 hour delivery on most projects without compromising quality. Rush options available.</p>
        </article>
        <article class="feature-card reveal" role="listitem">
          <div class="feature-card__icon" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/></svg>
          </div>
          <h3 class="feature-card__title">Global Expertise, Local Value</h3>
          <p class="feature-card__desc">Bangladesh-based studio with international standards — premium quality at competitive rates.</p>
        </article>
        <article class="feature-card reveal" role="listitem">
          <div class="feature-card__icon" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
          </div>
          <h3 class="feature-card__title">Pixel-Perfect Motion</h3>
          <p class="feature-card__desc">Obsessive attention to detail — every frame, transition, and effect crafted to perfection.</p>
        </article>
        <article class="feature-card reveal" role="listitem">
          <div class="feature-card__icon" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
          </div>
          <h3 class="feature-card__title">Collaborative Process</h3>
          <p class="feature-card__desc">Transparent workflow with unlimited revisions — your vision, our expertise.</p>
        </article>
        <article class="feature-card reveal" role="listitem">
          <div class="feature-card__icon" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
          </div>
          <h3 class="feature-card__title">Secure &amp; Confidential</h3>
          <p class="feature-card__desc">NDA-protected workflows, secure file transfer, and full IP ownership transfer.</p>
        </article>
        <article class="feature-card reveal" role="listitem">
          <div class="feature-card__icon" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2L2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5"/><path d="M2 12l10 5 10-5"/></svg>
          </div>
          <h3 class="feature-card__title">Multi-Platform Optimization</h3>
          <p class="feature-card__desc">Every deliverable optimized for YouTube, Instagram, TikTok, LinkedIn, and more.</p>
        </article>
      </div>
    </div>
  </section>

  <!-- Client Testimonials Preview -->
  <section class="section" aria-labelledby="testimonials-title">
    <div class="container">
      <header class="section-header reveal">
        <span class="section-tag">Client Love</span>
        <h2 id="testimonials-title" class="section-title">Trusted by Industry Leaders</h2>
        <p class="section-desc">Don't just take our word for it — hear from brands we've helped transform.</p>
      </header>
      <div class="testimonials-slider" role="region" aria-label="Client testimonials">
        <div class="testimonials-track" id="testimonials-track">
          <!-- Testimonial 1 -->
          <article class="testimonial-card reveal">
            <div class="testimonial-card__rating" aria-label="5 out of 5 stars">
              <svg aria-hidden="true"><use href="#star-icon"/></svg>
              <svg aria-hidden="true"><use href="#star-icon"/></svg>
              <svg aria-hidden="true"><use href="#star-icon"/></svg>
              <svg aria-hidden="true"><use href="#star-icon"/></svg>
              <svg aria-hidden="true"><use href="#star-icon"/></svg>
            </div>
            <p class="testimonial-card__text">"Mexa Motion transformed our product launch with a stunning brand video. The team understood our vision instantly and delivered beyond expectations. Our conversion rate jumped 40%!"</p>
            <div class="testimonial-card__author">
              <img class="testimonial-card__avatar" src="/assets/images/team/client-1.jpg" alt="Sarah Chen" loading="lazy" width="48" height="48">
              <div>
                <span class="testimonial-card__name">Sarah Chen</span>
                <span class="testimonial-card__role">CMO, TechStart Inc.</span>
              </div>
            </div>
          </article>

          <!-- Testimonial 2 -->
          <article class="testimonial-card reveal">
            <div class="testimonial-card__rating" aria-label="5 out of 5 stars">
              <svg aria-hidden="true"><use href="#star-icon"/></svg>
              <svg aria-hidden="true"><use href="#star-icon"/></svg>
              <svg aria-hidden="true"><use href="#star-icon"/></svg>
              <svg aria-hidden="true"><use href="#star-icon"/></svg>
              <svg aria-hidden="true"><use href="#star-icon"/></svg>
            </div>
            <p class="testimonial-card__text">"The motion graphics for our app campaign were phenomenal. They nailed the brief, communicated flawlessly, and delivered ahead of schedule. Will definitely work together again."</p>
            <div class="testimonial-card__author">
              <img class="testimonial-card__avatar" src="/assets/images/team/client-2.jpg" alt="Marcus Johnson" loading="lazy" width="48" height="48">
              <div>
                <span class="testimonial-card__name">Marcus Johnson</span>
                <span class="testimonial-card__role">Founder, FitLife App</span>
              </div>
            </div>
          </article>

          <!-- Testimonial 3 -->
          <article class="testimonial-card reveal">
            <div class="testimonial-card__rating" aria-label="5 out of 5 stars">
              <svg aria-hidden="true"><use href="#star-icon"/></svg>
              <svg aria-hidden="true"><use href="#star-icon"/></svg>
              <svg aria-hidden="true"><use href="#star-icon"/></svg>
              <svg aria-hidden="true"><use href="#star-icon"/></svg>
              <svg aria-hidden="true"><use href="#star-icon"/></svg>
            </div>
            <p class="testimonial-card__text">"Best thumbnail designers in the business. Our CTR went from 3% to 12% after their redesign. They understand YouTube algorithm psychology like nobody else."</p>
            <div class="testimonial-card__author">
              <img class="testimonial-card__avatar" src="/assets/images/team/client-3.jpg" alt="Emma Rodriguez" loading="lazy" width="48" height="48">
              <div>
                <span class="testimonial-card__name">Emma Rodriguez</span>
                <span class="testimonial-card__role">Content Director, CreatorHub</span>
              </div>
            </div>
          </article>
        </div>
        <nav class="testimonials-nav" aria-label="Testimonial navigation">
          <button class="testimonials-prev" aria-label="Previous testimonial">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="15 18 9 12 15 6"/></svg>
          </button>
          <button class="testimonials-next" aria-label="Next testimonial">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="9 18 15 12 9 6"/></svg>
          </button>
        </nav>
      </div>
      <div class="text-center reveal" style="margin-top: var(--space-xl);">
        <a href="/reviews.php" class="btn btn-secondary btn-lg">Read All Reviews</a>
      </div>
    </div>
  </section>

  <!-- Global CTA Banner -->
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

<!-- SVG Symbol Definitions -->
<svg aria-hidden="true" style="position: absolute; width: 0; height: 0;">
  <symbol id="star-icon" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></symbol>
</svg>

<?php include __DIR__ . '/includes/footer.php'; ?>