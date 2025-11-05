<?php
$activeNav    = 'Home';
$homePath     = '/home-3';
$heroVariant  = 'hero-a';

require __DIR__ . '/../php/slider-loader.php';
$heroSlider       = nova_slider_prepare($heroVariant);
$extraHeroStyles  = $heroSlider['styles'];
$extraHeroScripts = $heroSlider['scripts'];

require __DIR__ . '/../partials/header.php';
nova_slider_render($heroSlider);
$experienceYearsVal = 0;
if (!empty($Experience) && preg_match('/\d+/', (string) $Experience, $match)) {
    $experienceYearsVal = (int) $match[0];
}
?>
<section class="py-5" style="background:#0f172a;color:#f8fafc;">
  <div class="container">
    <div class="row g-4 align-items-start">
      <div class="col-lg-4">
        <div class="p-4 rounded-4 h-100" style="background:#16233f;">
          <h3 class="h4 fw-bold mb-3">Quick Facts</h3>
          <ul class="list-unstyled mb-0">
            <?php if ($experienceYearsVal > 0): ?>
              <li class="mb-3"><span class="fw-semibold">Experience:</span> <?php echo htmlspecialchars($experienceYearsVal . ' years', ENT_QUOTES, 'UTF-8'); ?></li>
            <?php endif; ?>
            <?php if (!empty($Payment)): ?>
              <li class="mb-3"><span class="fw-semibold">Payment:</span> <?php echo htmlspecialchars($Payment, ENT_QUOTES, 'UTF-8'); ?></li>
            <?php endif; ?>
            <?php if (!empty($Schedule)): ?>
              <li class="mb-3"><span class="fw-semibold">Hours:</span> <?php echo htmlspecialchars($Schedule, ENT_QUOTES, 'UTF-8'); ?></li>
            <?php endif; ?>
          </ul>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="p-4 rounded-4 bg-white text-dark h-100">
          <h2 class="fw-bold mb-3">Testimonials Snapshot</h2>
          <p class="mb-4">Here is what clients say about working with <?php echo htmlspecialchars($Company ?? 'our company', ENT_QUOTES, 'UTF-8'); ?>:</p>
          <div class="row g-3">
            <?php
            $testimonials = isset($Testimonials) && is_array($Testimonials) ? $Testimonials : [];
            $count = 0;
            foreach ($testimonials as $testimonial) {
                if ($count >= 2) { break; }
                $name = isset($testimonial['name']) ? $testimonial['name'] : 'Client';
                $quote = isset($testimonial['text']) ? $testimonial['text'] : '';
            ?>
              <div class="col-md-6">
                <div class="border rounded-4 h-100 p-4 shadow-sm">
                  <p class="text-muted mb-3">“<?php echo htmlspecialchars($quote, ENT_QUOTES, 'UTF-8'); ?>”</p>
                  <p class="fw-semibold mb-0"><?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?></p>
                </div>
              </div>
            <?php
                $count++;
            }
            if ($count === 0):
            ?>
              <div class="col-12">
                <div class="border rounded-4 p-4 text-center text-muted">
                  No testimonials have been published yet. Share your experience with us!
                </div>
              </div>
            <?php endif; ?>
          </div>
          <a class="btn btn-outline-primary mt-4" href="/contact.php">Share Your Feedback</a>
        </div>
      </div>
    </div>
  </div>
</section>
<?php require __DIR__ . '/../partials/footer.php'; ?>
