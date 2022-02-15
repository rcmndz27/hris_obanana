<?php
    session_start();

    if (empty($_SESSION['userid']))
    {
        echo '<script type="text/javascript">alert("Please login first!!");</script>';
        header('refresh:1;url=../index.php' );
    }
    else
    {
        include('../_header.php');
        if ($empUserType == "Admin" || $empUserType == "HR-CreateStaff")
        {
            include("../newhireaccess/newhire-access.php");
            include('../elements/DropDown.php');
            include('../controller/MasterFile.php');
            $allEmpApp = new NewHireAccess(); 
            $mf = new MasterFile();
            $dd = new DropDown();

        }
        else
        {
            header( "refresh:1;url=../index.php" );
        }

    }    
?>
<!-- <script type="text/javascript" src="../newhireaccess/newemp.js"></script> -->
<script type='text/javascript' src='../js/validator.js'></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<style type="text/css">
table,th{

                border: 1px solid #dee2e6;
                font-weight: 700;
                font-size: 14px;
 }   


table,td{

        border: 1px solid #dee2e6;
 }  

 th,td{
    border: 1px solid #dee2e6;
 }
  
table {
        border: 1px solid #dee2e6;
        color: #ffff;
        margin-bottom: 100px;
        border: 2px solid black;
        background-color: white;
        text-align: center;
        font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
}
#myInput {
  background-image: url('../img/searchicon.png');
  background-size: 30px;
  background-position: 5px 5px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;  
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}
    .bb{
        font-weight: bolder;
        text-align: center;
        font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
    }

    .bbd{
    background-color: #ffaa00;
    font-weight: bolder;
    border-color: #ffaa00;
    border-radius: 1rem;
    text-align: center;
    font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";    
    }
    .cstat {
    color: #e65a5a;
    font-size: 10px;
    text-align: center;
    margin: 0;
    padding: 5px 5px 5px 5px;
    }
    .ppclip{
        height: 50px;
        width: 50px;
        cursor: pointer;
    }
    .ppclip:hover{
        opacity: 0.5;
    }

    .bb{
        font-weight: bolder;
        text-align: center;
    }
.mbt {
    background-color: #faf9f9;
    padding: 30px;
    border-radius: 0.25rem;
}

.pad{
    padding: 5px 5px 5px 5px;
    font-weight: bolder;
}

.caps{
    text-transform: uppercase;
    font-weight: bolder;
    cursor: pointer;
    margin-bottom: 10px;
}

.addapp{
    color: #ffff;
    font-weight: bolder;
}
.req{
    color: red;
}
.sub{
    width: 200px;
    font-size: 20px;
    color: #ffff;
    font-weight: bolder;
    background-color: #ffaa00;
    border-color: #ffaa00;
    border-radius: 1rem;
}

.samea{
    width: 100px;
    height: 20px;
    padding: 1px;
    font-size: 12px;
    font-weight: bolder;
    background-color: #8b8888;
    border-color: gray;
    color: #ffff;
    border-radius: 1rem;
}

.samea:hover{
opacity: 0.5;
}

.adddep{
    background-color: #ffaa00;
    font-weight: bolder;
    border-color: #ffaa00;
    border-radius: 1rem;
    color: #ffff;
    width: 75px;
    height: 35px;
    font-size: 12px;
    padding: 2px;
}

.adddep:hover{
opacity: 0.5;
}

.addjob {
    background-color: #ffaa00;
    font-weight: bolder;
    border-color: #ffaa00;
    border-radius: 1rem;
    color: #ffff;
    width: 160px;
    height: 35px;
    font-size: 12px;
    padding: 2px;
}

.addjob:hover{
opacity: 0.5;
}


.rememp {
    width: 150px;
    font-weight: bolder;
    height: 40px;
    padding: 3px;
    font-size: 12px;
    border-radius: 1rem;
}

.rememp:hover{
opacity: 0.5;
}

.backbut{
    background-color: #fbec1e;
    border-color: #fbec1e;
    border-radius: 1rem;
    font-size: 20px;
    font-weight: bolder;
    color: #d64747;
}

.backbut:hover{
    opacity: 0.5;
}

.subbut{
    background-color: #ffaa00;
    border-color: #ffaa00;
    font-weight: bolder;
    color: #ffff;
    font-size: 20px;
    border-radius: 1rem;
}

.subbut:hover{
    opacity: 0.5;
}
</style>
<div class="container">
    <div class="section-title">
          <h1>ALL EMPLOYEE LIST</h1>
        </div>
    <div class="main-body mbt">

          <!-- Breadcrumb -->
          <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item active bb" aria-current="page"><b><i class='fas fa-users fa-fw'>
                        </i>&nbsp;ALL EMPLOYEE LIST - 201 MASTERFILE</b></li>
            </ol>
          </nav>
    <div class="pt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="panel-body">
                    <div id="tableList" class="table-responsive-sm table-body">
                        <?php $allEmpApp->GetAllEmpHistory(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="updateHireEmp" tabindex="-1" role="dialog" aria-labelledby="informationModalTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title bb" id="popUpModalTitle">UPDATE EMPLOYEE DETAILS &nbsp;<i class="fas fa-edit"></i></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times; </span>
                    </button>
                </div>
            <div class="modal-body">
                <div class="main-body">
                    <fieldset class="fieldset-border">
                            <div class="d-flex justify-content-center">
                                <legend class="fieldset-border pad">
                                </legend>
                             </div>
                            <div class="form-row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label" for="department">Employee Code:</label>
                                        <input type="text" id="rowid" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label" for="department">Employee Name:</label>
                                        <input type="text" id="empnames" class="form-control" readonly>
                                    </div>
                                </div>                                                                
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label" for="department">Department:</label>
                                        <?php $dd->GenerateDropDown("department", $mf->GetAllDepartment("alldep")); ?> 
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label"  for="position">Job Title:</label>
                                        <?php $dd->GenerateDropDown("position", $mf->GetJobPosition("jobpos")); ?>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="control-label" for="Location">Location:</label>
                                        <?php $dd->GenerateDropDown("location", $mf->GetPayLocation("locpay")); ?> 
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <label class="control-label" for="maidenname">Employee Type:</label>
                                        <?php $dd->GenerateDropDown("emp_type", $mf->GetEmpJobType("empjobtype")); ?>
                                </div>

                                <div class="col-lg-3">
                                    <label class="control-label" for="maidenname">Employee Level:</label>
                                        <?php $dd->GenerateDropDown("emp_level", $mf->GetAllEmployeeLevel("emp_level")); ?>
                                </div>  

                                <div class="col-lg-3">
                                    <label class="control-label" for="work_sched_type">Work Schedule:</label>
                                        <select type="select" class="form-select" id="work_sched_type" name="work_sched_type" >
                                            <option value="0">Compressed</option>
                                            <option value="1">Regular</option>
                                        </select>
                                </div> 

                                <div class="col-lg-3">
                                    <label class="control-label" for="minimum_wage">Minimum Wage:</label>
                                        <select type="select" class="form-select" id="minimum_wage" name="minimum_wage" >
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                </div>

                                <div class="col-lg-3">
                                    <label class="control-label" for="pay_type">Payment Type:</label>
                                        <select type="select" class="form-select" id="pay_type" name="pay_type" >
                                            <option value="1">Monthly</option>
                                            <option value="0">Daily</option>
                                        </select>
                                </div>  

                                 <div class="col-lg-6">
                                    <label class="control-label" for="pay_type">Reporting To:</label>
                                        <?php $dd->GenerateDropDown("reporting_to", $mf->GetEmployeeNames("allempnames")); ?>
                                </div>  

                                <input id="rowid" name="rowid" hidden>
                            </div> <!-- form row closing -->
                    </fieldset>   
                            <div class="modal-footer">
                                <button type="button" class="backbut" data-dismiss="modal"><i class="fas fa-times-circle"></i> CANCEL</button>
                                <button type="button" class="subbut" id="Submit" onclick="updateEmpHired()"><i class="fas fa-check-circle"></i> SUBMIT</button>
                            </div>
                        </div> <!-- main body closing -->
                    </div> <!-- modal body closing -->
                </div> <!-- modal content closing -->
            </div> <!-- modal dialog closing -->
        </div><!-- modal fade closing -->

    </div> <!-- main body mbt closing -->
</div><!-- container closing -->

<script type="text/javascript">

function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("allEmpList");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}

    function onlyNumberKey(evt) {
          
        // Only ASCII character in that range allowed
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
            return swal({text:"Only numbers are allowed!",icon:"error"});;
        return true;
    }

    
    
 function updateEmpModal(empcd,empnme){

        $('#updateHireEmp').modal('toggle');

        var idrow = document.getElementById('rowid');
        idrow.value = empcd;

        var empcdname = document.getElementById('empnames');
        empcdname.value = empnme;

    }


    function updateEmpHired()
    {

        $("body").css("cursor", "progress");
        var url = "../newhireaccess/update_newhireaccess_process.php";
        var rowid = $('#rowid').val();
        var department = $( "#department option:selected" ).text();
        var position = $( "#position option:selected" ).text();
        var location = $( "#location option:selected" ).text();
        var emp_type = $( "#emp_type option:selected" ).text();
        var emp_level = $('#emp_level').children("option:selected").val();
        var emplevel = emp_level.split(" - ");
        var work_sched_type = $( "#work_sched_type option:selected" ).val();
        var minimum_wage = $( "#minimum_wage option:selected" ).val();
        var pay_type = $( "#pay_type option:selected" ).val();
        var reporting_to = $('#reporting_to').children("option:selected").val();
        var reportingto = reporting_to.split(" - ");

        $('#contents').html('');

                        swal({
                          title:"Are you sure?",
                          text: "You want to update this profile?",
                          icon: "success",
                          buttons: true,
                          dangerMode: true,
                        })
                        .then((updateProfile) => {
                          if (updateProfile) {
                                    $.post (
                                        url,
                                        {
                                            action: 1,
                                            department: department,
                                            position: position,
                                            location: location,
                                            emp_type: emp_type,
                                            emp_level: emplevel[0],
                                            work_sched_type: work_sched_type,
                                            minimum_wage: minimum_wage,
                                            pay_type: pay_type,
                                            reporting_to: reportingto[0],
                                            rowid: rowid                
                                        },
                                        function(data) { $("#contents").html(data).show(); }
                                    );
                                swal({text:"Successfully updated the employee details!",icon:"success"});
                                window.location.reload(true);
                          } else {
                            swal({text:"You cancel the updating of employee details!",icon:"error"});
                          }
                        });

                 }
</script>



<?php include("../_footer.php");?>
