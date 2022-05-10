<?php 

if(!isset($_SESSION["user"])){
    header('Location:accueil');
}

require_once "methodes/Gites.php";
require_once "methodes/Commentaires.php";
require_once "methodes/Utilisateur.php";

$giteClass = new Gites();
$commentClass = new Commentaires();
$userClass = new Utilisateur();

$gite = $giteClass->getGiteById();
$user = $userClass->getUser();
//$comment = $commentClass->setComment();

$id_gite = $_GET["id_gite"];
$id_utilisateur = $_SESSION["id_utilisateur"];

if(isset($_POST["clic"])){
    $commentClass->setComment();
}

?>

<div class="row">
    <div class="ajout-commentaire">
        <h1>Poster un commentaire</h1>
        <img src="<?= $gite["img_gite"] ?>" alt="<?= $gite["nom_gite"] ?>" /><span><?= $gite["nom_gite"] ?></span>
        <form method="post" action="ajouter-commentaire?id_gite=<?= $id_gite ?>&utilisateur_id=<?= $id_utilisateur ?>">
            <label for="commentaire">Votre commentaire :</label>
            <textarea name="commentaire" id="commentaire" class="form-control"></textarea>
            <button type="submit"  class="btn btn-success mt-3" name="clic">Commenter</button>
        </form>
    </div>
</div>