<?php
$heroVariant = isset($heroVariant) ? $heroVariant : 'editorial';
$heroMediaIndex = isset($heroMediaIndex) ? (int) $heroMediaIndex : 0;
$heroMedia = $HeroMedia[$heroMediaIndex] ?? ($HeroMedia[0] ?? null);
?>
<section class="hero hero--<?php echo htmlspecialchars($heroVariant, ENT_QUOTES, 'UTF-8'); ?>">
  <div class="container-nova">
    <div class="hero__grid">
      <div>
        <?php if (!empty($Hero['eyebrow'])): ?>
          <div class="section-eyebrow"><?php echo htmlspecialchars($Hero['eyebrow'], ENT_QUOTES, 'UTF-8'); ?></div>
        <?php endif; ?>
        <h1 class="hero__headline"><?php echo htmlspecialchars($Hero['headline'] ?? '', ENT_QUOTES, 'UTF-8'); ?></h1>
        <p class="hero__lead"><?php echo htmlspecialchars($Hero['subheadline'] ?? '', ENT_QUOTES, 'UTF-8'); ?></p>
        <?php if (!empty($Hero['lead'])): ?>
          <p class="section-lead"><?php echo htmlspecialchars($Hero['lead'], ENT_QUOTES, 'UTF-8'); ?></p>
        <?php endif; ?>
        <?php if (!empty($Hero['ctas'])): ?>
          <div style="display:flex; gap:12px; flex-wrap:wrap; margin-top: 18px;">
            <?php foreach ($Hero['ctas'] as $cta): ?>
              <?php if (!empty($cta['href']) && !empty($cta['label'])): ?>
                <a class="<?php echo ($cta['style'] ?? 'primary') === 'outline' ? 'btn-secondary-nova' : 'btn-primary-nova'; ?>" href="<?php echo htmlspecialchars($cta['href'], ENT_QUOTES, 'UTF-8'); ?>">
                  <?php echo htmlspecialchars($cta['label'], ENT_QUOTES, 'UTF-8'); ?>
                </a>
              <?php endif; ?>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
        <?php if (!empty($Hero['highlights'])): ?>
          <div class="hero__meta" style="margin-top: 22px;">
            <?php foreach ($Hero['highlights'] as $highlight): ?>
              <span><?php echo htmlspecialchars($highlight, ENT_QUOTES, 'UTF-8'); ?></span>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
        <?php if (!empty($HeroStats)): ?>
          <div class="hero__stats">
            <?php foreach ($HeroStats as $stat): ?>
              <div class="hero__stat">
                <strong><?php echo htmlspecialchars($stat['value'] ?? '', ENT_QUOTES, 'UTF-8'); ?></strong>
                <span><?php echo htmlspecialchars($stat['label'] ?? '', ENT_QUOTES, 'UTF-8'); ?></span>
              </div>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
      </div>
      <?php if (!empty($heroMedia)): ?>
        <div class="hero__media">
          <img src="<?php echo htmlspecialchars($heroMedia['src'], ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($heroMedia['alt'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
          <?php if (!empty($heroMedia['caption'])): ?>
            <div class="hero__badge"><?php echo htmlspecialchars($heroMedia['caption'], ENT_QUOTES, 'UTF-8'); ?></div>
          <?php elseif (!empty($Hero['badge'])): ?>
            <div class="hero__badge"><?php echo htmlspecialchars($Hero['badge'], ENT_QUOTES, 'UTF-8'); ?></div>
          <?php endif; ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>
