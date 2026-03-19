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
    <main>

        <div class='button-accueil'>
                <a href="reservation.php"><button>Réserver</button></a>
                <a href="informations.php"><button>Informations</button></a>
        </div>
            <br>
            <br>
        <div class="image-container">
            <div class="main-image">
                <img src="./public/images/image1.jpg" alt="image1" >
            </div>
            <div class="second-image-container">
                <div class="second-image">
                    <img src="./public/images/image2.jpg" alt="image2">
                    <img src="./public/images/image3.jpg" alt="image3">
                </div>
                <div class="second-image">
                    <img src="./public/images/image2.jpg" alt="image2">
                    <img src="./public/images/image3.jpg" alt="image3">
                </div>
            </div>
        </div>
        <br>
            <br>
        <div class="accueil-container">
            <h2>COIFFEUR</h2>
            <br>
            <br>
            <p>
            <?php
                    // Récupérer TOUS les articles avec leur catégorie et auteur
                    $sql = "SELECT * from coiffeur ;";
                    $stmt = $pdo->query($sql);
                    $coiffeurs = $stmt->fetchAll();

                    foreach ($coiffeurs as $coiffeur) {
                            echo "{$coiffeur['prenom']}, ";
                     }
            ?>
            sont ravis de vous accueillir dans votre salon de coiffure près de chez vous à des prix vraiment intéressants </p>
            
            
            
        </div>
    </main>
    <?php include 'includes/footer.php'; ?>

