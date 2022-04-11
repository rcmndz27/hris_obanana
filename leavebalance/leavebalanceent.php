<?php

Class LeaveBalanceEnt{

public function InsertLeaveBalanceEnt($emp_code,$earned_sl,$earned_vl,$earned_sl_bank)
    {
        global $connL;

            $query = "INSERT INTO employee_leave (emp_code,earned_sl,earned_vl,earned_sl_bank,status,audituser,auditdate) 

                VALUES(:emp_code,:earned_sl,:earned_vl,:earned_sl_bank,:status,:audituser,:auditdate)";
    
                $stmt =$connL->prepare($query);

                $param = array(
                    ":emp_code"=> $emp_code,
                    ":earned_sl" => $earned_sl,
                    ":earned_vl" => $earned_vl,
                    ":earned_sl_bank"=> $earned_sl_bank,
                    ":status"=> 'Active',
                    ":audituser" => 'user',
                    ":auditdate"=>date('m-d-Y')                                          
                );

            $result = $stmt->execute($param);

            echo $result;

    }


}

?>