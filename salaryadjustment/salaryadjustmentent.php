<?php

Class SalaryAdjEnt{

public function InsertSalaryAdjEnt($eMplogName,$emp_code,$description,$period_from,$period_to,$inc_decr,$amount,$remarks)
    {
        global $connL;

            $query = "INSERT INTO employee_salaryadj_management (emp_code,description,period_from,period_to,inc_decr,amount,remarks,audituser,auditdate) 

                VALUES(:emp_code,:description,:period_from,:period_to,:inc_decr,:amount,:remarks,:audituser,:auditdate)";
    
                $stmt =$connL->prepare($query);

                $param = array(
                    ":emp_code"=> $emp_code,
                    ":description" => $description,
                    ":period_from" => $period_from,
                    ":period_to"=> $period_to,
                    ":inc_decr"=> $inc_decr,
                    ":amount"=> $amount,
                    ":remarks"=> $remarks,
                    ":audituser" => $eMplogName,
                    ":auditdate"=>date('m-d-Y H:i:s')                                          
                );

            $result = $stmt->execute($param);

            echo $result;

    }


}

?>