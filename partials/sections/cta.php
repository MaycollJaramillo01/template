<section class="section-compact">
  <div class="container-nova">
    <div class="cta-band">
      <div>
        <span class="section-eyebrow" style="color: rgba(246, 242, 236, 0.7);">Next Step</span>
        <h2 style="font-family: var(--font-display); margin-top: 10px;">
          <?php echo htmlspecialchars($CTA['headline'] ?? '', ENT_QUOTES, 'UTF-8'); ?>
        </h2>
      </div>
      <div>
        <p style="margin-bottom: 16px; color: rgba(246, 242, 236, 0.85);">
          <?php echo htmlspecialchars($CTA['summary'] ?? '', ENT_QUOTES, 'UTF-8'); ?>
        </p>
        <div style="display:flex; gap:12px; flex-wrap:wrap;">
          <?php if (!empty($CTA['primary'])): ?>
            <a class="btn-primary-nova" href="<?php echo htmlspecialchars($CTA['primary']['href'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
              <?php echo htmlspecialchars($CTA['primary']['label'] ?? '', ENT_QUOTES, 'UTF-8'); ?>
            </a>
          <?php endif; ?>
          <?php if (!empty($CTA['secondary'])): ?>
            <a class="btn-secondary-nova" href="<?php echo htmlspecialchars($CTA['secondary']['href'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
              <?php echo htmlspecialchars($CTA['secondary']['label'] ?? '', ENT_QUOTES, 'UTF-8'); ?>
            </a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>
