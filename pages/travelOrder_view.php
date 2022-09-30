<?php
    session_start();

    if (empty($_SESSION["userid"]))
    {
        include_once('../loginfirst.php');
        exit();
    }
    else
    {
        include("../_header.php");
        include("../controller/travelOrder.php");
    }  
?>

<div class="container-fluid">

    <div class="row">
        <div class="col-md-12 pt-5">
            <h3>Travel Order</h3>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-12">
            <button type="button" class="btn btn-primary" id="applyTravelOrder">Apply Travel Order</button>
        </div>
    </div>

    <div class="pt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="panel-body">
                    <div id="tableList" class="table-responsive-sm table-body">
                        <?php ShowAllTravel($empName); ?>
                    </div>
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
                <h5 class="modal-title" id="popUpModalTitle"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div>
                    <div class="form-row pb-2">
                        <div class="col-md-2">
                            <label for="travelLocation">Location</label>
                        </div>
                        <div class="col-md-10">
                            <input type="text" id="travelLocation" name="travelLocation" class="form-control">
                        </div>
                    </div>

                    <div class="form-row pb-2">
                        <div class="col-md-2">
                            <label for="">From</label>
                        </div>

                        <div class="col-md-4">
                            <input type="date" id="dateFrom" name="dateFrom" class="form-control"
                                min="<?= date("Y-m-d"); ?>" value="<?= date("Y-m-d"); ?>" onkeydown="return false">
                        </div>

                        <div class="col-md-2">
                            <label for="">To</label>
                        </div>

                        <div class="col-md-4">
                            <input type="date" id="dateTo" name="dateTo" class="form-control"
                                min="<?= date("Y-m-d"); ?>" value="<?= date("Y-m-d"); ?>" onkeydown="return false">
                        </div>
                    </div>

                    <div class="form-row pb-2">
                        <div class="col-md-2">
                            <label for="travelDesc">Description</label>
                        </div>
                        <div class="col-md-10">
                            <textarea id="travelDesc" name="travelDesc" class="form-control"></textarea>
                        </div>

                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="Submit" onclick="javascript:filetravel()">Submit</button>
            </div>

        </div>
    </div>
</div>


<script type="text/javascript" src="../js/datepicker_standard_change.js"></script>
<script type="text/javascript">
    function filetravel() {
        var url = "../controller/travelOrderProcess.php";
        var lLoc = $("#travelLocation").val();
        var lDesc = $("#travelDesc").val();
        var lFrom = $("#dateFrom").val();
        var lTo = $("#dateTo").attr("value");

        if (lLoc != "" && lDesc != "") {
            $("#contents").html("");

            $.post(
                url, {
                    empCode: "<?= $empID ?>",
                    empName: "<?= $empName ?>",
                    travelLoc: lLoc,
                    dateFrom: lFrom,
                    dateTo: lTo,
                    travelDesc: lDesc
                },
                function (data) {
                    $("#contents").html(data).show();
                    location.reload();
                }
            );
        } else {
            alert("No fields should be left blank before filing a travel!");
        }
    }

    $(function(){
        $('#applyTravelOrder').click(function(){
            $('#popUpModal').modal('toggle');
        });
    });
</script>

<?php include("../_footer.php");?>