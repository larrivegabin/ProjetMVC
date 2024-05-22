<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data["titre"] ?></title>

    <?php include "view/header.php"; ?>

</head>
<body>
    <!--<div style="margin: 5px;">
        <a href="index.php?controller=voitures&action=index" class="btn btn-info">
            <i class="fa-solid fa-house" style="color:darkslategray"></i> - Accueil
        </a>  
    </div>-->

    <?php include "view/navbar.php"; ?>

    <div class="container mt-3">
        <h3 style="float:left">Liste des voitures </h3>  <a href="index.php?controller=voitures&action=create" 
                    class="btn btn-secondary" style="float:right">
                    <i class="fa-solid fa-plus" style="color:whitesmoke"></i>
                    </a>   
        <!--<hr/> -->
        <br>

        <style>
            /* striped color */
            .table-striped > tbody > tr:nth-child(2n+1) > td, .table-striped > tbody > tr:nth-child(2n+1) > th {
                background-color: #F1F1F1;
            }
            /* focus line color */
            .table-hover tbody tr:hover td, .table-hover tbody tr:hover th {
            background-color: lightgrey;
            }
        </style>
        <table class="table table-striped table-hover shadow-sm rounded">
            <thead class="table-dark">
            <tr>
                <th>Voiture</th>
                <th>Prix</th>
                <th>Constructeur</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($data["voitures"] as $voiture) {?>
            <tr>
                <td><?php echo $voiture["voiture_nom"]; ?></td>
                <td><?php echo $voiture["voiture_prix"]; ?></td>
                <td><?php echo $voiture["constructeur"]; ?></td>
                <td align="right">
                    <a href="index.php?controller=voitures&action=read&id=<?php echo $voiture['voiture_id']; ?>">
                        <i class="fa-solid fa-magnifying-glass" style="color:darkslategray"></i>
                    </a> &nbsp;
                    <a href="index.php?controller=voitures&action=delete&id=<?php echo $voiture['voiture_id']; ?>">
                        <i class="fa-regular fa-trash-can" style="color:red"></i>
                    </a>
                </td>
            </tr>      
            <?php } ?>
            </tbody>
        </table>




    </div>

                

</body>
</html>