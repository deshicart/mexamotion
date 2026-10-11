<?php
$pageTitle = 'Our Team - Mexa Motion';
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/navbar.php';
?>
<main id="main-content" role="main">
  <!-- Page Header -->
  <header class="page-header">
    <div class="container">
      <span class="section-tag reveal">Meet the Crew</span>
      <h1 class="page-header__title reveal">The Talent Behind the Motion</h1>
      <p class="page-header__desc reveal">A diverse team of editors, animators, designers, and strategists united by a passion for visual storytelling.</p>
    </div>
  </header>

  <!-- Leadership Team -->
  <section class="section" aria-labelledby="leadership-title">
    <div class="container">
      <header class="section-header reveal">
        <span class="section-tag">Leadership</span>
        <h2 id="leadership-title" class="section-title">Creative Leads</h2>
      </header>
      <div class="team-grid">
        <!-- Team Member 1: Founder/Creative Director -->
        <article class="team-card reveal" role="listitem">
          <div class="team-card__image">
            <img src="/assets/images/team/member-1.jpg" alt="Ahmed Rahman - Founder & Creative Director" loading="lazy" width="400" height="400">
          </div>
          <div class="team-card__content">
            <h3 class="team-card__name">Ahmed Rahman</h3>
            <p class="team-card__role">Founder & Creative Director</p>
            <div class="team-card__social">
              <a href="https://linkedin.com" target="_blank" rel="noopener noreferrer" aria-label="Ahmed Rahman on LinkedIn">
                <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
              </a>
              <a href="https://behance.net" target="_blank" rel="noopener noreferrer" aria-label="Ahmed Rahman on Behance">
                <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M21.219 0H2.781C1.245 0 0 1.215 0 2.721v18.558C0 22.785 1.245 24 2.781 24h18.438c1.536 0 2.781-1.215 2.781-2.721V2.721C24 1.215 22.755 0 21.219 0zM11.864 19.883H7.763V12.85h4.101v7.033zm0-8.682H7.763V4.127h4.101v7.074zm6.757 8.682h-4.102v-2.745c0-1.525-.542-2.67-1.706-2.67-.988 0-1.582.74-1.582 1.984v2.909h-4.102V4.127h4.102v3.792c.542-1.05 1.582-2.126 3.578-2.126 2.745 0 4.556 1.868 4.556 5.337v3.346z"/></svg>
              </a>
            </div>
            <p class="team-card__bio">15+ years in creative direction. Former agency ECD. Built Mexa Motion from a laptop in a coffee shop to a global studio. Obsessed with storytelling that sells.</p>
          </div>
        </article>

        <!-- Team Member 2: Head of Motion -->
        <article class="team-card reveal" role="listitem">
          <div class="team-card__image">
            <img src="/assets/images/team/member-2.jpg" alt="Priya Sharma - Head of Motion Design" loading="lazy" width="400" height="400">
          </div>
          <div class="team-card__content">
            <h3 class="team-card__name">Priya Sharma</h3>
            <p class="team-card__role">Head of Motion Design</p>
            <div class="team-card__social">
              <a href="https://linkedin.com" target="_blank" rel="noopener noreferrer" aria-label="Priya Sharma on LinkedIn">
                <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
              </a>
              <a href="https://dribbble.com" target="_blank" rel="noopener noreferrer" aria-label="Priya Sharma on Dribbble">
                <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm6.07 17.875c-.198.11-.415.2-.65.273-.964.298-2.491 1.278-3.329 1.278-1.07 0-1.792-.242-2.555-.594-.076-.028-.17-.058-.245-.104-.12-.07-.422-.28-.868-.28-.445 0-.747.21-.867.28a1.32 1.32 0 00-.245.103c-.764.352-1.485.594-2.555.594-.838 0-2.365-.98-3.33-1.278-.235-.073-.452-.163-.65-.273-.41-.184-.942-.893-1.114-1.406-.056-.17-.084-.343-.084-.522 0-.267.087-.517.198-.675.317-.42.764-.724 1.214-.877.47-.162 1.48-.307 2.34-.29.076 0 .14.014.215.028.105.014 1.262.21 2.34.29.45.153.897.457 1.214.877.11.158.198.408.198.675 0 .178-.027.35-.083.521-.173.513-.704 1.222-1.114 1.405zm.098-3.82c-.282-.126-.593-.238-.933-.336-.694-.196-1.687-.434-2.45-.575-.55-.1-.65-.126-.755-.126-.11 0-.21.027-.294.126-.764.14-1.757.378-2.45.575-.34.098-.65.21-.933.336-.646.252-1.057.807-1.057 1.42 0 .63.41 1.185 1.057 1.437.282.126.592.238.933.336.693.196 1.687.434 2.45.575.55.1 1.006.126 1.09.126.084 0 .185-.026.295-.126.763-.14 1.756-.378 2.45-.575.34-.098.65-.21.932-.336.646-.252 1.056-.807 1.056-1.437 0-.63-.41-1.185-1.056-1.437z"/></svg>
              </a>
            </div>
            <p class="team-card__bio">Award-winning motion designer. After Effects & Cinema 4D specialist. Leads our animation pipeline. Believes every keyframe tells a story.</p>
          </div>
        </article>

        <!-- Team Member 3: Head of Video Production -->
        <article class="team-card reveal" role="listitem">
          <div class="team-card__image">
            <img src="/assets/images/team/member-3.jpg" alt="Karim Hassan - Head of Video Production" loading="lazy" width="400" height="400">
          </div>
          <div class="team-card__content">
            <h3 class="team-card__name">Karim Hassan</h3>
            <p class="team-card__role">Head of Video Production</p>
            <div class="team-card__social">
              <a href="https://linkedin.com" target="_blank" rel="noopener noreferrer" aria-label="Karim Hassan on LinkedIn">
                <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
              </a>
            </div>
            <p class="team-card__bio">Former broadcast TV editor. Premiere Pro & DaVinci Resolve expert. Manages all video production workflows. Color grading perfectionist.</p>
          </div>
        </article>
      </div>
    </div>
  </section>

  <!-- Core Team -->
  <section class="section" style="background: var(--color-bg-layer);" aria-labelledby="core-team-title">
    <div class="container">
      <header class="section-header reveal">
        <span class="section-tag">Core Team</span>
        <h2 id="core-team-title" class="section-title">Senior Specialists</h2>
      </header>
      <div class="team-grid">
        <!-- Team Member 4: Senior Video Editor -->
        <article class="team-card reveal" role="listitem">
          <div class="team-card__image">
            <img src="/assets/images/team/member-4.jpg" alt="Fatima Akter - Senior Video Editor" loading="lazy" width="400" height="400">
          </div>
          <div class="team-card__content">
            <h3 class="team-card__name">Fatima Akter</h3>
            <p class="team-card__role">Senior Video Editor</p>
            <div class="team-card__social">
              <a href="https://linkedin.com" target="_blank" rel="noopener noreferrer" aria-label="Fatima Akter on LinkedIn">
                <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
              </a>
            </div>
            <p class="team-card__bio">YouTube & social media editing specialist. Retention editing master. 200+ videos edited for top creators.</p>
          </div>
        </article>

        <!-- Team Member 5: Motion Designer -->
        <article class="team-card reveal" role="listitem">
          <div class="team-card__image">
            <img src="/assets/images/team/member-5.jpg" alt="Tanvir Islam - Motion Designer" loading="lazy" width="400" height="400">
          </div>
          <div class="team-card__content">
            <h3 class="team-card__name">Tanvir Islam</h3>
            <p class="team-card__role">Motion Designer</p>
            <div class="team-card__social">
              <a href="https://linkedin.com" target="_blank" rel="noopener noreferrer" aria-label="Tanvir Islam on LinkedIn">
                <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
              </a>
              <a href="https://behance.net" target="_blank" rel="noopener noreferrer" aria-label="Tanvir Islam on Behance">
                <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M21.219 0H2.781C1.245 0 0 1.215 0 2.721v18.558C0 22.785 1.245 24 2.781 24h18.438c1.536 0 2.781-1.215 2.781-2.721V2.721C24 1.215 22.755 0 21.219 0zM11.864 19.883H7.763V12.85h4.101v7.033zm0-8.682H7.763V4.127h4.101v7.074zm6.757 8.682h-4.102v-2.745c0-1.525-.542-2.67-1.706-2.67-.988 0-1.582.74-1.582 1.984v2.909h-4.102V4.127h4.102v3.792c.542-1.05 1.582-2.126 3.578-2.126 2.745 0 4.556 1.868 4.556 5.337v3.346z"/></svg>
              </a>
            </div>
            <p class="team-card__bio">2D/3D animation generalist. Blender & After Effects. Explainer videos & UI animation specialist.</p>
          </div>
        </article>

        <!-- Team Member 6: Thumbnail Designer -->
        <article class="team-card reveal" role="listitem">
          <div class="team-card__image">
            <img src="/assets/images/team/member-6.jpg" alt="Nusrat Jahan - Lead Thumbnail Designer" loading="lazy" width="400" height="400">
          </div>
          <div class="team-card__content">
            <h3 class="team-card__name">Nusrat Jahan</h3>
            <p class="team-card__role">Lead Thumbnail Designer</p>
            <div class="team-card__social">
              <a href="https://linkedin.com" target="_blank" rel="noopener noreferrer" aria-label="Nusrat Jahan on LinkedIn">
                <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
              </a>
              <a href="https://dribbble.com" target="_blank" rel="noopener noreferrer" aria-label="Nusrat Jahan on Dribbble">
                <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm6.07 17.875c-.198.11-.415.2-.65.273-.964.298-2.491 1.278-3.329 1.278-1.07 0-1.792-.242-2.555-.594-.076-.028-.17-.058-.245-.104-.12-.07-.422-.28-.868-.28-.445 0-.747.21-.867.28a1.32 1.32 0 00-.245.103c-.764.352-1.485.594-2.555.594-.838 0-2.365-.98-3.33-1.278-.235-.073-.452-.163-.65-.273-.41-.184-.942-.893-1.114-1.406-.056-.17-.084-.343-.084-.522 0-.267.087-.517.198-.675.317-.42.764-.724 1.214-.877.47-.162 1.48-.307 2.34-.29.076 0 .14.014.215.028.105.014 1.262.21 2.34.29.45.153.897.457 1.214.877.11.158.198.408.198.675 0 .178-.027.35-.083.521-.173.513-.704 1.222-1.114 1.405zm.098-3.82c-.282-.126-.593-.238-.933-.336-.694-.196-1.687-.434-2.45-.575-.55-.1-.65-.126-.755-.126-.11 0-.21.027-.294.126-.764.14-1.757.378-2.45.575-.34.098-.65.21-.933.336-.646.252-1.057.807-1.057 1.42 0 .63.41 1.185 1.057 1.437.282.126.592.238.933.336.693.196 1.687.434 2.45.575.55.1 1.006.126 1.09.126.084 0 .185-.026.295-.126.763-.14 1.756-.378 2.45-.575.34-.098.65-.21.932-.336.646-.252 1.056-.807 1.056-1.437 0-.63-.41-1.185-1.056-1.437z"/></svg>
              </a>
            </div>
            <p class="team-card__bio">CTR optimization expert. Photoshop & Figma wizard. Designs thumbnails that stop the scroll. 10%+ average CTR.</p>
          </div>
        </article>

        <!-- Team Member 7: Social Media Video Editor -->
        <article class="team-card reveal" role="listitem">
          <div class="team-card__image">
            <img src="/assets/images/team/member-7.jpg" alt="Rakib Ahmed - Social Media Video Editor" loading="lazy" width="400" height="400">
          </div>
          <div class="team-card__content">
            <h3 class="team-card__name">Rakib Ahmed</h3>
            <p class="team-card__role">Social Media Video Editor</p>
            <div class="team-card__social">
              <a href="https://linkedin.com" target="_blank" rel="noopener noreferrer" aria-label="Rakib Ahmed on LinkedIn">
                <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
              </a>
            </div>
            <p class="team-card__bio">Reels, TikTok, Shorts specialist. Hook-first editing. Platform-native creative for DTC brands.</p>
          </div>
        </article>

        <!-- Team Member 8: 3D Artist -->
        <article class="team-card reveal" role="listitem">
          <div class="team-card__image">
            <img src="/assets/images/team/member-8.jpg" alt="Mehedi Hasan - 3D Artist & Product Visualizer" loading="lazy" width="400" height="400">
          </div>
          <div class="team-card__content">
            <h3 class="team-card__name">Mehedi Hasan</h3>
            <p class="team-card__role">3D Artist & Product Visualizer</p>
            <div class="team-card__social">
              <a href="https://linkedin.com" target="_blank" rel="noopener noreferrer" aria-label="Mehedi Hasan on LinkedIn">
                <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
              </a>
              <a href="https://behance.net" target="_blank" rel="noopener noreferrer" aria-label="Mehedi Hasan on Behance">
                <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M21.219 0H2.781C1.245 0 0 1.215 0 2.721v18.558C0 22.785 1.245 24 2.781 24h18.438c1.536 0 2.781-1.215 2.781-2.721V2.721C24 1.215 22.755 0 21.219 0zM11.864 19.883H7.763V12.85h4.101v7.033zm0-8.682H7.763V4.127h4.101v7.074zm6.757 8.682h-4.102v-2.745c0-1.525-.542-2.67-1.706-2.67-.988 0-1.582.74-1.582 1.984v2.909h-4.102V4.127h4.102v3.792c.542-1.05 1.582-2.126 3.578-2.126 2.745 0 4.556 1.868 4.556 5.337v3.346z"/></svg>
              </a>
            </div>
            <p class="team-card__bio">Blender, Cinema 4D, KeyShot expert. Product 360s, AR-ready models, photorealistic renders.</p>
          </div>
        </article>

        <!-- Team Member 9: Producer -->
        <article class="team-card reveal" role="listitem">
          <div class="team-card__image">
            <img src="/assets/images/team/member-9.jpg" alt="Sadia Sultana - Producer & Client Success" loading="lazy" width="400" height="400">
          </div>
          <div class="team-card__content">
            <h3 class="team-card__name">Sadia Sultana</h3>
            <p class="team-card__role">Producer & Client Success</p>
            <div class="team-card__social">
              <a href="https://linkedin.com" target="_blank" rel="noopener noreferrer" aria-label="Sadia Sultana on LinkedIn">
                <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
              </a>
            </div>
            <p class="team-card__bio">Your main point of contact. Project management, timeline coordination, and quality assurance. Fluent in English, Bengali, Hindi.</p>
          </div>
        </article>
      </div>
    </div>
  </section>

  <!-- Join Us CTA -->
  <section class="section" aria-labelledby="join-title">
    <div class="container">
      <div style="text-align: center; max-width: 640px; margin: 0 auto;" class="reveal">
        <h2 id="join-title" class="section-title">Want to Join the Motion?</h2>
        <p class="section-desc">We're always looking for exceptional talent — editors, animators, designers, and producers who push creative boundaries.</p>
        <a href="mailto:careers@mexamotion.com" class="btn btn-primary btn-lg" style="margin-top: var(--space-lg);">View Open Roles</a>
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