<?php

    include('../overtime/cancelOvertime.php');
    include('../config/db.php');

    $choice = $_POST['choice'];
    $otid = $_POST['otid'];
    $emp_code = $_POST['emp_code'];

    if ($choice == 1)
    {
        CancelOvertime($otid,$emp_code);
    }


?>