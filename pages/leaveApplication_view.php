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
        include('../controller/leaveApplication.php');

        $leaveApp = new LeaveApplication(); 
        $leaveApp->SetLeaveApplicationParams($empCode,$empType);

        if (isset($_POST['submit-leave'])) {
            $leaveDates = explode("-", $_POST["home-calendar"]);
        }
    }    
?>

<script type='text/javascript' src='../js/leaveApplication.js'></script>

<div class="container-fluid">

    <div class="row">
        <div class="col-md-12 pt-5">
            <h3>Leave Application</h3>
        </div>
    </div>

    <div class="pt-3">

        <div class="row">
            <div class="col-md-12">
                <div class="panel-body">
                    <div id="tableList" class="table-responsive-sm table-body">
                        <?php $leaveApp->GetLeaveSummary(); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row align-items-end justify-content-end">
            <div class="col-md-12 mb-3">
                <button type="button" class="btn btn-primary" id="applyLeave">Apply Leave</button>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="panel-body">
                    <div id="tableList" class="table-responsive-sm table-body">
                        <?php $leaveApp->GetLeaveHistory(); ?>
                    </div>
                </div>
            </div>
        </div>

        <?php 
            if (!isset($_POST["submit-leave"])){
                $dateFrom = date("Y-m-d");
                $dateTo = date("Y-m-d");
            }elseif (!isset($leaveDates[1])) {
                $dateFrom = $leaveDates[0];
                $dateTo = $leaveDates[0];
            }else {
                $dateFrom = $leaveDates[0];
                $dateTo = $leaveDates[1];
            }
        ?>

    </div>

    <div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="informationModalTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="popUpModalTitle"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h3 class="text-danger text-center"><label for="" id="modalText"></label></h3>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

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

                        <?php $leaveApp->GetLeaveType(); ?>
                        <div id="advancefiling">
                            <div class="row">
                                <div class=col-md-2>
                                    <label for="">Advance Filing</label>
                                </div>
                                <div class="col-md-10">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input advancesl" type="radio" name="advancesl"
                                            id="advancesl" value="yes">
                                        <label class="form-check-label" for="inlineRadio1">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input advancesl" type="radio" name="advancesl"
                                            id="advancesl" value="no">
                                        <label class="form-check-label" for="inlineRadio2">No</label>
                                    </div>
                                </div>
                            </div>

                            <div id="medicalFiles" class="row pb-2">
                                <div class="col-md-2">
                                    <label for="">Medical Files</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="file" name="medicalfiles" id="medicalfiles" accept=".pdf"
                                        onchange="GetMedFile()">
                                </div>
                            </div>
                        </div>

                        <div class="form-row align-items-center mb-2">

                            <div class="col-md-2 d-inline">
                                <label for="">From</label>
                            </div>
                            <div class="col-md-3 d-inline">
                                <input type="date" id="dateFrom" name="dateFrom" class="form-control"
                                    value="<?php echo  $dateFrom;?>">
                            </div>
                            <div class="col-md-1 d-inline">
                                <label for="">To</label>
                            </div>
                            <div class="col-md-3 d-inline">
                                <input type="date" id="dateTo" name="dateTo" class="form-control"
                                    value="<?php echo $dateTo; ?>">
                            </div>
                            <div class="col-md-3 d-inline">
                                <div class="form-check" id="singleHalf">
                                    <input class="form-check-input" type="checkbox" id="halfDay">
                                        <label class="form-check-label " for="halfDay">Half Day</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-row mb-2 align-items-center" id="halfdayset">
                            <div class="col-md-2 d-inline">
                            </div>

                            <div class="col-md-3 d-inline">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="lastDayHalfDay" name="lastDayHalfDay">
                                    <label class="form-check-label " for="lastDayHalfDay">Single Half Day</label>
                                </div>
                            </div>

                            <div class="col-md-3 d-inline">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="multiHalfDay" name="multiHalfDay">
                                    <label class="form-check-label " for="multiHalfDay">All Half Day</label>
                                </div>
                            </div>

                            <div class="col-md-4 d-inline">
                                <span id="errMsg"></span>
                            </div>

                        </div>

                        <div class="form-row mb-2">
                            <div class="col-md-2 d-inline">
                                <label for='leaveDesc'>Description</label>
                            </div>
                            <div class="col-md-10 d-inline">
                                <textarea class="form-control" id="leaveDesc" name="leaveDesc" rows="4"
                                    cols="50"></textarea>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="Submit">Submit</button>
                </div>

            </div>
        </div>
    </div>

</div>


<?php include("../_footer.php");?>
