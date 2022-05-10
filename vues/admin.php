<?php 
require_once "methodes/Administrateur.php"; 

if(isset($_SESSION["admin"])){
    echo 'session ok';
    header('Location: administration');
}
$admin = new Administrateur();

if(isset($_POST["clic"])){
    $admin->connexionAdmin();
}
?>

<div class="formulaire-admin">
<h1>Connexion ADMIN</h1>
<form method="post">
    <label for="email">Votre email :</label><br>
    <input type="email" id="email" name="email" class="form-control"><br><br>

    <label for="password">Votre mot de passe :</label><br>
    <input type="password" id="password" name="password" class="form-control"><br><br>

    <button class="btn btn-primary" type="sumbit" name="clic">Connexion</button>
</form>
</div>