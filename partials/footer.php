<?php
require_once __DIR__ . '/../text.php';
require_once __DIR__ . '/navigation.php';

$homePath = isset($homePath) && $homePath ? $homePath : '/home-1';
$navItems  = nova_navigation_items($homePath);
$footerSocials = array_filter([
    'LinkedIn' => $linkedin ?? null,
    'Instagram' => $instagram ?? null,
    'Facebook' => $facebook ?? null,
    'X' => $x_link ?? null,
]);
?>
<footer class="site-footer">
  <div class="container-nova">
    <div class="footer-grid">
      <div>
        <div class="site-logo" style="color: var(--color-sand);">
          <img src="/assets/img/logo.png" alt="<?php echo nova_img_alt($Company ?? '', 'Company logo', $Company ?? ''); ?>">
          <span><?php echo htmlspecialchars($Company ?? 'Northline Build Studio', ENT_QUOTES, 'UTF-8'); ?></span>
        </div>
        <p style="margin-top:16px; max-width: 320px; color: rgba(246, 242, 236, 0.85);">
          <?php echo htmlspecialchars($FooterBlurb ?? 'We design and deliver construction environments with an editorial eye and a builder’s discipline.', ENT_QUOTES, 'UTF-8'); ?>
        </p>
      </div>
      <div>
        <h4 style="font-family: var(--font-display);">Studios</h4>
        <p><?php echo htmlspecialchars($Address ?? '', ENT_QUOTES, 'UTF-8'); ?></p>
        <p><a href="<?php echo htmlspecialchars($PhoneRef ?? '#', ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($Phone ?? '', ENT_QUOTES, 'UTF-8'); ?></a></p>
        <p><a href="<?php echo htmlspecialchars($MailRef ?? '#', ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($Mail ?? '', ENT_QUOTES, 'UTF-8'); ?></a></p>
      </div>
      <div>
        <h4 style="font-family: var(--font-display);">Navigation</h4>
        <div style="display:grid; gap:8px;">
          <?php foreach ($navItems as $item): ?>
            <a href="<?php echo htmlspecialchars($item['href'], ENT_QUOTES, 'UTF-8'); ?>" style="color: rgba(246, 242, 236, 0.85);">
              <?php echo htmlspecialchars($item['label'], ENT_QUOTES, 'UTF-8'); ?>
            </a>
          <?php endforeach; ?>
        </div>
      </div>
      <div>
        <h4 style="font-family: var(--font-display);">Signals</h4>
        <p style="color: rgba(246, 242, 236, 0.85);"><?php echo htmlspecialchars($Coverage ?? 'Regional coverage available on request.', ENT_QUOTES, 'UTF-8'); ?></p>
        <?php if (!empty($footerSocials)): ?>
          <div style="display:flex; gap:12px; flex-wrap:wrap; margin-top:12px;">
            <?php foreach ($footerSocials as $label => $url): ?>
              <a href="<?php echo htmlspecialchars($url, ENT_QUOTES, 'UTF-8'); ?>" target="_blank" rel="noopener" style="color: rgba(246, 242, 236, 0.85);">
                <?php echo htmlspecialchars($label, ENT_QUOTES, 'UTF-8'); ?>
              </a>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
    <div class="footer-bottom">
      <span>&copy; <?php echo date('Y'); ?> <?php echo htmlspecialchars($Company ?? 'Northline Build Studio', ENT_QUOTES, 'UTF-8'); ?>. All rights reserved.</span>
    </div>
  </div>
</footer>
</body>
</html>
