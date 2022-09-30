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

.sub{
    width: 200px;
    font-size: 20px;
    color: #ffff;
    font-weight: bolder;
    background-color: #ffaa00;
    border-color: #ffaa00;
    border-radius: 1rem;
}

.req{
    color: red;
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
                        </i>&nbsp; UPDATE APPLICANT PROFILE</b></li>
            </ol>
          </nav>
        <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <?php 
                    echo'<img src="../img/applicant.png" alt="Admin" class="rounded-circle dpimg" width="150">';
                     ?>
                    
                    <div class="mt-3">
                      <h4><?php echo ucwords($r['familyname']).', '.ucwords($r['firstname']).' '.ucwords($r['middlei']); ?></h4>
                      <p class="text-muted font-size-sm"><?php echo $r['jobpos1'].'-'.$r['jobpos2']; ?></p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mt-3">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">
                      <i class='fas fa-table fa-fw'></i></svg>Referral Date:</h6>
                    <span class="text-secondary"><?php echo date('m/d/Y', strtotime($r['referral_date'])); ?></span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><i class='fas fa-table fa-fw'></i></svg>Verified Date:</h6>
                    <span class="text-secondary"><?php echo date('m/d/Y', strtotime($r['verified_date'])); ?></span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><i class='fas fa-phone fa-fw'></i></svg>Phone:</h6>
                    <span class="text-secondary"><?php echo $r['contactno1']; ?></span>
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
                      <?php echo ucwords($r['familyname']).', '.ucwords($r['firstname']).' '.ucwords($r['middlei']); ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email:</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $r['emailadd']; ?>
                    </div>
                  </div>
                  <hr>
                    <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Address:</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $r['houseno'].' '.$r['streetbrgy'].' '.$r['city']; ?>
                    </div>
                  </div>
                   <hr> 
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">College Course:</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $r['tertiary']; ?>
                    </div>
                  </div>
                  <hr>  
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">College School Name:</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $r['schoolname1']; ?>
                    </div>
                  </div>
                  <hr>                                                    
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Referred To:</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $r['referred_to']; ?>
                    </div>
                  </div>
                  <hr> 
                 <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Manpower Request:<span class="req">*</span></h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php $dd->GenerateDropDown("manpow", $mf->GetAllManpowerList("manpow")); ?>
                    </div>
                <input type="text" class="form-control inputtext" id="rowid" name="rowid" value="<?php echo $r['rowid']; ?>" hidden>
                  </div>
                  <hr>                                                     
                </div>
              </div>
            </div>
          </div>
                            <div class="mt-3 d-flex justify-content-center">
                            <button type="button" id="search" class="btn btn-small btn-primary mr-1 bup subbut" onmousedown="javascript:filterAtt()">
                                UPDATE
                            </button>
                            <button type="button" id="search" class="btn btn-small btn-primary mr-1 bup btn btn-danger">
                                <a href="../applicantprofile/applicantlist_view.php" class="backtxt">BACK</a>
                            </button>                                
                            </div>     

                             
        </div>
    </div>
</div>
<br><br>
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
        $("body").css("cursor", "progress");
        var url = "../applicantprofile/update_appent_process.php";
        var manpow = $('#manpow').children("option:selected").val();
        var man_pow = manpow.split(" - ");
        var rowid = document.getElementById("rowid").value;   
        $(this).prop('disabled', true);

        $('#contents').html('');


                        swal({
                          title: "Are you sure?",
                          text: "You want to update this applicant?",
                          icon: "success",
                          buttons: true,
                          dangerMode: true,
                        })
                        .then((updateApp) => {
                          if (updateApp) {
                                $.post (
                                    url,
                                    {
                                        action: 1,
                                        man_pow: man_pow[0],
                                        rowid: rowid
                                    },
                                    function(data) { $("#contents").html(data).show(); }
                                );
                            swal({text:"Successfully updated the applicant!",icon:"success"});
                            window.location.href ='../applicantprofile/applicantlist_view.php';
                          } else {
                            swal({text:"You cancel the updating of applicant!",icon:"error"});
                          }
                        });

    });
    }
</script>
            
      
<?php include('../_footer.php');  ?>
