<?php

    include('../overtime/otviewlogs_reg.php');
    include('../config/db.php');

    $action = $_POST["_action"];
    $lvlogid = $_POST["lvlogid"];

    if ($action == 1)
    {
        GetOtLogs($lvlogid);
    }

?>