<?php
header('Access-Control-Allow-Origin:*');
header('Content-Type:application/json');
require_once('../dao/formation.dao.php');

$daoFormation=new DaoFormation();
$stmt=$daoFormation->readAllFormation();
$row=$stmt->rowCount();
if($row>0){
    $formation=[];
    $formation['data']=[];

    while($data=$stmt->fetch(PDO::FETCH_OBJ)){
        $formation_item=array(
            'id'=>$data->id,
            'libelle'=>$data->libelle,
            'description'=>$data->description,
            'image'=>$data->image,
            'categorie_id'=>$data->categorie_id
        );

        array_push($formation['data'],$formation_item);
    }

    echo json_encode($formation);
}