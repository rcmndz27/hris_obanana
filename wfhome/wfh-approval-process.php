<?php

session_start();

include("../wfhome/wfh-approval.php");
include('../config/db.php');
include('../controller/empInfo.php');


$wfhApproval = new wfhApproval();

$empInfo = new EmployeeInformation();

$empInfo->SetEmployeeInformation($_SESSION['userid']);

$empReportingTo = $empInfo->GetEmployeeCode();

$wfh = json_decode($_POST["data"]);


if($wfh->{"Action"} == "GetWfhDetails"){

    $empId = $wfh->{"empId"};

    $wfhApproval->GetWfhDetails($empReportingTo,$empId);

}else if($wfh->{"Action"} == "ApproveWfh"){
    
    $empId = $wfh->{"empId"};
    $rowId = $wfh->{"rowid"};

    $wfhApproval->ApproveWfh($empReportingTo,$empId,$rowId);

}else if($wfh->{"Action"} == "RejectWfh"){

    $empId = $wfh->{"empId"};
    $rowId = $wfh->{"rowid"};
    $rjctRsn = $wfh->{"rjctRsn"};

    $wfhApproval->RejectWfh($empReportingTo, $empId,$rjctRsn,$rowId);
    
}else if($wfh->{"Action"} == "FwdWfh"){

    $empId = $wfh->{"empId"};
    $approver = $wfh->{"approver"};
    $rowId = $wfh->{"rowid"};


    $wfhApproval->FwdWfh($empReportingTo,$empId,$approver,$rowId);
    
}else if($wfh->{"Action"} == "GetEmployeeList"){
        
    $employee = $wfh->{"employee"};
    $employee = mb_substr($employee, 0, 3);
    $employee = '%'.$employee.'%';

    $wfhApproval->GetEmployeeList($employee);

}else if($wfh->{"Action"} == "GetApprovedList"){

    $employee = $wfh->{"employee"};

    $wfhApproval->GetApprovedList($employee);

}

?>