<main>
    
<?php

if($logged_in == true){
    header('Location: admin.php');
}

require __DIR__ . '/../core/connexion.php';

$selectAuthors = ('SELECT * FROM authors');
$request = mysqli_query($con, $selectAuthors);
$authors = mysqli_fetch_assoc($request);


if(isset($_POST['login'])){
    $mail = $_POST['mail'];
    $mdp = $_POST['mdp'];
    $mdp_md5 = md5($mdp);

    /* echo $mdp . '<br>' . $mdp_md5; */

    /* if(empty($_POST['mail'] or empty($_POST['mdp']))){
        echo 'Erreur, tu dois remplire tous les champs!';
    } */

    if($mail != $authors['email'] and $mdp_md5 != $authors['password']){
        echo 'Erreur, identifiants incorrectes!';
    }
    else{
        echo 'Succès!';
        header('Location: admin.php');
        session_start();
        $_SESSION['logged'] = true;
        $logged_in = $_SESSION['logged'];
    }
}

?>

    <form action="" method="POST">
        <p>
            <label for="mail">Idéntifiant : </label><br>
            <input type="text" name="mail" placeholder="Ex : léa@gmail.com">
        </p>
        <p>
            <label for="mdp">Mot de passe : </label><br>
            <input type="password" name="mdp">
        </p>
        <input type="submit" name="login" value="Envoyer">
    </form>

</main>