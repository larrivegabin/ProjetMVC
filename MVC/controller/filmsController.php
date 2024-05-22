<?php
class filmsController
{
    private $connecteur;
    private $connexion;

    public function __construct()
    {
        require_once __DIR__ . "/../core/connecteur.php";
        require_once __DIR__ . "/../model/film.php";

        $this->connecteur = new Connecteur();
        $this->connexion = $this->connecteur->connexion();
    }

    public function run($action)
    {
        // Sélection de l'action en fonction de la requête
        switch ($action) {
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

    /**
     * Chargement des films sur la page d'accueil
     */
    public function index()
    {
        // Redirection vers la page d'accueil
        header('Location: /MVC/welcome.php');
    }

    public function read()
    {
        // Récupère un film par son ID et affiche la vue "filmRead"
        $film = new film($this->connexion);
        $unfilm = $film->getById($_GET["id"]);
        $this->view("filmRead", array("film" => $unfilm, "titre" => "film"));
    }

    public function save()
    {
        if (isset($_POST["id"])) {
            // Met à jour un film si l'ID est spécifié, sinon insère un nouveau film
            $film = new film($this->connexion);
            $film->setArt_id($_POST["id"]);
            $film->setArt_Nom($_POST["nom"]);
            $film->setArt_Prix($_POST["prix"]);
            $film->setArt_Poid($_POST["poid"]);
            $save = $film->update();
        } else {
            $film = new film($this->connexion);
            $film->setArt_Nom($_POST["nom"]);
            $film->setArt_Prix($_POST["prix"]);
            $film->setArt_Poid($_POST["poid"]);
            $insert = $film->insert();
        }
        // Redirection vers la liste de films
        header('Location: /MVC/index.php?controller=films&action=getAll');
    }

    public function delete()
    {
        if (isset($_GET["id"])) {
            // Supprime un film par son ID
            $film = new film($this->connexion);
            $film->setArt_id($_GET["id"]);
            $save = $film->delete();
        }
        // Redirection vers la liste de films
        header('Location: /MVC/index.php?controller=films&action=getAll');
    }

    public function edition()
    {
        // Affiche la vue "filmUpdate" pour éditer un film
        $film = new film($this->connexion);
        $unfilm = $film->getById($_GET["id"]);
        $this->view("filmUpdate", array("film" => $unfilm, "titre" => "Edition film"));
    }

    public function create()
    {
        // Affiche la vue "filmCreate" pour ajouter un nouveau film
        $film = new film($this->connexion);
        $this->view("filmCreate", array("film" => $film, "titre" => "Ajout film"));
    }

    public function getAll()
    {
        // Récupère la liste de tous les films et affiche la vue "filmList"
        $film = new film($this->connexion);
        $listefilms = $film->getAll();
        $this->view("filmList", array("films" => $listefilms, "titre" => "Liste des films"));
    }

    public function view($name, $data)
    {
        // Affiche la vue en fonction du nom passé en paramètre
        require_once __DIR__ . "/../view/film/" . $name . "View.php";
    }
}

