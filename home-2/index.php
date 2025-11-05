<?php
$activeNav = 'Home';
$homePath = '/home-2';
require __DIR__ . '/../partials/header.php';
require __DIR__ . '/../partials/sliders/hero-classic.php';
?>
<section class="py-5" style="background:#f8fafc;">
  <div class="container">
    <div class="row g-4 align-items-center">
      <div class="col-lg-6">
        <h2 class="fw-bold mb-3">Why Choose <?php echo htmlspecialchars($Company ?? 'our team', ENT_QUOTES, 'UTF-8'); ?>?</h2>
        <p class="lead mb-3"><?php echo htmlspecialchars($Home[1] ?? 'We combine seasoned craftsmanship with responsive service to deliver results that stand the test of time.', ENT_QUOTES, 'UTF-8'); ?></p>
        <ul class="list-unstyled fs-5">
          <?php if (!empty($LicenseNote)): ?><li class="mb-2"><i class="fas fa-shield-alt text-warning me-2"></i><?php echo htmlspecialchars($LicenseNote, ENT_QUOTES, 'UTF-8'); ?></li><?php endif; ?>
          <?php if (!empty($Experience)): ?><li class="mb-2"><i class="fas fa-clock text-warning me-2"></i><?php echo htmlspecialchars($Experience, ENT_QUOTES, 'UTF-8'); ?></li><?php endif; ?>
          <?php if (!empty($Coverage)): ?><li class="mb-2"><i class="fas fa-map-marker-alt text-warning me-2"></i><?php echo htmlspecialchars($Coverage, ENT_QUOTES, 'UTF-8'); ?></li><?php endif; ?>
        </ul>
        <a class="btn btn-primary btn-lg mt-3" href="/about.php">Learn More</a>
      </div>
      <div class="col-lg-6">
        <div class="ratio ratio-16x9 rounded-4 overflow-hidden shadow">
          <img src="/assets/img/normal/about_3.jpg" alt="Team at work" class="w-100 h-100" style="object-fit:cover;">
        </div>
      </div>
    </div>
  </div>
</section>

<section class="py-5">
  <div class="container">
    <div class="row g-4">
      <?php for ($i = 1; $i <= 3; $i++): ?>
        <?php if (!empty($SN[$i])): ?>
          <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm">
              <div class="card-body p-4">
                <span class="badge bg-warning text-dark mb-3">Service <?php echo $i; ?></span>
                <h3 class="h5 fw-bold"><?php echo htmlspecialchars($SN[$i], ENT_QUOTES, 'UTF-8'); ?></h3>
                <p class="text-muted mb-0"><?php echo htmlspecialchars($SD[$i] ?? 'Tailored solutions backed by our expert crew.', ENT_QUOTES, 'UTF-8'); ?></p>
              </div>
            </div>
          </div>
        <?php endif; ?>
      <?php endfor; ?>
    </div>
  </div>
</section>
<?php require __DIR__ . '/../partials/footer.php'; ?>
