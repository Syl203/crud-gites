<?php 

require_once "methodes/Database.php"; 

class Commentaires extends Database{
    private $auteur;
    private $commentaire;
    private $gite_id;
    private $utilisateur_id;

    public function getComments(){
        $bdd = $this->getPDO();
        $id = trim(htmlspecialchars($_GET["id_gite"]));
        $sql = "SELECT * FROM commentaires WHERE gite_id = ?";
        $req = $bdd->prepare($sql);
        $req->bindParam(1,$id);
        $req->execute();
        $res = $req->fetchAll();
        return $res;
    }

    public function setComment(){
        $bdd = $this->getPDO();

        if(isset($_POST["commentaire"]) && !empty($_POST["commentaire"])){
            $this->auteur = trim(htmlspecialchars($_SESSION["user"]));
            $this->commentaire = trim(htmlspecialchars($_POST["commentaire"]));
            $this->gite_id = trim(htmlspecialchars($_GET["id_gite"]));
            $this->utilisateur_id = trim(htmlspecialchars($_GET["utilisateur_id"]));
            $sql = "INSERT INTO `commentaires`(`auteur_commentaire`, `contenu_commentaire`, `gite_id`, `utilisateur_id`) VALUES (?,?,?,?)";
            $insert = $bdd->prepare($sql);
            $insert->bindParam(1,$this->auteur);
            $insert->bindParam(2, $this->commentaire);
            $insert->bindParam(3, $this->gite_id);
            $insert->bindParam(4, $this->utilisateur_id);
            $insert->execute();

            if($insert){
                header('Location:accueil');
            }
            else{
                echo "Erreur lors de l'ajout";
            }
        }
    }
}
?>