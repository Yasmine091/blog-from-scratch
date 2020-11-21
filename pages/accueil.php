<main>
    <?php

    require '../core/connexion.php';

    ?>
    
    <?php


    $getAllArticles =
        ("SELECT *, articles.id as artid, authors.id as authid FROM articles
        JOIN authors ON author_id = authors.id
        WHERE is_public = 1
        ORDER BY published_at DESC");
    $request = mysqli_query($con, $getAllArticles);


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
JOIN categories ON id = articles_categories.category_id
WHERE articles_categories.article_id = '$articleID'");
                    $request2 = mysqli_query($con, $selectCategories);

                    while ($categories = mysqli_fetch_assoc($request2)) {
                    ?>
                        <?php echo $categories['category']; ?>,
                    <?php } ?>



                </span>
                <button><a href="/article.php?id=<?php echo $articleID; ?>">Lire la suite</a></button>
            </p>
        </div>
        </div>

    <?php
    }
    ?>
</main>