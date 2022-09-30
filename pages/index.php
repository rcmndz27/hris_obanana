<?php
    session_start();

    if (empty($_SESSION['userid']))
    {
        include_once('../loginfirst.php');
        exit();
    }
    else
    {
        include_once('../_header.php');

        GetLeaveCount($empCode,$empDateHired,$empType);

    }

    

?>

<div class='container-fluid'>
    <div class='row'>
        <?php 
            include('../pages/frontpage.php');
        ?>

    </div>
</div>



<?php include('../_footer.php');  ?>