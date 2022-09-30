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
        include('../applicantprofile/activate_plaent.php');
        include('../elements/DropDown.php');
        include('../controller/MasterFile.php');
        $empCode = $_SESSION['userid'];
        $rowid = $_GET['id'];
        $query = 'SELECT * FROM dbo.applicant_plantilla WHERE rowid = :rowid';
        $param = array(":rowid" => $rowid);
        $stmt =$connL->prepare($query);
        $stmt->execute($param);
        $r = $stmt->fetch();

        $empInfo->SetEmployeeInformation($_SESSION['userid']);
        $empUserType = $empInfo->GetEmployeeUserType();
        $empInfo = new EmployeeInformation();
        $mf = new MasterFile();
        $dd = new DropDown();

            if($empUserType == 'Admin' || $empUserType == 'HR Generalist' ||$empUserType == 'HR Manager' || $empUserType == 'Group Head'|| $empUserType == 'HR-Payroll') {

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
color: #FFFF;
}

.mbt {
    background-color: #faf9f9;
    padding: 30px;
    border-radius: 0.25rem;
}

.pad{
    padding: 10px 10px 10px 10px;
    font-weight: bolder;
}
.note{
    font-size: 11px;
    font-style: italic;
}
.note2{
    font-size: 14px;
    font-style: italic;
}
.refby{
  border: 0;
  outline: 0;
  background: transparent;
  border-bottom: 1px solid black;
width: 30px;
    height: 20px;
}
.tabrec{
    text-transform: uppercase;
    color: black;
    font-weight: bolder;
}
.mar_dep{
  border: 0;
  outline: 0;
  background: transparent;
  border-bottom: 1px solid black;
  width: 30px;
  height: 20px;
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

.sub{
    width: 200px;
    font-size: 20px;
    color: #ffff;
    font-weight: bolder;
    background-color: #ffaa00;
    border-color: #ffaa00;
    border-radius: 1rem;
}

</style>
<div class="container">
    <div class="section-title">
          <h1>APPLICANT PROFILE</h1>
        </div>
    <div class="main-body mbt">

          <!-- Breadcrumb -->
          <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item active" aria-current="page"><b><i class='fas fa-users fa-fw'>
                        </i>&nbsp; ACTIVATE PLANTILLA</b></li>
            </ol>
          </nav>
          <form id="applicantform">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="personal" role="tabpanel" aria-labelledby="personal-tab"><br>
                      <fieldset class="fieldset-border">
                            <div class="d-flex justify-content-center">
                                <legend class="fieldset-border pad">
                                </legend>
                             </div>
                        <div class="form-row">
                                <div class="col-lg-1">
                                </div>
                                <div class="col-lg-10">
                                    <div class="form-group">
                                        <label class="control-label" for="department">Department</label>
                                        <input type="text" class="form-control inputtext" id="department" name="department" value="<?php echo $r['department']; ?>" readonly>
                                    </div>
                                </div> 
                                <div class="col-lg-1">
                                <input type="text" class="form-control inputtext" id="rowid" name="rowid" value="<?php echo $r['rowid']; ?>" hidden>
                                </div>   
                                <div class="col-lg-1">
                                </div>                                
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label class="control-label" for="position">Position</label>
                                        <input type="text" class="form-control inputtext" id="position" name="position" value="<?php echo $r['position']; ?>" readonly>
                                    </div>
                                </div> 
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label class="control-label" for="position">Reporting To</label>
                                        <input type="text" class="form-control inputtext" id="reporting_to" name="reporting_to" value="<?php echo $r['reporting_to']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-1">
                                </div> 
                                <div class="col-lg-1">
                                </div>                                
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label class="control-label" for="position">Entry Date</label>
                                        <input type="text" class="form-control inputtext" id="entry_date" name="entry_date" value="<?php echo date('m/d/Y', strtotime($r['entry_date'])); ?>" readonly>
                                    </div>
                                </div> 
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label class="control-label" for="position">Status</label>
                                        <select type="select" class="form-select" id="status" name="status" >
                                            

                                            <?php  if($r['status'] == 'Open'){
                                                echo '
                                                <option value="Open">Open</option>
                                                <option value="Active">Active</option>
                                                <option value="De-Activated">De-Activated</option>';
                                                }else if ($r['status'] == 'Active'){
                                                echo '
                                                <option value="Active">Active</option>
                                                <option value="Open">Open</option>
                                                <option value="De-Activated">De-Activated</option>';
                                                }else{
                                                echo '
                                                <option value="De-Activated">De-Activated</option>
                                                <option value="Active">Active</option>
                                                <option value="Open">Open</option>
                                                ';                                                    
                                                }
                                            ?>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-1">
                                </div>                                                                                                       
                        </div>
                        <div class="mt-3 d-flex justify-content-center">        
                            <button type="button" id="search" class="btn btn-small btn-primary mr-1 bup subbut" onmousedown="javascript:filterAtt()">
                            SUBMIT
                            </button>
                            <button type="button" id="search" class="btn btn-small btn-primary mr-1 bup btn btn-danger">
                                <a href="../applicantprofile/plantillalist_view.php" class="backtxt">BACK</a>
                            </button>
                            
                        </div>
                            
                        </fieldset>

                 
                    </div>

      
            </form>
    </div>
</div>

<script>
    function filterAtt()
    {
        
        $("#search").one('click', function (event) 
        {
        $("body").css("cursor", "progress");
        var url = "../applicantprofile/activate_plaent_process.php";
        var status = document.getElementById("status").value;
        var rowid = document.getElementById("rowid").value;
        $(this).prop('disabled', true);

        $('#contents').html('');


                        swal({
                          title: "Are you sure?",
                          text: "You want to update this plantilla?",
                          icon: "success",
                          buttons: true,
                          dangerMode: true,
                        })
                        .then((actPlaent) => {
                          if (actPlaent) {
                                $.post (
                                    url,
                                    {
                                        action: 1,
                                        status: status ,
                                        rowid: rowid                
                                    },
                                    function(data) { $("#contents").html(data).show(); }
                                );
                            swal({text:"Successfully updated the plantilla!",icon:"success"});
                            location.reload();
                          } else {
                            swal({text:"You cancel the updating of plantilla!",icon:"error"});
                          }
                        });

    });
    }
</script>
            
      
<?php include('../_footer.php');  ?>
