<?php
    session_start();

    if (empty($_SESSION['userid']))
    {
        echo '<script type="text/javascript">alert("Please login first!!");</script>';
        header( "refresh:1;url=../index.php" );
    }
    else
    {
        include('../_header.php');
        include('../payroll/payroll_rep.php');
        include('../elements/DropDown.php');
        include('../controller/MasterFile.php');

        // $payroll = new Payroll();
        $mf = new MasterFile();
        $dd = new DropDown();
         $empCode = $_SESSION['userid'];

        $empInfo = new EmployeeInformation();

        $empInfo->SetEmployeeInformation($_SESSION['userid']);

        $empUserType = $empInfo->GetEmployeeUserType();

            if($empUserType == 'Admin' || $empUserType == 'HR Generalist' ||$empUserType == 'HR Manager' || $empUserType == 'Group Head') {

            }else{
                        echo '<script type="text/javascript">swal({text:"You do not have access here!",icon:"error"});';
                        echo "window.location.href = '../index.php';";
                        echo "</script>";
            }
    }
        
?>

 
<link rel="stylesheet" href="../css/payviewrpt.css">
<script type='text/javascript' src='../payroll/payroll_rep.js'></script>
<script src="<?= constant('NODE'); ?>xlsx/dist/xlsx.core.min.js"></script>
<script src="<?= constant('NODE'); ?>file-saverjs/FileSaver.min.js"></script>
<script src="<?= constant('NODE'); ?>tableexport/dist/js/tableexport.min.js"></script>
<div class="container">
        <div class="section-title">
          <h1>
            PAYROLL REGISTER VIEW
          </h1>
        </div>
    <div class="main-body mbt">
          <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item active" aria-current="page"><b><i class='fas fa-money-check fa-fw'>
                        </i>&nbsp;PAYROLL REGISTER VIEW</b></li>
            </ol>
          </nav>

        <div class="form-row pt-3">

                <label for="companylist" class="col-form-label pad">COMPANY:</label>
                <div class="col-md-4">      
                    <?php $dd->GenerateDropDown("compay", $mf->GetPayCompany("compay")); ?>   
                </div>

                <label for="payroll_period" class="col-form-label pad">PAYROLL PERIOD:</label>   
                <div class='col-md-3'>
                    <?php $dd->GenerateDropDown("ddcutoff", $mf->GetAllPayCutoff("paycut")); ?>
                </div>

                <div class="col-md-2 d-flex">
                        <button type="button" id="search" class="genpyrll" onmousedown="javascript:filterAtt()">
                            <i class="fas fa-search-plus"></i>
                            GENERATE                      
                        </button>


                </div>
        </div>
      <div class="row pt-5">
        <div class="col-md-12 mbot"><br>
            <div id='contents'>

            </div>
        </div>
    </div>
</div>
</div>
<script>


function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("payrollRepList");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
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

    function filterAtt()
    {
        var url = "../payroll/payrollrep_rep_process.php";
        var cutoff = $('#ddcutoff').children("option:selected").val();
        var dates = cutoff.split(" - ");
        var company = $('#compay').children("option:selected").val();
        var companies = company.split(" - ");


        $('#contents').html('');

        $.post (
            url,
            {
                _action: 1,
                _from: dates[0],
                _to: dates[1],
                _company: companies[0]
                
            },
            function(data) { $("#contents").html(data).show(); }
        );
    }
</script>
<?php include('../_footer.php');  ?>
