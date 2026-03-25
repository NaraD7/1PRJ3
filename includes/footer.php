<footer class='footer'>
    <div class="footer-contenu">
    <div class="contacts">
        <p>NOUS CONTACTER</p>
        <div class="logo-reseaux">
            <a href="https://www.linkedin.com/in/lilian-denizon-176529315/" target='blank'><svg xmlns="http://www.w3.org/2000/svg" color="white" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-linkedin-icon lucide-linkedin"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect width="4" height="12" x="2" y="9"/><circle cx="4" cy="4" r="2"/></svg><p>LinkedIn</p></a>
            <a href="https://www.x.com" target='blank'><svg xmlns="http://www.w3.org/2000/svg" color="white" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-twitter-icon lucide-twitter"><path d="M22 4s-.7 2.1-2 3.4c1.6 10-9.4 17.3-18 11.6 2.2.1 4.4-.6 6-2C3 15.5.5 9.6 3 5c2.2 2.6 5.6 4.1 9 4-.9-4.2 4-6.6 7-3.8 1.1 0 3-1.2 3-1.2z"/></svg><p>Twitter</p></a>
            <a href="https://www.instagram.com" target='blank'><svg xmlns="http://www.w3.org/2000/svg" color="white" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-instagram-icon lucide-instagram"><rect width="20" height="20" x="2" y="2" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/></svg><p>Instagram</p></a>
            <a href="https://www.facebook.com" target='blank'><svg xmlns="http://www.w3.org/2000/svg" color="white" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-facebook-icon lucide-facebook"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg><p>Facebook</p></a>
        </div>
    </div>

    <div class="navigation">
        <p>NAVIGATION</p>
        <div class="liste-page">
            <a href="index.php">Accueil</a>
            <a href="reservation.php">Réserver</a>
            <a href="informations.php">A Propos</a>
        </div>
    </div>

    <div class="service-footer">
        <p>SERVICES</p>
        <div class="liste-service-footer">
            <?php
            $services = $pdo->query("SELECT * FROM service")->fetchAll();
            foreach ($services as $s) {
                echo "<p>{$s['nom']}</p>";
            }
            ?>
        </div>
    </div>
</div>
    <div class="copyright">
        <p>©HAIRDESIGN - Tous droits réservés</p>
    </div>
</footer>

</body>
<script src="./assets/js/script.js"></script>
</html>