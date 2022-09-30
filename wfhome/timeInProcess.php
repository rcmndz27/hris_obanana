<?php

    include('../wfhome/timeIn.php');
    include('../config/db.php');

    $choice = $_POST['choice'];
    $wfhid = $_POST['wfhid'];
    $emp_code = $_POST['emp_code'];
  


    if ($choice == 1)
    {
        $wfh_output = $_POST['wfh_output'];
        TimeIn($wfhid,$emp_code,$wfh_output);
    }else{
            $wfh_output2 = $_POST['wfh_output2'];
            $wfh_percentage = $_POST['wfh_percentage'];
            $attid = $_POST['attid'];
        TimeOut($wfhid,$emp_code,$wfh_output2,$wfh_percentage,$attid);
    }


?>