<?php

    include('../mf_department/updatemfdepartment.php');
    include('../config/db.php');

    $action = $_POST["action"];
    $rowid = $_POST["rowid"];
    $code = $_POST["code"];
    $descs = $_POST["descs"];

    if ($action == 1)
    {
        UpdateMfdepartment($rowid,$code,$descs);
    }
    else {

    }

?>
