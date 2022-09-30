<?php
        
    include('../config/db.php');
    include('../app_entry.php');
    include('../elements/DropDown.php');
    include('../controller/MasterFile.php');

    $mf = new MasterFile();
    $dd = new DropDown();

    
?> 
<link rel="stylesheet" type="text/css" href="../applicantprofile/appentry.css">
<script type="text/javascript" src="../applicantprofile/appent.js"></script>
<script type='text/javascript' src='../js/validator.js'></script>
<div class="container">
    <div class="section-title">
          <h1>APPLICANT PROFILE</h1>
        </div>
    <div class="main-body mbt">
          <!-- Breadcrumb -->
          <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item active" aria-current="page"><b><i class='fas fa-users fa-fw'>
                        </i>&nbsp; APPLICANT ENTRY </b></li>
                        
            </ol>
          </nav>
          <form id="applicantform">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="personal" role="tabpanel" aria-labelledby="personal-tab"><br>
                      <fieldset class="fieldset-border">
                            <div class="d-flex justify-content-center">
                                <legend class="fieldset-border pad">
                                   Personal Information
                                </legend>
                             </div>
                            <div class="form-row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="control-label" for="familyname">Last Name<span class="req">*</span></label>
                                        <input type="text" class="form-control inputtext" name="familyname"
                                            id="familyname" placeholder="Family Name">
                                    </div>
                                </div> 
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="control-label" for="First Name">First Name<span class="req">*</span></label>
                                        <input type="text" class="form-control inputtext" name="firstname"
                                            id="firstname" placeholder="First Name">
                                    </div>
                                </div> 
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="control-label" for="middlei">Middle Name</label>
                                        <input type="text" class="form-control inputtext" name="middlei"
                                            id="middlei" placeholder="Middle Initial">
                                    </div>
                                </div>                                                                 
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label" for="How you come to apply">Source of Application</label>
                                        <select type="select" class="form-select" id="howtoapply" name="howtoapply" >
                                            <option value="Walk-in">Walk-in</option>
                                            <option value="Ads">Ads</option>
                                            <option value="College Placement Office">College Placement Office</option>
                                            <option value="LinkedIn">LinkedIn</option>
                                            <option value="Indeed">Indeed</option>
                                            <option value="JobStreet">JobStreet</option>
                                            <option value="Website">Website</option>
                                            <option value="Referred By">Referred By</option>
                                        </select>
                                    </div>
                                </div> 

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="control-label" for="Referred By">Referred By</label>
                                        <div id="refby_show">
                                            <input type="text" class="form-control inputtext" name="referredby"
                                                id="referredby" placeholder="Referred by">
                                        </div>
                                        <div id="refby_dis">
                                            <input type="text" class="form-control inputtext" placeholder="Referred by" readonly>
                                        </div>                                        
                                    </div>
                                </div> 
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label class="control-label" for="ReferredDate">Referred Date</label>
                                        <div id="refdate_show">
                                            <input type="date" class="form-control inputtext" max="2022-02-22" name="referreddate"
                                                id="referreddate">
                                        </div>
                                        <div id="refdate_dis">
                                            <input type="date" class="form-control inputtext" readonly>
                                        </div>                                        
                                    </div>
                                </div>                                 
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label" for="presentAddress">Position Applied (1st preference)<span class="req">*</span></label>
                                        <?php $dd->GenerateDropDown("jobpos1", $mf->GetJobPosition("jobpos")); ?> 
                                    </div>
                                </div> 
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label" for="presentAddress">Position Applied (2nd preference)<span class="req">*</span></label>
                                        <?php $dd->GenerateDropDown("jobpos2", $mf->GetJobPositionDesc("jobposdesc")); ?> 
                                    </div>
                                </div>                                 
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="control-label" for="presentAddress">House Number/Subdivision<span class="req">*</span></label>
                                        <input type="text" class="form-control inputtext" name="houseno"
                                            id="houseno" placeholder="House Number/Subdivision">
                                    </div>
                                </div> 
                                <div class="col-lg-7">
                                    <div class="form-group">
                                        <label class="control-label" for="presentAddress">Street/Barangay<span class="req">*</span></label>
                                        <input type="text" class="form-control inputtext" name="streetbrgy"
                                            id="streetbrgy" placeholder="Street/Barangay">
                                    </div>
                                </div> 
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label class="control-label" for="presentAddress">City<span class="req">*</span></label>
                                        <input type="text" class="form-control inputtext" name="city"
                                            id="city" placeholder="City">
                                    </div>
                                </div>                                 
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label" for="presentAddress">Contact Number 1<span class="req">*</span></label>
                                            <input class="form-control inputtext" type="text" onkeypress="return onlyNumberKey(event)"placeholder="0991234567" maxlength="11" size="50%" name="contactno1"
                                                                    id="contactno1" />
                                    </div>
                                </div>                                                                                    
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label" for="presentAddress">Contact Number 2</label>
                                        <input class="form-control inputtext" type="text" onkeypress="return onlyNumberKey(event)"placeholder="0991234567" maxlength="11" size="50%" name="contactno2"
                                                                id="contactno2" />
                                      </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="control-label" for="presentAddress">Email Address<span class="req">*</span></label>
                                        <input type="email" class="form-control inputtext" name="emailadd"
                                            id="emailadd" placeholder="user@email.com">
                                    </div>
                                </div>                                                   
                            </div>       
                        </fieldset>

                        <fieldset class="fieldset-border">
                               <div class="d-flex justify-content-center">
                                <legend class="fieldset-border pad">
                                    Educational Background
                                </legend>
                             </div>
                            <div class="form-row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label" for="Tertiary">College Attainment</label>
                                        <select type="select" class="form-select" id="tertiary" name="tertiary" >
                                            <option value="Post Graduate">Post Graduate</option>
                                            <option value="Vocational">Vocational</option>
                                            <option value="Associate">Associate</option>
                                            <option value="Bachelor's Degree">Bachelor's Degree</option>
                                            <option value="Masteral">Masteral</option>
                                            <option value="Doctorate">Doctorate</option>
                                        </select>                                          
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label" for="discipline">Program Course</label>
                                        <input type="text" class="form-control inputtext" name="discipline1" id="discipline1" placeholder="Program Course">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="control-label"  for="School Name">College School Name</label>
                                        <input type="text" class="form-control inputtext" name="schoolname1" id="schoolname1" placeholder="College School Name">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="control-label" for="secondary">Secondary School Name</label>
                                        <input type="text" class="form-control inputtext" id="schoolname2"
                                            name="schoolname2" placeholder="Secondary  School Name">
                                    </div>
                                </div>                                                           
                            </div>                                                                                                  
                            <div class="mt-3 d-flex justify-content-center">
                                <button type="button" class="empappbut" id="Submit" ><i class="fas fa-check-circle"></i> SUBMIT</button>
                            </div>  

                </div>
                        </fieldset>
                    </div>
            </form>
</div>
<script>
    function onlyNumberKey(evt) {
          
        // Only ASCII character in that range allowed
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
            return swal({text:"Only numbers are allowed!",icon:"error"});;
        return true;
    }
</script>
  
<?php include('../_footer.php');  ?>
