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
        include('../payroll_att/payroll_att.php');
        include('../elements/DropDown.php');
        include('../controller/MasterFile.php');
        $empCode = $_SESSION['userid'];
        $rowid = $_GET['id'];
        $query = 'SELECT * FROM dbo.att_summary WHERE rowid = :rowid';
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
</style>
<div class="container">
    <div class="section-title">
          <h1>ADJUST EMPLOYEE ATTENDANCE</h1>
        </div>
    <div class="main-body mbt">

          <!-- Breadcrumb -->
          <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item active" aria-current="page"><b><i class='fas fa-money-check fa-fw'>
                        </i>&nbsp;ADJUST EMPLOYEE ATTENDANCE</b></li>
            </ol>
          </nav>
<div class="form-row">
            <div class="col-md-3">
            <div class="form-group">
                <label class="col-form-label" for="firstname">Employee Name</label>
                <input type="text" class="form-control inputtext" value="<?php echo $r['employee']; ?>" readonly>
                <input type="text" class="form-control inputtext" id="rowid" name="rowid" value="<?php echo $r['rowid']; ?>" hidden>
            </div>
            </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="col-form-label" for="cutoff">Cut-off Date</label>
                <input type="text" class="form-control inputtext"  value="<?php echo date('m/d/Y', strtotime($r['period_from'])).'-'.date('m/d/Y', strtotime($r['period_to']));?>"readonly>
            </div>
        </div>
</div>  
<div class="form-row">
        <div class="col-md-2">
            <div class="form-group">
                <label class="col-form-label" for="tda">Total Days Absent</label>
                <input type="text" class="form-control inputtext" id="tda" name="tda" value="<?php echo round($r['tot_days_absent'],2); ?>">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label class="col-form-label" for="tdw">Total Days Worked</label>
                <input type="text" class="form-control inputtext" id="tdw" name="tdw" value="<?php echo round($r['tot_days_work'],2); ?>">
        </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label class="col-form-label" for="late">Lates (Hrs)</label>
                <input type="text" class="form-control inputtext" id="late" name="late" value="<?php echo round($r['tot_lates'],2); ?>">
            </div>
        </div>
</div>    
<div class="form-row">    
        <div class="col-md-2">
            <div class="form-group">
                <label class="col-form-label" for="ut">Undertime (Hrs)</label>
                <input type="text" class="form-control inputtext" id="ut" name="ut" value="<?php echo round($r['total_undertime'],2); ?>">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label class="col-form-label" for="regot">Regular OT (Hrs)</label>
                <input type="text" class="form-control inputtext" id="regot" name="regot" value="<?php echo round($r['tot_overtime_reg'],2); ?>">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label class="col-form-label" for="resot">Rest Day OT (Hrs)</label>
                <input type="text" class="form-control inputtext" id="resot" name="resot" value="<?php echo round($r['tot_overtime_rest'],2); ?>">
            </div>
        </div>
</div>
<div class="form-row">        
        <div class="col-md-2">
            <div class="form-group">
                <label class="col-form-label" for="reghot">Regular Holiday OT (Hrs)</label>
                <input type="text" class="form-control inputtext" id="reghot" name="reghot" value="<?php echo round($r['tot_overtime_regholiday'],2); ?>">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label class="col-form-label" for="sphot">Special Holiday OT (Hrs)</label>
                <input type="text" class="form-control inputtext" id="sphot" name="sphot" value="<?php echo round($r['tot_overtime_spholiday'],2); ?>">
            </div>
        </div>
</div>
<div class="form-row">   
                <div class="col-md-2 d-flex">
                        <button type="button" id="search" class="btn btn-small btn-primary mr-1 bup" onmousedown="javascript:filterAtt()">
                            UPDATE ATTENDANCE
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
        var url = "../payroll_att/updatepay_att_process.php";
        var tda = document.getElementById("tda").value;
        var tdw = document.getElementById("tdw").value;
        var late = document.getElementById("late").value;
        var ut = document.getElementById("ut").value;
        var regot = document.getElementById("regot").value;
        var resot = document.getElementById("resot").value;
        var reghot = document.getElementById("reghot").value;
        var sphot = document.getElementById("sphot").value;
        var rowid = document.getElementById("rowid").value;
        $(this).prop('disabled', true);

        $('#contents').html('');


                        swal({
                          title: "Are you sure?",
                          text: "You want to update this employee attendance?",
                          icon: "success",
                          buttons: true,
                          dangerMode: true,
                        })
                        .then((updateAttendance) => {
                          if (updateAttendance) {
                                $.post (
                                    url,
                                    {
                                        action: 1,
                                        tda: tda ,
                                        tdw: tdw ,
                                        late: late ,
                                        ut: ut ,
                                        regot: regot ,
                                        resot: resot ,
                                        reghot: reghot,
                                        sphot: sphot,
                                        rowid: rowid                
                                    },
                                    function(data) { $("#contents").html(data).show(); }
                                );
                            swal({text:"Successfully updated the employee attendance!",icon:"success"});
                          } else {
                            swal({text:"Your cancel the update of employee attendance!",icon:"error"});
                          }
                        });

    });
    }
</script>

<?php include('../_footer.php');  ?>
