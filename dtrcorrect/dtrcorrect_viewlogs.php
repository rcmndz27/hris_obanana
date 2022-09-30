<?php

    include('../dtrcorrect/dtrcorrectviewlogs_reg.php');
    include('../config/db.php');

    $action = $_POST["_action"];
    $lvlogid = $_POST["lvlogid"];

    if ($action == 1)
    {
        GetDtrCorrectLogs($lvlogid);
    }
?>