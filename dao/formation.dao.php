<?php
require('../model/formation.class.php');
require('../config/singleton.php');
class DaoFormation{
    private $conn;

    public function __construct()
    {
        $this->conn=Singleton::getConnexion();
    }

    public function readAllFormation(){
        $query="SELECT * FROM formation";
        $stmt=$this->conn->prepare($query);
        $stmt->execute();
        if($stmt){
            return $stmt;
        }
    }

    public function createFormation(Formation $formation){
        $query="INSERT INTO formation(libelle,description,image,categorie_id) values(?,?,?,?)";
        $stmt=$this->conn->prepare($query);
        $stmt->execute([
            htmlspecialchars(strip_tags($formation->getLibelle())),
            htmlspecialchars(strip_tags($formation->getDescription())),
            htmlspecialchars(strip_tags($formation->getImage())),
            htmlspecialchars(strip_tags($formation->getCategorie_id()))
        ]);

        if($stmt){
            return true;
        }
    }
}