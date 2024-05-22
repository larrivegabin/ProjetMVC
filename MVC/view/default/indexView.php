<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemple PHP+PDO+POO+MVC</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <!-- Inclusion du CSS de Bootstrap -->

    <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <!-- Inclusion du JavaScript de Bootstrap -->
</head>
<body>
    <form action="index.php?controller=films&action=creation" method="post" class="col-lg-5">
        <h3>Add film</h3>
        Nom: <input type="text" name="nom" class="form-control">
        Poid: <input type="text" name="poid" class="form-control">
        Prix: <input type="text" name="prix" class="form-control">
        <input type="submit" value="Send" class="btn btn-success">
    </form>

    <div class="col-lg-7">
        <h3>films</h3>
        <hr/>
    </div>

    <section class="col-lg-7" style="height: 400px; overflow-y: scroll;">
        <?php foreach ($data["films"] as $film) { ?>
            <!-- Affichage des informations de chaque film -->
            <?php echo $film["art_nom"]; ?> -
            <?php echo $film["art_prix"]; ?> -
            <?php echo $film["art_poid"]; ?> -
            <div class="right">
                <a href="index.php?controller=films&action=detaille&id=<?php echo $film['art_id']; ?>" class="btn btn-info">
                    Détails
                </a>
            </div>
            <hr/>
        <?php } ?>
    </section>
</body>
</html>
