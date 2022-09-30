<?php  

 function GetNhaProfile($lvlogid){
        
        global $connL;

        echo '
        <table id="EmployeProfileList" class="table2">
        <thead>
            <tr>
                <th class="thw wa" colspan="5" >I. Personal Background</th>
                
            </tr>
        </thead>
        <tbody>';

        $query = "SELECT a.emp_code as emp_code,* from dbo.employee_profile a left join 
        employee_salary_management b on a.emp_code = b.emp_code
        where a.emp_code = :lvlogid ";
        $param = array(':lvlogid' => $lvlogid);
        $stmt =$connL->prepare($query);
        $stmt->execute($param);
        $result = $stmt->fetch();

        if($result){
            do { 
                $birthDate = $result['birthdate'];
                $fbirthDate = $result['fatherbirthdate'];
                $mbirthDate = $result['motherbirthdate'];
                $currentDate = date("Y-m-d");
                $age = date_diff(date_create($birthDate), date_create($currentDate));
                $fage = date_diff(date_create($fbirthDate), date_create($currentDate));
                $mage = date_diff(date_create($mbirthDate), date_create($currentDate));
                $fage_fin = ($result['fatherbirthdate'] <> '1900-01-01' ? $fage->format("%y") : 'n/a');
                $mage_fin = ($result['motherbirthdate'] <> '1900-01-01' ? $mage->format("%y") : 'n/a');
                $emp_code = "'".$result['emp_code']."'";

                echo '
                <tr><th class="thw" colspan="5">&nbsp;</th></tr> 
                <tr><th class="thw" >Last Name:</th>
                <td colspan="5">' . $result['lastname'] . '</td></tr>
                <tr><th class="thw" >First Name:</th>
                <td colspan="5">' . $result['firstname'] . '</td></tr>   
                <tr><th class="thw" >Middle Name:</th>
                <td colspan="5">' . $result['middlename'] . '</td></tr>
                <tr><th class="thw" >Present Address:</th>
                <td colspan="5">' . $result['emp_address'] . '</td></tr>
                <tr><th class="thw" >Permanent Address:</th>
                <td colspan="5">' . $result['emp_address2'] . '</td></tr>
                <tr><th class="thw" rowspan="2" >Contact No. :</th>
                <td >' . $result['celno'] . '</td>
                <td class="thw"rowspan="2">Email Address:</td>
                <td colspan ="2">'.((isset($result['emailaddress'])) ? $result['emailaddress'] : 'no email found').'</td>
                </tr> 
                <tr><td>' . $result['celno1'] . '</td>
                <td colspan ="2">'.((isset($result['emailaddress1'])) ? $result['emailaddress1'] : 'no email found').'</td></tr>
                <tr><th class="thw">Birthday:</th>
                <td >' . date('F d, Y', strtotime($birthDate)) . '</td>
                <td class="thw">Age:</td>
                <td colspan ="2">'.$age->format("%y").'</td></tr>
                <tr><th class="thw">Birthplace:</th>
                <td >' . $result['birthplace'] . '</td>
                <td class="thw">Sex:</td>
                <td colspan ="2">' . $result['sex'] . '</td></tr>
                <tr><th class="thw">SSS No:</th>
                <td >' . $result['sss_no'] . '</td>
                <td class="thw">Civil Status:</td>
                <td colspan ="2">' . $result['marital_status'] . '</td></tr>
                <tr><th class="thw">Philhealth No: </th>
                <td >' . $result['phil_no'] . '</td>
                <td class="thw"> Height: </td>
                <td colspan ="2">' . $result['height'] . '</td></tr>                
                <tr><th class="thw">Pag-IBIG No:</th>
                <td >' . $result['pagibig_no'] . '</td>
                <td class="thw">Weight: </td>
                <td colspan ="2">' . $result['weight'] . '</td></tr>                
                <tr><th class="thw">TIN No: </th>
                <td >' . $result['tin_no'] . '</td>
                <td class="thw"> Blood Type: </td>
                <td colspan ="2">' . $result['bloodtype'] . '</td></tr>
                <tr><th class="thw">Professional License No:</th>
                <td style="width: 25%;">' . $result['driver_lic'] . '</td>
                <td class="thw">Non-Professional License No:</td>
                <td colspan ="2">' . $result['non_driver_lic'] . '</td></tr>
                <tr><th class="thw">Expiry Date:</th>
                <td >' . ($result['expirydate'] <> '1900-01-01' ? $result['expirydate'] : 'n/a') . '</td>
                <td class="thw">Expiry Date:</td>
                <td colspan ="2">' . ($result['expirydate_non'] <> '1900-01-01' ? $result['expirydate_non'] : 'n/a') . '</td></tr>
                <tr><th class="thw">Date Hired:</th>
                <td >' . ($result['datehired'] <> '1900-01-01' ? date('F d, Y', strtotime($result['datehired'])) : 'n/a') . '</td>            
                </tr> ';

                // // allowances <tr><th class="thw" colspan="5">Allowances:</th></tr>                
                // $queryz = "SELECT b.benefit_name,a.amount from dbo.employee_allowances_management a left join 
                // dbo.mf_benefits b on a.benefit_id = b.rowid
                // where emp_code = ".$emp_code."";
                // $stmtz =$connL->prepare($queryz);
                // $stmtz->execute();
                // $resultz = $stmtz->fetch();
                // $dataz = array();
                
                // if($resultz){
                //     echo'
                //     <tr><th class="thw" colspan="5">&nbsp;</th></tr>
                //     <tr><th colspan="3">Allowance Name:</th><th colspan="2">Amount:</th></tr>';
                // do { 
                //     array_push($dataz,$resultz['amount']);
                //     $amtalw = $resultz['amount'];
                //     array_push($dataz,$resultz['benefit_name']);
                //     $nmealw = $resultz['benefit_name'];                  

                //  echo'
                // <tr><td colspan="3">'.$nmealw.'</td><td colspan="2">'.$amtalw.'</td></tr>';
                    
                // }
                // while ($resultz = $stmtz->fetch());

                // }else{
                //     echo '<tr><td colspan="5" class="thc">-- No Data Found --</td></tr>';
                // } 


                echo'
                <tr><th class="thw" colspan="5">&nbsp;</th></tr> 
                <tr><th class="thw" colspan="5">II. Family Background:</th></tr>
                <tr><th class="thw" colspan="5">&nbsp;</th></tr>
                <tr><th class="thw">Name of Spouse (if married):</th>
                <td colspan="4">' . $result['spousename'] . '</td></tr>
                <tr><th class="thw">Date of Marriage  (if married):</th>
                <td colspan="4">' . $result['marriagedate'] . '</td></tr> 
                <tr><th class="thw">Birthday:</th>
                <td >' . ($result['spousebirthdate'] <> ('1900-01-01'|| '') ? $result['spousebirthdate'] : 'n/a') . '</td>
                <td class="thw">SSS No.:</td>
                <td colspan="2">' . $result['spousesssno']. '</td></tr>
                <tr><th class="thw">Occupation:</th>
                <td >' . $result['spouseoccupation'] . '</td>
                <td class="thw">TIN No.:</td>
                <td  colspan="2">' . $result['spousetinno']. '</td></tr>
                <tr><th class="thw" colspan="3">Name of Children:</th>
                <th class="thw" colspan="2">Birthday of Children:</th></tr>';

                // dependents
                $queryd = "SELECT depname,depbirthdate from dbo.employee_dependents
                where emp_code = ".$emp_code."";
                $stmtd =$connL->prepare($queryd);
                $stmtd->execute();
                $resultd = $stmtd->fetch();
                $data = array();
                
                if($resultd){
                do { 
                    array_push($data,$resultd['depname']);
                    $dpname = $resultd['depname'];

                    array_push($data,$resultd['depbirthdate']);
                    $dpbdate = $resultd['depbirthdate'];
                 echo'<tr>
                <td colspan="3">'.$dpname.'</td>
                <td colspan="2">'.date('F d, Y', strtotime($dpbdate)).'</td></tr>';
                    
                }
                while ($resultd = $stmtd->fetch());

                }else{
                    echo '<tr><td colspan="2">n/a</td><td colspan="2">n/a</td></tr>';
                }

                echo'<tr><th colspan="5"></th</tr>
                     <tr><th class="thw" colspan="5">Name of Parents:</th></tr>
                     <tr><th class="atlef">Father:</th><td>' . $result['fathername'] . '</td>
                         <th class="atlef">Age:</th><td colspan="2">' .$fage_fin. '</td></tr>
                     <tr><th class="atlef">Mother:</th><td>' . $result['mothername'] . '</td>
                         <th class="atlef">Age:</th><td colspan="5">' .$mage_fin. '</td></tr>
                    <tr><th class="atlef">Address:</th><td colspan="4">' . $result['parentsaddress'] . '</td></tr>
                    <tr><th class="thw" colspan="5">&nbsp;</th></tr> 
                <tr><th class="thw" colspan="5">III. Educational Attainment:</th></tr>';


                // education
                $queryr = "SELECT * from dbo.employee_educations
                where emp_code = ".$emp_code."";
                $stmtr =$connL->prepare($queryr);
                $stmtr->execute();
                $resultr = $stmtr->fetch();
                $datar = array();
                
                if($resultr){
                    echo'
                    <tr><th class="thw" colspan="5">&nbsp;</th></tr>
                    <tr><th>School Name:</th><th>Date From - To:</th><th>Course:</th><th colspan="2">Degree:</th></tr>';
                do { 
                    array_push($datar,$resultr['schoolname']);
                    $schlname = $resultr['schoolname'];
                    array_push($datar,$resultr['schoolfrom']);
                    $schlfr = $resultr['schoolfrom'];
                    array_push($datar,$resultr['schoolto']);
                    $schlt = $resultr['schoolto'];
                    array_push($datar,$resultr['coursename']);
                    $schlcr = $resultr['coursename'];
                    array_push($datar,$resultr['certificatedegree']);
                    $schlcd = $resultr['certificatedegree'];                    

                 echo'
                <tr><td>'.$schlname.'</td><td>'.$schlfr.' to '.$schlt.'</td><td>'.$schlcr.'</td><td colspan="2">'.$schlcd.'</td></tr>';
                    
                }
                while ($resultr = $stmtr->fetch());

                }else{
                    echo '<tr><td colspan="5" class="thc">-- No Data Found --</td></tr>';
                } 


                echo'<tr><th class="thw" colspan="5">&nbsp;</th></tr> 
                <tr><th class="thw" colspan="5">IV. Employment History:</th></tr>';

                        // employment
                        $queryp = "SELECT * from dbo.employee_employments
                        where emp_code = ".$emp_code."";
                        $stmtp =$connL->prepare($queryp);
                        $stmtp->execute();
                        $resultp = $stmtp->fetch();
                        $datap = array();
                        
                        if($resultp){
                        echo'<tr><th class="thw" colspan="5">&nbsp;</th></tr>
                            <tr><th>Name of Employer:</th><th>From - To:</th><th>Position:</th><th>Last Salary:</th><th>Reason of Leaving:</th></tr>';                    
                        do { 
                            array_push($datap,$resultp['employername']);
                            $emprnme = $resultp['employername'];

                            array_push($datap,$resultp['jobfrom']);
                            $jfrm = $resultp['jobfrom'];

                            array_push($datap,$resultp['jobto']);
                            $jto= $resultp['jobto'];   

                            array_push($datap,$resultp['mostrecentposition']);
                            $mspstn= $resultp['mostrecentposition'];

                            array_push($datap,$resultp['lastsalary']);
                            $lsal= $resultp['lastsalary'];   

                            array_push($data,$resultp['reasonforleaving']);
                            $rforl= $resultp['reasonforleaving'];

                             echo'<tr>
                                <td>'.$emprnme.'</td>
                                <td>'.$jfrm.' to '.$jto.'</td>
                                <td>'.$mspstn.'</td>
                                <td>₱ '.number_format($lsal,2,'.',',').'</td>
                                <td>'.$rforl.'</td>
                                </tr>';
                            
                        }
                        while ($resultp = $stmtp->fetch());

                        }else{
                             echo '<tr><td colspan="5" class="thc">-- No Data Found --</td></tr>';
                        }                               


            } while ($result = $stmt->fetch());

            echo '</tbody>';

        }else { 
            echo '<tfoot><tr><td colspan="3" class="text-center">No Results Found</td></tr></tfoot>'; 
        }
        echo '</table>';
    } 

?>