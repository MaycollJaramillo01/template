<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
require_once __DIR__ . '/../text.php';
require_once __DIR__ . '/helpers.php';
require_once __DIR__ . '/navigation.php';

$page_name = isset($page_name) && $page_name ? $page_name : (basename($_SERVER['SCRIPT_NAME'] ?? '') ?: 'index.php');
$titles = [
    'about.php'      => 'About',
    'services.php'   => 'Services',
    'gallery.php'    => 'Gallery',
    '404.php'        => '404',
    'thank-you.php'  => 'Thank you',
    'contact.php'    => 'Contact',
];

$homePath = isset($homePath) && $homePath ? $homePath : '/home-1';
$activeNav = isset($activeNav) ? $activeNav : '';
$navItems  = nova_navigation_items($homePath);
$titleSuffix = isset($titles[$page_name]) ? $titles[$page_name] : '';
$pageLabel = $titleSuffix !== '' ? $titleSuffix : ($namepage ?? '');

$languages = nova_detect_languages($BilingualNote ?? '');
$descriptionCandidates = [
    $MetaDescription ?? '',
    isset($About[0]) ? $About[0] : '',
    isset($Home[0]) ? $Home[0] : '',
    $Services ?? '',
];
$fallbackDescription = ($Company ?? 'Our team') . ' delivers dependable mobile welding solutions across Memphis, TN and nearby areas.';
$socialCandidates = [
    $facebook ?? null,
    $tiktok ?? null,
    $x_link ?? null,
    $google ?? null,
    $usdir ?? null,
    $thumbtack ?? null,
    $mapquest ?? null,
    $angi ?? null,
    $yelp ?? null,
    $instagram ?? null,
    $linkedin ?? null,
];

$headMeta = nova_prepare_head_metadata([
    'company' => $Company ?? '',
    'pageTitle' => $pageLabel,
    'domain' => $Domain ?? '',
    'fallbackDomain' => $Domain ?? '',
    'metaImage' => $MetaImage ?? '/assets/img/normal/about_4.jpg',
    'requestUri' => $_SERVER['REQUEST_URI'] ?? '/',
    'descriptionCandidates' => $descriptionCandidates,
    'fallbackDescription' => $fallbackDescription,
    'social' => $socialCandidates,
    'map' => $google ?? '',
    'email' => $Mail ?? '',
    'phone' => $Phone ?? '',
    'coverage' => $Coverage ?? '',
    'services' => $Services ?? '',
    'schedule' => $Schedule ?? '',
    'address' => $Address ?? '',
    'languages' => $languages,
    'twitterUrl' => $x_link ?? '',
    'defaultSiteName' => 'FSC Mobile Welding',
]);

$metaTitle        = $headMeta['title'];
$metaDescription  = $headMeta['description'];
$metaCanonical    = $headMeta['canonical'];
$metaImageUrl     = $headMeta['image'];
$metaUrl          = $headMeta['url'];
$metaSiteName     = $headMeta['site_name'];
$metaTwitter      = $headMeta['twitter_handle'];
$structuredDataJson = $headMeta['structured_data'];
$metaSameAs       = $headMeta['same_as'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo htmlspecialchars($metaTitle, ENT_QUOTES, 'UTF-8'); ?></title>
    <meta name="description" content="<?php echo htmlspecialchars($metaDescription, ENT_QUOTES, 'UTF-8'); ?>">
    <link rel="canonical" href="<?php echo htmlspecialchars($metaCanonical, ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?php echo htmlspecialchars($metaTitle, ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:description" content="<?php echo htmlspecialchars($metaDescription, ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:url" content="<?php echo htmlspecialchars($metaUrl, ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:site_name" content="<?php echo htmlspecialchars($metaSiteName, ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:image" content="<?php echo htmlspecialchars($metaImageUrl, ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:image:secure_url" content="<?php echo htmlspecialchars($metaImageUrl, ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:image:alt" content="<?php echo htmlspecialchars($metaSiteName, ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:locale" content="en_US">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo htmlspecialchars($metaTitle, ENT_QUOTES, 'UTF-8'); ?>">
    <meta name="twitter:description" content="<?php echo htmlspecialchars($metaDescription, ENT_QUOTES, 'UTF-8'); ?>">
    <meta name="twitter:image" content="<?php echo htmlspecialchars($metaImageUrl, ENT_QUOTES, 'UTF-8'); ?>">
    <meta name="twitter:image:alt" content="<?php echo htmlspecialchars($metaSiteName, ENT_QUOTES, 'UTF-8'); ?>">
    <?php if ($metaTwitter !== ''): ?>
        <meta name="twitter:site" content="<?php echo htmlspecialchars($metaTwitter, ENT_QUOTES, 'UTF-8'); ?>">
        <meta name="twitter:creator" content="<?php echo htmlspecialchars($metaTwitter, ENT_QUOTES, 'UTF-8'); ?>">
    <?php endif; ?>
    <?php if (!empty($metaSameAs)): ?>
        <?php foreach ($metaSameAs as $same): ?>
            <link rel="me" href="<?php echo htmlspecialchars($same, ENT_QUOTES, 'UTF-8'); ?>">
        <?php endforeach; ?>
    <?php endif; ?>
    <?php if (!empty($structuredDataJson)): ?>
        <script type="application/ld+json">
<?php echo $structuredDataJson; ?>
        </script>
    <?php endif; ?>

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicons - Place favicon.ico in the root directory -->
    <base href="/">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/img/favicons/favicon.png">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">

    <!--==============================
	  Google Fonts
	============================== -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Exo:ital,wght@0,100..900;1,100..900&family=Inter:wght@100..900&display=swap"
        rel="stylesheet">

    <!--==============================
	    All CSS File
	============================== -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <!-- Fontawesome Icon -->
    <link rel="stylesheet" href="/assets/css/fontawesome.min.css">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="/assets/css/magnific-popup.min.css">
    <!-- Swiper Js -->
    <link rel="stylesheet" href="/assets/css/swiper-bundle.min.css">
    <!-- Star Testimonials CSS -->
    <link rel="stylesheet" href="/assets/css/testimonials.css">
    <link rel="stylesheet" href="/assets/css/star.css">
    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="/assets/css/style.css">
<!-- AOS Animations -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script>
  document.addEventListener("DOMContentLoaded", () => {
    AOS.init({
      once: true,      // animación solo una vez
      duration: 900,   // duración en ms
      easing: 'ease-out-cubic',
      offset: 100
    });
  });
</script>

</head>

<body>

    <!--[if lte IE 9]>
    	<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  	<![endif]-->


    <!--********************************
   		Code Start From Here 
	******************************** -->

    <!--==============================
    Mobile Menu
  ============================== -->
    <div class="th-menu-wrapper">
        <div class="th-menu-area text-center">
            <button class="th-menu-toggle"><i class="fal fa-times"></i></button>
            <div class="mobile-logo">
                <a href="<?php echo htmlspecialchars($homePath, ENT_QUOTES, 'UTF-8'); ?>"><img src="/assets/img/logo-white.png" alt="<?php echo nova_img_alt($Company ?? '', 'Company logo', $Company ?? ''); ?>"></a>
            </div>
            <div class="th-mobile-menu">
                <ul>
                    <?php foreach ($navItems as $item): ?>
                        <li>
                            <a class="<?php echo nova_navigation_link_class($item['key'], $activeNav); ?>"
                               href="<?php echo htmlspecialchars($item['href'], ENT_QUOTES, 'UTF-8'); ?>">
                                <?php echo htmlspecialchars($item['label'], ENT_QUOTES, 'UTF-8'); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
    <!--==============================
	Header Area
==============================-->
    <header class="th-header header-layout1 ">
        <div class="header-top">
            <div class="container">
                <div class="row justify-content-center justify-content-lg-between align-items-center gy-2">

                    <!-- Info de contacto -->
                    <div class="col-auto d-none d-lg-block">
                        <div class="header-links">
                            <ul>
                                <li><i class="fas fa-location-dot"></i> <?= $Address ?></li>
                                <li><i class="fas fa-envelope"></i> <a href="<?= $MailRef ?>"><?= $Mail ?></a></li>
                                <li><i class="fas fa-phone"></i> <a href="<?= $PhoneRef ?>"><?= $Phone ?></a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Redes sociales -->
                    <div class="col-auto">
                        <!-- Right: socials -->
                        <div class="d-flex align-items-center gap-2 header__top-right">
                            <?php if (!empty($facebook)) : ?>
                                <a aria-label="Facebook" href="<?= $facebook ?>" target="_blank" rel="noopener" class="social">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            <?php endif; ?>

                            <?php if (!empty($yelp)) : ?>
                                <a aria-label="Yelp" href="<?= $yelp ?>" target="_blank" rel="noopener" class="social">
                                    <i class="fab fa-yelp"></i>
                                </a>
                            <?php endif; ?>

                            <?php if (!empty($google)) : ?>
                                <a aria-label="Google Reviews" href="<?= $google ?>" target="_blank" rel="noopener" class="social">
                                    <i class="fab fa-google"></i>
                                </a>
                            <?php endif; ?>

                            <?php if (!empty($mapquest)) : ?>
                                <a aria-label="MapQuest" href="<?= $mapquest ?>" target="_blank" rel="noopener" class="social">
                                    <i class="fas fa-map-marked-alt"></i>
                                </a>
                            <?php endif; ?>

                            <?php if (!empty($angi)) : ?>
                                <a aria-label="Angi" href="<?= $angi ?>" target="_blank" rel="noopener" class="social">
                                    <i class="fas fa-star"></i>
                                </a>
                            <?php endif; ?>

                            <?php if (!empty($thumbtack)) : ?>
                                <a aria-label="Thumbtack" href="<?= $thumbtack ?>" target="_blank" rel="noopener" class="social">
                                    <i class="fas fa-thumbtack"></i>
                                </a>
                            <?php endif; ?>

                            <?php if (!empty($homeadvisor)) : ?>
                                <a aria-label="HomeAdvisor" href="<?= $homeadvisor ?>" target="_blank" rel="noopener" class="social">
                                    <i class="fas fa-home"></i>
                                </a>
                            <?php endif; ?>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <div class="sticky-wrapper">
            <!-- Main Menu Area -->
            <div class="container">
                <div class="menu-area">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto">
                            <div class="header-logo">
                                <a href="<?php echo htmlspecialchars($homePath, ENT_QUOTES, 'UTF-8'); ?>"><img src="/assets/img/logo-white.png" alt="<?php echo nova_img_alt($Company ?? '', 'Company logo', $Company ?? ''); ?>"></a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <nav class="main-menu d-none d-lg-inline-block">
                                <ul>
                                    <?php foreach ($navItems as $item): ?>
                                        <li>
                                            <a class="<?php echo nova_navigation_link_class($item['key'], $activeNav); ?>"
                                               href="<?php echo htmlspecialchars($item['href'], ENT_QUOTES, 'UTF-8'); ?>">
                                                <?php echo htmlspecialchars($item['label'], ENT_QUOTES, 'UTF-8'); ?>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </nav>
                            <button type="button" class="th-menu-toggle d-block d-lg-none"><i
                                    class="far fa-bars"></i></button>
                        </div>
                        <div class="col-auto d-none d-xl-block">
                            <div class="header-button">
                                <a class="header-call" href="<?php echo $PhoneRef; ?>"><span class="icon-btn"><i
                                            class="fas fa-phone-volume"></i></span> <?php echo $Phone; ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            (function($) {
                function initGallery() {
                    var $grid = $('.gm-grid');

                    // Fallback CSS mientras carga / si no existe Isotope
                    $grid.addClass('gm-fallback');

                    var hasIso = !!$.fn.isotope;
                    var hasImg = !!$.fn.imagesLoaded;

                    if (!hasIso || !hasImg || !$grid.length) return;

                    $grid.imagesLoaded(function() {
                        $grid.removeClass('gm-fallback').addClass('is-ready').isotope({
                            itemSelector: '.g-item',
                            percentPosition: true,
                            layoutMode: 'masonry',
                            masonry: {
                                columnWidth: '.grid-sizer',
                                gutter: 12
                            }
                        });
                    });

                    // filtros
                    $('.gm-filters').on('click', '.chip', function() {
                        var $b = $(this);
                        $b.addClass('is-active').siblings().removeClass('is-active');
                        $grid.isotope({
                            filter: $b.data('filter')
                        });
                    });

                    // lightbox
                    $('.gallery-nova .popup-image').magnificPopup({
                        type: 'image',
                        gallery: {
                            enabled: true
                        },
                        image: {
                            titleSrc: function(item) {
                                return item.el.attr('data-caption') || '<?= addslashes($Company) ?>';
                            }
                        }
                    });
                }
                // asegúrate que ya están cargados los plugins
                $(window).on('load', initGallery);
            })(jQuery);
        </script>


    </header>