<?php

    include('../dtrcorrect/canceldtrcorrect.php');
    include('../config/db.php');

    $choice = $_POST['choice'];
    $dtrcorrectid = $_POST['dtrcorrectid'];
    $emp_code = $_POST['emp_code'];

    if ($choice == 1)
    {
        CancelDtrCorrect($dtrcorrectid,$emp_code);
    }


?>