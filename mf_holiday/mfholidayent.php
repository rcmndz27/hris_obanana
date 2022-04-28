<?php

Class MfholidayEnt{

public function InsertMfholidayEnt($holidaydate,$holidaytype,$holidaydescs,$status)
    {
        global $connL;

            $query = "INSERT INTO mf_holiday (holidaydate,holidaytype,holidaydescs,status,audituser,auditdate) VALUES(:holidaydate,:holidaytype,:holidaydescs,:status,:audituser,:auditdate)";
    
                $stmt =$connL->prepare($query);

                $param = array(
                    ":holidaydate"=> $holidaydate,
                    ":holidaytype" => $holidaytype,
                    ":holidaydescs" => $holidaydescs,
                    ":status" => 'Active',
                    ":audituser" => 'system',
                    ":auditdate" => date('Y-m-d'),                                       
                );

            $result = $stmt->execute($param);

            echo $result;

    }


}

?>