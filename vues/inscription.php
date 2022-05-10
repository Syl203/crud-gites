<?php 
require_once "methodes/Utilisateur.php" ; 
$user = new Utilisateur();

if(isset($_POST["clic"])){
    $user->inscriptionUser();
}

?>


<div class="formulaire-inscription"><h1>Inscription</h1>

<form method="post">
    <label for="nom">Votre nom :</label><br>
    <input type="text" name="nom_user" id="nom" class="form-control" required><br><br>

    <label for="email">Votre email :</label><br>
    <input type="email" name="email_user" id="email" required class="form-control"><br><br>

    <label for="password">Votre mot de passe :</label><br>
    <input type="password" name="password_user" id="password" required class="form-control"><br><br>

    <label for="confirm_password">Confirmer le mot de passe :</label><br>
    <input type="password" name="confirm_password" id="confirm_password" required class="form-control"><br><br>

    <button type="submit" name="clic" class="btn btn-primary">Inscription</button>
</form>
</div>