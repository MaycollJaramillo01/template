<?php
require_once __DIR__ . '/navigation.php';
$homePath = isset($homePath) && $homePath ? $homePath : '/home-1';
$navItems = nova_navigation_items($homePath);
?>
<!-- ==============================
FOOTER
============================== -->
<footer class="footer-wrapper footer-layout-nova">
  <style>
    .footer-wrapper {
      background: var(--theme-color,#00265A);
      color: #fff;
      position: relative;
      z-index: 1;
    }
    .footer-wrapper .widget-area {
      padding: 70px 0 40px;
    }
    .footer-widget {
      margin-bottom: 30px;
    }
    .footer-widget .widget_title {
      font: 700 1.1rem/1.3 var(--title-font,Exo);
      margin-bottom: 20px;
      color: var(#BFBFBF,#FABA0D);
      display: flex;
      align-items: center;
      gap: 8px;
    }
    .footer-widget .widget_title img {
      width: 22px;
      height: auto;
    }
    .about-logo img {
      max-width: 180px;
      margin-bottom: 15px;
      background-color: #fff;
      border-radius: 100%;
    }
    .about-text {
      font-size: .95rem;
      line-height: 1.5;
      margin-bottom: 15px;
      color: #e5e7eb;
    }
    /* Socials */
    .th-social a {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      width: 38px;
      height: 38px;
      margin-right: 8px;
      border-radius: 50%;
      background: #fff;
      color: var(--theme-color,#00265A);
      transition: all .3s ease;
    }
    .th-social a:hover {
      background: var(#BFBFBF,#FABA0D);
      color: #000;
      transform: translateY(-3px);
    }
    /* Menu */
    .menu {
      list-style: none;
      margin: 0; padding: 0;
    }
    .menu li {
      margin-bottom: 8px;
    }
    .menu li a {
      color: #e5e7eb;
      text-decoration: none;
      font-size: .95rem;
      transition: .3s;
    }
    .menu li a:hover {
      color: var(#BFBFBF,#FABA0D);
    }
    /* Contact Info */
    .th-widget-contact .info-box {
      display: flex;
      align-items: flex-start;
      gap: 10px;
      margin-bottom: 12px;
    }
    .th-widget-contact .box-icon {
      font-size: 1.1rem;
      color: var(#BFBFBF,#FABA0D);
      flex-shrink: 0;
    }
    .th-widget-contact .box-link {
      color: #e5e7eb;
      text-decoration: none;
      transition:.3s;
    }
    .th-widget-contact .box-link:hover {
      color: var(#BFBFBF,#FABA0D);
    }
    /* Divider invisible en desktop */
    .divider {
      display:none;
    }
    /* Copyright */
    .copyright-wrap {
      background: #001A40;
      padding: 14px 0;
      text-align: center;
    }
    .copyright-text {
      font-size: .9rem;
      color: #cbd5e1;
      margin: 0;
    }
  </style>

  <div class="widget-area">
    <div class="container">
      <div class="row justify-content-between g-4">
        <!-- About -->
        <div class="col-md-6 col-xl-3">
          <div class="widget footer-widget">
            <div class="th-widget-about">
              <div class="about-logo">
                <a href="<?php echo htmlspecialchars($homePath, ENT_QUOTES, 'UTF-8'); ?>">
                  <img src="/assets/img/logo-white.png" alt="<?php echo nova_img_alt($Company ?? '', 'Company logo', $Company ?? ''); ?>">
                </a>
              </div>
              <p class="about-text"><?php echo htmlspecialchars(substr($Home[0] ?? '', 0, 138)); ?></p>

              <!-- Redes -->
              <div class="th-social th-social--footer">
                <?php if (!empty($facebook)) : ?>
                  <a href="<?= $facebook ?>" target="_blank" rel="noopener" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
                <?php endif; ?>
                <?php if (!empty($yelp)) : ?>
                  <a href="<?= $yelp ?>" target="_blank" rel="noopener" aria-label="Yelp"><i class="fa-brands fa-yelp"></i></a>
                <?php endif; ?>
                <?php if (!empty($google)) : ?>
                  <a href="<?= $google ?>" target="_blank" rel="noopener" aria-label="Google"><i class="fa-brands fa-google"></i></a>
                <?php endif; ?>
                <?php if (!empty($angi)) : ?>
                  <a href="<?= $angi ?>" target="_blank" rel="noopener" aria-label="Angi"><i class="fa-solid fa-star"></i></a>
                <?php endif; ?>
                <?php if (!empty($thumbtack)) : ?>
                  <a href="<?= $thumbtack ?>" target="_blank" rel="noopener" aria-label="Thumbtack"><i class="fa-solid fa-thumbtack"></i></a>
                <?php endif; ?>
                <?php if (!empty($homeadvisor)) : ?>
                  <a href="<?= $homeadvisor ?>" target="_blank" rel="noopener" aria-label="HomeAdvisor"><i class="fa-solid fa-house"></i></a>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>

        <!-- Sitemap -->
        <div class="col-md-6 col-xl-2">
          <div class="widget widget_nav_menu footer-widget">
            <h3 class="widget_title">
              <img src="/assets/img/icon/footer_title4.svg" alt="<?php echo nova_img_alt('Sitemap icon', 'Website navigation icon', $Company ?? ''); ?>"> Sitemap
            </h3>
            <ul class="menu">
              <?php foreach ($navItems as $item): ?>
                <li>
                  <a class="<?php echo nova_navigation_link_class($item['key'], $activeNav ?? ''); ?>"
                     href="<?php echo htmlspecialchars($item['href'], ENT_QUOTES, 'UTF-8'); ?>">
                    <?php echo htmlspecialchars($item['label'], ENT_QUOTES, 'UTF-8'); ?>
                  </a>
                </li>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>

        <!-- Our Services -->
        <div class="col-md-6 col-xl-3">
          <div class="widget widget_nav_menu footer-widget">
            <h3 class="widget_title">
              <img src="/assets/img/icon/footer_title4.svg" alt="<?php echo nova_img_alt('Services icon', 'Website services icon', $Company ?? ''); ?>"> Our Services
            </h3>
            <ul class="menu">
              <?php for ($i = 1; $i <= 5; $i++): ?>
                <?php if (!empty($SN[$i])): ?>
                  <li><a href="services.php"><?php echo htmlspecialchars($SN[$i], ENT_QUOTES); ?></a></li>
                <?php endif; ?>
              <?php endfor; ?>
            </ul>
          </div>
        </div>

        <!-- Contact Info -->
        <div class="col-md-6 col-xl-3">
          <div class="widget footer-widget">
            <h3 class="widget_title">
              <img src="/assets/img/icon/footer_title4.svg" alt="<?php echo nova_img_alt('Contact icon', 'Website contact icon', $Company ?? ''); ?>"> Contact Info
            </h3>
            <div class="th-widget-contact">
              <div class="info-box">
                <div class="box-icon"><i class="fa-solid fa-location-dot"></i></div>
                <p class="box-text"><?php echo htmlspecialchars($Address ?? '', ENT_QUOTES); ?></p>
              </div>
              <?php if (!empty($PhoneRef) && !empty($Phone)) : ?>
              <div class="info-box">
                <div class="box-icon"><i class="fa-solid fa-phone"></i></div>
                <p class="box-text"><a href="<?php echo $PhoneRef; ?>" class="box-link"><?php echo htmlspecialchars($Phone, ENT_QUOTES); ?></a></p>
              </div>
              <?php endif; ?>
              <?php if (!empty($MailRef) && !empty($Mail)) : ?>
              <div class="info-box">
                <div class="box-icon"><i class="fa-solid fa-envelope"></i></div>
                <p class="box-text"><a href="<?php echo $MailRef; ?>" class="box-link"><?php echo htmlspecialchars($Mail, ENT_QUOTES); ?></a></p>
              </div>
              <?php endif; ?>
              <?php if (!empty($Schedule)) : ?>
              <div class="info-box">
                <div class="box-icon"><i class="fa-regular fa-clock"></i></div>
                <p class="box-text"><?php echo htmlspecialchars($Schedule, ENT_QUOTES); ?></p>
              </div>
              <?php endif; ?>
              <?php if (!empty($Payment)) : ?>
              <div class="info-box">
                <div class="box-icon"><i class="fa-regular fa-credit-card"></i></div>
                <p class="box-text"><?php echo htmlspecialchars($Payment, ENT_QUOTES); ?></p>
              </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div><!-- row -->
    </div><!-- container -->
  </div><!-- widget-area -->

  <div class="copyright-wrap">
    <div class="container">
      <p class="copyright-text">
        <i class="fa-regular fa-copyright"></i>
        <?php echo date('Y'); ?> <?php echo htmlspecialchars($Company ?? '', ENT_QUOTES); ?>
      </p>
    </div>
  </div>
</footer>


<!--********************************
			Code End  Here 
	******************************** -->

<!-- Scroll To Top -->
<div class="scroll-top">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"
            style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;">
        </path>
    </svg>
</div>

<!--==============================
    All Js File
============================== -->
<!-- Jquery -->
<script src="/assets/js/vendor/jquery-3.7.1.min.js"></script>
<!-- Swiper Js -->
<script src="/assets/js/swiper-bundle.min.js"></script>
<!-- Bootstrap -->
<script src="/assets/js/bootstrap.min.js"></script>
<!-- Magnific Popup -->
<script src="/assets/js/jquery.magnific-popup.min.js"></script>
<!-- Counter Up -->
<script src="/assets/js/jquery.counterup.min.js"></script>
<!-- Tilt
<script src="/assets/js/social-buttons.js"></script>-->
<script src="/assets/js/tilt.jquery.min.js"></script>
<!-- Isotope Filter -->
<script src="/assets/js/imagesloaded.pkgd.min.js"></script>
<script src="/assets/js/isotope.pkgd.min.js"></script>
<script src="https://www.google.com/recaptcha/api.js"></script>
<!-- Main Js File -->
<script src="/assets/js/main.js"></script>
<script>
    function onSubmit(token) {
        document.getElementById("demo-form").submit();
    }
</script>

</body>

</html>