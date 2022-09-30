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
    // include('../payroll_att/gen_att.php');
    include('../elements/DropDown.php');
    include('../controller/MasterFile.php');

    $mf = new MasterFile();
    $dd = new DropDown();
    $empCode = $_SESSION['userid'];

    if ($empUserType == 'Admin' || $empUserType == 'HR Generalist' ||$empUserType == 'HR Manager' || $empUserType == 'Group Head' || $empUserType == 'President')
    {

    }else{
        echo '<script type="text/javascript">swal({text:"You do not have access here!",icon:"error"});';
        echo "window.location.href = '../index.php';";
        echo "</script>";
    }

}

?>

<script type='text/javascript' src='../att_report/att_rep.js'></script>
<link rel="stylesheet" type="text/css" href="../pages/dtr.css">
<div id = "myDiv" style="display:none;" class="loader"></div>
<div class="container">
    <div class="section-title">
          <h2>ATTENDANCE REPORTS MODULE</h2>
        </div>
    <div class="main-body mbt">
          <!-- Breadcrumb -->
          <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item active" aria-current="page"><b><i class='fas fa-users fa-fw'>
                        </i>&nbsp; ATTENDANCE REPORTS MODULE</b></li>
            </ol>
          </nav>

                <ul class="nav nav-tabs tabrec" id="myTab" name="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="attendance-tab" name="attendance-tab" data-toggle="tab"
                            href="#attendance" role="tab" aria-controls="attendance" aria-selected="true">Perfect Attendance</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="late-tab" name="late-tab" data-toggle="tab" href="#late"
                            role="tab" aria-controls="late" aria-selected="false">Late</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="undertime-tab" name="undertime-tab" data-toggle="tab" href="#undertime" role="tab"
                            aria-controls="undertime" aria-selected="false">Undertime</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="dtr-tab" name="dtr-tab" data-toggle="tab" href="#dtr" role="tab"
                            aria-controls="dtr" aria-selected="false">NO LOGS</a>
                    </li>                    
                </ul>
               
                <!-- ATTENDANCE -->
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade active show" id="attendance" role="tabpanel" aria-labelledby="attendance-tab">
                      <fieldset class="fieldset-border">
                            <div class="d-flex justify-content-center">
                                <legend class="fieldset-border pad2">
                                    PERFECT ATTENDANCE <span id="pfromt"></span> <span id="ptot"></span>
                                </legend>
                             </div>
                    <div class="form-row">
                            <input type="text" name="empCode" id="empCode" value="<?php $empCode ?>" hidden>
                                <label class="control-label pad" for="dateFrom">FROM:</label>
                            <div class="col-md-2">
                                <input type="date" id="dateFrom" class="form-control" name="dateFrom"
                                    value="<?php echo date('Y-m-d'); ?>" onkeydown="return false">
                            </div>
                                <label class="control-label pad" for="dateTo">TO:</label>
                            <div class="col-md-2">
                                <input type="date" id="dateTo" class="form-control" name="dateTo" value="<?php echo date('Y-m-d'); ?>" onkeydown="return false">
                            </div>
                            <div class="col-md-1">
                                <button type="submit" id="searchPerfect" class="genpyrll"><i class="fas fa-search-plus"></i> GENERATE
                                </button>
                            </div>
                        </div>  
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel-body">
                            <div id="attRepListTab" class="table-responsive-sm table-body"></div>
                        </div>
                    </div>
                </div>                                                        
                    </fieldset>
                </div>
                <!-- late -->
                <div class="tab-pane fade" id="late" role="tabpanel" aria-labelledby="late-tab">
                    <fieldset class="fieldset-border">
                        <div class="d-flex justify-content-center">
                            <legend class="fieldset-border pad2">
                                LATES  <span id="Lpfromt"></span> <span id="Lptot"></span>
                            </legend>
                        </div>
                    <div class="form-row">
                            <input type="text" name="empCode" id="empCode" value="<?php $empCode ?>" hidden>
                                <label class="control-label pad" for="dateFrom">FROM:</label>
                            <div class="col-md-2">
                                <input type="date" id="dateFromL" class="form-control" name="dateFromL"
                                    value="<?php echo date('Y-m-d'); ?>" onkeydown="return false">
                            </div>
                                <label class="control-label pad" for="dateTo">TO:</label>
                            <div class="col-md-2">
                                <input type="date" id="dateToL" class="form-control" name="dateToL" value="<?php echo date('Y-m-d'); ?>" onkeydown="return false">
                            </div>
                            <div class="col-md-1">
                                <button type="submit" id="searchLate" class="genpyrll"><i class="fas fa-search-plus"></i> GENERATE
                                </button>
                            </div>
                        </div>  
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel-body">
                            <div id="lateListTab" class="table-responsive-sm table-body"></div>
                        </div>
                    </div>
                </div>     
                    </fieldset>
                </div>
                <!-- UNDERTIME -->
                    <div class="tab-pane fade" id="undertime" role="tabpanel" aria-labelledby="undertime-tab">
                        <fieldset class="fieldset-border">
                            <div class="d-flex justify-content-center">
                                <legend class="fieldset-border pad2">
                                   UNDERTIME  <span id="Upfromt"></span> <span id="Uptot"></span>
                            </legend>
                        </div>
                    <div class="form-row">
                            <input type="text" name="empCode" id="empCode" value="<?php $empCode ?>" hidden>
                                <label class="control-label pad" for="dateFrom">FROM:</label>
                            <div class="col-md-2">
                                <input type="date" id="dateFromU" class="form-control" name="dateFromU"
                                    value="<?php echo date('Y-m-d'); ?>" onkeydown="return false">
                            </div>
                                <label class="control-label pad" for="dateTo">TO:</label>
                            <div class="col-md-2">
                                <input type="date" id="dateToU" class="form-control" name="dateToU" value="<?php echo date('Y-m-d'); ?>" onkeydown="return false">
                            </div>
                            <div class="col-md-1">
                                <button type="submit" id="searchUT" class="genpyrll"><i class="fas fa-search-plus"></i> GENERATE
                                </button>
                            </div>
                        </div>  
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel-body">
                            <div id="utListTab" class="table-responsive-sm table-body"></div>
                        </div>
                    </div>
                </div>     
                    </fieldset>
                </div>                    
                <!-- NO LOGS -->
                    <div class="tab-pane fade" id="dtr" role="tabpanel" aria-labelledby="dtr-tab">
                        <fieldset class="fieldset-border">
                            <div class="d-flex justify-content-center">
                                <legend class="fieldset-border pad2">
                                    NO LOG IN/OUT <span id="Npfromt"></span> <span id="Nptot"></span>
                            </legend>
                        </div>
                    <div class="form-row">
                            <input type="text" name="empCode" id="empCode" value="<?php $empCode ?>" hidden>
                                <label class="control-label pad" for="dateFrom">FROM:</label>
                            <div class="col-md-2">
                                <input type="date" id="dateFromN" class="form-control" name="dateFromN"
                                    value="<?php echo date('Y-m-d'); ?>" onkeydown="return false">
                            </div>
                                <label class="control-label pad" for="dateTo">TO:</label>
                            <div class="col-md-2">
                                <input type="date" id="dateToN" class="form-control" name="dateToN" value="<?php echo date('Y-m-d'); ?>" onkeydown="return false">
                            </div>
                            <div class="col-md-1">
                                <button type="submit" id="searchN" class="genpyrll"><i class="fas fa-search-plus"></i> GENERATE
                                </button>
                            </div>
                        </div>  
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel-body">
                                    <div id="nListTab" class="table-responsive-sm table-body"></div>
                                </div>
                            </div>
                        </div>     
                    </fieldset>
                    </div>                    
    </div>
</div>

<script type="text/javascript">

// perfect attendance 

           $('#dateTo').change(function(){

                if($('#dateTo').val() < $('#dateFrom').val()){

                    swal({text:"DATE TO must be greater than date from!",icon:"error"});

                    var input2 = document.getElementById('dateTo');
                    input2.value = '';               
                }
            });


            $('#dateFrom').change(function(){

                if($('#dateFrom').val() > $('#dateTo').val()){
                    var input2 = document.getElementById('dateTo');
                    document.getElementById("dateTo").min = $('#dateFrom').val();
                    input2.value = '';
                }
            });

// late 
           $('#dateToL').change(function(){

                if($('#dateToL').val() < $('#dateFromL').val()){

                    swal({text:"DATE TO must be greater than date from!",icon:"error"});

                    var input2 = document.getElementById('dateToL');
                    input2.value = '';               
                }
            });


            $('#dateFromL').change(function(){

                if($('#dateFromL').val() > $('#dateToL').val()){
                    var input2 = document.getElementById('dateToL');
                    document.getElementById("dateToL").min = $('#dateFromL').val();
                    input2.value = '';
                }
            });

// undertime 

        $('#dateToU').change(function(){

                if($('#dateToU').val() < $('#dateFromU').val()){

                    swal({text:"DATE TO must be greater than date from!",icon:"error"});

                    var input2 = document.getElementById('dateToU');
                    input2.value = '';               
                }
            });


            $('#dateFromU').change(function(){

                if($('#dateFromU').val() > $('#dateToU').val()){
                    var input2 = document.getElementById('dateToU');
                    document.getElementById("dateToU").min = $('#dateFromU').val();
                    input2.value = '';
                }
            });

// no logs 

           $('#dateToN').change(function(){

                if($('#dateToN').val() < $('#dateFromN').val()){

                    swal({text:"DATE TO must be greater than date from!",icon:"error"});

                    var input2 = document.getElementById('dateToN');
                    input2.value = '';               
                }
            });


            $('#dateFromN').change(function(){

                if($('#dateFromN').val() > $('#dateToN').val()){
                    var input2 = document.getElementById('dateToN');
                    document.getElementById("dateToN").min = $('#dateFromN').val();
                    input2.value = '';
                }
            });

</script>
<?php include('../_footer.php');  ?>
