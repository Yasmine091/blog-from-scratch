<?php
// Identifiants pour acceder aux données
$host = "localhost";
$db = "blog";
$user = "Yasmine";
$db_pw = "yas09";

// Je me connecte a la base de données
$con = mysqli_connect($host, $user, $db_pw, $db);

// Tentative de connection a ma base de données
/* if(!$con){
    echo  "Erreur durant la connexion";
}
else {
    echo "Succèss, t'es connectée a la base de données!";
} */