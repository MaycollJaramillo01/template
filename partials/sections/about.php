<section class="section" id="about">
  <div class="container-nova">
    <div class="about-grid">
      <div>
        <span class="section-eyebrow"><?php echo htmlspecialchars($AboutSection['eyebrow'] ?? 'About', ENT_QUOTES, 'UTF-8'); ?></span>
        <h2 class="section-title"><?php echo htmlspecialchars($AboutSection['headline'] ?? '', ENT_QUOTES, 'UTF-8'); ?></h2>
        <p class="section-lead"><?php echo htmlspecialchars($AboutSection['lead'] ?? '', ENT_QUOTES, 'UTF-8'); ?></p>
        <p><?php echo htmlspecialchars($AboutSection['body'] ?? '', ENT_QUOTES, 'UTF-8'); ?></p>
        <?php if (!empty($AboutSection['values'])): ?>
          <div class="about-values">
            <?php foreach ($AboutSection['values'] as $value): ?>
              <span><?php echo htmlspecialchars($value, ENT_QUOTES, 'UTF-8'); ?></span>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
      </div>
      <div class="about-image">
        <img src="<?php echo htmlspecialchars($AboutSection['image'] ?? '/assets/img/normal/about_3.jpg', ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($AboutSection['headline'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
      </div>
    </div>
  </div>
</section>
