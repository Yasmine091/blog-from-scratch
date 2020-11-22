<?php

// Récuperer contenu du site
function contenuSite()
{
    if (isset($_GET['page'])) {

        $page = $_GET['page'];

        if ($page == 'rechercher'){
            require '../pages/rechercher.php';
        }

        if($page == 'login'){
            require '../pages/login.php';
        }
    }
    else{
            require '../pages/accueil.php';
    }
}

function partieSite($fichier)
{
    include '../includes/' . $fichier . '.php';
}

function parametresAdmin($action)
{
    switch (isset($_GET)) {
        case $action == 'edit';
            require '../admin/modifier.php';
            break;
        case $action == 'add';
            require '../admin/ajouter.php';
            break;
    }
}
