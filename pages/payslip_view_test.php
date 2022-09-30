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
        include('../controller/payslip.php');

        if (strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') == false)
        {
?>

<div class='container payslipContainer'>
    <div class='row'>
        <div class='col-lg-12'>
            <h3 class='subtitle'><u>Payslip Viewing</u></h3>
        </div>
    </div>
    <div class='row py-3'>
        <div class='col-4 cutoffsContainer'>
            <?php GetAllCutoff(); ?>
        </div>
        <div class='col-8'>
            <div id='contents'></div>
        </div>
    </div>
</div>

<script type='text/javascript' src='../report-generator/jsPDF-1.3.2/dist/jspdf.min.js'></script>
<script type='text/javascript' src='../report-generator/jsPDF-1.3.2/plugins/addimage.js'></script>
<script type='text/javascript' src='../report-generator/jsPDF-1.3.2/plugins/png_support.js'></script>
<script type='text/javascript'>
    $(".btnCutoff").click(function(e)
    {
        var thisID = $(this).attr("value");
        var url = "../controller/payslipPDFProcess.php";
        
        $.post (
            url,
            {
                row: thisID,
                empName: "<?php echo $empNameTemp[0] . "," . $empNameTemp[1]; ?>"
            },
            function(data) { $("#contents").html(data).show(); }
        );
    });
</script>

<?php
        }
        else
        {
            echo "
                <div class='container payslipContainer'></div>
                <span class='etcMessage'>
                    <script>
                        alert('Please use Mozilla Firefox to view payslips!');
                        $('.etcMessage').remove();
                    </script>
                </span>
            ";
        }
        
        include('../_footer.php');
    }
?>