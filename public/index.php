<?php
// Afficher erreurs
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// je récupere la connexion a la base de données
require __DIR__ . '/../core/connexion.php';

// Je demarre la session
session_start();

// je récupere mes functions.php
require __DIR__ . '/../core/functions.php';

// construction du site

// récuperer le header
partieSite('header');
partieSite('nav');

// contenu de mon site
contenuSite();

// récuperer le footer
partieSite('footer');