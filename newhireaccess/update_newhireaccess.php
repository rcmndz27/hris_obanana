<?php


    session_start();

    if (empty($_SESSION['userid']))
    {

        include_once('../loginfirst.php');
        exit();
    }
    else
    {

        include('../_header.php');
        include('../newhireaccess/update_nhaccess.php');
        include('../elements/DropDown.php');
        include('../controller/MasterFile.php');

        $empCode = $_SESSION['userid'];
        $rowid = $_GET['id'];
        $query = 'SELECT * FROM dbo.employee_profile WHERE emp_code = :rowid';
        $param = array(":rowid" => $rowid);
        $stmt =$connL->prepare($query);
        $stmt->execute($param);
        $r = $stmt->fetch();
        $uempcode = $r['emp_code'];
        $fname = $r['firstname'];
        $mname = $r['middlename'];
        $lname = $r['lastname'];
        $fullname = $lname.', '.$fname.' '. $mname;
        $posit = $r['position'];
        $cmp = $r['company'];
        $depart = $r['department'];
        $locat = $r['location'];
        $empt = $r['emp_type'];
        $ranki = (isset($r['ranking'])) ? $r['ranking'] : '0' ;


        $querys = 'SELECT * FROM dbo.employee_level WHERE level_id = :ranki';
        $params = array(":ranki" => $ranki);
        $stmts =$connL->prepare($querys);
        $stmts->execute($params);
        $rs = $stmts->fetch();


              $sex = $r['sex'];
              $emp_pic_loc = $r['emp_pic_loc'];

              if($sex == 'Male' AND empty($emp_pic_loc)){
                  $avatar = 'avatar2.png';
                  // var_dump($avatar);
              }else if($sex == 'Female' AND empty($emp_pic_loc)){
                  $avatar = 'avatar8.png';
                  // var_dump($avatar);
              }else{
                  $avatar = $emp_pic_loc;
                  // var_dump($avatar);
        }


        $empInfo->SetEmployeeInformation($_SESSION['userid']);
        $empUserType = $empInfo->GetEmployeeUserType();
        $empInfo = new EmployeeInformation();
        $mf = new MasterFile();
        $dd = new DropDown();

            if($empUserType == 'Admin' || $empUserType == 'HR Generalist' ||$empUserType == 'HR Manager' || $empUserType == 'Group Head'|| $empUserType == 'HR-CreateStaff') {

            }else{
                        echo '<script type="text/javascript">swal({text:"You do not have access here!",icon:"error"});';
                        echo "window.location.href = '../index.php';";
                        echo "</script>";
            }
    }
        
?>

<style type="text/css">
    
.bup{

font-weight: bold;
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

.sub{
    width: 120px;
    font-size: 20px;
    color: #ffff;
    font-weight: bolder;
    background-color: #ffaa00;
    border-color: #ffaa00;
    border-radius: 1rem;
}

.sub:hover{
opacity: 0.5;
}

.dpimg{
    height: 160px;
    width: 200px;
}

.btn btn-danger{
    background-color: #fbec1e;
    border-color: #fbec1e;
    border-radius: 1rem;
}

.btn btn-danger:hover{
    opacity: 0.5;
}

.backtxt{
font-size: 20px;
font-weight: bolder;
color: #d64747;
}
</style>
<div class="container">
        <div class="section-title">
          <h1></h1>
        </div>
    <div class="main-body mbt">
          <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item active" aria-current="page"><b><i class='fas fa-users fa-fw'>
                        </i>&nbsp; UPDATE EMPLOYEE PROFILE</b></li>
            </ol>
          </nav>
        <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <?php 
                    echo'<img src="../uploads/employees/'.$avatar.'" alt="Admin" class="rounded-circle dpimg" width="150">';
                     ?>
                    
                    <div class="mt-3">
                      <h4><?php echo ucwords($r['lastname']).', '.ucwords($r['firstname']).' '.ucwords($r['middlename']); ?></h4>
                      <p class="text-secondary mb-1"><?php echo $r['position']; ?></p>
                      <p class="text-muted font-size-sm"><?php echo $r['emp_code'].'-'.$r['emp_type']; ?></p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mt-3">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">
                      <i class='fas fa-table fa-fw'></i></svg>Date Hired:</h6>
                    <span class="text-secondary"><?php echo date('m/d/Y', strtotime($r['datehired'])); ?></span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><i class='fas fa-birthday-cake fa-fw'></i></svg>Birthdate:</h6>
                    <span class="text-secondary"><?php echo date('m/d/Y', strtotime($r['birthdate'])); ?></span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><i class='fas fa-phone fa-fw'></i></svg>Phone:</h6>
                    <span class="text-secondary"><?php echo $r['celno']; ?></span>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Full Name:</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo ucwords($r['lastname']).', '.ucwords($r['firstname']).' '.ucwords($r['middlename']); ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email:</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $r['emailaddress']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Address:</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $r['emp_address'].' '.$r['emp_address2']; ?>
                    </div>
                  </div>
                  <hr>
                    <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Civil Status:</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $r['marital_status']; ?>
                    </div>
                  </div>
                   <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Department:</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $r['department']; ?>
                    </div>
                  </div>
                  <hr>                  
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Job Title:</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $r['position']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Location:</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $r['location']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Employee Type:</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $r['emp_type']; ?>
                    </div>
                  </div>                                    
                </div>
              </div>
            </div>
          </div>
                        <div class="d-flex justify-content-center">
                                <legend class="fieldset-border pad">
                                    UPDATE HIRED EMPLOYEE DETAILS
                                </legend>
                             </div>

                        <div class="form-row">
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

                                <input id="rowid" name="rowid" 
                                value="<?php echo $r['emp_code']; ?>" hidden>
                                                       
                       </div>


                            <div class="mt-3 d-flex justify-content-center">
                                <button type="button" id="search" class="btn btn-primary sub" onmousedown="javascript:filterAtt()">UPDATE
                                </button>
                                <button type="button" id="search" class="btn btn-small btn-primary mr-1 bup btn btn-danger">
                                    <a href="../newhireaccess/newhireaccess_view.php" class="backtxt">BACK</a>
                                </button>                                
                            </div>     

                             
        </div>
    </div>
</div>
<br><br>


<script>
    function filterAtt()
    {
        $("#search").one('click', function (event) 
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

        // swal(minimum_wage);
        // exit();

        $(this).prop('disabled', true);

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
                            swal({text:"You have succesfully updated this employee profile!",icon:"success"});
                            window.location.href ='../newhireaccess/newhireaccess_view.php';
                          } else {
                            swal({text:"You cancel the update of employee profile!",icon:"error"});
                          }
                        });

    });
    }
</script>


<?php include('../_footer.php');  ?>
