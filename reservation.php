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
        

<div class="reservations">
    <h2>Reservations</h2>
    <br>
        <div class="service-container">
            <form action="" method="post" class='form-resa'>
                <select id="prestation" name='reserv-prestation'>
                <?php
                            // Récupérer TOUS les articles avec leur catégorie et auteur
                            $sql = "SELECT * from service ;";
                            $stmt = $pdo->query($sql);
                            $services = $stmt->fetchAll();

                            foreach ($services as $service) {
                                    echo "<option><p  >{$service['nom']}</p> | {$service['duree_minutes']}min | {$service['prix_euros']}$</option>";
                            }
                    ?>
                    
                    </select>

                    <input type="date" name="date" class="date">
                    <select class="choix-heure" name='heure'>
                        <option>10:30</option>
                        <option>11:30</option>
                        <option>14:30</option>
                        <option>16:30</option>
                        <option>17:00</option>
                    </select>



                    <input type="text" name="nom" placeholder="Votre nom" required>

                    <input type="text" name="email" placeholder="Votre adresse e-mail" required>

                    <button type="submit">Réserver</button>
            </form>

            <?php 
                if (isset($_POST['reserv-prestation'], $_POST['date'], $_POST['heure'])) {

                    $reserv = $_POST['reserv-prestation'];
                    $date = $_POST['date'];
                    $heure = $_POST['heure'];
                    $statut = "en_attente";
                    $nom = $_POST['nom'];

                    $sql = "INSERT INTO reservation (nom_prestation, date_rdv, heure_rdv, statut)
                            VALUES (:reserv, :date, :heure, :statut)";

                    $stmt = $pdo->prepare($sql);
                    $stmt->execute([
                        ':reserv' => $reserv,
                        ':date' => $date,
                        ':heure' => $heure,
                        ':statut' => $statut
                    ]);

                    $nom = htmlspecialchars($_POST["nom"]);
                    $date = htmlspecialchars($_POST["date"]);
                    $heure = htmlspecialchars($_POST["heure"]);

                    $subject = "Votre réservation.";

                    $message = "Bonjour $nom vous avez réserver une prestation le $date à $heure dans notre salon.";

                    $headers = "From: lilian.denizon@gmail.com\r\n";
                    $headers .= "Reply-To: lilian.denizon@gmail.com\r\n";
                    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

                    mail($to,$subject,$message,$headers);

                    header("Location: reservation.php");
                    exit;
                    
                }
            ?>
        </div>
    </div>
    <?php include 'includes/footer.php'; ?>
