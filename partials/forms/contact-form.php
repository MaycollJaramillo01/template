<?php
$formAction = isset($formAction) && $formAction ? $formAction : '/php/mail.php';
$formId     = isset($formId) && $formId ? $formId : 'contactForm';
$csrfToken  = isset($csrfToken) ? $csrfToken : (isset($_SESSION['csrf']) ? $_SESSION['csrf'] : '');
$servicesList = [];
if (isset($servicesListOverride) && is_array($servicesListOverride)) {
    $servicesList = $servicesListOverride;
} elseif (isset($SN) && is_array($SN)) {
    $servicesList = $SN;
}
?>
<form action="<?php echo htmlspecialchars($formAction, ENT_QUOTES, 'UTF-8'); ?>" method="POST"
      class="contact-form" id="<?php echo htmlspecialchars($formId, ENT_QUOTES, 'UTF-8'); ?>"
      style="background:#fff;border:1px solid var(--th-border-color);border-radius:16px;padding:18px;box-shadow:0 10px 28px rgba(2,6,23,.06);">
  <h2 class="sec-title">Get a Quote</h2>
  <input type="hidden" name="csrf" value="<?php echo htmlspecialchars($csrfToken, ENT_QUOTES, 'UTF-8'); ?>">
  <!-- honeypot anti-spam -->
  <input type="text" name="website" value="" autocomplete="off"
         style="position:absolute;left:-10000px;top:auto;width:1px;height:1px;opacity:0;"
         tabindex="-1" aria-hidden="true">

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
        <?php for ($i = 1; $i <= 5; $i++): ?>
          <?php if (!empty($servicesList[$i])): ?>
            <option value="<?php echo htmlspecialchars($servicesList[$i], ENT_QUOTES, 'UTF-8'); ?>">
              <?php echo htmlspecialchars($servicesList[$i], ENT_QUOTES, 'UTF-8'); ?>
            </option>
          <?php endif; ?>
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
