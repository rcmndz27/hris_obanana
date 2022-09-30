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
        include('../controller/travelApproval.php');

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

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 pt-5">
            <h3>Travel Approval</h3>
        </div>
    </div>

    <div class="row pt-4">
        <div class="col-md-6 d-inline">
            <input type='text' id='filterTable' class='form-control' placeholder='Employee Name' onkeyup='javascript:filterTable()'>
        </div>
        <div class="col-md-6 d-inline">
            <button type="button" class="btn btn-primary">Search</button>
        </div>
    </div>
    <div class="row pt-3">
        <div class="col-md-12">
            <div class="panel-body">
                <div id="contents" class="table-responsive-sm table-body">
                    <?php ShowAllTravel($empID); ?>
                        
                    </div>
            </div>
        </div>
    </div>
</div>


<script type='text/javascript'>
    function ApproveTravel()
    {
        $(".btnApprove").click(function(e)
        {
            if (confirm('Are you sure you want to approve this travel?'))
            {
                var thisID = $(this).attr('id');
                var url = "../controller/travelApprovalProcess.php";
                
                $.post (
                    url,
                    {
                        choice: 1,
                        row: thisID
                    },
                    function(data) { location.reload(true); }
                );
            }
        });
    }
</script>

<script type='text/javascript'>
    function RejectTravel()
    {
        $(".btnReject").click(function(e)
        {
            if (confirm('Are you sure you want to approve this travel?'))
            {
                var thisID = $(this).attr('id');
                var url = "../controller/travelApprovalProcess.php";
                
                $.post (
                    url,
                    { 
                        choice: 2,
                        row: thisID
                    },
                    function(data) { location.reload(true); }
                );
            }
        });
    }
</script>
<script type='text/javascript' src='../js/tableFilter.js'></script>

<?php include('../_footer.php');?>