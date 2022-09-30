<?php

    include('../payroll/payroll_confirm.php');
    include('../config/db.php');

    $choice = $_POST['choice'];

    if ($choice == 1)
    {   
        $empCode = $_POST['emp_code'];
        ConfirmPayRegView($empCode);
    }else{
        $empCode = $_POST['empCode'];
        $date_from = $_POST['date_from'];
        $date_to = $_POST['date_to'];
        DeletePayReg($date_from,$date_to,$empCode);
    }
?>