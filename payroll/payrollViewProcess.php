<?php

    include('../payroll/payroll_save.php');
    include('../config/db.php');

    $choice = $_POST['choice'];
    $empCode = $_POST['emp_code'];

    if ($choice == 1)
    {
        ApprovePayView($empCode);
    }
    else {

    }

?>