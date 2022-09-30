<?php

Class MfdepartmentEnt{

public function InsertMfdepartmentEnt($code,$descs)
    {
        global $connL;

            $query = "INSERT INTO mf_dept (code,descs,status) VALUES(:code,:descs,:status)";
    
                $stmt =$connL->prepare($query);

                $param = array(
                    ":code"=> $code,
                    ":descs" => $descs,
                    ":status" => 'Active'                                       
                );

            $result = $stmt->execute($param);

            echo $result;

    }


}

?>