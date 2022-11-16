<?php 
require_once "methodes/Gites.php";
$giteClasse = new Gites();
$gite = $giteClasse->getGiteById();
$date_arrivee = new DateTime($gite["date_arrivee"]);
$date_depart = new DateTime($gite["date_depart"]);

?>
<h1 class="text-center">Confirmation de votre réservation</h1>
<h3 class="text-center"><?= $gite["nom_gite"] ?></h3><br>
<h5 class="text-center">Du <?= $date_arrivee->format('d-m-Y') ?> au <?= $date_depart->format('d-m-Y') ?></h5>