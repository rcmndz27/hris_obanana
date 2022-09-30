<?php

            date_default_timezone_set('Asia/Manila'); 


function UpdateSalary($emp_code,$bank_type,$bank_no,$pay_rate,$amount,$status)
    {
            global $connL;

            $cmd = $connL->prepare("UPDATE dbo.employee_salary_management SET 
                bank_type = :bank_type,
                bank_no = :bank_no,
                pay_rate = :pay_rate,
                amount = :amount,
                status = :status
             where emp_code = :emp_code");
            $cmd->bindValue('emp_code',$emp_code);
            $cmd->bindValue('bank_type',$bank_type);
            $cmd->bindValue('bank_no',$bank_no);
            $cmd->bindValue('pay_rate',$pay_rate);
            $cmd->bindValue('amount',$amount);
            $cmd->bindValue('status',$status);
            $cmd->execute();
    }


?>
