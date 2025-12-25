<?php
$activeNav = 'Projects';
$homePath = '/home-1';
$page_name = 'gallery.php';
require __DIR__ . '/partials/header-secondary.php';

$pageIntro = $PageIntros['projects'] ?? [];
?>

<?php require __DIR__ . '/partials/sections/page-hero.php'; ?>
<?php require __DIR__ . '/partials/sections/projects.php'; ?>
<?php require __DIR__ . '/partials/sections/cta.php'; ?>

<?php require __DIR__ . '/partials/footer.php'; ?>
