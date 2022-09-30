<?php

    include('../overtimeadjustment/updateovertimeadjustment.php');
    include('../config/db.php');

    $action = $_POST["action"];
    $emp_code = $_POST["emp_code"];
    $otadj_date = $_POST["otadj_date"];
    $description = $_POST["description"];  
    $inc_decr = $_POST["inc_decr"];  
    $amount = $_POST["amount"];
    $remarks = $_POST["remarks"];        


    if ($action == 1)
    {
        UpdateOvertimeAdj($emp_code,$otadj_date,$description,$inc_decr,$amount,$remarks);
    }
    else {

    }

?>
