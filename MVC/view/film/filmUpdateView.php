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

<div class="container mt-3">
    <form action="index.php?controller=films&action=save" method="post">
        <h3>Film détaillé</h3>
        <hr/>

        <!-- Champ caché pour stocker l'ID du film -->
        <input type="hidden" name="id" value="<?php echo $data["film"]->Film_id ?>" />

        Nom: <!-- Champ de saisie pour le nom du film -->
        <input type="text" name="nom" value="<?php echo $data["film"]->Film_nom ?>" class="form-control" />

        Date_sortie: <!-- Champ de saisie pour la date de sortie du film -->
        <input type="text" name="prix" value="<?php echo $data["film"]->Date_sortie ?>" class="form-control" />

        Realisateur: <!-- Champ de saisie pour le réalisateur du film -->
        <input type="text" name="poid" value="<?php echo $data["film"]->Realisateur ?>" class="form-control" />

        <!-- Bouton de soumission pour enregistrer les modifications -->
        <input type="submit" value="Modifier" class="btn btn-success"/>
    </form>

    <!-- Lien pour retourner à la page de détail du film -->
    <a href="index.php?controller=films&action=read&id=<?php echo $data["film"]->Film_id ?>" class="btn btn-info">Retour</a>
</div>

    </div>

</body>
</html>