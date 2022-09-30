<?php

    include('../ob/cancelOb.php');
    include('../config/db.php');

    $choice = $_POST['choice'];
    $obid = $_POST['obid'];
    $emp_code = $_POST['emp_code'];

    if ($choice == 1)
    {
        CancelOb($obid,$emp_code);
    }


?>