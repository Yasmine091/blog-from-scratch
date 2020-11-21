<?php
// Afficher erreurs
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// je récupere la connexion a la base de données
require '../core/connexion.php';

// Je demarre la session
session_start();

// je récupere mes functions.php
require '../core/functions.php';

// construction du site

// récuperer le header
partieSite('header');
partieSite('nav');
?>

<main>

    <?php


    if (isset($_GET['search'])) {

        // je recupere la recherche effectuée
        $authorName = $_GET['author'];
        $category = $_GET['cat'];

        // je récupere l'ID de l'auteur
        $getAuthor = ("SELECT * FROM authors WHERE firstname = '$authorName' OR lastname = '$authorName'");
        $reqID = mysqli_query($con, $getAuthor);
        $author = mysqli_fetch_assoc($reqID);

        // le ?? c'est une sorte de si non, la je lui dis
        // que s'il n'y a pas de valeur, donc c'est null
        $authorID = $author['id'] ?? null;



        // requete sql qui récupere catégorie et ou auteur et affiche les news
        $selectArticle =
            ("SELECT *, articles.id as artid, authors.id as authid FROM articles
            JOIN authors ON author_id = authors.id
            JOIN articles_categories ON articles.id = articles_categories.article_id
            WHERE author_id = '$authorID'
            OR category_id = '$category'");
        $request = mysqli_query($con, $selectArticle);


        while ($articles = mysqli_fetch_assoc($request)) {
            $articleID = $articles['artid'];
    ?>

            <div class="article">
                <img src="<?php echo $articles['image_url']; ?>">
                <div class="art-cont">
                    <h2><?php echo $articles['title']; ?></h2>
                    <hr>
                    <?php echo substr(strip_tags($articles['content']), 0, 300); ?>..
                    <hr>
                </div>
                <p><span>Auteur : <?php echo $articles['firstname']; ?> <?php echo $articles['lastname']; ?></span>
                    <span>Publié le : <?php echo $articles['published_at']; ?></span><br><br>
                    <span>Temps de lecture : <?php echo $articles['reading_time']; ?> min</span>
                    <span>Categories :

                        <?php
                        $selectCategories = ("SELECT * FROM articles_categories
                    JOIN categories ON id = category_id
                    WHERE article_id = '$articleID'");
                        $request2 = mysqli_query($con, $selectCategories);

                        while ($categories = mysqli_fetch_assoc($request2)) {
                        ?>
                            <?php echo $categories['category']; ?>
                        <?php } ?>



                    </span>
                    <button><a href="/article.php?id=<?php echo $articleID; ?>">Lire la suite</a></button>
                </p>
            </div>
            </div>

    <?php
        }
    }
    ?>
</main>

<?php
// récuperer le footer
partieSite('footer');
