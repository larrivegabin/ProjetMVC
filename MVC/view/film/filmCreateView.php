<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8"> <!-- Déclaration du jeu de caractères -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Déclaration de la compatibilité avec Internet Explorer -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Méta-informations pour la vue sur les appareils mobiles -->
    <title><?php echo $data["titre"] ?></title> <!-- Titre de la page, utilisant la variable PHP $data["titre"] -->

    <style>
        
        input{
            margin-top:5px;
            margin-bottom:5px;
        }
        .right{
            float:right;
        }
    </style>
    </style>

    <?php include "view/header.php"; ?> <!-- Inclusion du fichier "header.php" -->

</head>
<body>

    <?php include "view/navbar.php"; ?> <!-- Inclusion du fichier "navbar.php" -->

    <!--<div class="col-lg-5 mr-auto">-->
    <div class="container mt-3">
        <form action="index.php?controller=films&action=save" method="post"> <!-- Formulaire pour l'action de sauvegarde de données -->
            <h3>Nouvel film</h3> <!-- Titre du formulaire -->
            <hr/>

            Nom: <input type="text" name="nom" class="form-control"> <!-- Champ pour le nom -->
            Sortie: <input type="text" name="prix" class="form-control"> <!-- Champ pour la date de sortie -->
            Realisateur: <input type="text" name="poid" class="form-control"> <!-- Champ pour le réalisateur -->

            <input type="submit" value="Send" class="btn btn-success"/> <!-- Bouton d'envoi du formulaire -->

        </form>

        <a href="index.php?controller=films&action=getAll" class="btn btn-info">Retour</a> <!-- Bouton de retour vers la liste des films -->

    </div>

</body>
</html>
