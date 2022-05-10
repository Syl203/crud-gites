<?php 

class Database{
    private $base = "location_gites";
    private $host = "localhost";
    private $user = "root";
    private $pass = "";

    public function getPDO(){
        try{
            $bdd = new PDO("mysql:host=". $this->host .";dbname=".$this->base.";charset=UTF8", $this->user, $this->pass);
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e){
            print "Erreur ! :".$e->getMessage();
            die();
        }

        return $bdd;
    }
}