<?php
require_once 'config/config_connexion.php';
session_start();

$error = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pseudo_saisi = isset($_POST['pseudo']) ? $_POST['pseudo'] : '';
    $mdp_saisi = isset($_POST['mdp']) ? $_POST['mdp'] : '';

    if ($pseudo_saisi === LOGIN && password_verify($mdp_saisi, PASSWORD)) {
        $_SESSION['admin'] = true;
        header('Location: admin_menu.php');
        exit;
    } else {
        $error = "Identifiants invalides.";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion Admin</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>

<header class="header">
    <div class="logo"><h1>ADMINISTRATION</h1></div>
    <nav>
        <a href="index.php">Retour au site</a>
    </nav>
</header>

<main>
    <div class="login-wrapper">
        <div class="login-card">
            <h2>Connexion</h2>

            <?php if ($error): ?>
                <div class="error-login"><?php echo $error; ?></div>
            <?php endif; ?>

            <form method="POST">
                <div class="form-group">
                    <label>Identifiant</label>
                    <input type="text" name="pseudo" required placeholder="Votre pseudo">
                </div>

                <div class="form-group">
                    <label>Mot de passe</label>
                    <div class="password-wrapper">
                        <input type="password" name="mdp" id="mdp" required placeholder="••••••••">
                        <button type="button" id="togglePassword" class="btn-toggle">👁️</button>
                    </div>
                </div>
                <button type="submit" class="btn-login">Se connecter</button>
            </form>
        </div>
    </div>
</main>

<footer class="footer">
</footer>

<script src="js/script.js"></script>

</body>
</html>