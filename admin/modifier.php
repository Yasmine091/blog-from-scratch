<?php
require '../core/connexion.php';

$id = $_GET['articles'];
$userID = $_SESSION['id'];

if(isset($_POST['del-cat'])){
    $cat = $_POST['cat'];
    $delCategory = ("DELETE FROM articles_categories WHERE article_id = '$id'");
    mysqli_query($con, $delCategory);
    echo 'La categorie à été supprimé avec succès!';
    header('Refresh: 1;');
}

if (isset($_POST['save'])) {

    // recuperer les categories cochées
    switch(isset($_POST['save'])){
        case isset($_POST['cat']) && in_array(1, $_POST['cat']); $cat = $_POST['cat']; break;
        case isset($_POST['cat']) && in_array(2, $_POST['cat']); $cat = $_POST['cat']; break;
        case isset($_POST['cat']) && in_array(3, $_POST['cat']); $cat = $_POST['cat']; break;
        case isset($_POST['cat']) && in_array(4, $_POST['cat']); $cat = $_POST['cat']; break;
    }

    // enregistrer chaque catégorie cochée
    if(isset($cat)){
    for($i = 0; $i <= 4; $i++){
        if(isset($cat[$i])){
        $addCategory = ("INSERT INTO articles_categories (`article_id`, `category_id`) VALUES ('$id', '$cat[$i]')");
        mysqli_query($con, $addCategory);
        }
        if(!isset($cat[$i])){
        $delCategory = ("DELETE FROM articles_categories WHERE article_id = '$id' AND category_id = '$cat[$i]'");
        $test = mysqli_query($con, $delCategory);
        var_dump($test);
        }

    }
}

    $title = $_POST['title'];
    $img = $_POST['img-url'];

    $date = date("Y-m-d h:i:s");

    $readTime = $_POST['read-t'];
    $getContent = $_POST['content'];
    $content = mysqli_real_escape_string($con, $getContent);

    $updateArticle = ("UPDATE articles 
    SET title = '$title', content = '$getContent', image_url = '$img', reading_time = '$readTime' WHERE id = '$id'");
    mysqli_query($con, $updateArticle);
    echo 'L\'article à été modifié avec succès!';
    //header('Refresh: 1; URL=/admin.php');
 
}





if (isset($_GET['edit'])) {
    $selectArticle = ("SELECT *, articles.id as id, authors.id as authid FROM articles
        JOIN authors ON author_id = authors.id
        WHERE articles.id = '$id'
        AND author_id = '$userID'");
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

        $selectCategories = ("SELECT *, categories.id as id FROM articles_categories
                            JOIN categories ON id = articles_categories.category_id");
        $reqcat = mysqli_query($con, $selectCategories);

        $i = 0;
        while ($categories = mysqli_fetch_assoc($reqcat)) {
            if ($categories['id'] <= $i) {
            } else {

                $checkCategories = ("SELECT * FROM articles_categories
                WHERE article_id = '$id'");
        $chkCat = mysqli_query($con, $checkCategories);
        $checkedCat = mysqli_fetch_assoc($chkCat);

        ?>  
                <?php echo $categories['category']; ?>
                <input type="checkbox" name="cat[]" value="<?php echo $categories['id']; ?>"
                <?php
                if ($checkedCat['category_id'] === $categories['id']) {
                echo ' checked>&nbsp;&nbsp;';
                }
                else{
                    echo '>&nbsp;&nbsp;';
                }


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