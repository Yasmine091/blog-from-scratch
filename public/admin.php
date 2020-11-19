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
    <p>
        <form method="GET">
            <select name="articles">
                <?php
                // verifier qu'on est bien connecté, si non revenir a l'accueil
                if (!isset($_SESSION['logged'])) {
                    header('Location: /');
                }

                $getAllArticles = ('SELECT *, articles.id as id, authors.id as authid FROM articles
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
            </select><br>
            <input type="submit" name="edit" value="Modifier l'article">
            <input type="submit" name="del" value="Supprimer l'article">
            <input type="submit" name="new" value="Ajouter un article">
        </form>

        <p>
            <?php
            // récuperer l'article pour le modifier / supprimer
            if (isset($_GET['articles'])) {
                $id = $_GET['articles'];

                if (isset($_GET['del'])) {
                    $deleteArticle = ('DELETE FROM articles WHERE id = ' . $id . '');
                    $deleteCategory = ('DELETE FROM articles_categories WHERE article_id = ' . $id . '');
                    mysqli_query($con, $deleteArticle);
                    mysqli_query($con, $deleteCategory);
                    echo "L'article a été supprimé avec succès!";
                    header('Refresh: 1; URL=/admin.php');
                }

                parametresAdmin();
            }
            ?>
        </p>
</main>
<?php
// récuperer le footer
partieSite('footer');
