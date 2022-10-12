<?php

Class LoansList{

    public function GetAllLoansList(){
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
                    <input type="text" id="myInput" class="form-control" onkeyup="myFunction()" placeholder="Search for employee loan.." title="Type in employee details"> 
                        </div>                     
                </div> 

        <table id="allloansList" class="table table-striped table-sm">
        <thead>

            <tr>
                <th>Employee Code</th>
                <th>Employee Name</th>
                <th>Loan Name</th>
                <th>Loan Amount</th>
                <th>Loan Balance</th>
                <th>Loan Total Payment</th>
                <th>Loan Monthly Amortization</th>
                <th>Loan Date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>';

        $query = "SELECT a.loan_id,c.firstname+' '+c.lastname as [fullname],a.emp_code,b.deduction_name as loan_name,b.rowid,a.loan_amount,a.loan_balance,a.loan_totpymt,a.loan_amort,a.loan_date,a.status from dbo.employee_loans_management a left join dbo.mf_deductions b on a.loandec_id = b.rowid left join employee_profile c  on a.emp_code = c.emp_code ORDER by a.loan_id DESC";
        $stmt =$connL->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch();
        

        if($result){
            do { 
                $empcd = "'".$result['emp_code']."'";
                $lnid = "'".$result['loan_id']."'";
                $flname = "'".$result['fullname']."'";             
                 
    echo '
    <tr>
    <td>' . $result['emp_code']. '</td>
    <td>' . $result['fullname']. '</td>
    <td id="ln'.$result['loan_id'].'">' . $result['loan_name']. '</td>
    <td id="lnh'.$result['loan_id'].'" hidden>' . $result['rowid']. '</td>                
    <td id="lah'.$result['loan_id'].'" hidden>'.round($result['loan_amount'],3).'</td>
    <td id="la'.$result['loan_id'].'">₱ '. number_format($result['loan_amount'],2,'.',',').'</td>
    <td id="lbh'.$result['loan_id'].'" hidden>'.round($result['loan_balance'],3).'</td>
    <td id="lb'.$result['loan_id'].'">₱ '. number_format($result['loan_balance'],2,'.',',').'</td> 
    <td id="ltph'.$result['loan_id'].'" hidden>'.round($result['loan_totpymt'],3).'</td>
    <td id="ltp'.$result['loan_id'].'">₱ '. number_format($result['loan_totpymt'],2,'.',',').'</td> 
    <td id="lamh'.$result['loan_id'].'" hidden>'.round($result['loan_amort'],3).'</td>
    <td id="lam'.$result['loan_id'].'">₱ '. number_format($result['loan_amort'],2,'.',',').'</td>            
    <td id="ldt'.$result['loan_id'].'">' . date('Y-m-d', strtotime($result['loan_date'])) . '</td>
    <td id="st'.$result['loan_id'].'">' . $result['status']. '</td>';
    echo'<td><button type="button" class="btn btn-info btn-sm btn-sm" onclick="editLnModal('.$empcd.','.$lnid.','.$flname.')">
                    <i class="fas fa-edit"></i>
                </button>
                <button type="button" class="btn btn-danger btn-sm" onclick="viewLnLogs('.$empcd.','.$lnid.')" title="Loans Logs">
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
      </div>        ';
    }


}

?>

