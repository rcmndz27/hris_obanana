<?php

    include('../allowances/viewallowanceslogs.php');
    include('../config/db.php');

    $emp_code = $_POST["emp_code"];
    ViewAlwLogs($emp_code);
    
?>