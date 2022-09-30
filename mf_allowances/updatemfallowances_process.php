<?php

    include('../mf_allowances/updatemfallowances.php');
    include('../config/db.php');

    $action = $_POST["action"];
    $rowid = $_POST["rowid"];
    $benefit_code = $_POST["benefit_code"];
    $benefit_name = $_POST["benefit_name"];
    $status = $_POST["status"];

    if ($action == 1)
    {
        UpdateMfallowances($rowid,$benefit_code,$benefit_name,$status);
    }
    else {

    }

?>
