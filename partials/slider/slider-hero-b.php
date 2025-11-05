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
if (isset($HeroSlides) && is_array($HeroSlides) && count($HeroSlides)) {
    $slides = $HeroSlides;
}

if (!$slides) {
    $defaultImage = $HeroImages[0]['src'] ?? '/assets/img/hero/remodel.jpg';
    $slides[] = [
        'title' => $headline,
        'text'  => $lead,
        'badge' => $eyebrow,
        'image' => $defaultImage,
    ];
}

$autoplayDelay = isset($intro['autoplay_delay']) ? (int)$intro['autoplay_delay'] : 6000;
if ($autoplayDelay < 3000) {
    $autoplayDelay = 3000;
}
?>
<section class="hero-b th-hero-wrapper" aria-label="Company highlights">
  <div class="swiper hero-b__slider js-hero-slider-b" data-autoplay-delay="<?php echo (int)$autoplayDelay; ?>">
    <div class="swiper-wrapper">
      <?php foreach ($slides as $slide): ?>
        <?php
          $slideTitle = $slide['title'] ?? $headline;
          $slideText  = $slide['text'] ?? $lead;
          $slideBadge = $slide['badge'] ?? $eyebrow;
          $imageIndex = $slide['image_index'] ?? null;
          $slideImage = $slide['image'] ?? null;

          if ($imageIndex !== null && isset($HeroImages[$imageIndex]['src'])) {
              $slideImage = $HeroImages[$imageIndex]['src'];
          }

          if (!$slideImage) {
              $slideImage = $HeroImages[0]['src'] ?? '/assets/img/hero/remodel.jpg';
          }

          $imageAlt = '';
          if ($imageIndex !== null && isset($HeroImages[$imageIndex]['alt'])) {
              $imageAlt = $HeroImages[$imageIndex]['alt'];
          } elseif (!empty($HeroImages[0]['alt'])) {
              $imageAlt = $HeroImages[0]['alt'];
          } else {
              $imageAlt = $Company ?? 'Project image';
          }
        ?>
        <div class="swiper-slide">
          <div class="hero-b__bg" style="background-image: url('<?php echo htmlspecialchars($slideImage, ENT_QUOTES, 'UTF-8'); ?>');" aria-hidden="true"></div>
          <div class="hero-b__veil" aria-hidden="true"></div>
          <div class="container hero-b__container">
            <div class="hero-b__content">
              <?php if (!empty($slideBadge)): ?>
                <span class="hero-b__badge">
                  <i class="fas fa-bolt" aria-hidden="true"></i>
                  <?php echo htmlspecialchars($slideBadge, ENT_QUOTES, 'UTF-8'); ?>
                </span>
              <?php endif; ?>

              <h1 class="hero-b__title"><?php echo htmlspecialchars($slideTitle, ENT_QUOTES, 'UTF-8'); ?></h1>

              <?php if (!empty($slideText)): ?>
                <p class="hero-b__text"><?php echo htmlspecialchars($slideText, ENT_QUOTES, 'UTF-8'); ?></p>
              <?php endif; ?>

              <?php if (!empty($ctas)): ?>
                <div class="hero-b__cta">
                  <?php foreach ($ctas as $cta): ?>
                    <?php
                      $style = $cta['style'] ?? 'primary';
                      $class = $style === 'outline' ? 'hero-b__btn hero-b__btn--outline' : 'hero-b__btn';
                      $icon  = $cta['icon'] ?? '';
                    ?>
                    <a class="<?php echo $class; ?>" href="<?php echo htmlspecialchars($cta['href'], ENT_QUOTES, 'UTF-8'); ?>">
                      <?php if (!empty($icon)): ?><i class="<?php echo htmlspecialchars($icon, ENT_QUOTES, 'UTF-8'); ?>" aria-hidden="true"></i><?php endif; ?>
                      <?php echo htmlspecialchars($cta['label'], ENT_QUOTES, 'UTF-8'); ?>
                    </a>
                  <?php endforeach; ?>
                </div>
              <?php endif; ?>

              <?php if (!empty($slide['caption']) || ($imageAlt && count($slides) > 1)): ?>
                <p class="hero-b__caption">
                  <?php echo htmlspecialchars($slide['caption'] ?? $imageAlt, ENT_QUOTES, 'UTF-8'); ?>
                </p>
              <?php endif; ?>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <div class="hero-b__pagination swiper-pagination" aria-hidden="true"></div>
    <button class="hero-b__nav hero-b__nav--prev" type="button" aria-label="Previous slide"><i class="fas fa-chevron-left"></i></button>
    <button class="hero-b__nav hero-b__nav--next" type="button" aria-label="Next slide"><i class="fas fa-chevron-right"></i></button>
  </div>
</section>
