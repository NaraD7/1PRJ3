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
                <a href="informations.php"><button>A Propos</button></a>
                <a href="connexion.php"><button>Connexion</button></a>
        </div>
            <br>
            <br>
        <div class="all-info">
            <div class="container-info">

            <div class="horaires-propos">
                <div class="propos">
                    <h2>A PROPOS</h2>
                    <br>
                    <p>Bienvenue chez Salon Excellence, votre destination beauté et bien-être. Depuis plus de 18 ans, 
                        notre équipe de coiffeurs passionnés et qualifiés vous accueille dans un cadre moderne et chaleureux.
                    <br><br>
                    Nous nous engageons à vous offrir un service personnalisé et des prestations de qualité en utilisant les 
                    meilleurs produits du marché. Que ce soit pour une coupe, une coloration, ou un soin capillaire, nous sommes 
                    à votre écoute pour sublimer votre beauté naturelle.</p>
                </div>
                <div class="horaires-container">
                    <div class="horaire-entete">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clock-icon lucide-clock"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
                            <h2>HORAIRES</h2>
                        </div>
                            <?php
                                // Récupérer TOUS les articles avec leur catégorie et auteur
                                $sql = "SELECT * from disponibilite ;";
                                $stmt = $pdo->query($sql);
                                $heures = $stmt->fetchAll();

                                foreach ($heures as $heure) {
                                        $debut_matin = date('H:i', strtotime($heure['heure_debut_matin']));
                                        $fin_matin = date('H:i', strtotime($heure['heure_fin_matin']));
                                        $debut_apresmidi = date('H:i', strtotime($heure['heure_debut_apresmidi']));
                                        $fin_apresmidi = date('H:i', strtotime($heure['heure_fin_apresmidi']));
                                        
                                        if($heure['jour_semaine'] == 'Dimanche'){
                                            echo "<div class='jour-horaire'>";
                                            echo "<p>" . htmlspecialchars($heure['jour_semaine']) . "</p>";
                                            echo "<p>Fermé</p>";
                                            echo "</div>";
                                        }else{
                                            echo "<div class='jour-horaire'>";
                                            echo "<p>" . htmlspecialchars($heure['jour_semaine']) . "</p>";
                                            echo "<p>{$debut_matin}h-{$fin_apresmidi}h</p>";
                                            echo "</div>";
                                        }
                                        
                                }
                                    
                                
                            ?>
                        </div>
                </div>
            <div class="contact-photo">
                <img src="./public/images/image1.jpg" alt="image1" >
            
                <div class="contacts-container">
                    <h2>Contactez nous !</h2>
                    <div class="contact">
                        <p class='adresse'><span>Adresse : </span> 8 rue de Belgacem, 59222</p>
                        <p class='num-tel'><span>Numéro : </span> 01.23.45678.56.78</p>
                        <p class='email'><span>Email : </span> coiffeur@gmail.com</p>
                    </div>
                    <button><a href="reservation.php">PRENDRE RDV</a></button>
                </div>
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