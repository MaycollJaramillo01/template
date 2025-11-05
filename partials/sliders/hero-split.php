<?php
if (!isset($Company)) {
    require_once __DIR__ . '/../../text.php';
}
$ctaText = isset($Estimates) ? $Estimates : 'Free Estimates';
?>
<section class="hero-split" style="padding:clamp(60px,8vw,120px) 0;background:#001832;color:#f8fafc;">
  <div class="container">
    <div class="row align-items-center g-5">
      <div class="col-lg-6">
        <span class="text-uppercase fw-semibold text-info d-inline-flex align-items-center gap-2 mb-3">
          <i class="fas fa-wrench"></i> <?php echo htmlspecialchars($ctaText, ENT_QUOTES, 'UTF-8'); ?>
        </span>
        <h1 class="display-5 fw-bold mb-3"><?php echo htmlspecialchars($Company ?? 'Expert Team', ENT_QUOTES, 'UTF-8'); ?></h1>
        <p class="lead mb-4"><?php echo htmlspecialchars($Home[0] ?? 'From fabrication to repairs, we deliver with precision and care.', ENT_QUOTES, 'UTF-8'); ?></p>
        <div class="d-flex flex-wrap gap-3">
          <a class="btn btn-warning btn-lg" href="/services.php">Explore Services</a>
          <?php if (!empty($MailRef) && !empty($Mail)): ?>
            <a class="btn btn-outline-light btn-lg" href="<?php echo htmlspecialchars($MailRef, ENT_QUOTES, 'UTF-8'); ?>">
              <i class="fas fa-envelope me-2"></i><?php echo htmlspecialchars($Mail, ENT_QUOTES, 'UTF-8'); ?>
            </a>
          <?php endif; ?>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="ratio ratio-4x3 rounded-4 overflow-hidden shadow-lg">
          <iframe src="https://www.youtube.com/embed/<?php echo rawurlencode($VideoID ?? 'dQw4w9WgXcQ'); ?>" title="Showcase"
                  allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
      </div>
    </div>
  </div>
</section>
