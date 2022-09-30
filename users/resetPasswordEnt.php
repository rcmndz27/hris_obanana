<?php

function ResetPassword($emp_code)
    {
            global $connL;

             $hashpassword = hash('sha256', 'abc123');

            $cmd = $connL->prepare("UPDATE dbo.mf_user SET 
                userpassword = :hashpassword
                where userid = :emp_code");
            $cmd->bindValue('emp_code',$emp_code);
            $cmd->bindValue('hashpassword',$hashpassword);
            $cmd->execute();
    }



?>