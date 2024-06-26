<?php 


//echo __DIR__ ; exit;
require_once __DIR__ ."/../model/auth.php";
require_once __DIR__ ."/../model/member.php";
require_once "utilsController.php";
require_once __DIR__ ."/../core/connecteur.php";

$connecteur = new Connecteur();
$connexion=$connecteur->connexion();


$auth = new Auth($connexion);
$db_handle = new Member($connexion);
$util = new UtilsController();

// Get Current date, time
$current_time = time();
$current_date = date("Y-m-d H:i:s", $current_time);

// Set Cookie expiration for 1 month
$cookie_expiration_time = $current_time + (30 * 24 * 60 * 60);  // for 1 month

$isLoggedIn = false;

// Check if loggedin session and redirect if session exists
if (! empty($_SESSION["member_id"])) {
    $isLoggedIn = true;
}
// Check if loggedin session exists
else if (! empty($_COOKIE["member_login"]) && ! empty($_COOKIE["random_password"]) && ! empty($_COOKIE["random_selector"])) {
    // Initiate auth token verification diirective to false
    $isPasswordVerified = false;
    $isSelectorVerified = false;
    $isExpiryDateVerified = false;
    
    // Get token for username
    $userToken = $auth->getTokenByUsername($_COOKIE["member_login"],0);    
  
    if ($userToken != false){

        // Validate random password cookie with database
        if (password_verify($_COOKIE["random_password"], $userToken[0]["password_hash"])) {
            $isPasswordVerified = true;
        }
        
        // Validate random selector cookie with database
        if (password_verify($_COOKIE["random_selector"], $userToken[0]["selector_hash"])) {
            $isSelectorVerified = true;
        }
        
        // check cookie expiration by date
        if($userToken[0]["expiry_date"] >= $current_date) {
            $isExpiryDareVerified = true;
        }
        
        // Redirect if all cookie based validation retuens true
        // Else, mark the token as expired and clear cookies
        if (!empty($userToken[0]["id"]) && $isPasswordVerified && $isSelectorVerified && $isExpiryDareVerified) {
            $isLoggedIn = true;
        } else {
            if(!empty($userToken[0]["id"])) {
                $auth->markAsExpired($userToken[0]["id"]);
            }
            // clear cookies
            $util->clearAuthCookie();
        }
    }
}
