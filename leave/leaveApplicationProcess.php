<?php

    session_start();

    include('../leave/leaveApplication.php');
    include('../config/db.php');
    include('../controller/empInfo.php');

    $empInfo = new EmployeeInformation();

    $empInfo->SetEmployeeInformation($_SESSION['userid']);

    $empCode = $empInfo->GetEmployeeCode();
    $empName = $empInfo->GetEmployeeName();
    $empDept = $empInfo->GetEmployeeDepartment();
    $empReportingTo = $empInfo->GetEmployeeReportingTo();


    $leaveApp = new LeaveApplication();

    $leaveApplication = json_decode($_POST["data"]);

    if($leaveApplication->{"Action"} == "ApplyLeave"){

        $leaveType = $leaveApplication->{"leavetype"};
        $dateBirth = $leaveApplication->{"datebirth"};
        $dateStartMaternity = $leaveApplication->{"datestartmaternity"};
        $e_req = $leaveApplication->{"e_req"};
        $n_req = $leaveApplication->{"n_req"};
        $e_appr = $leaveApplication->{"e_appr"};
        $n_appr = $leaveApplication->{"n_appr"};        
        $leaveDesc = $leaveApplication->{"leavedesc"};
        $medicalFile = (isset($leaveApplication->{"medicalfile"}) ? $leaveApplication->{"medicalfile"} : '' );
        $leaveCount = $leaveApplication->{"leaveCount"};
        $allhalfdayMark = $leaveApplication->{"allhalfdayMark"};
        $arr = $leaveApplication->{"leaveDate"} ;

        foreach($arr as $value){
            $leaveDate = $value;
        
        $leaveApp->ApplyLeave($empCode,$empName,$empDept,$empReportingTo,$leaveType,$dateBirth,$dateStartMaternity,$leaveDate,$leaveDesc,$medicalFile, $leaveCount, $allhalfdayMark,$e_req,$n_req,$e_appr,$n_appr);
         }

    }
    


?>