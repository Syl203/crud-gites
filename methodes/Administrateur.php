<?php 

require_once "methodes/Database.php";

class Administrateur extends Database{
    
    private $email_admin;
    private $password_admin;

    public function connexionAdmin(){
        $bdd = $this->getPDO();

        if(isset($_POST["email"]) && !empty($_POST["email"]) && isset($_POST["password"]) && !empty($_POST["password"])){

            $this->email_admin = trim(htmlspecialchars($_POST["email"]));
            $this->password_admin = trim(htmlspecialchars($_POST["password"]));

            $sql = "SELECT * FROM administrateur WHERE email_admin = ? AND password_admin = ?";
            $req = $bdd->prepare($sql);
            $req->bindParam(1, $this->email_admin);
            $req->bindParam(2, $this->password_admin);
            $req->execute();

            if($req->rowCount() >= 1){
                $row = $req->fetch(PDO::FETCH_ASSOC);

                if($this->email_admin === $row["email_admin"] && $this->password_admin === $row["password_admin"]){
                    $_SESSION["admin"] = $row["nom_admin"];
                    $_SESSION["email_admin"] = $row["email_admin"];
                    header('Location:administration');
                }else{
                    echo "Erreur : mauvais identifiants";
                }
            }else{
                echo "Erreur : pas d'administrateur avec ces identifiants";
            }
        }else{
            echo "Erreur : veuillez saisir des identifiants valides";
        }
    }
}