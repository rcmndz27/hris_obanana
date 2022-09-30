<?php

            date_default_timezone_set('Asia/Manila');

Class SalaryEnt{

public function InsertSalaryEnt($eMplogName,$emp_code,$bank_type,$bank_no,$pay_rate,$amount,$status)
    {
        global $connL;

            $query = "INSERT INTO employee_salary_management (emp_code,bank_type,bank_no,pay_rate,amount,status,audituser,auditdate) 

                VALUES(:emp_code,:bank_type,:bank_no,:pay_rate,:amount,:status,:audituser,:auditdate)";
    
                $stmt =$connL->prepare($query);

                $param = array(
                    ":emp_code"=> $emp_code,
                    ":bank_type" => $bank_type,
                    ":bank_no" => $bank_no,
                    ":pay_rate"=> $pay_rate,
                    ":amount"=> $amount,
                    ":status"=> $status,
                    ":audituser" => $eMplogName,
                    ":auditdate"=>date('m-d-Y H:i:s')                                          
                );

            $result = $stmt->execute($param);

            echo $result;

    }


}

?>