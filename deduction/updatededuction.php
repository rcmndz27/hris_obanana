<?php 


function UpdateDeduction($emp_code,$deduction_id,$period_cutoff,$amount,$effectivity_date)
    {
            global $connL;

            $cmd = $connL->prepare("UPDATE dbo.employee_deduction_management SET 
                deduction_id = :deduction_id,
                period_cutoff = :period_cutoff,
                amount = :amount,
                effectivity_date = :effectivity_date
             where emp_code = :emp_code");
            $cmd->bindValue('emp_code',$emp_code);
            $cmd->bindValue('deduction_id',$deduction_id);
            $cmd->bindValue('period_cutoff',$period_cutoff);
            $cmd->bindValue('amount',$amount);
            $cmd->bindValue('effectivity_date',$effectivity_date);
            $cmd->execute();
    }


?>
