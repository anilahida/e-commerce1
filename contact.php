<?php
require_once __DIR__ . '/includes/init.php';
$currentPage = 'contact';
$baseUrl = '';
$errors = [];
$success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $subject = trim($_POST['subject'] ?? '');
    $message = trim($_POST['message'] ?? '');

    if (strlen($name) < 3) $errors['name'] = 'Te pakten 3 shkronja.';
    if (empty($name)) $errors['name'] = 'Vendosni emrin.';

    if (empty($email)) $errors['email'] = 'Vendosni email.';
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors['email'] = 'Email i pavlefshem.';

    if (empty($message)) $errors['message'] = 'Shkruani mesazhin.';
    elseif (strlen($message) < 10) $errors['message'] = 'Mesazhi shume i shurt (min 10).';

    if (empty($errors)) {
        $contactModel->save($name, $email, $subject, $message);
        $success = true;
    }
}

require_once __DIR__ . '/includes/header.php';
?>

<section id="page-header" class="contact-header">
    <h2>Na kontaktoni</h2>
    <p>Na lini një mesazh – jemi këtu për ju</p>
</section>

<section id="contact-details" class="section-p1">
    <div class="details">
        <span>INFO</span>
        <h2>Ku jemi</h2>
        <ul class="contact-list">
            <li><i class="fas fa-map-marker-alt"></i><p>Rruga Garibaldi nr 18</p></li>
            <li><i class="fas fa-envelope"></i><p>info@eshop.example.com</p></li>
            <li><i class="fas fa-phone-alt"></i><p>+383 49 631 638</p></li>
            <li><i class="fas fa-clock"></i><p>Hënë - Shtunë: 10:00 - 18:00</p></li>
        </ul>
    </div>
    <div class="form-details">
        <?php if ($success): ?>
        <p style="color:green; margin-bottom:15px;">Mesazhi u dergua. Faleminderit!</p>
        <?php endif; ?>
        <form id="contact-form" action="contact.php" method="post">
            <span>MESAZH</span>
            <h2>Forma e kontaktit</h2>
            <input type="text" id="contact-name" name="name" placeholder="Emri dhe mbiemri juaj" value="<?php echo h($_POST['name'] ?? ''); ?>" required>
            <span class="error-msg" id="contact-name-error"><?php echo isset($errors['name']) ? h($errors['name']) : ''; ?></span>
            <input type="email" id="contact-email" name="email" placeholder="Email juaj" value="<?php echo h($_POST['email'] ?? ''); ?>" required>
            <span class="error-msg" id="contact-email-error"><?php echo isset($errors['email']) ? h($errors['email']) : ''; ?></span>
            <input type="text" id="contact-subject" name="subject" placeholder="Subjekti" value="<?php echo h($_POST['subject'] ?? ''); ?>">
            <textarea id="contact-message" name="message" cols="30" rows="10" placeholder="Mesazhi juaj" required><?php echo h($_POST['message'] ?? ''); ?></textarea>
            <span class="error-msg" id="contact-message-error"><?php echo isset($errors['message']) ? h($errors['message']) : ''; ?></span>
            <button type="submit" class="normal">Dërgo</button>
        </form>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
