<?php
$routes = [
    '/home-1' => __DIR__ . '/home-1/index.php',
    '/home-2' => __DIR__ . '/home-2/index.php',
    '/home-3' => __DIR__ . '/home-3/index.php',
];

$requestPath = isset($_SERVER['REQUEST_URI']) ? (string) $_SERVER['REQUEST_URI'] : '/';
$path = parse_url($requestPath, PHP_URL_PATH);
$path = $path !== null ? $path : '/';
$normalized = rtrim($path, '/');
if ($normalized === '') {
    $normalized = '/';
}
if ($normalized === '/index.php') {
    $normalized = '/';
}

if (isset($routes[$normalized])) {
    require $routes[$normalized];
    return;
}

http_response_code(200);
$activeNav = '';
$homePath = '/home-1';
require __DIR__ . '/partials/header-secondary.php';

$options = [
    [
        'path' => '/home-1',
        'title' => 'Editorial Narrative',
        'summary' => 'Hero-led storytelling with layered service and process cues.',
    ],
    [
        'path' => '/home-2',
        'title' => 'Studio Profile',
        'summary' => 'A people-first layout that surfaces the studio mission early.',
    ],
    [
        'path' => '/home-3',
        'title' => 'Execution Focus',
        'summary' => 'Process-forward layout for teams that lead with method.',
    ],
];
?>
<section class="section">
  <div class="container-nova">
    <div style="text-align:center; max-width: 680px; margin: 0 auto 40px;">
      <span class="section-eyebrow">Select a direction</span>
      <h1 class="section-title">Choose your homepage narrative</h1>
      <p class="section-lead">Each option uses the same data source and modular sections, but with a different story order and visual emphasis.</p>
    </div>
    <div class="services-grid">
      <?php foreach ($options as $option): ?>
        <article class="service-card">
          <span><?php echo htmlspecialchars($option['title'], ENT_QUOTES, 'UTF-8'); ?></span>
          <h3 style="font-family: var(--font-display); margin: 0;">
            <?php echo htmlspecialchars($option['summary'], ENT_QUOTES, 'UTF-8'); ?>
          </h3>
          <a class="btn-secondary-nova" href="<?php echo htmlspecialchars($option['path'], ENT_QUOTES, 'UTF-8'); ?>">Explore Layout</a>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php require __DIR__ . '/partials/footer.php'; ?>
