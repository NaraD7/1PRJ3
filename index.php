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
        <div class='button-accueil'>
                <a href="reservation.php"><button>Réserver</button></a>
                <a href="informations.php"><button>A Propos</button></a>
                <a href="connexion.php"><button>Connexion</button></a>
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
            <p>Nos collaborateurs sont ravis de vous accueillir dans votre 
        salon de coiffure près de chez vous à des prix vraiment intéressants </p>
        </div>
        
        <br>
        <br>
        <div class="avis-body">
        <h2>LES AVIS CLIENTS</h2>
        
        <div class="avis-container">
            <div class="avis">
                <div class="avis-pseudo">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-user-round-icon lucide-circle-user-round"><path d="M18 20a6 6 0 0 0-12 0"/><circle cx="12" cy="10" r="4"/><circle cx="12" cy="12" r="10"/></svg>
                    <h3>Pseudo1</h3>
                </div>
                <p>Le salon est très propre la clientèle est très sympa et le personnel est très accueillant.</p>
                
                <br>

                <div class="note">
                    4.5/5
                    <svg xmlns="http://www.w3.org/2000/svg" id='star'color='black' fill='none' width="12" height="12" viewBox="0 0 24 24" s stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-star-icon lucide-star"><path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"/></svg>
                </div>

            </div>

            <div class="avis">
                <div class="avis-pseudo">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-user-round-icon lucide-circle-user-round"><path d="M18 20a6 6 0 0 0-12 0"/><circle cx="12" cy="10" r="4"/><circle cx="12" cy="12" r="10"/></svg>
                    <h3>Pseudo1</h3>
                </div>
                <p>Le salon est très propre la clientèle est très sympa et le personnel est très accueillant.</p>
                
                <br>

                <div class="note">
                    4.5/5
                    <svg xmlns="http://www.w3.org/2000/svg" id='star'color='black' fill='none' width="12" height="12" viewBox="0 0 24 24" s stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-star-icon lucide-star"><path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"/></svg>
                </div>

            </div>


            <div class="avis">
                <div class="avis-pseudo">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-user-round-icon lucide-circle-user-round"><path d="M18 20a6 6 0 0 0-12 0"/><circle cx="12" cy="10" r="4"/><circle cx="12" cy="12" r="10"/></svg>
                    <h3>Pseudo1</h3>
                </div>
                <p>Le salon est très propre la clientèle est très sympa et le personnel est très accueillant.</p>
                
                <br>

                <div class="note">
                    4.5/5
                    <svg xmlns="http://www.w3.org/2000/svg" id='star'color='black' fill='none' width="12" height="12" viewBox="0 0 24 24" s stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-star-icon lucide-star"><path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"/></svg>
                </div>

            </div>


            <div class="avis">
                <div class="avis-pseudo">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-user-round-icon lucide-circle-user-round"><path d="M18 20a6 6 0 0 0-12 0"/><circle cx="12" cy="10" r="4"/><circle cx="12" cy="12" r="10"/></svg>
                    <h3>Pseudo1</h3>
                </div>
                <p>Le salon est très propre la clientèle est très sympa et le personnel est très accueillant.</p>
                
                <br>

                <div class="note">
                    4.5/5
                    <svg xmlns="http://www.w3.org/2000/svg" id='star'color='black' fill='none' width="12" height="12" viewBox="0 0 24 24" s stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-star-icon lucide-star"><path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"/></svg>
                </div>

            </div>


            <div class="avis">
                <div class="avis-pseudo">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-user-round-icon lucide-circle-user-round"><path d="M18 20a6 6 0 0 0-12 0"/><circle cx="12" cy="10" r="4"/><circle cx="12" cy="12" r="10"/></svg>
                    <h3>Pseudo1</h3>
                </div>
                <p>Le salon est très propre la clientèle est très sympa et le personnel est très accueillant.</p>
                
                <br>

                <div class="note">
                    4.5/5
                    <svg xmlns="http://www.w3.org/2000/svg" id='star'color='black' fill='none' width="12" height="12" viewBox="0 0 24 24" s stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-star-icon lucide-star"><path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"/></svg>
                </div>

            </div>

        </div>
    </div>
    <?php include 'includes/footer.php'; ?>

