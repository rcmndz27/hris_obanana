<?php

    include('../mf_position/updatemfposition.php');
    include('../config/db.php');

    // $action = $_POST["action"];
    $rowid = $_POST["rowid"];
    $position = $_POST["position"];
    $status = $_POST["status"];
    $empCode = $_POST["empCode"];
    $arr = $_POST["department"];

    UpdateMfposition($rowid,$position,$status,$empCode);

            foreach($arr as $value){
                $deptJob = $value;
                InsertJobdept($rowid,$deptJob,$empCode);    
            } 


?>
