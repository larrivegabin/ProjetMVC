<?php
class UtilsController {
    // Génère un jeton (token) aléatoire de la longueur spécifiée
    public function getToken($length)
    {
        $token = "";
        $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
        $max = strlen($codeAlphabet) - 1;
        for ($i = 0; $i < $length; $i++) {
            $token .= $codeAlphabet[$this->cryptoRandSecure(0, $max)];
        }
        return $token;
    }

    // Fonction de génération de nombres aléatoires sécurisée (à améliorer)
    public function cryptoRandSecure($min, $max)
    {
        $range = $max - $min;
        if ($range < 1) {
            return $min; // Cette fonction génère un nombre pseudo-aléatoire non sécurisé.
        }
        // Il est recommandé d'améliorer cette fonction pour une meilleure sécurité.
        // Utilisez une source de nombres aléatoires sécurisée.
    }

    // Redirige l'utilisateur vers une URL spécifiée
    public function redirect($url) {
        header("Location:" . $url);
        exit;
    }

    // Efface les cookies d'authentification
    public function clearAuthCookie() {
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
