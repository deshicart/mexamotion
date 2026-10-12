/**
 * Mexa Motion — main interactions
 * Vanilla ES6+. No dependencies.
 *
 * Every feature below degrades gracefully: navigation, content and forms
 * remain usable with JavaScript disabled.
 */
(function () {
    'use strict';

    var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)');

    function $(sel, ctx) { return (ctx || document).querySelector(sel); }
    function $$(sel, ctx) { return Array.prototype.slice.call((ctx || document).querySelectorAll(sel)); }

    /* =====================================================================
       1. Mobile navigation drawer
       ================================================================== */
    function initMobileNav() {
        var toggle = $('#nav-toggle');
        var drawer = $('[data-mobile-nav]');
        if (!toggle || !drawer) { return; }

        var lastFocused = null;

        function open() {
            lastFocused = document.activeElement;
            drawer.hidden = false;
            // Force a reflow so the transition runs from the closed state.
            void drawer.offsetWidth;
            drawer.classList.add('is-open');
            toggle.setAttribute('aria-expanded', 'true');
            toggle.setAttribute('aria-label', 'Close navigation menu');
            document.body.style.overflow = 'hidden';

            var first = drawer.querySelector('a, button');
            if (first) { window.setTimeout(function () { first.focus(); }, 120); }
        }

        function close(restoreFocus) {
            if (drawer.hidden) { return; }
            drawer.classList.remove('is-open');
            toggle.setAttribute('aria-expanded', 'false');
            toggle.setAttribute('aria-label', 'Open navigation menu');
            document.body.style.overflow = '';

            window.setTimeout(function () {
                drawer.hidden = true;
            }, reduceMotion.matches ? 0 : 320);

            if (restoreFocus !== false) {
                if (lastFocused && typeof lastFocused.focus === 'function') { lastFocused.focus(); }
                else { toggle.focus(); }
            }
        }

        toggle.addEventListener('click', function () {
            if (toggle.getAttribute('aria-expanded') === 'true') { close(); } else { open(); }
        });

        $$('[data-nav-close]', drawer).forEach(function (el) {
            el.addEventListener('click', function () { close(); });
        });

        // Close after following a link inside the drawer.
        $$('a', drawer).forEach(function (link) {
            link.addEventListener('click', function () { close(false); });
        });

        document.addEventListener('keydown', function (e) {
            if (drawer.hidden) { return; }

            if (e.key === 'Escape') {
                e.preventDefault();
                close();
                return;
            }

            // Keep focus inside the drawer while it is open.
            if (e.key === 'Tab') {
                var focusables = $$('a[href], button:not([disabled]), input, select, textarea', drawer)
                    .filter(function (el) { return el.offsetParent !== null; });
                if (!focusables.length) { return; }
                var first = focusables[0];
                var last = focusables[focusables.length - 1];

                if (e.shiftKey && document.activeElement === first) {
                    e.preventDefault(); last.focus();
                } else if (!e.shiftKey && document.activeElement === last) {
                    e.preventDefault(); first.focus();
                }
            }
        });

        // Close if the viewport grows into the desktop layout.
        window.addEventListener('resize', function () {
            if (window.innerWidth >= 940 && !drawer.hidden) { close(false); }
        });
    }

    /* =====================================================================
       2. Sticky header state
       ================================================================== */
    function initHeader() {
        var header = $('[data-header]');
        var toTop = $('[data-to-top]');
        if (!header) { return; }

        function update() {
            var scrolled = window.scrollY > 8;
            header.classList.toggle('is-stuck', scrolled);

            if (toTop) {
                if (scrolled) {
                    toTop.hidden = false;
                    toTop.classList.add('is-visible');
                } else {
                    toTop.classList.remove('is-visible');
                    toTop.hidden = true;
                }
            }
        }

        window.addEventListener('scroll', update, { passive: true });
        update();

        if (toTop) {
            toTop.addEventListener('click', function () {
                window.scrollTo({ top: 0, behavior: reduceMotion.matches ? 'auto' : 'smooth' });
            });
        }
    }

    /* =====================================================================
       3. Scroll reveal
       ================================================================== */
    function initReveal() {
        var items = $$('[data-reveal]');
        if (!items.length) { return; }

        if (reduceMotion.matches || !('IntersectionObserver' in window)) {
            items.forEach(function (el) { el.classList.add('is-visible'); });
            return;
        }

        var observer = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                }
            });
        }, { rootMargin: '0px 0px -8% 0px', threshold: 0.08 });

        // Stagger delays are set server-side via the --reveal-delay custom
        // property so they work even if this script fails to run.
        items.forEach(function (el) {
            observer.observe(el);
        });
    }

    /* =====================================================================
       4. Service diagram — connector highlighting
       ================================================================== */
    function initDiagram() {
        var diagram = $('[data-diagram]');
        if (!diagram) { return; }

        $$('[data-diagram-link]', diagram).forEach(function (card) {
            var line = document.getElementById('diagram-line-' + card.getAttribute('data-diagram-link'));
            var flow = line ? line.nextElementSibling : null;

            function on() {
                if (line) { line.classList.add('is-active'); }
                if (flow && flow.classList.contains('diagram__line-flow')) { flow.classList.add('is-active'); }
            }
            function off() {
                if (line) { line.classList.remove('is-active'); }
                if (flow && flow.classList.contains('diagram__line-flow')) { flow.classList.remove('is-active'); }
            }

            card.addEventListener('mouseenter', on);
            card.addEventListener('mouseleave', off);
            card.addEventListener('focus', on);
            card.addEventListener('blur', off);
        });
    }

    /* =====================================================================
       5. Toasts
       ================================================================== */
    window.mmToast = function (message, type) {
        var stack = $('[data-toast-stack]');
        if (!stack) {
            stack = document.createElement('div');
            stack.className = 'toast-stack';
            stack.setAttribute('data-toast-stack', '');
            stack.setAttribute('aria-live', 'polite');
            stack.setAttribute('aria-atomic', 'true');
            document.body.appendChild(stack);
        }

        var toast = document.createElement('div');
        toast.className = 'toast' + (type ? ' toast--' + type : '');
        toast.textContent = message;
        stack.appendChild(toast);

        window.setTimeout(function () {
            toast.style.transition = 'opacity .3s, transform .3s';
            toast.style.opacity = '0';
            toast.style.transform = 'translateY(10px)';
            window.setTimeout(function () { toast.remove(); }, 320);
        }, 4200);
    };

    /* =====================================================================
       6. Portfolio filters
       ================================================================== */
    function initFilters() {
        var bar = $('[data-filters]');
        if (!bar) { return; }

        var chips = $$('[data-filter]', bar);
        var cards = $$('[data-project-card]');
        var empty = $('[data-portfolio-empty]');
        var counter = $('[data-filter-count]');

        function apply(filter) {
            var shown = 0;

            cards.forEach(function (card) {
                var match = filter === 'all' || card.getAttribute('data-category') === filter;
                card.hidden = !match;
                if (match) { shown++; }
            });

            chips.forEach(function (chip) {
                var active = chip.getAttribute('data-filter') === filter;
                chip.classList.toggle('is-active', active);
                chip.setAttribute('aria-pressed', active ? 'true' : 'false');
            });

            if (empty) { empty.classList.toggle('is-visible', shown === 0); }
            if (counter) {
                counter.textContent = shown + (shown === 1 ? ' project' : ' projects');
            }

            // Reflect the filter in the URL without reloading.
            if (window.history && window.history.replaceState) {
                var url = new URL(window.location.href);
                if (filter === 'all') { url.searchParams.delete('filter'); } else { url.searchParams.set('filter', filter); }
                window.history.replaceState({}, '', url);
            }
        }

        chips.forEach(function (chip) {
            chip.addEventListener('click', function () { apply(chip.getAttribute('data-filter')); });
        });

        // Preselect from ?filter=
        var requested = new URLSearchParams(window.location.search).get('filter');
        var valid = chips.some(function (c) { return c.getAttribute('data-filter') === requested; });
        apply(valid ? requested : 'all');

        // Keep the active chip visible inside the scroll row.
        var active = bar.querySelector('.filter-chip.is-active');
        if (active && active.scrollIntoView) {
            active.scrollIntoView({ block: 'nearest', inline: 'center', behavior: 'auto' });
        }
    }

    /* =====================================================================
       7. Project detail dialog
       ================================================================== */
    function initProjectDialog() {
        var dialog = $('[data-project-dialog]');
        if (!dialog || typeof dialog.showModal !== 'function') { return; }

        var title = $('[data-project-dialog-title]', dialog);
        var meta = $('[data-project-dialog-meta]', dialog);
        var overview = $('[data-project-dialog-overview]', dialog);
        var deliverables = $('[data-project-dialog-deliverables]', dialog);
        var media = $('[data-project-dialog-media]', dialog);
        var cta = $('[data-project-dialog-cta]', dialog);

        function openWith(project) {
            if (title) { title.textContent = project.title; }
            if (meta) {
                meta.innerHTML = '';
                [['Category', project.category_label], ['Platform', project.platform], ['Format', project.format], ['Year', project.year]]
                    .forEach(function (pair) {
                        if (!pair[1]) { return; }
                        var wrap = document.createElement('div');
                        var dt = document.createElement('dt');
                        dt.textContent = pair[0];
                        var dd = document.createElement('dd');
                        dd.textContent = pair[1];
                        wrap.appendChild(dt); wrap.appendChild(dd);
                        meta.appendChild(wrap);
                    });
            }
            if (overview) { overview.textContent = project.objective || project.excerpt || ''; }
            if (deliverables) {
                deliverables.innerHTML = '';
                (project.deliverables || []).forEach(function (item) {
                    var li = document.createElement('li');
                    li.textContent = item;
                    deliverables.appendChild(li);
                });
            }
            if (media) {
                media.innerHTML = '';
                if (project.media && project.media.src) {
                    if (project.media.type === 'video') {
                        var video = document.createElement('video');
                        video.src = project.media.src;
                        video.controls = true;
                        video.preload = 'none';
                        if (project.media.poster) { video.poster = project.media.poster; }
                        media.appendChild(video);
                    } else {
                        var img = document.createElement('img');
                        img.src = project.media.src;
                        img.alt = project.title + ' artwork';
                        media.appendChild(img);
                    }
                }
            }
            if (cta) {
                cta.href = 'book-now.php?service=' + encodeURIComponent(project.category);
            }

            if (typeof dialog.showModal === 'function') { dialog.showModal(); }
            else { dialog.setAttribute('open', ''); }
        }

        var raw = document.getElementById('portfolio-projects');
        if (!raw) { return; }

        var projects = {};
        try {
            JSON.parse(raw.textContent).forEach(function (project) {
                projects[project.slug] = project;
            });
        } catch (err) {
            return; // Leave the cards as normal links to the page.
        }

        $$('[data-project-open]').forEach(function (trigger) {
            trigger.addEventListener('click', function (e) {
                var project = projects[trigger.getAttribute('data-project-open')];
                if (!project) { return; }
                e.preventDefault();
                openWith(project);
            });
        });

        $$('[data-project-dialog-close]', dialog).forEach(function (btn) {
            btn.addEventListener('click', function () { dialog.close(); });
        });

        dialog.addEventListener('click', function (e) {
            if (e.target === dialog) { dialog.close(); }
        });
    }

    /* =====================================================================
       8. Book Now wizard
       ================================================================== */
    function initBookForm() {
        var form = $('[data-book-form]');
        if (!form) { return; }

        var panels = $$('[data-book-panel]', form);
        var steps = $$('[data-book-step]', form);
        var total = panels.length;
        var current = 0;

        function show(index, focusFirst) {
            current = Math.max(0, Math.min(total - 1, index));
            panels.forEach(function (panel, i) { panel.hidden = i !== current; });
            steps.forEach(function (step, i) {
                step.classList.toggle('is-active', i === current);
                step.classList.toggle('is-done', i < current);
                step.setAttribute('aria-current', i === current ? 'step' : 'false');
            });
            if (focusFirst) {
                var panel = panels[current];
                var target = panel.querySelector('input:not([type="hidden"]), select, textarea, button');
                if (target) { target.focus({ preventScroll: false }); }
            }
            if (history.replaceState) {
                history.replaceState({}, '', '#step-' + (current + 1));
            }
        }

        // Enable wizard mode only when JS is available.
        form.classList.add('is-enhanced');

        function validatePanel(panel) {
            var ok = true;
            var firstBad = null;

            $$('[data-required]', panel).forEach(function (input) {
                var field = input.closest('.field') || input.closest('.consent-wrap');
                var value = (input.value || '').trim();
                var valid = value !== '';

                if (valid && input.type === 'email') {
                    valid = /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/.test(value);
                }
                if (valid && input.dataset.validate === 'phone') {
                    valid = value.replace(/[^\d]/g, '').length >= 6;
                }
                if (valid && input.dataset.validate === 'text') {
                    valid = value.length >= parseInt(input.dataset.minlength || '10', 10);
                }

                if (field) { field.classList.toggle('has-error', !valid); }
                input.setAttribute('aria-invalid', valid ? 'false' : 'true');

                if (!valid) {
                    ok = false;
                    if (!firstBad) { firstBad = input; }
                }
            });

            if (firstBad) { firstBad.focus(); }
            return ok;
        }

        $$('[data-book-next]', form).forEach(function (btn) {
            btn.addEventListener('click', function () {
                var panel = panels[current];
                if (!validatePanel(panel)) {
                    window.mmToast('Please complete the required fields before continuing.', 'error');
                    return;
                }
                show(current + 1, true);
            });
        });

        $$('[data-book-prev]', form).forEach(function (btn) {
            btn.addEventListener('click', function () { show(current - 1, true); });
        });

        $$('[data-book-goto]', form).forEach(function (btn) {
            btn.addEventListener('click', function () {
                var target = parseInt(btn.getAttribute('data-book-goto'), 10) - 1;
                show(target, true);
            });
        });

        // Clear the error state as soon as the visitor starts fixing a field.
        form.addEventListener('input', function (e) {
            var field = e.target.closest('.field, .consent-wrap');
            if (field && field.classList.contains('has-error')) {
                field.classList.remove('has-error');
                e.target.setAttribute('aria-invalid', 'false');
            }
            fillSummary();
        });

        // Keep the review summary in step with the form.
        form.addEventListener('change', function () {
            fillSummary();
            if (consent && !consent.checked) {
                var wrap = consent.closest('.consent-wrap');
                if (wrap) { wrap.classList.remove('has-error'); }
            }
        });

        // Character counter for the description field.
        var description = $('#mm-description', form);
        var counter = $('[data-counter]', form);
        if (description && counter) {
            var max = parseInt(description.getAttribute('maxlength') || '1200', 10);
            var updateCounter = function () {
                var len = description.value.length;
                counter.textContent = len + ' / ' + max + ' characters';
                counter.classList.toggle('is-warning', len > max * 0.9);
            };
            description.addEventListener('input', updateCounter);
            updateCounter();
        }

        // Review summary
        function fillSummary() {
            $$('[data-summary]', form).forEach(function (node) {
                var key = node.getAttribute('data-summary');
                var field = form.querySelector('[name="' + key + '"]');
                var value = '';

                if (field) {
                    if (field.type === 'radio') {
                        var checked = form.querySelector('[name="' + key + '"]:checked');
                        value = checked ? (checked.dataset.label || checked.value) : '';
                    } else {
                        value = (field.value || '').trim();
                    }
                }
                node.textContent = value || 'Not provided';
                node.classList.toggle('is-empty', !value);
            });
        }

        // Keep the review summary in step with the form.
        var consent = $('[data-consent]', form);
        var submitBtn = $('[data-book-submit]', form);
        if (submitBtn) {
            submitBtn.addEventListener('click', function (e) {
                e.preventDefault();
                fillSummary();

                var allValid = true;
                panels.forEach(function (panel) {
                    if (!validatePanel(panel)) { allValid = false; }
                });

                if (consent && !consent.checked) {
                    var wrap = consent.closest('.consent-wrap') || consent.closest('.consent');
                    if (wrap) { wrap.classList.add('has-error'); }
                    var err = wrap ? wrap.querySelector('.field__error') : null;
                    if (err) { err.style.display = 'flex'; }
                    consent.focus();
                    window.mmToast('Please confirm the privacy notice before submitting.', 'error');
                    return;
                }

                if (!allValid) {
                    window.mmToast('Some required fields still need attention.', 'error');
                    // Jump back to the first panel that has a problem.
                    for (var i = 0; i < panels.length; i++) {
                        if (panels[i].querySelector('.has-error')) { show(i, true); break; }
                    }
                    return;
                }

                // Guard against double submissions while the request runs.
                submitBtn.disabled = true;
                submitBtn.setAttribute('aria-busy', 'true');
                var original = submitBtn.innerHTML;
                submitBtn.innerHTML = 'Submitting…';
                form.submit();
                window.setTimeout(function () {
                    if (submitBtn.disabled) {
                        submitBtn.disabled = false;
                        submitBtn.removeAttribute('aria-busy');
                        submitBtn.innerHTML = original;
                    }
                }, 10000);
            });
        }

        // Jump back to the step the server flagged when validation failed.
        var alertBox = $('[data-form-alert]', form);
        var startStep = parseInt(form.getAttribute('data-start-step') || '1', 10);
        if (startStep > 1 || (alertBox && !alertBox.hidden)) {
            show(startStep - 1, false);
        }

        // Preselect a service from ?service=slug
        var requested = new URLSearchParams(window.location.search).get('service');
        if (requested) {
            var input = form.querySelector('[name="service"][value="' + requested.replace(/"/g, '') + '"]');
            if (input) {
                input.checked = true;
                input.dispatchEvent(new Event('change', { bubbles: true }));
            }
        }

        show(startStep > 1 ? startStep - 1 : 0, false);
        fillSummary();
    }

    /* =====================================================================
       9. Radio option highlighting (fallback for browsers without :has())
       ================================================================== */
    function initOptions() {
        var groups = {};

        $$('.option input[type="radio"]').forEach(function (input) {
            groups[input.name] = groups[input.name] || [];
            groups[input.name].push(input.closest('.option'));
        });

        Object.keys(groups).forEach(function (name) {
            function sync() {
                groups[name].forEach(function (option) {
                    var checked = option.querySelector('input').checked;
                    option.classList.toggle('is-selected', checked);
                });
            }
            groups[name][0].querySelector('input').addEventListener('change', sync);
            sync();
        });
    }

    /* =====================================================================
       10. Portfolio Tabs (Home page Long/Short video grids)
       ================================================================== */
    function initPortfolioTabs() {
        var tabs = $$('.portfolio-tab');
        if (!tabs.length) { return; }

        var panels = $$('.portfolio-panel');

        function activate(tabName) {
            tabs.forEach(function (tab) {
                var isActive = tab.getAttribute('data-tab') === tabName;
                tab.classList.toggle('is-active', isActive);
                tab.setAttribute('aria-selected', isActive ? 'true' : 'false');
            });

            panels.forEach(function (panel) {
                var isActive = panel.getAttribute('data-panel') === tabName;
                panel.hidden = !isActive;
                panel.classList.toggle('is-active', isActive);
                if (isActive) {
                    panel.removeAttribute('hidden');
                } else {
                    panel.setAttribute('hidden', '');
                }
            });
        }

        tabs.forEach(function (tab) {
            tab.addEventListener('click', function () {
                var tabName = tab.getAttribute('data-tab');
                if (tabName) { activate(tabName); }
            });
        });
    }

    /* =====================================================================
       11. Current year fallback
       ================================================================== */
    function initYear() {
        $$('[data-year]').forEach(function (el) {
            el.textContent = String(new Date().getFullYear());
        });
    }

    /* =====================================================================
       Boot
       ================================================================== */
    function boot() {
        document.documentElement.classList.remove('no-js');
        initMobileNav();
        initHeader();
        initReveal();
        initDiagram();
        initFilters();
        initProjectDialog();
        initBookForm();
        initOptions();
        initYear();
        initPortfolioTabs();
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', boot);
    } else {
        boot();
    }
})();