<?php

Class BankEnt{

public function InsertBankEnt($descsb,$descsb_name,$status)
    {
        global $connL;

            $query = "INSERT INTO mf_banktypes (descsb,descsb_name,status) VALUES(:descsb,:descsb_name,:status)";
    
                $stmt =$connL->prepare($query);

                $param = array(
                    ":descsb"=> $descsb,
                    ":descsb_name" => $descsb_name,
                    ":status" => 'Active'                                       
                );

            $result = $stmt->execute($param);

            echo $result;

    }


}

?>