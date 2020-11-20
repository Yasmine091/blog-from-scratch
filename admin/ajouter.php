<?php
require '../core/connexion.php';

if (isset($_POST['add'])) {

    $userID = $_SESSION['id'];

    $title = $_POST['title'];
    $img = $_POST['img-url'];

    $date = date("Y-m-d h:i:s");

    /* $cat1 = $_POST['cat-1'];
    $cat2 = $_POST['cat-2'];
    $cat3 = $_POST['cat-3'];
    $cat4 = $_POST['cat-4']; */

    $readTime = $_POST['read-t'];
    $getContent = $_POST['content'];
    $content = mysqli_real_escape_string($con, $getContent);

    $createArticle = ("INSERT INTO articles (`title`, `content`, `image_url`, `published_at`, `reading_time`, `author_id`)
    VALUES ('$title', '$content', '$img', '$date', '$readTime', '$userID')");
    mysqli_query($con, $createArticle);
    echo 'L\'article à été ajouté avec succès!';
    header('Refresh: 1; URL=/admin.php');

    /* $ = $_POST[''];
    $ = $_POST[''];
    $ = $_POST['']; */
}

if (isset($_GET['new'])) {
?>
    <form method="POST">
        <label for="title">Titre :</label><br>
        <input type="text" name="title" placeholder="Titre de l'article">
        <br><br>
        <label for="img-url">Lien de l'image / visuel :</label><br>
        <input type="text" name="img-url" placeholder="https://google.fr/monchat.png">
        <br><br>
        <label for="category">Catégories :</label><br>

        <label for="cat-1">API</label>
        <input type="checkbox" name="cat-1" value="1">&nbsp;&nbsp;
        <label for="cat-2">Performance</label>
        <input type="checkbox" name="cat-2" value="2">&nbsp;&nbsp;
        <label for="cat-3">IDE</label>
        <input type="checkbox" name="cat-3" value="3">&nbsp;&nbsp;
        <label for="cat-4">VS Code</label>
        <input type="checkbox" name="cat-4" value="4">&nbsp;&nbsp;

        <br><br>
        <label for="read-t">Temps de lecture : (en minutes)</label><br>
        <input type="number" name="read-t" value="0">
        <br><br>
        <label for="conten">Contenu :</label><br>
        <textarea name="content" cols="100" rows="20">T'as le droit d'utiliser du HTML pour rédiger ton article :3</textarea>
        <br><br>
        <input type="submit" name="add" value="Ajouter cet article">
    </form>
<?php
}
?>