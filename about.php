<?php
// ================== VARIABLES DESDE text.php ==================
$ExperienceText = $Experience ?? '';
$ExperienceYears = 0;
if (preg_match('/\d+/', (string)$ExperienceText, $m)) { 
  $ExperienceYears = (int)$m[0]; 
}
if ($ExperienceYears <= 0) { $ExperienceYears = 1; }

$CoverageText = $Coverage   ?? 'We Cover: 300 Miles';
$LicenseText  = $LicenseNote?? 'Fully Insured & Licensed';

// Misión y Visión (fallbacks si no vienen de text.php)
$Mission = $Mission ?? "To deliver fast, honest, and reliable welding services that keep our community safe and satisfied.";
$Vision  = $Vision  ?? "To be recognized as the most trusted welding company in our region.";
?>

<?php include('header2.php') ?>

<!-- ===================== ABOUT HERO ===================== -->
<div class="breadcumb-wrapper" data-bg-src="assets/img/bg/breadcumb-bg.jpg">
  <div class="container">
    <div class="breadcumb-content" data-aos="fade-down">
      <h1 class="breadcumb-title" style="color:#fff;">About Us</h1>
      <ul class="breadcumb-menu">
        <li><a href="index.php" style="color:#fff;">Home</a></li>
        <li style="color:#fff;">About Us</li>
      </ul>
    </div>
  </div>
</div>

<!-- ===================== ABOUT SECTION ===================== -->
<section class="about-nova section" id="about-sec">
  <div class="container">
    <div class="row align-items-center g-4 g-xl-5">
      <!-- Media -->
      <div class="col-xl-6" data-aos="fade-right">
        <div class="about-nova__media">
          <figure class="about-nova__frame">
            <img src="assets/img/normal/about_3.jpg" alt="About <?= htmlspecialchars($Company) ?>">
          </figure>
          <!-- Chip años -->
          <div class="about-nova__years">
            <div class="about-nova__years-num"><?= $ExperienceYears ?></div>
            <div class="about-nova__years-txt">Years of<br>Experience</div>
          </div>
          <!-- Sello licencia -->
          <div class="about-nova__stamp">
            <i class="fas fa-shield-check"></i> <?= $LicenseText ?>
          </div>
        </div>
      </div>

      <!-- Contenido -->
      <div class="col-xl-6" data-aos="fade-left">
        <div class="about-nova__content">
          <span class="about-nova__eyebrow"><i class="fas fa-industry me-2"></i> Our Company</span>
          <h2 class="about-nova__title">We put safety & service first</h2>

          <p class="about-nova__lead"><?= $About[0] ?? '' ?></p>
          <p class="about-nova__text"><?= $About[1] ?? '' ?></p>

          <!-- Bullets dinámicos -->
          <ul class="about-nova__list">
            <?php if(!empty($Estimates)): ?><li><i class="fas fa-check"></i> <?= $Estimates ?></li><?php endif; ?>
            <?php if(!empty($Services)):  ?><li><i class="fas fa-check"></i> <?= $Services ?></li><?php endif; ?>
            <?php if(!empty($Payment)):   ?><li><i class="fas fa-check"></i> <?= $Payment ?></li><?php endif; ?>
            <?php if(!empty($Schedule)):  ?><li><i class="fas fa-check"></i> <?= $Schedule ?></li><?php endif; ?>
            <?php if(!empty($CoverageText)):?><li><i class="fas fa-check"></i> <?= $CoverageText ?></li><?php endif; ?>
          </ul>

          <!-- Misión / Visión -->
          <div class="about-nova__mv">
            <div class="mv-card" data-aos="zoom-in" data-aos-delay="100">
              <h3 class="mv-title"><i class="fas fa-bullseye me-2"></i> Mission</h3>
              <p class="mv-text"><?= $Mission ?></p>
            </div>
            <div class="mv-card" data-aos="zoom-in" data-aos-delay="200">
              <h3 class="mv-title"><i class="fas fa-eye me-2"></i> Vision</h3>
              <p class="mv-text"><?= $Vision ?></p>
            </div>
          </div>

          <!-- CTA -->
          <div class="about-nova__cta">
            <a href="<?= $PhoneRef ?>" class="call-pill-nova">
              <i class="fas fa-phone-volume me-2"></i><?= $Phone ?>
            </a>
            <a href="contact.php" class="btn-quote-nova">
              Get A Quote <i class="fas fa-arrow-right ms-2"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ===================== CORE VALUES (LIGHT THEME) ===================== -->
<section class="values-light section" id="values-sec">
  <style>
    .values-light {
      position: relative;
      overflow: hidden;
      background: var(--bg);
      color: var(--body-color);
      padding-block: clamp(64px, 8vw, 120px);
    }

    .values-light::before {
      content: "";
      position: absolute;
      inset: 0;
      background: url('assets/img/patterns/metal-texture.jpg') center/cover no-repeat;
      opacity: 0.03;
    }

    /* ===== HEAD ===== */
    .values-light .section-head {
      position: relative;
      z-index: 2;
      margin-bottom: clamp(32px, 5vw, 64px);
      text-align: center;
    }

    .values-light .eyebrow {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      padding: 6px 14px;
      border-radius: 50px;
      background: var(--smoke-color2);
      color: var(--theme-color);
      font-weight: 600;
      text-transform: uppercase;
      font-size: 0.9rem;
      letter-spacing: 0.05em;
    }

    .values-light .title {
      font-size: clamp(1.8rem, 4vw, 2.6rem);
      font-weight: 800;
      color: var(--title-color);
      margin-top: 12px;
    }

    /* ===== CARD ===== */
    .values-light .value-card {
      position: relative;
      background: var(--brand-2);
      border-radius: 18px;
      padding: 48px 32px;
      text-align: center;
      transition: all 0.35s ease;
      overflow: hidden;
      height: 100%;
      box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08);
      border-top: 4px solid transparent;
    }

    .values-light .value-card:hover {
      border-top-color: var(--theme-color);
      box-shadow: 0 10px 28px rgba(0, 0, 0, 0.12);
      transform: translateY(-4px);
    }

    .values-light .value-icon {
      font-size: 2.8rem;
      color: var(--theme-color);
      margin-bottom: 20px;
      transition: transform 0.4s ease, color 0.3s ease;
    }

    .values-light .value-card:hover .value-icon {
      transform: scale(1.15);
      color: var(--title-color);
    }

    .values-light .value-card h3 {
      color: var(--title-color);
      font-size: 1.25rem;
      font-weight: 700;
      margin-bottom: 10px;
      text-transform: uppercase;
      letter-spacing: 0.05em;
    }

    .values-light .value-card p {
      color: var(--body-color);
      font-size: 0.98rem;
      line-height: 1.6;
      margin: 0 auto;
      max-width: 95%;
    }

    /* ===== DECOR ===== */
    .values-light .value-card::after {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 5px;
      background: linear-gradient(90deg, var(--theme-color), transparent);
      opacity: 0;
      transition: opacity 0.4s ease;
    }

    .values-light .value-card:hover::after {
      opacity: 1;
    }

    @media (max-width: 767px) {
      .values-light .value-card {
        padding: 32px 20px;
      }
      .values-light .value-icon {
        font-size: 2.4rem;
      }
    }
  </style>

  <div class="container position-relative">
    <div class="section-head" data-aos="fade-up">
      <span class="eyebrow"><i class="fas fa-gem"></i> Core Values</span>
      <h2 class="title">What Defines Our Work</h2>
    </div>

    <div class="row g-4 justify-content-center">
      <div class="col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="100">
        <div class="value-card h-100">
          <i class="fas fa-user-shield value-icon"></i>
          <h3>Integrity</h3>
          <p>We deliver every project with honesty, transparency, and strong ethics—earning lasting trust from our clients.</p>
        </div>
      </div>

      <div class="col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="200">
        <div class="value-card h-100">
          <i class="fas fa-handshake value-icon"></i>
          <h3>Commitment</h3>
          <p>Our dedication goes beyond the weld—we work tirelessly to meet deadlines and exceed expectations with professionalism.</p>
        </div>
      </div>

      <div class="col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="300">
        <div class="value-card h-100">
          <i class="fas fa-bolt value-icon"></i>
          <h3>Excellence</h3>
          <p>We combine years of experience with innovative techniques to achieve precision, durability, and outstanding quality in every weld.</p>
        </div>
      </div>
    </div>
  </div>
</section>


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

<!-- ===================== CTA STRONG ===================== -->
<section class="cta-strong" style="background:#00265A;color:#fff;padding:60px 20px;position:relative;overflow:hidden;" data-aos="fade-up">
  <div class="container" style="max-width:1200px;margin:0 auto;display:flex;flex-direction:column;align-items:center;text-align:center;gap:25px;">
    <h2 style="font:800 clamp(26px,5vw,38px)/1.2 'Exo',sans-serif;margin:0;color:#fff;text-transform:uppercase;letter-spacing:-0.5px;" data-aos="fade-up" data-aos-delay="100">
      Get Your Free Estimate Today!
    </h2>
    <p style="max-width:720px;margin:0;font:500 1.05rem/1.6 'Inter',sans-serif;color:#00C2F2;" data-aos="fade-up" data-aos-delay="200">
      Licensed & Insured · Over <?= htmlspecialchars($Experience ?? "10 Years") ?> of Experience · Available Mon–Sat
    </p>

    <div style="display:flex;flex-wrap:wrap;gap:16px;justify-content:center;margin-top:10px;" data-aos="zoom-in" data-aos-delay="300">
      <a href="<?= htmlspecialchars($PhoneRef ?? '#') ?>" 
         style="display:inline-flex;align-items:center;gap:10px;padding:14px 28px;border-radius:50px;font:700 1rem 'Inter',sans-serif;text-decoration:none;background:#00C2F2;color:#00265A;transition:all .3s ease;box-shadow:0 6px 16px rgba(0,0,0,.25);">
        <i class="fas fa-phone-alt"></i> Call Now
      </a>
      <a href="https://wa.link/l4f5t4" target="_blank" rel="noopener"
         style="display:inline-flex;align-items:center;gap:10px;padding:14px 28px;border-radius:50px;font:700 1rem 'Inter',sans-serif;text-decoration:none;background:#25D366;color:#fff;transition:all .3s ease;box-shadow:0 6px 16px rgba(0,0,0,.25);">
        <i class="fab fa-whatsapp"></i> WhatsApp
      </a>
      <a href="<?= htmlspecialchars($MailRef ?? '#') ?>" 
         style="display:inline-flex;align-items:center;gap:10px;padding:14px 28px;border-radius:50px;font:700 1rem 'Inter',sans-serif;text-decoration:none;background:#fff;color:#00265A;border:2px solid #00C2F2;transition:all .3s ease;">
        <i class="fas fa-envelope"></i> Email Us
      </a>
    </div>
  </div>
  <div style="position:absolute;bottom:-80px;right:-80px;width:200px;height:200px;background:#00C2F2;opacity:0.15;border-radius:50%;animation:pulseCta 6s ease-in-out infinite;"></div>
</section>
<!-- ===================== MAP SECTION ===================== -->
<section id="map-sec" class="map-section section">
  <style>
    .map-section {
      position: relative;
      background: var(--bg);
      color: var(--body-color);
      padding-block: clamp(64px, 8vw, 120px);
      overflow: hidden;
    }

    .map-section .section-head {
      text-align: center;
      margin-bottom: clamp(32px, 5vw, 64px);
    }

    .map-section .eyebrow {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      padding: 6px 14px;
      border-radius: 50px;
      background: var(--smoke-color2);
      color: var(--theme-color);
      font-weight: 600;
      font-size: 0.9rem;
      text-transform: uppercase;
      letter-spacing: 0.05em;
    }

    .map-section .title {
      font-size: clamp(1.8rem, 4vw, 2.6rem);
      font-weight: 800;
      color: var(--title-color);
      margin-top: 12px;
    }

    .map-container {
      position: relative;
      border-radius: 20px;
      overflow: hidden;
      background: var(--smoke-color);
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
      border-top: 4px solid var(--theme-color);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .map-container:hover {
      transform: translateY(-4px);
      box-shadow: 0 12px 32px rgba(0, 0, 0, 0.15);
    }

    .map-container iframe {
      width: 100%;
      height: 480px;
      border: none;
      display: block;
      filter: grayscale(0%) brightness(100%);
    }

    @media (max-width: 768px) {
      .map-container iframe {
        height: 340px;
      }
    }
  </style>

  <div class="container">
    <div class="section-head" data-aos="fade-up">
      <span class="eyebrow"><i class="fas fa-map-marker-alt"></i> Find Us</span>
      <h2 class="title">We’re Proud to Serve the Memphis Area</h2>
    </div>

    <div class="map-container" data-aos="fade-up" data-aos-delay="100">
      <?php echo $GoogleMap; ?>
    </div>
  </div>
</section>

<?php include('footer.php') ?>

<!-- ===================== ANIMATIONS ===================== -->
<style>
@keyframes pulseCta {
  0% { transform: scale(1); opacity:0.15; }
  50% { transform: scale(1.2); opacity:0.25; }
  100% { transform: scale(1); opacity:0.15; }
}
/* ===================== ABOUT HERO ===================== */
.about-hero {
  position: relative;
  padding: 80px 0;
  text-align: center;
  color: #fff;
}
.about-hero__bg {
  position: absolute;
  top: 0; left: 0;
  width: 100%; height: 100%;
  background-size: cover;
  background-position: center;
  z-index: -1;
  filter: brightness(0.5);
}
.about-hero__title {
  font: 800 2.8rem/1.2 var(--title-font, Exo, sans-serif);
  margin: 10px 0;
}
.about-hero__tag {
  font: 500 1rem/1.5 var(--body-font, Inter, sans-serif);
}

/* ===================== ABOUT SECTION ===================== */
.about-nova__media {
  position: relative;
}
.about-nova__frame img {
  border-radius: 14px;
  box-shadow: 0 8px 22px rgba(0,0,0,0.2);
}
.about-nova__years {
  position: absolute;
  bottom: 20px; left: 20px;
  background: #00C2F2;
  color: #00265A;
  border-radius: 12px;
  padding: 12px 20px;
  text-align: center;
  font: 700 1.1rem/1.3 var(--title-font, Exo, sans-serif);
}
.about-nova__stamp {
  position: absolute;
  top: 20px; right: 20px;
  background: #00265A;
  color: #fff;
  padding: 8px 16px;
  border-radius: 30px;
  font: 600 .9rem var(--body-font, Inter, sans-serif);
}
.about-nova__eyebrow {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  font: 700 .9rem/1 var(--body-font, Inter);
  color: #00C2F2;
  text-transform: uppercase;
  letter-spacing: .05em;
}
.about-nova__title {
  font: 800 clamp(26px,5vw,40px)/1.2 var(--title-font, Exo);
  color: #00265A;
  margin: 15px 0;
}
.about-nova__lead {
  font: 500 1.05rem/1.6 var(--body-font, Inter);
  margin-bottom: 10px;
}
.about-nova__list {
  list-style: none;
  padding: 0;
  margin: 20px 0;
}
.about-nova__list li {
  display: flex;
  align-items: center;
  gap: 8px;
  font: 500 .95rem/1.5 var(--body-font, Inter);
  color: #333;
}
.about-nova__list i {
  color: #00C2F2;
}
.about-nova__mv {
  display: grid;
  grid-template-columns: repeat(auto-fit,minmax(220px,1fr));
  gap: 20px;
  margin: 25px 0;
}
.mv-card {
  background: #fff;
  border: 1px solid #E5E7EB;
  border-radius: 14px;
  padding: 20px;
  box-shadow: 0 4px 12px rgba(0,0,0,0.08);
  transition: transform .3s ease;
}
.mv-card:hover {
  transform: translateY(-5px);
}
.mv-title {
  font: 700 1.2rem/1.3 var(--title-font, Exo);
  margin-bottom: 8px;
  color: #00265A;
}
.mv-text {
  font: 400 .95rem/1.6 var(--body-font, Inter);
  color: #333;
}
.about-nova__cta {
  display: flex;
  flex-wrap: wrap;
  gap: 16px;
  margin-top: 20px;
}
.call-pill-nova {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  padding: 12px 20px;
  border-radius: 50px;
  background: #00265A;
  color: #fff;
  font: 700 .95rem/1 var(--body-font, Inter);
  text-decoration: none;
  transition: .3s;
}
.call-pill-nova:hover {
  background: #00265A;
  color: #fff;
}
.btn-quote-nova {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  padding: 12px 22px;
  border-radius: 50px;
  border: 2px solid #00265A;
  color: #00265A;
  font: 700 .95rem/1 var(--body-font, Inter);
  text-decoration: none;
  transition: .3s;
}
.btn-quote-nova:hover {
  background: #00265A;
  color: #fff;
}

/* ===================== CORE VALUES ===================== */
.values-nova {
  padding: clamp(60px,7vw,100px) 0;
  background: #F8F9FA;
}
.value-card {
  background: #fff;
  border-radius: 14px;
  padding: 30px;
  text-align: center;
  box-shadow: 0 6px 14px rgba(0,0,0,.08);
  transition: .3s;
}
.value-icon {
  font-size: 2rem;
  margin-bottom: 15px;
  color: #00C2F2;
}
.value-card:hover {
  transform: translateY(-6px);
  box-shadow: 0 8px 20px rgba(0,0,0,.15);
}

/* ===================== WHY CHOOSE US ===================== */
.why-nova {
  background: #00265A;
  padding: clamp(60px,7vw,100px) 0;
}
.why-nova__head {
  text-align: center;
  margin-bottom: clamp(30px,5vw,60px);
  color: #fff;
}
.why-nova__head .eyebrow {
  display:inline-flex;
  align-items:center;
  gap:8px;
  font:700 .9rem/1 var(--body-font,Inter);
  color:#00C2F2;
  text-transform:uppercase;
  letter-spacing:.05em;
}
.why-nova__head .title {
  font:800 clamp(26px,5vw,40px)/1.2 var(--title-font,Exo);
  color:#fff;
  margin-top:10px;
}
.why-nova__grid {
  display: grid;
  gap: 24px;
  grid-template-columns: repeat(auto-fit, minmax(240px,1fr));
}
.why-card {
  background: rgba(255,255,255,0.05);
  border: 1px solid rgba(255,255,255,0.2);
  border-radius: 14px;
  padding: 30px 20px;
  text-align: center;
  transition: all .3s ease;
  color:#fff;
  opacity:0;
  transform: translateY(20px);
  animation: fadeUp .8s ease forwards;
}
.why-card__icon {
  width: 70px; height: 70px;
  border-radius: 50%;
  background: #00C2F2;
  color:#00265A;
  display:flex;align-items:center;justify-content:center;
  margin: 0 auto 16px;
  font-size: 1.8rem;
  transition:.3s;
}
.why-card__title {
  font:700 1.1rem/1.3 var(--title-font,Exo);
  margin-bottom: 8px;
}
.why-card__text {
  font:400 .95rem/1.5 var(--body-font,Inter);
  color:#f1f1f1;
}
.why-card:hover {
  background: #00C2F2;
  color: #00265A;
  transform: translateY(-6px);
  box-shadow: 0 8px 20px rgba(0,0,0,.25);
}
.why-card:hover .why-card__icon {
  background: #00265A;
  color:#fff;
  transform: scale(1.1) rotate(6deg);
}
.why-card:hover .why-card__text,
.why-card:hover .why-card__title {
  color:#00265A;
}

@keyframes fadeUp {
  to {opacity:1; transform: translateY(0);}
}

/* ===================== CTA STRONG ===================== */
@keyframes pulseCta {
  0% { transform: scale(1); opacity:0.15; }
  50% { transform: scale(1.2); opacity:0.25; }
  100% { transform: scale(1); opacity:0.15; }
}

</style>
