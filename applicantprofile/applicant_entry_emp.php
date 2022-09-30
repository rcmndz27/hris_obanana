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
        if ($empUserType == 'Admin' || $empUserType == 'HR Generalist' ||$empUserType == 'HR Manager' || $empUserType == 'Group Head' || $empUserType == "HR-CreateStaff")
        {
            include("../applicantprofile/applicantlist.php");
            $allAppEnt = new ApplicantList(); 
                include('../config/db.php');

                include('../elements/DropDown.php');
                include('../controller/MasterFile.php');

    $mf = new MasterFile();
    $dd = new DropDown();

        }
        else
        {
            header( "refresh:1;url=../index.php" );
        }

    }    
?>

<script type="text/javascript" src="../applicantprofile/appent.js"></script>
<script type='text/javascript' src='../js/validator.js'></script>

<style type="text/css">
    
.bup{

font-weight: bold;
}

.mbt {
    background-color: #faf9f9;
    padding: 30px;
    border-radius: 0.25rem;
}

.pad{
    padding: 10px 10px 10px 10px;
    font-weight: bolder;
}
.note{
    font-size: 11px;
    font-style: italic;
}
.note2{
    font-size: 14px;
    font-style: italic;
}
.refby{
  border: 0;
  outline: 0;
  background: transparent;
  border-bottom: 1px solid black;
width: 30px;
    height: 20px;
}
.tabrec{
    text-transform: uppercase;
    color: black;
    font-weight: bolder;
}
.mar_dep{
  border: 0;
  outline: 0;
  background: transparent;
  border-bottom: 1px solid black;
  width: 30px;
  height: 20px;
}

.req{
    color: red;
}
</style>
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
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label" for="familyname">Family Name<span class="req">*</span></label>
                                        <input type="text" class="form-control inputtext" name="familyname"
                                            id="familyname" placeholder="Family Name">
                                    </div>
                                </div> 
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label" for="How you come to apply">How you come to apply?</label>
                                        <select type="select" class="form-select" id="howtoapply" name="howtoapply" >
                                            <option value="Walk-in">Walk-in</option>
                                            <option value="Ads">Ads</option>
                                            <option value="College Placement Office">College Placement Office</option>
                                            <option value="Referred By">Referred By</option>
                                        </select>
                                    </div>
                                </div> 
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label" for="First Name">First Name<span class="req">*</span></label>
                                        <input type="text" class="form-control inputtext" name="firstname"
                                            id="firstname" placeholder="First Name">
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
                                            <input type="date" class="form-control inputtext" name="referreddate"
                                                id="referreddate">
                                        </div>
                                        <div id="refdate_dis">
                                            <input type="date" class="form-control inputtext" readonly>
                                        </div>                                        
                                    </div>
                                </div>                                 
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label" for="middlei">Middle Intial</label>
                                        <input type="text" class="form-control inputtext" name="middlei"
                                            id="middlei" placeholder="Middle Initial">
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
                                        <label class="control-label" for="presentAddress">House Number/Subdivision<span class="req">*</span></label>
                                        <input type="text" class="form-control inputtext" name="houseno"
                                            id="houseno" placeholder="House Number/Subdivision">
                                    </div>
                                </div> 
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label" for="presentAddress">Position Applied (2nd preference)<span class="req">*</span></label>
                                        <?php $dd->GenerateDropDown("jobpos2", $mf->GetJobPosition("jobpos")); ?> 
                                    </div>
                                </div> 
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label" for="presentAddress">Street/Barangay<span class="req">*</span></label>
                                        <input type="text" class="form-control inputtext" name="streetbrgy"
                                            id="streetbrgy" placeholder="Street/Barangay">
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
                                        <label class="control-label" for="presentAddress">City<span class="req">*</span></label>
                                        <input type="text" class="form-control inputtext" name="city"
                                            id="city" placeholder="City">
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
                                    Highest Educational Attainment
                                </legend>
                             </div>
                            <div class="form-row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label" for="Tertiary">Tertiary</label>
                                        <input type="text" class="form-control inputtext" id="tertiary"
                                            name="tertiary" placeholder="Tertiary">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label" for="discipline">Discipline</label>
                                        <select type="select" class="form-select" id="discipline1" name="discipline1" >
                                            <option value="Agriculture">Agriculture</option>
                                            <option value="Architecture and Design">Architecture and Design</option>
                                            <option value="Businesse">Business</option>
                                            <option value="Education">Education</option>
                                            <option value="Engineering">Engineering</option>
                                            <option value="Formal Sciences">Formal Sciences</option>
                                            <option value="Health Sciences">Health Sciences</option>
                                            <option value="Media Communication">Media Communication</option>
                                            <option value="Natural Sciences">Natural Sciences</option>
                                            <option value="Public Administration">Public Administration</option>
                                            <option value="Social Sciences">Social Sciences</option>
                                            <option value="Transportation">Transportation</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="control-label"  for="School Name">School Name</label>
                                        <input type="text" class="form-control inputtext" name="schoolname1" id="schoolname1"
                                            placeholder="School Name">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label" for="secondary">Secondary</label>
                                        <input type="text" class="form-control inputtext" id="secondary"
                                            name="secondary" placeholder="Secondary">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label" for="discipline">Discipline</label>
                                        <select type="select" class="form-select" id="discipline1" name="discipline1" >
                                            <option value="Agriculture">Agriculture</option>
                                            <option value="Architecture and Design">Architecture and Design</option>
                                            <option value="Businesse">Business</option>
                                            <option value="Education">Education</option>
                                            <option value="Engineering">Engineering</option>
                                            <option value="Formal Sciences">Formal Sciences</option>
                                            <option value="Health Sciences">Health Sciences</option>
                                            <option value="Media Communication">Media Communication</option>
                                            <option value="Natural Sciences">Natural Sciences</option>
                                            <option value="Public Administration">Public Administration</option>
                                            <option value="Social Sciences">Social Sciences</option>
                                            <option value="Transportation">Transportation</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="control-label"  for="School Name">School Name</label>
                                        <input type="text" class="form-control inputtext" name="schoolname2" id="schoolname2"
                                            placeholder="School Name">
                                    </div>
                                </div>                                                             
                            </div>                                                                                                  
                            <div class="mt-3 d-flex justify-content-center">
                                <button type="button" class="btn btn-primary bup" id="Submit" ><i class="fas fa-check-circle"></i> SUBMIT</button>
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
