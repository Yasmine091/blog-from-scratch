<?php

// Récuperer contenu du site
function contenuSite()
{
    switch (isset($_GET['page'])) {
        case 'login';
            require '../pages/login.php';
            break;
        default:
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