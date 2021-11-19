<?php
require_once('db.php');
class Singleton{
    private static $connexion=null;

    public static function getConnexion(){
        if(static::$connexion==null){
            $database=new Database();
            static::$connexion=$database->connection();
        }

        return static::$connexion;
    }
}
