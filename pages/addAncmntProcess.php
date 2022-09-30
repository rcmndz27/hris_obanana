<?php

    session_start();

    include('../pages/addAncmnt.php');
    include('../config/db.php');
    include('../controller/empInfo.php');

    $empInfo = new EmployeeInformation();
    $empInfo->SetEmployeeInformation($_SESSION['userid']);

    $empCode = $empInfo->GetEmployeeCode();
    $empName = $empInfo->GetEmployeeName();

    $ancmntApp = new AncmntApplication();

    $ancmntApplication = json_decode($_POST["data"]);
   
    if($ancmntApplication->{"Action"} == "AddAncmnt"){

        $description = $ancmntApplication->{"description"};
        $status = $ancmntApplication->{"status"};
        $date_from = $ancmntApplication->{"date_from"};        
        $date_to = $ancmntApplication->{"date_to"};
        $filename = (isset($ancmntApplication->{"filename"}) ? $ancmntApplication->{"filename"} : '' );
   
        $ancmntApp->addAncmnt($empCode,$empName,$description,$date_from,$date_to,$status,$filename);

    }
   

?>