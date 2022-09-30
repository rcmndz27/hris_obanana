<?php
    
    
    include('../applicantprofile/plaent.php');
    include('../config/db.php');
    include('../controller/empInfo.php');

$plaEnt = new PlaEnt();
$empInfo = new EmployeeInformation();
$empInfo->SetEmployeeInformation($_SESSION['userid']);
$empCode = $empInfo->GetEmployeeCode();

$plaent = json_decode($_POST["data"]);

if($plaent->{"Action"} == "InsertPlantillaEnt")
{

    $entry_date = $plaent->{"entry_date"};
    $department = $plaent->{"department"};
    $position = $plaent->{"position"};
    $reporting_to = $plaent->{"reporting_to"};
    $status = $plaent->{"status"};
 

    $plaEnt->InsertPlantillaEnt($entry_date,$department,$position,$reporting_to,$status,$empCode);

}else{

}
    

?>

