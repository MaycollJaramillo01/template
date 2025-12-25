<section class="section" id="services">
  <div class="container-nova">
    <div style="display:grid; gap: 16px; margin-bottom: 36px;">
      <span class="section-eyebrow"><?php echo htmlspecialchars($ServicesIntro['eyebrow'] ?? 'Services', ENT_QUOTES, 'UTF-8'); ?></span>
      <h2 class="section-title"><?php echo htmlspecialchars($ServicesIntro['title'] ?? '', ENT_QUOTES, 'UTF-8'); ?></h2>
      <p class="section-lead"><?php echo htmlspecialchars($ServicesIntro['lead'] ?? '', ENT_QUOTES, 'UTF-8'); ?></p>
    </div>
    <div class="services-grid">
      <?php foreach ($ServicesList as $service): ?>
        <article class="service-card">
          <span><?php echo htmlspecialchars($service['tag'] ?? '', ENT_QUOTES, 'UTF-8'); ?> / <?php echo htmlspecialchars($service['title'] ?? '', ENT_QUOTES, 'UTF-8'); ?></span>
          <h3 style="font-family: var(--font-display); font-size: 1.4rem; margin: 0;">
            <?php echo htmlspecialchars($service['summary'] ?? '', ENT_QUOTES, 'UTF-8'); ?>
          </h3>
          <p><?php echo htmlspecialchars($service['detail'] ?? '', ENT_QUOTES, 'UTF-8'); ?></p>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>
