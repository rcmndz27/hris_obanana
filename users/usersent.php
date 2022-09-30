<?php

Class UsersEnt{

public function InsertUsersEnt($eMplogName,$username,$userid,$userpassword,$usertype,$status)
    {
        global $connL;

            $queryss = "SELECT emailaddress from dbo.employee_profile where emp_code = :empcode";
            $stmtss =$connL->prepare($queryss);
            $paramss = array(":empcode" => $userid);
            $stmtss->execute($paramss);
            $resultss = $stmtss->fetch();
            $useremail = $resultss['emailaddress'];

            $hashpassword = hash('sha256', $userpassword);

            $query = "INSERT INTO mf_user (userid,username,userpassword,usertype,useremail,status,audituser,auditdate) 

                VALUES(:userid,:username,:userpassword,:usertype,:useremail,:status,:audituser,:auditdate)";
    
                $stmt =$connL->prepare($query);

                $param = array(
                    ":username"=> $username,
                    ":userid" => $userid,
                    ":userpassword" => $hashpassword,
                    ":usertype"=> $usertype,
                    ":useremail"=> $useremail,
                    ":status"=> $status,
                    ":audituser" => $eMplogName,
                    ":auditdate"=>date('m-d-Y H:i:s')                                          
                );

            $result = $stmt->execute($param);

            echo $result;

    }


}

?>