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
        include('../profile-setting/profileSettings.php');
    }
?>

<script type='text/javascript' src='../js/profile-setting.js'></script>
<link rel="stylesheet" href="../css/custom.css">

<div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="informationModalTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="popUpModalTitle"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h3 class="text-danger text-center"><label for="" id="modalText"></label></h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="form-row">
        <div class="col-md-12 pt-3">
            <h3>Account Settings</h3>
        </div>
    </div>

    <div class="form-row pt-3">
        <div class="col-md-2">
            <h5><a class="text-light" href="../changepass/index.php"><i class="fas fa-user-lock"></i> <span
                        class="">Security</span></a></h5>
        </div>









        <!-- <div class="col-md-6 pt-5">
            <fieldset class="fieldset-border">
                <legend class="fieldset-border">
                    Upload Image
                </legend>

                <div class="col-md-12  mb-3">
                    <img src="../img/person.jpg" id="imgPic" class="d-block mb-1" alt="applicantPic">
                    <input id="imgInput" class="d-block" type="file" onchange="ImageEncode();">
                </div>

            </fieldset>
        </div> -->





        <!-- <div class="form-row pt-3">
        <div class="col-md-12">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="basic-tab" data-toggle="tab" href="#basic" role="tab"
                        aria-controls="basic" aria-selected="true">Basic Details</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="family-tab" data-toggle="tab" href="#family" role="tab"
                        aria-controls="family" aria-selected="false">Family Details</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="educational-tab" data-toggle="tab" href="#educational" role="tab"
                        aria-controls="educational" aria-selected="false">Educational Details</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="security-tab" data-toggle="tab" href="#security" role="tab"
                        aria-controls="security" aria-selected="false">Secuirty</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">

                <div class="tab-pane fade show active" id="basic" role="tabpanel" aria-labelledby="basic-tab">
                    <br>
                    <div class="form-row">
                        <div class="col-md-12">
                            <h3 class="display-5">Basic Details</h3>
                        </div>
                    </div>
                    <br>
                </div>

                <div class="tab-pane fade" id="family" role="tabpanel" aria-labelledby="family-tab">
                    <br>
                        <div class="form-row">
                            <div class="col-md-12">
                                <h3 class="display-5">Family Details</h3>
                            </div>
                        </div>
                    <br>
                </div>

                <div class="tab-pane fade" id="educational" role="tabpanel" aria-labelledby="educational-tab">
                    <br>
                        <div class="form-row">
                            <div class="col-md-12">
                                <h3 class="display-5">Educational Details</h3>
                            </div>
                        </div>
                    <br>
                </div>

                <div class="tab-pane fade" id="security" role="tabpanel" aria-labelledby="security-tab">
                    <br>
                        <div class="form-row pb-3">
                            <div class="col-md-12">
                                <h3 class="display-5">Privacy</h3>
                            </div>
                        </div>

                        <fieldset class="fieldset-border">
                            <legend class="fieldset-border">
                                Change Password
                            </legend>

                            <div class="form-row">
                                <div class="col-md-3">
                                    <label for="userPassword">Password</label>
                                </div>
                                <div class="col-md-3">
                                    <input type="password" name="userPassword" id="userPassword">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-3">
                                    <label for="userPassword">Confirm Password</label>
                                </div>
                                <div class="col-md-3">
                                    <input type="password" name="reUserPassword" id="reUserPassword">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-4">
                                    <span id="errMsg"></span>
                                </div>

                            </div>
                        </fieldset>

                        <button type="button" class="btn btn-primary submit" id="submit">Submit</button>
                </div>    
            </div>
            
            
        </div>
        


    </div> -->
    </div>



    <?php include('../_footer.php');?>