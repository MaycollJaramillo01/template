<?php
if (!isset($Company)) {
    require_once __DIR__ . '/../../text.php';
}
$primaryPhrase = isset($Phrase[0]) ? $Phrase[0] : 'Quality Craftsmanship';
$secondaryPhrase = isset($Phrase[1]) ? $Phrase[1] : 'Trusted experts ready to help.';
?>
<section class="hero-classic" style="position:relative;min-height:70vh;display:flex;align-items:center;justify-content:center;background:url('/assets/img/normal/about_4.jpg') center/cover no-repeat;">
  <div class="hero-classic__veil" style="position:absolute;inset:0;background:rgba(0,23,54,0.6);"></div>
  <div class="container position-relative" style="z-index:1;">
    <div class="row justify-content-center text-center text-white">
      <div class="col-xl-8">
        <span class="badge rounded-pill bg-info text-dark px-3 py-2 mb-3">Serving <?php echo htmlspecialchars($Coverage ?? 'your area', ENT_QUOTES, 'UTF-8'); ?></span>
        <h1 class="display-4 fw-bold mb-3"><?php echo htmlspecialchars($Company ?? 'Our Company', ENT_QUOTES, 'UTF-8'); ?></h1>
        <p class="lead mb-4"><?php echo htmlspecialchars($primaryPhrase, ENT_QUOTES, 'UTF-8'); ?></p>
        <p class="mb-5 text-light"><?php echo htmlspecialchars($secondaryPhrase, ENT_QUOTES, 'UTF-8'); ?></p>
        <div class="d-flex flex-wrap gap-3 justify-content-center">
          <a class="btn btn-warning btn-lg" href="/contact.php">Request a Quote</a>
          <?php if (!empty($PhoneRef) && !empty($Phone)): ?>
            <a class="btn btn-outline-light btn-lg" href="<?php echo htmlspecialchars($PhoneRef, ENT_QUOTES, 'UTF-8'); ?>">
              <i class="fas fa-phone me-2"></i><?php echo htmlspecialchars($Phone, ENT_QUOTES, 'UTF-8'); ?>
            </a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>
