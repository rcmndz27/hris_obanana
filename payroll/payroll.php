<?php 


function GetPayrollList($action, $dtFrom, $dtTo,$location,$empCode){

           
            global $connL;

            $totalDaysAbsent = 0;
            $totalDaysWorked = 0;
            $lates = 0;
            $undertime = 0;
            $reg_ot = 0; 
            $rd_ot = 0;
            $rh_ot = 0;
            $sh_ot = 0;
            $spr_ot  = 0;
            $adj_ot  = 0;

            $qins = 'INSERT INTO dbo.payroll_period_logs (emp_code,period_from,period_to,location) 
            VALUES (:emp_code,:period_from,:period_to,:location)';
            $stmt_ins =$connL->prepare($qins);                                 
                                                $params = array(
                                                ":emp_code" => $empCode,
                                                ":period_from" => $dtFrom,
                                                ":period_to" => $dtTo,
                                                ":location" => $location,
                                                );                                
            $result = $stmt_ins->execute($params);


            $query = 'SELECT * FROM dbo.att_summary WHERE period_from = :period_from AND period_to = :period_to and location = :location ORDER BY employee ASC';
            $param = array(":period_from" => $dtFrom, ":period_to" => $dtTo, ":location" => $location );
            $stmt =$connL->prepare($query);
            $stmt->execute($param);
            $r = $stmt->fetch();

            echo "
            <input type='text' id='myInput' onkeyup='myFunction()' placeholder='Search for names..' title='Type in a name'>
            <table id='payrollList' class='table table-striped table-sm' cellpadding='0' cellspacing='0'> 
                <thead>
                    <tr>
                        <th colspan='11' class='paytop'>Payroll Period of ".$location." from ".$dtFrom." to ".$dtTo."  </th>
                    </tr>
                    <tr class='noExl'>
                        <th>Employee Name</th>
                        <th>Cut-off From</th>
                        <th>Cut-off To</th>
                        <th>Total Days Absent</th>
                        <th>Total Days Worked</th>
                        <th>Lates (Hrs)</th>
                        <th>Undertime (Hrs)</th>
                        <th>Regular Overtime (Hrs)</th>
                        <th>Rest Day Overtime (Hrs)</th>
                        <th>Regular Holiday Overtime (Hrs)</th>
                        <th>Special Holiday Overtime (Hrs)</th>
                        <th>Special Holiday Rest Day Overtime (Hrs)</th> 
                        <th>OT Adjustment (Amount)</th>             
                    </tr>
                </thead>
                <tbody>";

                 if($r){
                    do {
                            echo "<tr>".
                                    "<td>" . $r['employee'] . "</td>".
                                    "<td>" . date('m/d/Y', strtotime($r['period_from'])) . "</td>".
                                    "<td>" . date('m/d/Y', strtotime($r['period_to'])) . "</td>".
                                    "<td>" . round($r['tot_days_absent'],2) . "</td>".
                                    "<td>" . round($r['tot_days_work'],2) . "</td>".
                                    "<td>" . round($r['tot_lates'],2) . "</td>".
                                    "<td>" . round($r['total_undertime'],2) . "</td>".
                                    "<td>" . round($r['tot_overtime_reg'],2) . "</td>".
                                    "<td>" . round($r['tot_overtime_rest'],2) . "</td>".
                                    "<td>" . round($r['tot_overtime_regholiday'],2) . "</td>".
                                    "<td>" . round($r['tot_overtime_spholiday'],2) . "</td>".
                                    "<td>" . round($r['tot_overtime_sprestholiday'],2) . "</td>".
                                    "<td>" . round($r['ot_adjustment'],2) . "</td>".
                                    "</tr>";
                
                                $totalDaysAbsent += round($r['tot_days_absent'], 2);
                                $totalDaysWorked += round($r['tot_days_work'] , 2);
                                $lates += round($r['tot_lates'], 2);
                                $undertime += round($r['total_undertime'] , 2);
                                $reg_ot += round($r['tot_overtime_reg'], 2);
                                $rd_ot += round($r['tot_overtime_rest'] , 2);
                                $rh_ot += round($r['tot_overtime_regholiday'], 2);
                                $sh_ot += round($r['tot_overtime_spholiday'] , 2);
                                $spr_ot += round($r['tot_overtime_sprestholiday'], 2);
                                $adj_ot += round($r['ot_adjustment'] , 2);                               
                
                               
                   } while($r = $stmt->fetch(PDO::FETCH_ASSOC));

                            $q_logs = 'SELECT * FROM dbo.payroll WHERE rowid = (SELECT MAX(rowid) AS id 
                            from dbo.payroll where audituser = :emp_cd)';
                            $paramq = array(":emp_cd" => $empCode);
                            $stmt_q =$connL->prepare($q_logs);
                            $stmt_q->execute($paramq);
                            $rs = $stmt_q->fetch();


                        if($rs){
                                         
                                    $dtf = date('m/d/Y', strtotime($rs['date_from']));
                                    $dtt = date('m/d/Y', strtotime($rs['date_to']));

                                    $dtf_l = ($dtf === false) ? '0000-00-00' : $dtf;
                                    $dtt_l = ($dtt === false) ? '0000-00-00' : $dtt;
                                    $loc_l = ($rs['location'] === false) ? '0000-00-00' : $rs['location'];


                                       echo"</tbody>";
                                       echo "<tfoot>
                                            <tr>".
                                                "<td colspan='3' class='text-center bg-success'><b>Total</b></td>".
                                                "<td class='bg-success'><b>" . $totalDaysAbsent . "</b></td>".
                                                "<td class='bg-success'><b>" . $totalDaysWorked . "</b></td>".
                                                "<td class='bg-success'><b>" . $lates . "</b></td>".
                                                "<td class='bg-success'><b>" . $undertime . "</b></td>".
                                                "<td class='bg-success'><b>" . $reg_ot . "</b></td>".
                                                "<td class='bg-success'><b>" . $rd_ot . "</b></td>".
                                                "<td class='bg-success'><b>" . $rh_ot . "</b></td>".
                                                "<td class='bg-success'><b>" . $sh_ot . "</b></td>".
                                                "<td class='bg-success'><b>" . $spr_ot . "</b></td>".
                                                "<td class='bg-success'><b>" . $adj_ot . "</b></td>".                                                
                                                "</tr><tr>";
                                            if($dtf_l == $dtFrom and $dtt_l == $dtTo and 
                                                ucwords(strtolower($loc_l)) == ucwords(strtolower($location))){
                                                echo"<td colspan='11' class='paytop'>".
                                                "</tr></tfoot>";   
                                            }else{
                                                echo"<td colspan='11' class='paytop'>".
                                                "<button id='btnApproveView' style='font-weight:bolder;background-color: #b52020;border-color: #b52020;color: #ffff;width: 200px;' onmousedown='javascript:ApprovePayView()'>SAVE PAYROLL</button></td>".
                                                "</tr></tfoot>";  
                                            }

                            }else{
                                        echo"</tbody>";
                                        echo "<tfoot>
                                        <tr>".
                                            "<td colspan='3' class='text-center bg-success'><b>Total</b></td>".
                                            "<td class='bg-success'><b>" . $totalDaysAbsent . "</b></td>".
                                            "<td class='bg-success'><b>" . $totalDaysWorked . "</b></td>".
                                            "<td class='bg-success'><b>" . $lates . "</b></td>".
                                            "<td class='bg-success'><b>" . $undertime . "</b></td>".
                                            "<td class='bg-success'><b>" . $reg_ot . "</b></td>".
                                            "<td class='bg-success'><b>" . $rd_ot . "</b></td>".
                                            "<td class='bg-success'><b>" . $rh_ot . "</b></td>".
                                            "<td class='bg-success'><b>" . $sh_ot . "</b></td>".
                                            "<td class='bg-success'><b>" . $spr_ot . "</b></td>".
                                            "<td class='bg-success'><b>" . $adj_ot . "</b></td>".                                            
                                            "</tr><tr>"; 
                                            echo"<td colspan='11' class='paytop'>".
                                            "<div class='mt-3 d-flex justify-content-center'><button id='btnApproveView' class='svepyrll' onmousedown='javascript:ApprovePayView()'><i class='fas fa-save'></i> SAVE PAYROLL</button></div></td>".
                                            "</tr></tfoot>";  
                                        
                            }

            
                }else { 
                    echo '<tfoot><tr><td colspan="11" class="paytop">No Results Found</td></tr></tfoot>'; 
                }
    
            echo"</table>"; 
                                          
}

    function ApprovePayView($empCode)
    {
            global $connL;

            $q_logs = 'SELECT* FROM dbo.payroll_period_logs WHERE rowid = (SELECT MAX(rowid) AS id from dbo.payroll_period_logs where emp_code = :emp_cd)';
            $paramq = array(":emp_cd" => $empCode);
            $stmt_q =$connL->prepare($q_logs);
            $stmt_q->execute($paramq);
            $rs = $stmt_q->fetch();

            $prf = date('m/d/Y', strtotime($rs['period_from']));
            $prt = date('m/d/Y', strtotime($rs['period_to']));
            $loc = $rs["location"];

            $query_pay = $connL->prepare('EXEC hrissys_test.dbo.payroll_summary :period_from, :period_to , :location, :emp_code');
            $query_pay->bindValue(':period_from',$prf);
            $query_pay->bindValue(':period_to',$prt);
            $query_pay->bindValue(':location',$loc);
            $query_pay->bindValue(':emp_code',$empCode);
            $query_pay->execute();
            $q = $query_pay->fetch();

    }


?>
