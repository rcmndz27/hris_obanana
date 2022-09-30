<?php

            date_default_timezone_set('Asia/Manila');

Class DeductionList{

    public function GetAllDeductionList(){
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
                    <input type="text" id="myInput" class="form-control" onkeyup="myFunction()" placeholder="Search for employee deduction.." title="Type in employee details"> 
                        </div>                     
                </div>         
        <table id="allDeductionList" class="table table-striped table-sm">
        <thead>
            <tr>
                <th>Employee Code</th>
                <th>Employee Name</th>
                <th>Deduction Name</th>
                <th>Period Cutoff</th>
                <th>Deduction Amount</th>
                <th>Effectivity Date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>';

        $query = "SELECT a.deduction_emp_id,c.firstname+' '+c.lastname as [fullname],a.emp_code,b.deduction_name,b.rowid,a.period_cutoff,a.amount,a.effectivity_date,a.status from dbo.employee_deduction_management a left join dbo.mf_deductions b on a.deduction_id = b.rowid left join employee_profile c  on a.emp_code = c.emp_code ORDER by a.deduction_emp_id DESC ";
        $stmt =$connL->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch();


        if($result){
            do { 
                $empcd = "'".$result['emp_code']."'";
                $dedcid = "'".$result['deduction_emp_id']."'";
                $flname = "'".$result['fullname']."'";
             
                echo '
                <tr>
                <td>' . $result['emp_code']. '</td>
                <td>' . $result['fullname']. '</td>
                <td id="dn'.$result['deduction_emp_id'].'">' . $result['deduction_name']. '</td>
                <td id="dnr'.$result['deduction_emp_id'].'" hidden>' . $result['rowid']. '</td>
                <td id="pc'.$result['deduction_emp_id'].'">' . $result['period_cutoff']. '</td>
                <td id="am'.$result['deduction_emp_id'].'" hidden>'.round($result['amount'],3).'</td>
                <td id="amtn'.$result['deduction_emp_id'].'">₱ ' . number_format($result['amount'],2,'.',',').'</td>
                <td id="ed'.$result['deduction_emp_id'].'">' . date('Y-m-d', strtotime($result['effectivity_date'])) . '</td>
                <td id="st'.$result['deduction_emp_id'].'">' . $result['status']. '</td>';
                echo'<td><button type="button" class="btn btn-info btn-sm" onclick="editDedModal('.$empcd.','.$dedcid.','.$flname.')" title="Update Deduction">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button type="button" class="btn btn-danger btn-sm" onclick="viewDedLogs('.$empcd.')" title="Deduction  Logs">
                                <i class="fas fa-history"></i>
                            </button>                            
                            </td>';
                
                

            } while ($result = $stmt->fetch());

            echo '</tr></tbody>';

        }else { 
            echo '<tfoot><tr><td colspan="6" class="text-center">No Results Found</td></tr></tfoot>'; 
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
      </div>         ';
    }


}

?>

