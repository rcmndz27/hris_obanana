<?php

    include('../leave/leaveApplication.php');
    include('../overtime/ot_app.php');
    include('../wfhome/wfh_app.php');
    include('../ob/ob_app.php');
    include('../dtrcorrect/dtrcorrect_app.php');
    include('../config/db.php');

    $dtr = json_decode($_POST["data"]);
    $lv = new LeaveApplication();
    $ot = new OtApp();
    $wfh = new WfhApp();
    $ob = new ObApp();
    $dtrc = new DtrCorrectApp();

    if($dtr->{"Action"} == "GetAppLeave"){
        $date_from = $dtr->{"date_from"};
        $date_to = $dtr->{"date_to"};
        $status = $dtr->{"status"};
        $lv->GetAllLeaveHistory($date_from,$date_to,$status);
    }else if($dtr->{"Action"} == "GetRepLeave"){
        $date_from = $dtr->{"date_from"};
        $date_to = $dtr->{"date_to"};
        $empCode = $dtr->{"empCode"};
        $lv->GetAllLeaveRepHistory($date_from,$date_to,$empCode);
    }else if($dtr->{"Action"} == "GetAppOt"){
        $date_from = $dtr->{"date_from"};
        $date_to = $dtr->{"date_to"};
        $status = $dtr->{"status"};
        $ot->GetAllOtAppHistory($date_from,$date_to,$status);        
    }else if($dtr->{"Action"} == "GetRepOt"){
        $date_from = $dtr->{"date_from"};
        $date_to = $dtr->{"date_to"};
        $empCode = $dtr->{"empCode"};
        $ot->GetAllOtRepHistory($date_from,$date_to,$empCode);        
    }else if($dtr->{"Action"} == "GetAppWfh"){
        $date_from = $dtr->{"date_from"};
        $date_to = $dtr->{"date_to"};
        $status = $dtr->{"status"};
        $wfh->GetAllWfhAppHistory($date_from,$date_to,$status);        
    }else if($dtr->{"Action"} == "GetRepWfh"){
        $date_from = $dtr->{"date_from"};
        $date_to = $dtr->{"date_to"};
        $empCode = $dtr->{"empCode"};
        $wfh->GetAllWfhRepHistory($date_from,$date_to,$empCode);        
    }else if($dtr->{"Action"} == "GetAppOb"){
        $date_from = $dtr->{"date_from"};
        $date_to = $dtr->{"date_to"};
        $status = $dtr->{"status"};
        $ob->GetAllObAppHistory($date_from,$date_to,$status);        
    }else if($dtr->{"Action"} == "GetRepOb"){
        $date_from = $dtr->{"date_from"};
        $date_to = $dtr->{"date_to"};
        $empCode = $dtr->{"empCode"};
        $ob->GetAllObRepHistory($date_from,$date_to,$empCode);        
    }else if($dtr->{"Action"} == "GetAppDtrc"){
        $date_from = $dtr->{"date_from"};
        $date_to = $dtr->{"date_to"};
        $status = $dtr->{"status"};
        $dtrc->GetAlldtrcorrectAppHistory($date_from,$date_to,$status);        
    }else if($dtr->{"Action"} == "GetRepDtrc"){
        $date_from = $dtr->{"date_from"};
        $date_to = $dtr->{"date_to"};
        $empCode = $dtr->{"empCode"};
        $dtrc->GetAlldtrcorrectRepHistory($date_from,$date_to,$empCode);        
    }





?>