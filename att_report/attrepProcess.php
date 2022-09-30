<?php
    session_start();
    include('../att_report/att_rep.php');
    include('../controller/empInfo.php');

    $empInfo = new EmployeeInformation();
    $empInfo->SetEmployeeInformation($_SESSION['userid']);
    $empCode = $empInfo->GetEmployeeCode();
    $employeedtr = new AttRepDTR();

    $dtr = json_decode($_POST["data"]);

    if($dtr->{"Action"} == "GetAttRepList"){
        $datestart = $dtr->{"datefrom"};
        $dateend = $dtr->{"dateto"};
        $employeedtr->GetAttRepList($datestart, $dateend);

    }else if($dtr->{"Action"} == "GetLateList"){
        $datestart = $dtr->{"datefrom"};
        $dateend = $dtr->{"dateto"};
        $employeedtr->GetLateList($datestart, $dateend);

    }else if($dtr->{"Action"} == "GetUTList"){
        $datestart = $dtr->{"datefrom"};
        $dateend = $dtr->{"dateto"};
        $employeedtr->GetUTList($datestart, $dateend);
    }else if($dtr->{"Action"} == "GetNList"){
        $datestart = $dtr->{"datefrom"};
        $dateend = $dtr->{"dateto"};
        $employeedtr->GetNList($datestart, $dateend);
    }





?>