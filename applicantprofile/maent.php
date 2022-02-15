<?php

Class ManEnt{

public function InsertManpowerEnt($position,$req_ment,$date_needed,$status)
    {
        global $connL;

            $query = "INSERT INTO applicant_manpower (entry_date,position,req_ment,date_needed,status,audituser,auditdate) 

                VALUES(:entry_date,:position,:req_ment,:date_needed,:status,:audituser,:auditdate)";
    
                $stmt =$connL->prepare($query);

                $param = array(
                    ":entry_date"=> date('m-d-Y'),
                    ":position" => $position,
                    ":req_ment" => $req_ment,
                    ":date_needed"=> $date_needed,
                    ":status"=> $status,
                    ":audituser" => 'user',
                    ":auditdate"=>date('m-d-Y')                                          
                );

            $result = $stmt->execute($param);

            echo $result;

    }


}

?>