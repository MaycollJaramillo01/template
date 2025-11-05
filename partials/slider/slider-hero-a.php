<?php
if (!isset($HomeIntro) || !is_array($HomeIntro)) {
    require_once __DIR__ . '/../../text.php';
}

$intro = isset($HomeIntro) && is_array($HomeIntro) ? $HomeIntro : [];
$eyebrow   = $intro['eyebrow']   ?? ($Estimates ?? 'Mobile Welding Experts');
$headline  = $intro['headline']  ?? ($Company ?? 'Trusted Welding Specialists');
$subhead   = $intro['subheadline'] ?? '';
$lead      = $intro['lead']      ?? ($Home[0] ?? 'Reliable mobile welding whenever you need it.');
$highlights = array_filter($intro['highlights'] ?? []);
$ctas      = array_filter($intro['ctas'] ?? [], function ($cta) {
    return is_array($cta)
        && !empty($cta['label'])
        && !empty($cta['href']);
});

$primaryImage = $HeroImages[0] ?? [];
$heroImageSrc = $primaryImage['src'] ?? '/assets/img/hero/remodel.jpg';
$heroImageAlt = $primaryImage['alt'] ?? 'Mobile welding team at work';
?>
<section class="hero-a" aria-labelledby="hero-a-title">
  <div class="hero-a__media" aria-hidden="true">
    <img src="<?php echo htmlspecialchars($heroImageSrc, ENT_QUOTES, 'UTF-8'); ?>"
         alt="<?php echo htmlspecialchars($heroImageAlt, ENT_QUOTES, 'UTF-8'); ?>">
  </div>
  <div class="hero-a__veil" aria-hidden="true"></div>
  <div class="container hero-a__container">
    <div class="hero-a__content">
      <?php if (!empty($eyebrow)): ?>
        <span class="hero-a__eyebrow"><?php echo htmlspecialchars($eyebrow, ENT_QUOTES, 'UTF-8'); ?></span>
      <?php endif; ?>

      <h1 class="hero-a__headline" id="hero-a-title">
        <?php echo htmlspecialchars($headline, ENT_QUOTES, 'UTF-8'); ?>
      </h1>

      <?php if (!empty($subhead)): ?>
        <p class="hero-a__subhead"><?php echo htmlspecialchars($subhead, ENT_QUOTES, 'UTF-8'); ?></p>
      <?php endif; ?>

      <?php if (!empty($lead)): ?>
        <p class="hero-a__lead"><?php echo htmlspecialchars($lead, ENT_QUOTES, 'UTF-8'); ?></p>
      <?php endif; ?>

      <?php if (!empty($highlights)): ?>
        <ul class="hero-a__highlights">
          <?php foreach ($highlights as $highlight): ?>
            <li><i class="fas fa-check-circle" aria-hidden="true"></i> <?php echo htmlspecialchars($highlight, ENT_QUOTES, 'UTF-8'); ?></li>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>

      <?php if (!empty($ctas)): ?>
        <div class="hero-a__cta">
          <?php foreach ($ctas as $cta): ?>
            <?php
              $style = $cta['style'] ?? 'primary';
              $class = $style === 'outline' ? 'hero-a__btn hero-a__btn--outline' : 'hero-a__btn';
              $icon  = $cta['icon'] ?? '';
            ?>
            <a class="<?php echo $class; ?>"
               href="<?php echo htmlspecialchars($cta['href'], ENT_QUOTES, 'UTF-8'); ?>">
              <?php if (!empty($icon)): ?><i class="<?php echo htmlspecialchars($icon, ENT_QUOTES, 'UTF-8'); ?>" aria-hidden="true"></i><?php endif; ?>
              <?php echo htmlspecialchars($cta['label'], ENT_QUOTES, 'UTF-8'); ?>
            </a>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>
