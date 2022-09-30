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
        include('../controller/leaveApproval.php');

        if ($empType == 'Staff')
        {
            echo '<span class="etcMessage">
                    <script type="text/javascript">
                        alert("This page is RESTRICTED!!");
                        $("etcMessage").remove();
                    </script>
                </span';
        }
        else
        {

        }
    }
?>

<div class='container-fluid'>
    
    <div class="form-row pt-3">
        <div class="col-md-12">
            <h3>Leave Approval</h3>
        </div>
    </div>

    <!-- <div class="form-row pt-3 pb-3">
        <div class="col-md-2">
            <label for="">Employee</label>
        </div>
        <div class="col-md-3">
            <?php //EmployeeList($empID);?>
        </div>
        <div class="col-md-2">
            <label for="">Leave</label>
        </div>
        <div class="col-md-3">
            <?php //LeaveList($empID);?>
        </div>
        <div class="col-md-2">
            <button type="button" class="btn btn-primary" id="search">Submit</button>
        </div>
    </div> -->

    <div class="row">
        <div class="col-md-12 pt-3">
            <div class="panel-body" id="pendingList">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 pt-3">
            <div class="panel-body" id="summaryList">
            </div>
        </div>
    </div>

</div>

<script type='text/javascript' src='../js/leaveApplication.js'></script>

<?php  include('../_footer.php');?>