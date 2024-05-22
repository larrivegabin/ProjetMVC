<?php
    class film {
        private $table = "film"; // Déclaration d'une propriété privée pour stocker le nom de la table (peut être utilisée dans d'autres méthodes).
        private $Connexion; // Déclaration d'une propriété privée pour stocker la connexion à la base de données.

        private $Film_id; // Déclaration de propriétés privées pour stocker les attributs d'un film.
        private $Film_nom;
        private $Date_sortie;
        private $Realisateur;

        public function __construct($Connexion) {
            $this->Connexion = $Connexion; // Constructeur de la classe, initialise la connexion.
        }

        public function getArt_id() {
            return $this->Film_id; // Méthode pour récupérer l'ID du film.
        }
        public function getArt_nom() {
            return $this->Film_nom; // Méthode pour récupérer le nom du film.
        }
        public function getArt_prix() {
            return $this->Date_sortie; // Méthode pour récupérer la date de sortie du film.
        }
        public function getArt_poid() {
            return $this->Realisateur; // Méthode pour récupérer le réalisateur du film.
        }

        public function setArt_id($id) {
            $this->Film_id = $id; // Méthode pour définir l'ID du film.
        }
        public function setArt_nom($nom) {
            $this->Film_nom = $nom; // Méthode pour définir le nom du film.
        }
        public function setArt_prix($prix) {
            $this->Date_sortie = $prix; // Méthode pour définir la date de sortie du film.
        }
        public function setArt_poid($poid) {
            $this->Realisateur = $poid; // Méthode pour définir le réalisateur du film.
        }

        public function getAll() {
            $query = $this->Connexion->prepare("SELECT Film_id, Film_nom, Date_sortie, Realisateur FROM " . $this->table); // Requête SQL pour récupérer tous les films de la table.
            $query->execute();
            $result = $query->fetchAll(); // Exécution de la requête et récupération des résultats.
            $this->Connexion = null; // Fermeture de la connexion.
            return $result; // Retourne les résultats.
        }

        public function getById($id) {
            $query = $this->Connexion->prepare("SELECT Film_id, Film_nom, Date_sortie, Realisateur FROM " .
                $this->table . " WHERE Film_id = :id"); // Requête SQL pour récupérer un film par son ID.
            $query->execute(array(
                "id" => $id
            ));
            $result = $query->fetchObject(); // Exécution de la requête et récupération de l'objet résultant.
            $this->Connexion = null; // Fermeture de la connexion.
            return $result; // Retourne l'objet résultant.
        }

        public function insert() {
            $query = $this->Connexion->prepare("INSERT INTO " . $this->table . " (Film_nom, Date_sortie, Realisateur)
                    VALUES (:nom,:sortie,:realisateur)"); // Requête SQL pour insérer un nouveau film.
            $result = $query->execute(array(
                "nom" => $this->Film_nom,
                "sortie" =>  $this->Date_sortie,
                "realisateur" => $this->Realisateur,
            ));
            $this->Connexion = null; // Fermeture de la connexion.
            return $result; // Retourne le résultat de l'insertion.
        }

        public function update() {
            $query = $this->Connexion->prepare("
                UPDATE " . $this->table . " 
                SET Film_nom = :nom, Date_sortie = :sortie, Realisateur = :realisateur 
                WHERE Film_id = :id 
            "); // Requête SQL pour mettre à jour les informations d'un film.
            $result = $query->execute(array(
                "id" => $this->Film_id,
                "nom" => $this->Film_nom,
                "sortie" => $this->Date_sortie,
                "realisateur" => $this->Realisateur,
            ));
            $this->Connexion = null; // Fermeture de la connexion.
            return $result; // Retourne le résultat de la mise à jour.
        }

        public function delete() {
            $query = $this->Connexion->prepare("
                DELETE FROM " . $this->table . "                 
                WHERE Film_id = :id 
            "); // Requête SQL pour supprimer un film par son ID.
            $result = $query->execute(array(
                "id" => $this->Film_id
            ));
            $this->Connexion = null; // Fermeture de la connexion.
            return $result; // Retourne le résultat de la suppression.
        }
    }
?>
