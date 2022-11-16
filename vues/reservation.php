<?php 
require_once "methodes/Reservation.php";

$reservation = new Reservation();

if(isset($_POST) && !empty($_POST) && isset($_GET["id_gite"])){
    $reservation->reserver();
}
