<?php

    include('../payroll_att/gen_dtr.php');
    include('../config/db.php');

    $action = $_POST["action"];
    if ($action == 1)
    {
        GenDtr();
    }

?>
