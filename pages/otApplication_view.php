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
        include('../controller/MasterFile.php');
        include("../controller/otApplication.php");

        $mf = new MasterFile();
        $dates = $mf->GetUnlockedCutOff();

    } 
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h3>Overtime Application</h3>
        </div>
    </div>

    <div class="pt-3">

        <div class="row align-items-end justify-content-end">
            <div class="col-md-12 mb-3">
                <button type="button" class="btn btn-primary" id="applyOT" >Apply Overtime</button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel-body">
                    <div id="tableList" class="table-responsive-sm table-body">
                        <?php GetOTHistory($empID); ?>
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
                    <div id='contents' class="row pt-3">
                        <div class="col-md-1">
                            <label class="d-inline">Date</label>
                        </div>
                        <div class="col-md-4 d-inline">
                            <input type="date" id="dateFrom" name="dateFrom" class="form-control form-control-sm text-center" value="<?= date('Y-m-d'); ?>" min="<?= date("Y-m-d", strtotime($dates[0])); ?>" max="<?= date("Y-m-d", strtotime($dates[1])); ?>" onkeydown="return false">
                        </div>
                        <div class="col-md-1">
                            <button id="btnAdd" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i></button>
                        </div>
                        <div class="col-md-6">
                            <input type="file" id="pdfupload"  accept=".pdf">
                        </div>
                    </div>

                    <div class="row datelist pt-3">
                        <div class="col-md-12">
                            <div class="table-responsive-sm table-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Pre Shift OT</th>
                                            <th>Post Shift OT</th>
                                            <th>Remarks</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                                for ($i = 1; $i < 8; $i++)
                                                {
                                                    echo '
                                                        <tr>
                                                            <td><label id="date'. $i . '"></label></td>
                                                            <td><input type="number" id="hrspre'. $i .'" class="form-control form-control-sm text-center" min="0"></td>
                                                            <td><input type="number" id="hrspost'. $i .'" class="form-control form-control-sm text-center" min="0"></td>
                                                            <td><input id="rem'.$i.'" class="col-md-10 form-control form-control-sm"></td>
                                                        </tr>';
                                                }
                                            ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <a href="#" id="btnFileOT" class="btn btn-small btn-primary">SUBMIT</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type='text/javascript' src='../js/datepicker_standard_change.js'></script>
<script type='text/javascript' src='../js/otApplication_dateconstraint.js'></script>
<script>
    $('#applyOT').click(function(e){
        e.preventDefault();
        $('#popUpModal').modal('toggle');
    });

    $('#btnFileOT').click(function()
    {
        var selectedFile = document.getElementById("pdfupload").files;
        var hrs_1 = $('#hrspre1').val();
        var hrs_2 = $('#hrspre2').val();
        var hrs_3 = $('#hrspre3').val();
        var hrs_4 = $('#hrspre4').val();
        var hrs_5 = $('#hrspre5').val();
        var hrs_6 = $('#hrspre6').val();
        var hrs_7 = $('#hrspre7').val();

        var hrs_1b = $('#hrspost1').val();
        var hrs_2b = $('#hrspost2').val();
        var hrs_3b = $('#hrspost3').val();
        var hrs_4b = $('#hrspost4').val();
        var hrs_5b = $('#hrspost5').val();
        var hrs_6b = $('#hrspost6').val();
        var hrs_7b = $('#hrspost7').val();

        var rem_1 = $('#rem1').val();
        var rem_2 = $('#rem2').val();
        var rem_3 = $('#rem3').val();
        var rem_4 = $('#rem4').val();
        var rem_5 = $('#rem5').val();
        var rem_6 = $('#rem6').val();
        var rem_7 = $('#rem7').val();

        if( CheckEmptyField(hrs_1) || CheckEmptyField(hrs_2) || CheckEmptyField(hrs_3) || CheckEmptyField(hrs_4) || CheckEmptyField(hrs_5) || CheckEmptyField(hrs_6) || CheckEmptyField(hrs_7) ||
            CheckEmptyField(hrs_1b) || CheckEmptyField(hrs_2b) || CheckEmptyField(hrs_3b) || CheckEmptyField(hrs_4b) || CheckEmptyField(hrs_5b) || CheckEmptyField(hrs_6b) || CheckEmptyField(hrs_7b) ||
            CheckEmptyField(rem_1) || CheckEmptyField(rem_2) || CheckEmptyField(rem_3) || CheckEmptyField(rem_4) || CheckEmptyField(rem_5) || CheckEmptyField(rem_6) || CheckEmptyField(rem_7) )
        {
            alert("Please fill in all fields!");
            return;
        }

        if (selectedFile.length == 0)
        {
            alert("No attachment uploaded!");
            return;
        }

        var url = '../controller/otApplicationProcess.php';
        
        // Select the very first file from list
        var fileToLoad = selectedFile[0];
        var base64;

        // FileReader function for read the file.
        var fileReader = new FileReader();

        // Onload of file read the file content
        fileReader.onload = function(fileLoadedEvent) {
            base64 = fileLoadedEvent.target.result;

            var empCode = '<?= $empID; ?>';
            var startdate = $("#dateFrom").val();
            var retbase64 = base64.replace('data:application/pdf;base64,', '');

            //console.log(retbase64);

            if (confirm('File selected OT Application?'))
            {
                $("#tableList").html('');

                $.post
                (
                    url,
                    {
                        _code: empCode,
                        _date: startdate,
                        _hrs: [hrs_1, hrs_2, hrs_3, hrs_4, hrs_5, hrs_6, hrs_7],
                        _hrs2: [hrs_1b, hrs_2b, hrs_3b, hrs_4b, hrs_5b, hrs_6b, hrs_7b],
                        _rem: [rem_1, rem_2, rem_3, rem_4, rem_5, rem_6, rem_7],
                        _base64: retbase64
                    },
                    function(data)
                    {
                        $("#tableList").html(data).show();
                    }
                );
            }
        };
        // Convert data to base64
        fileReader.readAsDataURL(fileToLoad);
    });

    function CheckEmptyField(str)
    {
        return str === null || str.match(/^ *$/) !== null;
    }
</script>

<?php include("../_footer.php");?>
