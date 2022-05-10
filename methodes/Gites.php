<?php  

require_once "methodes/Database.php";
class Gites extends Database{

    private $id_gite;
    private $nom_gite;
    private $description;
    private $photo;
    private $prix_semaine;
    private $nb_chambres;
    private $nb_personnes;
    private $nb_sdb;
    private $dispo;
    private $zone_geo;
    private $categorie;


    public function getGITES(){
        $bdd = $this->getPDO();
        $sql = "SELECT * FROM gites";
        $gites = $bdd->query($sql);

        return $gites;
    }

    public function getGiteById(){
        $bdd = $this->getPDO();
        $sql = "SELECT * FROM gites INNER JOIN regions ON regions.id = gites.zone_geographique INNER JOIN categories ON categories.id_categorie = gites.gite_categorie WHERE id_gite = ?";
        $stmt = $bdd->prepare($sql);
        $stmt->bindParam(1, $_GET["id_gite"]);
        $stmt->execute();
        $gite = $stmt->fetch();

        return $gite;
    }

    public function setGite(){
        $bdd = $this->getPDO();
        if(isset($_POST) && !empty($_POST)){
            if(isset($_FILES["image"])){
                $dir = "assets/img/";
                $this->photo = $dir. basename($_FILES["image"]["name"]);
                if(move_uploaded_file($_FILES["image"]["tmp_name"], $this->photo)){
                    echo "<p>Le fichier est uploadé</p>";
                }else{
                    echo "<p>Erreur : téléchargement impossible</p>";
                }
            }else{
                echo "<p>Le fichier est invalide</p>";
            }
            if(isset($_POST["nom"]) && !empty($_POST["nom"])){
                $this->nom_gite = trim(htmlspecialchars($_POST["nom"]));
            }else{ 
                echo "Nom invalide";
            }
            if(isset($_POST["description"]) && !empty($_POST["description"])){
                $this->description = trim(htmlspecialchars($_POST["description"]));
            }else{ 
                echo "Description invalide";
            }
            if(isset($_POST["prix"]) && !empty($_POST["prix"])){
                $this->prix_semaine = trim(htmlspecialchars($_POST["prix"]));
            }else{ 
                echo "Prix invalide";
            }
            $this->nb_chambres = $_POST["nombre_ch"];
            $this->nb_personnes = $_POST["nombre_personne"];
            $this->nb_sdb = $_POST["nombre_sdb"];
            $this->dispo = $_POST["disponibilite"];
            $this->zone_geo = $_POST["region"];
            $this->categorie = $_POST["categorie"];

            $req = "INSERT INTO `gites`(
                `nom_gite`, 
                `description_gite`, 
                `img_gite`, 
                `nombre_chambre`, 
                `nombre_personnes_max`, 
                `nombre_sdb`, 
                `disponible`, 
                `zone_geographique`, 
                `gite_categorie`, 
                `prix_semaine`) VALUES (?,?,?,?,?,?,?,?,?,?)";

            $insert = $bdd->prepare($req);
            $insert->bindParam(1, $this->nom_gite);
            $insert->bindParam(2, $this->description);
            $insert->bindParam(3, $this->photo);
            $insert->bindParam(4, $this->nb_chambres);
            $insert->bindParam(5, $this->nb_personnes);
            $insert->bindParam(6, $this->nb_sdb);
            $insert->bindParam(7, $this->dispo);
            $insert->bindParam(8, $this->zone_geo);
            $insert->bindParam(9, $this->categorie);
            $insert->bindParam(10, $this->prix_semaine);
            $insert->execute();

            header('Location:accueil');

        }
    }

    public function supprimerGite(){
        $bdd = $this->getPDO();
        if(isset($_GET["id_gite"]) && !empty($_GET["id_gite"])){
            $this->id_gite = trim(htmlspecialchars($_GET["id_gite"]));
            $req = "DELETE FROM gites WHERE id_gite = ?";
            $del = $bdd->prepare($req);
            $del->bindParam(1,$this->id_gite);
            $del->execute();
            header('Location:accueil');
        }
    }

    public function modifierGite(){
        $bdd = $this->getPDO();
        if(isset($_POST) && !empty($_POST) && isset($_GET["id_gite"])){
            if(isset($_FILES["image"])){
                $dir = "assets/img/";
                $this->photo = $dir. basename($_FILES["image"]["name"]);
                if(move_uploaded_file($_FILES["image"]["tmp_name"], $this->photo)){
                    echo "<p>Le fichier est uploadé</p>";
                }else{
                    echo "<p>Erreur : téléchargement impossible</p>";
                }
            }else{
                echo "<p>Le fichier est invalide</p>";
            }
            if(isset($_POST["nom"]) && !empty($_POST["nom"])){
                $this->nom_gite = trim(htmlspecialchars($_POST["nom"]));
            }else{ 
                echo "Nom invalide";
            }
            if(isset($_POST["description"]) && !empty($_POST["description"])){
                $this->description = trim(htmlspecialchars($_POST["description"]));
            }else{ 
                echo "Description invalide";
            }
            if(isset($_POST["prix"]) && !empty($_POST["prix"])){
                $this->prix_semaine = trim(htmlspecialchars($_POST["prix"]));
            }else{ 
                echo "Prix invalide";
            }
            $this->nb_chambres = $_POST["nombre_ch"];
            $this->nb_personnes = $_POST["nombre_personne"];
            $this->nb_sdb = $_POST["nombre_sdb"];
            $this->dispo = $_POST["disponibilite"];
            $this->zone_geo = $_POST["region"];
            $this->categorie = $_POST["categorie"];
            $id = trim(htmlspecialchars($_GET["id_gite"]));

            $req = "UPDATE `gites` SET 
                `nom_gite`= ?,
                `description_gite`= ?,
                `img_gite`= ?,
                `nombre_chambre`= ?,
                `nombre_personnes_max`= ?,
                `nombre_sdb`= ?,
                `disponible`= ?,
                `zone_geographique`= ?,
                `gite_categorie`= ?,
                `prix_semaine`= ? WHERE id_gite = ?";

            $update = $bdd->prepare($req);
            $update->bindParam(1, $this->nom_gite);
            $update->bindParam(2, $this->description);
            $update->bindParam(3, $this->photo);
            $update->bindParam(4, $this->nb_chambres);
            $update->bindParam(5, $this->nb_personnes);
            $update->bindParam(6, $this->nb_sdb);
            $update->bindParam(7, $this->dispo);
            $update->bindParam(8, $this->zone_geo);
            $update->bindParam(9, $this->categorie);
            $update->bindParam(10, $this->prix_semaine);
            $update->bindParam(11, $_GET["id_gite"]);
            $updateGite = $update->execute(array(
                $this->nom_gite,
                $this->description,
                $this->photo,
                $this->nb_chambres,
                $this->nb_personnes,
                $this->nb_sdb,
                $this->dispo,
                $this->zone_geo,
                $this->categorie,
                $this->prix_semaine,
                $id
            ));
            if($updateGite){
                header('Location:accueil');
            }else{
                echo "Erreur lors de la mise à jour";
            }
        }
    }
}