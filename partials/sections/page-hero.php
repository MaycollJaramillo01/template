<?php
$pageIntro = $pageIntro ?? [];
?>
<section class="page-hero">
  <div class="container-nova">
    <div class="page-hero__inner">
      <div class="page-hero__eyebrow"><?php echo htmlspecialchars($pageIntro['eyebrow'] ?? '', ENT_QUOTES, 'UTF-8'); ?></div>
      <h1 class="page-hero__title"><?php echo htmlspecialchars($pageIntro['title'] ?? '', ENT_QUOTES, 'UTF-8'); ?></h1>
      <p class="page-hero__summary"><?php echo htmlspecialchars($pageIntro['summary'] ?? '', ENT_QUOTES, 'UTF-8'); ?></p>
    </div>
  </div>
</section>
