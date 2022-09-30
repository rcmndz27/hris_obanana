<?php

    include('../mf_bank/updatebank.php');
    include('../config/db.php');

    $action = $_POST["action"];
    $rowid = $_POST["rowid"];
    $descsb = $_POST["descsb"];
    $descsb_name = $_POST["descsb_name"];
    $status = $_POST["status"];

    if ($action == 1)
    {
        UpdateBank($rowid,$descsb,$descsb_name,$status);
    }
    else {

    }

?>
