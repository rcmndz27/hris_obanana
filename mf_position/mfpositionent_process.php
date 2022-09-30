<?php


    include('../mf_position/mfpositionent.php');
    include('../config/db.php');

$mfPos = new MfpositionEnt();

$mfpos = json_decode($_POST["data"]);

if($mfpos->{"Action"} == "InsertMfpositionEnt")
{

    $position = $mfpos->{"position"};
    $status = $mfpos->{"status"};
    $empCode = $mfpos->{"empCode"};
    $arr = $mfpos->{"department"} ;

    $mfPos->InsertMfpositionEnt($position,$status,$empCode);    

        foreach($arr as $value){
            $deptJob = $value;
          
                $mfPos->InsertJobDeptEnt($deptJob,$empCode);    
        }    

}else{

}
    

?>

