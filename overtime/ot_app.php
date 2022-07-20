<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';


Class OtApp{

    private $employeeCode;
    
    public function SetOtAppParams($employeeCode){
        $this->employeeCode = $employeeCode;
    }

    public function GetAllOtAppHistory($date_from,$date_to,$status){
        global $connL;

        echo '
        <div class="form-row">  
                    <div class="col-lg-1">
                        <select class="form-select" name="state" id="maxRows">
                             <option value="5000">ALL</option>
                             <option value="5">5</option>
                             <option value="10">10</option>
                             <option value="15">15</option>
                             <option value="20">20</option>
                             <option value="50">50</option>
                             <option value="70">70</option>
                             <option value="100">100</option>
                        </select> 
                </div>         
                <div class="col-lg-8">
                </div>                               
                <div class="col-lg-3">        
                    <input type="text" id="myInput" class="form-control" onkeyup="myFunction()" placeholder="Search for overtime.." title="Type in overtime details"> 
                        </div>                     
                </div>         
        <table id="OtListTab" class="table table-striped table-sm">
        <thead>
            <tr>
                <th>OT Date</th>
                <th>Name</th>
                <th>OT Type</th>
                <th>Time-In</th>
                <th>Time-Out</th>
                <th>Plan OT</th>
                <th>Rendered OT</th>
                <th>Remarks</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>';

        $query = "SELECT (CASE when status = 1 then 'PENDING'
                    when   status = 2 then 'APPROVED'
                    when   status = 3 then 'REJECTED'
                    when   status = 4 then 'CANCELLED' ELSE 'N/A' END) as stats,b.lastname+','+b.firstname as fullname,a.rowid as ot_rowid,* FROM dbo.tr_overtime a
        left join employee_profile b on a.emp_code = b.emp_code
        where a.status = :status and a.ot_date between :startDate and :endDate";
        $param = array(":startDate" => date('Y-m-d', strtotime($date_from)),":endDate" => date('Y-m-d', strtotime($date_to)),":status" => $status);
        $stmt =$connL->prepare($query);
        $stmt->execute($param);
        $result = $stmt->fetch();

        if($result){
            do { 
                $otdate = "'".date('m-d-Y', strtotime($result['ot_date']))."'";
                $ottype = "'".(isset($result['ot_type']) ? $result['ot_type'] : 'n/a')."'";
                $otstartdtime = "'".date('h:i A', strtotime($result['ot_start_dtime']))."'";
                $otenddtime = "'".date('h:i A', strtotime($result['ot_end_dtime']))."'";
                $remark = "'".(isset($result['remarks']) ? $result['remarks'] : 'n/a')."'";
                $otreqhrs = "'".$result['ot_req_hrs']."'";
                $otrenhrs = "'".$result['ot_ren_hrs']."'";
                $rejectreason = "'".(isset($result['reject_reason']) ? $result['reject_reason'] : 'n/a')."'";
                $stats = "'".$result['stats']."'";
                $otid = "'".$result['ot_rowid']."'";
                $empcode = "'".$result['emp_code']."'";
                echo '
                <tr>
                <td>' . date('F d,Y', strtotime($result['ot_date'])) . '</td>
                <td>' . $result['fullname'] . '</td>
                <td>' . $result['ot_type'] . '</td>
                <td>' . date('h:i A', strtotime($result['ot_start_dtime'])) . '</td>
                <td>' . date('h:i A', strtotime($result['ot_end_dtime'])) . '</td>
                <td>' . round($result['ot_req_hrs'],2) . '</td> 
                <td>' . round($result['ot_ren_hrs'],2) . '</td>
                <td>' . $result['remarks'] . '</td>
                <td id="st'.$result['ot_rowid'].'">' . $result['stats'] . '</td>';
                echo'
                <td><button type="button" class="hactv" onclick="viewOtModal('.$otdate.','.$ottype.','.$otstartdtime.','.$otenddtime.','.$remark.','.$otreqhrs.','.$otrenhrs.','.$rejectreason.','.$stats.')" title="View Overtime">
                                <i class="fas fa-binoculars"></i>
                            </button>
                            <button type="button" class="hdeactv" onclick="viewOtHistoryModal('.$otid.')" title="View Logs">
                                <i class="fas fa-history"></i>
                            </button>                        
                            </td>';

            } while ($result = $stmt->fetch());

            echo '</tr></tbody>';

        }else { 
            echo '<tfoot><tr><td colspan="10" class="text-center">No Results Found</td></tr></tfoot>'; 
        }
        echo '</table>
        <div class="pagination-container">
        <nav>
          <ul class="pagination">
            
            <li data-page="prev" >
                <span> << <span class="sr-only">(current)</span></span></li>
    
          <li data-page="next" id="prev">
                  <span> >> <span class="sr-only">(current)</span></span>
            </li>
          </ul>
        </nav>
      </div>';
    } 

public function GetAllOtRepHistory($date_from,$date_to,$empCode){
        global $connL;

        echo '
        <div class="form-row">  
                    <div class="col-lg-1">
                        <select class="form-select" name="state" id="maxRows">
                             <option value="5000">ALL</option>
                             <option value="5">5</option>
                             <option value="10">10</option>
                             <option value="15">15</option>
                             <option value="20">20</option>
                             <option value="50">50</option>
                             <option value="70">70</option>
                             <option value="100">100</option>
                        </select> 
                </div>         
                <div class="col-lg-8">
                </div>                               
                <div class="col-lg-3">        
                    <input type="text" id="myInput" class="form-control" onkeyup="myFunctionRep()" placeholder="Search for overtime.." title="Type in overtime details"> 
                        </div>                     
                </div>         
        <table id="OtListRepTab" class="table table-striped table-sm">
        <thead>
            <tr>
                <th>OT Date</th>
                <th>Name</th>
                <th>OT Type</th>
                <th>Time-In</th>
                <th>Time-Out</th>
                <th>Plan OT</th>
                <th>Rendered OT</th>
                <th>Remarks</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>';

        $query = "SELECT (CASE when status = 1 then 'PENDING'
                    when   status = 2 then 'APPROVED'
                    when   status = 3 then 'REJECTED'
                    when   status = 4 then 'CANCELLED' ELSE 'N/A' END) as stats,b.lastname+','+b.firstname as fullname,a.rowid as ot_rowid,* FROM dbo.tr_overtime a
        left join employee_profile b on a.emp_code = b.emp_code
        where a.emp_code = :empCode and a.ot_date between :startDate and :endDate";
        $param = array(":startDate" => date('Y-m-d', strtotime($date_from)),":endDate" => date('Y-m-d', strtotime($date_to)),":empCode" => $empCode);
        $stmt =$connL->prepare($query);
        $stmt->execute($param);
        $result = $stmt->fetch();

        if($result){
            do { 
                $otdate = "'".date('m-d-Y', strtotime($result['ot_date']))."'";
                $ottype = "'".(isset($result['ot_type']) ? $result['ot_type'] : 'n/a')."'";
                $otstartdtime = "'".date('h:i A', strtotime($result['ot_start_dtime']))."'";
                $otenddtime = "'".date('h:i A', strtotime($result['ot_end_dtime']))."'";
                $remark = "'".(isset($result['remarks']) ? $result['remarks'] : 'n/a')."'";
                $otreqhrs = "'".$result['ot_req_hrs']."'";
                $otrenhrs = "'".$result['ot_ren_hrs']."'";
                $rejectreason = "'".(isset($result['reject_reason']) ? $result['reject_reason'] : 'n/a')."'";
                $stats = "'".$result['stats']."'";
                $otid = "'".$result['ot_rowid']."'";
                $empcode = "'".$result['emp_code']."'";
                echo '
                <tr>
                <td>' . date('F d,Y', strtotime($result['ot_date'])) . '</td>
                <td>' . $result['fullname'] . '</td>
                <td>' . $result['ot_type'] . '</td>
                <td>' . date('h:i A', strtotime($result['ot_start_dtime'])) . '</td>
                <td>' . date('h:i A', strtotime($result['ot_end_dtime'])) . '</td>
                <td>' . round($result['ot_req_hrs'],2) . '</td> 
                <td>' . round($result['ot_ren_hrs'],2) . '</td>
                <td>' . $result['remarks'] . '</td>
                <td id="st'.$result['ot_rowid'].'">' . $result['stats'] . '</td>';
                echo'
                <td><button type="button" class="hactv" onclick="viewOtModal('.$otdate.','.$ottype.','.$otstartdtime.','.$otenddtime.','.$remark.','.$otreqhrs.','.$otrenhrs.','.$rejectreason.','.$stats.')" title="View Overtime">
                                <i class="fas fa-binoculars"></i>
                            </button>
                            <button type="button" class="hdeactv" onclick="viewOtHistoryModal('.$otid.')" title="View Logs">
                                <i class="fas fa-history"></i>
                            </button>                        
                            </td>';

            } while ($result = $stmt->fetch());

            echo '</tr></tbody>';

        }else { 
            echo '<tfoot><tr><td colspan="10" class="text-center">No Results Found</td></tr></tfoot>'; 
        }
        echo '</table>
        <div class="pagination-container">
        <nav>
          <ul class="pagination">
            
            <li data-page="prev" >
                <span> << <span class="sr-only">(current)</span></span></li>
    
          <li data-page="next" id="prev">
                  <span> >> <span class="sr-only">(current)</span></span>
            </li>
          </ul>
        </nav>
      </div>';
    }          

    public function GetOtAppHistory(){
        global $connL;

        echo '
        <div class="form-row">  
                    <div class="col-lg-1">
                        <select class="form-select" name="state" id="maxRows">
                             <option value="5000">ALL</option>
                             <option value="5">5</option>
                             <option value="10">10</option>
                             <option value="15">15</option>
                             <option value="20">20</option>
                             <option value="50">50</option>
                             <option value="70">70</option>
                             <option value="100">100</option>
                        </select> 
                </div>         
                <div class="col-lg-8">
                </div>                               
                <div class="col-lg-3">        
                    <input type="text" id="myInput" class="form-control" onkeyup="myFunction()" placeholder="Search for overtime.." title="Type in overtime details"> 
                        </div>                     
                </div>         
        <table id="otList" class="table table-striped table-sm">
        <thead>
            <tr>
                <th>OT Date</th>
                <th>OT Type</th>
                <th>Time-In</th>
                <th>Time-Out</th>
                <th>Plan OT (Hrs)</th>
                <th>Rendered OT (Hrs)</th>
                <th>Remarks</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>';

        $query = "SELECT (CASE when status = 1 then 'PENDING'
                    when   status = 2 then 'APPROVED'
                    when   status = 3 then 'REJECTED'
                    when   status = 4 then 'CANCELLED' ELSE 'N/A' END) as stats,* FROM dbo.tr_overtime where emp_code = :emp_code ORDER BY ot_date DESC";
        $param = array(':emp_code' => $this->employeeCode);
        $stmt =$connL->prepare($query);
        $stmt->execute($param);
        $result = $stmt->fetch();

        if($result){
            do { 
                $otdate = "'".date('m-d-Y', strtotime($result['ot_date']))."'";
                $ottype = "'".(isset($result['ot_type']) ? $result['ot_type'] : 'n/a')."'";
                $otstartdtime = "'".date('h:i A', strtotime($result['ot_start_dtime']))."'";
                $otenddtime = "'".date('h:i A', strtotime($result['ot_end_dtime']))."'";
                $remark = "'".(isset($result['remarks']) ? $result['remarks'] : 'n/a')."'";
                $otreqhrs = "'".$result['ot_req_hrs']."'";
                $otrenhrs = "'".$result['ot_ren_hrs']."'";
                $rejectreason = "'".(isset($result['reject_reason']) ? $result['reject_reason'] : 'n/a')."'";
                $stats = "'".$result['stats']."'";
                $otid = "'".$result['rowid']."'";
                $empcode = "'".$result['emp_code']."'";
                echo '
                <tr>
                <td>' . date('F d, Y', strtotime($result['ot_date'])) . '</td>
                <td>' . $result['ot_type'] . '</td>
                <td>' . date('h:i A', strtotime($result['ot_start_dtime'])) . '</td>
                <td>' . date('h:i A', strtotime($result['ot_end_dtime'])) . '</td>
                <td>' . round($result['ot_req_hrs'],2) . '</td> 
                <td>' . round($result['ot_ren_hrs'],2) . '</td>
                <td>' . $result['remarks'] . '</td>
                <td id="st'.$result['rowid'].'">' . $result['stats'] . '</td>';
                if($result['stats'] == 'PENDING' || $result['stats'] == 'APPROVED'){
                echo'
                <td><button type="button" class="hactv" onclick="viewOtModal('.$otdate.','.$ottype.','.$otstartdtime.','.$otenddtime.','.$remark.','.$otreqhrs.','.$otrenhrs.','.$rejectreason.','.$stats.')" title="View Overtime">
                                <i class="fas fa-binoculars"></i>
                            </button>
                            <button type="button" class="hdeactv" onclick="viewOtHistoryModal('.$otid.')" title="View Logs">
                                <i class="fas fa-history"></i>
                            </button>                           
                            <button type="button" id="clv" class="voidBut" onclick="cancelOvertime('.$otid.','.$empcode.')" title="Cancel Overtime">
                                <i class="fas fa-ban"></i>
                            </button>
                            </td>';
                }else{
                echo'
                <td><button type="button" class="hactv" onclick="viewOtModal('.$otdate.','.$ottype.','.$otstartdtime.','.$otenddtime.','.$remark.','.$otreqhrs.','.$otrenhrs.','.$rejectreason.','.$stats.')" title="View Overtime">
                                <i class="fas fa-binoculars"></i>
                            </button>
                            <button type="button" class="hdeactv" onclick="viewOtHistoryModal('.$otid.')" title="View Logs">
                                <i class="fas fa-history"></i>
                            </button>                        
                            </td>';
                }

            } while ($result = $stmt->fetch());

            echo '</tr></tbody>';

        }else { 
            echo '<tfoot><tr><td colspan="10" class="text-center">No Results Found</td></tr></tfoot>'; 
        }
        echo '</table>
        <div class="pagination-container">
        <nav>
          <ul class="pagination">
            
            <li data-page="prev" >
                <span> << <span class="sr-only">(current)</span></span></li>
    
          <li data-page="next" id="prev">
                  <span> >> <span class="sr-only">(current)</span></span>
            </li>
          </ul>
        </nav>
      </div>';
    }

    public function InsertAppliedOtApp($empCode,$empReportingTo,$otDate,$otStartDtime,$otEndDtime,$remarks,$e_req,$n_req,$e_appr,$n_appr){

        global $connL;

        $otsd_d = date('Y-m-d H:i:s', strtotime($otStartDtime));
        $otend_d = date('Y-m-d H:i:s', strtotime($otEndDtime));
        $otsd = strtotime($otStartDtime);
        $otend = strtotime($otEndDtime);
        $total = round(($otend - $otsd)/3600,2);

        $query = "INSERT INTO tr_overtime (emp_code,ot_date,datefiled,reporting_to,ot_start_dtime,ot_end_dtime,ot_req_hrs,remarks,audituser, auditdate) 
            VALUES(:emp_code,:otDate,:datefiled,:empReportingTo,:otStartDtime,:otEndDtime,:otReqHrs, :remarks,:audituser,:auditdate) ";

            $stmt =$connL->prepare($query);

            $param = array(
                ":emp_code"=> $empCode,
                ":otDate" => $otDate,
                ":datefiled"=>date('m-d-Y'),
                ":empReportingTo" => $empReportingTo,
                ":otStartDtime" => $otsd_d,
                ":otEndDtime"=> $otend_d,
                ":otReqHrs"=> $total,
                ":remarks"=> $remarks,
                ":audituser" => $empCode,
                ":auditdate"=>date('m-d-Y H:i:s')
            );

        $result = $stmt->execute($param);

        echo $result;


            $squery = "SELECT lastname+', '+firstname as [fullname] FROM employee_profile WHERE emp_code = :empCode";
            $sparam = array(':empCode' => $empCode);
            $sstmt =$connL->prepare($squery);
            $sstmt->execute($sparam);
            $sresult = $sstmt->fetch();
            $sname = $sresult['fullname'];

            $qry = 'SELECT max(rowid) as maxid FROM tr_overtime WHERE emp_code = :emp_code';
            $prm = array(":emp_code" => $empCode);
            $stm =$connL->prepare($qry);
            $stm->execute($prm);
            $rst = $stm->fetch();

            $querys = "INSERT INTO logs_ot (ot_id,emp_code,emp_name,remarks,audituser,auditdate) 
                VALUES(:ot_id,:emp_code,:emp_name,:remarks,:audituser,:auditdate) ";
    
                $stmts =$connL->prepare($querys);
    
                $params = array(
                    ":ot_id" => $rst['maxid'],
                    ":emp_code"=> $empCode,
                    ":emp_name"=> $sname,
                    ":remarks" => 'Apply OT for '.$otDate,
                    ":audituser" => $empCode,
                    ":auditdate"=>date('m-d-Y H:i:s')
                );

            $results = $stmts->execute($params);

            echo $results;

        $query_pay = $connL->prepare('EXEC hrissys_test.dbo.GenerateOTType :ot_date');
        $query_pay->bindValue(':ot_date',$otDate);
        $query_pay->execute();

        $erequester = $e_req;
        $nrequester = $n_req;
        $eapprover = $e_appr;
        $napprover = $n_appr;

        $mail = new PHPMailer(true);
        try {
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;      
        $mail->isSMTP();                                           
        $mail->Host       = 'mail.obanana.com'; 
        $mail->SMTPAuth   = true;                                   
        $mail->Username   = 'hris-support@obanana.com';        
        $mail->Password   = '@dmin123@dmin123';                              
        $mail->SMTPSecure = 'tls';            
        $mail->Port       = 587;                                   

        $mail->setFrom('hris-support@obanana.com','HRIS-NOREPLY');
        $mail->addAddress($eapprover,'Approver');    

        $mail->isHTML(true);                          
        $mail->Subject = 'Overtime Request Sent to Approver: ';
        $mail->Body    = '<h1>Hi '.$napprover.' </b>,</h1>An employee has requested a overtime(#'.$rst['maxid'].').<br><br>
                        <h2>From: '.$nrequester.' <br><br></h2>
                        <h2>Check the request in :
                        <a href="http://124.6.185.87:6868/overtime/overtime-approval-view.php">Overtime Approval List</a> 
                        <br><br></h2>

                        Thank you for using our application! <br>
                        Regards, <br>
                        Human Resource Information System <br> <br>

                        <h6>If you are having trouble clicking the "Overtime Approval List" button, copy and paste the URL below into your web browser: http://124.6.185.87:6868/overtime/overtime-approval-view.php <h6>
                       ';
            $mail->send();
            // echo 'Message has been sent';
            } catch (Exception $e) {
            // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }            

    }

}

?>