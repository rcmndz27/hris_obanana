<?php

Class PlaEnt{

public function InsertPlantillaEnt($entry_date,$department,$position,$reporting_to,$status,$empCode)
    {
        global $connL;

            $query = "INSERT INTO applicant_plantilla (entry_date,department,position,reporting_to,status,audituser,auditdate) 

                VALUES(:entry_date,:department,:position,:reporting_to,:status,:audituser,:auditdate)";
    
                $stmt =$connL->prepare($query);

                $param = array(
                    ":entry_date"=> date('m-d-Y'),
                    ":department" => $department,
                    ":position" => $position,
                    ":reporting_to"=> $reporting_to,
                    ":status"=> $status,
                    ":audituser" => $empCode,
                    ":auditdate"=>date('m-d-Y H:i:s')                                          
                );

            $result = $stmt->execute($param);

            echo $result;

    }


}

?>