<?php
$activeNav = 'Contact';
$homePath = '/home-1';
$page_name = 'contact.php';
require __DIR__ . '/partials/header-secondary.php';

$pageIntro = $PageIntros['contact'] ?? [];

if (session_status() !== PHP_SESSION_ACTIVE) { @session_start(); }
if (empty($_SESSION['csrf'])) { $_SESSION['csrf'] = bin2hex(random_bytes(16)); }

$flash_ok  = $_SESSION['contact_ok']  ?? '';
$flash_err = $_SESSION['contact_err'] ?? '';
unset($_SESSION['contact_ok'], $_SESSION['contact_err']);
?>

<?php require __DIR__ . '/partials/sections/page-hero.php'; ?>
<?php require __DIR__ . '/partials/sections/contact.php'; ?>

<section class="section">
  <div class="container-nova">
    <?php if($flash_ok): ?>
      <div class="contact-card" style="border-left: 4px solid var(--color-moss); margin-bottom: 24px;">
        <?php echo htmlspecialchars($flash_ok, ENT_QUOTES); ?>
      </div>
    <?php endif; ?>
    <?php if($flash_err): ?>
      <div class="contact-card" style="border-left: 4px solid #b91c1c; margin-bottom: 24px;">
        <?php echo htmlspecialchars($flash_err, ENT_QUOTES); ?>
      </div>
    <?php endif; ?>

    <div class="contact-grid">
      <div class="contact-card">
        <h3>Send a project brief</h3>
        <p>Share scope, timeline, and key stakeholders. Our team replies with an initial sequence and next steps.</p>
        <?php
          $formAction = '/php/mail.php';
          $formId = 'contactForm';
          $csrfToken = $_SESSION['csrf'] ?? '';
          require __DIR__ . '/partials/forms/contact-form.php';
        ?>
      </div>
      <div class="contact-card">
        <h3>Studio footprint</h3>
        <p><?php echo htmlspecialchars($Coverage ?? '', ENT_QUOTES, 'UTF-8'); ?></p>
        <div style="margin-top: 16px;">
          <?php echo $GoogleMap; ?>
        </div>
      </div>
    </div>
  </div>
</section>

<?php require __DIR__ . '/partials/footer.php'; ?>
