<?php


    include('../mf_company/mfcompanyent.php');
    include('../config/db.php');

$mfCmp = new MfcompanyEnt();

$mfcmp = json_decode($_POST["data"]);

if($mfcmp->{"Action"} == "InsertMfcompanyEnt")
{

    $code = $mfcmp->{"code"};
    $descs = $mfcmp->{"descs"};
    $status = $mfcmp->{"status"};


    $mfCmp->InsertMfcompanyEnt($code,$descs,$status);

}else{

}
    

?>

