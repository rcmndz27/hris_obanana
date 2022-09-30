<?php

    function ShowAllPayroll()
    {
        global $connL;

        $ct = $connL->prepare(@"SELECT COUNT(*) FROM dbo.payroll");
        $ct->execute();

        echo "
            <table id='list' class='table table-striped table-sm'>
                <thead>
                    <tr>
                        <th>Company</th>
                        <th>Location</th>
                        <th>Date From</th>
                        <th>Date To</th>
                        <th>Total Netpay</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>";

        if ($ct->fetchColumn() >= 1)
        {


            $cmd = $connL->prepare(@"SELECT company,location,date_from,date_to,payroll_status,sum(netpay) as net_pay from payroll where payroll_status = 'N'
                group by company,location,date_from,date_to,payroll_status ");
            $cmd->execute();

            while ($r = $cmd->fetch(PDO::FETCH_ASSOC))
            {   
                $rnd = round($r['net_pay'],2) ;
                $netpy = number_format($rnd, 2,'.',',');
                $datefrom = "'".date('Y-m-d', strtotime($r['date_from']))."'";  
                $dateto = "'".date('Y-m-d', strtotime($r['date_to']))."'";
                $stats = "'".ucfirst($r['payroll_status'])."'";  
                echo "<tr>
                        <td>" . $r['company'] ."</td>
                        <td>" . $r['location'] ."</td>
                        <td>" . date("F d, Y", strtotime($r['date_from'])) ."</td>
                        <td>" . date("F d, Y", strtotime($r['date_to'])) ."</td>
                        <td>" . '&#8369; '. $netpy ."</td>
                        <td>";               

                    if($r["payroll_status"] == 'N'){
                        // echo "<button class='btn btn-success btn-sm'  onclick='ApprovePayroll()' title='Approve Payroll'><i class='fas fa-check'></i></button>";
                        // echo "<button class='btn btn-danger btn-sm'  onclick='RejectPayroll()' title='Reject Payroll'><i class='fas fa-times'></i></button>";
                        echo'<button title="View Payroll Register" type="button" class="vwPyReg" onclick="ViewPyReg('.$datefrom.','. $dateto.','.$stats.')"><i class="fas fa-search-dollar"></i></button>';                        
                    }else if($r["payroll_status"] == 'A'){
                        echo "<p style='color:green; font-weight:bold; vertical-align:middle; display:inline;'>APPROVED</p>";
                    }else{
                        echo "<p style='color:red; font-weight:bold; vertical-align:middle; display:inline;'>REJECTED</p>";

                    }      
                    echo "</td></tr>";
            }
    
          }else if($ct->fetchColumn() >= 0){ 
            
            echo '<tfoot><tr><td colspan="55" class="paytop">No Pending Approval</td></tr></tfoot>'; 

        } 
         echo"</table>";
      }; 

    function ApprovePayroll()
    {
        global $connL;

        $cmd = $connL->prepare("UPDATE dbo.payroll SET payroll_status = 'A'");
        $cmd->execute();

        echo "<span class='etcMessage'>
                <script type='text/javascript'>
                    alert('Successfully updated payroll approval list.');
                    $('etcMessage').remove();
                </script>
            </span>";
    }

    function RejectPayroll()
    {
        global $connL;

        $cmd = $connL->prepare("UPDATE dbo.payroll SET payroll_status = 'R'");
        $cmd->execute();

        echo "<span class='etcMessage'>
                <script type='text/javascript'>
                    alert('Successfully updated payroll approval list.');
                    $('etcMessage').remove();
                </script>
            </span>";
    }

?>