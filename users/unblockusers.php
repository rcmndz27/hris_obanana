<?php 


function UnblockUsers($emp_code)
    {
            global $connL;

            $ins = $connL->prepare("UPDATE dbo.mf_user SET locked_acnt = 0 where userid = :emp_code");
            $ins->bindValue('emp_code',$emp_code);
            $ins->execute();

            $cmd = $connL->prepare("DELETE from dbo.logs where emp_code = :emp_code");
            $cmd->bindValue('emp_code',$emp_code);
            $cmd->execute();

    }


?>
