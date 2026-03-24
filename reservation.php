<?php
require 'config/database.php';
require 'src/functions.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./public/css/style.css">
    <title>Réservation</title>
</head>
<body>
<?php include 'includes/header.php'; ?>

<div class="reservations">
    <h2>Réserver un service</h2>
    <form action="" method="post" class='form-resa'>
        <select name='id_service' required>
            <?php
            $services = $pdo->query("SELECT * FROM service")->fetchAll();
            foreach ($services as $s) {
                echo "<option value='{$s['id']}'>{$s['nom']} ({$s['duree_minutes']} min)</option>";
            }
            ?>
        </select>

        <input type="date" name="date" required>

        <select name='heure' required>
            <option value="10:30:00">10:30</option>
            <option value="11:30:00">11:30</option>
            <option value="14:30:00">14:30</option>
            <option value="17:00:00">17:00</option>
        </select>

        <input type="text" name="nom_client" placeholder="Votre nom" required>
        <input type="email" name="email_client" placeholder="Email" required>
        <input type="text" name="telephone" placeholder="Téléphone">

        <button type="submit">Réserver</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id_service = $_POST['id_service'];
        $date = $_POST['date'];
        $heure = $_POST['heure'];
        $nom = htmlspecialchars($_POST['nom_client']);
        $email = htmlspecialchars($_POST['email_client']);
        $tel = htmlspecialchars($_POST['telephone']);

        if (isSlotAvailable($pdo, $date, $heure, $id_service)) {
            $sql = "INSERT INTO reservation (id_service, date_rdv, heure_rdv, nom_client, email_client, telephone, statut)
                        VALUES (:id_s, :date, :heure, :nom, :email, :tel, 'en_attente')";

            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                    ':id_s' => $id_service, ':date' => $date, ':heure' => $heure,
                    ':nom' => $nom, ':email' => $email, ':tel' => $tel
            ]);

            echo "<p style='color:green;'>Réservation enregistrée !</p>";
        } else {
            echo "<p style='color:red;'>Erreur : Ce créneau est déjà pris.</p>";
        }
    }
    ?>
</div>
<?php include 'includes/footer.php'; ?>
</body>
</html>