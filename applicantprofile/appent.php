<?php

Class AppEnt{

public function InsertAppEnt($fname,$mi,$fmname,$howtoa,$refby,$refdate,$jpos1,$jpos2,$hono,$sbrgy,$cty,$cn1,$cn2,$eadd,$ttry,$ds1,$scname1,$scndry,$ds2,$scname2)
    {
        global $connL;

            $query = "INSERT INTO applicant_entry (firstname,middlei,familyname,howtoapply,referredby,referreddate,jobpos1,jobpos2,houseno,streetbrgy,city,contactno1,contactno2,emailadd,tertiary,discipline1,schoolname1,secondary,discipline2,schoolname2,audituser,auditdate) 

                VALUES(:fname,:mi,:fmname,:howtoa,:refby,:refdate,:jpos1,:jpos2,:hono,:sbrgy,:cty,:cn1,:cn2,:eadd,:ttry,:ds1,:scname1,:scndry,:ds2,:scname2,:audituser,:auditdate)";
    
                $stmt =$connL->prepare($query);

                $param = array(
                    ":fname"=> $fname,
                    ":mi" => $mi,
                    ":fmname" => $fmname,
                    ":howtoa"=> $howtoa,
                    ":refby"=> $refby,
                    ":refdate"=> $refdate,
                    ":jpos1" => $jpos1,
                    ":jpos2" => $jpos2,
                    ":hono" => $hono,
                    ":sbrgy"=> $sbrgy,
                    ":cty"=> $cty,
                    ":cn1" => $cn1,
                    ":cn2" => $cn2,
                    ":eadd" => $eadd,
                    ":ttry"=> $ttry,
                    ":ds1"=> $ds1,
                    ":scname1" => $scname1,                                        
                    ":scndry"=> $scndry,
                    ":ds2"=> $ds2,
                    ":scname2" => $scname2,  
                    ":audituser" => $fname,
                    ":auditdate"=>date('m-d-Y H:i:s')                                          
                );

            $result = $stmt->execute($param);

            echo $result;

    }


}

?>