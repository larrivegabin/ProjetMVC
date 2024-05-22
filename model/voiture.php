<?php
class voiture {
    private $table = "voiture";
    private $Connexion;

    private $voiture_id;
    private $voiture_nom;
    private $voiture_prix;
    private $constructeur;

    public function __construct($Connexion) {
        $this->Connexion = $Connexion;
    }

    // Getters
    public function getvoiture_id() {
        return $this->voiture_id;
    }

    public function getvoiture_nom() {
        return $this->voiture_nom;
    }

    public function getvoiture_prix() {
        return $this->voiture_prix;
    }

    public function getConstructeur() {
        return $this->constructeur;
    }

    // Setters
    public function setvoiture_id($id) {
        $this->voiture_id = $id;
    }

    public function setvoiture_nom($nom) {
        $this->voiture_nom = $nom;
    }

    public function setvoiture_prix($prix) {
        $this->voiture_prix = $prix;
    }

    public function setvoiture_constructeur($constructeur) {
        $this->constructeur = $constructeur;
    }

    // CRUD operations
    public function getAll() {
        $query = $this->Connexion->prepare("SELECT voiture_id, voiture_nom, voiture_prix, constructeur FROM " . $this->table);
        $query->execute();
        return $query->fetchAll();
    }

    public function getById($id) {
        $query = $this->Connexion->prepare("SELECT voiture_id, voiture_nom, voiture_prix, constructeur FROM " . $this->table . " WHERE voiture_id = :id");
        $query->execute(array("id" => $id));
        return $query->fetchObject();
    }

    public function insert() {
        $query = $this->Connexion->prepare("INSERT INTO " . $this->table . " (voiture_nom, voiture_prix, constructeur) VALUES (:nom, :prix, :constructeur)");
        return $query->execute(array(
            "nom" => $this->voiture_nom,
            "prix" => $this->voiture_prix,
            "constructeur" => $this->constructeur
        ));
    }

    public function update() {
        $query = $this->Connexion->prepare("UPDATE " . $this->table . " SET voiture_nom = :nom, voiture_prix = :prix, constructeur = :constructeur WHERE voiture_id = :id");
        return $query->execute(array(
            "id" => $this->voiture_id,
            "nom" => $this->voiture_nom,
            "prix" => $this->voiture_prix,
            "constructeur" => $this->constructeur
        ));
    }

    public function delete() {
        $query = $this->Connexion->prepare("DELETE FROM " . $this->table . " WHERE voiture_id = :id");
        return $query->execute(array("id" => $this->voiture_id));
    }
}
?>



