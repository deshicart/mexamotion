# Mexa Motion — Official Agency Website

Production website for **Mexa Motion**, a video editing, motion graphics and creative content
agency based in Bangladesh.

Built with plain PHP 8, HTML5, CSS3 and vanilla JavaScript. **No database, no admin panel,
no build step, no Node.js on the server.** Upload the folder and it runs.

---

## Table of contents

1. [What's included](#whats-included)
2. [Requirements](#requirements)
3. [Installation](#installation)
4. [Project structure](#project-structure)
5. [Editing content (no database)](#editing-content-no-database)
6. [Go-live checklist](#go-live-checklist)
7. [The Book Now inquiry flow](#the-book-now-inquiry-flow)
8. [Deployment notes](#deployment-notes)
9. [Customising the design](#customising-the-design)
10. [Accessibility](#accessibility)
11. [Performance](#performance)
12. [Regenerating placeholder artwork](#regenerating-placeholder-artwork)
13. [Browser support](#browser-support)

---

## What's included

### Pages

| File | Page | Purpose |
|---|---|---|
| `index.php` | **Home** | Hero, seven-service diagram, trust strip, featured services, featured work, why-choose, process, review carousel, final CTA |
| `services.php` | **Services** | Services hero, overview, seven detailed service sections, pricing note, workflow, FAQ accordion |
| `portfolio.php` | **Portfolio** | Portfolio hero, client-side category filters, project grid, project detail overlay |
| `reviews.php` | **Reviews** | Reviews hero, rating-transparency note, main testimonial carousel, additional feedback, source note |
| `about.php` | **About** | About hero, agency introduction, mission, values, process, team preview |
| `team.php` | **Our Team** | Team hero, introduction, team grid, collaboration section |
| `book-now.php` | **Book Now** | Four-step project inquiry form |
| `thank-you.php` | **Confirmation** | Prepared WhatsApp / email hand-off after a valid submission |
| `privacy.php` | **Privacy Notice** | Plain-language privacy explanation for the form |
| `404.php` | **Not found** | Branded 404 page |

### Signature features

- **Seven-service diagram** — the Mexa Motion logo card connected to all seven service cards with
  thin blue SVG curves on desktop; a clean stacked layout with a blue rail on phones and tablets.
- **Client review carousel** — three cards on desktop, two on tablets, one on phones. Touch swipe,
  keyboard control, position dots, restrained 7-second autoplay with a visible pause button.
  Autoplay stops on hover, focus, manual interaction, tab switch and `prefers-reduced-motion`.
- **Portfolio filters** — client-side filtering against static PHP data, reflected in the URL so a
  filtered view can be shared or bookmarked.
- **Four-step inquiry wizard** — service selection, project details, contact details, review and
  submit. Validated in the browser **and** again on the server.
- **Works without JavaScript** — navigation, content, FAQ and the inquiry form all remain usable.

### Excluded from Version 1 (per the brief)

Admin panel · database · customer accounts · payments · subscriptions · invoicing · client
dashboards · database-backed reviews · CRM integrations.

---

## Requirements

| | |
|---|---|
| PHP | 8.0 or newer (tested on 8.4) |
| Web server | Apache, Nginx or LiteSpeed |
| Database | **None** |
| PHP extensions | Core + `mbstring` (strongly recommended) + `session` |
| Node.js | **Not required** on the server |

`mbstring` is used for safe multi-byte text handling. If it is unavailable the helpers fall back to
`substr()`/`strlen()` and still work, just with weaker Unicode handling.

---

## Installation

1. Upload the project folder to your web root (e.g. `public_html/`).
2. Confirm `index.php` is the directory index (`DirectoryIndex index.php` is set in `.htaccess`).
3. Open the site. It works immediately with placeholder content.
4. Go through the **[Go-live checklist](#go-live-checklist)** before announcing the URL.

### Local testing

```bash
php -S localhost:8000 -t .
# then open http://localhost:8000
```

---

## Project structure

```
mexamotion/
├── index.php                  Home
├── services.php               Services
├── portfolio.php              Portfolio
├── reviews.php                Reviews
├── about.php                  About
├── team.php                   Our Team
├── book-now.php               Project inquiry form (4 steps)
├── thank-you.php              Prepared confirmation + hand-off links
├── privacy.php                Privacy notice
├── 404.php                    Branded not-found page
├── process-inquiry.php        Server-side validation + hand-off (POST only)
│
├── includes/
│   ├── config.php             ⭐ ALL site settings, contact details, SEO defaults
│   ├── data.php               ⭐ ALL editable content (services, projects, reviews, team…)
│   ├── functions.php          Escaping, icons, helpers, data accessors
│   ├── validation.php         Input cleaning, validation, rate limiting, CSRF token
│   ├── header.php             <head>, sticky header, mobile drawer
│   ├── footer.php             Footer, back-to-top, scripts
│   ├── hero.php               Homepage hero
│   ├── service-diagram.php    Seven-service diagram
│   ├── review-carousel.php    Testimonial carousel wrapper
│   ├── review-card.php        Reusable review card
│   ├── service-card.php       Reusable service card
│   ├── project-card.php       Reusable portfolio card
│   └── cta-banner.php         Reusable final call-to-action
│
├── assets/
│   ├── css/style.css          Complete design system (single stylesheet)
│   ├── js/main.js             Navigation, reveal, filters, dialog, form wizard, toasts
│   ├── js/reviews.js          Review carousel
│   └── images/
│       ├── brand/             Supplied logo, favicon and mark
│       ├── services/          Service artwork
│       ├── portfolio/         Project artwork
│       ├── team/              Team portraits
│       └── about/             Studio imagery
│
├── tools/
│   └── generate-placeholders.php   Regenerates the placeholder SVG artwork
│
├── client/                    Original supplied brand assets (source of truth)
├── .htaccess                  Apache config: caching, compression, security, 404
├── robots.txt
└── sitemap.xml
```

---

## Editing content (no database)

Two files hold **all** editable content. No database, no admin panel.

### 1. `includes/config.php` — settings, contact details, social links

```php
'contact' => [
    'is_placeholder' => true,   // ← set to FALSE once real details are added
    'whatsapp'       => '8801700000000',     // digits only, with country code
    'whatsapp_label' => '+880 1700-000000',
    'email'          => 'hello@mexamotion.com',
    ...
],
```

> **Before launch:** replace every value under `contact` and `social`, then set
> `is_placeholder => false`. That single flag removes the amber "Development build" notices from
> the footer, the Book Now form and the thank-you page.

Other useful settings in the same file:

| Key | Purpose |
|---|---|
| `site.url` | Canonical domain, used for SEO tags, the sitemap and WhatsApp links |
| `brand.*` | Logo paths, favicon, theme colour |
| `seo.og_image` | Social sharing image (1200×630 PNG recommended) |
| `seo.indexable` | `false` adds `noindex, follow` to every page (useful for staging) |
| `inquiry.primary` | `whatsapp` (default) or `email` |
| `security.max_per_hour` | Simple per-IP submission limit |

### 2. `includes/data.php` — all copy

| Collection | Controls |
|---|---|
| `services` | The seven services: title, tagline, summary, long description, use cases, deliverables, image |
| `projects` | Portfolio entries: title, category, platform, year, excerpt, objective, deliverables, media |
| `reviews` | Testimonials: name, role, location, rating, text |
| `team` | Team members: name, role, bio, skills, portrait, social link |
| `value_strip`, `why_choose`, `process`, `values`, `faqs` | Homepage / About / Services sections |
| `form_options` | Inquiry-form service, platform, budget and deadline options |

### The `placeholder` flag

Every review, project and team entry carries a `placeholder` flag. While it is `true` the front end
shows a small amber badge and a visible notice, so development content is never mistaken for real
client work.

```php
[
    'name'        => 'A real, client-approved display name',
    'role'        => 'Content creator',
    'rating'      => 5,              // only a confirmed rating; 0 = "rating not yet verified"
    'text'        => 'The real review text, approved for publication.',
    'placeholder' => false,          // ← flip to false once approved
]
```

**Content rules baked into the build:**

- Do not publish fabricated testimonials, invented identities, false star ratings or misleading
  review counts.
- Do not publish invented statistics (projects completed, clients served, years in business).
- Do not publish fixed prices — the pricing note states that scope determines the quote.
- Do not imply guaranteed results or guaranteed delivery dates.

### Adding a portfolio project

```php
[
    'slug'        => 'my-new-project',
    'title'       => 'My New Project',
    'category'    => 'video-editing',   // must match a service slug
    'platform'    => 'YouTube',
    'year'        => '2026',
    'format'      => '16:9 long form',
    'excerpt'     => 'One or two sentences shown on the card.',
    'objective'   => 'Shown in the project detail overlay.',
    'deliverables' => ['Full-length edit', 'Short teaser cut'],
    'media'       => ['type' => 'image', 'src' => 'assets/images/portfolio/my-new-project.jpg', 'poster' => ''],
    'placeholder' => false,
]
```

The card, the filter count and the detail overlay update automatically. To use video instead of an
image, set `'type' => 'video'` and point `src` at an `.mp4` — it is loaded only when the visitor
opens the detail view (`preload="none"`, `controls` on, never autoplaying).

---

## Go-live checklist

Everything below is safe to do in order. Steps 1–3 are the only ones that require real information
from the client.

### 1. Contact details — `includes/config.php`

- [ ] `contact.whatsapp` — digits only, country code first, no `+` or spaces
- [ ] `contact.whatsapp_label` — how the number is displayed
- [ ] `contact.email` / `contact.email_label`
- [ ] `contact.address`, `contact.city`, `contact.country`, `contact.hours`
- [ ] Set `contact.is_placeholder => false`

### 2. Social links — `includes/config.php`

- [ ] Replace every URL under `social` (no invented handles)
- [ ] Remove any platform the agency does not use from `includes/footer.php` (`$mm_social`)
- [ ] Set `social.is_placeholder => false`

### 3. Domain — `includes/config.php` + `robots.txt` + `sitemap.xml`

- [ ] `site.url` → `https://mexamotion.com`
- [ ] Same domain in `robots.txt` (`Sitemap:` line) and every `<loc>` in `sitemap.xml`

### 4. Content approval — `includes/data.php`

- [ ] Replace all placeholder **portfolio** projects with real, approved work
- [ ] Replace all placeholder **reviews** with real, permission-granted testimonials
- [ ] Replace all placeholder **team** profiles with approved names, titles and portraits
- [ ] Approve the About / mission / values copy
- [ ] Approve the inquiry-form **budget and deadline** ranges, or replace them

### 5. Brand assets — `assets/images/brand/`

- [ ] Replace `favicon.png` (64×64 or larger) and `logo-square.png` (the header/footer lockup)
- [ ] Replace `logo-rounded.png` (the square mark used in the service diagram)
- [ ] Add a 1200×630 social sharing image and point `seo.og_image` at it

### 6. Form options — `includes/data.php`

- [ ] `form_options.budgets` — placeholder ranges, not official prices
- [ ] `form_options.deadlines` — preferred dates, not commitments

### 7. Technical

- [ ] Enable **HTTPS** (uncomment the rewrite block in `.htaccess`)
- [ ] Submit `sitemap.xml` in Google Search Console
- [ ] Test the inquiry flow end to end on a real device
- [ ] Confirm `process-inquiry.php` is **not** indexed (it is already blocked in `robots.txt`)

---

## The Book Now inquiry flow

**Book Now means submitting a project inquiry.** It does not confirm an appointment, accept a
project, or guarantee a delivery date.

```
book-now.php  ──POST──▶  process-inquiry.php  ──303──▶  thank-you.php
   (4 steps)              server-side validation         prepared hand-off links
```

### Submission behaviour (Version 1)

There is no database, so nothing can be stored. After server-side validation the visitor is shown a
**prepared message** and chooses how to deliver it:

- **WhatsApp hand-off (default)** — a correctly encoded `wa.me` deep link.
- **Email hand-off** — a `mailto:` link with the message and reference pre-filled.

Both are also offered as alternatives so the visitor is never blocked.

The confirmation page states plainly:

> Your project inquiry has been prepared. Please use the contact option provided to send your
> details to our team. **Your inquiry is not yet with us.**

An email fallback can be added later by posting to an SMTP service from `process-inquiry.php` and
only reporting success when the transport confirms delivery. That is deliberately **not** enabled
here, because Version 1 must not claim delivery that has not happened.

### Form security

| Protection | Implementation |
|---|---|
| CSRF | Per-session token, compared with `hash_equals()` |
| XSS | All output escaped with `htmlspecialchars()`; no HTML is accepted from visitors |
| Injection | All values matched against allow-lists (services, platforms, budgets, deadlines) |
| Spam | Honeypot field + minimum completion time |
| Rate limiting | File-based per-IP-per-hour bucket (`security.max_per_hour`, default 8) |
| Length limits | Every field capped server-side (e.g. description 1200 characters) |
| Session data | Held in the session only, never appended to a URL |
| Method | `process-inquiry.php` accepts `POST` only and redirects on `GET` |
| Cookies | `HttpOnly`, `SameSite=Lax`, `Secure` when served over HTTPS |

---

## Deployment notes

### Apache

`.htaccess` is included and handles caching, gzip, security headers, MIME types and the 404 page.
Confirm that `AllowOverride All` is set for the directory; if not, move the directives into the
virtual host.

### Nginx

```nginx
server {
    listen 443 ssl http2;
    server_name mexamotion.com www.mexamotion.com;
    root /var/www/mexamotion;
    index index.php;

    location / { try_files $uri $uri/ =404; }

    location ~ \.php$ {
        include fastcgi_params;
        fastcgi_pass unix:/run/php/php8.2-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
    }

    error_page 404 /404.php;

    location ~ ^/(includes|tools)/ { deny all; }
    location ~ ^/process-inquiry\.php$ { allow all; }

    # Never execute anything inside the assets folder
    location ~* ^/assets/.*\.(php|phtml)$ { deny all; }

    location ~* \.(css|js|svg|png|jpg|jpeg|webp|avif|woff2)$ {
        expires 1y;
        add_header Cache-Control "public, immutable";
    }

    gzip on;
    gzip_types text/css application/javascript image/svg+xml application/json;
    gzip_min_length 512;
}
```

### Shared hosting checklist

- [ ] PHP 8.0+ selected in the hosting control panel
- [ ] Document root points at the project folder
- [ ] `includes/` is not browsable (`includes/*.php` must not be requested directly)
- [ ] `process-inquiry.php` is not blocked by a host firewall rule
- [ ] Sessions work (needed for the CSRF token and the hand-off) — try submitting the form once
- [ ] Outbound HTTPS is available for `mail()` if an email fallback is added later

---

## Customising the design

All design tokens live at the top of `assets/css/style.css`:

```css
:root {
    --blue:   #1152DF;   /* Mexa vivid blue — brand primary   */
    --blue-400:#3B82F6;  /* Electric blue — secondary accent   */
    --ink:    #101828;   /* Main text                          */
    --ink-2:  #667085;   /* Secondary text                     */
    --surface:#F5F7FB;   /* Light background                   */
    --blue-50:#EEF4FF;   /* Light blue surface                 */
    --line:   #E4E7EC;   /* Borders                            */
    --dark:   #0B1220;   /* Dark section background            */

    --container: 1200px;  /* Content max width                  */
    --radius:    16px;    /* Card radius                        */
}
```

To change a brand colour, edit the token — the whole site follows.

### Breakpoints

| Breakpoint | Layout |
|---|---|
| `≤ 479px` | Single column, full-width hero buttons, stacked diagram |
| `560px` | Two-column service / diagram grids |
| `700–900px` | Two-column layouts, two-up carousel |
| `940px` | Desktop navigation with inline links |
| `900px` | Two-column service detail sections |
| `1024px` | Three-column grids, sidebar on Book Now |
| `1060px` | Three-up review carousel |
| `1120px` | **Full seven-service radial diagram** |
| `1280px+` | Container capped at 1200px, centred |

---

## Accessibility

Accessibility is built in rather than added afterwards.

- Semantic landmarks (`header`, `nav`, `main`, `section`, `footer`) and a skip link
- One `<h1>` per page with a logical heading hierarchy
- Visible focus indicators (`:focus-visible`, 3px brand outline)
- The mobile drawer traps focus, closes on `Escape`, and restores focus to the trigger
- The carousel is keyboard operable (`←` `→` `Home` `End`), announces slide changes via a live
  region, and moves off-screen slides out of the tab order
- Form fields are explicitly labelled; errors are associated and never rely on colour alone
- Inline links in body copy are underlined so they are distinguishable without colour
- `prefers-reduced-motion` disables the ribbon animation, flow effects, carousel autoplay and
  smooth scrolling
- Placeholder images use empty or descriptive `alt` text; decorative SVGs are `aria-hidden`
- All imagery has explicit `width`/`height` to prevent layout shift

Verified with **axe-core (WCAG 2.0/2.1 A + AA)**: **zero violations** across all ten pages at
320px, 390px, 768px and 1440px viewports, including the open mobile drawer and the project overlay.

---

## Performance

| Metric | Result |
|---|---|
| Homepage HTML | ~13 KB gzipped |
| CSS | ~15 KB gzipped (single file, cached) |
| JavaScript | ~8.5 KB gzipped across two files, `defer`red |
| Images | SVG placeholders, a few KB each |
| Third-party requests | Web fonts only |
| JavaScript errors | None |
| Horizontal overflow | None, 320px → 1920px |

How it stays fast: one stylesheet, two small scripts, inline SVG icons (no icon font), SVG artwork,
explicit image dimensions, `loading="lazy"` below the fold, `decoding="async"`, a preloaded logo, no
video files, no trackers, no framework, no jQuery.

Targets: **LCP ≤ 2.5 s · INP ≤ 200 ms · CLS ≤ 0.1** under ordinary mobile connections.

---

## Regenerating placeholder artwork

The development artwork in `assets/images/` is generated, not drawn by hand:

```bash
php tools/generate-placeholders.php
```

It rewrites the service, portfolio, team and studio SVGs. Once real photography is supplied you can
delete the script and simply replace the files (keeping the same filenames, or updating the paths in
`includes/data.php`).

---

## Browser support

Current versions of Chrome, Firefox, Safari and Edge. Android Chrome is the priority target.

Graceful degradation is built in for older browsers:

| Feature | Without support |
|---|---|
| JavaScript disabled | Nav becomes a scrollable strip; the wizard becomes one long form; the FAQ uses native `<details>`; project links jump to the card |
| No `:has()` | Selected radio options still highlight via a JS class |
| No container queries | Diagram text falls back to pixel sizes |
| No `<dialog>` | Project links stay as normal page anchors |
| No `IntersectionObserver` | Reveal animations are skipped and all content is visible |

---

## License

Proprietary — all rights reserved by Mexa Motion.

Placeholder contact details, portfolio entries, testimonials and team profiles in this repository
are **development placeholders** and must be replaced with client-approved content before launch.