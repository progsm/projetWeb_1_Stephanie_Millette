<?php

// Affiche toutes les erreurs pendant le développement
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Démarre la session
session_start();

// Défini une constante BASE qui représente l'url relatif au dossier contenant index.php.
// Utile pour créer des urls qui partent de la racine
// Par exemple <link ref="<?= BASE ?\>/public/css/style.css">
//                                  ^
//                                  sans ce "\"
define("BASE", dirname($_SERVER["PHP_SELF"]));

// Récupère le controlleur du site
require_once "controllers/SiteController.php";

// Si je suis sur la page sans route
if (!isset($_GET["path"])) {
    // Redirige vers la page d'accueil
    header("location:accueil");
    exit();
}

$controller = new SiteController();

// Récupère $routes
require_once "config/routes.php";

// Page demandée par l'utilisateur
$path = $_GET["path"];

// Méthode du controlleur associée à la page demandée
$methode = $routes[$path] ?? "erreur404";

// Exécution de la méthode dans le controlleur
$controller->{$methode}();
