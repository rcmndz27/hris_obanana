<?php 


function UpdateMfposition($rowid,$position,$status,$empCode)
    {
            global $connL;

            $cmd = $connL->prepare("UPDATE dbo.mf_position SET position = :position,status = :status
            ,audituser = :audituser , auditdate = :auditdate where rowid = :rowid");
            $cmd->bindValue('rowid',$rowid);
            $cmd->bindValue('position',$position);
            $cmd->bindValue('status',$status);
            $cmd->bindValue('audituser',$empCode);
            $cmd->bindValue('auditdate',date('m-d-Y'));
            $cmd->execute();

            $cmdt = $connL->prepare("DELETE FROM dbo.mf_jobdept WHERE job_id = :job_id");
            $cmdt->bindValue('job_id',$rowid);
            $cmdt->execute();

    }


function InsertJobdept($rowid,$deptJob,$empCode){

    global $connL;

            $querys = "INSERT INTO mf_jobdept (job_id,dept_id,status,audituser,auditdate) 
                VALUES(:job_id,:dept_id,:status,:audituser, :auditdate) ";
    
                $stmts =$connL->prepare($querys);
    
                $params = array(
                    ":job_id" => $rowid,
                    ":dept_id"=> $deptJob,
                    ":status" => 'Active',
                    ":audituser" => $empCode,
                    ":auditdate"=>date('m-d-Y H:i:s')
                );

            $results = $stmts->execute($params);

            echo $results;   

}

?>
