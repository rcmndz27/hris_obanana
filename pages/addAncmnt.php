<?php


Class AncmntApplication{

    public function addAncmnt($empCode,$empName,$description,$date_from,$date_to,$status,$filename){

        global $connL;


            $query = "INSERT INTO logs_events (description,date_from,date_to,status,filename,audituser,auditdate ) 
                VALUES(:description,:date_from,:date_to,:status,:filename,:audituser,:auditdate) ";
    
                $stmt =$connL->prepare($query);
    
                $param = array(
                    ":description"=> $description,
                    ":date_from" => $date_from,
                    ":date_to" => $date_to,
                    ":status"=> $status,
                    ":filename"=> $filename,
                    ":audituser" => $empName,
                    ":auditdate"=>date('m-d-Y H:i:s')
                );

            $result = $stmt->execute($param);

            echo $result;

    }
 

}


?>