<?php  
require_once "methodes/Database.php";

class Categories extends Database{
    public function getCategories(){
        $bdd = $this->getPDO();
        $sql = "SELECT * FROM categories";
        $categories = $bdd->query($sql);

        return $categories;
    }
}