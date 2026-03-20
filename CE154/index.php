<!--  Student Registration Number: 2402515-->

<?php include('inc/header.php'); ?>

<main class="page-main home-main home-layout">
  <section class="home-feature-rectangle section-card">
    <div class="home-feature-image">
      <img src="images/elara_quinn.jpeg" alt="Latest artwork preview for Elara Quinn" /> 
    </div>
    <article class="home-feature-copy">
      <p class="section-kicker">Homepage Feature</p>
      <h1>Elara Quinn</h1>
      <h2>Neon Rain (Original Exhibition)</h2>
      <p>
        Elara Quinn's latest collection explores the intersection of urban decay and neon illumination. 
        Using a blend of traditional oils and digital underpainting, this series captures the frantic energy 
        of city nights.
      </p>
      <div class="hero-actions">
        <a href="merchandise-item.php?id=original-neon-rain" class="btn btn-primary">View artwork details</a>
        <a href="merchandise.php" class="btn btn-secondary">Browse all artworks</a>
      </div>
    </article>
  </section>

  <section class="home-columns">
    <article class="section-card spotlight-card">
      <div class="section-header">
        <p class="section-kicker">Artist Spotlight</p>
        <h2 class="section-title">Brief Intro</h2>
      </div>
      <p class="section-copy">
        Emerging from the vibrant London underground art scene, Elara Quinn has quickly established 
        herself as a voice for modern urbanism. Her work has been featured in over a dozen international 
        exhibitions, blending classical techniques with contemporary subjects.
      </p>
      <div class="spotlight-portrait">
        <img src="images/spotlight_portrait.jpg" alt="Portrait of artist Elara Quinn" /> 
      </div>
      <a href="about.php" class="btn btn-secondary">Read artist biography</a>
    </article>

    <div class="right-column-stack">
      <section class="section-card">
        <div class="section-header">
          <p class="section-kicker">Portfolio</p>
          <h2 class="section-title">Featured Artworks</h2>
        </div>
        <div class="home-artwork-list">
          <article class="info-card">
            <h3>Neon Rain</h3>
            <p>A towering exploration of light pollution and concrete. Mixed media on canvas capturing the pulse of the city.</p>
          </article>
          <article class="info-card">
            <h3>Borough Echo</h3>
            <p>Textured acrylic utilizing harsh geometric lines to capture the silent resonance of empty midnight streets.</p>
          </article>
          <article class="info-card">
            <h3>River Static</h3>
            <p>A study of the Thames at 3 AM, utilizing physical distressed textures and fluid color spills to create depth.</p>
          </article>
        </div>
      </section>

      <section class="section-card">
        <div class="section-header">
          <p class="section-kicker">Store</p>
          <h2 class="section-title">New Releases / Shop Preview</h2>
        </div>
        <div class="home-release-grid">
          <article class="info-card">
            <h3>Signed Print Drop</h3>
            <p>Limited edition giclee prints on 310gsm cotton rag paper. Signed and numbered by Elara Quinn.</p>
          </article>
          <article class="info-card">
            <h3>Studio Apparel</h3>
            <p>Heavyweight unisex cotton tees featuring front chest signature marks and large back prints adapted from original works.</p>
          </article>
          <article class="info-card">
            <h3>Collector Bundle</h3>
            <p>Exclusive package including a signed print, embroidered studio cap, and custom wraparound ceramic mug.</p>
          </article>
        </div>
        <div class="hero-actions">
          <a href="merchandise.php" class="btn btn-primary">Open shop</a>
        </div>
      </section>
    </div>
  </section>
</main>

<?php include('inc/footer.php'); ?>