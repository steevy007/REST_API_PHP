<?php
header('Access-Control-Allow-Origin:*');
header('Content-Type:application/json');
header('Access-Control-Allow-Methods:PUT');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Request-With');
require_once('../dao/formation.dao.php');
require_once('../model/formation.class.php');

$data=json_decode(file_get_contents("php://input"));
$formation_=new Formation($data->id,$data->libelle,$data->description,$data->image,$data->categorie_id);
$daoFormation=new DaoFormation();

if($daoFormation->updateFormation($formation_)){
    echo json_encode(array(
        'status'=>true,
        'message'=>'formation created update'
    ));
}else{
    echo json_encode(array(
        'status'=>false,
    ));
}