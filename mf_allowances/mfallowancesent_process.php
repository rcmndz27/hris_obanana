<?php


    include('../mf_allowances/mfallowancesent.php');
    include('../config/db.php');

$mfAlw = new MfallowancesEnt();

$mfalw = json_decode($_POST["data"]);

if($mfalw->{"Action"} == "InsertMfallowancesEnt")
{

    $benefit_code = $mfalw->{"benefit_code"};
    $benefit_name = $mfalw->{"benefit_name"};
    $status = $mfalw->{"status"};


    $mfAlw->InseryMfallowancesEnt($benefit_code,$benefit_name,$status);

}else{

}
    

?>

