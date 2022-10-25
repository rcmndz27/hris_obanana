<?php
    session_start();

    if (empty($_SESSION['userid'])){
        header('refresh:1;url=../index.php' );
    }
    else{
        include('../_header.php');
        include('../dtrcorrect/dtrcorrect-approval.php');
        $dtrcorrectApproval = new DtrCorrectApproval();
        
        if ($empUserType == 'Admin' || $empUserType == 'HR Generalist' ||$empUserType == 'HR Manager' || $empUserType == 'Group Head' ||  $empUserType =='Team Manager' ||  $empUserType =='President' ||  $empUserType =='Finance')
        {
  
        }else{
            echo '<script type="text/javascript">swal({text:"You do not have access here!",icon:"error"});';
            echo "window.location.href = '../index.php';";
            echo "</script>";
        }        
    }
?>

<link rel="stylesheet" type="text/css" href="../dtrcorrect/dtrcorrect.css">
<script type='text/javascript' src='../dtrcorrect/dtrcorrect-approval.js'></script>
<script type='text/javascript' src='../js/validator.js'></script>
<div class="container">
    <div class="section-title">
          <h1>DTR CORRECTION APPROVAL</h1>
        </div>
    <div class="main-body mbt">

          <!-- Breadcrumb -->
          <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item active font-weight-bold" aria-current="page"><b><i class='fas fa-clock fa-fw mr-1'></i>DTR Correction Approval</li>
            </ol>
          </nav>

   <div class="modal fade" id="popUpModal" tabindex="-1" role="dialog" aria-labelledby="informationModalTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="popUpModalTitle"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div>
                    <label for="rejectReason">Reason for Rejection:</label><span class="req">*</span>
                        <input type="text" name="rejectReason" id="rejectReason" class="form-control inputtext">
                    </div>
                </div>

                <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times-circle"></i> Cancel</button>
                        <button type="button" class="btn btn-success" id="submit"><i class="fas fa-check-circle"></i> Submit</button>
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 pt-3">
            <?php $dtrcorrectApproval->GetDtrCorrectSummary($empCode);?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 pt-3" id="dtrcDetails">
            
        </div>
    </div>
    </div>
</div>

<?php include("../_footer.php");?>