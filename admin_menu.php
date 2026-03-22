<?php
session_start();

if (!isset($_SESSION['admin_auth']) || $_SESSION['admin_auth'] !== true) {
    header('Location: connexion.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Administration</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>

<header class="header">
    <div class="logo"><strong>MENU ADMIN</strong></div>
    <nav>
        <a href="config/deconnexion.php" style="color: #d63031; font-weight: bold;">Déconnexion</a>
    </nav>
</header>

<main>
    <div class="admin-dashboard">
        <h2>Bienvenue, Administrateur</h2>
        <p class="sub-title">Que souhaitez-vous modifier aujourd'hui ?</p>

        <div class="grid-menu">

            <div class="card-menu">
                <div class="card-icon">🕒</div>
                <h3>Horaires</h3>
                <p>Modifier les heures d'ouverture et de fermeture.</p>
                <a href="gestion_horaires.php" class="btn-action">Gérer</a>
            </div>

            <div class="card-menu">
                <div class="card-icon">🖼️</div>
                <h3>Galerie Images</h3>
                <p>Ajouter ou supprimer des photos de l'établissement.</p>
                <a href="gestion_images.php" class="btn-action">Gérer</a>
            </div>

            <div class="card-menu">
                <div class="card-icon">📞</div>
                <h3>Contact & Infos</h3>
                <p>Modifier le téléphone, l'email ou les réseaux.</p>
                <a href="gestion_contact.php" class="btn-action">Gérer</a>
            </div>

            <div class="card-menu">
                <div class="card-icon">📋</div>
                <h3>Services</h3>
                <p>Gérer les prestations et réservations actives.</p>
                <a href="gestion_services.php" class="btn-action">Gérer</a>
            </div>

        </div>
    </div>
</main>

<footer class="footer">
</footer>

</body>
</html>