/**
 * Mexa Motion - Animations JavaScript
 * Handles SVG service node animations, lightbox, sliders, and advanced interactions
 */

(function() {
  'use strict';

  // ==========================================================================
  // Service Nodes SVG Animation System
  // ==========================================================================
  class ServiceNodeAnimations {
    constructor() {
      this.svg = document.querySelector('.service-nodes__svg');
      this.nodes = document.querySelectorAll('.service-node[data-index]');
      this.hub = document.querySelector('.service-hub');
      this.paths = [];
      this.pulses = [];
      this.isMobile = window.innerWidth <= 1024;
      this.activeIndex = null;

      if (this.svg && this.nodes.length > 0) {
        this.init();
      }
    }

    init() {
      // Wait for layout to settle
      requestAnimationFrame(() => {
        this.calculatePositions();
        this.createPaths();
        this.bindEvents();
        this.handleResize();
      });
    }

    calculatePositions() {
      this.nodePositions = [];
      const svgRect = this.svg.getBoundingClientRect();
      const containerRect = this.svg.parentElement.getBoundingClientRect();

      // Get hub center
      const hubRect = this.hub.getBoundingClientRect();
      this.hubCenter = {
        x: hubRect.left + hubRect.width / 2 - containerRect.left,
        y: hubRect.top + hubRect.height / 2 - containerRect.top
      };

      // Get each node center
      this.nodes.forEach((node, index) => {
        const rect = node.getBoundingClientRect();
        const dot = node.querySelector('.service-node__dot');
        let centerX, centerY;

        if (dot && !this.isMobile) {
          const dotRect = dot.getBoundingClientRect();
          centerX = dotRect.left + dotRect.width / 2 - containerRect.left;
          centerY = dotRect.top + dotRect.height / 2 - containerRect.top;
        } else {
          centerX = rect.left + rect.width / 2 - containerRect.left;
          centerY = rect.top + 40 - containerRect.top; // Approximate icon position
        }

        this.nodePositions[index] = { x: centerX, y: centerY, node };
      });
    }

    createPaths() {
      // Clear existing
      this.svg.innerHTML = '';
      this.paths = [];
      this.pulses = [];

      // Create SVG paths for each node
      this.nodePositions.forEach((pos, index) => {
        if (!pos) return;

        const path = document.createElementNS('http://www.w3.org/2000/svg', 'path');
        const pulse = document.createElementNS('http://www.w3.org/2000/svg', 'path');

        const d = this.generateBezierPath(this.hubCenter, pos);
        path.setAttribute('d', d);
        path.setAttribute('class', 'service-nodes__path');
        path.setAttribute('data-index', index);
        path.style.strokeDasharray = '1000';
        path.style.strokeDashoffset = '1000';

        pulse.setAttribute('d', d);
        pulse.setAttribute('class', 'service-nodes__pulse');
        pulse.setAttribute('data-index', index);

        this.svg.appendChild(path);
        this.svg.appendChild(pulse);
        this.paths[index] = path;
        this.pulses[index] = pulse;

        // Animate path drawing
        setTimeout(() => {
          path.style.transition = 'stroke-dashoffset 1s ease-out';
          path.style.strokeDashoffset = '0';
        }, index * 100);
      });
    }

    generateBezierPath(hub, node) {
      // Create a curved bezier path from hub to node
      const dx = node.x - hub.x;
      const dy = node.y - hub.y;
      const distance = Math.sqrt(dx * dx + dy * dy);

      // Control point offset (perpendicular to line)
      const angle = Math.atan2(dy, dx);
      const offsetDistance = distance * 0.3;
      const controlOffset = Math.PI / 2; // Perpendicular

      // Alternate curve direction for visual variety
      const direction = index % 2 === 0 ? 1 : -1;
      const cpX = hub.x + Math.cos(angle + controlOffset * direction) * offsetDistance;
      const cpY = hub.y + Math.sin(angle + controlOffset * direction) * offsetDistance;

      return `M ${hub.x} ${hub.y} Q ${cpX} ${cpY} ${node.x} ${node.y}`;
    }

    bindEvents() {
      this.nodes.forEach((node, index) => {
        node.addEventListener('mouseenter', () => this.activatePath(index));
        node.addEventListener('mouseleave', () => this.deactivatePath(index));
        node.addEventListener('focus', () => this.activatePath(index), true);
        node.addEventListener('blur', () => this.deactivatePath(index), true);
      });
    }

    activatePath(index) {
      if (this.activeIndex !== null && this.activeIndex !== index) {
        this.deactivatePath(this.activeIndex);
      }

      this.activeIndex = index;

      const path = this.paths[index];
      const pulse = this.pulses[index];

      if (path) {
        path.classList.add('active');
      }

      if (pulse) {
        // Reset and trigger pulse animation
        pulse.style.strokeDashoffset = '1000';
        pulse.style.opacity = '0';
        pulse.offsetHeight; // Force reflow
        pulse.style.animation = 'pulseTravel 1.2s ease-out forwards';
      }
    }

    deactivatePath(index) {
      const path = this.paths[index];
      const pulse = this.pulses[index];

      if (path) {
        path.classList.remove('active');
      }

      if (pulse) {
        pulse.style.animation = 'none';
        pulse.style.opacity = '0';
      }

      if (this.activeIndex === index) {
        this.activeIndex = null;
      }
    }

    handleResize() {
      const handleResize = debounce(() => {
        const wasMobile = this.isMobile;
        this.isMobile = window.innerWidth <= 1024;

        if (wasMobile !== this.isMobile) {
          this.calculatePositions();
          this.createPaths();
        }
      }, 250);

      window.addEventListener('resize', handleResize);
    }
  }

  // Initialize service node animations
  window.serviceNodeAnimations = new ServiceNodeAnimations();

  // ==========================================================================
  // Lightbox System
  // ==========================================================================
  class Lightbox {
    constructor() {
      this.lightbox = $('#lightbox');
      this.media = $('#lightbox-media');
      this.caption = $('#lightbox-caption');
      this.closeBtn = $('#lightbox-close');
      this.prevBtn = $('#lightbox-prev');
      this.nextBtn = $('#lightbox-next');
      this.triggers = $$('[data-lightbox-trigger]');
      this.currentIndex = 0;
      this.items = [];

      if (this.lightbox && this.triggers.length > 0) {
        this.collectItems();
        this.bindEvents();
      }
    }

    collectItems() {
      this.items = Array.from(this.triggers).map((trigger, index) => ({
        type: trigger.getAttribute('data-lightbox-type') || 'image',
        src: trigger.getAttribute('data-lightbox-src'),
        caption: trigger.getAttribute('aria-label') || '',
        trigger,
        index
      }));
    }

    bindEvents() {
      this.triggers.forEach((trigger, index) => {
        trigger.addEventListener('click', (e) => {
          e.preventDefault();
          this.open(index);
        });
      });

      this.closeBtn.addEventListener('click', () => this.close());
      this.prevBtn.addEventListener('click', () => this.navigate(-1));
      this.nextBtn.addEventListener('click', () => this.navigate(1));

      this.lightbox.addEventListener('click', (e) => {
        if (e.target === this.lightbox) this.close();
      });

      document.addEventListener('keydown', (e) => {
        if (!this.lightbox.classList.contains('active')) return;
        if (e.key === 'Escape') this.close();
        if (e.key === 'ArrowLeft') this.navigate(-1);
        if (e.key === 'ArrowRight') this.navigate(1);
      });
    }

    open(index) {
      this.currentIndex = index;
      this.render();
      this.lightbox.classList.add('active');
      this.lightbox.setAttribute('aria-hidden', 'false');
      document.body.style.overflow = 'hidden';

      // Focus management
      this.closeBtn.focus();
    }

    close() {
      this.lightbox.classList.remove('active');
      this.lightbox.setAttribute('aria-hidden', 'true');
      document.body.style.overflow = '';
      this.media.innerHTML = '';
    }

    navigate(direction) {
      this.currentIndex = (this.currentIndex + direction + this.items.length) % this.items.length;
      this.render();
    }

    render() {
      const item = this.items[this.currentIndex];
      this.media.innerHTML = '';

      if (item.type === 'video') {
        const iframe = document.createElement('iframe');
        iframe.src = item.src + (item.src.includes('?') ? '&' : '?') + 'autoplay=1';
        iframe.allow = 'autoplay; fullscreen';
        iframe.allowFullscreen = true;
        iframe.style.width = '100%';
        iframe.style.height = '100%';
        iframe.style.minHeight = '400px';
        iframe.style.border = 'none';
        iframe.style.borderRadius = 'var(--radius-lg)';
        this.media.appendChild(iframe);
      } else {
        const img = document.createElement('img');
        img.src = item.src;
        img.alt = item.caption;
        img.style.maxWidth = '100%';
        img.style.maxHeight = '80vh';
        img.style.borderRadius = 'var(--radius-lg)';
        this.media.appendChild(img);
      }

      this.caption.textContent = item.caption;
      this.updateNavButtons();
    }

    updateNavButtons() {
      this.prevBtn.style.display = this.items.length > 1 ? 'flex' : 'none';
      this.nextBtn.style.display = this.items.length > 1 ? 'flex' : 'none';
    }
  }

  // Initialize lightbox
  new Lightbox();

  // ==========================================================================
  // Testimonials Slider
  // ==========================================================================
  class TestimonialsSlider {
    constructor() {
      this.track = $('#testimonials-track');
      this.prevBtn = $('.testimonials-prev');
      this.nextBtn = $('.testimonials-next');
      this.cards = $$('.testimonial-card', this.track);
      this.currentIndex = 0;
      this.cardsPerView = this.getCardsPerView();
      this.maxIndex = Math.max(0, this.cards.length - this.cardsPerView);

      if (this.track && this.cards.length > 0) {
        this.bindEvents();
        this.handleResize();
      }
    }

    getCardsPerView() {
      if (window.innerWidth <= 640) return 1;
      if (window.innerWidth <= 1024) return 2;
      return 3;
    }

    bindEvents() {
      this.prevBtn.addEventListener('click', () => this.navigate(-1));
      this.nextBtn.addEventListener('click', () => this.navigate(1));
    }

    navigate(direction) {
      this.currentIndex = Math.max(0, Math.min(this.maxIndex, this.currentIndex + direction));
      this.update();
    }

    update() {
      const cardWidth = this.cards[0].offsetWidth;
      const gap = 24; // CSS gap value in pixels
      const offset = this.currentIndex * (cardWidth + gap);
      this.track.style.transform = `translateX(-${offset}px)`;

      this.prevBtn.disabled = this.currentIndex === 0;
      this.nextBtn.disabled = this.currentIndex >= this.maxIndex;
    }

    handleResize() {
      const handleResize = debounce(() => {
        this.cardsPerView = this.getCardsPerView();
        this.maxIndex = Math.max(0, this.cards.length - this.cardsPerView);
        this.currentIndex = Math.min(this.currentIndex, this.maxIndex);
        this.update();
      }, 250);

      window.addEventListener('resize', handleResize);
    }
  }

  // Initialize testimonials slider
  new TestimonialsSlider();

  // ==========================================================================
  // Portfolio Filter
  // ==========================================================================
  class PortfolioFilter {
    constructor() {
      this.filterBtns = $$('.filter-btn');
      this.cards = $$('.portfolio-card[data-category]');
      this.activeFilter = 'all';

      if (this.filterBtns.length > 0 && this.cards.length > 0) {
        this.bindEvents();
      }
    }

    bindEvents() {
      this.filterBtns.forEach(btn => {
        btn.addEventListener('click', () => {
          const filter = btn.getAttribute('data-filter');
          this.setFilter(filter);
        });
      });
    }

    setFilter(filter) {
      this.activeFilter = filter;

      // Update button states
      this.filterBtns.forEach(btn => {
        const isActive = btn.getAttribute('data-filter') === filter;
        btn.classList.toggle('active', isActive);
        btn.setAttribute('aria-pressed', isActive);
      });

      // Filter cards with animation
      this.cards.forEach((card, index) => {
        const categories = card.getAttribute('data-category') || '';
        const matches = filter === 'all' || categories.includes(filter);

        if (matches) {
          card.style.display = '';
          // Stagger animation
          setTimeout(() => {
            card.style.opacity = '1';
            card.style.transform = 'translateY(0)';
          }, index * 50);
        } else {
          card.style.opacity = '0';
          card.style.transform = 'translateY(20px)';
          setTimeout(() => {
            if (this.activeFilter !== filter) return; // Check if filter changed during animation
            card.style.display = 'none';
          }, 300);
        }
      });
    }
  }

  // Initialize portfolio filter
  new PortfolioFilter();

  // ==========================================================================
  // Accordion Component
  // ==========================================================================
  class Accordion {
    constructor() {
      this.items = $$('.accordion-item');

      this.items.forEach(item => {
        const header = $('.accordion-header', item);
        const content = $('.accordion-content', item);

        if (header && content) {
          header.addEventListener('click', () => this.toggle(item, header, content));
        }
      });
    }

    toggle(item, header, content) {
      const isActive = item.classList.contains('active');

      // Close all other items (optional: allow multiple open)
      this.items.forEach(otherItem => {
        if (otherItem !== item) {
          otherItem.classList.remove('active');
          const otherHeader = $('.accordion-header', otherItem);
          const otherContent = $('.accordion-content', otherItem);
          if (otherHeader) otherHeader.setAttribute('aria-expanded', 'false');
          if (otherContent) otherContent.style.maxHeight = '0';
        }
      });

      // Toggle current
      if (isActive) {
        item.classList.remove('active');
        header.setAttribute('aria-expanded', 'false');
        content.style.maxHeight = '0';
      } else {
        item.classList.add('active');
        header.setAttribute('aria-expanded', 'true');
        content.style.maxHeight = content.scrollHeight + 'px';
      }
    }
  }

  // Initialize accordions
  new Accordion();

  // ==========================================================================
  // Parallax Effect for Hero Background
  // ==========================================================================
  const heroBg = document.querySelector('.hero-bg');
  if (heroBg) {
    const handleParallax = throttle(() => {
      const scrolled = window.scrollY;
      const rate = scrolled * 0.3;
      heroBg.style.transform = `translateY(${rate}px)`;
    }, 16);

    window.addEventListener('scroll', handleParallax, { passive: true });
  }

  // ==========================================================================
  // Magnetic Button Effect
  // ==========================================================================
  $$('.btn-primary, .btn-secondary').forEach(btn => {
    if (window.innerWidth > 768) {
      btn.addEventListener('mousemove', (e) => {
        const rect = btn.getBoundingClientRect();
        const x = e.clientX - rect.left - rect.width / 2;
        const y = e.clientY - rect.top - rect.height / 2;

        btn.style.transform = `translate(${x * 0.15}px, ${y * 0.15}px)`;
      });

      btn.addEventListener('mouseleave', () => {
        btn.style.transform = '';
      });
    }
  });

  // ==========================================================================
  // Utility: Debounce
  // ==========================================================================
  function debounce(fn, delay) {
    let timeoutId;
    return (...args) => {
      clearTimeout(timeoutId);
      timeoutId = setTimeout(() => fn.apply(this, args), delay);
    };
  }

  function throttle(fn, limit) {
    let inThrottle;
    return (...args) => {
      if (!inThrottle) {
        fn.apply(this, args);
        inThrottle = true;
        setTimeout(() => inThrottle = false, limit);
      }
    };
  }

  // ==========================================================================
  // Initialize on DOM Ready
  // ==========================================================================
  document.addEventListener('DOMContentLoaded', () => {
    // Add loaded class for CSS animations
    document.body.classList.add('loaded');
  });

})();