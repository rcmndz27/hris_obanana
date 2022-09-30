<?php  

 function GetOtLogs($lvlogid){
        
        global $connL;

        echo '
        <table id="OtLogsList" class="table table-striped">
        <thead>
            <tr>
                <th colspan="4" class ="text-center">Overtime Logs</th>
            </tr>
            <tr>
                <th>Remarks</th>
                <th>User Name</th>
                <th>User Code</th>
                <th>Logs Date</th>
            </tr>
        </thead>
        <tbody>';

        $query = "SELECT * FROM dbo.logs_ot where ot_id = :lvlogid ORDER BY auditdate ASC";
        $param = array(':lvlogid' => $lvlogid);
        $stmt =$connL->prepare($query);
        $stmt->execute($param);
        $result = $stmt->fetch();

        if($result){
            do { 

                echo '
                <tr>
                <td>' . $result['remarks'] . '</td>
                <td>' . $result['emp_name'] . '</td>
                <td>' . $result['audituser'] . '</td>
                <td>' . date('m-d-Y h:i A', strtotime($result['auditdate'])) . '</td>';

            } while ($result = $stmt->fetch());

            echo '</tr></tbody>';

        }else { 
            echo '<tfoot><tr><td colspan="3" class="text-center">No Results Found</td></tr></tfoot>'; 
        }
        echo '</table>';
    } 

?>