<?php 
date_default_timezone_set('Asia/Manila');

    function TimeIn($wfhid,$emp_code,$wfh_output)
    {
        global $connL;

        $cmd = $connL->prepare("UPDATE dbo.tr_workfromhome SET wfh_output = :wfh_output 
            where emp_code = :emp_code and rowid = :wfhid");
        $cmd->bindValue('wfhid',$wfhid); 
        $cmd->bindValue('emp_code',$emp_code);           
        $cmd->bindValue('wfh_output',$wfh_output);                  
        $cmd->execute();

        $squery = "SELECT lastname+', '+firstname as [fullname] FROM employee_profile WHERE emp_code = :emp_code";
        $sparam = array(':emp_code' => $emp_code);
        $sstmt =$connL->prepare($squery);
        $sstmt->execute($sparam);
        $sresult = $sstmt->fetch();
        $sname = $sresult['fullname'];

        $queryf = "INSERT INTO employee_attendance (emp_code,name,punch_date,timein) 
            VALUES(:emp_code,:name,:punch_date,:timein) ";

            $stmtf =$connL->prepare($queryf);

            $paramf = array(
                ":emp_code"=> substr($emp_code,3),
                ":name"=> $sname,
                ":punch_date" => date('Y-m-d'),
                ":timein" => date('Y-m-d H:i:s')
            );  

            $resultf = $stmtf->execute($paramf);      

        $qry = 'SELECT max(rowid) as maxid FROM tr_workfromhome WHERE emp_code = :emp_code';
        $prm = array(":emp_code" => $emp_code);
        $stm =$connL->prepare($qry);
        $stm->execute($prm);
        $rst = $stm->fetch();

        $querys = "INSERT INTO logs_wfh (wfh_id,emp_code,emp_name,remarks,audituser,auditdate) 
            VALUES(:wfh_id,:emp_code,:emp_name,:remarks,:audituser, :auditdate) ";

            $stmts =$connL->prepare($querys);

            $params = array(
                ":wfh_id" => $rst['maxid'],
                ":emp_code"=> $emp_code,
                ":emp_name"=> $sname,
                ":remarks" => 'User Time in: '.date('h:i A'),
                ":audituser" => $emp_code,
                ":auditdate"=>date('m-d-Y H:i:s')
            );

        $results = $stmts->execute($params);

        echo $results;

    }


    function TimeOut($wfhid,$emp_code,$wfh_output2,$wfh_percentage,$attid)
    {
        global $connL;

        $cmd = $connL->prepare("UPDATE dbo.tr_workfromhome SET wfh_output2 = :wfh_output2 ,wfh_percentage =:wfh_percentage
            where emp_code = :emp_code and rowid = :wfhid");
        $cmd->bindValue('wfhid',$wfhid); 
        $cmd->bindValue('emp_code',$emp_code);           
        $cmd->bindValue('wfh_output2',$wfh_output2);
        $cmd->bindValue('wfh_percentage',$wfh_percentage);                  
        $cmd->execute();

        $squery = "SELECT lastname+', '+firstname as [fullname] FROM employee_profile WHERE emp_code = :emp_code";
        $sparam = array(':emp_code' => $emp_code);
        $sstmt =$connL->prepare($squery);
        $sstmt->execute($sparam);
        $sresult = $sstmt->fetch();
        $sname = $sresult['fullname'];

        $cmd2 = $connL->prepare("UPDATE dbo.employee_attendance SET timeout = :timeout
            where rowid = :attid"); 
        $cmd2->bindValue('timeout',date('Y-m-d H:i:s'));           
        $cmd2->bindValue('attid',$attid);                
        $cmd2->execute();

        // $queryf = "INSERT INTO employee_attendance (emp_code,name,punch_date,timeout) 
        //     VALUES(:emp_code,:name,:punch_date,:timeout) ";

        //     $stmtf =$connL->prepare($queryf);

        //     $paramf = array(
        //         ":emp_code"=> substr($emp_code,3),
        //         ":name"=> $sname,
        //         ":punch_date" => date('Y-m-d'),
        //         ":timeout" => date('Y-m-d H:i:s')
        //     );  

        //     $resultf = $stmtf->execute($paramf);      

        $qry = 'SELECT max(rowid) as maxid FROM tr_workfromhome WHERE emp_code = :emp_code';
        $prm = array(":emp_code" => $emp_code);
        $stm =$connL->prepare($qry);
        $stm->execute($prm);
        $rst = $stm->fetch();

        $querys = "INSERT INTO logs_wfh (wfh_id,emp_code,emp_name,remarks,audituser,auditdate) 
            VALUES(:wfh_id,:emp_code,:emp_name,:remarks,:audituser, :auditdate) ";

            $stmts =$connL->prepare($querys);

            $params = array(
                ":wfh_id" => $rst['maxid'],
                ":emp_code"=> $emp_code,
                ":emp_name"=> $sname,
                ":remarks" => 'User Time Out: '.date('h:i A'),
                ":audituser" => $emp_code,
                ":auditdate"=>date('m-d-Y H:i:s')
            );

        $results = $stmts->execute($params);

        echo $results;

    }


    ?>