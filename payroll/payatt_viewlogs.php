<?php

    include('../payroll/payattviewlogs.php');
    include('../config/db.php');

    $action = $_POST["_action"];
    $emp_code = $_POST["emp_code"];
    $dateFrom = $_POST["dateFrom"];
    $dateTo = $_POST["dateTo"];

    if ($action == 1)
    {
        GetPayAttViewLogs($emp_code, $dateFrom, $dateTo);
    }

?>