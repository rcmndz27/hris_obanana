<?php
    session_start();
    if (empty($_SESSION["userid"]))
    {
        header( "refresh:1;url=../index.php" );
    }
    else
    {
        include("../_header.php");

        if ($empUserType == 'Admin' || $empUserType == 'HR Generalist' ||$empUserType == 'HR Manager' || $empUserType == 'Group Head')
        {
            include("../admin_tool/newhire-access.php");
        }
        else
        {
            header( "refresh:1;url=../index.php" );
        }
    }
    $datehired = date("d-m-Y");

?>

<script type="text/javascript" src="../admin_tool/newhire-access.js"></script>
<script type="text/javascript" src="../applicantprofile/validator.js"></script>


<div class="container-fluid">

    <div class="form-row">
        <div class="col-md-12 pb-3">
            <h3 class="display-5 pt-5">New Hire Access</h3>
        </div>
    </div>

    <div class="form-row">

        <div class="col-md-3">
            <div class="form-group">
                <label class="col-form-label" for="firstname">Employee Code</label>
                <input type="text" class="form-control inputtext" id="employeecode" name="employeecode">
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label class="col-form-label" for="firstname">First Name</label>
                <input type="text" class="form-control inputtext" id="firstname" name="firstname">
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label class="col-form-label" for="middlename">Middle Name</label>
                <input type="text" class="form-control" name="middlename" id="middlename">
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label class="col-form-label" for="lastname">Last Name</label>
                <input type="text" class="form-control inputtext" name="lastname" id="lastname">
            </div>
        </div>

    </div>

    <div class="form-row">

        <div class="col-md-3">
            <div class="form-group">
                <label class="col-form-label" for="companylist">Company</label>
                <select class="form-control inputtext" id="companylist"></select>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label class="col-form-label" for="departmentlist">Department</label>
                <select class="form-control inputtext" id="departmentlist"></select>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label class="col-form-label" for="locationlist">Location</label>
                <select class="form-control inputtext" id="locationlist"></select>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label class="col-form-label" for="levellist">Employee Level</label>
                <select class="form-control inputtext" id="levellist"></select>
            </div>
        </div>

    </div>

    <div class="form-row">

        <div class="col-md-4">
            <div class="form-group">
                <label class="col-form-label" for="employeetypelist">Employee Type</label>
                <select class="form-control inputtext" id="employeetypelist"></select>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label class="col-form-label" for="employeereportingtolist">Employee Reporting To</label>
                <select class="form-control inputtext" id="employeereportingtolist"></select>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label class="col-form-label" for="prcexpirydate">Date Hired</label>
                <input type="date" class="form-control inputtext" name="datehired" id="datehired" value="<?php echo date('Y-m-d'); ?>">
            </div>
        </div>

    </div>

    <div class="form-row">
       
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-form-label" for="positionList">Position Applying For</label>
                <select class="form-control inputtext" id="positionList"></select>
            </div>
        </div>

        <div class="col-md-6" id="otherpositionholder">
            <div class="form-group">
                <label class="col-form-label" for="otherposition">Other Position</label>
                <input type="text" class="form-control" id="otherposition" name="otherposition">
            </div>
        </div>

    </div>

    <div class="form-row pt-3">
        <div class="col-lg-12">
            <button type="submit" class="btn btn-primary submit" id="submit">Submit</button>
        </div>
    </div>



</div>

<script type="text/javascript" src="../admin_tool/newhire-access.js"></script>



<?php include('../_footer.php');  ?>