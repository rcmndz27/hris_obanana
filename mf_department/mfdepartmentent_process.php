<?php


    include('../mf_department/mfdepartmentent.php');
    include('../config/db.php');

$mfDep = new MfdepartmentEnt();

$mfdep = json_decode($_POST["data"]);

if($mfdep->{"Action"} == "InsertMfdepartmentEnt")
{

    $code = $mfdep->{"code"};
    $descs = $mfdep->{"descs"};
    $status = $mfdep->{"status"};

    $mfDep->InsertMfdepartmentEnt($code,$descs,$status);

}else{

}
    

?>

