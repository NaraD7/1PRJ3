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
        <div class="all-info">
            <div class="container-info">
                
                <h2>INFORMATIONS</h2>

                <div class="horaires-container">
                    <div class="contact">
                        <p class='num-tel'><span>Numéro :</span> 01.23.45678.56.78</p>
                        <p class='email'><span>Email :</span> coiffeur@gmail.com</p>
                    </div>
            </div>
            <h2>HORAIRES</h2>
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

            <div class="maps">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2622.7474645376374!2d2.3309069127536826!3d48.90114977121827!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66f3026520abd%3A0x8ffd9fcb03308b67!2sBABINSKI%20PARIS!5e0!3m2!1sfr!2sfr!4v1773821792287!5m2!1sfr!2sfr" class="google-maps" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
        
    </main>
    <?php include 'includes/footer.php'; ?>
</body>
</html>