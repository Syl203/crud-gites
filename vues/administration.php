<?php 
    require_once "methodes/Gites.php";
    require_once "methodes/Utilisateur.php";
    $data = new Gites();
    $data2 = new Utilisateur();
    $gites = $data->getGites();
    $users = $data2->getUser();
?>

<h1>Bienvenue <?= $_SESSION["admin"] ?> <span style="font-size:16px;">(<a href="deconnexion">déconnexion</a>)</span></h1> 
<hr>
<div class="row-admin">
    <div class="admin-gestion-utilisateur mt-5">
        <h2>GESTION DES UTILISATEURS</h2>
        <hr>
        <?php 
        foreach ($users as $user){
            ?>
            utilisateur : <?= $user["nom_user"] ?><br>
            email : <?= $user["email_utilisateur"] ?><br>
            <span style="color:red;">supprimer</span><br><br>
            <?php
            }
            ?>
    </div>

    <div class="admin-gestion-gites mt-5">
        <h2>GESTION DES GITES <a class="btn btn-danger" href="ajouter-gite">Ajouter un gite</a></h2>
        <hr>
        <div class="row">
        <?php

        foreach($gites as $gite){
        ?>
            <div class="gite_admin mt-5">
                <h2 class="nom-gite"><?= $gite["nom_gite"] ?></h2>
                <img src="<?= $gite["img_gite"] ?>"><br><br>
                <p class="chambres">Nombre de chambres : <?= $gite["nombre_chambre"] ?></p>
                <p class="personnes">Nombre de personnes max : <?= $gite["nombre_personnes_max"] ?></p>
                <p class="sdb">Nombre de salles de bain : <?= $gite["nombre_sdb"] ?></p>
                <p class="prix">Prix à la semaine : <strong><?= $gite["prix_semaine"] ?> €</strong></p>

                <a class="btn btn-dark" href="details?id_gite=<?= $gite["id_gite"] ?>">Détails</a>
                <a class="btn btn-danger supprimer" href="supprimer-gite?id_gite=<?= $gite["id_gite"] ?>">Supprimer</a>
                <a class="btn btn-primary modifier" href="modifier-gite?id_gite=<?= $gite["id_gite"] ?>">Modifier</a>
            </div>

        <?php
        }
        ?>
        </div>
    </div>
</div>