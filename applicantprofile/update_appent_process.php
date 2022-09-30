<?php

    include('../applicantprofile/update_appent.php');
    include('../config/db.php');

    $action = $_POST["action"];
    $man_pow = $_POST["man_pow"];
    $rowid = $_POST["rowid"];

    if ($action == 1)
    {
        UpdateManpowerEnt($man_pow,$rowid);
        UpdateStatAppEnt($rowid);
    }

?>
