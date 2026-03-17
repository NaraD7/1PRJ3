<?php require 'config/database.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/style.css">
    <title>Coiffeur</title>
</head>

<body>
    <?php include 'includes/header.php'; ?>
    <?php
        // Récupérer TOUS les articles avec leur catégorie et auteur
        $sql = "SELECT * from client ;";
        $stmt = $pdo->query($sql);
        $clients = $stmt->fetchAll();

        foreach ($clients as $client) {
            echo "<p>" . htmlspecialchars($client['nom']) . "</p>";
            echo "<p>" . htmlspecialchars($client['email']) . "</p>";
        }
    ?>

    <?php include 'includes/footer.php'; ?>

