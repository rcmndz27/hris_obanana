<?php

session_start();

include("../ob/ob-approval.php");
include('../config/db.php');
include('../controller/empInfo.php');


$obApproval = new ObApproval();

$empInfo = new EmployeeInformation();

$empInfo->SetEmployeeInformation($_SESSION['userid']);

$empReportingTo = $empInfo->GetEmployeeCode();

$ob = json_decode($_POST["data"]);


if($ob->{"Action"} == "GetOBDetails"){

    $empId = $ob->{"empId"};

    $obApproval->GetOBDetails($empReportingTo,$empId);

}elseif($ob->{"Action"} == "ApproveOB"){
    
    $apvdob = $ob->{"approvedob"};
    $empId = $ob->{"empId"};
    $rowid = $ob->{"rowid"};

    $obApproval->ApproveOB($empReportingTo,$empId,$apvdob,$rowid);

}elseif($ob->{"Action"} == "RejectOB"){

    $empId = $ob->{"empId"};
    $rjctRsn = $ob->{"rjctRsn"};
    $rowid = $ob->{"rowid"};

    $obApproval->RejectOB($empReportingTo, $empId,$rjctRsn,$rowid);
    
}elseif($ob->{"Action"} == "FwdOb"){

    $empId = $ob->{"empId"};
    $approver = $ob->{"approver"};
    $rowid = $ob->{"rowid"};

    $obApproval->FwdOb($empReportingTo, $empId,$approver,$rowid);
    
}elseif($ob->{"Action"} == "GetEmployeeList"){
        
    $employee = $ob->{"employee"};
    $employee = mb_substr($employee, 0, 3);
    $employee = '%'.$employee.'%';

    $obApproval->GetEmployeeList($employee);

}elseif($ob->{"Action"} == "GetApprovedList"){

    $employee = $ob->{"employee"};

    $obApproval->GetApprovedList($employee);

}

?>