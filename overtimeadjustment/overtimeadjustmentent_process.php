<?php


    include('../overtimeadjustment/overtimeadjustmentent.php');
    include('../config/db.php');

$otadjEnt = new OvertimeAdjEnt();

$otadjent = json_decode($_POST["data"]);

if($otadjent->{"Action"} == "InsertOvertimeAdjEnt")
{   

    $emp_code = $otadjent->{"emp_code"};
    $description = $otadjent->{"description"};
    $otadj_date = $otadjent->{"otadj_date"};
    $inc_decr = $otadjent->{"inc_decr"};
    $amount = $otadjent->{"amount"};
    $remarks = $otadjent->{"remarks"};


    $otadjEnt->InsertOvertimeAdjEnt($emp_code,$description,$otadj_date,$inc_decr,$amount,$remarks);

}else{

}
    

?>

