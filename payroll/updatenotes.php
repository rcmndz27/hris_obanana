<?php 


function UpdateMfdeduction($rowid,$deduction_code,$deduction_name,$status)
    {
            global $connL;

            $cmd = $connL->prepare("UPDATE dbo.mf_deductions SET deduction_code = :deduction_code,deduction_name = :deduction_name,status = :status where rowid = :rowid");
            $cmd->bindValue('rowid',$rowid);
            $cmd->bindValue('deduction_code',$deduction_code);
            $cmd->bindValue('deduction_name',$deduction_name);
            $cmd->bindValue('status',$status);
            $cmd->execute();
    }


?>
