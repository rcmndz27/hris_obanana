<?php

include('../mf_pyrollco/mfpyrollcoent.php');
include('../config/db.php');

$mfPyco = new MfpyrollcoEnt();
$mfpyco = json_decode($_POST["data"]);

if($mfpyco->{"Action"} == "InsertMfpyrollcoEnt")
{

    $pyrollco_from = $mfpyco->{"pyrollco_from"};
    $pyrollco_to = $mfpyco->{"pyrollco_to"};
    $co_type = $mfpyco->{"co_type"};
    $eMplogName = $mfpyco->{"eMplogName"};

    $mfPyco->InsertMfpyrollcoEnt($eMplogName,$pyrollco_from,$pyrollco_to,$co_type);
}
    

?>

