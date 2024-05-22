<?php 
class UtilsController {
    public function getToken($length)
    {
        $token = ""; // Initialisation d'une chaîne vide pour stocker le jeton
        $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ"; // Définition des caractères majuscules
        $codeAlphabet .= "abcdefghijklmnopqrstuvwxyz"; // Ajout des caractères minuscules
        $codeAlphabet .= "0123456789"; // Ajout des chiffres
        $max = strlen($codeAlphabet) - 1; // Calcul de la longueur de la chaîne de caractères
        for ($i = 0; $i < $length; $i ++) {
            // Génération d'un jeton en concaténant des caractères aléatoires
            $token .= $codeAlphabet[$this->cryptoRandSecure(0, $max)];
        }
        return $token; // Renvoie le jeton généré
    }
    
    // TODO Fonction cryptoRandSecure unsafe (à améliorer)
    public function cryptoRandSecure($min, $max)
    {
        $range = $max - $min; // Calcul de la plage de valeurs possibles
        if ($range < 1) {
            return $min; // Si la plage est inférieure à 1, retourne la valeur minimale
        }
        $log = ceil(log($range, 2)); // Calcul du logarithme de la plage
        $bytes = (int) ($log / 8) + 1; // Calcul de la longueur en octets
        $bits = (int) $log + 1; // Calcul de la longueur en bits
        $filter = (int) (1 << $bits) - 1; // Crée un filtre pour les bits
        do {
            // Génère un nombre aléatoire sécurisé en utilisant OpenSSL
            $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
            $rnd = $rnd & $filter; // Applique le filtre pour éliminer les bits non pertinents
        } while ($rnd >= $range); // Répète la génération si le nombre est en dehors de la plage
        return $min + $rnd; // Retourne le nombre aléatoire dans la plage spécifiée
    }
    
    public function redirect($url) {
        header("Location:" . $url); // Redirige l'utilisateur vers l'URL spécifiée
        exit; // Arrête l'exécution du script
    }
    
    public function clearAuthCookie() {
        // Vérifie si des cookies d'authentification existent et les supprime
        if (isset($_COOKIE["member_login"])) {
            setcookie("member_login", "");
        }
        if (isset($_COOKIE["random_password"])) {
            setcookie("random_password", "");
        }
        if (isset($_COOKIE["random_selector"])) {
            setcookie("random_selector", "");
        }
    }
}
?>
