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
        <div class="container-info">
            <h2>INFORMATIONS</h2>
            <p class='num-tel'><span>Numéro :</span> 01.23.45678.56.78</p>
            <p class='email'><span>Email :</span> coiffeur@gmail.com</p>
            <div class="horaires-container">
                <?php
                    // Récupérer TOUS les articles avec leur catégorie et auteur
                    $sql = "SELECT * from disponibilite ;";
                    $stmt = $pdo->query($sql);
                    $heures = $stmt->fetchAll();

                    foreach ($heures as $heure) {
                            $debut_matin = date('H', strtotime($heure['heure_debut_matin']));
                            $fin_matin = date('H', strtotime($heure['heure_fin_matin']));
                            $debut_apresmidi = date('H', strtotime($heure['heure_debut_apresmidi']));
                            $fin_apresmidi = date('H', strtotime($heure['heure_fin_apresmidi']));
                            
                            echo "<div class='jour-horaire'>";
                            echo "<p>" . htmlspecialchars($heure['jour_semaine']) . "</p>";
                            echo "<p>{$debut_matin}h-{$fin_apresmidi}h</p>";
                            echo "</div>";
                     }
                        
                    
                ?>
            </div>

        </div>
    </main>
    <?php include 'includes/footer.php'; ?>
</body>
</html>