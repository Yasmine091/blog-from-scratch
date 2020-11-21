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

    <?php

    $id = $_GET['id'];

    $selectArticle = ("SELECT * FROM articles, authors WHERE articles.id = '$id' AND articles.author_id = authors.id");
    $request = mysqli_query($con, $selectArticle);
    $article = mysqli_fetch_assoc($request);

    ?>

    <div class="article-full">
        <img class="visuel" src="<?php echo $article['image_url']; ?>" alt="">
        <div class="fullart-cont">
            <h2><?php echo $article['title']; ?></h2>
            <hr>
            <p><span>Auteur : <?php echo $article['firstname']; ?> <?php echo $article['lastname']; ?></span>
                <span>Publié le : <?php echo $article['published_at']; ?></span><br><br>
                <span>Temps de lecture : <?php echo $article['reading_time']; ?> min</span>
                <span>Categories :


                    <?php
                    $selectCategories = ("SELECT * FROM articles_categories
JOIN categories ON id = articles_categories.category_id
WHERE articles_categories.article_id = '$id'");
                    $request2 = mysqli_query($con, $selectCategories);



                    while ($categories = mysqli_fetch_assoc($request2)) {
                    ?>

                        <?php echo $categories['category']; ?>

                    <?php } ?>



                </span></p>
            <hr>
            <p><?php echo strip_tags($article['content'], ['<a>', '<br>', '<img>', '<p>', '<pre>', '<li>']); ?></p>
        </div>
    </div>


</main>


<?php
// récuperer le footer
partieSite('footer');
