<?php

            date_default_timezone_set('Asia/Manila');

    include('../salary/updatesalary.php');
    include('../config/db.php');

    $action = $_POST["action"];
    $emp_code = $_POST["emp_code"];
    $bank_type = $_POST["bank_type"];
    $bank_no = $_POST["bank_no"];
    $pay_rate = $_POST["pay_rate"];
    $status = $_POST["status"];
    $amount = $_POST["amount"];        


    if ($action == 1)
    {
        UpdateSalary($emp_code,$bank_type,$bank_no,$pay_rate,$amount,$status);
    }

?>
