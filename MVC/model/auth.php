<?php
    class Auth {
        private $table = "tbl_token_auth"; // Nom de la table de la base de données utilisée pour gérer les tokens d'authentification.
        private $Connexion; // Instance de la connexion à la base de données.

        private $id; // Propriété pour stocker l'ID du token d'authentification.
        private $username; // Propriété pour stocker le nom d'utilisateur associé au token.
        private $password_hash; // Propriété pour stocker le hachage du mot de passe du token.
        private $selector_hash; // Propriété pour stocker le hachage du sélecteur du token.
        private $is_expired; // Propriété pour stocker l'état d'expiration du token (1 pour expiré, 0 pour actif).
        private $expiry_date; // Propriété pour stocker la date d'expiration du token.

        public function __construct($Connexion) {
            $this->Connexion = $Connexion; // Constructeur de la classe, reçoit l'instance de connexion à la base de données.
        }

        public function getId() {
            return $this->id; // Renvoie l'ID du token.
        }
        
        public function getUsername() {
            return $this->username; // Renvoie le nom d'utilisateur associé au token.
        }

        public function getPassword_hash() {
            return $this->password_hash; // Renvoie le hachage du mot de passe du token.
        }

        public function getSelector_hash() {
            return $this->selector_hash; // Renvoie le hachage du sélecteur du token.
        }

        public function getIs_expired() {
            return $this->is_expired; // Renvoie l'état d'expiration du token.
        }

        public function getExpiry_date() {
            return $this->expiry_date; // Renvoie la date d'expiration du token.
        }

        public function setId($id) {
            $this->id = $id; // Définit l'ID du token.
        }

        public function setUsername($username) {
            $this->username = $username; // Définit le nom d'utilisateur associé au token.
        }

        public function setPassword_hash($password_hash) {
            $this->password_hash = $password_hash; // Définit le hachage du mot de passe du token.
        }

        public function setSelector_hash($selector_hash) {
            $this->selector_hash = $selector_hash; // Définit le hachage du sélecteur du token.
        }

        public function setIs_expired($is_expired) {
            $this->is_expired = $is_expired; // Définit l'état d'expiration du token.
        }

        public function setExpiry_date($expiry_date) {
            $this->expiry_date = $expiry_date; // Définit la date d'expiration du token.
        }
        
        public function getAll() {
            $query = $this->Connexion->prepare("SELECT id, username, password_hash, selector_hash, is_expired, expiry_date FROM " . $this->table);
            $query->execute();
            $result = $query->fetchAll(); // Exécute une requête SQL pour obtenir tous les enregistrements de la table des tokens.
            $this->Connexion = null; // Ferme la connexion à la base de données.
            return $result; // Renvoie le résultat de la requête.
        }

        public function getById($id) {
            $query = $this->Connexion->prepare("SELECT * FROM " . $this->table . " WHERE id = :id");
            $query->execute(array(
                "id" => $id
            ));
            $result = $query->fetchObject(); // Exécute une requête SQL pour obtenir un enregistrement de la table des tokens en fonction de son ID.
            $this->Connexion = null; // Ferme la connexion à la base de données.
            return $result; // Renvoie le résultat de la requête.
        }

        public function getTokenByUsername($username, $expired) {
            $query = $this->Connexion->prepare("SELECT * FROM " . $this->table . " WHERE username = :username AND is_expired = :is_expired");
            $query->execute(array(
                "username" => $username,
                "is_expired" => $expired
            ));
            $result = $query->fetchObject(); // Exécute une requête SQL pour obtenir un enregistrement de la table des tokens en fonction du nom d'utilisateur et de l'état d'expiration.
            $this->Connexion = null; // Ferme la connexion à la base de données.
            return json_decode(json_encode($result), true); // Transformation de l'objet STDClass en tableau et renvoie le résultat.
        }

        public function markAsExpired($tokenId) {
            $query = $this->Connexion->prepare("UPDATE " . $this->table . " SET is_expired = 1 WHERE id = :id");
            $result = $query->execute(array(
                "id" => $tokenId
            ));
            $this->Connexion = null; // Ferme la connexion à la base de données.
            return json_decode(json_encode($result), true); // Transformation de l'objet STDClass en tableau et renvoie le résultat.
        }

        public function insertToken($username, $random_password_hash, $random_selector_hash, $expiry_date) {
            $query = $this->Connexion->prepare("INSERT INTO " . $this->table . " (username, password_hash, selector_hash, expiry_date)
                VALUES (:username, :random_password_hash, :random_selector_hash, :expiry_date)");
            $result = $query->execute(array(
                "username" => $username,
                "random_password_hash" => $random_password_hash,
                "random_selector_hash" => $random_selector_hash,
                "expiry_date" => $expiry_date
            ));
            $this->Connexion = null; // Ferme la connexion à la base de données.
            return json_decode(json_encode($result), true); // Transformation de l'objet STDClass en tableau et renvoie le résultat.
        }
    }
?>

