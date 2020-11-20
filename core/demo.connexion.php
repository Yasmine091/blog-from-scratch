<?php
// Identifiants pour acceder aux données
$host = "host"; // host ou se trouve la DB
$db = "database"; // nom de la DB
$user = "user"; // utilisateur de la DB
$db_pw = "password"; // mot de pase de la DB

// Je me connecte a la base de données
$con = mysqli_connect($host, $user, $db_pw, $db);

// Tentative de connection a ma base de données
/* if(!$con){
    echo  "Erreur durant la connexion";
}
else {
    echo "Succèss, t'es connectée a la base de données!";
} */
