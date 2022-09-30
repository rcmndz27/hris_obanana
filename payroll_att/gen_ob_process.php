<?php

    include('../payroll_att/gen_ob.php');
    include('../config/db.php');

    $action = $_POST["action"];
    $eMplogName = $_POST["eMplogName"];
    $pyrollco_from = $_POST["pyrollco_from"];
    $pyrollco_to = $_POST["pyrollco_to"];

    if ($action == 1)
    {
        GenOb($eMplogName,$pyrollco_from,$pyrollco_to);
    }

?>
