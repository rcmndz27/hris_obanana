<?php

    include('../payroll_att/gen_ot.php');
    include('../config/db.php');

    $action = $_POST["action"];
    $eMplogName = $_POST["eMplogName"];
    $pyrollco_from = $_POST["pyrollco_from"];
    $pyrollco_to = $_POST["pyrollco_to"];

    if ($action == 1)
    {
        GenOt($eMplogName,$pyrollco_from,$pyrollco_to);
    }

?>
