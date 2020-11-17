<?php

// Récuperer contenu du site
function contenuSite(){
    if(!isset($_GET['page'])){
        include __DIR__.'/../pages/accueil.php';
    } else {
    if($_GET['page'] == "login"){
        include __DIR__.'/../pages/login.php';
   		 }
	}
}

function partieSite($fichier){
	include __DIR__ .'/../includes/'. $fichier . '.php';
}

?>