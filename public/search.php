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

    <!-- Encore un petit bonus

Temps de réalisation: indéterminé

Ajouter une fonctionnalité de recherche.

Si le terme recherché apparait dans le titre, le billet de blog remonte en premier.
Si le terme recherché apparait dans les catégories, le billet de blog remonte en deuxième.
Si le terme recherché apparait dans les contenu de l'article, le billet de blog remonte en troisième.

La page d'accueil devra lister les billets du plus récent au plus anciens,
il sera possible de filtrer cette liste par auteurs et/ou par catégorie.
Depuis la page d'un billet de blog, un rebond doit être possible sur les auteurs et sur les catégories.

-->


    <?php


    if (isset($_GET['search'])) {

        $authorName = $_GET['author'];
        $category = $_GET['cat'];


        echo $authorName;
        echo $category;

        $getAuthor = ("SELECT * FROM authors WHERE firstname = '$authorName'");
        $reqID = mysqli_query($con, $getAuthor);
        $author = mysqli_fetch_assoc($reqID);

        $authorID = $author['id'];
        
        // faire une requete sql qui récupere l'ID de l'auteur, en fonction du prénom / nom
        // puis affiche l'article en fonction de l'id de l'auteur et voila!+


        

        

        $getAllArticles =
            ("SELECT *, articles.id as artid, authors.id as authid FROM articles
            JOIN authors ON author_id = authors.id
            WHERE author_id = '$authorID' OR authors.id = '$authorID'");
        $request = mysqli_query($con, $getAllArticles);

        while ($articles = mysqli_fetch_assoc($request)) {
            $articleID = $articles['artid'];
    ?>

            <p>
                <h2><?php echo $articles['title']; ?></h2>
                <img src="<?php echo $articles['image_url']; ?>">
                <?php echo substr(strip_tags($articles['content']), 0, 300); ?>..</div>
                <span><?php echo $articles['firstname']; ?></span>
                <span><?php echo $articles['reading_time']; ?> minutes</span>
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
                <span>Publié le <?php echo $articles['published_at']; ?></span>
                <span><a href="/article.php?id=<?php echo $articleID; ?>">Lire la suite</a></span>
            </p>

    <?php
        }
     
    }
    ?>
</main>

<?php
// récuperer le footer
partieSite('footer');
