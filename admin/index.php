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
        include('../controller/payrollApproval.php');

        if ($_SESSION['write'] == true)
        {
            $dir = @"D:\HRIS\Logs";
            $myFile = $dir . @"\login.txt";

            if ($empID == 'fltc')
            {
                $message = (string)(date('Y-m-d H:i:s')) . "....." . $empID . "..... FLTC";
            }
            else if ($empID == 'jgnp')
            {
                $message = (string)(date('Y-m-d H:i:s')) . "....." . $empID . "..... JGNP";
            }
            else
            {
                $message = (string)(date('Y-m-d H:i:s')) . "..... UNKNOWN USER! ";
            }

            if (!file_exists($dir)) {
                mkdir($dir, 0777, true);
            }

            $fh = fopen($myFile, (file_exists($myFile)) ? 'a' : 'w');
            fwrite($fh, "\r\n" . $message);
            fclose($fh);

            $_SESSION['write'] = false;
        }
?>

<div class='container payrollApprovalContainer' style='position: relative;'>
    <div class='d-flex my-2'>
        <h3 class='subtitle'><u>Payroll Approval</u></h3>
    </div>
    <div id='contents' class='px-3'>

        <?php

            $datefrom_1 = date('m/d/y', strtotime(strval(date('Y')) . '/' . strval(date('m')) . '/' . strval('8')));
            $dateto_1 = date('m/d/y', strtotime(strval(date('Y')) . '/' . strval(date('m')) . '/' . strval('22')));

            $datefrom_2 = date('m/d/y', strtotime(strval(date('Y')) . '/' . strval(date("m", strtotime(date('Y-m-d') ." -1 month"))) . '/' . strval('23')));
            $dateto_2 = date('m/d/y', strtotime(strval(date('Y')) . '/' . strval(date('m')) . '/' . strval('7')));

            if (date('d') >= 8 && date('d') <= 22)
            {
                if ($empID == 'PMI18000072')
                {
                    GeneratePayroll($datefrom_2, $dateto_2, $datefrom_1, $dateto_1, "1");
                }
                else if ($empID == 'PMI12000001')
                {
                    GeneratePayroll($datefrom_2, $dateto_2, $datefrom_1, $dateto_1, "2");
                }
                else {}
            }
            else if (date('d') >= 23 || date('d') <= 7)
            {
                if ($empID == 'PMI18000072')
                {
                    GeneratePayroll($datefrom_1, $dateto_1, $datefrom_2, $dateto_2, "1");
                }
                else if ($empID == 'PMI12000001')
                {
                    GeneratePayroll($datefrom_1, $dateto_1, $datefrom_2, $dateto_2, "2");
                }
                else {}
            }
        ?>

    </div>
    <div class='container d-flex justify-content-end px-5'>
        <button class='btn btn-primary'>APPROVE</button>
    </div>
</div>

<?php include('../_footer.php'); } ?>