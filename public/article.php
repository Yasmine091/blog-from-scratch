<?php
/* on affiche  les erreurs, 
si vous avez une erreur 500, 
regardez dans votre console */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// je récupere la connexion a la base de données
require __DIR__ . '/../core/connexion.php';

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

$selectArticle = ('SELECT * FROM articles, authors WHERE articles.id = '.$id.' AND articles.author_id = authors.id');
$request = mysqli_query($con, $selectArticle);
$article = mysqli_fetch_assoc($request);

?>

<p>
    <h2><?php echo $article['title'];?></h2>
    <img src="<?php echo $article['image_url'];?>" alt="">
    <?php echo strip_tags($article['content'], ['<a>','<br>','<img>','<p>']);?>
    <span><?php echo $article['firstname'];?></span>
    <span><?php echo $article['reading_time'];?> minutes</span>
    <span>Publié le <?php echo $article['published_at'];?></span>
</p>


</main>


<?php
// récuperer le footer
partieSite('footer');