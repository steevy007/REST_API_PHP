<?php
header('Access-Control-Allow-Origin:*');
header('Content-Type:application/json');
header('Access-Control-Allow-Methods:GET');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Request-With');
require_once('../dao/formation.dao.php');

if($_SERVER['REQUEST_METHOD']==='GET'){

    if(isset($_GET['id'])){
        $daoFormation=new DaoFormation();
        $stmt=$daoFormation->getFormationById($_GET['id']);
        $formation_item=null;
    
        while($data=$stmt->fetch(PDO::FETCH_OBJ)){
            $formation_item=array(
                'id'=>$data->id,
                'libelle'=>$data->libelle,
                'description'=>$data->description,
                'image'=>$data->image,
                'categorie_id'=>$data->categorie_id
            );
        }
        if($stmt->rowCount()==1){
            echo json_encode($formation_item);
        }else{
            echo json_encode("No Data Found");
        }
    }else{
        echo json_encode("please specifie the id in GET url");
    }
    
}