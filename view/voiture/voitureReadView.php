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
        <h3>voiture detaillé</h3>
        <hr/>
        <input type="hidden" name="id" value="<?php echo $data["voiture"]->voiture_id ?>" />
        Voiture: <input type="text"  readonly name="nom" value="<?php echo $data["voiture"]->voiture_nom ?>" class="form-control bg-light"  />
        Prix: <input type="text" readonly name="prix" value="<?php echo $data["voiture"]->voiture_prix ?>" class="form-control bg-light" />
        Constructeur: <input type="text" readonly name="constructeur" value="<?php echo $data["voiture"]->constructeur ?>" class="form-control bg-light" />

        <a href="index.php?controller=voitures&action=edition&id=<?php echo $data["voiture"]->voiture_id ?>" class="btn btn-info">Editer</a>
        <a href="index.php?controller=voitures&action=delete&id=<?php echo $data["voiture"]->voiture_id ?>" class="btn btn-danger">Supprimer</a>
        <a href="index.php?controller=voitures&action=getAll" class="btn btn-secondary">Retour</a>
    </div>

</body>
</html>