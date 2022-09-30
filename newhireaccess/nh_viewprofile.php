<?php

    include('../newhireaccess/nhaviewprofile_reg.php');
    include('../config/db.php');

    $action = $_POST["_action"];
    $lvlogid = $_POST["lvlogid"];

    if ($action == 1)
    {
        GetNhaProfile($lvlogid);
    }
?>