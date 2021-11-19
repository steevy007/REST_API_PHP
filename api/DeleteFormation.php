<?php
header('Access-Control-Allow-Origin:*');
header('Content-Type:application/json');
header('Access-Control-Allow-Methods:DELETE');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Request-With');

require_once('../dao/formation.dao.php');

$data=json_decode(file_get_contents("php://input"));
$daoFormation=new DaoFormation();
if($daoFormation->deleteFormation($data->id)){
    echo json_encode(array(
        "status"=>true,
        "message"=>"Formation Delete"
    ));
}else{
    echo json_encode(array(
        "status"=>false,
    ));
}
