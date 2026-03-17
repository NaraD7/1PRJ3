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
                <?php echo neuille ?>
            </div>

        </div>
    </main>
    <?php include 'includes/footer.php'; ?>
</body>
</html>