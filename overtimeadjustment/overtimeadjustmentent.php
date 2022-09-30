<?php

Class OvertimeAdjEnt{

public function InsertOvertimeAdjEnt($emp_code,$description,$otadj_date,$inc_decr,$amount,$remarks)
    {
        global $connL;

            $query = "INSERT INTO employee_overtimeadj_management (emp_code,description,otadj_date,inc_decr,amount,remarks,audituser,auditdate) 

                VALUES(:emp_code,:description,:otadj_date,:inc_decr,:amount,:remarks,:audituser,:auditdate)";
    
                $stmt =$connL->prepare($query);

                $param = array(
                    ":emp_code"=> $emp_code,
                    ":description" => $description,
                    ":otadj_date" => $otadj_date,
                    ":inc_decr"=> $inc_decr,
                    ":amount"=> $amount,
                    ":remarks"=> $remarks,
                    ":audituser" => 'admin',
                    ":auditdate"=>date('m-d-Y H:i:s')                                          
                );

            $result = $stmt->execute($param);

            echo $result;

    }


}

?>