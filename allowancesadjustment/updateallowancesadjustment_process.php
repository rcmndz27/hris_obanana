<?php

    include('../allowancesadjustment/updateallowancesadjustment.php');
    include('../config/db.php');

    $action = $_POST["action"];
    $emp_code = $_POST["emp_code"];
    $aladj_date = $_POST["aladj_date"];
    $description = $_POST["description"];  
    $inc_decr = $_POST["inc_decr"];  
    $amount = $_POST["amount"];
    $remarks = $_POST["remarks"];        


    if ($action == 1)
    {
        UpdateAllowancesAdj($emp_code,$aladj_date,$description,$inc_decr,$amount,$remarks);
    }
    else {

    }

?>
