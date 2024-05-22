<?php
class voituresController {
    private $connecteur;
    private $connexion;

    // Constructeur de la classe
    public function __construct() {
        require_once __DIR__ . "/../core/connecteur.php";
        require_once __DIR__ . "/../model/voiture.php";

        $this->connecteur = new Connecteur();
        $this->connexion = $this->connecteur->connexion();
    }

    // Méthode principale pour exécuter différentes actions
    public function run($action) {
        switch($action) {
            case "index":
                $this->index();
                break;
            case "read":
                $this->read();
                break;
            case "getAll":
                $this->getAll();
                break;
            case "edition":
                $this->edition();
                break;
            case "create":
                $this->create();
                break;
            case "save":
                $this->save();
                break;
            case "delete":
                $this->delete();
                break;
            default:
                $this->index();
                break;
        }
    }

    // Méthode pour charger la page d'accueil avec la liste des voitures
    public function index() {
        // header('Location: /../welcome.php');
        $this->view("voitureList", []);

    }

    // Méthode pour afficher les détails d'une voiture
    public function read() {
        $voiture = new voiture($this->connexion);
        $unvoiture = $voiture->getById($_GET["id"]);
        $this->view("voitureRead", array("voiture" => $unvoiture, "titre" => "voiture"));
    }

    // Méthode pour sauvegarder les modifications d'une voiture
    public function save() {
        // ...
    }

    // Méthode pour supprimer une voiture
    public function delete() {
        // ...
    }

    // Méthode pour éditer une voiture
    public function edition() {
        // ...
    }

    // Méthode pour créer une nouvelle voiture
    public function create() {
        // ...
    }

    // Méthode pour obtenir la liste de toutes les voitures
    public function getAll() {
        $voiture = new voiture($this->connexion);
        $listevoitures = $voiture->getAll();
        $this->view("voitureList", array("voitures" => $listevoitures, "titre" => "Liste des voitures"));
    }

    // Méthode pour afficher une vue
    public function view($name, $data) {
        require_once __DIR__ . "/../view/voiture/" . $name . "View.php";
    }
}
?>
