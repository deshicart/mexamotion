/**
 * Mexa Motion - Main Application JavaScript
 * Handles navigation, modals, forms, and core interactions
 */

(function() {
  'use strict';

  // ==========================================================================
  // Utility Functions
  // ==========================================================================
  const $ = (selector, context = document) => context.querySelector(selector);
  const $$ = (selector, context = document) => Array.from(context.querySelectorAll(selector));

  const debounce = (fn, delay) => {
    let timeoutId;
    return (...args) => {
      clearTimeout(timeoutId);
      timeoutId = setTimeout(() => fn.apply(this, args), delay);
    };
  };

  const throttle = (fn, limit) => {
    let inThrottle;
    return (...args) => {
      if (!inThrottle) {
        fn.apply(this, args);
        inThrottle = true;
        setTimeout(() => inThrottle = false, limit);
      }
    };
  };

  // ==========================================================================
  // Header Scroll Effect
  // ==========================================================================
  const header = $('#header');
  const handleScroll = throttle(() => {
    if (window.scrollY > 50) {
      header.classList.add('scrolled');
    } else {
      header.classList.remove('scrolled');
    }
  }, 50);

  window.addEventListener('scroll', handleScroll, { passive: true });

  // ==========================================================================
  // Mobile Navigation Toggle
  // ==========================================================================
  const navbarToggle = $('#navbar-toggle');
  const navbarMenu = $('#navbar-menu');

  if (navbarToggle && navbarMenu) {
    navbarToggle.addEventListener('click', () => {
      const isExpanded = navbarToggle.getAttribute('aria-expanded') === 'true';
      navbarToggle.setAttribute('aria-expanded', !isExpanded);
      navbarToggle.classList.toggle('active');
      navbarMenu.classList.toggle('active');
      document.body.style.overflow = isExpanded ? '' : 'hidden';
    });

    // Close menu on link click
    $$('.nav-link', navbarMenu).forEach(link => {
      link.addEventListener('click', () => {
        navbarToggle.setAttribute('aria-expanded', 'false');
        navbarToggle.classList.remove('active');
        navbarMenu.classList.remove('active');
        document.body.style.overflow = '';
      });
    });

    // Close menu on escape
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && navbarMenu.classList.contains('active')) {
        navbarToggle.setAttribute('aria-expanded', 'false');
        navbarToggle.classList.remove('active');
        navbarMenu.classList.remove('active');
        document.body.style.overflow = '';
      }
    });
  }

  // ==========================================================================
  // Modal System
  // ==========================================================================
  const modalBackdrop = $('#modal-backdrop');
  const bookingModal = $('#booking-modal');
  const modalClose = $('#modal-close');
  const modalTriggers = $$('[data-modal-trigger]');

  const openModal = (modalId) => {
    const modal = $(`#${modalId}`);
    if (!modal) return;

    modalBackdrop.classList.add('active');
    modalBackdrop.setAttribute('aria-hidden', 'false');
    modal.classList.add('active');
    modal.setAttribute('aria-hidden', 'false');
    document.body.style.overflow = 'hidden';

    // Focus management
    const focusableElements = modal.querySelectorAll(
      'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])'
    );
    if (focusableElements.length) {
      focusableElements[0].focus();
    }

    // Trap focus
    modal._focusTrap = (e) => {
      if (e.key === 'Tab') {
        const firstElement = focusableElements[0];
        const lastElement = focusableElements[focusableElements.length - 1];

        if (e.shiftKey && document.activeElement === firstElement) {
          e.preventDefault();
          lastElement.focus();
        } else if (!e.shiftKey && document.activeElement === lastElement) {
          e.preventDefault();
          firstElement.focus();
        }
      }
    };
    document.addEventListener('keydown', modal._focusTrap);
  };

  const closeModal = (modal) => {
    modalBackdrop.classList.remove('active');
    modalBackdrop.setAttribute('aria-hidden', 'true');
    modal.classList.remove('active');
    modal.setAttribute('aria-hidden', 'true');
    document.body.style.overflow = '';

    // Remove focus trap
    if (modal._focusTrap) {
      document.removeEventListener('keydown', modal._focusTrap);
    }
  };

  // Trigger modals
  modalTriggers.forEach(trigger => {
    trigger.addEventListener('click', (e) => {
      e.preventDefault();
      const modalId = trigger.getAttribute('data-modal-trigger');
      openModal(modalId);
    });
  });

  // Close modal events
  if (modalClose) {
    modalClose.addEventListener('click', () => closeModal(bookingModal));
  }

  if (modalBackdrop) {
    modalBackdrop.addEventListener('click', () => closeModal(bookingModal));
  }

  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && bookingModal.classList.contains('active')) {
      closeModal(bookingModal);
    }
  });

  // ==========================================================================
  // Booking Form Handler
  // ==========================================================================
  const bookingForm = $('#booking-form');
  const formMessage = $('#form-message');
  const submitBtn = $('.form-submit', bookingForm);
  const btnText = $('.btn-text', submitBtn);
  const btnLoading = $('.btn-loading', submitBtn);

  if (bookingForm) {
    bookingForm.addEventListener('submit', async (e) => {
      e.preventDefault();

      // Validate form
      const formData = new FormData(bookingForm);
      const data = Object.fromEntries(formData.entries());

      // Basic validation
      let isValid = true;
      $$('[required]', bookingForm).forEach(field => {
        if (!field.value.trim()) {
          field.classList.add('error');
          isValid = false;
        } else {
          field.classList.remove('error');
        }
      });

      if (!isValid) {
        showFormMessage('Please fill in all required fields', 'error');
        return;
      }

      // Email validation
      const emailField = $('#email', bookingForm);
      if (emailField && !validateEmail(emailField.value)) {
        emailField.classList.add('error');
        showFormMessage('Please enter a valid email address', 'error');
        return;
      }

      // Set loading state
      submitBtn.disabled = true;
      btnText.style.display = 'none';
      btnLoading.style.display = 'inline-flex';

      try {
        const response = await fetch('/send-mail.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
          },
          body: JSON.stringify(data)
        });

        const result = await response.json();

        if (result.success) {
          showFormMessage(result.message, 'success');
          bookingForm.reset();
          // Close modal after delay
          setTimeout(() => closeModal(bookingModal), 3000);
        } else {
          showFormMessage(result.message || 'Something went wrong. Please try again.', 'error', result.errors);
        }
      } catch (error) {
        console.error('Form submission error:', error);
        showFormMessage('Network error. Please check your connection and try again.', 'error');
      } finally {
        submitBtn.disabled = false;
        btnText.style.display = 'inline';
        btnLoading.style.display = 'none';
      }
    });

    // Clear error on input
    $$('input, select, textarea', bookingForm).forEach(field => {
      field.addEventListener('input', () => {
        field.classList.remove('error');
        if (formMessage.classList.contains('error')) {
          formMessage.style.display = 'none';
          formMessage.classList.remove('error');
        }
      });
    });
  }

  function validateEmail(email) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
  }

  function showFormMessage(message, type, errors = null) {
    formMessage.textContent = message;
    formMessage.className = `form-message ${type}`;
    formMessage.style.display = 'block';

    // Scroll to message
    formMessage.scrollIntoView({ behavior: 'smooth', block: 'nearest' });

    // If there are field errors, highlight them
    if (errors) {
      Object.keys(errors).forEach(fieldName => {
        const field = $(`#${fieldName}`, bookingForm);
        if (field) {
          field.classList.add('error');
          field.setAttribute('aria-invalid', 'true');
          field.setAttribute('aria-describedby', `${fieldName}-error`);
        }
      });
    }
  }

  // ==========================================================================
  // Toast Notifications
  // ==========================================================================
  const toastContainer = $('#toast-container');

  window.showToast = function(message, type = 'success') {
    const toast = document.createElement('div');
    toast.className = `toast ${type}`;
    toast.setAttribute('role', 'alert');
    toast.setAttribute('aria-live', 'polite');

    const icons = {
      success: '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>',
      error: '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="12" cy="12" r="10"/><line x1="15" y1="9" x2="9" y2="15"/><line x1="9" y1="9" x2="15" y2="15"/></svg>',
      warning: '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>'
    };

    toast.innerHTML = `
      <span class="toast__icon">${icons[type] || icons.success}</span>
      <span class="toast__message">${message}</span>
      <button class="toast__close" aria-label="Dismiss">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
      </button>
    `;

    toast.querySelector('.toast__close').addEventListener('click', () => {
      toast.style.animation = 'slideInRight 0.3s ease reverse';
      setTimeout(() => toast.remove(), 300);
    });

    toastContainer.appendChild(toast);

    // Auto dismiss
    setTimeout(() => {
      if (toast.parentNode) {
        toast.style.animation = 'slideInRight 0.3s ease reverse';
        setTimeout(() => toast.remove(), 300);
      }
    }, 5000);
  };

  // ==========================================================================
  // Intersection Observer for Reveal Animations
  // ==========================================================================
  const revealObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('visible');
        revealObserver.unobserve(entry.target);
      }
    });
  }, {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
  });

  $$('.reveal').forEach(el => revealObserver.observe(el));

  // ==========================================================================
  // Counter Animation for Stats
  // ==========================================================================
  const counterObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const counter = entry.target;
        const target = parseInt(counter.getAttribute('data-count'), 10);
        const duration = 2000;
        const start = performance.now();

        const animate = (currentTime) => {
          const elapsed = currentTime - start;
          const progress = Math.min(elapsed / duration, 1);
          // Easing function
          const eased = 1 - Math.pow(1 - progress, 3);
          const current = Math.floor(target * eased);
          counter.textContent = current.toLocaleString();

          if (progress < 1) {
            requestAnimationFrame(animate);
          } else {
            counter.textContent = target.toLocaleString();
          }
        };

        requestAnimationFrame(animate);
        counterObserver.unobserve(counter);
      }
    });
  }, { threshold: 0.5 });

  $$('[data-count]').forEach(el => counterObserver.observe(el));

  // ==========================================================================
  // Smooth Scroll for Anchor Links
  // ==========================================================================
  $$('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
      const targetId = this.getAttribute('href');
      if (targetId === '#') return;

      const target = $(targetId);
      if (target) {
        e.preventDefault();
        const headerHeight = header.offsetHeight;
        const targetPosition = target.getBoundingClientRect().top + window.scrollY - headerHeight;

        window.scrollTo({
          top: targetPosition,
          behavior: 'smooth'
        });

        // Update URL without scroll
        history.pushState(null, '', targetId);
      }
    });
  });

  // ==========================================================================
  // Form Input Enhancements
  // ==========================================================================
  $$('.form-input, .form-select, .form-textarea').forEach(input => {
    // Add floating label effect
    const wrapper = input.closest('.form-group');
    if (wrapper) {
      const label = $('label', wrapper);
      if (label) {
        const checkValue = () => {
          if (input.value.trim() || input === document.activeElement) {
            wrapper.classList.add('has-value');
          } else {
            wrapper.classList.remove('has-value');
          }
        };

        input.addEventListener('focus', checkValue);
        input.addEventListener('blur', checkValue);
        input.addEventListener('input', checkValue);
        checkValue();
      }
    }
  });

  // ==========================================================================
  // Service Card Hover Effects (Desktop)
  // ==========================================================================
  if (window.innerWidth > 1024) {
    $$('.service-node').forEach(node => {
      node.addEventListener('mouseenter', () => {
        // Trigger SVG path animation
        const service = node.getAttribute('data-service');
        const index = parseInt(node.getAttribute('data-index'), 10);
        if (window.serviceNodeAnimations) {
          window.serviceNodeAnimations.activatePath(index);
        }
      });
    });
  }

  // ==========================================================================
  // Initialize on DOM Ready
  // ==========================================================================
  document.addEventListener('DOMContentLoaded', () => {
    // Trigger initial scroll check
    handleScroll();

    // Initialize tooltips if any
    $$('[data-tooltip]').forEach(el => {
      // Simple tooltip implementation could go here
    });
  });

})();