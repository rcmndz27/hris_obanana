<?php 


function UpdateAllowances($rowid,$emp_code,$benefit_id,$period_cutoff,$amount,$effectivity_date,$status)
    {
            global $connL;

            $cmd = $connL->prepare("UPDATE dbo.employee_allowances_management SET 
                benefit_id = :benefit_id,
                period_cutoff = :period_cutoff,
                amount = :amount,
                effectivity_date = :effectivity_date,
                status = :status
             where emp_code = :emp_code and benefits_emp_id = :rowid ");
            $cmd->bindValue('emp_code',$emp_code);
            $cmd->bindValue('rowid',$rowid);
            $cmd->bindValue('benefit_id',$benefit_id);
            $cmd->bindValue('period_cutoff',$period_cutoff);
            $cmd->bindValue('amount',$amount);
            $cmd->bindValue('effectivity_date',$effectivity_date);
            $cmd->bindValue('status',$status);
            $cmd->execute();
    }


?>
