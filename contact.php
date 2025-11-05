<?php include('header2.php')?>

<!--==============================
  Breadcumb
==============================-->
<div class="breadcumb-wrapper" data-bg-src="assets/img/bg/breadcumb-bg.jpg">
  <div class="container">
    <div class="breadcumb-content">
      <h1 class="breadcumb-title" style="color:#fff">Contact Us</h1>
      <ul class="breadcumb-menu">
        <li><a href="index.php" style="color:#fff">Home</a></li>
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
          <span class="sub-title"><img src="assets/img/icon/footer_title4.svg" alt="icon"> Get In Touch</span>
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
        <form action="mail.php" method="POST" class="contact-form" id="contactForm"
              style="background:#fff;border:1px solid var(--th-border-color);border-radius:16px;padding:18px;box-shadow:0 10px 28px rgba(2,6,23,.06);">
          <h2 class="sec-title">Get a Quote</h2>
          <input type="hidden" name="csrf" value="<?= $_SESSION['csrf'] ?>">
          <!-- honeypot anti-spam -->
          <input type="text" name="website" value="" autocomplete="off" style="position:absolute;left:-10000px;top:auto;width:1px;height:1px;opacity:0;" tabindex="-1" aria-hidden="true">

          <div class="row">
            <div class="form-group col-md-6">
              <label class="label">Your Name</label>
              <input type="text" class="form-control" name="name" placeholder="Name" required>
              <i class="fal fa-user"></i>
            </div>
            <div class="form-group col-md-6">
              <label class="label">Email</label>
              <input type="email" class="form-control" name="email" placeholder="Email" required>
              <i class="fal fa-envelope"></i>
            </div>
            <div class="form-group col-md-6">
              <label class="label">Phone</label>
              <input type="tel" class="form-control" name="number" placeholder="Phone">
              <i class="fal fa-phone"></i>
            </div>
            <div class="form-group col-md-6">
              <label class="label">Service</label>
              <select name="services" class="form-select" required>
                <option value="" disabled selected hidden>Select Service</option>
                <?php for ($i=1; $i<=5; $i++): ?>
                  <option value="<?= htmlspecialchars($SN[$i],ENT_QUOTES) ?>"><?= $SN[$i] ?></option>
                <?php endfor; ?>
              </select>
              <i class="fal fa-chevron-down"></i>
            </div>
            <div class="form-group col-12">
              <label class="label">Message</label>
              <textarea name="message" rows="4" class="form-control" placeholder="Tell us what you need..." required></textarea>
              <i class="fal fa-pencil"></i>
            </div>
            <div class="form-btn col-12">
              <button class="th-btn rounded-12">Submit Request<i class="fas fa-paper-plane ms-2"></i></button>
            </div>
          </div>
          <p class="form-messages mb-0 mt-3"></p>
        </form>
      </div>
    </div>
  </div>
</section>

<div class="contact-map">
  <?= $GoogleMap ?>
</div>

<?php include('footer.php')?>
