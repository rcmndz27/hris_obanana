<?php


    include('../mf_holiday/mfholidayent.php');
    include('../config/db.php');

$mfHol = new MfholidayEnt();

$mfhol = json_decode($_POST["data"]);

if($mfhol->{"Action"} == "InsertMfholidayEnt")
{

    $holidaydate = $mfhol->{"holidaydate"};
    $holidaytype = $mfhol->{"holidaytype"};
    $holidaydescs = $mfhol->{"holidaydescs"};
    $eMplogName = $mfhol->{"eMplogName"};
    $status = $mfhol->{"status"};


    $mfHol->InsertMfholidayEnt($eMplogName,$holidaydate,$holidaytype,$holidaydescs,$status);

}
    

?>

