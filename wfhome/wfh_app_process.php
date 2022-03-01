<?php

    session_start();

    include('../wfhome/wfh_app.php');
    include('../config/db.php');
    include('../controller/empInfo.php');

    $empInfo = new EmployeeInformation();

    $empInfo->SetEmployeeInformation($_SESSION['userid']);

    $empCode = $empInfo->GetEmployeeCode();
    $empReportingTo = $empInfo->GetEmployeeReportingTo();

    $wfhApp = new WfhApp(); 

    $wfhApplication = json_decode($_POST["data"]);

    if($wfhApplication->{"Action"} == "ApplyWfhApp"){

        $wfh_task = $wfhApplication->{"wfh_task"};
        $wfh_output = $wfhApplication->{"wfh_output"};
        $wfh_percentage = $wfhApplication->{"wfh_percentage"};      
        $arr = $wfhApplication->{"wfhdate"} ;

        foreach($arr as $value){
            $wfhDate = $value;

        $wfhApp->InsertAppliedWfhApp($empCode,$empReportingTo,$wfhDate,$wfh_task,$wfh_output,$wfh_percentage);

        }

    }else{
    }
       

?>