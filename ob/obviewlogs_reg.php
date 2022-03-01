<?php  

 function GetObLogs($lvlogid){
        
        global $connL;

        echo '
        <table id="ObLogsList" class="table table-striped">
        <thead>
            <tr>
                <th colspan="3" class ="text-center">Official Business Logs</th>
            </tr>
            <tr>
                <th>Remarks</th>
                <th>Logs User</th>
                <th>Logs Date</th>
            </tr>
        </thead>
        <tbody>';

        $query = "SELECT * FROM dbo.logs_ob where ob_id = :lvlogid ORDER BY auditdate ASC";
        $param = array(':lvlogid' => $lvlogid);
        $stmt =$connL->prepare($query);
        $stmt->execute($param);
        $result = $stmt->fetch();

        if($result){
            do { 

                echo '
                <tr>
                <td>' . $result['remarks'] . '</td>
                <td>' . $result['audituser'] . '</td>
                <td>' . date('m-d-Y', strtotime($result['auditdate'])) . '</td>';

            } while ($result = $stmt->fetch());

            echo '</tr></tbody>';

        }else { 
            echo '<tfoot><tr><td colspan="3" class="text-center">No Results Found</td></tr></tfoot>'; 
        }
        echo '</table>';
    } 

?>