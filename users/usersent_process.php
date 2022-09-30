<?php


    include('../users/usersent.php');
    include('../config/db.php');

$usrEnt = new UsersEnt();

$usrent = json_decode($_POST["data"]);

if($usrent->{"Action"} == "InsertUsersEnt")
{

    $username = $usrent->{"username"};
    $userid = $usrent->{"userid"};
    $userpassword = $usrent->{"userpassword"};
    $usertype = $usrent->{"usertype"};
    $eMplogName = $usrent->{"eMplogName"};
    $status = $usrent->{"status"};


    $usrEnt->InsertUsersEnt($eMplogName,$username,$userid,$userpassword,$usertype,$status);

}
    

?>

