<?php 
              

function GenDtr(){

           
    global $connL;
    global $connL;

    $cmd2 = $connL->prepare('EXEC LoadEmployeeDTROBNDetails');
    $cmd2->execute();

    $cmd = $connL->prepare('EXEC LoadEmployeeDTRDetails');
    $cmd->execute();
                                       
}


?>
