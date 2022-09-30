<?php 


function InsertPayLogs($action,$badge_no,$emp_code,$emp_name,$column_name,$pay_from,$pay_to,$new_data,$old_data,$remarks,$empCode)
    
    {    

            global $connL;

            $querys = "INSERT INTO logs_payroll (action,badge_no,emp_code,emp_name,column_name,pay_from,pay_to,new_data,old_data,remarks,audituser,auditdate) 
                VALUES(:action,:badge_no,:emp_code,:emp_name,:column_name,:pay_from,:pay_to,:new_data,:old_data,:remarks,:audituser,:auditdate) ";
    
                $stmts =$connL->prepare($querys);
    
                $params = array(
                    ":action"=> $action,
                    ":badge_no"=> $badge_no,
                    ":emp_code"=> $emp_code,
                    ":emp_name"=> $emp_name,
                    ":column_name"=> $column_name,
                    ":pay_from"=> $pay_from,
                    ":pay_to"=> $pay_to,
                    ":new_data"=> $new_data,
                    ":old_data"=> $old_data,
                    ":remarks" => $remarks,
                    ":audituser" => $empCode,
                    ":auditdate"=>date('m-d-Y H:i:s')
                );

            $results = $stmts->execute($params);

            echo $results;
    }


?>
