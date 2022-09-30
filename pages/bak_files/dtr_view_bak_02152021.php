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
        include('../controller/dtr.php');
    }
        
?>

<script type='text/javascript' src='../js/dtr.js'></script>
<script src="<?= constant('NODE'); ?>xlsx/dist/xlsx.core.min.js"></script>
<script src="<?= constant('NODE'); ?>file-saverjs/FileSaver.min.js"></script>
<script src="<?= constant('NODE'); ?>tableexport/dist/js/tableexport.min.js"></script>
<script type="text/javascript" src='../js/script.js'></script>


<div class="container-fluid">
    <div>
        <div class="form-row">
            <div class="col-md-12 pt-5">
                <h3>Attendance</h3>
            </div>
        </div>

        <div class="form-row pt-3">

            <div class="col-md-1 my-1">
                <label class="control-label" for="dateFrom">From</label>
            </div>

            <div class="col-md-3 my-1">
                <input type="date" id="dateFrom" class="form-control" name="dateFrom" value="<?= date('Y-m-d') ?>"
                    onkeydown="return false">
            </div>

            <div class="col-md-1 my-1">
                <label class="control-label" for="dateTo">To</label>
            </div>

            <div class="col-md-3 my-1">
                <input type="date" id="dateTo" class="form-control" name="dateTo" value="<?= date('Y-m-d') ?>"
                    onkeydown="return false">
            </div>

            <div class="col-md-2 my-1">
                <input type="submit" id="search" class="btn btn-primary" value="Search">
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="panel-body">
                <div id="tableList" class="table-responsive-sm table-body"></div>
            </div>
        </div>
    </div>
</div>

<?php include('../_footer.php');  ?>






