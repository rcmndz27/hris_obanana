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
        include('../controller/indexProcess.php');
?>

    <h1>Service Request Form</h1>
    <form action="../controller/supportProcess.php" method="post">

    <!-- Employee Information -->
        <h2>Employee Information</h2>
        <label>Date: <?= date('M d,Y'); ?></label> <br />
        <label>Full Name:</label> <input type="text" name="FullName" value="<?= $empName; ?>" readonly><br />
        <label>Department:</label> <input type="text" name="Department" value="<?= $empDept; ?>" readonly><br />
        <label>Email Address:</label> <input type="text" name="EmailAddress" value="<?= $empEmail; ?>" readonly>
    <!-- End of Employee Information -->

    <!-- Service Requested -->
        <h2>Type of Service/s Requested</h2>
        <h3>Information and Communication Services</h3>
        <input type="checkbox" value="Software Installation" name="ServiceRequest[]"> Software Installation
        <input type="checkbox" value="Network Problem" name="ServiceRequest[]"> Network Problem
        <input type="checkbox" value="Internet Access" name="ServiceRequest[]"> Internet Access
        <input type="checkbox" value="Network Connection" name="ServiceRequest[]"> Network Connection
        <input type="checkbox" value="Printer Problem" name="ServiceRequest[]"> Printer Problem
        <input type="checkbox" value="Telephone Problem" name="ServiceRequest[]"> Telephone Problem
        <input type="checkbox" value="Computer Problem" name="ServiceRequest[]"> Computer Problem
        <input type="checkbox" value="Domain Account" name="ServiceRequest[]"> Domain Account
        <input type="checkbox" value="Acumatica Account" name="ServiceRequest[]"> Acumatica Account
        <input type="checkbox" value="SAP Account" name="ServiceRequest[]"> SAP Account
        <input type="checkbox" value="Email Account" name="ServiceRequest[]"> Email Account
        <input type="checkbox" value="Internet Portal Account" name="ServiceRequest[]"> Internet Portal Account
        <input type="checkbox" value="Move/Transfer of IT Units" name="ServiceRequest[]"> Move/Transfer of IT Units
        <input type="checkbox" value="Hardware Installation" name="ServiceRequest[]"> Hardware Installation
        <br /><br />
        <h3>Other Services</h3>
        <input type="checkbox" value="Install/Repair CCTV Camera" name="OtherSvcReq[]"> Install/Repair CCTV Camera
        <input type="checkbox" value="Relocate/Remove CCTV Camera" name="OtherSvcReq[]"> Relocate/Remove CCTV Camera
        <input type="checkbox" value="Install/Repair DVR" name="OtherSvcReq[]"> Install/Repair DVR
        <input type="checkbox" value="Install/Repair Biometrics" name="OtherSvcReq[]"> Install/Repair Biometrics
        <input type="checkbox" id="other_svcs_checkbox" value="Others" name="OtherSvcReq[]"> Others
        <div id="other_svcs_div" style="display:none;">
            <textarea name="other_services" rows="10" cols="50"></textarea>
        </div>

        <!-- End of Service Requested -->
    
        <!-- Brief Description of Service Request -->

        <h2>Please provide a brief description of the service requested: </h2>
        <textarea name="svc_desc" rows="10" cols="50" required></textarea> <br />

        <!-- End of Description -->

        <br /><input type="submit" name="submit" value="Submit">
    </form>

    <script type="text/javascript">
        $('#other_svcs_checkbox').change(function() {
            $('#other_svcs_div').toggle();
        });

        $('#emp_FullName').on('input', function() {
        var c = this.selectionStart,
            r = /[^a-z A-Z0-9]+$/gi,
            v = $(this).val();

        if(r.test(v)) {
            $(this).val(v.replace(r, ''));
            c--;
        }

        this.setSelectionRange(c, c);
        });

        function resizeInput() {
            $(this).attr('size', $(this).val().length);
        }

        $('input[type="text"]').keyup(resizeInput).each(resizeInput);
    </script>

<?php include('../_footer.php'); } ?>