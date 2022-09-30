<?php

Class MfpyrollcoEnt{

public function InsertMfpyrollcoEnt($eMplogName,$pyrollco_from,$pyrollco_to,$co_type)
    {
        global $connL;

            $query = "INSERT INTO 
            mf_pyrollco (pyrollco_from,pyrollco_to,co_type,status,audituser,auditdate) 
            VALUES (:pyrollco_from,:pyrollco_to,:co_type,:status,:audituser,:auditdate)";
    
                $stmt =$connL->prepare($query);

                $param = array(
                    ":pyrollco_from"=> $pyrollco_from,
                    ":pyrollco_to" => $pyrollco_to,
                    ":co_type" => $co_type,
                    ":status" => 'Active',
                    ":audituser" => $eMplogName,
                    ":auditdate" => date('Y-m-d')                                      
                );

            $result = $stmt->execute($param);

            echo $result;

    }


}

?>