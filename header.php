<?php @session_start(); ?>
<!DOCTYPE html>
<?php include 'text.php'; ?>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title><?php echo htmlspecialchars($Company ?? ''); ?></title>

  <!-- Mobile Specific Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Favicons -->
  <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicons/favicon.png">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="theme-color" content="#ffffff">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Exo:ital,wght@0,100..900;1,100..900&family=Inter:wght@100..900&display=swap"
    rel="stylesheet">

  <!-- CSS core -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/fontawesome.min.css">
  <link rel="stylesheet" href="assets/css/magnific-popup.min.css">
  <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
  <!--[if lte IE 9]>
  <p class="browserupgrade">You are using an <strong>outdated</strong> browser.
    Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.
  </p>
  <![endif]-->

  <!-- Preloader -->
  <div class="preloader" aria-hidden="true">
    <div class="preloader-inner">
      <div class="loader">
        <div class="tyre">
          <!-- SVG -->
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="64px" width="64px" version="1.1" id="Layer_1" viewBox="0 0 511.98 511.98" xml:space="preserve" fill="#000000">

<g id="SVGRepo_bgCarrier" stroke-width="0"/>

<g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>

<g id="SVGRepo_iconCarrier"> <path style="fill:#BFBFBF;" d="M250.647,277.333c-5.89,0-10.671-4.766-10.671-10.656v-21.343c0-5.891,4.781-10.656,10.671-10.656 c5.891,0,10.672,4.766,10.672,10.656v21.343C261.319,272.567,256.538,277.333,250.647,277.333z"/> <g> <path style="fill:#434A54;" d="M157.323,511.98c-36.28,0-85.075-14.516-145.932-43.483c-5.312-2.531-7.578-8.891-5.047-14.218 c2.531-5.312,8.891-7.578,14.218-5.047c48.436,23.062,88.81,36.64,119.996,40.39c23.078,2.765,40.623,0.156,52.139-7.75 c16.968-11.656,15.609-31.921,15.546-32.78l0.016,0.078l21.233-1.938c0.125,1.344,2.703,33.108-24.374,51.982 C192.915,507.73,176.947,511.98,157.323,511.98z"/> <path style="fill:#434A54;" d="M218.633,234.678c-5.89,0-10.671-4.781-10.671-10.67V85.34c0-4.906,3.328-9.172,8.078-10.359 l85.356-21.327c5.719-1.422,11.5,2.047,12.937,7.765c1.422,5.719-2.046,11.5-7.765,12.937L229.29,93.668v130.339 C229.289,229.897,224.524,234.678,218.633,234.678z"/> </g> <path style="fill:#656D78;" d="M229.32,362.86h-21.108c-5.891,0-10.672,4.781-10.672,10.672v74.669 c0,5.891,4.781,10.672,10.672,10.672h21.108c5.89,0,10.656-4.781,10.656-10.672v-74.669 C239.976,367.641,235.21,362.86,229.32,362.86z"/> <g> <path style="fill:#434A54;" d="M229.32,437.529c0,5.891,4.765,10.672,10.656,10.672v-21.343 C234.085,426.858,229.32,431.638,229.32,437.529z"/> <path style="fill:#434A54;" d="M208.212,437.529c0-5.891-4.781-10.671-10.672-10.671v21.343 C203.43,448.201,208.212,443.42,208.212,437.529z"/> </g> <g> <path style="fill:#00C2F2;" d="M240.21,213.335h-42.67c-5.89,0-10.671,4.781-10.671,10.672v181.524 c0,5.891,4.781,10.672,10.671,10.672h42.67c5.891,0,10.671-4.781,10.671-10.672V224.007 C250.882,218.116,246.101,213.335,240.21,213.335z"/> <path style="fill:#00C2F2;" d="M366.252,67.794c-17.171,4.187-33.342-1.703-36.139-13.155 c-2.781-11.438,8.875-24.109,26.046-28.296c17.171-4.188,136.995-23.546,139.775-12.109 C498.731,25.686,383.424,63.606,366.252,67.794z"/> </g> <path style="fill:#666666;" d="M355.284,79.809c-17.952,0-32.233-9.094-35.53-22.639c-4.25-17.438,10.641-35.53,33.874-41.187 C366.315,12.889,443.108,0,479.076,0c9.109,0,24.374,0,27.218,11.718c1.453,5.953-1.281,11.516-8.109,16.531 c-3.344,2.453-7.999,5.125-14.233,8.171c-10.03,4.922-24.03,10.734-41.64,17.312c-30.154,11.265-64.216,22.155-73.528,24.42 C364.283,79.246,359.753,79.809,355.284,79.809z M464.546,21.889c-36.484,2.422-94.372,12.015-105.855,14.812 c-12.656,3.094-19.233,11.188-18.202,15.422c0.75,3.125,6.499,6.359,14.796,6.359c2.766,0,5.609-0.359,8.452-1.047 c7.703-1.875,36.531-11.047,64.138-21.109C444.139,30.389,455.968,25.639,464.546,21.889z"/> </g>

</svg>
        </div>
        <div class="shade"></div>
      </div>
    </div>
  </div>

  <!-- ============================== Mobile Menu ============================== -->
  <div class="th-menu-wrapper">
    <div class="th-menu-area text-center">
      <button class="th-menu-toggle" aria-label="Close mobile menu">
        <i class="fal fa-times"></i>
      </button>
      <div class="mobile-logo">
        <a href="index.php">
          <img src="assets/img/logo.png" alt="<?php echo htmlspecialchars($Company ?? ''); ?>">
        </a>
      </div>
      <div class="th-mobile-menu" role="navigation" aria-label="Mobile">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="about.php">About Us</a></li>
          <li><a href="services.php">Our Services</a></li>
          <li><a href="gallery.php">Gallery</a></li>
      <!--   <li><a href="testimonials.php">Testimonials</a></li> -->
          <li><a href="contact.php">Contact Us</a></li>
        </ul>
      </div>
    </div>
  </div>

  <!-- ============================== Header Area ============================== -->
<header class="site-header" role="banner">

  <!-- TOP BAR -->
  <div class="header__top d-none d-lg-block">
    <div class="container">
      <div class="d-flex align-items-center justify-content-between gap-3 py-2 header__topbar">

        <!-- Left: Info -->
        <div class="d-flex align-items-center gap-4 header__top-left">
          <?php if (!empty($Schedule)) : ?>
            <span class="top-item"><i class="far fa-clock me-1"></i> <?php echo $Schedule; ?></span>
          <?php endif; ?>

          <?php if (!empty($Address) && !empty($google)) : ?>
            <span class="top-item">
              <i class="fab fa-google"></i>
              <a href="<?php echo $google; ?>" target="_blank" rel="noopener" class="top-link">
                <?php echo htmlspecialchars($Address); ?>
              </a>
            </span>
          <?php elseif (!empty($Address)) : ?>
            <span class="top-item"><i class="fas fa-map-marker-alt me-1"></i> <?php echo htmlspecialchars($Address); ?></span>
          <?php endif; ?>

          <?php if (!empty($LicenseNote)) : ?>
            <span class="top-item"><i class="fas fa-shield-alt me-1"></i> <?php echo htmlspecialchars($LicenseNote); ?></span>
          <?php endif; ?>
        </div>

        <!-- Right: Socials -->
        <div class="d-flex align-items-center gap-2 header__top-right">
          <?php if (!empty($facebook)) : ?>
            <a aria-label="Facebook" href="<?php echo $facebook; ?>" target="_blank" rel="noopener" class="social">
              <i class="fab fa-facebook-f"></i>
            </a>
          <?php endif; ?>

          <?php if (!empty($tiktok)) : ?>
            <a aria-label="TikTok" href="<?php echo $tiktok; ?>" target="_blank" rel="noopener" class="social">
              <i class="fab fa-tiktok"></i>
            </a>
          <?php endif; ?>

          <?php if (!empty($x_link)) : ?>
            <a aria-label="Twitter / X" href="<?php echo $x_link; ?>" target="_blank" rel="noopener" class="social">
              <i class="fab fa-x-twitter"></i>
            </a>
          <?php endif; ?>

          <?php if (!empty($google)) : ?>
            <a aria-label="Google Reviews" href="<?php echo $google; ?>" target="_blank" rel="noopener" class="social">
              <i class="fab fa-google"></i>
            </a>
          <?php endif; ?>

          <?php if (!empty($usdir)) : ?>
            <a aria-label="USDirectory" href="<?php echo $usdir; ?>" target="_blank" rel="noopener" class="social">
              <i class="fas fa-link"></i>
            </a>
          <?php endif; ?>

          <?php if (!empty($thumbtack)) : ?>
            <a aria-label="Thumbtack" href="<?php echo $thumbtack; ?>" target="_blank" rel="noopener" class="social">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 113.68 113.68" width="20" height="20">
                <g>
                  <circle cx="56.84" cy="56.84" r="56.84" fill="#009fd9" />
                  <path d="M49.82,53.48c3.25-4.28,7.11-6.06,13.18-6.43v29c0,8.31-2.21,13.81-6.51,20.41-4.14-6.34-6.67-11.57-6.67-20.41v-22.57Z" fill="#fff" />
                  <rect x="28.75" y="29.59" width="56.48" height="11.88" fill="#fff" />
                </g>
              </svg>
            </a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>

  <!-- MAIN BAR -->
  <div class="header__main">
    <div class="container position-relative">
      <div class="d-flex align-items-center justify-content-between py-3">

        <!-- Logo -->
        <div class="header__left d-flex align-items-center">
          <a href="index.php" class="header__logo" aria-label="Go to home">
            <img src="assets/img/logo-white.png" alt="<?php echo htmlspecialchars($Company ?? ''); ?>" height="48">
          </a>
        </div>

        <!-- Nav -->
        <div class="header__center d-none d-lg-block">
          <nav class="header-nav" aria-label="Main navigation">
            <ul>
              <li><a class="<?php echo ($namepage === 'Home') ? 'is-active' : ''; ?>" href="index.php">Home</a></li>
              <li><a class="<?php echo ($namepage === 'About') ? 'is-active' : ''; ?>" href="about.php">About Us</a></li>
              <li><a class="<?php echo ($namepage === 'Services') ? 'is-active' : ''; ?>" href="services.php">Our Services</a></li>
              <li><a class="<?php echo ($namepage === 'Gallery') ? 'is-active' : ''; ?>" href="gallery.php">Gallery</a></li>
                 <!--    <li><a class="<?php echo ($namepage === 'Testimonials') ? 'is-active' : ''; ?>" href="testimonials.php">Testimonials</a></li>-->  
              <li><a class="<?php echo ($namepage === 'Contact Us') ? 'is-active' : ''; ?>" href="contact.php">Contact Us</a></li>
            </ul>
          </nav>
        </div>

        <!-- Right -->
        <div class="header__right d-flex align-items-center gap-3">
          <a href="contact.php" class="btn btn-quote d-none d-lg-inline-flex">
            Get A Quote <i class="fas fa-arrow-right ms-2"></i>
          </a>
          <?php if (!empty($PhoneRef) && !empty($Phone)) : ?>
            <a class="call-pill d-none d-md-inline-flex" href="<?php echo $PhoneRef; ?>">
              <i class="fas fa-phone-volume me-2"></i><?php echo htmlspecialchars($Phone); ?>
            </a>
          <?php endif; ?>

          <!-- Hamburger -->
          <button class="btn-hamburger d-lg-none" aria-controls="mobile-drawer" aria-expanded="false" aria-label="Open menu">
            <span></span><span></span><span></span>
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- MOBILE DRAWER -->
  <div id="mobile-drawer" class="mobile-drawer" aria-hidden="true">
    <div class="mobile-drawer__header">
      <a href="index.php">
        <img src="assets/img/logo.png" alt="<?php echo htmlspecialchars($Company ?? ''); ?>" height="40">
      </a>
      <button class="btn-close-drawer" aria-label="Close menu">&times;</button>
    </div>
    <nav class="mobile-drawer__nav" aria-label="Mobile navigation">
      <a href="index.php">Home</a>
      <a href="about.php">About Us</a>
      <a href="services.php">Our Services</a>
      <a href="gallery.php">Gallery</a>
     <!-- <a href="testimonials.php">Testimonials</a> -->  
      <a href="contact.php">Contact Us</a>
    </nav>
    <div class="mobile-drawer__cta">
      <?php if (!empty($PhoneRef) && !empty($Phone)) : ?>
        <a href="<?php echo $PhoneRef; ?>" class="call-pill w-100">
          <i class="fas fa-phone-volume me-2"></i><?php echo htmlspecialchars($Phone); ?>
        </a>
      <?php endif; ?>
      <?php if (!empty($whatsapp)) : ?>
        <a href="<?php echo $whatsapp; ?>" class="btn btn-whatsapp w-100 mt-2">
          <i class="fab fa-whatsapp me-2"></i>WhatsApp
        </a>
      <?php endif; ?>
    </div>
  </div>
</header>


  <!-- Scripts core -->
  <script src="assets/js/swiper-bundle.min.js"></script>
  <script src="assets/js/jquery-3.7.1.min.js"></script>
  <script src="assets/js/imagesloaded.pkgd.min.js"></script>
  <script src="assets/js/isotope.pkgd.min.js"></script>
  <script src="assets/js/jquery.magnific-popup.min.js"></script>

  <script>
    (function() {
      const burger = document.querySelector('.btn-hamburger');
      const drawer = document.getElementById('mobile-drawer');
      const closeBtn = document.querySelector('.btn-close-drawer');

      function openDrawer() {
        drawer.classList.add('is-open');
        burger?.classList.add('is-open');
        drawer.setAttribute('aria-hidden', 'false');
        document.body.classList.add('no-scroll');
        burger?.setAttribute('aria-expanded', 'true');
      }

      function closeDrawer() {
        drawer.classList.remove('is-open');
        burger?.classList.remove('is-open');
        drawer.setAttribute('aria-hidden', 'true');
        document.body.classList.remove('no-scroll');
        burger?.setAttribute('aria-expanded', 'false');
      }

      burger?.addEventListener('click', () =>
        drawer.classList.contains('is-open') ? closeDrawer() : openDrawer()
      );
      closeBtn?.addEventListener('click', closeDrawer);
      drawer?.addEventListener('click', (e) => {
        if (e.target === drawer) closeDrawer();
      });
    })();
  </script>

  <script>
    (function($) {
      function initGallery() {
        var $grid = $('.gm-grid');
        if (!$grid.length) return;

        $grid.addClass('gm-fallback');
        var hasIso = !!$.fn.isotope;
        var hasImg = !!$.fn.imagesLoaded;
        if (!hasIso || !hasImg) return;

        $grid.imagesLoaded(function() {
          $grid.removeClass('gm-fallback')
            .addClass('is-ready')
            .isotope({
              itemSelector: '.g-item',
              percentPosition: true,
              layoutMode: 'masonry',
              masonry: {
                columnWidth: '.grid-sizer',
                gutter: 12
              }
            });
        });

        $('.gm-filters').on('click', '.chip', function() {
          var $b = $(this);
          $b.addClass('is-active').siblings().removeClass('is-active');
          $grid.isotope({
            filter: $b.data('filter')
          });
        });

        $('.gallery-nova .popup-image').magnificPopup({
          type: 'image',
          gallery: {
            enabled: true
          },
          image: {
            titleSrc: function(item) {
              return item.el.attr('data-caption') || '<?php echo addslashes($Company ?? ""); ?>';
            }
          }
        });
      }

      $(window).on('load', initGallery);
    })(jQuery);
  </script>

 
</body>

<style>
  @media (max-width: 991px) {

    /* Contenedor principal en modo responsive */
    .header__main .container>.d-flex {
      display: flex !important;
      justify-content: center;
      /* centramos contenido */
      position: relative;
    }

    /* Logo centrado en el medio */
    .header__main .header__left {
      position: absolute;
      left: 50%;
      transform: translateX(-50%);
    }

    /* Bot��n hamburguesa a la derecha */
    .header__main .header__right {
      position: absolute;
      right: 0;
      top: 50%;
      transform: translateY(-50%);
    }
  }

  .btn-close-drawer {
    color: red;
    background: #fff;
    border-radius: 100%;
  }

  .mobile-drawer__header {
    background: #de031e;
  }

  .d-flex.align-items-center.justify-content-between.py-3 {
    margin: 10px 10px;
  }

  .header__logo img {
    border-radius: 0% !important;
    background: none !important;
  }
</style>

</html>