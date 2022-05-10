<?php
require_once "methodes/Database.php";

class Regions extends Database{

    public function getRegions(){
        $bdd = $this->getPDO();
        $sql = "SELECT * FROM regions";
        $regions = $bdd->query($sql);

        return $regions;
    }
}