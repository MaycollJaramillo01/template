<section class="section" id="process">
  <div class="container-nova">
    <div style="display:grid; gap: 16px; margin-bottom: 36px;">
      <span class="section-eyebrow"><?php echo htmlspecialchars($ProcessIntro['eyebrow'] ?? 'Process', ENT_QUOTES, 'UTF-8'); ?></span>
      <h2 class="section-title"><?php echo htmlspecialchars($ProcessIntro['title'] ?? '', ENT_QUOTES, 'UTF-8'); ?></h2>
      <p class="section-lead"><?php echo htmlspecialchars($ProcessIntro['lead'] ?? '', ENT_QUOTES, 'UTF-8'); ?></p>
    </div>
    <div class="process-grid">
      <?php foreach ($ProcessSteps as $index => $step): ?>
        <article class="process-step">
          <div class="process-step__index">Step <?php echo str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT); ?></div>
          <h3 style="font-family: var(--font-display); margin-top: 10px;">
            <?php echo htmlspecialchars($step['title'] ?? '', ENT_QUOTES, 'UTF-8'); ?>
          </h3>
          <p><?php echo htmlspecialchars($step['summary'] ?? '', ENT_QUOTES, 'UTF-8'); ?></p>
          <?php if (!empty($step['deliverable'])): ?>
            <p style="font-size: 0.9rem; color: var(--color-slate);">
              Deliverable: <?php echo htmlspecialchars($step['deliverable'], ENT_QUOTES, 'UTF-8'); ?>
            </p>
          <?php endif; ?>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>
