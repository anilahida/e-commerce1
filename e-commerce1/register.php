<?php
require_once __DIR__ . '/includes/init.php';

if ($currentUser) {
    header('Location: my-account.php');
    exit;
}

$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $password2 = $_POST['password_confirm'] ?? '';

    if (strlen($name) < 3) $errors['name'] = 'Te pakten 3 shkronja.';
    if (empty($name)) $errors['name'] = 'Vendosni emrin.';

    if (empty($email)) $errors['email'] = 'Vendosni email.';
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors['email'] = 'Email i pavlefshem.';
    elseif ($userModel->findByEmail($email)) $errors['email'] = 'Ky email ekziston tashme.';

    if (strlen($password) < 6) $errors['password'] = 'Min 6 karaktere.';
    if ($password !== $password2) $errors['password_confirm'] = 'Fjalekalimet nuk perputhen.';

    if (empty($errors)) {
        $userModel->create($name, $email, $password);
        $user = $userModel->findByEmail($email);
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_role'] = $user['role'];
        header('Location: my-account.php');
        exit;
    }
}

$pageTitle = 'Regjistrohu';
$baseUrl = '';
$currentPage = '';
require_once __DIR__ . '/includes/header.php';
?>

<section id="page-header" class="register-header">
    <h2>Regjistrohu</h2>
    <p>Krijo llogari te re</p>
</section>

<section id="form-section" class="section-p1">
    <div class="form-container">
        <form action="register.php" method="post">
            <h3>Regjistrohu</h3>
            <input type="text" name="name" placeholder="Emri dhe mbiemri" value="<?php echo h($_POST['name'] ?? ''); ?>" required>
            <?php if (!empty($errors['name'])): ?><span class="error-msg"><?php echo h($errors['name']); ?></span><?php endif; ?>
            <input type="email" name="email" placeholder="Email juaj" value="<?php echo h($_POST['email'] ?? ''); ?>" required>
            <?php if (!empty($errors['email'])): ?><span class="error-msg"><?php echo h($errors['email']); ?></span><?php endif; ?>
            <input type="password" name="password" placeholder="Fjalekalimi (min 6)" required>
            <?php if (!empty($errors['password'])): ?><span class="error-msg"><?php echo h($errors['password']); ?></span><?php endif; ?>
            <input type="password" name="password_confirm" placeholder="Përsëritni fjalëkalimin" required>
            <?php if (!empty($errors['password_confirm'])): ?><span class="error-msg"><?php echo h($errors['password_confirm']); ?></span><?php endif; ?>
            <button type="submit" class="normal">Regjistrohu</button>
            <p class="form-footer">Keni llogari? <a href="login.php">Hyni</a></p>
        </form>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
