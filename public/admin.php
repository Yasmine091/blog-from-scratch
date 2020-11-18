<?php
// Afficher erreurs
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// je récupere la connexion a la base de données
require __DIR__ . '/../core/connexion.php';

// Je demarre la session
session_start();

// je récupere mes functions.php
require __DIR__ . '/../core/functions.php';

// construction du site

// récuperer le header
partieSite('header');
partieSite('nav');

// contenu de mon site
?>
<main>
    <h2>Admin</h2>
    <select>
        <?php

        if (!isset($_SESSION['logged'])) {
            header('Location: /');
        }

        if (isset($_GET)) {
            $id = $_GET['id'];
        }

        $getAllArticles = ('SELECT * FROM articles
        JOIN authors ON author_id = authors.id
        ORDER BY published_at DESC');
        $request = mysqli_query($con, $getAllArticles);
        ?>

        <?php

        while ($articles = mysqli_fetch_assoc($request)) {
        ?>
            <option value="<?php echo $articles['id']; ?>"><?php echo $articles['title']; ?></option>

        <?php
        }
        ?>
    </select>

    <hr>

</main>
<?php
// récuperer le footer
partieSite('footer');
