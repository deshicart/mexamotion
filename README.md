# Mexa Motion — Official Agency Website

A high-performance, ultra-modern creative agency website built with pure PHP, HTML5, CSS3, and vanilla JavaScript. Features an interactive SVG service node flowchart, glassmorphism design system, and zero-lag performance optimization.

## 🚀 Features

### Core Features
- **Interactive Service Node Flowchart** - Custom SVG/CSS animated diagram with 7 service nodes connected to central hub via Bezier curves
- **Glassmorphism Design System** - Modern frosted glass aesthetics with backdrop filters and subtle shadows
- **Zero-Lag Performance** - Optimized for 90+ PageSpeed scores with lightweight modular architecture
- **Fully Responsive** - Mobile-first approach with breakpoints at 320px, 375px, 414px, 768px, 1024px, 1280px, 1920px
- **Accessibility First** - WCAG 2.1 AA compliant with semantic HTML, ARIA labels, focus management, and reduced motion support

### Pages
- **Home** (`index.php`) - Hero, interactive service nodes, featured portfolio, testimonials, stats
- **Services** (`services.php`) - Detailed service breakdowns, process steps, FAQ accordion
- **Portfolio** (`portfolio.php`) - Filterable grid, lightbox modal for images/videos
- **Reviews** (`reviews.php`) - Masonry grid of client reviews with video testimonials
- **About** (`about.php`) - Company story, values, statistics, journey timeline
- **Team** (`team.php`) - Team member cards with hover social reveal

### Technical Stack
- **Backend**: PHP 8.x (modular includes, no database/CMS)
- **Frontend**: HTML5, CSS3 (Custom Properties, Grid, Flexbox), Vanilla JS (ES6+)
- **Styling**: Custom CSS with design tokens, no framework dependency
- **Animations**: CSS keyframes + Intersection Observer API
- **Forms**: AJAX submission via `send-mail.php` with PHPMailer-ready structure

## 📁 Project Structure

```
mexamotion-root/
├── assets/
│   ├── css/
│   │   └── main.css              # Complete design system
│   ├── js/
│   │   ├── app.js                # Core functionality (nav, modals, forms)
│   │   └── animations.js         # Advanced animations (SVG paths, sliders, lightbox)
│   ├── images/
│   │   ├── logo/                 # Brand assets (favicon, manifest)
│   │   ├── portfolio/            # Project thumbnails (SVG placeholders)
│   │   ├── team/                 # Team member photos (SVG placeholders)
│   │   ├── about/                # Studio imagery
│   │   └── services/             # Service section images
│   └── vectors/
│       └── node-connectors.svg   # SVG path definitions
├── includes/
│   ├── header.php                # Document head + opening body
│   ├── footer.php                # Footer + toast container + scripts
│   ├── navbar.php                # Sticky navigation with mobile menu
│   └── cta-banner.php            # Reusable CTA section
├── index.php                     # Home page
├── services.php                  # Services page
├── portfolio.php                 # Portfolio page
├── reviews.php                   # Reviews page
├── about.php                     # About page
├── team.php                      # Team page
├── send-mail.php                 # AJAX form handler
├── 404.php                       # Custom 404 page
├── 500.php                       # Custom 500 page
├── .htaccess                     # Apache config (rewrites, security, caching)
├── robots.txt                    # SEO robots file
├── sitemap.xml                   # XML sitemap
├── client/                       # Client-provided brand assets
│   ├── logo.svg
│   ├── logo-white.svg
│   └── brand-guidelines.md
└── README.md
```

## 🛠️ Installation & Setup

### Requirements
- PHP 8.0+
- Apache/Nginx with mod_rewrite
- SMTP server or PHP mail() configured

### Quick Start

1. **Clone/Deploy** to your web server
2. **Configure email** in `send-mail.php`:
   ```php
   $to = 'hello@mexamotion.com'; // Change to your email
   ```
3. **Set up virtual host** pointing to project root
4. **Ensure `.htaccess` is enabled** (Apache) or configure Nginx rewrites
5. **Test contact form** - check spam folder for test emails

### Nginx Configuration
```nginx
server {
    listen 80;
    server_name mexamotion.com www.mexamotion.com;
    root /var/www/mexamotion;
    index index.php;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.2-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        include fastcgi_params;
    }

    # Deny access to sensitive files
    location ~ /(includes|send-mail\.php|\.git) {
        deny all;
    }

    # Cache static assets
    location ~* \.(jpg|jpeg|png|gif|ico|css|js|svg|woff|woff2)$ {
        expires 1y;
        add_header Cache-Control "public, immutable";
    }
}
```

## 🎨 Customization

### Colors
Edit CSS custom properties in `assets/css/main.css`:
```css
:root {
  --color-primary: #1152DF;
  --color-primary-glow: #3B82F6;
  --color-bg-light: #FFFFFF;
  --color-text-primary: #0F172A;
  /* ... */
}
```

### Services
Modify the service nodes in `index.php` (interactive section) and `services.php` (detailed pages).

### Content
All copy is inline in PHP files. For larger sites, consider adding a `content.php` data file.

## 📱 Responsive Breakpoints

| Breakpoint | Width | Layout |
|------------|-------|--------|
| Mobile Small | 320px | Single column, stacked |
| Mobile Large | 375-414px | Single column, optimized |
| Tablet | 768px | 2-column grids |
| Laptop | 1024px | Service nodes restructure |
| Desktop | 1280px | Full layout, max-width container |
| Large Desktop | 1920px | Full layout, centered |

## ♿ Accessibility Features

- Semantic HTML5 landmarks (`<header>`, `<main>`, `<section>`, `<footer>`, `<nav>`)
- Skip to main content link
- ARIA labels and roles throughout
- Focus visible states with custom outline
- Reduced motion support via `prefers-reduced-motion`
- Keyboard navigation for all interactive elements
- Color contrast ratios meeting WCAG AA
- Alt text for all images
- Form labels and error associations

## ⚡ Performance Optimizations

- **Critical CSS** inlined in header
- **Font preloading** for Google Fonts
- **Image lazy loading** with `loading="lazy"`
- **SVG icons** inline (no icon font requests)
- **Minimal JS** - only 2 small files (~15KB total)
- **No external dependencies** - zero npm packages
- **Apache caching** via `.htaccess` (1 year for assets)
- **Gzip/Deflate compression** enabled
- **Security headers** (CSP, X-Frame-Options, etc.)

## 🔧 Development

### Adding a New Page
1. Create `newpage.php` in root
2. Include `header.php` and `navbar.php`
3. Add page content
4. Include `footer.php`
5. Add to navbar in `navbar.php`
6. Update `sitemap.xml`

### Modifying Service Nodes
1. Edit the `<article class="service-node">` elements in `index.php`
2. Update `data-service` and `data-index` attributes
3. Add corresponding detailed section in `services.php`
4. SVG paths auto-calculate via JavaScript

### Form Handling
The contact form submits to `/send-mail.php` via AJAX. Response handling is in `assets/js/app.js`.

## 📧 Email Configuration

For production, replace PHP `mail()` with PHPMailer:

```php
// In send-mail.php, replace mail() call with:
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->Host = 'smtp.yourprovider.com';
$mail->SMTPAuth = true;
$mail->Username = 'your@email.com';
$mail->Password = 'yourpassword';
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;

$mail->setFrom('noreply@mexamotion.com', 'Mexa Motion Website');
$mail->addAddress('hello@mexamotion.com');
$mail->addReplyTo($email, $name);
$mail->isHTML(true);
$mail->Subject = $subject;
$mail->Body = $message;
$mail->AltBody = $plainMessage;

$mail->send();
```

## 🌐 Deployment Checklist

- [ ] Update `$to` email in `send-mail.php`
- [ ] Configure SMTP in `send-mail.php` (or install PHPMailer)
- [ ] Set up SSL certificate (Let's Encrypt recommended)
- [ ] Enable HTTPS redirect in `.htaccess`
- [ ] Configure domain DNS
- [ ] Test all forms and modals
- [ ] Verify mobile responsiveness
- [ ] Run PageSpeed Insights (target 90+)
- [ ] Test accessibility with axe/WAVE
- [ ] Submit sitemap to Google Search Console

## 📄 License

Proprietary - All rights reserved by Mexa Motion.

## 🤝 Support

For technical questions: dev@mexamotion.com
For business inquiries: hello@mexamotion.com

---

Built with ❤️ by the Mexa Motion team in Dhaka, Bangladesh 🇧🇩