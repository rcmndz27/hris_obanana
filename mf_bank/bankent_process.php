<?php


    include('../mf_bank/bankent.php');
    include('../config/db.php');

$banEnt = new BankEnt();

$banent = json_decode($_POST["data"]);

if($banent->{"Action"} == "InsertBankEnt")
{

    $descsb = $banent->{"descsb"};
    $descsb_name = $banent->{"descsb_name"};


    $banEnt->InseryBankEnt($descsb,$descsb_name);

}else{

}
    

?>

