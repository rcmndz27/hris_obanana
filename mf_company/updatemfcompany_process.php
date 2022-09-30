<?php

    include('../mf_company/updatemfcompany.php');
    include('../config/db.php');

    $action = $_POST["action"];
    $rowid = $_POST["rowid"];
    $code = $_POST["code"];
    $descs = $_POST["descs"];
    $status = $_POST["status"];

    if ($action == 1)
    {
        UpdateMfcompany($rowid,$code,$descs,$status);
    }
    else {

    }

?>
