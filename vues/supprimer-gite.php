<?php 

if(!isset($_SESSION["admin"])){
    header('Location: accueil');
}

require_once "methodes/Gites.php";
$giteClass = new Gites();
$gite = $giteClass->getGiteById();

if(isset($_POST["supprimer"])){
    $giteClass->supprimerGite();
}


?>

<h2>Suppression d'un gite</h2>
<p>Vous êtes sur le point de supprimer le gite "<strong><?= $gite["nom_gite"] ?>" </strong></p>
<p>CONFIRMER ?</p>

<form method="post">
<a href="accueil" class="btn btn-success">Retour</a>
    <button type="submit" class="btn btn-danger" name="supprimer">Supprimer !</button>
</form>