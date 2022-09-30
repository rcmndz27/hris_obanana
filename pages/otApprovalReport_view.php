<?php
    session_start();

        $empID = $_SESSION['userid'];
        
    if (empty($_SESSION['userid']))
    {
        include_once('../loginfirst.php');
        exit();
    }
    else
    {
        include('../_header.php');
        include('../controller/otApprovalReport.php');
        include('../elements/DropDown.php');
        include('../controller/MasterFile.php');

        $mf = new MasterFile();
        $dd = new DropDown();

        if ($empUserType == 'Admin' || $empUserType == 'HR Generalist' ||$empUserType == 'HR Manager' || $empUserType == 'Group Head' ||  $empUserType =='Team Manager' ||  $empUserType =='President')
        {
  
        }else{
            echo '<script type="text/javascript">swal({text:"You do not have access here!",icon:"error"});';
            echo "window.location.href = '../index.php';";
            echo "</script>";
        }  
    }
?>
<link rel="stylesheet" type="text/css" href="../pages/ot_rep.css">
<div class="container">
<div id = "myDiv" style="display:none;" class="loader"></div>
    <div class="section-title">
          <h1>OT APPROVAL REPORT</h1>
        </div>
    <div class="main-body mbt">
          <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item active" aria-current="page"><b><i class='fas fa-suitcase fa-fw'>
                        </i>&nbsp;OT APPROVAL REPORT</b></li>
            </ol>
          </nav>

        <div class="form-row pt-3">
                <label for="payroll_period" class="col-form-label pad">PAYROLL PERIOD/LOCATION:</label>
                <div class='col-md-4'>
                    <select class="form-control" id="empCode" name="empCode" value="" hidden>
                        <option value="<?php echo $empCode ?>"><?php echo $empCode ?></option>
                    </select>
                    <?php $dd->GenerateDropDown("ddcutoff", $mf->GetAllCutoffPay("payview")); ?>
                </div>
                        <button type="button" id="search" class="genpyrll" onclick="ottApprp()">
                        <i class="fas fa-search-plus"></i> GENERATE                      
                        </button>
        </div>
            <div class="row pt-5">
                <div class="col-md-12 mbot">
                    <div id='contents'></div>
                </div>
            </div>
    </div>
</div>
<script>
    function ottApprp()
    {
        document.getElementById("myDiv").style.display="block";
        $("body").css("cursor", "progress");
        var url = "../controller/otApprovalReportProcess.php";
        var cutoff = $('#ddcutoff').children("option:selected").val();
        var dates = cutoff.split(" - ");

        $('#contents').html('');

        $.post (
            url,
            {
                _action: 1,
                _from: dates[0],
                _to: dates[1],
                _rpt: '<?= $empID; ?>'
            },
            function(data) { $("#contents").html(data).show(); 
            document.getElementById("myDiv").style.display="none";
            }
        );
    }


</script>

<?php  include('../_footer.php');  ?>