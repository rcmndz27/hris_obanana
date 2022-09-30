<?php

    include('../payroll/updateatt.php');
    include('../config/db.php');

    $action = $_POST["action"];
    $badge_no = $_POST["badge_no"];
    $rowid = $_POST["rowid"];
    $tot_days_absent = $_POST["tot_days_absent"];
    $tot_days_work = $_POST["tot_days_work"];   
    $tot_lates = $_POST["tot_lates"];  
    $total_undertime = $_POST["total_undertime"]; 
    $total_adjstmenthrs = $_POST["total_adjstmenthrs"];    
    $tot_overtime_reg = $_POST["tot_overtime_reg"];
    $night_differential = $_POST["night_differential"];
    $night_differential_ot = $_POST["night_differential_ot"];
    $tot_regholiday = $_POST["tot_regholiday"];
    $tot_overtime_regholiday = $_POST["tot_overtime_regholiday"];
    $tot_regholiday_nightdiff = $_POST["tot_regholiday_nightdiff"];
    $tot_overtime_regholiday_nightdiff = $_POST["tot_overtime_regholiday_nightdiff"];
    $tot_spholiday = $_POST["tot_spholiday"];
    $tot_overtime_spholiday = $_POST["tot_overtime_spholiday"];
    $tot_spholiday_nightdiff = $_POST["tot_spholiday_nightdiff"];
    $tot_overtime_spholiday_nightdiff = $_POST["tot_overtime_spholiday_nightdiff"];
    $tot_rest = $_POST["tot_rest"];
    $tot_overtime_rest = $_POST["tot_overtime_rest"];
    $night_differential_rest = $_POST["night_differential_rest"];
    $night_differential_ot_rest = $_POST["night_differential_ot_rest"];
    $tot_overtime_rest_regholiday = $_POST["tot_overtime_rest_regholiday"];
    $night_differential_rest_regholiday = $_POST["night_differential_rest_regholiday"];
    $tot_overtime_night_diff_rest_regholiday = $_POST["tot_overtime_night_diff_rest_regholiday"];
    $tot_overtime_sprestholiday = $_POST["tot_overtime_sprestholiday"];
    $tot_sprestholiday_nightdiff = $_POST["tot_sprestholiday_nightdiff"];
    $tot_overtime_sprestholiday_nightdiff = $_POST["tot_overtime_sprestholiday_nightdiff"];
    $workfromhome = $_POST["workfromhome"];
    $offbusiness = $_POST["offbusiness"];
    $sick_leave = $_POST["sick_leave"];
    $vacation_leave = $_POST["vacation_leave"];           
    $sick_leave_nopay = $_POST["sick_leave_nopay"];
    $vacation_leave_nopay = $_POST["vacation_leave_nopay"];  

    if ($action == 1)
    {

UpdateAtt($badge_no,$rowid,$tot_days_absent,$tot_days_work,$tot_lates,$total_undertime,$total_adjstmenthrs,$tot_overtime_reg,$night_differential,$night_differential_ot,$tot_regholiday,$tot_overtime_regholiday,$tot_regholiday_nightdiff,$tot_overtime_regholiday_nightdiff,$tot_spholiday,$tot_overtime_spholiday,$tot_spholiday_nightdiff,$tot_overtime_spholiday_nightdiff,$tot_rest,$tot_overtime_rest,$night_differential_rest,$night_differential_ot_rest,$tot_overtime_rest_regholiday,$night_differential_rest_regholiday,$tot_overtime_night_diff_rest_regholiday,$tot_overtime_sprestholiday,$tot_sprestholiday_nightdiff,$tot_overtime_sprestholiday_nightdiff,$workfromhome,$offbusiness,
    $sick_leave,$vacation_leave,$sick_leave_nopay,$vacation_leave_nopay);
    }

?>
