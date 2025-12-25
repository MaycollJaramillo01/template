<section class="section" id="contact">
  <div class="container-nova">
    <div style="display:grid; gap: 16px; margin-bottom: 36px;">
      <span class="section-eyebrow"><?php echo htmlspecialchars($ContactIntro['eyebrow'] ?? 'Contact', ENT_QUOTES, 'UTF-8'); ?></span>
      <h2 class="section-title"><?php echo htmlspecialchars($ContactIntro['title'] ?? '', ENT_QUOTES, 'UTF-8'); ?></h2>
      <p class="section-lead"><?php echo htmlspecialchars($ContactIntro['summary'] ?? '', ENT_QUOTES, 'UTF-8'); ?></p>
    </div>
    <div class="contact-grid">
      <?php foreach ($ContactCards as $card): ?>
        <div class="contact-card">
          <h3><?php echo htmlspecialchars($card['title'] ?? '', ENT_QUOTES, 'UTF-8'); ?></h3>
          <?php if (!empty($card['link'])): ?>
            <a href="<?php echo htmlspecialchars($card['link'], ENT_QUOTES, 'UTF-8'); ?>">
              <?php echo htmlspecialchars($card['body'] ?? '', ENT_QUOTES, 'UTF-8'); ?>
            </a>
          <?php else: ?>
            <p><?php echo htmlspecialchars($card['body'] ?? '', ENT_QUOTES, 'UTF-8'); ?></p>
          <?php endif; ?>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
