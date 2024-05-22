<?php

// Inclusion des fichiers nécessaires
require_once __DIR__ . "/../model/auth.php"; // Inclut le fichier "auth.php" depuis le répertoire "../model/"
require_once __DIR__ . "/../model/member.php"; // Inclut le fichier "member.php" depuis le répertoire "../model/"
require_once "utilsController.php"; // Inclut le fichier "utilsController.php" depuis le répertoire actuel
require_once __DIR__ . "/../core/connecteur.php"; // Inclut le fichier "connecteur.php" depuis le répertoire "../core/"

// Création d'une instance de la classe "Connecteur"
$connecteur = new Connecteur();

// Établissement d'une connexion à la base de données
$connexion = $connecteur->connexion();

// Création d'instances de différentes classes
$auth = new Auth($connexion); // Crée une instance de la classe "Auth" avec la connexion à la base de données
$db_handle = new Member($connexion); // Crée une instance de la classe "Member" avec la connexion à la base de données
$util = new UtilsController(); // Crée une instance de la classe "UtilsController"

// Obtention de la date et de l'heure actuelles
$current_time = time();
$current_date = date("Y-m-d H:i:s", $current_time);

// Configuration de l'expiration des cookies à 1 mois
$cookie_expiration_time = $current_time + (30 * 24 * 60 * 60); // pour 1 mois

$isLoggedIn = false; // Initialise la variable pour indiquer si un utilisateur est connecté

// Vérifie si une session "member_id" existe (utilisateur connecté)
if (!empty($_SESSION["member_id"])) {
    $isLoggedIn = true;
}
// Sinon, vérifie si des cookies d'authentification existent
else if (!empty($_COOKIE["member_login"]) && !empty($_COOKIE["random_password"]) && !empty($_COOKIE["random_selector"])) {
    // Initialise des variables pour vérifier les cookies
    $isPasswordVerified = false;
    $isSelectorVerified = false;
    $isExpiryDateVerified = false;

    // Récupère le jeton d'authentification en fonction du nom d'utilisateur (member_login)
    $userToken = $auth->getTokenByUsername($_COOKIE["member_login"], 0);

    if ($userToken != false) {
        // Valide le cookie "random_password" avec la base de données
        if (password_verify($_COOKIE["random_password"], $userToken[0]["password_hash"])) {
            $isPasswordVerified = true;
        }

        // Valide le cookie "random_selector" avec la base de données
        if (password_verify($_COOKIE["random_selector"], $userToken[0]["selector_hash"])) {
            $isSelectorVerified = true;
        }

        // Vérifie la date d'expiration du cookie
        if ($userToken[0]["expiry_date"] >= $current_date) {
            $isExpiryDateVerified = true;
        }

        // Redirige si toutes les validations basées sur les cookies retournent vrai
        // Sinon, marque le jeton comme expiré et supprime les cookies d'authentification
        if (!empty($userToken[0]["id"]) && $isPasswordVerified && $isSelectorVerified && $isExpiryDateVerified) {
            $isLoggedIn = true;
        } else {
            if (!empty($userToken[0]["id"])) {
                $auth->markAsExpired($userToken[0]["id"]);
            }
            // Supprime les cookies d'authentification
            $util->clearAuthCookie();
        }
    }
}
