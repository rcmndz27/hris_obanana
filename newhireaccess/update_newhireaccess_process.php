<?php

    include('../newhireaccess/update_nhaccess.php');
    include('../config/db.php');


    $action = $_POST["action"];
    $department = $_POST["department"];
    $position = $_POST["position"];
    $location = $_POST["location"];
    $emp_type = $_POST["emp_type"];
    $emp_level = $_POST["emp_level"];
    $work_sched_type = $_POST["work_sched_type"];
    $minimum_wage = $_POST["minimum_wage"];
    $pay_type = $_POST["pay_type"];
    $reporting_to = $_POST["reporting_to"];
    $rowid = $_POST["rowid"];
    $lastname = $_POST["lastname"];
    $firstname = $_POST["firstname"];
    $middlename = $_POST["middlename"];
    $emailaddress = $_POST["emailaddress"];
    $telno = $_POST["telno"];
    $celno = $_POST["celno"];



    if ($action == 1)
    {
        UpdateEmployeeLevel($department,$position,$location,$emp_type,$emp_level,$work_sched_type,$minimum_wage,$pay_type,$reporting_to,$lastname,$firstname,$middlename,$emailaddress,$telno,$celno,$rowid);
    }
    else {

    }

?>
