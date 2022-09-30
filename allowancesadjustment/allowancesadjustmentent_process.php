<?php


    include('../allowancesadjustment/allowancesadjustmentent.php');
    include('../config/db.php');

$alladjEnt = new AllowancesAdjEnt();

$alladjent = json_decode($_POST["data"]);

if($alladjent->{"Action"} == "InsertAllowancesAdjEnt")
{   

    $emp_code = $alladjent->{"emp_code"};
    $description = $alladjent->{"description"};
    $aladj_date = $alladjent->{"aladj_date"};
    $inc_decr = $alladjent->{"inc_decr"};
    $amount = $alladjent->{"amount"};
    $remarks = $alladjent->{"remarks"};


    $alladjEnt->InsertAllowancesAdjEnt($emp_code,$description,$aladj_date,$inc_decr,$amount,$remarks);

}else{

}
    

?>

