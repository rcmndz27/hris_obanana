<?php

    include('../payslip/payslips.php');
    include('../config/db.php');

    $action = $_POST["_action"];
    $dateFrom = $_POST["_from"];
    $dateTo = $_POST["_to"];
    $empCode = $_POST["_empCode"];

    if ($action == 1)
    {
        GetPayslipsList($action, $dateFrom, $dateTo,$empCode);
    }

?>