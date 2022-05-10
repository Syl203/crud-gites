<?php 
require_once "methodes/Gites.php";
require_once "methodes/Commentaires.php";

$details_gite = new Gites();
$details = $details_gite->getGiteById();

$commentaires = new Commentaires();
$comments = $commentaires->getComments();

?>
<div class="row">
    <div class="gite-details">
        <h2><?= $details["nom_gite"] ?></h2>
        <img src="<?= $details["img_gite"] ?>" alt="<?= $details["nom_gite"] ?>" />
        <p style="text-align: justify;"><?= $details["description_gite"] ?></p>
        <p>Situé en <?= $details["name"] ?></p>
        <p>Type de location : <?= $details["type_gite"] ?></p>
        <p class="chambres">Nombre de chambres : <?= $details["nombre_chambre"] ?></p>
        <p class="personnes">Nombre de personnes max : <?= $details["nombre_personnes_max"] ?></p>
        <p class="sdb">Nombre de salles de bain : <?= $details["nombre_sdb"] ?></p><br>
        <p class="prix">Prix à la semaine : <strong><span style="font-size:22px;"><?= $details["prix_semaine"] ?> €</span></strong></p>
        <a class="btn btn-success" href="accueil">Retour</a>
        <?php 
            if(isset($_SESSION["user"])){
                echo '<a href="reserver-gite'.$details["id_gite"].'" class="btn btn-primary">Réserver</a>';
            }
        ?>
        <?php
            if(isset($_SESSION["admin"])){
                echo '<a href="supprimer-gite?id_gite='.$details["id_gite"].'" class="btn btn-danger m-1">Supprimer</a>';
                echo '<a href="modifier-gite?id_gite='.$details["id_gite"].'" class="btn btn-primary m-1">Modifier</a>';
            }
        ?>
        <hr>
        <p id="toggle">Commentaire(s)</p>
        <div class="commentaires" id="commentaires">
            <?php 
                foreach($comments as $comment){
                    echo "<p style='margin-bottom:0;'>« <i>".$comment["contenu_commentaire"]."</i> »</p>";
                    echo "<p class='small'> Posté par <strong>".$comment["auteur_commentaire"]. "</strong></p><br>";
                }
            ?>
        </div>
    </div>
</div>