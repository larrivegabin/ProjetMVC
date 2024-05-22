<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data["titre"] ?></title>
   <style>
        input{
            margin-top:5px;
            margin-bottom:5px;
        }
        .right{
            float:right;
        }
    </style>
    <?php include "view/header.php"; ?>

</head>
<body>

    <?php include "view/navbar.php"; ?>

    <!--<div class="col-lg-5 mr-auto">-->
    <div class="container mt-3">
        <h3>Film détaillé</h3>
        <hr/>
        
        <!-- Champ caché pour stocker l'ID du film -->
        <input type="hidden" name="id" value="<?php echo $data["film"]->Film_id ?>" />

        Nom: <!-- Affichage du nom du film en lecture seule -->
        <input type="text" readonly name="nom" value="<?php echo $data["film"]->Film_nom ?>" class="form-control bg-light"  />

        Sortie: <!-- Affichage de la date de sortie en lecture seule -->
        <input type="text" readonly name="prix" value="<?php echo $data["film"]->Date_sortie ?>" class="form-control bg-light" />

        Realisateur: <!-- Affichage du réalisateur en lecture seule -->
        <input type="text" readonly name="poids" value="<?php echo $data["film"]->Realisateur ?>" class="form-control bg-light" />

        <!-- Liens pour l'édition, la suppression et le retour -->
        <a href="index.php?controller=films&action=edition&id=<?php echo $data["film"]->Film_id ?>" class="btn btn-info">Editer</a>
        <a href="index.php?controller=films&action=delete&id=<?php echo $data["film"]->Film_id ?>" class="btn btn-danger">Supprimer</a>
        <a href="index.php?controller=films&action=getAll" class="btn btn-secondary">Retour</a>
    </div>

</body>
</html>
