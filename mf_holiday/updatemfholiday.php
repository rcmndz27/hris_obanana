<?php 


function UpdateMfholiday($rowid,$holidaydate,$holidaytype,$holidaydescs,$status)
    {
            global $connL;

            $cmd = $connL->prepare("UPDATE dbo.mf_holiday SET 
                holidaydate = :holidaydate,holidaytype = :holidaytype, 
                holidaydescs = :holidaydescs,status = :status
                where rowid = :rowid");
            $cmd->bindValue('rowid',$rowid);
            $cmd->bindValue('holidaydate',$holidaydate);
            $cmd->bindValue('holidaytype',$holidaytype);
            $cmd->bindValue('holidaydescs',$holidaydescs);
            $cmd->bindValue('status',$status);
            $cmd->execute();
    }


?>
