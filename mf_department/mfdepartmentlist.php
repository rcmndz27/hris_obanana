<?php

Class MfdepartmentList{

    public function GetAllMfdepartmentList(){
        global $connL;

        echo '<div class="form-row">  
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
                    <input type="text" id="myInput" class="form-control" onkeyup="myFunction()" placeholder="Department Name.." title="Type in department name"> 
                        </div>                     
                </div>  
                                     
        <table id="allMfdepartmentList" class="table table-striped table-sm">
        <thead>
            <tr>
                <th>Department Code</th>
                <th>Department Name</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>';

        $query = "SELECT * from dbo.mf_dept ORDER BY rowid asc";
        $stmt =$connL->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch();


        if($result){
            do { 
                $rowd = "'".$result['rowid']."'";
                $cde = "'".$result['code']."'";
                echo '
                <tr>
                <td id="dc'.$result['rowid'].'">' . $result['code']. '</td>
                <td id="dn'.$result['rowid'].'">' . $result['descs']. '</td>
                <td id="st'.$result['rowid'].'">' . $result['status']. '</td>';
                echo'<td><button type="button" class="btn btn-info" 
                onclick="editMfdepartmentModal('.$rowd.','.$cde.')">
                                <i class="fas fa-edit"></i> UPDATE
                            </button></td>';
                
                
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
      </div>';
    }
}

?>

