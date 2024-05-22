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
    <form action ="index.php?controller=voitures&action=creation" 
    method ="post" class="col-lg-5">
        <h3>Add voiture</h3>
        Nom: <input type="text" name="nom" class="form-control">
        Poid: <input type="text" name="poid" class="form-control">
        Prix: <input type="text" name="prix" class="form-control">
        <input type="submit" value="Send" class="btn btn-success"/>
    </form>

    <div class="col-lg-7">
        <h3>voitures</h3>
        <hr/> 
    </div>
    
    <section class="col-lg-7" style="height:400px;overflow-y:scroll;">
        <!-- $voiture["nom"]; -> $voiture["voiture_nom"]; -->
        <?php foreach($data["voitures"] as $voiture) {?>
            <?php echo $voiture["voiture_nom"]; ?> - 
            <?php echo $voiture["voiture_prix"]; ?> - 
            <?php echo $voiture["voiture_poid"]; ?> - 
            <div class="right">
                <a href="index.php?controller=voitures&action=detaille&id=<?php echo $voiture['voiture_id']; ?>" 
                class="btn btn-info">
                detailles
                </a>
                
        </div>
        <hr/>
        <?php } ?>
    </section>
</body>
</html>