<?php
//Import PHPMailer 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Composer's autoloader
require 'vendor/autoload.php';
require_once "methodes/Gites.php";

class Reservation extends Gites{

    public function reserver(){
// On crée une instance
$mail = new PHPMailer(true);
$gites = new Gites();
$gite = $gites->getGiteById();

try {

    $mail->isSMTP();                                           
    $mail->Host       = 'smtp.mailtrap.io';                  
    $mail->SMTPAuth   = true;                                  
    $mail->Username = '5a6e7e217d7ccc';                  
    $mail->Password = '13e077b28a3b1f';                               
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            
    $mail->Port       = 2525; 
	`SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    $mail->setLanguage('fr', '../vendor/phpmailer/phpmailer/language/');
    $mail->CharSet = 'UTF-8';                              

    if(isset($_POST) && !empty($_POST)){
        $date_arrivee = $_POST["date-arrivee"];
        $date_depart = $_POST["date-depart"];
        $destinataire = $_POST["email_user"];
    }
    $today = date('Y-m-d');


    //Recipients
    $mail->setFrom('syl20@gites.fr');
    $mail->addAddress($destinataire, $_SESSION["user"]);


    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Réservation : '. $gite["nom_gite"];
    $mail->Body    = '<!DOCTYPE html>
        <html>
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="Content-Type" content="text/html">
            <title>Votre reservation de gite</title>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
        </head>
        <body>
            <div style="font-family:arial;">
                <p>Bonjour '.strtoupper($_SESSION["user"]).',</p>
                <p>Vous avez commandé une reservation d\'un gite : </p>
                <span style="text-transform:uppercase;"><b>'.$gite["nom_gite"].'</b></span>
                <p>Déscription du gite : '.$gite["description_gite"].'</p>
                <p>Nombre de chambres : <b>'.$gite["nombre_chambre"].'</b><br>
                Nombre de SDB : <b>'.$gite["nombre_sdb"].'</b><br>
                Nombre de personnes : <b>'.$gite["nombre_personnes_max"].'</b><br>
                Zone géographique : <b>'.$gite["name"].'</b></p>
                Merci de confirmer votre location :<br><br><br>
                <a href="http://localhost/urlrewriting/confirmer-reservation?id_gite='.$gite["id_gite"].'" style="background-color:blue;padding:15px;border-radius:12px;color:white;text-decoration:none;text-transform:uppercase;" >Valider la réservation</a>
            </div>
        </body>
        </html>';

    

    //Pour interpreter HTML + CSS
    $mail->body = "MIME-Version: 1.0" . "\r\n";
    $mail->body .= "Content-type:text/html;charset=utf8" . "\r\n";
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if($date_arrivee < $today){
        echo "<p class='alert alert-danger'>Erreur : la date d'arrivée' doit etre > a la date du jour !</p>";
    }elseif($date_depart < $date_arrivee) {
        echo "<p class='alert alert-danger'>Erreur : la date de depart doit etre > a la date d'arrivée !</p>";
    }else{
        $this->updateDate();
        $mail->send();
        echo '<p class="alert alert-success text-center">Le message a bien été envoyé. Consultez votre boîte mail afin de confirmer votre réservation.</p>';
    }
} catch (Exception $e) {
    echo "Le message ne peut pas être envoyé. Mailer Error: {$mail->ErrorInfo}";
}
    }}