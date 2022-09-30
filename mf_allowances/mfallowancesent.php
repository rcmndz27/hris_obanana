<?php

Class MfallowancesEnt{

public function InseryMfallowancesEnt($benefit_code,$benefit_name)
    {
        global $connL;

            $query = "INSERT INTO mf_benefits (benefit_code,benefit_name,status) VALUES(:benefit_code,:benefit_name,:status)";
    
                $stmt =$connL->prepare($query);

                $param = array(
                    ":benefit_code"=> $benefit_code,
                    ":benefit_name" => $benefit_name,
                    ":status" => 'Active'                                        
                );

            $result = $stmt->execute($param);

            echo $result;

    }


}

?>