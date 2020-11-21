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

    <div class="corps"><br>
        <h2>Administration</h2><br>
        <hr><br>
        <form method="GET">
            <select name="articles">
                <option selected="selected" name="sel" disabled>-- Choisir un article --</option>
                <?php
                // verifier qu'on est bien connecté, si non revenir a l'accueil
                if (!isset($_SESSION['logged'])) {
                    header('Location: /');
                }

                $userID = $_SESSION['id'];

                $getAllArticles = ("SELECT *, articles.id as id, authors.id as authid FROM articles
        JOIN authors ON author_id = authors.id
        WHERE author_id = '$userID'
        ORDER BY published_at DESC");
                $request = mysqli_query($con, $getAllArticles);
                ?>

                <?php

                while ($articles = mysqli_fetch_assoc($request)) {
                ?>
                    <option value="<?php echo $articles['id']; ?>"><?php echo $articles['title']; ?></option>

                <?php
                }
                ?>
            </select><br><br>
            <input type="submit" name="edit" value="Modifier l'article">
            <input type="submit" name="del" value="Supprimer l'article">
            <input type="submit" name="new" value="Ajouter un article">
        </form>
        <?php
        // récuperer l'article pour le modifier / supprimer
        if (isset($_GET)) {
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
                echo '<br><hr><br><br>';
                parametresAdmin('edit');
            }
            if (isset($_GET['new'])) {
                echo '<br><hr><br><br>';
                parametresAdmin('add');
            }
        }

        else{
            ?>

            



            <?php
        }
        ?>
    </div>
</main>
<?php
// récuperer le footer
partieSite('footer');
