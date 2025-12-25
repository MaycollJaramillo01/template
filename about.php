<?php
$activeNav = 'About';
$homePath = '/home-1';
$page_name = 'about.php';
require __DIR__ . '/partials/header-secondary.php';

$pageIntro = $PageIntros['about'] ?? [];
?>

<?php require __DIR__ . '/partials/sections/page-hero.php'; ?>
<?php require __DIR__ . '/partials/sections/about.php'; ?>
<?php require __DIR__ . '/partials/sections/process.php'; ?>

<section class="section-compact">
  <div class="container-nova">
    <div class="services-grid">
      <article class="service-card">
        <span>Mission</span>
        <h3 style="font-family: var(--font-display); margin: 0;"><?php echo htmlspecialchars($Mission ?? '', ENT_QUOTES, 'UTF-8'); ?></h3>
      </article>
      <article class="service-card">
        <span>Vision</span>
        <h3 style="font-family: var(--font-display); margin: 0;"><?php echo htmlspecialchars($Vision ?? '', ENT_QUOTES, 'UTF-8'); ?></h3>
      </article>
    </div>
  </div>
</section>

<?php require __DIR__ . '/partials/sections/cta.php'; ?>

<?php require __DIR__ . '/partials/footer.php'; ?>
