<?php

    include('../allowances/updateallowances.php');
    include('../config/db.php');

    $action = $_POST["action"];
    $emp_code = $_POST["emp_code"];
    $rowid = $_POST["rowid"];
    $benefit_id = $_POST["benefit_id"];
    $period_cutoff = $_POST["period_cutoff"];
    $amount = $_POST["amount"];
    $effectivity_date = $_POST["effectivity_date"];        
    $status = $_POST["status"];        

    if ($action == 1)
    {
        UpdateAllowances($rowid,$emp_code,$benefit_id,$period_cutoff,$amount,$effectivity_date,$status);
    }

?>
