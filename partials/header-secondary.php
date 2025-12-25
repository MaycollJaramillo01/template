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
    'gallery.php'    => 'Projects',
    'portfolio.php'  => 'Portfolio',
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
$fallbackDescription = ($Company ?? 'Our team') . ' delivers modern construction solutions with editorial clarity and technical precision.';
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
    'defaultSiteName' => $Company ?? 'Northline Build Studio',
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

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <base href="/">
  <link rel="icon" type="image/png" sizes="32x32" href="/assets/img/favicons/favicon.png">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="theme-color" content="#ffffff">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,300..700&family=Manrope:wght@300..800&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="/assets/css/fontawesome.min.css">
  <link rel="stylesheet" href="/assets/css/style.css">
  <link rel="stylesheet" href="/assets/css/editorial.css">
</head>

<body>
  <header class="site-header" role="banner">
    <div class="container-nova site-header__inner">
      <a class="site-logo" href="<?php echo htmlspecialchars($homePath, ENT_QUOTES, 'UTF-8'); ?>">
        <img src="/assets/img/logo.png" alt="<?php echo nova_img_alt($Company ?? '', 'Company logo', $Company ?? ''); ?>">
        <span><?php echo htmlspecialchars($Company ?? 'Northline Build Studio', ENT_QUOTES, 'UTF-8'); ?></span>
      </a>
      <nav class="site-nav" aria-label="Main">
        <?php foreach ($navItems as $item): ?>
          <a class="<?php echo nova_navigation_link_class($item['key'], $activeNav); ?>" href="<?php echo htmlspecialchars($item['href'], ENT_QUOTES, 'UTF-8'); ?>">
            <?php echo htmlspecialchars($item['label'], ENT_QUOTES, 'UTF-8'); ?>
          </a>
        <?php endforeach; ?>
      </nav>
    </div>
  </header>
