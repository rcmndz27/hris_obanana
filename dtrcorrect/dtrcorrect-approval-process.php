<?php

session_start();

include("../dtrcorrect/dtrcorrect-approval.php");
include('../config/db.php');
include('../controller/empInfo.php');


$dtrcApproval = new DtrCorrectApproval();

$empInfo = new EmployeeInformation();

$empInfo->SetEmployeeInformation($_SESSION['userid']);

$empReportingTo = $empInfo->GetEmployeeCode();

$dtrc = json_decode($_POST["data"]);


if($dtrc->{"Action"} == "GetDtrCorrectDetails"){

    $empId = $dtrc->{"empId"};

    $dtrcApproval->GetDtrCorrectDetails($empReportingTo,$empId);

}else if($dtrc->{"Action"} == "ApproveDtrCorrect"){
    
    $empId = $dtrc->{"empId"};
    $rowId = $dtrc->{"rowid"};

    $dtrcApproval->ApproveDtrCorrect($empReportingTo,$empId,$rowId);

}else if($dtrc->{"Action"} == "RejectDtrCorrect"){

    $empId = $dtrc->{"empId"};
    $rowId = $dtrc->{"rowid"};
    $rjctRsn = $dtrc->{"rjctRsn"};

    $dtrcApproval->RejectDtrCorrect($empReportingTo, $empId,$rjctRsn,$rowId);
    
}else if($dtrc->{"Action"} == "FwdDtrCorrect"){

    $empId = $dtrc->{"empId"};
    $approver = $dtrc->{"approver"};
    $rowId = $dtrc->{"rowid"};


    $dtrcApproval->FwdDtrCorrect($empReportingTo, $empId,$approver,$rowId);
    
}else if($dtrc->{"Action"} == "GetEmployeeList"){
        
    $employee = $dtrc->{"employee"};
    $employee = mb_substr($employee, 0, 3);
    $employee = '%'.$employee.'%';

    $dtrcApproval->GetEmployeeList($employee);

}

?>