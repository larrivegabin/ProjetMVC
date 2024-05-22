<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8"> <!-- Déclaration du jeu de caractères -->
    <meta http-equiv="X-UA-Compatible" content="IE-edge"> <!-- Déclaration de la compatibilité avec Internet Explorer -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Méta-informations pour la vue sur les appareils mobiles -->
    <title><?php echo $data["titre"] ?></title> <!-- Titre de la page, utilisant la variable PHP $data["titre"] -->

    <?php include "view/header.php"; ?> <!-- Inclusion du fichier "header.php" contenant les balises <style> -->

</head>
<body>
    <!-- Barre de navigation (commentée) -->
    <?php include "view/navbar.php"; ?>

    <div class="container mt-3">
        <h3 style="float:left">Liste des films</h3>
        <a href="index.php?controller=films&action=create" class="btn btn-secondary" style="float:right">
            <i class="fa-solid fa-plus" style="color:whitesmoke"></i>
        </a>
        <br>

        <table class="table table-striped table-hover shadow-sm rounded">
            <thead class="table-dark">
                <tr>
                    <th>Nom</th>
                    <th>Sortie</th>
                    <th>Réalisateur</th>
                    <th>Image</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data["films"] as $film) {?>
                <!-- Boucle pour afficher les détails de chaque film dans une ligne du tableau -->
                <tr>
                    <td><?php echo $film["Film_nom"]; ?></td> <!-- Affiche le nom du film -->
                    <td><?php echo $film["Date_sortie"]; ?></td> <!-- Affiche la date de sortie du film -->
                    <td><?php echo $film["Realisateur"]; ?></td> <!-- Affiche le réalisateur du film -->

                    <td align="right">
                        <a href="index.php?controller=films&action=read&id=<?php echo $film['Film_id']; ?>">
                            <!-- Lien pour voir les détails du film en utilisant son ID -->
                            <i class="fa-solid fa-magnifying-glass" style="color:darkslategray"></i>
                        </a> &nbsp;
                        <a href="index.php?controller=films&action=delete&id=<?php echo $film['Film_id']; ?>">
                            <!-- Lien pour supprimer le film en utilisant son ID -->
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
