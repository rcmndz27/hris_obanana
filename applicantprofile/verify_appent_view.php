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
        include('../applicantprofile/verify_appent.php');
        include('../elements/DropDown.php');
        include('../controller/MasterFile.php');
        $empCode = $_SESSION['userid'];
        $rowid = $_GET['id'];
        $query = 'SELECT * FROM dbo.applicant_entry WHERE rowid = :rowid';
        $param = array(":rowid" => $rowid);
        $stmt =$connL->prepare($query);
        $stmt->execute($param);
        $r = $stmt->fetch();

        $empInfo->SetEmployeeInformation($_SESSION['userid']);
        $empUserType = $empInfo->GetEmployeeUserType();
        $empName = $empInfo->GetEmployeeName();
        $empCode = $empInfo->GetEmployeeCode();
        $empInfo = new EmployeeInformation();
        $mf = new MasterFile();
        $dd = new DropDown();

        $month = date('m');
        $day = date('d');
        $year = date('Y');

        $today = $year . '-' . $month . '-' . $day;


            if($empUserType == 'Admin' || $empUserType == 'HR Generalist' ||$empUserType == 'HR Manager' || $empUserType == 'Group Head'|| $empUserType == 'HR-Payroll') {

            }else{
                        echo '<script type="text/javascript">swal({text:"You do not have access here!",icon:"error"});';
                        echo "window.location.href = '../index.php';";
                        echo "</script>";
            }
    }
        
?>
<script type="text/javascript" src="../applicantprofile/verify_appent.js"></script>
<script type='text/javascript' src='../js/validator.js'></script>
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

.req{
    color: red;
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
                        </i>&nbsp; VERIFY APPLICANT</b></li>
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
                                        <label class="control-label" for="applicant_name">Applicant Name</label>
                                        <input type="text" class="form-control inputtext" id="applicant_name" name="applicant_name" \
                                        value="<?php echo $r['familyname'].','.$r['firstname'].' '.$r['middlei']; ?>" readonly>
                                    </div>
                                </div> 
                                <div class="col-lg-1">
                                <input type="text" class="form-control inputtext" id="rowid" name="rowid" value="<?php echo $r['rowid']; ?>" hidden>
                                </div>   
                                <div class="col-lg-1">
                                </div>                                
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label class="control-label" for="Relevant">Relevant</label>
                                        <input type="text" class="form-control inputtext"
                                        onkeypress="return onlyNumberKey(event)" placeholder="0000" maxlength="4" id="relevant" name="relevant">
                                    </div>
                                </div> 
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label class="control-label" for="notRelevant">Not Relevant</label>
                                        <input type="text" class="form-control inputtext" onkeypress="return onlyNumberKey(event)" placeholder="0000" maxlength="4" id="not_relevant" name="not_relevant">
                                    </div>
                                </div>
                                <div class="col-lg-1">
                                </div> 
                                <div class="col-lg-1">
                                </div>                                
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label class="control-label" for="Verifiedby">Verified By</label>
                                        <input type="text" class="form-control inputtext" value="<?php echo $empName; ?>" readonly>
                                         <input type="text" class="form-control inputtext" id="verified_by" name="verified_by" value="<?php echo $empCode; ?>" hidden>
                                    </div>
                                </div> 
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="control-label" for="Verifieddate">Verified Date</label>
                                        <input type="date" class="form-control inputtext" id="verified_date" name="verified_date" value="<?php echo $today; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label class="control-label" for="Verifiedby">Action Taken</label>
                                        <select type="select" class="form-select" id="action_taken" name="action_taken" >
                                            <option value="Dead File">Dead File</option>
                                            <option value="Keep">Keep</option>
                                            <option value="Referred">Referred</option>
                                            <option value="Unverified">Unverified</option>
                                        </select>
                                    </div>
                                </div>                                
                                <div class="col-lg-1">
                                </div> 
                                <div class="col-lg-1">
                                </div>                                
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label class="control-label" for="referred_to">Referred To</label>
                                           <div id="ref_to">
                                                <?php $dd->GenerateDropDown("referred_to", $mf->GetAllDepartment("alldep")); ?> 
                                            </div>
                                            <div id="ref_to_dis">
                                                <input type="text" class="form-control inputtext" id="referred_to" name="referred_to" placeholder="Referred To" readonly>
                                            </div>
                                    </div>
                                </div> 
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label class="control-label" for="referral_date">Referral Date</label>
                                        <div id="ref_date">
                                            <input type="date" class="form-control inputtext" id="referral_date" name="referral_date" >
                                        </div>
                                        <div id="ref_date_dis">
                                            <input type="date" class="form-control inputtext" id="referral_date" name="referral_date" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-1">
                                </div>                                 

                        </div>
                        <div class="mt-3 d-flex justify-content-center">        
                            <button type="button" id="search" class="btn btn-small btn-primary mr-1 bup subbut" onmousedown="javascript:filterAtt()">
                            VERIFY
                            </button>
                            <button type="button" id="search" class="btn btn-small btn-primary mr-1 bup btn btn-danger">
                                <a href="../applicantprofile/applicantlist_view.php" class="backtxt">BACK</a>
                            </button>
                            
                    </div>
                            
                        </fieldset>

                 
                    </div>

      
            </form>
    </div>
</div>
<script>
    function onlyNumberKey(evt) {
          
        // Only ASCII character in that range allowed
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
            return swal({text:"Only numbers are allowed!",icon:"error"});
        return true;
    }
</script>

<script>
    function filterAtt()
    {
        
        $("#search").one('click', function (event) 
        {
        if($('#action_taken').val() === 'Referred'){
            var appent_status = 1;
        }else{
            var appent_status = 0;
        }
        var url = "../applicantprofile/verify_appent_process.php";
        var relevant = document.getElementById("relevant").value;
        var not_relevant = document.getElementById("not_relevant").value;
        var verified_by = document.getElementById("verified_by").value;
        var verified_date = document.getElementById("verified_date").value;
        var action_taken = document.getElementById("action_taken").value;
        var referred_to = document.getElementById("referred_to").value;
        var referral_date = document.getElementById("referral_date").value;        
        var rowid = document.getElementById("rowid").value;
        $(this).prop('disabled', true);

                        swal({
                          title: "Are you sure?",
                          text: "You want to verify this applicant?",
                          icon: "success",
                          buttons: true,
                          dangerMode: true,
                        })
                        .then((verifyApp) => {
                          if (verifyApp) {
                                $.post (
                                    url,
                                    {
                                        action: 1,
                                        relevant: relevant ,
                                        not_relevant: not_relevant ,
                                        verified_by: verified_by ,
                                        verified_date: verified_date ,
                                        action_taken: action_taken ,               
                                        referred_to: referred_to ,
                                        referral_date: referral_date ,
                                        appent_status: appent_status,
                                        rowid: rowid 
                                    },
                                    function(data) { $("#contents").html(data).show(); }
                                );
                            swal({text:"Successfully verified the applicant!",icon:"success"});
                            window.location.href ='../applicantprofile/applicantlist_view.php';
                          } else {
                            swal({text:"You cancel the verification of applicant!",icon:"error"});
                          }
                        });

    });
    }
</script>
            
      
<?php include('../_footer.php');  ?>
