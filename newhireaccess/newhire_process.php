<?php

    include('../newhireaccess/newhire-access.php');
    include('../config/db.php');

    $dd = new NewHireAccess();
    $empStatus = $_POST["empStatus"];

    $dd->GetAllEmpHistory($empStatus);

?>