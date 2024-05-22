
    
    <!-- Bibliothèque Fontawesome pour les icones  -->
    <link href="/MVC/assets/image/fontawesome-free-6.4.0-web/css/fontawesome.min.css" rel="stylesheet" />
    <link href="/MVC/assets/image/fontawesome-free-6.4.0-web/css/brands.min.css" rel="stylesheet"/>
    <link href="/MVC/assets/image/fontawesome-free-6.4.0-web/css/solid.min.css" rel="stylesheet"/> 
    <!-- Bibliothèque Boostrap pour la mise en page  -->
    <link rel="stylesheet" href="/MVC/assets/bootstrap-4.6.2-dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="/MVC/assets/bootstrap-4.6.2-dist/js/bootstrap.bundle.min.js"></script>

    <?php 
            session_start(); // Démarre la session

            require_once __DIR__ . "/../controller/authenticateController.php"; // Inclut le fichier du contrôleur d'authentification
            
            if (isset($isLoggedIn)) {
                if (!$isLoggedIn) {
                    // Si l'utilisateur n'est pas connecté, redirige vers la page de connexion
                    header('Location: /MVC/login.php');
                }
            }
            


    ?>
