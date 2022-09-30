<?php 
    function CancelWfh($wfhid,$emp_code)
    {
        global $connL;

        $cmd = $connL->prepare("UPDATE dbo.tr_workfromhome SET status = 4 where rowid = :wfhid");
        $cmd->bindValue('wfhid',$wfhid);
        $cmd->execute();

        $squery = "SELECT lastname+', '+firstname as [fullname] FROM employee_profile WHERE emp_code = :emp_code";
        $sparam = array(':emp_code' => $emp_code);
        $sstmt =$connL->prepare($squery);
        $sstmt->execute($sparam);
        $sresult = $sstmt->fetch();
        $sname = $sresult['fullname'];

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
                ":remarks" => 'Cancelled/Voided Work From Home',
                ":audituser" => $emp_code,
                ":auditdate"=>date('m-d-Y H:i:s')
            );

        $results = $stmts->execute($params);

        echo $results;

    }

    ?>