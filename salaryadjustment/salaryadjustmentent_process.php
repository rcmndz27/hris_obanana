<?php


    include('../salaryadjustment/salaryadjustmentent.php');
    include('../config/db.php');

$saladjEnt = new SalaryAdjEnt();

$saladjent = json_decode($_POST["data"]);

if($saladjent->{"Action"} == "InsertSalaryAdjEnt")
{   
    $emp_code = $saladjent->{"emp_code"};
    $description = $saladjent->{"description"};
    $period_from = $saladjent->{"period_from"};
    $period_to = $saladjent->{"period_to"};
    $inc_decr = $saladjent->{"inc_decr"};
    $amount = $saladjent->{"amount"};
    $eMplogName = $saladjent->{"eMplogName"};
    $remarks = $saladjent->{"remarks"};
    $saladjEnt->InsertSalaryAdjEnt($eMplogName,$emp_code,$description,$period_from,$period_to,$inc_decr,$amount,$remarks);
}
    

?>

