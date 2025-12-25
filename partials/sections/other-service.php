<section class="section-compact">
  <div class="container-nova">
    <div class="other-service">
      <div>
        <span class="section-eyebrow" style="color: rgba(246, 242, 236, 0.7);">Other Capability</span>
        <h2 style="font-family: var(--font-display); margin-top: 10px;">
          <?php echo htmlspecialchars($OtherService['title'] ?? '', ENT_QUOTES, 'UTF-8'); ?>
        </h2>
      </div>
      <div>
        <p style="margin-bottom: 12px;">
          <?php echo htmlspecialchars($OtherService['summary'] ?? '', ENT_QUOTES, 'UTF-8'); ?>
        </p>
        <?php if (!empty($OtherService['bullets'])): ?>
          <ul>
            <?php foreach ($OtherService['bullets'] as $bullet): ?>
              <li><?php echo htmlspecialchars($bullet, ENT_QUOTES, 'UTF-8'); ?></li>
            <?php endforeach; ?>
          </ul>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>
