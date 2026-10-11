/**
 * Mexa Motion — review carousel
 * ---------------------------------------------------------------------------
 * Touch-friendly scroll-snap slider with previous / next controls, position
 * dots, keyboard support, a visible pause control and restrained autoplay.
 *
 * Autoplay never runs when the visitor prefers reduced motion, and always
 * stops while the carousel is hovered or focused.
 */
(function () {
    'use strict';

    function $$(sel, ctx) {
        return Array.prototype.slice.call((ctx || document).querySelectorAll(sel));
    }

    function Carousel(root) {
        this.root = root;
        this.track = root.querySelector('[data-carousel-track]');
        this.slides = $$('[data-review-slide]', root).map(function (slide) {
            return slide.closest('.carousel__slide') || slide.parentElement;
        });
        this.prevBtn = root.querySelector('[data-carousel-prev]');
        this.nextBtn = root.querySelector('[data-carousel-next]');
        this.dotWrap = root.querySelector('[data-carousel-dots]');
        this.toggleBtn = root.querySelector('[data-carousel-toggle]');
        this.toggleLabel = root.querySelector('[data-carousel-toggle-label]');
        this.status = root.querySelector('[data-carousel-status]');

        this.interval = parseInt(root.getAttribute('data-autoplay') || '0', 10);
        this.timer = null;
        this.userStopped = false;
        this.index = 0;

        if (!this.track || !this.slides.length) { return; }

        this.reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)');
        this.buildDots();
        this.bind();
        this.sync();
        this.start();
    }

    Carousel.prototype.perView = function () {
        if (window.innerWidth >= 1060) { return 3; }
        if (window.innerWidth >= 720) { return 2; }
        return 1;
    };

    Carousel.prototype.buildDots = function () {
        if (!this.dotWrap) { return; }
        this.dotWrap.innerHTML = '';

        var self = this;
        // One dot per reachable slide position (the last slides share a page).
        var positions = this.maxIndex() + 1;

        for (var i = 0; i < positions; i++) {
            var dot = document.createElement('button');
            dot.type = 'button';
            dot.className = 'carousel__dot';
            dot.setAttribute('data-index', String(i));
            dot.setAttribute('role', 'tab');
            dot.setAttribute('aria-selected', 'false');
            dot.setAttribute('aria-label', 'Show review ' + (i + 1) + ' of ' + positions);
            dot.addEventListener('click', (function (index) {
                return function () { self.goTo(index, true); };
            })(i));
            this.dotWrap.appendChild(dot);
        }
        this.dots = $$('.carousel__dot', this.dotWrap);
    };

    Carousel.prototype.maxIndex = function () {
        return Math.max(0, this.slides.length - this.perView());
    };

    Carousel.prototype.goTo = function (index, userInitiated) {
        var max = this.maxIndex();
        var target = Math.max(0, Math.min(max, index));

        var slide = this.slides[target];
        var left = slide.offsetLeft - this.track.offsetLeft;

        this.track.scrollTo({
            left: left,
            behavior: this.reduceMotion.matches ? 'auto' : 'smooth'
        });

        // Fallback for browsers without scrollTo options support.
        if (typeof this.track.scrollTo !== 'function') {
            this.track.scrollLeft = left;
        }

        this.index = target;
        this.sync(userInitiated);

        if (userInitiated) { this.restart(); }
    };

    Carousel.prototype.step = function (direction) {
        this.goTo(this.index + direction, true);
    };

    Carousel.prototype.sync = function (announce) {
        var i;
        var active = Math.min(this.index, this.maxIndex());

        for (i = 0; i < this.slides.length; i++) {
            var visible = i >= active && i < active + this.perView();
            this.slides[i].setAttribute('aria-hidden', visible ? 'false' : 'true');
            // Only the visible slides should be reachable by keyboard.
            $$('a, button', this.slides[i]).forEach(function (el) {
                el.tabIndex = visible ? 0 : -1;
            });
        }

        if (this.dots) {
            for (i = 0; i < this.dots.length; i++) {
                var on = i === active;
                this.dots[i].classList.toggle('is-active', on);
                this.dots[i].setAttribute('aria-selected', on ? 'true' : 'false');
            }
        }

        if (this.prevBtn) { this.prevBtn.disabled = active <= 0; }
        if (this.nextBtn) { this.nextBtn.disabled = active >= this.maxIndex(); }

        if (announce && this.status) {
            this.status.textContent = 'Showing review ' + (active + 1) + ' to ' +
                Math.min(active + this.perView(), this.slides.length) + ' of ' + this.slides.length + '.';
        }
    };

    Carousel.prototype.start = function () {
        if (!this.interval || this.reduceMotion.matches || this.userStopped) { return; }
        var self = this;
        this.timer = window.setInterval(function () {
            if (document.hidden) { return; }
            var next = self.index + 1;
            if (next > self.maxIndex()) { next = 0; }
            self.goTo(next, false);
        }, this.interval);
    };

    Carousel.prototype.stop = function () {
        if (this.timer) { window.clearInterval(this.timer); this.timer = null; }
    };

    Carousel.prototype.restart = function () {
        this.stop();
        this.start();
    };

    Carousel.prototype.bind = function () {
        var self = this;

        if (this.prevBtn) {
            this.prevBtn.addEventListener('click', function () { self.step(-1); });
        }
        if (this.nextBtn) {
            this.nextBtn.addEventListener('click', function () { self.step(1); });
        }

        // Pause while the visitor is reading.
        ['mouseenter', 'focusin'].forEach(function (evt) {
            self.root.addEventListener(evt, function () { self.stop(); });
        });
        ['mouseleave', 'focusout'].forEach(function (evt) {
            self.root.addEventListener(evt, function () {
                window.setTimeout(function () {
                    if (!self.root.contains(document.activeElement)) { self.start(); }
                }, 60);
            });
        });

        // Manual interaction stops autoplay for the rest of the visit.
        this.root.addEventListener('pointerdown', function () { self.userStopped = true; self.stop(); });
        this.track.addEventListener('keydown', function () { self.userStopped = true; self.stop(); });
        this.root.addEventListener('wheel', function () { self.userStopped = true; self.stop(); }, { passive: true });

        document.addEventListener('visibilitychange', function () {
            if (document.hidden) { self.stop(); } else { self.start(); }
        });

        // Reflect real scroll position (touch swipe) in dots and controls.
        var ticking = false;
        this.track.addEventListener('scroll', function () {
            if (ticking) { return; }
            ticking = true;
            window.requestAnimationFrame(function () {
                ticking = false;
                var trackLeft = self.track.scrollLeft;
                var best = 0;
                var bestDist = Infinity;
                self.slides.forEach(function (slide, i) {
                    var dist = Math.abs(slide.offsetLeft - self.track.offsetLeft - trackLeft);
                    if (dist < bestDist) { bestDist = dist; best = i; }
                });
                var clamped = Math.min(best, self.maxIndex());
                if (clamped !== self.index) { self.index = clamped; self.sync(false); }
            });
        }, { passive: true });

        // Keyboard navigation on the track.
        this.track.addEventListener('keydown', function (e) {
            if (e.key === 'ArrowRight') { e.preventDefault(); self.step(1); }
            if (e.key === 'ArrowLeft') { e.preventDefault(); self.step(-1); }
            if (e.key === 'Home') { e.preventDefault(); self.goTo(0, true); }
            if (e.key === 'End') { e.preventDefault(); self.goTo(self.maxIndex(), true); }
        });

        if (this.toggleBtn) {
            this.toggleBtn.hidden = false;
            this.toggleBtn.addEventListener('click', function () {
                if (self.timer) {
                    self.userStopped = true;
                    self.stop();
                    if (self.toggleLabel) { self.toggleLabel.textContent = 'Play'; }
                    self.toggleBtn.setAttribute('aria-label', 'Resume review autoplay');
                } else {
                    self.userStopped = false;
                    self.start();
                    if (self.toggleLabel) { self.toggleLabel.textContent = 'Pause'; }
                    self.toggleBtn.setAttribute('aria-label', 'Pause review autoplay');
                }
            });
        }

        var resizeTimer = null;
        window.addEventListener('resize', function () {
            window.clearTimeout(resizeTimer);
            resizeTimer = window.setTimeout(function () {
                var positions = self.maxIndex() + 1;
                if (!self.dots || self.dots.length !== positions) { self.buildDots(); }
                self.index = Math.min(self.index, self.maxIndex());
                self.sync(false);
            }, 160);
        });

        if (this.reduceMotion.addEventListener) {
            this.reduceMotion.addEventListener('change', function () {
                if (self.reduceMotion.matches) { self.stop(); }
                else { self.start(); }
            });
        }
    };

    function init() {
        $$('[data-carousel]').forEach(function (root) { new Carousel(root); });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
})();