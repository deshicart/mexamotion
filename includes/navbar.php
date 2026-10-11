<header class="header" id="header" role="banner">
  <div class="container">
    <nav class="navbar" aria-label="Main navigation">
      <a href="/" class="navbar-brand" aria-label="Mexa Motion - Home">
        <svg viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
          <rect width="48" height="48" rx="12" fill="url(#logoGradient)"/>
          <path d="M24 12L36 24L24 36" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
          <defs>
            <linearGradient id="logoGradient" x1="0" y1="0" x2="48" y2="48" gradientUnits="userSpaceOnUse">
              <stop offset="0%" stop-color="#1152DF"/>
              <stop offset="100%" stop-color="#3B82F6"/>
            </linearGradient>
          </defs>
        </svg>
        <span>Mexa Motion</span>
      </a>

      <div class="navbar-menu" id="navbar-menu" role="navigation">
        <ul class="navbar-nav" role="menubar">
          <li role="none"><a href="/" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) === 'index.php' ? 'active' : ''; ?>" role="menuitem">Home</a></li>
          <li role="none"><a href="/services.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) === 'services.php' ? 'active' : ''; ?>" role="menuitem">Services</a></li>
          <li role="none"><a href="/portfolio.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) === 'portfolio.php' ? 'active' : ''; ?>" role="menuitem">Portfolio</a></li>
          <li role="none"><a href="/reviews.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) === 'reviews.php' ? 'active' : ''; ?>" role="menuitem">Reviews</a></li>
          <li role="none"><a href="/about.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) === 'about.php' ? 'active' : ''; ?>" role="menuitem">About</a></li>
          <li role="none"><a href="/team.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) === 'team.php' ? 'active' : ''; ?>" role="menuitem">Team</a></li>
        </ul>
        <div class="navbar-cta">
          <a href="#contact" class="btn btn-secondary" data-modal-trigger="booking-modal">Book a Call</a>
          <a href="#contact" class="btn btn-primary btn-lg" data-modal-trigger="booking-modal">Get Started</a>
        </div>
      </div>

      <button class="navbar-toggle" id="navbar-toggle" aria-label="Toggle navigation menu" aria-expanded="false" aria-controls="navbar-menu">
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
      </button>
    </nav>
  </div>
</header>