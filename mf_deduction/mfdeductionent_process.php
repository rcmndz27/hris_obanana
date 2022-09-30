<?php


    include('../mf_deduction/mfdeductionent.php');
    include('../config/db.php');

$mfDed = new MfdeductionEnt();

$mfded = json_decode($_POST["data"]);

if($mfded->{"Action"} == "InsertMfdeductionEnt")
{

    $deduction_code = $mfded->{"deduction_code"};
    $deduction_name = $mfded->{"deduction_name"};
    $status = $mfded->{"status"};

    $mfDed->InsertMfdeductionEnt($deduction_code,$deduction_name,$status);

}else{

}
    

?>

