<?php 

require_once "methodes/Gites.php";
require_once "methodes/Regions.php";
require_once "methodes/Categories.php";

$giteClass = new Gites();

$data = new Regions();
$regions = $data->getRegions();

$data2 = new Categories();
$categories = $data2->getCategories();

$infos = $giteClass->getGiteById();

if(isset($_POST["clic-modif"])){
    $giteClass->modifierGite();
}

?>

<div class="row">
    <div class="modif-gite">
        <h1>Modifier un gite</h1>
        <hr>
        <form method="post" enctype="multipart/form-data" class="form-control">
            <div class="mt-3">
                <label for="nom">Nom du gite :
                <input type="text" name="nom" id="nom" class="form-control" value="<?= $infos["nom_gite"] ?>">
            </div>
            <div class="mt-3">
                <label for="description">Description du gite :
                <textarea name="description" id="description" class="form-control"><?= $infos["description_gite"] ?></textarea>
            </div>
            <div class="mt-3">
                <label for="image">Photo du gite :
                <input type="file" name="image" id="image" class="form-control">
            </div>
            <div class="mt-3">
                <label for="nombre_chambre">Nombre de chambres :
                <select name="nombre_ch" id="nombre_chambre" class="form-control">
                    <option value="1">1 chambre</option>
                    <option value="2">2 chambres</option>
                    <option value="3">3 chambres</option>
                    <option value="4">4 chambres</option>
                    <option value="5">5 chambres</option>
                    <option value="6">6 chambres</option>
                </select>
            </div>
            <div class="mt-3">
                <label for="nombre_personne">Nombre de personnes :
                <select name="nombre_personne" id="nombre_personne" class="form-control">
                    <option value="1">1 personne</option>
                    <option value="2">2 personnes</option>
                    <option value="3">3 personnes</option>
                    <option value="4">4 personnes</option>
                    <option value="5">5 personnes</option>
                    <option value="6">6 personnes</option>
                    <option value="7">7 personnes</option>
                    <option value="8">8 personnes</option>
                    <option value="9">9 personnes</option>
                    <option value="10">10 personnes</option>
                </select>
            </div>
            <div class="mt-3">
                <label for="nombre_sdb">Nombre de salles de bain :
                <select name="nombre_sdb" id="nombre_sdb" class="form-control">
                    <option value="1">1 salle de bain</option>
                    <option value="2">2 salles de bain</option>
                    <option value="3">3 salles de bain</option>
                </select>
            </div>
            <div class="mt-3">
                <label for="disponibilite">Disponibilité :
                <select name="disponibilite" id="disponibilite" class="form-control">
                    <option value="1">Disponible</option>
                    <option value="0">Indisponible</option>
                </select>
            </div>
            <div class="mt-3">
                <label for="region">Zone géographique :
                <select name="region" id="region" class="form-control">
                    <?php
                        foreach($regions as $region){ ?>
                            <option value="<?= $region["id"] ?>"><?= $region["name"] ?></option>

                        <?php
                        }
                    ?>
                </select>
            </div>
            <div class="mt-3">
                <label for="categorie">Type de location :
                <select name="categorie" id="categorie" class="form-control">
                    <?php
                        foreach($categories as $categorie){ 
                        ?>

                            <option value="<?= $categorie["id_categorie"] ?>"><?= $categorie["type_gite"] ?></option>

                        <?php
                        }
                    ?>
                </select>
            </div>
            <input type="hidden" name="commentaires" value="0">
            <div class="mt-3">
                <label for="nom">Prix par semaine :
                <input type="number" step="0.01" name="prix" id="prix" class="form-control" value="<?= $infos["prix_semaine"] ?>">
            </div>                
            <div class="mt-3">
                <button type="submit" class="btn btn-primary" name="clic-modif">Envoyer</button>
            </div>
        </form>
    </div>
</div>