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
        include('../elements/DropDown.php');
        include('../controller/otApproval.php');
        include('../controller/MasterFile.php');

        $mf = new MasterFile();
        $dd = new DropDown();
    }    
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 pt-5">
            <h3>Overtime Approval</h3>
        </div>
    </div>

    <div class="row pt-3">
        <div class="col-md-1">
            <label>Staff</label>
        </div>
        <div class="col-md-2">
            <?php $dd->GenerateDropDown("ddstaff", $mf->GetAllStaff($empID)); ?>
        </div>
        <div class="col-md-1">
            <label>Payroll Period</label>
        </div>
        <div class="col-md-2">
            <?php $dd->GenerateDropDown("ddcutoff", $mf->GetAllCutoff("payroll")); ?>
        </div>
        <div class="col-md-1">
            <button type="button" class="btn btn-primary" id="btnSearch">Search</button>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 pt-5" id='contents'>
            <span class='etcContent'></span>
        </div>
    </div>
    <div class='modal fade' id='rejectForm2' tabindex='-1' role='dialog' aria-labelledby='rejectform' aria-hidden='true'>
        <div class='modal-dialog' role='document'>
            <div class='modal-content small'>
                <div class='modal-header'>
                    <h4 class='modal-title'>OT Application Reject Form</h4>
                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                </div>
                <div class='modal-body'>
                    <span id='modal-data'></span>
                    <div class='row mb-2'>
                        <div class='col-sm-3 d-flex '>
                            <label class='p-0'><b>Remarks: </b></label>
                        </div>
                        <div class='col-sm-9'>
                            <input type='text' id='modal2-rem' class='w-100'>
                        </div>
                    </div>
                </div>
                <div class='modal-footer'>
                    <button type='button' id='autorejectConfirm' class='btn btn-primary' onclick='javascript:AutoRejectConfirm();'>Confirm</button>
                    <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancel</button>
                </div>
            </div>
        </div>
    </div>

</div>

<script type='text/javascript' src='../js/datepicker_standard_change.js'></script>
<script type='text/javascript'>
    $('#btnSearch').click(function(){
        if ($("#ddstaff").val() == "" || !$("#ddstaff").val())
        {
            alert("Please select an employee!");
            return;
        }

        try
        {
            $("body").css("cursor", "progress");
            RetrieveOt();

            if ($("#autocheck").prop("disabled"))
            {
                $("#autocheck").prop("disabled", false);
            }
        }
        finally
        {
            $("body").css("cursor", "default");
        }
    });

    function RetrieveOt()
    {
        var url = "../controller/otApprovalProcess.php";
        var cutoff = $('#ddcutoff').children("option:selected").val();
        var dates = cutoff.split(" - ");
        var empfilter = $("#ddstaff").children("option:selected").attr("data-val");

        $('#contents').html('');

        $.post (
            url,
            {
                choice: 3,
                empId: '<?= $empID; ?>',
                dateFrom: dates[0],
                dateTo: dates[1],
                emp: empfilter
            },
            function(data)
            {
                $("#contents").html(data).show();
                $("#tPlanned").html('');
                $("#tPlanned2").html('');
                $("#tRendered").html('');
                $("#tEditable").html('');

                var tplan = 0;
                var tplan2 = 0;
                var trendered = 0;
                var teditable = 0;

                $('.tplanned').each(function() {
                    var value = parseFloat($(this).text());
                    if (!isNaN(value)) {
                        tplan += value;
                    }
                });
                $('.tplanned2').each(function() {
                    var value = parseFloat($(this).text());
                    if (!isNaN(value)) {
                        tplan2 += value;
                    }
                });
                $('.trendered').each(function() {
                    var value = parseFloat($(this).text());
                    if (!isNaN(value)) {
                        trendered += value;
                    }
                });
                $('.editable').each(function() {
                    var value = parseFloat($(this).val());
                    if (!isNaN(value)) {
                        teditable += value;
                    }
                });

                $("#tPlanned").html(tplan.toFixed(2)).show();
                $("#tPlanned2").html(tplan2.toFixed(2)).show();
                $("#tRendered").html(trendered.toFixed(2)).show();
                $("#tEditable").html(teditable.toFixed(2)).show();

                if (trendered < 0.5)
                {
                    $("#autoapprove").prop("disabled", true);
                    $("#autoreject").prop("disabled", true);
                }
                else
                {
                    $("#autoapprove").prop("disabled", false);
                    $("#autoreject").prop("disabled", false);
                }
            }
        );
    }
</script>
<script>
    function AutoApprove()
    {
        if ($("#ddstaff").val() == "" || !$("#ddstaff").val())
        {
            alert("Please select an employee!");
            return;
        }

        var url = "../controller/otApprovalProcess.php";
        var cutoff = $('#ddcutoff').children("option:selected").val();
        var dates = cutoff.split(" - ");
        var empfilter = $("#ddstaff").children("option:selected").attr("data-val");
        var ibadge = "";
        var named = [];
        var badged = [];
        var dated = [];
        var hind = [];
        var houtd = [];
        var wrkd = [];
        var otrd = [];
        var otd = [];

        $("td.first").each(function(){
            var curID = $(this).find("label").attr("id").split("-");
            var prefix = curID[0].concat("-", curID[1], "-");
            var name = $("#".concat(prefix, "name")).html();
            var badge = curID[0];
            ibadge = curID[0];
            var date = $("#".concat(prefix, "date")).html();
            var hin = $("#".concat(prefix, "in")).html();
            var hout = $("#".concat(prefix, "out")).html();
            var wrk = $("#".concat(prefix, "worked")).html();
            var otr = $("#".concat(prefix, "ot")).html();
            var ot = $("#".concat(prefix, "otapp")).val();

            if (ot > 0.5 && $("#".concat(prefix, "check")).is(":checked"))
            {
                named.push(name);
                dated.push(date);
                badged.push(badge);
                hind.push(hin);
                houtd.push(hout);
                wrkd.push(wrk);
                otrd.push(otr);
                otd.push(ot);
            }
        });

        if (Object.keys(named).length <= 0)
        {
            alert("No overtime to be approved.");
            return;
        }
        
        if (confirm("Are you sure you want to approve all overtime applications?"))
        {
            $('#contents').html('');
            $("#tPlanned").html('');
            $("#tPlanned2").html('');
            $("#tRendered").html('');
            $("#tEditable").html('');

            $.post(
                url,
                {
                    choice: 4,
                    empId: '<?= $empID; ?>',
                    dateFrom: dates[0],
                    dateTo: dates[1],
                    emp: empfilter,
                    _ibadge: ibadge,

                    _name: named,
                    _badge: badged,
                    _date: dated,
                    _hin: hind,
                    _hout: houtd,
                    _wrk: wrkd,
                    _otr: otrd,
                    _ot: otd,
                    _usr: '<?= $empID; ?>',
                    _dateFrom: dates[0],
                    _dateTo: dates[1]
                },
                function(data)
                {
                    $("#contents").html(data).show();

                    var tplan = 0;
                    var tplan2 = 0;
                    var trendered = 0;
                    var teditable = 0;

                    $('.tplanned').each(function() {
                        var value = parseFloat($(this).text());
                        if (!isNaN(value)) {
                            tplan += value;
                        }
                    });
                    $('.tplanned2').each(function() {
                        var value = parseFloat($(this).text());
                        if (!isNaN(value)) {
                            tplan2 += value;
                        }
                    });
                    $('.trendered').each(function() {
                        var value = parseFloat($(this).text());
                        if (!isNaN(value)) {
                            trendered += value;
                        }
                    });
                    $('.editable').each(function() {
                        var value = parseFloat($(this).val());
                        if (!isNaN(value)) {
                            teditable += value;
                        }
                    });

                    $("#tPlanned").html(tplan.toFixed(2)).show();
                    $("#tPlanned2").html(tplan2.toFixed(2)).show();
                    $("#tRendered").html(trendered.toFixed(2)).show();
                    $("#tEditable").html(teditable.toFixed(2)).show();

                    if (trendered < 0.5)
                    {
                        $("#autoapprove").prop("disabled", true);
                        $("#autoreject").prop("disabled", true);
                    }
                    else
                    {
                        $("#autoapprove").prop("disabled", false);
                        $("#autoreject").prop("disabled", false);
                    }
                }
            );
        }
    }
</script>
<script>
    function AutoRejectConfirm()
    {
        if ($("#ddstaff").val() == "" || !$("#ddstaff").val())
        {
            alert("Please select an employee!");
            return;
        }

        var url = "../controller/otApprovalProcess.php";
        var cutoff = $('#ddcutoff').children("option:selected").val();
        var dates = cutoff.split(" - ");
        var empfilter = $("#ddstaff").children("option:selected").attr("data-val");
        var ibadge = "";
        var named = [];
        var badged = [];
        var dated = [];
        var hind = [];
        var houtd = [];
        var wrkd = [];
        var otrd = [];

        $("td.first").each(function(){
            var curID = $(this).find("label").attr("id").split("-");
            var prefix = curID[0].concat("-", curID[1], "-");

            var name = $("#".concat(prefix, "name")).html();
            var badge = curID[0];
            ibadge = curID[0];
            var date = $("#".concat(prefix, "date")).html();
            var hin = $("#".concat(prefix, "in")).html();
            var hout = $("#".concat(prefix, "out")).html();
            var wrk = $("#".concat(prefix, "worked")).html();
            var otr = $("#".concat(prefix, "ot")).html();

            if ($("#".concat(prefix, "ot")).html() > 0.5 && $("#".concat(prefix, "check")).is(":checked"))
            {
                named.push(name);
                dated.push(date);
                badged.push(badge);
                hind.push(hin);
                houtd.push(hout);
                wrkd.push(wrk);
                otrd.push(otr);
            }
        });

        if (Object.keys(named).length <= 0)
        {
            alert("No overtime to be approved.");
            return;
        }

        var modalObjectContent = $("#rejectForm2 .modal-body");
        var rem = modalObjectContent.find("#modal2-rem").val();

        if (confirm("Are you sure you want to reject all overtime applications?"))
        {
            $('#contents').html('');
            $("#tPlanned").html('');
            $("#tPlanned2").html('');
            $("#tRendered").html('');
            $("#tEditable").html('');

            $.post(
                url,
                {
                    choice: 5,
                    empId: '<?= $empID; ?>',
                    dateFrom: dates[0],
                    dateTo: dates[1],
                    emp: empfilter,
                    _ibadge: ibadge,

                    _name: named,
                    _badge: badged,
                    _date: dated,
                    _hin: hind,
                    _hout: houtd,
                    _wrk: wrkd,
                    _otr: otrd,
                    _usr: '<?= $empID; ?>',
                    _dateFrom: dates[0],
                    _dateTo: dates[1],
                    _rem: rem
                },
                function(data)
                {
                    $('#rejectForm2').modal('hide');
                    $('.modal-backdrop').remove();
                    $("#contents").html(data).show();

                    var tplan = 0;
                    var tplan2 = 0;
                    var trendered = 0;
                    var teditable = 0;

                    $('.tplanned').each(function() {
                        var value = parseFloat($(this).text());
                        if (!isNaN(value)) {
                            tplan += value;
                        }
                    });
                    $('.tplanned2').each(function() {
                        var value = parseFloat($(this).text());
                        if (!isNaN(value)) {
                            tplan2 += value;
                        }
                    });
                    $('.trendered').each(function() {
                        var value = parseFloat($(this).text());
                        if (!isNaN(value)) {
                            trendered += value;
                        }
                    });
                    $('.editable').each(function() {
                        var value = parseFloat($(this).val());
                        if (!isNaN(value)) {
                            teditable += value;
                        }
                    });

                    $("#tPlanned").html(tplan.toFixed(2)).show();
                    $("#tPlanned2").html(tplan2.toFixed(2)).show();
                    $("#tRendered").html(trendered.toFixed(2)).show();
                    $("#tEditable").html(teditable.toFixed(2)).show();

                    if (trendered < 0.5)
                    {
                        $("#autoapprove").prop("disabled", true);
                        $("#autoreject").prop("disabled", true);
                    }
                    else
                    {
                        $("#autoapprove").prop("disabled", false);
                        $("#autoreject").prop("disabled", false);
                    }
                }
            );
        }
    }
</script>
<?php  include('../_footer.php'); ?>