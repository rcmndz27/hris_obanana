<?php

Class AllowancesEnt{

public function InsertAllowancesEnt($eMplogName,$emp_code,$benefit_id,$period_cutoff,$effectivity_date,$amount)
    {
        global $connL;

            $query = "INSERT INTO employee_allowances_management (emp_code,benefit_id,period_cutoff,effectivity_date,amount,audituser,auditdate) 

                VALUES(:emp_code,:benefit_id,:period_cutoff,:effectivity_date,:amount,:audituser,:auditdate)";
    
                $stmt =$connL->prepare($query);

                $param = array(
                    ":emp_code"=> $emp_code,
                    ":benefit_id" => $benefit_id,
                    ":period_cutoff" => $period_cutoff,
                    ":effectivity_date"=> $effectivity_date,
                    ":amount"=> $amount,
                    ":audituser" => $eMplogName,
                    ":auditdate"=>date('m-d-Y H:i:s')                                          
                );

            $result = $stmt->execute($param);

            echo $result;

    }


}

?>