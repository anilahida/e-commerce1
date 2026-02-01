<?php
require_once __DIR__ . '/includes/init.php';

if ($currentUser) {
    header('Location: ' . ($isAdmin ? 'admin/' : 'my-account.php'));
    exit;
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Email i pavlefshem.';
    } elseif (empty($password)) {
        $error = 'Vendosni fjalekalimin.';
    } else {
        $user = $userModel->findByEmail($email);
        if (!$user || !password_verify($password, $user['password'])) {
            $error = 'Email ose fjalekalim i gabuar.';
        } else {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_role'] = $user['role'];
            header('Location: ' . ($user['role'] === 'admin' ? 'admin/' : 'my-account.php'));
            exit;
        }
    }
}

$pageTitle = 'Hyrje';
$baseUrl = '';
$currentPage = '';
require_once __DIR__ . '/includes/header.php';
?>

<section id="page-header" class="login-header">
    <h2>Hyrje në llogari</h2>
    <p>Hyni për të vazhduar</p>
</section>

<section id="form-section" class="section-p1">
    <div class="form-container">
        <form action="login.php" method="post">
            <h3>Hyr</h3>
            <?php if ($error): ?><p class="error-msg"><?php echo h($error); ?></p><?php endif; ?>
            <input type="email" name="email" placeholder="Email juaj" value="<?php echo h($_POST['email'] ?? ''); ?>" required>
            <input type="password" name="password" placeholder="Fjalëkalimi" required>
            <button type="submit" class="normal">Hyr</button>
            <p class="form-footer">Nuk keni llogari? <a href="register.php">Regjistrohu</a></p>
        </form>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
