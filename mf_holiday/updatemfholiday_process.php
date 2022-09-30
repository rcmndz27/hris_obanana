<?php

    include('../mf_holiday/updatemfholiday.php');
    include('../config/db.php');

    $action = $_POST["action"];
    $rowid = $_POST["rowid"];
    $holidaydate = $_POST["holidaydate"];
    $holidaytype = $_POST["holidaytype"];
    $holidaydescs = $_POST["holidaydescs"];
    $status = $_POST["status"];

    if ($action == 1)
    {
        UpdateMfholiday($rowid,$holidaydate,$holidaytype,$holidaydescs,$status);
    }

?>
