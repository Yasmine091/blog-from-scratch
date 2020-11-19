<?php

// Récuperer contenu du site
function contenuSite(){
    switch(isset($_GET['page'])){
        default: require '../pages/accueil.php';
        case 'login'; require '../pages/login.php'; break;
    }
}

function partieSite($fichier){
	include '../includes/'. $fichier . '.php';
}

function parametresAdmin(){
    switch(isset($_GET['articles'])){
        case isset($_GET['edit']); require '../admin/modifier.php'; break;
        case isset($_GET['new']); require '../admin/ajouter.php'; break;
    }
}
