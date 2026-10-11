<?php
$pageTitle = 'Portfolio - Mexa Motion';
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/navbar.php';
?>
<main id="main-content" role="main">
  <!-- Page Header -->
  <header class="page-header">
    <div class="container">
      <span class="section-tag reveal">Our Work</span>
      <h1 class="page-header__title reveal">Portfolio</h1>
      <p class="page-header__desc reveal">A selection of projects showcasing our range across industries, formats, and creative challenges.</p>
    </div>
  </header>

  <!-- Portfolio Filter -->
  <section class="section" aria-labelledby="filter-title">
    <div class="container">
      <div class="portfolio-filter reveal" role="group" aria-label="Filter portfolio by category">
        <button class="filter-btn active" data-filter="all" aria-pressed="true">All Works</button>
        <button class="filter-btn" data-filter="motion-graphics" aria-pressed="false">Motion Graphics</button>
        <button class="filter-btn" data-filter="video-editing" aria-pressed="false">Video Editing</button>
        <button class="filter-btn" data-filter="thumbnails" aria-pressed="false">Thumbnails</button>
        <button class="filter-btn" data-filter="social-ads" aria-pressed="false">Social Ads</button>
        <button class="filter-btn" data-filter="brand-videos" aria-pressed="false">Brand Videos</button>
        <button class="filter-btn" data-filter="product-videos" aria-pressed="false">Product Videos</button>
      </div>

      <!-- Portfolio Grid -->
      <div class="portfolio-grid" id="portfolio-grid" role="list">
        <!-- Project 1 -->
        <article class="portfolio-card reveal" role="listitem" data-category="brand-videos video-editing">
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
        <article class="portfolio-card reveal" role="listitem" data-category="motion-graphics">
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
        <article class="portfolio-card reveal" role="listitem" data-category="thumbnails">
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
        <article class="portfolio-card reveal" role="listitem" data-category="social-ads video-editing">
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

        <!-- Project 5 -->
        <article class="portfolio-card reveal" role="listitem" data-category="product-videos motion-graphics">
          <div class="portfolio-card__media">
            <img src="/assets/images/portfolio/project-5.jpg" alt="GearPro Product Showcase - 360 rotation and feature highlights" loading="lazy" width="640" height="360">
            <div class="portfolio-card__overlay">
              <button class="portfolio-card__play" data-lightbox-trigger data-lightbox-type="video" data-lightbox-src="https://player.vimeo.com/video/123456792" aria-label="Play GearPro Product Showcase">
                <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><polygon points="5 3 19 12 5 21 5 3"/></svg>
              </button>
            </div>
          </div>
          <div class="portfolio-card__content">
            <span class="portfolio-card__category">Product Video</span>
            <h3 class="portfolio-card__title">GearPro 360° Showcase</h3>
            <p class="portfolio-card__desc">E-commerce product video — 28% add-to-cart increase</p>
          </div>
        </article>

        <!-- Project 6 -->
        <article class="portfolio-card reveal" role="listitem" data-category="youtube-content video-editing">
          <div class="portfolio-card__media">
            <img src="/assets/images/portfolio/project-6.jpg" alt="DailyVlog Channel Edit - Long-form documentary style editing" loading="lazy" width="640" height="360">
            <div class="portfolio-card__overlay">
              <button class="portfolio-card__play" data-lightbox-trigger data-lightbox-type="video" data-lightbox-src="https://player.vimeo.com/video/123456793" aria-label="Play DailyVlog Channel Edit">
                <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><polygon points="5 3 19 12 5 21 5 3"/></svg>
              </button>
            </div>
          </div>
          <div class="portfolio-card__content">
            <span class="portfolio-card__category">YouTube Content</span>
            <h3 class="portfolio-card__title">DailyVlog Channel Edit</h3>
            <p class="portfolio-card__desc">Weekly long-form episodes — 150K subs gained in 6 months</p>
          </div>
        </article>

        <!-- Project 7 -->
        <article class="portfolio-card reveal" role="listitem" data-category="motion-graphics brand-videos">
          <div class="portfolio-card__media">
            <img src="/assets/images/portfolio/project-7.jpg" alt="FinTech Explainer - Animated explainer video for financial service" loading="lazy" width="640" height="360">
            <div class="portfolio-card__overlay">
              <button class="portfolio-card__play" data-lightbox-trigger data-lightbox-type="video" data-lightbox-src="https://player.vimeo.com/video/123456794" aria-label="Play FinTech Explainer">
                <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><polygon points="5 3 19 12 5 21 5 3"/></svg>
              </button>
            </div>
          </div>
          <div class="portfolio-card__content">
            <span class="portfolio-card__category">Motion Graphics</span>
            <h3 class="portfolio-card__title">FinTech Explainer Series</h3>
            <p class="portfolio-card__desc">5-part animated series — complex concepts made simple</p>
          </div>
        </article>

        <!-- Project 8 -->
        <article class="portfolio-card reveal" role="listitem" data-category="thumbnails social-ads">
          <div class="portfolio-card__media">
            <img src="/assets/images/portfolio/project-8.jpg" alt="GamingThumbs Pack - High-energy gaming thumbnails and ad creatives" loading="lazy" width="640" height="360">
            <div class="portfolio-card__overlay">
              <button class="portfolio-card__play" data-lightbox-trigger data-lightbox-type="image" data-lightbox-src="/assets/images/portfolio/project-8-full.jpg" aria-label="View GamingThumbs Pack">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
              </button>
            </div>
          </div>
          <div class="portfolio-card__content">
            <span class="portfolio-card__category">Thumbnails & Ads</span>
            <h3 class="portfolio-card__title">GamingThumbs Creative Pack</h3>
            <p class="portfolio-card__desc">Thumbnails + TikTok ads — 8% CTR, 2.5M views</p>
          </div>
        </article>
      </div>
    </div>
  </section>

  <!-- CTA Banner -->
  <?php include __DIR__ . '/includes/cta-banner.php'; ?>
</main>

<!-- Lightbox Modal -->
<div class="lightbox" id="lightbox" role="dialog" aria-modal="true" aria-labelledby="lightbox-title" aria-hidden="true">
  <button class="lightbox__close" id="lightbox-close" aria-label="Close lightbox">
    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
  </button>
  <button class="lightbox__nav lightbox__nav--prev" id="lightbox-prev" aria-label="Previous item">
    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="15 18 9 12 15 6"/></svg>
  </button>
  <button class="lightbox__nav lightbox__nav--next" id="lightbox-next" aria-label="Next item">
    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="9 18 15 12 9 6"/></svg>
  </button>
  <div class="lightbox__content">
    <div class="lightbox__media" id="lightbox-media"></div>
    <p class="lightbox__caption" id="lightbox-caption"></p>
  </div>
</div>

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