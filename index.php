<?php
require_once 'config/global.php'; // Inclut un fichier de configuration global

// Vérifie si un contrôleur est spécifié dans les paramètres de l'URL
if (isset($_GET["controller"])) {
    $controllerObj = loadController($_GET["controller"]);
    loadAction($controllerObj);
} else {
    // Si aucun contrôleur spécifié, charge le contrôleur par défaut
    $controllerObj = loadController(CONTROLLER_DEFAULT);
    loadAction($controllerObj);
}

// Fonction pour charger un contrôleur en fonction du nom du contrôleur passé en paramètre
function loadController($controller) {
    switch ($controller) {
        case 'voitures':
            $strFileController = 'controller/voituresController.php'; // Chemin vers le contrôleur des voitures
            require_once $strFileController; // Inclut le fichier du contrôleur des voitures
            $controllerObj = new voituresController(); // Crée une instance du contrôleur des voitures
            break;

        default:
            $strFileController = 'controller/voituresController.php'; // Par défaut, charge le contrôleur des voitures
            require_once $strFileController;
            $controllerObj = new voituresController();
            break;
    }
    return $controllerObj; // Retourne l'objet du contrôleur chargé
}

// Fonction pour charger et exécuter une action sur le contrôleur
function loadAction($controllerObj) {
    if (isset($_GET["action"])) {
        $controllerObj->run($_GET["action"]); // Exécute l'action spécifiée dans les paramètres de l'URL sur le contrôleur
    } else {
        $controllerObj->run(ACTION_DEFAULT); // Si aucune action spécifiée, exécute l'action par défaut
    }
}
