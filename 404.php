<?php
$activeNav = '';
$homePath = '/home-1';
$page_name = '404.php';
require __DIR__ . '/partials/header-secondary.php';

$pageIntro = [
  'eyebrow' => '404',
  'title' => 'This page has moved off the site grid.',
  'summary' => 'The link may be outdated or the path no longer exists. Choose a destination below.'
];
?>

<?php require __DIR__ . '/partials/sections/page-hero.php'; ?>

<section class="section">
  <div class="container-nova">
    <div class="services-grid">
      <article class="service-card">
        <span>Start here</span>
        <h3 style="font-family: var(--font-display); margin: 0;">Return to the homepage for the latest build narrative.</h3>
        <a class="btn-secondary-nova" href="/home-1">Back to Home</a>
      </article>
      <article class="service-card">
        <span>Connect</span>
        <h3 style="font-family: var(--font-display); margin: 0;">Reach the studio directly if you need a project brief.</h3>
        <a class="btn-secondary-nova" href="/contact.php">Contact the Studio</a>
      </article>
    </div>
  </div>
</section>

<?php require __DIR__ . '/partials/footer.php'; ?>
