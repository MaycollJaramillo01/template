<?php
if (!isset($HomeIntro) || !is_array($HomeIntro)) {
    require_once __DIR__ . '/../../text.php';
}

$intro = isset($HomeIntro) && is_array($HomeIntro) ? $HomeIntro : [];
$eyebrow  = $intro['eyebrow'] ?? ($Estimates ?? 'Mobile Welding Experts');
$headline = $intro['headline'] ?? ($Company ?? 'Trusted Welding Specialists');
$lead     = $intro['lead'] ?? ($Home[0] ?? 'Reliable welding whenever you need it.');
$ctas     = array_filter($intro['ctas'] ?? [], function ($cta) {
    return is_array($cta)
        && !empty($cta['label'])
        && !empty($cta['href']);
});

$slides = [];
$maxSlides = max(count($HeroImages ?? []), count($HeroSlides ?? []));

for ($i = 0; $i < $maxSlides; $i++) {
    $image = $HeroImages[$i] ?? $HeroImages[0] ?? [];
    $slide = $HeroSlides[$i] ?? [];

    $slides[] = [
        'image'   => $image['src'] ?? '/assets/img/hero/siding.jpg',
        'alt'     => $image['alt'] ?? ($Company ?? 'Hero image'),
        'caption' => $image['caption'] ?? ($slide['caption'] ?? ''),
        'title'   => $slide['title'] ?? $headline,
        'text'    => $slide['text'] ?? $lead,
        'badge'   => $slide['badge'] ?? $eyebrow,
    ];
}

if (!$slides) {
    $slides[] = [
        'image'   => $HeroImages[0]['src'] ?? '/assets/img/hero/decks.jpg',
        'alt'     => $HeroImages[0]['alt'] ?? ($Company ?? 'Welding project'),
        'caption' => $HeroImages[0]['caption'] ?? $eyebrow,
        'title'   => $headline,
        'text'    => $lead,
        'badge'   => $eyebrow,
    ];
}

$primaryImage = $HeroImages[0] ?? $slides[0];
$autoplayDelay = isset($intro['autoplay_delay']) ? (int)$intro['autoplay_delay'] : 6500;
if ($autoplayDelay < 3000) {
    $autoplayDelay = 3000;
}
?>
<section class="hero-4 hero-c th-hero-wrapper" aria-label="Featured welding results">
  <div class="hero-img" aria-hidden="true">
    <img src="<?php echo htmlspecialchars($primaryImage['image'] ?? ($primaryImage['src'] ?? '/assets/img/hero/decks.jpg'), ENT_QUOTES, 'UTF-8'); ?>"
         alt="<?php echo htmlspecialchars($primaryImage['alt'] ?? ($Company ?? 'Welding project'), ENT_QUOTES, 'UTF-8'); ?>">
    <?php if (!empty($primaryImage['caption'])): ?>
      <div class="box-badge">
        <div class="box-icon"><i class="fas fa-certificate"></i></div>
        <div class="box-caption"><?php echo htmlspecialchars($primaryImage['caption'], ENT_QUOTES, 'UTF-8'); ?></div>
      </div>
    <?php endif; ?>
  </div>

  <div class="swiper hero-c__slider js-hero-slider-c" data-autoplay-delay="<?php echo (int)$autoplayDelay; ?>">
    <div class="swiper-wrapper">
      <?php foreach ($slides as $slide): ?>
        <div class="swiper-slide">
          <div class="hero-c__background" style="background-image: url('<?php echo htmlspecialchars($slide['image'], ENT_QUOTES, 'UTF-8'); ?>');" aria-hidden="true"></div>
          <div class="hero-c__veil" aria-hidden="true"></div>
          <div class="container">
            <div class="hero-style4 hero-c__content">
              <?php if (!empty($slide['badge'])): ?>
                <span class="sub-title2 hero-c__badge">
                  <i class="fas fa-shield-alt" aria-hidden="true"></i>
                  <?php echo htmlspecialchars($slide['badge'], ENT_QUOTES, 'UTF-8'); ?>
                </span>
              <?php endif; ?>

              <h1 class="hero-title"><?php echo htmlspecialchars($slide['title'], ENT_QUOTES, 'UTF-8'); ?></h1>

              <?php if (!empty($slide['text'])): ?>
                <p class="hero-text"><?php echo htmlspecialchars($slide['text'], ENT_QUOTES, 'UTF-8'); ?></p>
              <?php endif; ?>

              <?php if (!empty($ctas)): ?>
                <div class="hero-c__cta">
                  <?php foreach ($ctas as $cta): ?>
                    <?php
                      $style = $cta['style'] ?? 'primary';
                      $class = $style === 'outline' ? 'hero-c__btn hero-c__btn--outline' : 'hero-c__btn';
                      $icon  = $cta['icon'] ?? '';
                    ?>
                    <a class="<?php echo $class; ?>" href="<?php echo htmlspecialchars($cta['href'], ENT_QUOTES, 'UTF-8'); ?>">
                      <?php if (!empty($icon)): ?><i class="<?php echo htmlspecialchars($icon, ENT_QUOTES, 'UTF-8'); ?>" aria-hidden="true"></i><?php endif; ?>
                      <?php echo htmlspecialchars($cta['label'], ENT_QUOTES, 'UTF-8'); ?>
                    </a>
                  <?php endforeach; ?>
                </div>
              <?php endif; ?>

              <?php if (!empty($slide['caption'])): ?>
                <p class="hero-c__caption"><?php echo htmlspecialchars($slide['caption'], ENT_QUOTES, 'UTF-8'); ?></p>
              <?php endif; ?>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <div class="hero-c__pagination swiper-pagination" aria-hidden="true"></div>
  </div>
</section>
