<?php 


function UpdateOvertimeAdj($emp_code,$otadj_date,$description,$inc_decr,$amount,$remarks)
    {
            global $connL;

            $cmd = $connL->prepare("UPDATE dbo.employee_overtimeadj_management SET 
                otadj_date = :otadj_date,
                description = :description,
                inc_decr = :inc_decr,
                amount = :amount,  
                remarks = :remarks
             where emp_code = :emp_code");
            $cmd->bindValue('emp_code',$emp_code);
            $cmd->bindValue('otadj_date',$otadj_date);
            $cmd->bindValue('description',$description);
            $cmd->bindValue('inc_decr',$inc_decr);
            $cmd->bindValue('amount',$amount);
            $cmd->bindValue('remarks',$remarks);
            $cmd->execute();
    }


?>
