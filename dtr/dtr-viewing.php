<?php

include('../config/db.php');

Class EmployeeAttendance{

    function GetTime($dateTime){
        $formattedDateTime = new DateTime($dateTime);
        $time = $formattedDateTime->format('h:i:s A');

        return $time;
    }

    function GetEmployeeAttendannce($empCodeParam, $dateFrom, $dateTo){

        $totalWork = 0;
        $totalLate = 0;
        $totalUndertime = 0;
        $totalOvertime = 0;

        global $connL;

        if($empCodeParam == 'All')
        {


                $param = array(":startDate" => $dateFrom, ":endDate" => $dateTo );
                $query = 'EXEC hrissys_test.dbo.xp_all_attendance_portal :startDate,:endDate';
                $stmt =$connL->prepare($query);
                $stmt->execute($param);
                $result = $stmt->fetch();
        }else{


                $param = array(":emp_ssn" => $empCodeParam, ":startDate" => $dateFrom, ":endDate" => $dateTo );
                $query = 'EXEC hrissys_test.dbo.xp_attendance_portal :emp_ssn,:startDate,:endDate';
                $stmt =$connL->prepare($query);
                $stmt->execute($param);
                $result = $stmt->fetch();
        }                

        echo "
        <button id='btnExport' onclick='exportReportToExcel(this)' class='btn btn-primary'><i class='fas fa-file-export'></i>Export</button>
        <table id='empDtrList' class='table table-striped table-sm'>
            <thead>
                <tr>
                    <th> Name</th>
                    <th>Date</th>
                    <th>Time In</th>
                    <th>Time Out</th>
                    <th>Work (Hrs)</th>
                    <th>Lates (Hrs)</th>
                    <th>Undertime (Hrs)</th>
                    <th>Overtime (Hrs)</th>
                    <th>Remarks</th>
                </tr>
            </thead>
            <tbody>";

            if($result){
                do {

                    $timeIn = (isset($result['timein']) ? $this->GetTime($result['timein']): '');
                    $timeOut = (isset($result['timeout']) ? $this->GetTime($result['timeout']) : '');

                    echo    "<tr>".
                                "<td>" . $result['name'] . "</td>".
                                "<td>" . date('F d, Y', strtotime($result['punch_date'])) . "</td>".
                                "<td>" . $timeIn . "</td>".
                                "<td>" . $timeOut . "</td>".
                                "<td>" . round($result['workhours'],2) . "</td>".
                                "<td>" . round($result['late'],2) . "</td>".
                                "<td>" . round($result['undertime'],2) . "</td>".
                                "<td>" . round($result['overtime'],2) . "</td>".
                                "<td>" . $result['remarks'] . "</td>".
                            "</tr>";

                    $totalWork += $result['workhours'];
                    $totalLate += $result['late'];
                    $totalUndertime += $result['undertime'];
                    $totalOvertime += $result['overtime'];        

                } while ($result = $stmt->fetch()); 	
            }

        echo"
            </tbody>
            <tfoot>
                <tr>".
                    "<td colspan='4' class='text-right bg-success'><b>Total</b></td>".
                    "<td class='bg-success'><b>" . $totalWork . "</b></td>".
                    "<td class='bg-success'><b>" . $totalLate . "</b></td>".
                    "<td class='bg-success'><b>" . $totalUndertime . "</b></td>".
                    "<td class='bg-success'><b>" . $totalOvertime . "</b></td>".
                    "<td class='bg-success'><b></b></td>".
                "</tr>
            </tfoot>
        </table>";
    }
}

?>