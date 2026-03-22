<?php
require_once 'config/config_connexion.php';

$mdp_saisi = $_POST['mdp'];
if ($pseudo_saisi === LOGIN && password_verify($mdp_saisi, PASSWORD_HASH)) {
    echo "Connexion réussie !";

} else {
    echo "Identifiants incorrects.";
}
?>