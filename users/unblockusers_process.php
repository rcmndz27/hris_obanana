<?php

    include('../users/unblockusers.php');
    include('../config/db.php');

    $action = $_POST["action"];
    $emp_code = $_POST["emp_code"];
     

    if ($action == 1)
    {
        UnblockUsers($emp_code);
    }
    

?>
