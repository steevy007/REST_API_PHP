<?php
set_time_limit(0);
header('Access-Control-Allow-Origin:*');
header('Content-Type:application/json');
header('Access-Control-Allow-Methods:POST');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Request-With');
require_once('../dao/formation.dao.php');
require_once('../model/formation.class.php');
//set_time_limit(0);
$data=json_decode(file_get_contents("php://input"));
$multiData=$data->data;
$daoFormation=new DaoFormation();
$nombreObject=count($multiData);
$count=0;
echo json_encode($nombreObject);
foreach($multiData as $object){
    $formation_=new Formation(null,$object->libelle,$object->description,$object->image,$object->categorie_id);
    if($daoFormation->createFormation($formation_)){
        $count++;
    }
}
if($nombreObject==$count){
    echo json_encode(array(
        "status"=>true,
        "message"=>"Felicitation vous avez ajoutez $count objets dans la base de donnee"
    ));
}


