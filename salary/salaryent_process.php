<?php

            date_default_timezone_set('Asia/Manila');


    include('../salary/salaryent.php');
    include('../config/db.php');

$salEnt = new SalaryEnt();

$salent = json_decode($_POST["data"]);

if($salent->{"Action"} == "InsertSalaryEnt")
{

    $emp_code = $salent->{"emp_code"};
    $bank_type = $salent->{"bank_type"};
    $bank_no = $salent->{"bank_no"};
    $pay_rate = $salent->{"pay_rate"};
    $amount = $salent->{"amount"};
    $eMplogName = $salent->{"eMplogName"};
    $status = $salent->{"status"};

    $salEnt->InsertSalaryEnt($eMplogName,$emp_code,$bank_type,$bank_no,$pay_rate,$amount,$status);

}
    

?>

