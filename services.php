<?php include('header2.php') ?>

<!-- ===================== BREADCRUMB ===================== -->
<section class="breadcrumb-area" style="background:linear-gradient(120deg,#00265A,#004b9a);padding:90px 0;color:#fff;text-align:center;">
  <div class="container">
    <h1 class="bread-title" data-aos="fade-down"  style="color:#E5E7EB !important;">Our Services</h1>
    <ul class="bread-list" style="list-style:none;padding:0;margin:10px 0 0;display:inline-flex;gap:8px;">
      <li><a href="index.php" style="color:#fff;text-decoration:none;">Home</a></li>
      <li>/</li>
      <li>Our Services</li>
    </ul>
  </div>
</section>


<!-- ===================== SERVICES — MODULAR FIXED ===================== -->
<section class="services-mod section" id="services-sec">
  <style>
    .services-mod {
      background: var(--bg);
      color: var(--body-color);
      padding-block: clamp(80px, 10vw, 140px);
    }

    .services-mod .section-head {
      text-align: center;
      margin-bottom: clamp(48px, 6vw, 80px);
    }

    .services-mod .eyebrow {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background: var(--smoke-color2);
      color: var(--theme-color);
      padding: 6px 14px;
      border-radius: 50px;
      font: 600 .9rem var(--body-font);
      text-transform: uppercase;
      letter-spacing: 0.05em;
    }

    .services-mod .title {
      font: 800 clamp(1.8rem, 4vw, 2.6rem)/1.2 var(--title-font);
      color: var(--title-color);
      margin-top: 12px;
    }

    /* === Service Rows === */
    .service-row {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      align-items: center;
      gap: 60px;
      margin-bottom: 100px;
      min-height: 420px;
    }

    /* Alternar orden */
    .service-row:nth-child(even) .service-img {
      order: 2;
    }

    /* Imágenes */
    .service-img {
      position: relative;
      width: 100%;
      height: 100%;
      border-radius: 18px;
      overflow: hidden;
    }

    .service-img img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      border-radius: 18px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, .08);
      transition: transform .6s ease;
    }

    .service-img:hover img { transform: scale(1.05); }

    /* Contenido */
    .service-content {
      display: flex;
      flex-direction: column;
      justify-content: center;
      padding: 20px 10px;
    }

    .service-content h3 {
      font: 700 1.6rem var(--title-font);
      color: var(--title-color);
      margin-bottom: 14px;
    }

    .service-content p {
      font: 500 1rem/1.7 var(--body-font);
      color: var(--body-color);
      margin-bottom: 26px;
      max-width: 500px;
    }

    .service-content .cta {
      display: flex;
      flex-wrap: wrap;
      gap: 16px;
      align-items: center;
    }

    .service-content .btn-primary {
      background: var(--theme-color);
      color: #fff;
      padding: 12px 26px;
      border-radius: 50px;
      font: 700 .95rem var(--body-font);
      text-decoration: none;
      transition: .3s ease;
    }

    .service-content .btn-primary:hover {
      background: #0096c7;
      transform: translateY(-2px);
    }

    .service-content .call-link {
      color: var(--title-color);
      font-weight: 600;
      text-decoration: none;
      transition: .3s;
    }

    .service-content .call-link:hover {
      color: var(--theme-color);
    }

    /* Responsive */
    @media (max-width: 992px) {
      .service-row {
        grid-template-columns: 1fr;
        gap: 40px;
        margin-bottom: 80px;
      }

      .service-content {
        text-align: center;
        padding: 0;
      }

      .service-content p {
        margin-inline: auto;
      }

      .service-img {
        max-height: 380px;
      }
    }
  </style>

  <div class="container">
    <div class="section-head" data-aos="fade-up">
      <span class="eyebrow"><i class="far fa-sparkles"></i> Our Services</span>
      <h2 class="title">Professional Welding Solutions</h2>
      <p class="lead" style="max-width:700px;margin:auto;font:500 1.05rem/1.6 var(--body-font);color:var(--body-color);">
        Built for precision, durability, and quality. We combine decades of experience with modern tools to handle projects of any scale.
      </p>
    </div>

    <?php for ($i = 1; $i <= 5; $i++): 
      if (empty($SN[$i])) continue;
      $title = htmlspecialchars($SN[$i]);
      $text  = htmlspecialchars($SD[$i] ?? '');
      $img   = "assets/img/service/{$i}.jpg";
    ?>
      <div class="service-row" data-aos="fade-up" data-aos-delay="<?= $i*100 ?>">
        <div class="service-img">
          <img src="<?= $img ?>" alt="<?= $title ?>" loading="lazy" onerror="this.style.display='none'">
        </div>
        <div class="service-content">
          <h3><?= $title ?></h3>
          <p><?= $text ?></p>
          <div class="cta">
            <a href="contact.php" class="btn-primary">Request Service</a>
            <?php if (!empty($PhoneRef) && !empty($Phone)): ?>
              <a href="<?= $PhoneRef ?>" class="call-link"><i class="fas fa-phone me-2"></i><?= $Phone ?></a>
            <?php endif; ?>
          </div>
        </div>
      </div>
    <?php endfor; ?>
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

<!-- ===================== FAQ ===================== -->
<section class="faq-clean section" id="faq-sec">
  <style>
    .faq-clean {
      background: var(--bg);
      padding-block: clamp(70px,8vw,120px);
    }
    .faq-clean .section-head {text-align:center;margin-bottom:48px;}
    .faq-clean .title {color:var(--title-color);}
    .faq-accordion {max-width:800px;margin:auto;}
    .faq-item {border-bottom:1px solid var(--th-border-color);padding:20px 0;}
    .faq-q {
      width:100%;background:none;border:none;text-align:left;
      font:700 1.05rem var(--title-font);color:var(--title-color);
      display:flex;justify-content:space-between;align-items:center;
      cursor:pointer;transition:.3s;
    }
    .faq-q i {transition:.3s;}
    .faq-item.active .faq-q i {transform:rotate(45deg);color:var(--theme-color);}
    .faq-q:hover {color:var(--theme-color);}
    .faq-a {
      max-height:0;overflow:hidden;
      color:var(--body-color);
      font:500 .95rem/1.6 var(--body-font);
      transition:max-height .4s ease;
      margin-top:0;
    }
    .faq-item.active .faq-a {max-height:200px;margin-top:10px;}
  </style>

  <div class="container">
    <div class="section-head" data-aos="fade-up">
      <span class="eyebrow" style="background:var(--theme-color);color:#fff;"><i class="fas fa-question-circle me-2"></i> FAQ</span>
      <h2 class="title">Frequently Asked Questions</h2>
    </div>

    <div class="faq-accordion">
      <?php 
      $faqs = [
        ["What areas do you serve?", "We proudly cover ".$Coverage."."],
        ["Are you licensed and insured?", "Yes, we are ".$LicenseNote." for your peace of mind."],
        ["Do you offer free estimates?", $Estimates],
        ["What payment methods do you accept?", $Payment]
      ];
      foreach ($faqs as $i=>$f): ?>
      <div class="faq-item" data-aos="fade-up" data-aos-delay="<?= $i*100 ?>">
        <button class="faq-q"><?= $f[0] ?><i class="fas fa-plus"></i></button>
        <div class="faq-a"><?= $f[1] ?></div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
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
<script>
document.querySelectorAll('.faq-q').forEach(btn=>{
  btn.addEventListener('click',()=>{
    const item=btn.parentElement;
    item.classList.toggle('active');
  });
});
</script>

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
