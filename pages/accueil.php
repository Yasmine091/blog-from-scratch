<main>
<?php

require __DIR__ . '/../core/connexion.php';

$getAllArticles = ('SELECT * FROM articles, authors WHERE articles.author_id = authors.id ORDER BY published_at DESC');
$request = mysqli_query($con, $getAllArticles);

while($articles = mysqli_fetch_assoc($request)){
?>

<p>
    <h2><?php echo $articles['title'];?></h2>
    <img src="<?php echo $articles['image_url'];?>">
    <?php echo substr(strip_tags($articles['content']), 0, 300);?>..</div>
    <span><?php echo $articles['firstname'];?></span>
    <span><?php echo $articles['reading_time'];?> minutes</span>
    <span>Publié le <?php echo $articles['published_at'];?></span>
    <span><a href="/article.php?id=<?php echo $articles['id'];?>">Lire la suite</a></span>
</p>

<?php
}
?>
</main>