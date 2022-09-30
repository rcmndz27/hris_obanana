<?php

session_start();

include("../overtime/overtime-approval.php");
include('../config/db.php');
include('../controller/empInfo.php');


$overtimeApproval = new OvertimeApproval();

$empInfo = new EmployeeInformation();

$empInfo->SetEmployeeInformation($_SESSION['userid']);

$empReportingTo = $empInfo->GetEmployeeCode();

$overtime = json_decode($_POST["data"]);


if($overtime->{"Action"} == "GetOTDetails"){

    $empId = $overtime->{"empId"};

    $overtimeApproval->GetOTDetails($empReportingTo,$empId);

}elseif($overtime->{"Action"} == "ApproveOT"){
    
    $apvdot = $overtime->{"approvedot"};
    $empId = $overtime->{"empId"};
    $rowid = $overtime->{"rowid"};

    $overtimeApproval->ApproveOT($empReportingTo, $empId, $apvdot,$rowid);

}elseif($overtime->{"Action"} == "RejectOT"){

    $empId = $overtime->{"empId"};
    $rjctRsn = $overtime->{"rjctRsn"};
    $rowid = $overtime->{"rowid"};

    $overtimeApproval->RejectOT($empReportingTo, $empId,$rjctRsn,$rowid);
    
}elseif($overtime->{"Action"} == "FwdOT"){

    $empId = $overtime->{"empId"};
    $approver = $overtime->{"approver"};
    $rowid = $overtime->{"rowid"};

    $overtimeApproval->FwdOT($empReportingTo,$empId,$approver,$rowid);
    
}elseif($overtime->{"Action"} == "GetEmployeeList"){
        
    $employee = $overtime->{"employee"};
    $employee = mb_substr($employee, 0, 3);
    $employee = '%'.$employee.'%';

    $overtimeApproval->GetEmployeeList($employee);

}elseif($overtime->{"Action"} == "GetApprovedList"){

    $employee = $overtime->{"employee"};

    $overtimeApproval->GetApprovedList($employee);

}

?>