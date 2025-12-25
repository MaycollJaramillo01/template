<?php
$activeNav = 'Services';
$homePath = '/home-1';
$page_name = 'services.php';
require __DIR__ . '/partials/header-secondary.php';

$pageIntro = $PageIntros['services'] ?? [];
?>

<?php require __DIR__ . '/partials/sections/page-hero.php'; ?>
<?php require __DIR__ . '/partials/sections/services.php'; ?>
<?php require __DIR__ . '/partials/sections/other-service.php'; ?>
<?php require __DIR__ . '/partials/sections/process.php'; ?>
<?php require __DIR__ . '/partials/sections/cta.php'; ?>

<?php require __DIR__ . '/partials/footer.php'; ?>
