<?php
require '../core/connexion.php';

$id = $_GET['articles'];

if (isset($_POST['save'])) {

    $title = $_POST['title'];
    $img = $_POST['img-url'];

    $cat1 = $_POST['cat-1'];
    $cat2 = $_POST['cat-2'];
    $cat3 = $_POST['cat-3'];
    $cat4 = $_POST['cat-4'];

    $readTime = $_POST['read-t'];
    $content = $_POST['content'];

    /* $ = $_POST[''];
    $ = $_POST[''];
    $ = $_POST['']; */
}







if (isset($_GET['edit'])) {
    $selectArticle = ('SELECT *, articles.id as id, authors.id as authid FROM articles
        JOIN authors ON author_id = authors.id
        WHERE articles.id = ' . $id . '');
    $request3 = mysqli_query($con, $selectArticle);
    $article = mysqli_fetch_assoc($request3);
?>
    <form method="POST">
        <label for="title">Titre :</label><br>
        <input type="text" name="title" value="<?php echo $article['title']; ?>">
        <br><br>
        <label for="img-url">Lien de l'image / visuel :</label><br>
        <input type="text" name="img-url" value="<?php echo $article['image_url']; ?>">
        <br><br>
        <label for="category">Catégorie :</label><br>

        <?php

        $selectCategories = ('SELECT *, categories.id as id FROM articles_categories
                            JOIN categories ON id = articles_categories.category_id');
        $reqcat = mysqli_query($con, $selectCategories);




        $i = 0;
        while ($categories = mysqli_fetch_assoc($reqcat)) {
            if ($categories['id'] <= $i) {
            } else {

        ?>

                <label for="cat-<?php echo $categories['id']; ?>"><?php echo $categories['category']; ?></label>
                <input type="checkbox" name="cat-<?php echo $categories['id']; ?>" value="<?php echo $categories['id']; ?>" <?php
                                                                                                                            if ($categories['article_id'] == $id) {
                                                                                                                                echo 'checked';
                                                                                                                            }
                                                                                                                            ?>>&nbsp;&nbsp;
        <?php

                $i++;
            }
        }
        ?>

        <br><br>
        <label for="read-t">Temps de lecture : (en minutes)</label><br>
        <input type="number" name="read-t" value="<?php echo $article['reading_time']; ?>">
        <br><br>
        <label for="conten">Contenu :</label><br>
        <textarea name="content" cols="100" rows="20"><?php echo $article['content']; ?></textarea>
        <br><br>
        <input type="submit" name="save" value="Sauvegarder les modifications">
    </form>
<?php
}
?>