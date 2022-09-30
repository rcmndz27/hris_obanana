<?php

include("../dtr/dtr-viewing.php");

$dtrView = new EmployeeAttendance();

$dtrviewing = json_decode($_POST["data"]);
   
if($dtrviewing->{"Action"} == "GetEmployeeAttendannce"){

    $empCodeParam = $dtrviewing->{"empCodeParam"};
    $dateFrom = $dtrviewing->{"dateFrom"};
    $dateTo = $dtrviewing->{"dateTo"};

    // $empCodeParam = preg_replace('/[^0-9]/', '', $empCodeParam);

    // echo $empCodeParam.', '.$dateFrom.', '.$dateTo;

    $dtrView->GetEmployeeAttendannce($empCodeParam, $dateFrom, $dateTo);

}

?>