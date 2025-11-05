<?php
$activeNav = 'Home';
$homePath = '/home-1';
require __DIR__ . '/../partials/header.php';
require __DIR__ . '/../partials/sliders/hero-video.php';
?>




<!--==============================
About Area  
==============================-->
<section class="about-nova section">
  <div class="container">
    <div class="row align-items-center g-4 g-xl-5">

      <!-- IMAGEN / MÉTRICAS -->
      <div class="col-xl-6">
        <div class="about-nova__media">
          <div class="about-nova__frame">
            <img src="assets/img/normal/about_4.jpg" alt="About <?php echo htmlspecialchars($Company ?? 'Our Company'); ?>">
          </div>

          <!-- Chip de años -->
          <?php if (!empty($ExperienceYears)): ?>
            <div class="about-nova__years">
              <div class="about-nova__years-num"><?php echo (int)$ExperienceYears; ?></div>
              <div class="about-nova__years-txt">Years of<br>Experience</div>
            </div>
          <?php endif; ?>

          <!-- Sello licencia -->
          <?php if (!empty($LicenseText)): ?>
            <div class="about-nova__stamp">
              <i class="fas fa-shield-alt"></i> <?php echo htmlspecialchars($LicenseText); ?>
            </div>
          <?php endif; ?>
        </div>
      </div>

      <!-- CONTENIDO -->
      <div class="col-xl-6">
        <div class="about-nova__content">
          <span class="about-nova__eyebrow">
            <i class="fas fa-star me-2"></i> Our Company
          </span>

          <!-- Título con ícono welding -->
          <h2 class="about-nova__title">
            <img src="assets/img/icon/footer_title4.svg" alt="Welding Icon" class="about-nova__icon">
            About Us
          </h2>

          <?php if (!empty($About[0])): ?>
            <p class="about-nova__lead"><?php echo htmlspecialchars($About[0]); ?></p>
          <?php endif; ?>

          <?php if (!empty($About[1])): ?>
            <p class="about-nova__text"><?php echo htmlspecialchars($About[1]); ?></p>
          <?php endif; ?>

          <!-- Bullets -->
          <ul class="about-nova__list">
            <?php if (!empty($Estimates)): ?>
              <li><i class="fas fa-check"></i> <?php echo htmlspecialchars($Estimates); ?></li>
            <?php endif; ?>
            <?php if (!empty($Services)): ?>
              <li><i class="fas fa-check"></i> <?php echo htmlspecialchars($Services); ?></li>
            <?php endif; ?>
            <?php if (!empty($Payment)): ?>
              <li><i class="fas fa-check"></i> <?php echo htmlspecialchars($Payment); ?></li>
            <?php endif; ?>
            <?php if (!empty($Schedule)): ?>
              <li><i class="fas fa-check"></i> <?php echo htmlspecialchars($Schedule); ?></li>
            <?php endif; ?>
            <?php if (!empty($CoverageText)): ?>
              <li><i class="fas fa-check"></i> <?php echo htmlspecialchars($CoverageText); ?></li>
            <?php endif; ?>
          </ul>

          <!-- CTA -->
          <div class="about-nova__cta">
            <a href="about.php" class="btn-quote-nova">
              Discover More <i class="fas fa-arrow-right ms-2"></i>
            </a>
            <?php if (!empty($PhoneRef) && !empty($Phone)): ?>
              <a href="<?php echo htmlspecialchars($PhoneRef); ?>" class="call-pill-nova">
                <i class="fas fa-phone-volume me-2"></i><?php echo htmlspecialchars($Phone); ?>
              </a>
            <?php endif; ?>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<style>
  /* Icono welding en título About */
  .about-nova__title {
    display: flex;
    align-items: center;
    gap: 10px;
    /* espacio entre icono y texto */
  }

  .about-nova__title .about-nova__icon {
    width: 32px;
    /* tamaño pequeño */
    height: auto;
    flex-shrink: 0;
  }
</style>
<!--==============================
Why Choose Us
==============================-->
<section class="why-nova section" id="why-sec">
  <style>
    .why-nova {
      background: #00265A;
      padding: clamp(60px, 7vw, 100px) 0;
    }

    .why-nova__head {
      text-align: center;
      margin-bottom: clamp(30px, 5vw, 60px);
      color: #fff;
    }

    .why-nova__head .eyebrow {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      font: 700 .9rem/1 var(--body-font, Inter);
      color: #00C2F2;
      text-transform: uppercase;
      letter-spacing: .05em;
    }

    .why-nova__head .title {
      font: 800 clamp(26px, 5vw, 40px)/1.2 var(--title-font, Exo);
      color: #fff;
      margin-top: 10px;
    }

    /* Grid */
    .why-nova__grid {
      display: grid;
      gap: 24px;
      grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
    }

    /* Cards */
    .why-card {
      background: rgba(255, 255, 255, 0.05);
      border: 1px solid rgba(255, 255, 255, 0.2);
      border-radius: 14px;
      padding: 30px 20px;
      text-align: center;
      transition: all .3s ease;
      transform: translateY(20px);
      opacity: 0;
      animation: fadeUp .8s ease forwards;
      color: #fff;
    }

    .why-card:hover {
      background: #00C2F2;
      color: #00265A;
      transform: translateY(-6px);
      box-shadow: 0 8px 20px rgba(0, 0, 0, .25);
    }

    .why-card__icon {
      width: 70px;
      height: 70px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 16px;
      background: #00C2F2;
      color: #00265A;
      font-size: 1.8rem;
      transition: all .3s ease;
    }

    .why-card:hover .why-card__icon {
      background: #00265A;
      color: #fff;
      transform: scale(1.1) rotate(6deg);
    }

    .why-card__title {
      font: 700 1.1rem/1.3 var(--title-font, Exo);
      margin-bottom: 8px;
      color: #fff;
    }

    .why-card__text {
      font: 400 .95rem/1.5 var(--body-font, Inter);
      color: #f1f1f1;
    }

    .why-card:hover .why-card__title,
    .why-card:hover .why-card__text {
      color: #00265A;
    }

    @keyframes fadeUp {
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>

  <div class="container">
    <!-- Encabezado -->
    <div class="why-nova__head">
      <span class="eyebrow"><i class="fa-solid fa-check-circle"></i> Why Choose Us</span>
      <h2 class="title">Why Choose <?= htmlspecialchars($Company ?? 'Our Company') ?></h2>
    </div>

    <!-- Grid -->
    <div class="why-nova__grid">
      <?php if (!empty($LicenseText)) : ?>
        <div class="why-card" style="animation-delay:.1s">
          <div class="why-card__icon"><i class="fa-solid fa-certificate"></i></div>
          <h3 class="why-card__title"><?= htmlspecialchars($LicenseText) ?></h3>
          <p class="why-card__text">Professional, certified and fully insured services for your peace of mind.</p>
        </div>
      <?php endif; ?>

      <?php if (!empty($Estimates)) : ?>
        <div class="why-card" style="animation-delay:.2s">
          <div class="why-card__icon"><i class="fa-solid fa-hand-holding-dollar"></i></div>
          <h3 class="why-card__title"><?= htmlspecialchars($Estimates) ?></h3>
          <p class="why-card__text">Transparent pricing and detailed quotes before starting any project.</p>
        </div>
      <?php endif; ?>

      <?php if (!empty($ExperienceYears)) : ?>
        <div class="why-card" style="animation-delay:.3s">
          <div class="why-card__icon"><i class="fa-solid fa-screwdriver-wrench"></i></div>
          <h3 class="why-card__title"><?= $ExperienceYears ?>+ Years Experience</h3>
          <p class="why-card__text">Expert craftsmanship in welding, fabrication and repair work.</p>
        </div>
      <?php endif; ?>

      <?php if (!empty($BilingualNote)) : ?>
        <div class="why-card" style="animation-delay:.4s">
          <div class="why-card__icon"><i class="fa-solid fa-headset"></i></div>
          <h3 class="why-card__title"><?= htmlspecialchars($BilingualNote) ?></h3>
          <p class="why-card__text">Atendemos en inglés y español para mayor comodidad.</p>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>

<!--==============================
Service Area  
==============================-->
<section class="section service-nova" id="service-sec">
  <div class="container">
    <!-- Encabezado -->
    <div class="service-nova__head">
      <div>
        <span class="eyebrow"><i class="fas fa-star me-2"></i> What we do</span>
        <h2 class="title">Our Services</h2>
      </div>
      <div>
        <a href="services.php" class="btn-ghost">
          View All Services <i class="fas fa-arrow-right ms-2"></i>
        </a>
      </div>
    </div>

    <!-- Grid -->
    <div class="service-nova__grid">
      <?php for ($i = 1; $i <= 4; $i++) {
        $txt = !empty($ExSD[$i]) ? $ExSD[$i] : (!empty($SD[$i]) ? $SD[$i] : '');
      ?>
        <article class="service-card">
          <figure class="service-card__media">
            <img src="assets/img/service/<?php echo $i; ?>.jpg" alt="<?php echo htmlspecialchars($SN[$i] ?? 'Service', ENT_QUOTES); ?>">
            <span class="service-card__badge">0<?php echo $i; ?></span>
            <span class="service-card__shade"></span>
          </figure>
          <div class="service-card__body">
            <h3 class="service-card__title fade-text">
              <!-- Icono welding en el título -->
              <img src="assets/img/icon/footer_title4.svg" alt="Service Icon <?php echo $i; ?>" class="service-card__icon">
              <a href="services.php"><?php echo htmlspecialchars($SN[$i] ?? 'Service'); ?></a>
            </h3>
            <p class="service-card__text fade-text"><?php echo $txt; ?></p>
            <a class="service-card__link fade-text" href="services.php" aria-label="Read more about <?php echo htmlspecialchars($SN[$i] ?? 'Service', ENT_QUOTES); ?>">
              Learn more <i class="fas fa-arrow-right ms-1"></i>
            </a>
          </div>
        </article>
      <?php } ?>
    </div>
  </div>
</section>

<style>
  /* ===== ICONO EN TÍTULO ===== */
  .service-card__title {
    display: flex;
    align-items: center;
    gap: 10px;
    /* espacio entre icono y texto */
    font-weight: 700;
  }

  .service-card__icon {
    width: 28px;
    height: auto;
    animation: floatIcon 3s ease-in-out infinite;
    flex-shrink: 0;
  }

  /* ===== ANIMACIÓN FLOTANTE ===== */
  @keyframes floatIcon {

    0%,
    100% {
      transform: translateY(0);
    }

    50% {
      transform: translateY(-6px);
    }
  }

  /* ===== TEXTOS (fade + slide) ===== */
  .fade-text {
    opacity: 0;
    transform: translateY(20px);
    animation: fadeInUp 1s ease forwards;
  }

  .service-card:nth-child(1) .fade-text {
    animation-delay: 0.3s;
  }

  .service-card:nth-child(2) .fade-text {
    animation-delay: 0.5s;
  }

  .service-card:nth-child(3) .fade-text {
    animation-delay: 0.7s;
  }

  .service-card:nth-child(4) .fade-text {
    animation-delay: 0.9s;
  }

  @keyframes fadeInUp {
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }
</style>



<style>
  @keyframes pulseCta {

    0%,
    100% {
      transform: scale(1);
      opacity: 0.15;
    }

    50% {
      transform: scale(1.2);
      opacity: 0.25;
    }
  }

  .cta-strong a:hover {
    transform: translateY(-3px) scale(1.03);
  }
</style>
<!--==============================
Gallery Preview (Videos)  
==============================-->
<section class="gallery-nova section" id="gallery-sec">
  <style>
    .gallery-nova {
      background: var(--smoke-color, #F8F9FA);
      padding: clamp(60px, 7vw, 100px) 0;
    }

    .gallery-nova__head {
      text-align: center;
      margin-bottom: clamp(30px, 5vw, 60px);
    }

    .gallery-nova__head .eyebrow {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      font: 700 .9rem/1 var(--body-font, Inter);
      color: var(--brand-1, #00C2F2);
      text-transform: uppercase;
      letter-spacing: .05em;
    }

    .gallery-nova__head .title {
      font: 800 clamp(26px, 5vw, 40px)/1.2 var(--title-font, Exo);
      color: var(--title-color, #00265A);
      margin-top: 10px;
    }

    /* Grid */
    .gallery-nova__grid {
      display: grid;
      gap: 20px;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    }

    /* Cards de video */
    .gallery-card {
      position: relative;
      border-radius: 14px;
      overflow: hidden;
      box-shadow: 0 6px 18px rgba(0, 0, 0, .1);
      transform: translateY(30px);
      opacity: 0;
      animation: fadeUp 1s ease forwards;
    }

    .gallery-card video {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block;
      background: #000;
    }

    /* Overlay play icon */
    .gallery-card::after {
      content: "\f04b";
      /* fa-play */
      font-family: "Font Awesome 6 Free";
      font-weight: 900;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      font-size: 2rem;
      color: rgba(255, 255, 255, .85);
      pointer-events: none;
      transition: transform .3s ease, opacity .3s ease;
      opacity: 0;
    }

    .gallery-card:hover::after {
      opacity: 1;
      transform: translate(-50%, -50%) scale(1.2);
    }

    /* Animación */
    @keyframes fadeUp {
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>

  <div class="container">
    <!-- Encabezado -->
    <div class="gallery-nova__head">
      <span class="eyebrow"><i class="fas fa-video me-1"></i> Our Work</span>
      <h2 class="title">Project Highlights</h2>
    </div>

    <!-- Grid Videos -->
    <div class="gallery-nova__grid">
      <?php for ($i = 1; $i <= 3; $i++): ?>
        <div class="gallery-card" style="animation-delay:<?= ($i * 0.2) ?>s">
          <video
            src="assets/img/videos/gallery_<?= $i ?>.mp4"
            autoplay muted loop playsinline
            preload="none" loading="lazy">
          </video>
        </div>
      <?php endfor; ?>
    </div>
  </div>
</section>
<!--==============================
Mission & Vision
==============================-->
<section class="mission-nova section" id="mission-sec">
  <style>
    .mission-nova {
      background: var(--smoke-color, #F8F9FA);
      padding: clamp(60px, 7vw, 100px) 0;
    }

    .mission-nova__head {
      text-align: center;
      margin-bottom: clamp(30px, 5vw, 60px);
    }

    .mission-nova__head .eyebrow {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      font: 700 .9rem/1 var(--body-font, Inter);
      color: var(--brand-1, #00C2F2);
      text-transform: uppercase;
      letter-spacing: .05em;
    }

    .mission-nova__head .title {
      font: 800 clamp(26px, 5vw, 40px)/1.2 var(--title-font, Exo);
      color: var(--title-color, #00265A);
      margin-top: 10px;
    }

    /* Grid */
    .mission-nova__grid {
      display: grid;
      gap: 24px;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      max-width: 1100px;
      margin: 0 auto;
    }

    /* Cards */
    .mission-card {
      background: #fff;
      border: 1px solid var(--th-border-color, #E5E7EB);
      border-radius: 14px;
      padding: 30px 25px;
      text-align: center;
      box-shadow: 0 6px 14px rgba(0, 0, 0, .08);
      transform: translateY(20px);
      opacity: 0;
      animation: fadeUp .8s ease forwards, float 4s ease-in-out infinite;
    }

    .mission-card__icon {
      width: 70px;
      height: 70px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 18px;
      background: #00265A;
      color: #fff;
      font-size: 1.8rem;
      transition: .3s;
    }

    .mission-card:hover .mission-card__icon {
      background: var(--brand-1, #00C2F2);
      color: var(--brand-2, #00265A);
      transform: scale(1.1) rotate(6deg);
    }

    .mission-card__title {
      font: 700 1.3rem/1.3 var(--title-font, Exo);
      margin-bottom: 12px;
      color: var(--title-color, #00265A);
    }

    .mission-card__text {
      font: 400 .95rem/1.6 var(--body-font, Inter);
      color: var(--body-color, #333);
    }

    /* Animaciones */
    @keyframes fadeUp {
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @keyframes float {

      0%,
      100% {
        transform: translateY(0);
      }

      50% {
        transform: translateY(-8px);
      }
    }
  </style>

  <div class="container">
    <!-- Encabezado -->
    <div class="mission-nova__head">
      <span class="eyebrow"><i class="fa-solid fa-star me-1"></i> Who We Are</span>
      <h2 class="title">Our Mission & Vision</h2>
    </div>

    <!-- Grid -->
    <div class="mission-nova__grid">
      <div class="mission-card" style="animation-delay:.1s">
        <div class="mission-card__icon"><i class="fa-solid fa-bullseye"></i></div>
        <h3 class="mission-card__title">Our Mission</h3>
        <p class="mission-card__text">
          <?= $Mission ?? "Deliver high-quality welding and metal services with precision, safety and customer satisfaction as our top priorities." ?>
        </p>
      </div>
      <div class="mission-card" style="animation-delay:.3s">
        <div class="mission-card__icon"><i class="fa-solid fa-eye"></i></div>
        <h3 class="mission-card__title">Our Vision</h3>
        <p class="mission-card__text">
          <?= $Vision ?? "Be recognized as the leading welding company in our region, innovating with modern techniques while keeping trust and excellence." ?>
        </p>
      </div>
    </div>
  </div>
</section>



<!-- ===================== REVIEWS SECTION (2 columnas, autoplay infinito) ===================== -->

<section id="reviews-sec" class="reviews-min section" aria-labelledby="reviewsTitle">
  <style>
    .reviews-min {
      background: var(--bg, #fff);
      padding-block: clamp(48px, 7vw, 96px);
    }

    .reviews-min__head {
      display: flex;
      flex-wrap: wrap;
      align-items: flex-end;
      justify-content: space-between;
      gap: 16px;
      margin-bottom: 20px;
      animation: fadeInUp 0.8s ease both;
    }

    .reviews-min .eyebrow {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      padding: 6px 12px;
      border-radius: 999px;
      background: var(--smoke-color2, #F1F5F9);
      color: var(--txt-1, #0D0D0D);
      font: 700 .9rem/1 var(--body-font, Inter);
      animation: fadeIn 1s ease both;
    }

    .reviews-min .title {
      margin: .5rem 0 0;
      font: 900 clamp(22px, 3vw, 30px)/1.15 var(--title-font, Exo);
      color: var(--title-color, #000);
      animation: slideInLeft 1s ease both;
    }

    .reviews-min .lead {
      margin: .25rem 0 0;
      color: var(--body-color, #333);
      animation: fadeIn 1.2s ease both;
    }

    /* Cards */
    .rvw {
      background: #fff;
      border: 1px solid var(--th-border-color, #E5E7EB);
      border-radius: 14px;
      box-shadow: 0 6px 16px rgba(0, 0, 0, .06);
      padding: 14px;
      display: flex;
      flex-direction: column;
      gap: 8px;
      min-height: 180px;
      margin: 10px;
      opacity: 0;
      transform: translateY(30px);
      animation: fadeUpCard 0.8s ease forwards;
    }

    .swiper-slide:nth-child(1) .rvw {
      animation-delay: 0.2s;
    }

    .swiper-slide:nth-child(2) .rvw {
      animation-delay: 0.4s;
    }

    .swiper-slide:nth-child(3) .rvw {
      animation-delay: 0.6s;
    }

    .swiper-slide:nth-child(4) .rvw {
      animation-delay: 0.8s;
    }

    .swiper-slide:nth-child(5) .rvw {
      animation-delay: 1s;
    }

    .rvw__head {
      display: grid;
      grid-template-columns: auto 1fr auto;
      gap: 6px;
      align-items: center
    }

    .rvw__avatar {
      width: 32px;
      height: 32px;
      border-radius: 50%;
      display: grid;
      place-items: center;
      background: var(--brand-3, #FFFFFF);
      border: 1px solid var(--th-border-color, #E5E7EB);
      font: 800 .85rem/1 var(--body-font, Inter);
      color: var(--brand-2, #000)
    }

    .rvw__name {
      font: 700 .95rem/1.1 var(--body-font, Inter);
      color: var(--title-color, #000)
    }

    .rvw__meta {
      grid-column: 2/span 1;
      color: var(--gray-color, #9CA3AF);
      font-size: .78rem
    }

    .rvw__stars {
      display: inline-flex;
      gap: 2px
    }

    .rvw__stars svg {
      width: 14px;
      height: 14px;
      fill: var(--brand-1, #D93030)
    }

    .rvw__text {
      margin: 2px 0 0;
      color: var(--body-color, #333);
      font-size: .9rem;
    }

    /* Swiper ajustes */
    .reviews-swiper {
      padding-bottom: 40px
    }

    .swiper-pagination-bullet {
      background: #000;
      opacity: .3
    }

    .swiper-pagination-bullet-active {
      background: var(--brand-1, #D93030);
      opacity: 1
    }

    /* Botón */
    .btn-secondary {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      padding: 12px 22px;
      border-radius: 999px;
      border: 2px solid var(--brand-2, #0F172A);
      text-decoration: none;
      font: 700 0.95rem/1 var(--body-font, Inter, sans-serif);
      color: var(--brand-2, #0F172A);
      background: #fff;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.06);
      transition: all 0.3s ease;
      animation: fadeInUp 1s ease both;
      animation-delay: 1s;
    }

    .btn-secondary:hover {
      background: var(--brand-2, #0F172A);
      color: #fff;
      box-shadow: 0 6px 14px rgba(0, 0, 0, 0.1);
      transform: translateY(-2px);
    }

    /* Animaciones */
    @keyframes fadeUpCard {
      from {
        opacity: 0;
        transform: translateY(30px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(20px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @keyframes slideInLeft {
      from {
        opacity: 0;
        transform: translateX(-40px);
      }

      to {
        opacity: 1;
        transform: translateX(0);
      }
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
      }

      to {
        opacity: 1;
      }
    }
  </style>

  <?php
  // Fuente del enlace a Google
  $google_reviews_url = $google ?? ($links['google_share'] ?? '#');

  // === Google Reviews reales de F.S.C Mobile Welding ===
  $reviews = [
    [
      "name"  => "Shawn Spivak",
      "meta"  => "1 review · 8 photos",
      "when"  => "3 months ago",
      "rating" => 5,
      "text"  => "We called F.S.C. Welding for help with a repair. Francisco asked for a couple of pictures so he could fairly assess the job and within an hour he was onsite helping us with the repair. He even cut up a damaged piece of steel and hauled it away. Excellent, fast and professional service!"
    ],
    [
      "name"  => "Kenneth Johnson",
      "meta"  => "2 reviews · 3 photos",
      "when"  => "a month ago",
      "rating" => 5,
      "text"  => "Welded my cracked steel-backed Zero-turn seat. Now I can mow sitting upright again. It only took about twenty minutes. Looks great! Thanks!!!"
    ],
    [
      "name"  => "Artez Henderson",
      "meta"  => "7 reviews · 2 photos",
      "when"  => "3 months ago",
      "rating" => 5,
      "text"  => "Isaac was really helpful with my tailgate strut repairs. Very professional and knowledgeable of his craft. Fixed my van’s trunk in an impressive amount of time!"
    ],
    [
      "name"  => "Felicia Lee",
      "meta"  => "7 reviews · 2 photos",
      "when"  => "3 months ago",
      "rating" => 5,
      "text"  => "Figueroa Welding was very professional and offered a reasonable cost! Please go check him out — and he’s mobile too!"
    ],
    [
      "name"  => "Ruben Guardado",
      "meta"  => "1 review · 2 photos",
      "when"  => "a month ago",
      "rating" => 5,
      "text"  => "Fast, good work. He came and welded my truck on the drop of a dime. Highly recommend!"
    ],
    [
      "name"  => "Calvin Graves",
      "meta"  => "6 reviews",
      "when"  => "a month ago",
      "rating" => 5,
      "text"  => "Mr. Figueroa and his team are prompt and their work is great. I am very pleased and you will be too."
    ]
  ];

  $reviewCount = count($reviews);
  $avg = 5.0; // todas son 5★

  function initials($n)
  {
    $p = preg_split('/\s+/', trim($n));
    return strtoupper(mb_substr($p[0], 0, 1) . (isset($p[1]) ? mb_substr($p[1], 0, 1) : ''));
  }
  function stars($n = 5)
  {
    $s = '';
    for ($i = 1; $i <= 5; $i++) {
      $s .= '<svg viewBox="0 0 20 20" aria-hidden="true"><path d="M10 1.5l2.6 5.3 5.9.9-4.2 4.2 1 5.8L10 15.8 4.7 17.7l1-5.8L1.5 7.7l5.9-.9L10 1.5z"/></svg>';
    }
    return $s;
  }
  ?>

  <div class="container">
    <!-- Encabezado -->
    <div class="reviews-min__head">
      <div>
        <span class="eyebrow"><i class="fas fa-star"></i> What people say</span>
        <h2 id="reviewsTitle" class="title">5-Star Reviews for <?= htmlspecialchars($Company ?? '', ENT_QUOTES) ?></h2>
        <p class="lead">Real experiences from customers who trusted us.</p>
      </div>
      <a class="rating-pill" href="<?= htmlspecialchars($google_reviews_url, ENT_QUOTES) ?>" target="_blank" rel="noopener">
        ★ <?= number_format($avg, 1) ?> · <?= $reviewCount ?> Google reviews
      </a>
    </div>

    <!-- Swiper -->
    <div class="swiper reviews-swiper">
      <div class="swiper-wrapper">
        <?php foreach ($reviews as $r): ?>
          <div class="swiper-slide">
            <article class="rvw" itemscope itemtype="https://schema.org/Review">
              <header class="rvw__head">
                <span class="rvw__avatar"><?= initials($r['name']) ?></span>
                <strong class="rvw__name"><?= htmlspecialchars($r['name']) ?></strong>
                <span class="rvw__stars"><?= stars($r['rating']) ?></span>
                <span class="rvw__meta"><?= htmlspecialchars($r['meta'] . ' · ' . $r['when']) ?></span>
              </header>
              <p class="rvw__text"><?= htmlspecialchars($r['text']) ?></p>
            </article>
          </div>
        <?php endforeach; ?>
      </div>
      <!-- Paginación -->
      <div class="swiper-pagination"></div>
    </div>

    <!-- CTA -->
    <div class="reviews-min__foot" style="text-align:center;margin-top:20px;">
      <a
        href="<?= htmlspecialchars($google_reviews_url, ENT_QUOTES) ?>"
        target="_blank"
        rel="noopener"
        style="
      display:inline-flex;
      align-items:center;
      justify-content:center;
      gap:10px;
      padding:12px 28px;
      border-radius:999px;
      border:2px solid #00265A;
      text-decoration:none;
      font:700 0.95rem/1 'Inter', sans-serif;
      color:#00265A;
      background:#00C2F2;
      box-shadow:0 4px 10px rgba(0,0,0,0.06);
      transition:all 0.3s ease;
    "
        onmouseover="this.style.background='#00265A';this.style.color='#FFFFFF';"
        onmouseout="this.style.background='#00C2F2';this.style.color='#00265A';">
        See all reviews on Google
      </a>
    </div>

  </div>
</section>

<!-- Init Swiper -->
<script>
  document.addEventListener("DOMContentLoaded", function() {
    new Swiper(".reviews-swiper", {
      slidesPerView: 2,
      spaceBetween: 20,
      loop: true,
      autoplay: {
        delay: 2500,
        disableOnInteraction: false
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true
      },
      breakpoints: {
        0: {
          slidesPerView: 1
        },
        /* en móvil: 1 columna */
        768: {
          slidesPerView: 2
        } /* en tablet y desktop: 2 columnas */
      }
    });
  });
</script>
<!-- ==============================
CTA Fuerte
============================== -->
<section class="cta-strong" style="background:#00265A;color:#fff;padding:60px 20px;position:relative;overflow:hidden;">
  <div class="container" style="max-width:1200px;margin:0 auto;display:flex;flex-direction:column;align-items:center;text-align:center;gap:25px;">

    <!-- Título -->
    <h2 style="font:800 clamp(26px,5vw,38px)/1.2 'Exo',sans-serif;margin:0;color:#fff;text-transform:uppercase;letter-spacing:-0.5px;">
      Get Your Free Estimate Today!
    </h2>

    <!-- Subtexto -->
    <p style="max-width:720px;margin:0;font:500 1.05rem/1.6 'Inter',sans-serif;color:#00C2F2;">
      Licensed & Insured · Over <?= htmlspecialchars($Experience ?? "10 Years") ?> of Experience · Available Mon–Sat
    </p>

    <!-- Botones -->
    <div style="display:flex;flex-wrap:wrap;gap:16px;justify-content:center;margin-top:10px;">

      <!-- Teléfono -->
      <a href="<?= htmlspecialchars($PhoneRef ?? '#') ?>"
        style="display:inline-flex;align-items:center;gap:10px;padding:14px 28px;
                border-radius:50px;font:700 1rem 'Inter',sans-serif;text-decoration:none;
                background:#00C2F2;color:#00265A;transition:all .3s ease;box-shadow:0 6px 16px rgba(0,0,0,.25);">
        <i class="fas fa-phone-alt"></i> Call Now
      </a>

      <!-- WhatsApp -->
      <a href="https://wa.link/og6bs1" target="_blank" rel="noopener"
        style="display:inline-flex;align-items:center;gap:10px;padding:14px 28px;
                border-radius:50px;font:700 1rem 'Inter',sans-serif;text-decoration:none;
                background:#25D366;color:#fff;transition:all .3s ease;box-shadow:0 6px 16px rgba(0,0,0,.25);">
        <i class="fab fa-whatsapp"></i> WhatsApp
      </a>

      <!-- Email -->
      <a href="<?= htmlspecialchars($MailRef ?? '#') ?>"
        style="display:inline-flex;align-items:center;gap:10px;padding:14px 28px;
                border-radius:50px;font:700 1rem 'Inter',sans-serif;text-decoration:none;
                background:#fff;color:#00265A;border:2px solid #00C2F2;transition:all .3s ease;">
        <i class="fas fa-envelope"></i> Email Us
      </a>
    </div>
  </div>

  <!-- Decoración (círculo amarillo animado) -->
  <div style="position:absolute;bottom:-80px;right:-80px;width:200px;height:200px;background:#00C2F2;opacity:0.15;border-radius:50%;animation:pulseCta 6s ease-in-out infinite;"></div>
</section>

<!--==============================
  Find Us / Location
==============================-->
<section class="map-nova section" id="map-sec">
  <style>
    .map-nova {
      background: var(--bg, #fff);
      padding: clamp(60px, 7vw, 100px) 0;
    }

    .map-nova__head {
      text-align: center;
      margin-bottom: clamp(30px, 5vw, 60px);
    }

    .map-nova__head .eyebrow {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      font: 700 .9rem/1 var(--body-font, Inter);
      color: var(--brand-1, #00C2F2);
      text-transform: uppercase;
      letter-spacing: .05em;
    }

    .map-nova__head .title {
      font: 800 clamp(26px, 5vw, 40px)/1.2 var(--title-font, Exo);
      color: var(--title-color, #00265A);
      margin-top: 10px;
    }

    .map-nova__frame {
      border-radius: 14px;
      overflow: hidden;
      box-shadow: 0 8px 20px rgba(0, 0, 0, .15);
    }

    .map-nova iframe {
      width: 100%;
      height: 400px;
      border: 0;
    }

    @media (max-width: 768px) {
      .map-nova iframe {
        height: 300px;
      }
    }
  </style>

  <div class="container">
    <!-- Encabezado -->
    <div class="map-nova__head">
      <span class="eyebrow"><i class="fas fa-map-marker-alt"></i> Find Us</span>
      <h2 class="title">Our Location</h2>
    </div>

    <!-- Google Map -->
    <div class="map-nova__frame">
      <?= $GoogleMap ?? '<p style="text-align:center;color:#555;">Google Map not available</p>' ?>
    </div>
  </div>
</section>

<?php require __DIR__ . '/../partials/footer.php'; ?>