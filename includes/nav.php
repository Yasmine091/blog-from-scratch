<nav>
    <ul>
        <li><a href="/">Accueil</a></li>

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

<div class="search-bar">
<form method="GET" action="search.php">
    <label for="author">Auteur :</label>
    <input type="text" name="author" placeholder="Nom de l'auteur">
    <label for="cat">Categorie :</label>
    <select name="cat">
        <option selected="selected" value="">-- Choisir une catégorie --</option>
        <option value="1">API</option>
        <option value="2">Performance</option>
        <option value="3">IDE</option>
        <option value="4">VS Code</option>
    </select>
    <input type="submit" name="search" value="Rechercher">
</form>
</div>