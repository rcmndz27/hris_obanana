<?php 
session_start(); 
include('config/db.php');
include('class/userClass.php');
include('controller/indexProcess.php');

$userClass = new userClass();

$errorMsgReg='';
$errorMsgLogin='';

if (!empty($_POST['loginSubmit'])) 
{
    $userid = $_POST['userid'];
    $password = $_POST['password'];

    $date1 = date("Y-m-d");
    $date2 = date("Y-m-d", strtotime($date1 . " +1 day"));
    $dateatt = date("Y-m-d H:i:s");
    $action_f = "LOGIN -FAILED";
    $action_s = "LOGIN -SUCCESS";


    // echo $date1.", ".$date2.", ".$dateatt.", ".$action_f.", ".$action_s;

    $validator = $connL->prepare(@"SELECT COUNT(*) FROM dbo.logs WHERE emp_code = :id AND date >= :date1 AND date <= :date2 AND action = :act");
    $validator->bindParam(":id", $userid, PDO::PARAM_STR);
    $validator->bindParam(":date1", $date1, PDO::PARAM_STR);
    $validator->bindParam(":date2", $date2, PDO::PARAM_STR);
    $validator->bindParam(":act", $action_f, PDO::PARAM_STR);
    $validator->execute();

    if ($validator->fetchColumn() >= 3)
    {

        $_SESSION['msg_blocked'] = 'YOUR ACCOUNT IS BLOCKED! PLEASE CONTACT YOUR ADMINISTRATOR!';
    }
    else
    {
        if(strlen(trim($userid))>=1 && strlen(trim($password))>=1 )
        {
            $uid = $userClass->userLogin($userid,$password);

            if($uid)
            {
                $_SESSION['write'] = true;
                $_SESSION['userid'] = $userid;
                $_SESSION['expire'] = $_SESSION['start'] + (30 * 60);
                
                $url = 'pages/index.php';
                $url_2 = 'pages/index.php';

                if ($userid == 'PMI12000001' || $userid == 'PMI18000072')
                {
                    $ins = $connL->prepare(@"INSERT INTO dbo.logs VALUES(:id, :act, :date)");
                    $ins->bindParam(":id", $userid, PDO::PARAM_STR);
                    $ins->bindParam(":act", $action_s, PDO::PARAM_STR);
                    $ins->bindParam(":date", $dateatt, PDO::PARAM_STR);
                    $ins->execute();

                    header("Location: $url");
                }
                else
                {
                    $ins = $connL->prepare(@"INSERT INTO dbo.logs VALUES(:id, :act, :date)");
                    $ins->bindParam(":id", $userid, PDO::PARAM_STR);
                    $ins->bindParam(":act", $action_s, PDO::PARAM_STR);
                    $ins->bindParam(":date", $dateatt, PDO::PARAM_STR);
                    $ins->execute();
                    
                    header("Location: $url");
                }
            }
            else
            {
                $ins = $connL->prepare(@"INSERT INTO dbo.logs VALUES(:id, :act, :date)");
                $ins->bindParam(":id", $userid, PDO::PARAM_STR);
                $ins->bindParam(":act", $action_f, PDO::PARAM_STR);
                $ins->bindParam(":date", $dateatt, PDO::PARAM_STR);
                $ins->execute();
                
               $_SESSION['msg_error'] = 'Wrong Username/Password';
                session_destroy();
            }
        }
    }
}

if (empty($_SESSION['userid'])) {
?>
<!DOCTYPE html>
<html>
<head>
    <title>Obanana | Web Portal</title>
    <noscript><h3>Please enable Javascript in order to use this form.</h3><meta HTTP-EQUIV='refresh' content=0; url='JavascriptNotEnabled.php'></noscript>
    
    <meta charset='utf-8'>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <meta name="robots" content="noindex">
    <meta http-equiv='cache-control' content='no-cache'>
    <meta http-equiv='expires' content='0'>
    <meta http-equiv='pragma' content='no-cache'>

    <link type='image/x-png' rel='icon' href='img/ob_icon.png'>
    <link rel="stylesheet" type="text/css" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel='stylesheet' href='css/login.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

      <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Dosis:300,400,500,,600,700,700i|Lato:300,300i,400,400i,700,700i" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script type='text/javascript' src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Add new style -->

  <style type="text/css">

.cb-slideshow,
.cb-slideshow:after { 
    position: fixed;
    width: 100%;
    height: 100%;
    top: 0px;
    left: 0px;
    z-index: 0; 
}
.cb-slideshow:after { 
    content: '';
    /*background: transparent url(../images/pattern.png) repeat top left; */
}

.cb-slideshow li span { 
    width: 100%;
    height: 100%;
    position: absolute;
    top: 0px;
    left: 0px;
    color: transparent;
    background-size: cover;
    background-position: 50% 50%;
    background-repeat: none;
    opacity: 0;
    z-index: 0;
    animation: imageAnimation 36s linear infinite 0s; 
}

.cb-slideshow li div { 
    z-index: 1000;
    position: absolute;
    bottom: 30px;
    left: 0px;
    width: 100%;
    text-align: center;
    opacity: 0;
    color: #fff;
    animation: titleAnimation 36s linear infinite 0s; 
}
.cb-slideshow li div h3 { 
    font-family: 'BebasNeueRegular', 'Arial Narrow', Arial, sans-serif;
    font-size: 240px;
    padding: 0;
    line-height: 200px; 
}

.cb-slideshow li:nth-child(1) span { 
    background-image: url('img/PMITOWER_banner.jpg') 
}
.cb-slideshow li:nth-child(2) span { 
    background-image: url('img/MBI_banner.jpg');
    animation-delay: 6s; 
}
.cb-slideshow li:nth-child(3) span { 
    background-image: url('img/MAC_banner.jpg');
    animation-delay: 12s; 
}
.cb-slideshow li:nth-child(4) span { 
    background-image: url('img/CSC_banner.jpg');
    animation-delay: 18s; 
}
.cb-slideshow li:nth-child(5) span { 
    background-image: url('img/CSC_banner2.jpg');
    animation-delay: 24s; 
}
.cb-slideshow li:nth-child(6) span { 
    background-image: url('img/IMC_banner.jpg');
    animation-delay: 30s; 
}

.cb-slideshow li:nth-child(2) div { 
    animation-delay: 6s; 
}
.cb-slideshow li:nth-child(3) div { 
    animation-delay: 12s; 
}
.cb-slideshow li:nth-child(4) div { 
    animation-delay: 18s; 
}
.cb-slideshow li:nth-child(5) div { 
    animation-delay: 24s; 
}
.cb-slideshow li:nth-child(6) div { 
    animation-delay: 30s; 
}

@keyframes imageAnimation { 
    0% { opacity: 0; animation-timing-function: ease-in; }
    8% { opacity: 1; animation-timing-function: ease-out; }
    17% { opacity: 1 }
    25% { opacity: 0 }
    100% { opacity: 0 }
}

@keyframes titleAnimation { 
    0% { opacity: 0 }
    8% { opacity: 1 }
    17% { opacity: 1 }
    19% { opacity: 0 }
    100% { opacity: 0 }
}

@keyframes imageAnimation { 
  0% {
      opacity: 0;
      animation-timing-function: ease-in;
  }
  8% {
      opacity: 1;
      transform: scale(1.05);
      animation-timing-function: ease-out;
  }
  17% {
      opacity: 1;
      transform: scale(1.1) rotate(3deg);
  }
  25% {
      opacity: 0;
      transform: scale(1.1) rotate(3deg);
  }
  100% { opacity: 0 }
}

@keyframes titleAnimation { 
  0% {
      opacity: 0;
      transform: translateX(200px);
  }
  8% {
      opacity: 1;
      transform: translateX(0px);
  }
  17% {
      opacity: 1;
      transform: translateX(0px);
  }
  19% {
      opacity: 0;
      transform: translateX(-400px);
  }
  25% { opacity: 0 }
  100% { opacity: 0 }
}

ul{
     list-style:none;
}

.no-cssanimations .cb-slideshow li span{
  opacity: 1;
}

@media screen and (max-width: 1140px) { 
    .cb-slideshow li div h3 { font-size: 140px }
}
@media screen and (max-width: 600px) { 
    .cb-slideshow li div h3 { font-size: 80px }
}

.bgform{
    background-color: #ffffff;
    opacity: 1;
    color: black;
    position: relative;
    border-radius: 15px;
}
.wb{
    font-weight: bolder;
}

.loginbg{
    background-color: #ffaa00;
    border-color: #ffaa00;
}

.imgsze{
    height: 20px;
    width: 20px;
}

.bksze {
    height: 30px;
    width: 80px;
}
.bksze:hover{
    opacity: 0.5;
}
.blk{
    color: #000000;
}

.frgtpass{
    color: red;
}


.loader {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url(img/loader.gif) 50% 50% no-repeat rgb(249,249,249) ;
            opacity: .8;
            /*background-size:200px 120px;*/
        }
</style>



<!-- end of style -->
    
</head>
<body class="login-page">
<div id = "myDiv" style="display:none;" class="loader"></div>
<!-- end of code -->
<div class="login-box">
      <!-- /.login-logo -->
      <div class="card card-outline card-primary">
        <div class="card-header text-center">
            
            <a href="#" class="h5">
            <img class="mb-4 img-fluid mx-auto d-block" height="50" width="50" src="img/ob_icon.png" alt="">    
            <b>Human Resource Information System</b> </a>
        </div>
        <div class="card-body">
          <!-- <p class="login-box-msg">Sign in to start your session</p> -->

          <form action="" method="post" name="login">
            <div class="input-group mb-3">
              <input type="text" name="userid" id="userid" class="form-control" placeholder="Emp. Code Ex. OBN000000" autocomplete="off" onkeyup="this.value = this.value.toUpperCase();"/>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fa fa-user"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input
                type="password" name="password" id="password" class="form-control" placeholder="Password" autocomplete="off"
              />
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fa fa-lock"></span>
                </div>
              </div>
            </div>
            <?php 
                if(isset($_SESSION['msg_error']) && $_SESSION['msg_error'] != ''){
                echo'<body onload="showWrongPass()"></body>';
                unset($_SESSION['msg_error']);
                }
            ?>

            <?php 
                if(isset($_SESSION['msg_blocked']) && $_SESSION['msg_blocked'] != ''){
                echo'<body onload="showBlocked()"></body>';
                unset($_SESSION['msg_blocked']);
                }
            ?>
          <div class="social-auth-links text-center mt-2 mb-3">
            <input type="submit" class="btn btn-login btn-block" name="loginSubmit" value="Login" onclick="show()">
            <div class="row">
                <div class="col-sm-6">
                    <a href="newhireaccess/newemployee_entry.php" class="btn btn-block btn-login-emp mt-2">
                        <i class="fas fa-users"></i> New Employee
                    </a>
                </div>
                <div class="col-sm-6">
                    <a href="applicantprofile/applicant_entry.php" class="btn btn-block btn-login-emp mt-2">
                        <i class="fas fa-file "></i> Applicant
                    </a>
                </div>
            </div>
          </div>
          </form>
            
          <!-- /.social-auth-links -->

          <!-- <p class="mb-1">
            <a href="forgot-password.html">I forgot my password</a>
          </p>
          <p class="mb-0">
            <a href="register.html" class="text-center"
              >Register a new membership</a
            >
          </p> -->
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.login-box -->
<script type="text/javascript">

    function showWrongPass() {
        swal({text:"Incorrect Username and Password!",icon:"error"});
      }

     function showBlocked() {
        swal({title:"Your account has been blocked. Kindly contact the administrator.",icon:"warning"});
      }

         function show() {
            document.getElementById("myDiv").style.display="block";
        }

</script>

<?php
    }
    else
    {

        include('controller/empInfo.php');
        $empInfo = new EmployeeInformation();

        $empInfo->SetEmployeeInformation($_SESSION['userid']);
        $empUserType = $empInfo->GetEmployeeUserType();


        $url = 'pages/admin.php';
        $url_2 = 'pages/employee.php';

        if ($empUserType === 'Admin')
        {
            header("Location: $url");
        }
        else
        {
            header("Location: $url_2");
        }
    }
?>