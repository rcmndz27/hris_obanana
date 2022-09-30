<?php  

 function GetAuditPayAttViewLogs($emp_code,$dateFrom,$dateTo){
        
        global $connL;

        echo '
        <table id="AuditPayAttViewLogs" class="table table-striped table2">
        <thead>
            <tr>
                <th colspan="11" class ="text-center">Attendance Audit Logs</th>
            </tr>
            <tr>
                <th>Emp Code</th>
                <th>Emp Name</th>
                <th>Period From</th>
                <th>Period To</th>
                <th>Column Type</th>
                <th>Old Data</th>
                <th>New Data</th>
                <th>Action</th>
                <th>Remarks</th>
                <th>Audit Name</th>
                <th>Audit Date</th>
            </tr>
        </thead>
        <tbody>';

        $query = "SELECT a.emp_code,a.emp_name,a.pay_from,a.pay_to,a.column_name,a.old_data,a.new_data,a.action,a.remarks,a.audituser,a.auditdate FROM dbo.logs_payroll a 
        left join employee_profile b on a.audituser = b.emp_code 
        where badge_no = :emp_code  and  pay_from = :pay_from and pay_to = :pay_to
        ORDER BY auditdate ASC";
        $param = array(':emp_code' => $emp_code,':pay_from' => $dateFrom,':pay_to' => $dateTo);
        $stmt =$connL->prepare($query);
        $stmt->execute($param);
        $result = $stmt->fetch();

        if($result){
            do { 

                echo '
                <tr>
                <td>' . $result['emp_code'] . '</td>
                <td>' . $result['emp_name'] . '</td>
                <td>' . date('m-d-Y', strtotime($result['pay_from'])) . '</td>
                <td>' . date('m-d-Y', strtotime($result['pay_to'])) . '</td>
                <td>' . $result['column_name'] . '</td>
                <td>' . $result['old_data'] . '</td>
                <td>' . $result['new_data'] . '</td>
                <td>' . $result['action'] . '</td>
                <td>' . $result['remarks'] . '</td>
                <td>' . $result['audituser'] . '</td>
                <td>' . date('m-d-Y', strtotime($result['auditdate'])) . '</td>';

            } while ($result = $stmt->fetch());

            echo '</tr></tbody>';

        }else { 
            echo '<tfoot><tr><td colspan="11" class="text-center">No Results Found</td></tr></tfoot>'; 
        }
        echo '</table>';
    } 

?>