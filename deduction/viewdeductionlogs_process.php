<?php

    include('../deduction/viewdeductionlogs.php');
    include('../config/db.php');

    $emp_code = $_POST["emp_code"];
    ViewDedLogs($emp_code);
    
?>