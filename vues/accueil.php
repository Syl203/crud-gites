<h1>Bienvenue

<?php if(isset($_SESSION["user"])){
    echo $_SESSION["user"];
    echo ' <span style="font-size:16px;">(<a href="deconnexion">déconnexion</a>)</span>';
}
?>

</h1>


<?php require "methodes/Gites.php";

$data = new Gites();
$gitesDispo = $data->getGitesDispos();
$gitesIndispo = $data->getGitesIndispos();

?>
    <div class="row">
<?php

foreach($gitesDispo as $giteD){
?>
    <div class="gite col-md-3 col-sm-12 mt-5">
        <h2 class="nom-gite"><?= $giteD["nom_gite"] ?></h2>
        <img src="<?= $giteD["img_gite"] ?>"><br><br>
        
        <p class="chambres">Nombre de chambres : <?= $giteD["nombre_chambre"] ?></p>
        <p class="personnes">Nombre de personnes max : <?= $giteD["nombre_personnes_max"] ?></p>
        <p class="sdb">Nombre de salles de bain : <?= $giteD["nombre_sdb"] ?></p>
        <p class="prix">Prix à la semaine : <strong><?= $giteD["prix_semaine"] ?> €</strong></p>

        <a class="btn details" href="details?id_gite=<?= $giteD["id_gite"] ?>">En savoir +</a>

        <?php if(isset($_SESSION["user"])){ ?>
            <a class="btn comment" href="ajouter-commentaire?id_gite=<?= $giteD["id_gite"] ?>">Commenter</a>
        <?php
        }
        ?>
        
    </div>

<?php
}

foreach($gitesIndispo as $giteI){
?>

<div class="gite gite-indispo col-md-3 col-sm-12 mt-5">
        <h2 class="nom-gite"><?= $giteI["nom_gite"] ?></h2>
        <img src="<?= $giteI["img_gite"] ?>"><br><br>
        
        <p class="chambres">Nombre de chambres : <?= $giteI["nombre_chambre"] ?></p>
        <p class="personnes">Nombre de personnes max : <?= $giteI["nombre_personnes_max"] ?></p>
        <p class="sdb">Nombre de salles de bain : <?= $giteI["nombre_sdb"] ?></p>
        <p class="prix">Prix à la semaine : <strong><?= $giteI["prix_semaine"] ?> €</strong></p>
        <?php
            $date_d = new DateTime($giteI['date_depart']);
        ?>
        <p class="dispo">Disponible à partir du <strong><?= $date_d->format('d-m-Y') ?></strong></p>
        

        <a class="btn details" href="details?id_gite=<?= $giteI["id_gite"] ?>">En savoir +</a>

        <?php if(isset($_SESSION["user"])){ ?>
            <a class="btn comment" href="ajouter-commentaire?id_gite=<?= $giteI["id_gite"] ?>">Commenter</a>
        <?php
        }
        ?>
        
    </div>

<?php
}



?>
</div>