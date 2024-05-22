<?php
    /*
        Définition de la classe Connecteur avec les credentials
    */
    class Connecteur {
        private $driver;
        private $host, $user, $pass, $database, $charset;
        
        // Définition du contructeur pour l'init des atributs
        public function __construct() {
            $db_cfg = require_once 'config/database.php'; // Inclusion du fichier de configuration de la base de données.
            $this->driver = DB_DRIVER; // Définition du driver de la base de données (par exemple, 'mysql').
            $this->host = DB_HOST; // Définition de l'hôte de la base de données (par exemple, 'localhost').
            $this->user = DB_USER; // Définition de l'utilisateur de la base de données.
            $this->pass = DB_PASS; // Définition du mot de passe de la base de données.
            $this->database = DB_DATABASE; // Définition du nom de la base de données.
            $this->charset = DB_CHARSET; // Définition du jeu de caractères de la base de données.
        }

        public function connexion() {
            $bdd = $this->driver . ':host=' . $this->host . ';dbname=' . 
                $this->database . ';charset=' . $this->charset;
            try {
                $connection = new PDO("sqlsrv:Server=LAPTOP-N3FTN9JA\SQLEXPRESS;Database=mvc2", "ok", "root");
                $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $connection; // Retourne l'objet de connexion PDO si la connexion réussit.
            } catch (PDOException $e) {
                // En cas d'échec de connexion, lance une exception avec un message d'erreur.
                throw new Exception('Problème de connexion à la base de données. Merci de prévenir votre administrateur');
            }
        }
    }
?>
