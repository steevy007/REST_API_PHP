<?php
class Database{
    private $servername;
    private $dbname;
    private $user;
    private $password;
    private $conn=null;

    public function __construct()
    {
        $this->servername="localhost";
        $this->dbname="fh2prog";
        $this->user="root";
        $this->password="";
    }

    public function connection(){
        try{
            $this->conn=new PDO("mysql:host=$this->servername;dbname=$this->dbname",$this->user,$this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo('Connexion reussi'); 
        }catch(PDOException $error){
            die("error ".$error);
        }

        return $this->conn;
    }
    
}
