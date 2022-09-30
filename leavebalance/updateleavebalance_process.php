<?php

    include('../leavebalance/updateleavebalance.php');
    include('../config/db.php');

    $action = $_POST["action"];
    $emp_code = $_POST["emp_code"];
    $earned_sl = $_POST["earned_sl"];
    $earned_vl = $_POST["earned_vl"];
    $earned_fl = $_POST["earned_fl"];
    $earned_sl_bank = $_POST["earned_sl_bank"];
    $status = $_POST["status"];        


    if ($action == 1)
    {
        UpdateLeaveBalance($emp_code,$earned_sl,$earned_vl,$earned_fl,$earned_sl_bank,$status);
    }

?>
