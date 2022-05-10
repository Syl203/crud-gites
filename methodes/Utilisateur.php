<?php
require_once "methodes/Database.php";

class Utilisateur extends Database{
    private $nom_user;
    private $email_user;
    private $password_user;
    private $confirm_password;

    public function getUser(){
        $bdd = $this->getPDO();
        $sql = "SELECT * FROM utilisateurs";
        $req = $bdd->query($sql);
        return $req;
    }

    public function inscriptionUser(){
        $bdd = $this->getPDO();

        if(isset($_POST["nom_user"]) && !empty($_POST["nom_user"]) && isset($_POST["email_user"]) && !empty($_POST["email_user"]) && isset($_POST["password_user"]) && !empty($_POST["password_user"]) && isset($_POST["confirm_password"]) && !empty($_POST["confirm_password"])){
            $this->nom_user = trim(htmlspecialchars($_POST["nom_user"]));
            $this->email_user = trim(htmlspecialchars($_POST["email_user"]));
            $this->password_user = trim(htmlspecialchars($_POST["password_user"]));
            $this->confirm_password = trim(htmlspecialchars($_POST["confirm_password"]));

            if($this->password_user != $this->confirm_password){
                echo " Erreur : les mots de passe ne correspondent pas !";
            }else{
                $passhash = password_hash($this->password_user, PASSWORD_DEFAULT);
                $sql = "INSERT INTO utilisateurs(`nom_user`, `email_utilisateur`, `password_utilisateur`) VALUES (?,?,?)";
                $req = $bdd->prepare($sql);
                $req->bindParam(1, $this->nom_user);
                $req->bindParam(2, $this->email_user);
                $req->bindParam(3, $passhash);
                $req->execute();

                if($req){
                    header("Location:connexion");
                }
            }
        }
    }

    public function connexionUser(){
        $bdd = $this->getPDO();

        if(isset($_POST["email_user"]) && !empty($_POST["email_user"]) && isset($_POST["password_user"]) && !empty($_POST["password_user"])){
            $this->email_user = trim(htmlspecialchars($_POST["email_user"]));
            $this->password_user = trim(htmlspecialchars($_POST["password_user"]));
            $passhash = password_hash($this->password_user, PASSWORD_DEFAULT);
            $sql = "SELECT * FROM utilisateurs WHERE email_utilisateur = ?";
            $req = $bdd->prepare($sql);
            $req->bindParam(1,$this->email_user);
            $req->execute();

            if($req->rowCount() >= 1){
                $row = $req->fetch(PDO::FETCH_ASSOC);

                if($this->email_user === $row["email_utilisateur"] && password_verify($this->password_user,$row["password_utilisateur"])){
                    session_start();
                    $_SESSION["user"] = $row["nom_user"];
                    $_SESSION["email_user"] = $row["email_utilisateur"];
                    $_SESSION["id_utilisateur"] = $row["id_utilisateur"];
                    header('Location:accueil');
                }
                else{
                    echo "Erreur : mauvais identifiants";
                }
            }else{
                echo "Erreur : pas d'utilisateur avec ces identifiants";
                echo $passhash;
            }
        }else{
            echo "Erreur : veuillez saisir des identifiants valides";
        }
    }
}