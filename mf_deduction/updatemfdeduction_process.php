<?php

    include('../mf_deduction/updatemfdeduction.php');
    include('../config/db.php');

    $action = $_POST["action"];
    $rowid = $_POST["rowid"];
    $deduction_code = $_POST["deduction_code"];
    $deduction_name = $_POST["deduction_name"];

    if ($action == 1)
    {
        UpdateMfdeduction($rowid,$deduction_code,$deduction_name);
    }
    else {

    }

?>
