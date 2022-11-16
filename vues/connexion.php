<?php 
require_once "methodes/Utilisateur.php"; 

if(isset($_SESSION["user"])){
    header('Location: accueil');
}
$user = new Utilisateur();

if(isset($_POST["clic"])){
    $user->connexionUser();
}
?>

<div class="formulaire-user">
    <h1>Connexion utilisateur</h1>

    <form method="post" >
        <label for="email">Votre email :</label><br>
        <input type="email" name="email_user" id="email" required class="form-control"><br><br>

        <label for="password">Votre mot de passe :</label><br>
        <input type="password" name="password_user" id="password" required class="form-control"><br><br>

        <button type="submit" name="clic" class="btn btn-primary">Connexion</button>
    </form>
</div>