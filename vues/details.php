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
                echo '<a class="btn btn-primary" id="clic-resa">Réserver</a>';
        ?>

                <div class="reservation mt-4" id="reservation">
                    <h2>Formulaire de réservation</h2>
                    <form method="post" action="reservation?id_gite=<?= $details["id_gite"] ?>">
                        <div class="mt-3">
                            <label for="email_user">Votre email</label>
                            <input type="email" id="email_user" name="email_user" class="form-control" value="<?= $_SESSION["email_user"] ?>">
                        </div>

                        <div class="mt-3">
                            <label for="date-arrivee">Date d'arrivée souhaitée</label>
                            <input type="date" id="date-arrivee" name="date-arrivee" class="form-control">
                        </div>

                        <div class="mt-3">
                            <label for="date-depart">Date de départ souhaitée</label>
                            <input type="date" id="date-depart" name="date-depart" class="form-control">
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-success" id="btn-resa">Réserver</button>
                        </div>
                    </form>
                </div>

        <?php
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