<?php


    include('../leavebalance/leavebalanceent.php');
    include('../config/db.php');

$lvBalEnt = new LeaveBalanceEnt();

$lvbalent = json_decode($_POST["data"]);

if($lvbalent->{"Action"} == "InsertLeaveBalanceEnt")
{

    $emp_code = $lvbalent->{"emp_code"};
    $earned_sl = $lvbalent->{"earned_sl"};
    $earned_vl = $lvbalent->{"earned_vl"};
    $earned_sl = $lvbalent->{"earned_sl_bank"};

    $lvBalEnt->InsertLeaveBalanceEnt($emp_code,$earned_sl,$earned_vl,$earned_sl);
}   

?>

