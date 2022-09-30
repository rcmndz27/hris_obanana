<?php

Class MfpositionEnt{

public function InsertMfpositionEnt($position,$status,$empCode)
    {
        global $connL;

            $query = "INSERT INTO mf_position (position,status,audituser,auditdate) VALUES(:position,:status,:audituser, :auditdate)";
    
                $stmt =$connL->prepare($query);

                $param = array(
                    ":position"=> $position,                                      
                    ":status"=> 'Active',
                    ":audituser" => $empCode,
                    ":auditdate"=>date('m-d-Y H:i:s')
                );

            $result = $stmt->execute($param);

            echo $result;           

    }

    public function InsertJobDeptEnt($deptJob,$empCode)
    {
        global $connL;

            $qry = 'SELECT max(rowid) as maxid FROM mf_position';
            $stm =$connL->prepare($qry);
            $stm->execute();
            $rst = $stm->fetch();

            $querys = "INSERT INTO mf_jobdept (job_id,dept_id,status,audituser,auditdate) 
                VALUES(:job_id,:dept_id,:status,:audituser, :auditdate) ";
    
                $stmts =$connL->prepare($querys);
    
                $params = array(
                    ":job_id" => $rst['maxid'],
                    ":dept_id"=> $deptJob,
                    ":status" => 'Active',
                    ":audituser" => $empCode,
                    ":auditdate"=>date('m-d-Y H:i:s')
                );

            $results = $stmts->execute($params);

            echo $results;            

    }


}

?>