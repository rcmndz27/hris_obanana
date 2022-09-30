<?php

    include('../payroll/payroll_save.php');
    include('../config/db.php');

    $choice = $_POST['choice'];
    $empCode = $_POST['emp_code'];

    if ($choice == 1)
    {   
        $pfrom = $_POST['pfrom'];
        $pto = $_POST['pto'];
        $ppay = $_POST['ppay'];
        ApprovePayView($empCode,$pfrom,$pto,$ppay);
    }else{
        $pfrom = $_POST['pfrom'];
        $pto = $_POST['pto'];
        $pfrom30 = $_POST['pfrom30'];
        $pto30 = $_POST['pto30'];        
        $ppay = $_POST['ppay'];
        ApprovePayView30($empCode,$pfrom,$pto,$pfrom30,$pto30,$ppay);
    }

?>