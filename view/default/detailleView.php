<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemple PHP+PDO+POO+MVC</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" /> <!-- Correction ajout CSS bootstrap -->
    <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> <!-- Correction ajout JS bootstrap -->
    <style>
        input{
            margin-top:5px;
            margin-bottom:5px;
        }
        .right{
            float:right;
        }
    </style>
</head>
<body>
    <div class="col-lg-5 mr-auto">
        <form action="index.php?controller=voitures&action=maj" method="post">
            <h3>voiture detaillé</h3>
            <hr/>
            <input type="hidden" name="id" value="<?php echo $data["voiture"]->voiture_id ?>" />
            Voiture: <input type="text" name="nom" value="<?php echo $data["voiture"]->voiture_nom ?>" class="form-control" />
            Prix: <input type="text" name="prix" value="<?php echo $data["voiture"]->voiture_prix ?>" class="form-control" />
            Constructeur: <input type="text" name="constructeur" value="<?php echo $data["voiture"]->constructeur ?>" class="form-control" />
            <input type="submit" value="Modifier" class="btn btn-sucess"/>
        </form>
        <a href="index.php" class="btn btn-info">Retour</a>
    </div>

</body>
</html>