<?php


    include('../deduction/deductionent.php');
    include('../config/db.php');

$dedEnt = new DeductionEnt();

$dedent = json_decode($_POST["data"]);

if($dedent->{"Action"} == "InseryDeductionEnt")
{

    $emp_code = $dedent->{"emp_code"};
    $deduction_id = $dedent->{"deduction_id"};
    $period_cutoff = $dedent->{"period_cutoff"};
    $effectivity_date = $dedent->{"effectivity_date"};
    $amount = $dedent->{"amount"};


    $dedEnt->InseryDeductionEnt($emp_code,$deduction_id,$period_cutoff,$effectivity_date,$amount);

}else{

}
    

?>

