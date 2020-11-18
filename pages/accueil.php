<main>
    <?php

    require __DIR__ . '/../core/connexion.php';

    ?>

    <!-- Encore un petit bonus

Temps de réalisation: indéterminé

Ajouter une fonctionnalité de recherche.

Si le terme recherché apparait dans le titre, le billet de blog remonte en premier.
Si le terme recherché apparait dans les catégories, le billet de blog remonte en deuxième.
Si le terme recherché apparait dans les contenu de l'article, le billet de blog remonte en troisième. -->

    <?php


    $getAllArticles =
        ('SELECT *, articles.id as artid, authors.id as authid FROM articles
JOIN authors ON author_id = authors.id
ORDER BY published_at DESC');
    $request = mysqli_query($con, $getAllArticles);

    while ($articles = mysqli_fetch_assoc($request)) {
    ?>

        <p>
            <h2><?php echo $articles['title']; ?></h2>
            <img src="<?php echo $articles['image_url']; ?>">
            <?php echo substr(strip_tags($articles['content']), 0, 300); ?>..</div>
            <span><?php echo $articles['firstname']; ?></span>
            <span><?php echo $articles['reading_time']; ?> minutes</span>
            <span>Categories :
                <?php
                $selectCategories = ('SELECT * FROM articles_categories
JOIN categories ON id = articles_categories.category_id
WHERE articles_categories.article_id = ' . $articles['artid'] . '');
                $request2 = mysqli_query($con, $selectCategories);
                while ($categories = mysqli_fetch_assoc($request2)) {
                ?>
                    <?php echo $categories['category']; ?>
                <?php } ?></span>
            <span>Publié le <?php echo $articles['published_at']; ?></span>
            <span><a href="/article.php?id=<?php echo $articles['artid']; ?>">Lire la suite</a></span>
        </p>

    <?php
    }
    ?>
</main>