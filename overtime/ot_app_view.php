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
        include('../overtime/ot_app.php');

        $otApp = new OtApp(); 
        $otApp->SetOtAppParams($empCode);

    }    
?>

<script type="text/javascript">
    

        function viewOtModal(otdate,ottype,otstartdtime,otenddtime,remark,otreqhrs,otrenhrs,rejectreason,stats){

   
        $('#viewOtModal').modal('toggle');

        var hidful = document.getElementById('otdatev');
        hidful.value =  otdate;   

        var bnkt = document.getElementById('ottypev');
        bnkt.value =  ottype;  

        var at = document.getElementById('otstartdtimev');
        at.value =  otstartdtime;  

        var ast = document.getElementById('otenddtimev');
        ast.value =  otenddtime;  

        var bnkt2 = document.getElementById('remarkv');
        bnkt2.value =  remark;  

        var at2 = document.getElementById('otreqhrsv');
        at2.value =  otreqhrs;  

        var ast2 = document.getElementById('otrenhrsv');
        ast2.value =  otrenhrs;  

        var ast3 = document.getElementById('rejectreasonv');
        ast3.value =  rejectreason;    

        var ast4 = document.getElementById('statsv');
        ast4.value =  stats;                 

                          
    }

    function viewOtHistoryModal(lvlogid)
    {
       $('#viewOtHistoryModal').modal('toggle');
        var url = "../overtime/ot_viewlogs.php";
        var lvlogid = lvlogid;

        $.post (
            url,
            {
                _action: 1,
                lvlogid: lvlogid             
            },
            function(data) { $("#contents2").html(data).show(); }
        );
    }

</script>
<link rel="stylesheet" type="text/css" href="../overtime/ot_view.css">
<script type='text/javascript' src='../overtime/ot_app.js'></script>
<script type='text/javascript' src='../js/validator.js'></script>
<script src="../overtime/moment2.min.js"></script>
<script src="../overtime/moment-range.js"></script>
<div class="container">
    <div class="section-title">
          <h1>OVERTIME APPLICATION</h1>
        </div>
    <div class="main-body mbt">

          <!-- Breadcrumb -->
          <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item active" aria-current="page"><b><i class='fas fa-hourglass fa-fw'>
                        </i>&nbsp;OVERTIME APPLICATION</b></li>
            </ol>
          </nav>
   
    <div class="pt-3">

        <div class="row align-items-end justify-content-end">
            <div class="col-md-12 mb-3">
                <button type="button" class="appOt" id="applyOvertime"><i class="fas fa-plus-circle"></i> APPLY OVERTIME</button>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="panel-body">
                    <div id="tableList" class="table-responsive-sm table-body">
                        <?php $otApp->GetOtAppHistory(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="popUpModal" tabindex="-1" role="dialog" aria-labelledby="informationModalTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title bb" id="popUpModalTitle">APPLY OVERTIME <i class="fas fa-hourglass fa-fw">
                        </i></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times; </span>
                    </button>
                </div>
                <div class="modal-body">
                    <div>
                      
                            <div class="form-row align-items-center mb-2">
                                   <div class="col-md-2 d-inline">
                                        <label for="">OT Date From:</label>
                                    </div>
                                    <div class="col-md-3 d-inline">
                                        <input type="date" id="otdate" name="otdate" class="form-control"
                                            value="<?php echo date('Y-m-d');?>">
                                    </div>
                                    <div class="col-md-2 d-inline">
                                        <label for="">OT Date To:</label>
                                    </div>
                                    <div class="col-md-3 d-inline">
                                        <input type="date" id="otdateto" name="otdateto" class="form-control"
                                            value="<?php echo date('Y-m-d');?>">
                                    </div>
                            </div>


                        <div class="form-row align-items-center mb-2">

                            <div class="col-md-2 d-inline">
                                <label for="">OT Start Time:</label>
                            </div>
                            <div class="col-md-3 d-inline">
                                <input type="time" id="otstartdtime" name="otstartdtime" class="form-control" value="<?php echo date('h:i a');?>">
                            </div>
                            <div class="col-md-2 d-inline">
                                <label for="">OT End Time:</label>
                            </div>
                            <div class="col-md-3 d-inline">
                                <input type="time" id="otenddtime" name="otenddtime" class="form-control" readonly>
                            </div>
                        </div>

                                    <div class="form-row align-items-center mb-2" id="planot">
                                       <div class="col-md-2 d-inline">
                                            <label for="">Plan OT(hrs):</label>
                                        </div>
                                        <div class="col-md-3 d-inline">
                                              <input class="form-control" type="number" name="otreqhrs" id="otreqhrs"  min="1" max="10" onkeypress="return false" onchange="myChangeFunction()" placeholder="0">              
                                        </div>
                                    </div>

                        <div class="form-row mb-2">
                            <div class="col-md-2 d-inline">
                                <label for='leaveDesc'>Remarks:</label>
                            </div>
                            <div class="col-md-10 d-inline">
                                <textarea class="form-control inputtext" id="remarks" name="remarks" rows="4" cols="50" ></textarea>
                            </div>
                        </div>

                    </div>
                </div>


                <div class="modal-footer">
                    <button type="button" class="backbut" data-dismiss="modal"><i class="fas fa-times-circle"></i> CANCEL</button>
                    <button type="button" class="subbut" id="Submit" ><i class="fas fa-check-circle"></i> SUBMIT</button>
                </div>

            </div>
        </div>
    </div>
<div class="modal fade" id="viewOtModal" tabindex="-1" role="dialog" aria-labelledby="informationModalTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title bb" id="popUpModalTitle">VIEW OVERTIME <i class="fas fa-hourglass fa-fw fa-fw"></i></h5>
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
                            <!-- otdate,ottype,otstartdtime,otenddtime,remark,otreqhrs,otrenhrs,rejectreason -->
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="control-label" for="otdate">OT Date</label>
                                        <input type="text" id="otdatev" name="otdatev" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="form-group">
                                        <label class="control-label" for="ottypev">OT Type</label>
                                        <input type="text" id="ottypev" name="ottypev" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="control-label" for="otstartdtimev">Time In</label>
                                        <input type="text" id="otstartdtimev" name="otstartdtimev" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="control-label" for="otenddtimev">Time Out</label>
                                        <input type="text" id="otenddtimev" name="otenddtimev" class="form-control" readonly>                                        
                                    </div>
                                </div> 
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label class="control-label" for="otreqhrsv">Plan OT</label>
                                        <input type="text" id="otreqhrsv" name="otreqhrsv" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label class="control-label" for="otrenhrsv">Rendered OT</label>
                                        <input type="text" id="otrenhrsv" name="otrenhrsv" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="control-label" for="remarkv">Description</label>
                                        <input type="text" id="remarkv" name="remarkv" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="form-group">
                                        <label class="control-label" for="rejectreasonv">Reject Reason</label>
                                        <input type="text" id="rejectreasonv" name="rejectreasonv" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="control-label" for="statsv">Status</label>
                                        <input type="text" id="statsv" name="statsv" class="form-control" readonly>
                                    </div>
                                </div>                                
                            </div> <!-- form row closing -->
                    </fieldset> 
                                <div class="modal-footer">
                                    <button type="button" class="backbut" data-dismiss="modal"><i class="fas fa-times-circle"></i> CLOSE</button>
                                </div> 
                        </div> <!-- main body closing -->
                    </div> <!-- modal body closing -->
                </div> <!-- modal content closing -->
            </div> <!-- modal dialog closing -->
        </div><!-- modal fade closing -->

<div class="modal fade" id="viewOtHistoryModal" tabindex="-1" role="dialog" aria-labelledby="informationModalTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-sg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title bb" id="popUpModalTitle">VIEW OVERTIME LOGS   <i class="fas fa-hourglass fa-fw"></i></h5>
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
                            <div class="row pt-3">
                                <div class="col-md-12">
                                    <div class="panel-body">
                                        <div id="contents2" class="table-responsive-sm table-body">
                                            <button type="button" id="search" hidden>GENERATE</button>
                                        </div>
                                    </div>
                                </div>
                            </div>                                               
                        </div> <!-- form row closing -->
                    </fieldset> 

                                <div class="modal-footer">
                                    <button type="button" class="backbut" data-dismiss="modal"><i class="fas fa-times-circle"></i> CLOSE</button>
                                </div> 
                        </div> <!-- main body closing -->
                    </div> <!-- modal body closing -->
                </div> <!-- modal content closing -->
            </div> <!-- modal dialog closing -->
        </div><!-- modal fade closing -->        

    </div> <!-- main body mbt closing -->
</div><!-- container closing -->

  <script>

        function myChangeFunction(input1) {
            var dte = $('#otdate').val();
            var dte_to = $('#otdateto').val();
            var otstrt = $('#otstartdtime').val();
            var dt = dte+' '+otstrt;
            var othrs = $('#otreqhrs').val();
            var dt_input = new Date(dt);
            var hr = parseFloat(othrs);

            var hours = dt_input.getHours() + hr;
            var minutes = dt_input.getMinutes();
            var ampm = hours < 12 || hours > 24 ? 'AM' : 'PM';
            hours = hours % 12;
            hours = hours ? hours : 12; // the hour '0' should be '12'
            minutes = minutes < 10 ? '0'+minutes : minutes;
            var strTime = hours + ':' + minutes + ' ' + ampm;
            var dt = moment(strTime, ["h:mm A"]).format("HH:mm");

            var input2 = document.getElementById('otenddtime');
            input2.value = dt;

        }

 </script>



<?php include("../_footer.php");?>
