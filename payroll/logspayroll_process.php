<?php
    
    session_start();

    include('../payroll/logspayroll.php');
    include('../config/db.php');
    include('../controller/empInfo.php');

    $empInfo = new EmployeeInformation();
    $empInfo->SetEmployeeInformation($_SESSION['userid']);
    $empCode = $empInfo->GetEmployeeCode();
    $action = $_POST["action"];
    $badge_no = $_POST["badge_no"];
    $emp_code = $_POST["emp_code"];   
    $emp_name = $_POST["emp_name"]; 
    $column_name = $_POST["column_name"]; 
    $pay_from = $_POST["pay_from"]; 
    $pay_to = $_POST["pay_to"]; 
    $new_data = $_POST["new_data"];
    $old_data = $_POST["old_data"];
    $remarks = $_POST["remarks"];  
          

if ($action == 'Change')
{
    InsertPayLogs($action,$badge_no,$emp_code,$emp_name,$column_name,$pay_from,$pay_to,$new_data,$old_data,$remarks,$empCode);
}

?>
