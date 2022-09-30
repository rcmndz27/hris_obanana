<?php

    include('../users/resetPasswordEnt.php');
    include('../config/db.php');

    $choice = $_POST['choice'];
    $emp_code = $_POST['emp_code'];

    if ($choice == 1)
    {
        ResetPassword($emp_code);
    }


?>