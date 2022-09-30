<?php


include('../applicantprofile/maent.php');
include('../config/db.php');

$manEnt = new ManEnt();
$manent = json_decode($_POST["data"]);

if($manent->{"Action"} == "InsertManpowerEnt")
{

    $position = $manent->{"position"};
    $req_ment = $manent->{"req_ment"};
    $date_needed = $manent->{"date_needed"};
    $status = $manent->{"status"};
    $eMplogName = $manent->{"eMplogName"};
 
    $manEnt->InsertManpowerEnt($eMplogName,$position,$req_ment,$date_needed,$status);

}
    

?>

