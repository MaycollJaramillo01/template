<?php
$activeNav = 'Contact';
$homePath = '/home-1';
$page_name = 'contact.php';
require __DIR__ . '/partials/header-secondary.php';
?>

<!--==============================
  Breadcumb
==============================-->
<div class="breadcumb-wrapper" data-bg-src="assets/img/bg/breadcumb-bg.jpg">
  <div class="container">
    <div class="breadcumb-content">
      <h1 class="breadcumb-title" style="color:#fff">Contact Us</h1>
      <ul class="breadcumb-menu">
        <li><a href="/home-1" style="color:#fff">Home</a></li>
        <li style="color:#fff">Contact Us</li>
      </ul>
    </div>
  </div>
</div>

<?php
// CSRF token
if (session_status() !== PHP_SESSION_ACTIVE) { @session_start(); }
if (empty($_SESSION['csrf'])) { $_SESSION['csrf'] = bin2hex(random_bytes(16)); }

// Flash messages
$flash_ok  = $_SESSION['contact_ok']  ?? '';
$flash_err = $_SESSION['contact_err'] ?? '';
unset($_SESSION['contact_ok'], $_SESSION['contact_err']);
?>

<!--==============================
  Contact Info + Form
==============================-->
<section class="space">
  <div class="container">
    <?php if($flash_ok): ?>
      <div class="alert-success" style="margin-bottom:16px;border:1px solid #a7f3d0;background:#ecfdf5;color:#065f46;padding:12px 14px;border-radius:12px;font-weight:700;">
        <?= htmlspecialchars($flash_ok, ENT_QUOTES) ?>
      </div>
    <?php endif; ?>
    <?php if($flash_err): ?>
      <div class="alert-error" style="margin-bottom:16px;border:1px solid #fecaca;background:#fef2f2;color:#7f1d1d;padding:12px 14px;border-radius:12px;font-weight:700;">
        <?= htmlspecialchars($flash_err, ENT_QUOTES) ?>
      </div>
    <?php endif; ?>

    <div class="row g-4 align-items-stretch">
      <!-- Col: Datos -->
      <div class="col-lg-5">
        <div class="contact-card" style="height:100%;background:#fff;border:1px solid var(--th-border-color);border-radius:16px;padding:18px;box-shadow:0 10px 28px rgba(2,6,23,.06);">
          <span class="sub-title"><img src="assets/img/icon/footer_title4.svg" alt="<?php echo nova_img_alt('Contact icon', 'Contact section icon', $Company ?? ''); ?>"> Get In Touch</span>
          <h2 class="sec-title" style="margin-top:8px;">Our Contact Information</h2>
          <div class="team-contact">
  <!-- Address -->
  <div class="ci">
    <div class="ci__icon"><i class="fas fa-location-dot"></i></div>
    <div class="ci__body">
      <h5 class="ci__label">Address</h5>
      <p class="ci__value"><?= $Address ?></p>
    </div>
  </div>

  <!-- Phone -->
  <div class="ci">
    <div class="ci__icon"><i class="fas fa-phone"></i></div>
    <div class="ci__body">
      <h5 class="ci__label">Phone</h5>
      <p class="ci__value"><a href="<?= $PhoneRef ?>"><?= $Phone ?></a></p>
    </div>
  </div>

  <!-- Email -->
  <div class="ci">
    <div class="ci__icon"><i class="fas fa-envelope"></i></div>
    <div class="ci__body">
      <h5 class="ci__label">Email</h5>
      <p class="ci__value ci__value--break">
        <a href="<?= $MailRef ?>"><?= $Mail ?></a>
      </p>
    </div>
  </div>
</div>

          <div class="mt-3">
            <a class="th-btn rounded-12" href="<?= $whatsapp ?>" target="_blank" rel="noopener">
              WhatsApp Us <i class="fab fa-whatsapp ms-2"></i>
            </a>
          </div>
        </div>
      </div>

      <!-- Col: Form -->
      <div class="col-lg-7">
        <?php
        $formAction = '/php/mail.php';
        $formId = 'contactForm';
        $csrfToken = $_SESSION['csrf'] ?? '';
        require __DIR__ . '/partials/forms/contact-form.php';
        ?>
      </div>
    </div>
  </div>
</section>

<div class="contact-map">
  <?= $GoogleMap ?>
</div>

<?php require __DIR__ . '/partials/footer.php'; ?>
