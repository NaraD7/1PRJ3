<?php require 'config/database.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/style.css">
    <title>Document</title>
</head>
<body>
    <?php include 'includes/header.php'; ?>
        <h2>Reservations</h2>
<br><br>
<div class="reservations">
        <div class="service-container">
            <select name="" id="">
            <?php
                        // Récupérer TOUS les articles avec leur catégorie et auteur
                        $sql = "SELECT * from service ;";
                        $stmt = $pdo->query($sql);
                        $services = $stmt->fetchAll();

                        foreach ($services as $service) {
                                echo "<option>{$service['nom']} | {$service['duree_minutes']}min | {$service['prix_euros']}$</option>";
                        }
                ?>
                </select>
            </div>
    </div>
    <?php include 'includes/footer.php'; ?>
