<?php

    include('../wfhome/wfhviewlogs_reg.php');
    include('../config/db.php');

    $action = $_POST["_action"];
    $lvlogid = $_POST["lvlogid"];

    if ($action == 1)
    {
        GetWfhLogs($lvlogid);
    }
?>