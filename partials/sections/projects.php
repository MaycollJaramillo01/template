<section class="section" id="projects">
  <div class="container-nova">
    <div style="display:grid; gap: 16px; margin-bottom: 36px;">
      <span class="section-eyebrow"><?php echo htmlspecialchars($ProjectsIntro['eyebrow'] ?? 'Projects', ENT_QUOTES, 'UTF-8'); ?></span>
      <h2 class="section-title"><?php echo htmlspecialchars($ProjectsIntro['title'] ?? '', ENT_QUOTES, 'UTF-8'); ?></h2>
      <p class="section-lead"><?php echo htmlspecialchars($ProjectsIntro['lead'] ?? '', ENT_QUOTES, 'UTF-8'); ?></p>
    </div>
    <div class="projects-grid">
      <?php foreach ($Projects as $project): ?>
        <article class="project-card">
          <img src="<?php echo htmlspecialchars($project['image'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($project['name'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
          <div class="project-card__body">
            <div class="project-card__meta">
              <span><?php echo htmlspecialchars($project['location'] ?? '', ENT_QUOTES, 'UTF-8'); ?></span>
              <span><?php echo htmlspecialchars($project['stat'] ?? '', ENT_QUOTES, 'UTF-8'); ?></span>
            </div>
            <h3 style="font-family: var(--font-display); margin: 10px 0;">
              <?php echo htmlspecialchars($project['name'] ?? '', ENT_QUOTES, 'UTF-8'); ?>
            </h3>
            <p><?php echo htmlspecialchars($project['summary'] ?? '', ENT_QUOTES, 'UTF-8'); ?></p>
          </div>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>
