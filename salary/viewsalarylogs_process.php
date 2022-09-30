<?php

            date_default_timezone_set('Asia/Manila');
    include('../salary/viewsalarylogs.php');
     include('../config/db.php');

    $emp_code = $_POST["emp_code"];
    ViewSalaryLogs($emp_code);
    
?>