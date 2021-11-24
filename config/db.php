<?php
class Database{
    private $servername;
    private $dbname;
    private $user;
    private $password;
    private $conn=null;

    public function __construct()
    {
        $this->servername="127.0.0.1";
        $this->dbname="fh2prog";
        $this->user="root";
        $this->password="";
    }

    public function connection(){
        try{
            $options = array(
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
              );
            $this->conn=new PDO("mysql:host=$this->servername;dbname=$this->dbname",$this->user,$this->password,$options);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo('Connexion reussi'); 
        }catch(PDOException $error){
            die("error ".$error);
        }

        return $this->conn;
    }
    
}

