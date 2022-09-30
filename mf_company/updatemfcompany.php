<?php 


function UpdateMfcompany($rowid,$code,$descs,$status)
    {
            global $connL;

            $cmd = $connL->prepare("UPDATE dbo.mf_company SET code = :code,descs = :descs,status = :status where rowid = :rowid");
            $cmd->bindValue('rowid',$rowid);
            $cmd->bindValue('code',$code);
            $cmd->bindValue('descs',$descs);
            $cmd->bindValue('status',$status);
            $cmd->execute();
    }


?>
