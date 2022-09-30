<?php

    session_start();

    include('../dtrcorrect/dtrcorrect_app.php');
    include('../config/db.php');
    include('../controller/empInfo.php');

    $empInfo = new EmployeeInformation();

    $empInfo->SetEmployeeInformation($_SESSION['userid']);

    $empCode = $empInfo->GetEmployeeCode();
    $empReportingTo = $empInfo->GetEmployeeReportingTo();

    $dtrcApp = new DtrCorrectApp(); 

    $dtrcApplication = json_decode($_POST["data"]);

    if($dtrcApplication->{"Action"} == "ApplyDtrcApp"){

        $dtrc_date = $dtrcApplication->{"dtrc_date"};
        $time_in = $dtrcApplication->{"time_in"};
        $time_out = $dtrcApplication->{"time_out"}; 
        $dtrc_type = $dtrcApplication->{"dtrc_type"};      
        $remarks = $dtrcApplication->{"remarks"} ;
        $e_req = $dtrcApplication->{"e_req"} ;
        $n_req = $dtrcApplication->{"n_req"} ;
        $e_appr = $dtrcApplication->{"e_appr"} ;
        $n_appr = $dtrcApplication->{"n_appr"} ;
        $attchmnt = (isset($dtrcApplication->{"attachment"}) ? $dtrcApplication->{"attachment"} : '' );
        $dtrcApp->InsertAppliedDtrCorrectApp($empCode,$empReportingTo,$dtrc_date,$time_in,$time_out,$dtrc_type,$remarks,$e_req,$n_req,$e_appr,$n_appr,$attchmnt);

    }
       

?>