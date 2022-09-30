<?php

    include('../leave/cancelLeave.php');
    include('../config/db.php');

    $choice = $_POST['choice'];
    $leaveid = $_POST['leaveid'];
    $emp_code = $_POST['emp_code'];

    if ($choice == 1)
    {
        CancelLeave($leaveid,$emp_code);
    }


?>