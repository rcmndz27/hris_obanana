<?php

Class MfdeductionEnt{

public function InsertMfdeductionEnt($deduction_code,$deduction_name,$status)
    {
        global $connL;

            $query = "INSERT INTO mf_deductions (deduction_code,deduction_name,status) VALUES(:deduction_code,:deduction_name,:status)";
    
                $stmt =$connL->prepare($query);

                $param = array(
                    ":deduction_code"=> $deduction_code,
                    ":deduction_name" => $deduction_name,
                    ":status" => 'Active'                                        
                );

            $result = $stmt->execute($param);

            echo $result;

    }


}

?>