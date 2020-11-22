<nav>
    <ul>
        <li><a href="/">Accueil</a></li>
        <li><a href="/?page=rechercher">Rechercher</a></li>
        <?php
        // Si on est connecté
        if (isset($_SESSION['logged'])) { // Afficher lien administration et boutton déconexion
            echo '
        <li><a href="/admin.php">Administration</a></li>
        <li><form method="POST"><input type="submit" name="logout" value="Déconnexion"></form></li>
        ';
        } else { // Afficher lien login
            echo '<li><a href="/?page=login">Connexion</a></li>';
        }
        ?>
    </ul>
</nav>

<?php
// Action du boutton déconnexion
if (isset($_POST['logout'])) {
    session_destroy();
    header('Location: /');
}
?>