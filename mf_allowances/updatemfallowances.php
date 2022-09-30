<?php 


function UpdateMfallowances($rowid,$benefit_code,$benefit_name,$status)
    {
            global $connL;

            $cmd = $connL->prepare("UPDATE dbo.mf_benefits SET 
                benefit_code = :benefit_code,
                benefit_name = :benefit_name,
                status = :status
             where rowid = :rowid");
            $cmd->bindValue('rowid',$rowid);
            $cmd->bindValue('benefit_code',$benefit_code);
            $cmd->bindValue('benefit_name',$benefit_name);
            $cmd->bindValue('status',$status);
            $cmd->execute();
    }


?>
