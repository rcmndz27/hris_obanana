<?php


    include('../allowances/allowancesent.php');
    include('../config/db.php');

$benEnt = new AllowancesEnt();

$benent = json_decode($_POST["data"]);

if($benent->{"Action"} == "InseryAllowancesEnt")
{

    $emp_code = $benent->{"emp_code"};
    $benefit_id = $benent->{"benefit_id"};
    $period_cutoff = $benent->{"period_cutoff"};
    $effectivity_date = $benent->{"effectivity_date"};
    $amount = $benent->{"amount"};


    $benEnt->InseryAllowancesEnt($emp_code,$benefit_id,$period_cutoff,$effectivity_date,$amount);

}else{

}
    

?>

