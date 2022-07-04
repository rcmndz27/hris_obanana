<?php 
    function CancelLeave($leaveid,$emp_code)
    {
        global $connL;


        $qryh = 'SELECT * FROM dbo.tr_leave WHERE rowid = :leaveid';
        $prmh = array(":leaveid" => $leaveid);
        $stmh =$connL->prepare($qryh);
        $stmh->execute($prmh);
        $rsth = $stmh->fetch();
        $ltype = $rsth['leavetype'];
        $lstat = $rsth['approved'];

        if($ltype == 'Vacation Leave'){    
            $cmdr = $connL->prepare("UPDATE dbo.employee_leave SET earned_vl = earned_vl + 1 where emp_code = :emp_code");
            $cmdr->bindValue('emp_code',$emp_code);
            $cmdr->execute();
        }else if($ltype == 'Sick Leave'){
            $cmdr = $connL->prepare("UPDATE dbo.employee_leave SET earned_sl = earned_sl + 1 where emp_code = :emp_code");
            $cmdr->bindValue('emp_code',$emp_code);
            $cmdr->execute();
        }   

        $cmd = $connL->prepare("UPDATE dbo.tr_leave SET approved = 4 where rowid = :leaveid");
        $cmd->bindValue('leaveid',$leaveid);
        $cmd->execute();

        $qry = 'SELECT max(rowid) as maxid FROM tr_leave WHERE emp_code = :emp_code';
        $prm = array(":emp_code" => $emp_code);
        $stm =$connL->prepare($qry);
        $stm->execute($prm);
        $rst = $stm->fetch();

        $querys = "INSERT INTO logs_leave (leave_id,emp_code,remarks,audituser,auditdate) 
            VALUES(:leave_id, :emp_code, :remarks,:audituser, :auditdate) ";

            $stmts =$connL->prepare($querys);

            $params = array(
                ":leave_id" => $rst['maxid'],
                ":emp_code"=> $emp_code,
                ":remarks" => 'Cancelled/Voided Leave',
                ":audituser" => $emp_code,
                ":auditdate"=>date('m-d-Y h:i:s')
            );

        $results = $stmts->execute($params);

        echo $results;

    }

    ?>