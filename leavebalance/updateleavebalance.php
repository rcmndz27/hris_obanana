<?php 


function UpdateLeaveBalance($emp_code,$earned_sl,$earned_vl,$earned_fl,$earned_sl_bank,$status)
    {
            global $connL;

            $cmd = $connL->prepare("UPDATE dbo.employee_leave SET 
                earned_sl = :earned_sl,
                earned_vl = :earned_vl,
                earned_fl = :earned_fl,
                earned_sl_bank = :earned_sl_bank,
                status = :status
             where emp_code = :emp_code");
            $cmd->bindValue('emp_code',$emp_code);
            $cmd->bindValue('earned_sl',$earned_sl);
            $cmd->bindValue('earned_vl',$earned_vl);
            $cmd->bindValue('earned_fl',$earned_fl);
            $cmd->bindValue('earned_sl_bank',$earned_sl_bank);
            $cmd->bindValue('status',$status);
            $cmd->execute();
    }


?>
