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
        'title' => 'Home Layout One',
        'summary' => 'Immersive video hero with detailed service highlights.',
    ],
    [
        'path' => '/home-2',
        'title' => 'Home Layout Two',
        'summary' => 'Classic hero banner with service cards and company story.',
    ],
    [
        'path' => '/home-3',
        'title' => 'Home Layout Three',
        'summary' => 'Split hero with video spotlight and testimonial snapshot.',
    ],
];
?>
<section class="py-5" style="background:#f1f5f9;">
  <div class="container">
    <div class="row justify-content-center text-center mb-5">
      <div class="col-lg-8">
        <span class="badge bg-primary text-light px-3 py-2 mb-3">Choose your experience</span>
        <h1 class="fw-bold mb-3">Select a Home Page Variant</h1>
        <p class="lead text-muted">Explore each layout option to find the presentation that best fits your brand. All variants share the same business data from a single source of truth.</p>
      </div>
    </div>
    <div class="row g-4">
      <?php foreach ($options as $option): ?>
        <div class="col-md-4">
          <div class="card h-100 shadow-sm border-0">
            <div class="card-body p-4 d-flex flex-column">
              <h2 class="h4 fw-bold mb-3"><?php echo htmlspecialchars($option['title'], ENT_QUOTES, 'UTF-8'); ?></h2>
              <p class="text-muted flex-grow-1"><?php echo htmlspecialchars($option['summary'], ENT_QUOTES, 'UTF-8'); ?></p>
              <a class="btn btn-primary mt-4" href="<?php echo htmlspecialchars($option['path'], ENT_QUOTES, 'UTF-8'); ?>">View Layout</a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php require __DIR__ . '/partials/footer.php'; ?>
