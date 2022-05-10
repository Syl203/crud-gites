<h1>Bienvenue

<?php if(isset($_SESSION["user"])){
    echo $_SESSION["user"];
    echo ' <span style="font-size:16px;">(<a href="deconnexion">déconnexion</a>)</span>';
}
?>

</h1>


<?php require "methodes/Gites.php";

$data = new Gites();
$gites = $data->getGITES();

?>
    <div class="row">
<?php

foreach($gites as $gite){
?>
    <div class="gite col-md-3 col-sm-12 mt-5">
        <h2 class="nom-gite"><?= $gite["nom_gite"] ?></h2>
        <img src="<?= $gite["img_gite"] ?>"><br><br>
        
        <p class="chambres">Nombre de chambres : <?= $gite["nombre_chambre"] ?></p>
        <p class="personnes">Nombre de personnes max : <?= $gite["nombre_personnes_max"] ?></p>
        <p class="sdb">Nombre de salles de bain : <?= $gite["nombre_sdb"] ?></p>
        <p class="prix">Prix à la semaine : <strong><?= $gite["prix_semaine"] ?> €</strong></p>

        <a class="btn details" href="details?id_gite=<?= $gite["id_gite"] ?>">En savoir +</a>

        <?php if(isset($_SESSION["user"])){ ?>
            <a class="btn comment" href="ajouter-commentaire?id_gite=<?= $gite["id_gite"] ?>">Commenter</a>
        <?php
        }
        ?>
        
    </div>

<?php
}
?>
</div>