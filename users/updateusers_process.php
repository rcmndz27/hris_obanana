<?php

    include('../users/updateusers.php');
    include('../config/db.php');

    $action = $_POST["action"];
    $emp_code = $_POST["emp_code"];
    // $userpassword = $_POST["userpassword"];
    $status = $_POST["status"];
    $usertype= $_POST["usertype"];
     

    if ($action == 1)
    {
        UpdateUsers($emp_code,$status,$usertype);
    }
    // $userpassword
   

?>
