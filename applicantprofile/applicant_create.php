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
    }
       
?> 
    <script type="text/javascript" src="applicant-profile.js"></script>
    <script type="text/javascript" src="validator.js"></script>

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
                        </i>&nbsp; APPLICANT PROFILE - PERSONAL DATA SHEET</b></li>
            </ol>
          </nav>
          <form id="applicantform">
                <ul class="nav nav-tabs tabrec" id="myTab" name="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="personal-tab" name="personal-tab" data-toggle="tab"
                            href="#personal" role="tab" aria-controls="personal" aria-selected="true">Personal</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="education-tab" name="education-tab" data-toggle="tab" href="#education"
                            role="tab" aria-controls="education" aria-selected="false">Education</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="job-tab" name="job-tab" data-toggle="tab" href="#job" role="tab"
                            aria-controls="job" aria-selected="false">Employment Record</a>
                    </li>
<!--                     <li class="nav-item" role="presentation">
                        <a class="nav-link" id="others-tab" name="others-tab" data-toggle="tab" href="#others"
                            role="tab" aria-controls="others" aria-selected="false">Other Information</a>
                    </li> -->
                </ul>

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="personal" role="tabpanel" aria-labelledby="personal-tab"><br>
                      <fieldset class="fieldset-border">
                            <div class="d-flex justify-content-center">
                                <legend class="fieldset-border pad">
                                    PERSONAL DATA SHEET
                                </legend>
                             </div>
                        <div class="form-row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                <label class="control-label" for="collegeCourse">Attach recent photograph</label>
                                <!-- <img src="img/person.jpg" id="imgPic" class="d-block mb-1" alt="applicantPic"> -->
                                <input id="imgInput" class="d-block" type="file" onchange="ImageEncode();">
                                </div>
                            </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="control-label" for="collegeCourse">INSTRUCTIONS:</label>
                                            <p>Please answer each question clearly and completely.</p>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="control-label" for="dateField">Date Filed:</label>
                                        <input type="text" class="form-control" name="dateFiled" id="collegeDate" value="<?php echo date("Y/m/d"); ?>" readonly>  
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="control-label" for="presentAddress">Preferred field of work:</label>
                                        <input type="text" class="form-control inputtext" name="presentAddress"
                                            id="presentAddress" placeholder="1.">
                                            <br>
                                        <input type="text" class="form-control inputtext" name="presentAddress"
                                            id="presentAddress" placeholder="2.">
                                    </div>
                                </div>

                                <div class="col-lg-8">
                                    <div class="form-group">
                                        <label class="control-label" for="positionList">Position Title:</label>
                                        <label class="note">(Please confirm vacancy you wish to be evaluated for by printing its position title below:)</label>
                                        <input type="text" class="form-control inputtext" name="permanentAddress"
                                            id="positiontitle1" placeholder="1."><br>
                                        <input type="text" class="form-control inputtext" name="permanentAddress"
                                            id="positiontitle2" placeholder="2.">

                                    </div>
                                </div>
                            </div> 
                        <div class="form-row mb-2">
                            <div class="col-lg-6">
                                <label class="control-label" for="reasonsfor">Reason for wishing to be considered for the position at hand:</label>
                                  <textarea class="form-control" id="reasonsfor" name="reasonsfor" rows="1"
                                    cols="90" placeholder="Reason....."></textarea>
                            </div>
                            <div class="col-lg-6">
                                        <label class="control-label" for="expect_salary">Expected Minimum Salary:</label>
                                        <input type="number" class="form-control inputtext" name="exec"
                                            id="expect_salary" placeholder="P 00,000.00">
                            </div>                            
                        </div>  

                          <div class="form-row">
                                <div class="col-lg-4">
                                    <label class="control-label" for="convictedToCrimes">
                                        How did you come to apply at PMI?
                                    </label> 
                                </div>
                                <div class="col-lg-8">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="apply_pmi"
                                                id="apply_pmi" value="yes">
                                            <small>Walk-in</small>
                                        </div>
                                        <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="apply_pmi"
                                                    id="apply_pmi" value="no">
                                                <small>Ads</small>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="apply_pmi"
                                                id="apply_pmi" value="yes">
                                            <small>College Placement Office</small>
                                        </div>
                                        <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="apply_pmi"
                                                    id="apply_pmi" value="no">
                                                <small>Referred by:</small>
                                                <input type="text" class="refby" name="referredby"
                                                id="referredby">  
                                        </div>
                                </div>
                            </div><br>
                            <div class="form-row">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="control-label" for="firstname">First Name:</label>
                                        <input type="text" class="form-control inputtext" id="firstname"
                                            name="firstname" place placeholder="First Name">
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="control-label" for="middlename">Middle Name:</label>
                                        <input type="text" class="form-control inputtext" name="middlename"
                                            id="middlename" placeholder="Middle Name">
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="control-label"  for="lastname">Last Name:</label>
                                        <input type="text" class="form-control inputtext" name="lastname" id="lastname"
                                            placeholder="Last Name">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <label class="control-label" for="maidenname">Maiden Name (if any):</label>
                                    <input type="text" class="form-control" name="maidenname" id="maidenname" placeholder="Maiden Name">
                                </div>
                            </div> <!-- firstname, middlename, lastname, maiden name -->

                            <div class="form-row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label" for="presentAddress">(A) Address at which you reside at present</label>
                                        <label class="note">(indicate since when)</label>
                                  <textarea class="form-control" id="reasonsfor" name="reasonsfor" rows="2"
                                    cols="90" placeholder="Address....."></textarea>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label" for="positionList">(B) Permanent Residence</label>
                                        <label class="note">(if different from A)</label>
                                  <textarea class="form-control" id="reasonsfor" name="reasonsfor" rows="2"
                                    cols="90" placeholder="Address....."></textarea>
                                    </div>
                                </div>
                            </div>      

                            <div class="form-row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                         <label class="control-label" for="email">Telephone Number:</label>
                                        <input type="number" class="form-control" id="mother" name="mother">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="cellphone">Mobile Number:</label>
                                        <input type="number" class="form-control" id="motherAddress" name="motherAddress">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="cellphone">Email Address:</label>
                                        <input type="email" class="form-control" id="motherAddress" name="motherAddress">
                                    </div>                                    
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label" for="email">Other Telephone Number:</label>
                                        <input type="number" class="form-control" id="father" name="father">

                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="cellphone">Other Mobile Number:</label>
                                        <input type="number" class="form-control" id="fatherAddress" name="fatherAddress">

                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="cellphone">Other Email Address:</label>
                                        <input type="email" class="form-control" id="motherAddress" name="motherAddress">
                                    </div>                                      
                                </div>
                            </div>
                        </fieldset>

                        <fieldset class="fieldset-border">
                               <div class="d-flex justify-content-center">
                                <legend class="fieldset-border pad">
                                    PERSONAL DATA
                                </legend>
                             </div>
                            <div class="form-row">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="control-label" for="firstname">Date of Birth:</label>
                                        <input type="date" class="form-control inputtext" id="dateofbirth"
                                            name="dateofbirth" placeholder="Required">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="control-label" for="middlename">Place of Birth:</label>
                                        <input type="text" class="form-control inputtext" name="middlename"
                                            id="middlename" placeholder="Required">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="control-label"  for="lastname">Nationality:</label>
                                        <input type="text" class="form-control inputtext" name="lastname" id="lastname"
                                            placeholder="Required">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <label class="control-label" for="maidenname">Age</label>
                                     <label class="note">(as of last birthday)</label>
                                    <input type="number" class="form-control" name="maidenname" id="maidenname">
                                </div>                             
                            </div>

                            <div class="form-row">
                                <div class="col-lg-6">
                                    <label class="control-label" for="maidenname">Residence Certificate No. :</label>
                                    <input type="number" class="form-control" name="maidenname" id="maidenname">
                                </div>
                                <div class="col-lg-6">
                                    <label class="control-label" for="maidenname">Date & Place Issued:</label>
                                    <input type="text" class="form-control" name="maidenname" id="maidenname">
                                </div>                               
                            </div><br>
                            <div class="form-row">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="control-label" s for="tin">TIN:</label>
                                        <input type="text" class="form-control inputtext" name="tin" id="tin"
                                            placeholder="Required">
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="control-label" for="sss">SSS No. :</label>
                                        <input type="text" class="form-control inputtext" name="sss" id="sss"
                                            placeholder="Required">
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="control-label" for="philhealth">Philhealth No. :</label>
                                        <input type="text" class="form-control inputtext" name="philhealth"
                                            id="philhealth" placeholder="Required">
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="control-label" for="pagibig">Pag-ibig No. :</label>
                                        <input type="text" class="form-control inputtext" name="pagibig" id="pagibig"
                                            placeholder="Required">
                                    </div>
                                </div> 
                            </div>
                          <div class="form-row">
                                    <div class="col-lg-2">
                                        <label class="control-label" for="taxstatus">
                                            Tax Status:
                                        </label> 
                                    </div>
                                    <div class="col-lg-3">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="single"
                                                    id="single" value="single">
                                                <small>Single</small>
                                            </div>
                                    </div>
                                    <div class="col-lg-3">
                                            <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" name="apply_pmi"
                                                        id="apply_pmi" value="no">
                                                    <small>Head of the Family</small>
                                            </div>
                                    </div>        
                                    <div class="col-lg-4">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="apply_pmi"
                                                    id="apply_pmi" value="yes">
                                                <small>Married with </small>
                                                 <input type="text" class="mar_dep" name="referredby"
                                                    id="referredby">  
                                                <small>dependent(s)</small>
                                            </div>
                                    </div>
                            </div> <br>
                            <div class="form-row">
                                    <div class="col-lg-1">
                                        <label class="control-label" for="sex">Sex:</label> 
                                    </div>
                                    <div class="col-lg-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="single"
                                                    id="single" value="single">
                                                <small>Male</small>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="single"
                                                    id="single" value="single">
                                                <small>Female</small>
                                            </div>                                            
                                    </div>
                                    <div class="col-lg-2">
                                        <label class="control-label" for="sex">Marital Status:</label> 
                                    </div>
                                    <div class="col-lg-7">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="single"
                                                    id="single" value="single">
                                                <small>Single</small>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="single"
                                                    id="single" value="single">
                                                <small>Widow(er)</small>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="single"
                                                    id="single" value="single">
                                                <small>Married</small>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="single"
                                                    id="single" value="single">
                                                <small>Separated</small>
                                            </div> 
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="single"
                                                    id="single" value="single">
                                                <small>Single Parent</small>
                                            </div>                                             
                                    </div>                                    
                            </div><br>

                            <div class="form-row">
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label class="control-label" for="employer1">Dependent's Name:</label>
                                        <input type="text" class="form-control inputtext" id="employer1"
                                            name="employer1" placeholder="Required">
                                    </div>
                                </div>

                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label class="control-label" for="employerContanctNo1">Date of Birth:</label>
                                        <input type="date" class="form-control inputtext" id="employerContanctNo1"
                                            name="employerContanctNo1" placeholder="Required">
                                    </div>
                                </div>

                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label class="control-label" for="positionHeld1">Relationship:</label>
                                        <input type="text" class="form-control inputtext" id="positionHeld1"
                                            name="positionHeld1" placeholder="Required">
                                    </div>
                                </div>

                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label class="control-label" for="employer1">Dependent's Name:</label>
                                        <input type="text" class="form-control inputtext" id="employer1"
                                            name="employer1" placeholder="Required">
                                    </div>
                                </div>

                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label class="control-label" for="employerContanctNo1">Date of Birth:</label>
                                        <input type="date" class="form-control inputtext" id="employerContanctNo1"
                                            name="employerContanctNo1" placeholder="Required">
                                    </div>
                                </div>

                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label class="control-label" for="positionHeld1">Relationship:</label>
                                        <input type="text" class="form-control inputtext" id="positionHeld1"
                                            name="positionHeld1" placeholder="Required">
                                    </div>
                                </div>
                            </div> <!-- employer1  -->

                            <div class="form-row">
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="employer2" name="employer2">
                                    </div>
                                </div>

                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="employerContanctNo2"
                                            name="employerContanctNo2">
                                    </div>
                                </div>

                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="positionHeld2" name="positionHeld2">
                                    </div>
                                </div>

                                <div class="col-lg-2">
                                    <div class="form-group">

                                        <input type="text" class="form-control" id="salary2" name="salary2">
                                    </div>
                                </div>

                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <input type="number" class="form-control" id="monthsOfService2"
                                            name="monthsOfService2">
                                    </div>
                                </div>

                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="reasonForLeaving2"
                                            name="reasonForLeaving2">
                                    </div>
                                </div>
                            </div> <!-- employer2  -->

                            <div class="form-row">
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="employer3" name="employer3">
                                    </div>
                                </div>

                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="employerContanctNo3"
                                            name="employerContanctNo3">
                                    </div>
                                </div>

                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="positionHeld3" name="positionHeld3">
                                    </div>
                                </div>

                                <div class="col-lg-2">
                                    <div class="form-group">

                                        <input type="text" class="form-control" id="salary3" name="salary3">
                                    </div>
                                </div>

                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <input type="number" class="form-control" id="monthsOfService3"
                                            name="monthsOfService3">
                                    </div>
                                </div>

                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="reasonForLeaving3"
                                            name="reasonForLeaving3">
                                    </div>
                                </div>
                            </div> <!-- employer3  --> 

                            <div class="form-row">
                                <div class="col-lg-6">
                                    <label class="control-label" for="maidenname">Spouse Name:</label>
                                    <input type="number" class="form-control" name="maidenname" id="maidenname">
                                </div>
                                <div class="col-lg-6">
                                    <label class="control-label" for="maidenname">Father's Name:</label>
                                    <input type="text" class="form-control" name="maidenname" id="maidenname">
                                </div>                               
                            </div><br>                         
                            <div class="form-row">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="control-label" s for="tin">Birthdate:</label>
                                        <input type="date" class="form-control inputtext" name="tin" id="tin"
                                            placeholder="Required">
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="control-label" for="sss">Age:</label>
                                        <input type="text" class="form-control inputtext" name="sss" id="sss"
                                            placeholder="Required">
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="control-label" for="philhealth">Age:</label>
                                        <input type="text" class="form-control inputtext" name="philhealth"
                                            id="philhealth" placeholder="Required">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="control-label" for="pagibig">Occupation:</label>
                                        <input type="text" class="form-control inputtext" name="pagibig" id="pagibig"
                                            placeholder="Required">
                                    </div>
                                </div> 
                            </div>
                            <div class="form-row">
                                <div class="col-lg-6">
                                    <label class="control-label" for="maidenname">Occupation:</label>
                                    <input type="number" class="form-control" name="maidenname" id="maidenname">
                                </div>
                                <div class="col-lg-6">
                                    <label class="control-label" for="maidenname">Mother's Name:</label>
                                    <input type="text" class="form-control" name="maidenname" id="maidenname">
                                </div>                               
                            </div><br> 

                        <div class="form-row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label" for="presentAddress">Name and Address of Company:</label>
                                  <textarea class="form-control" id="reasonsfor" name="reasonsfor" rows="1"
                                    cols="90" placeholder="Company Name and Address....."></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="control-label" for="philhealth">Age:</label>
                                        <input type="text" class="form-control inputtext" name="philhealth"
                                            id="philhealth" placeholder="Required">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="control-label" for="pagibig">Occupation:</label>
                                        <input type="text" class="form-control inputtext" name="pagibig" id="pagibig"
                                            placeholder="Required">
                                    </div>
                                </div> 
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="control-label" for="presentAddress">Name of brothers/sisters:</label>
                                  <textarea class="form-control" id="reasonsfor" name="reasonsfor" rows="4"
                                    cols="90" placeholder="Name of Brothers and Sisters...."></textarea>
                                    </div>
                                </div>     
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="control-label" for="presentAddress">Have you any near relatives working in another company like PMI ?</label>
                                        <label class="note">If so, give name, relationship, and organization.</label>
                                  <textarea class="form-control" id="reasonsfor" name="reasonsfor" rows="4"
                                    cols="90" placeholder="Name of Brothers and Sisters...."></textarea>
                                    </div>
                                </div> 
                                <div class="col-lg-12">
                                    <label class="control-label" for="presentAddress">Contact person in case of emergency:</label>
                                  </div> 
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label" for="presentAddress">Name:</label>
                                        <input type="text" class="form-control inputtext" name="philhealth"
                                            id="philhealth" placeholder="Required">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label" for="philhealth">Contact Number:</label>
                                        <input type="number" class="form-control inputtext" name="philhealth"
                                            id="philhealth" placeholder="Required">
                                    </div>
                                </div>
                                 <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="control-label" for="presentAddress">Address:</label>
                                  <textarea class="form-control" id="reasonsfor" name="reasonsfor" rows="4"
                                    cols="90" placeholder="Address...."></textarea>
                                    </div>
                                </div>   
                                <div class="col-lg-12">
                                    <label class="control-label" for="presentAddress">Legal Convictions:</label>
                                    <label class="note">Have you ever been charged or found guilty of the violation of any law (other than minor traffic violations), give details/particulars.</label>
                                  </div>  

                             <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="control-label" for="presentAddress">Charge:</label>
                                        <input type="text" class="form-control inputtext" name="philhealth"
                                            id="philhealth" placeholder="Required">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="control-label" for="philhealth">Date:</label>
                                        <input type="number" class="form-control inputtext" name="philhealth"
                                            id="philhealth" placeholder="Required">
                                    </div>
                                </div>   
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="control-label" for="presentAddress">Where Tried:</label>
                                        <input type="text" class="form-control inputtext" name="philhealth"
                                            id="philhealth" placeholder="Required">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="control-label" for="philhealth">Conviction:</label>
                                        <input type="number" class="form-control inputtext" name="philhealth"
                                            id="philhealth" placeholder="Required">
                                    </div>
                                </div>   
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="control-label" for="philhealth">Have you been involved in any administrative or civil cases?</label>
                                        <label class="note" for="philhealth">If yes, state nature</label>
                                        <input type="number" class="form-control inputtext" name="philhealth"
                                            id="philhealth" placeholder="Required">
                                    </div>
                                </div>                                                                                   
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="note" for="philhealth">May we seek references from your present/most recent employer and your former employers and supervisors? If not, specify exclusions. You  may also add more references here including name, occupation, relationship to you, address, telephone and fax numbers. We would also ask you to be responsible in notifying the people you have submitted as your references.</label>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="control-label" for="presentAddress">Name:</label>
                                        <input type="text" class="form-control inputtext" name="philhealth"
                                            id="philhealth" placeholder="Required">
                                        <input type="text" class="form-control inputtext" name="philhealth"
                                            id="philhealth" placeholder="Required">
                                        <input type="text" class="form-control inputtext" name="philhealth"
                                            id="philhealth" placeholder="Required">                                                                                        
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="control-label" for="philhealth">Occupation:</label>
                                        <input type="text" class="form-control inputtext" name="philhealth"
                                            id="philhealth" placeholder="Required">
                                        <input type="text" class="form-control inputtext" name="philhealth"
                                            id="philhealth" placeholder="Required">
                                        <input type="text" class="form-control inputtext" name="philhealth"
                                            id="philhealth" placeholder="Required">                                             
                                    </div>
                                </div>   
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="control-label" for="presentAddress">Company:</label>
                                        <input type="text" class="form-control inputtext" name="philhealth"
                                            id="philhealth" placeholder="Required">
                                        <input type="text" class="form-control inputtext" name="philhealth"
                                            id="philhealth" placeholder="Required">
                                        <input type="text" class="form-control inputtext" name="philhealth"
                                            id="philhealth" placeholder="Required">                                             
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="control-label" for="philhealth">Conviction:</label>
                                        <input type="text" class="form-control inputtext" name="philhealth"
                                            id="philhealth" placeholder="Required">
                                        <input type="text" class="form-control inputtext" name="philhealth"
                                            id="philhealth" placeholder="Required">
                                        <input type="text" class="form-control inputtext" name="philhealth"
                                            id="philhealth" placeholder="Required">                                             
                                    </div>
                                </div>  
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="control-label" for="philhealth">Will you have or can you arrange return rights to your present employer?</label>
                                        <input type="text" class="form-control inputtext" name="philhealth"
                                            id="philhealth" placeholder="Required">                                        
                                    </div>
                                </div>                                                                              

                        </div> 
                        </fieldset>
                    </div>

                    <div class="tab-pane fade" id="education" role="tabpanel" aria-labelledby="education-tab">
                        <fieldset class="fieldset-border">
                            <div class="d-flex justify-content-center">
                                <legend class="fieldset-border pad">
                                    EDUCATION
                                </legend>
                             </div>
                            <div class="form-row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="note2" for="philhealth">Give details in chronological order from High Scohol. Include short courses and postgraduate studies in your professional/occupation and related fields.</label>
                                    </div>
                                </div>
                                <div class="col-lg-1">
                                    <div class="form-group">
                                        <label class="control-label" for="higherstudiesCourse">From:</label><br><br>
                                        <input type="date" class="form-control" id="higherstudiesCourse"
                                            name="higherstudiesCourse">
                                        <input type="date" class="form-control inputtext" name="philhealth"
                                            id="philhealth" placeholder="Required">
                                        <input type="date" class="form-control inputtext" name="philhealth"
                                            id="philhealth" placeholder="Required">
                                        <input type="date" class="form-control inputtext" name="philhealth"
                                            id="philhealth" placeholder="Required">
                                        <input type="date" class="form-control inputtext" name="philhealth"
                                            id="philhealth" placeholder="Required">  
                                    </div>
                                </div>
                                <div class="col-lg-1">
                                    <div class="form-group">
                                        <label class="control-label" for="higherstudiesDate">To:</label> <br><br>
                                        <input type="date" class="form-control" id="higherstudiesDate"
                                            name="higherstudiesDate">
                                        <input type="date" class="form-control inputtext" name="philhealth"
                                            id="philhealth" placeholder="Required">
                                        <input type="date" class="form-control inputtext" name="philhealth"
                                            id="philhealth" placeholder="Required">
                                        <input type="date" class="form-control inputtext" name="philhealth"
                                            id="philhealth" placeholder="Required">
                                        <input type="date" class="form-control inputtext" name="philhealth"
                                            id="philhealth" placeholder="Required">                                            
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="control-label" for="higherstudiesCourse">Name of  School/College/University or equilavent,city/country:</label>
                                        <input type="text" class="form-control" id="higherstudiesCourse"
                                            name="higherstudiesCourse">
                                        <input type="text" class="form-control inputtext" name="philhealth"
                                            id="philhealth" placeholder="Required">
                                        <input type="text" class="form-control inputtext" name="philhealth"
                                            id="philhealth" placeholder="Required">
                                        <input type="text" class="form-control inputtext" name="philhealth"
                                            id="philhealth" placeholder="Required">
                                        <input type="text" class="form-control inputtext" name="philhealth"
                                            id="philhealth" placeholder="Required">                                             
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="control-label" for="higherstudiesDate">Name of course/studies/specialization:</label>
                                        <input type="text" class="form-control" id="higherstudiesDate"
                                            name="higherstudiesDate">
                                        <input type="text" class="form-control inputtext" name="philhealth"
                                            id="philhealth" placeholder="Required">
                                        <input type="text" class="form-control inputtext" name="philhealth"
                                            id="philhealth" placeholder="Required">
                                        <input type="text" class="form-control inputtext" name="philhealth"
                                            id="philhealth" placeholder="Required">
                                        <input type="text" class="form-control inputtext" name="philhealth"
                                            id="philhealth" placeholder="Required">                                             
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="control-label" for="higherstudiesCourse">Certificate/Diploma/Degree obtained:</label>
                                        <input type="text" class="form-control" id="higherstudiesCourse"
                                            name="higherstudiesCourse">
                                        <input type="text" class="form-control inputtext" name="philhealth"
                                            id="philhealth" placeholder="Required">
                                        <input type="text" class="form-control inputtext" name="philhealth"
                                            id="philhealth" placeholder="Required">
                                        <input type="text" class="form-control inputtext" name="philhealth"
                                            id="philhealth" placeholder="Required">
                                        <input type="text" class="form-control inputtext" name="philhealth"
                                            id="philhealth" placeholder="Required">                                             
                                    </div>
                                </div>                                                                
                            </div>
                        </fieldset>
                    </div>

                    <div class="tab-pane fade" id="job" role="tabpanel" aria-labelledby="job-tab">
                        <fieldset class="fieldset-border">
                            <div class="d-flex justify-content-center">
                                <legend class="fieldset-border pad">
                                    EMPLOYMENT RECORD
                                </legend>
                             </div>
                            <div class="form-row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="note2" for="philhealth">Starting with your present or most recent post, list in reverse order positions held. Attached additional pages if needed.</label>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="control-label" for="philhealth">1. Present or Most Recent Employment</label>
                                    </div>
                                </div>                                
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="control-label" for="philhealth">Period:</label>
                                    </div>
                                </div> 
                                <div class="col-lg-8">
                                    <div class="form-group">
                                        <label class="control-label" for="philhealth">Positions you have handled in the same organization before:</label>
                                    </div>
                                </div>                                 
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label class="control-label" for="employerContanctNo1">From:</label>
                                        <input type="date" class="form-control inputtext" id="employerContanctNo1"
                                            name="employerContanctNo1" placeholder="Required">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label class="control-label" for="employerContanctNo1">To:</label>
                                        <input type="date" class="form-control inputtext" id="employerContanctNo1"
                                            name="employerContanctNo1" placeholder="Required">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="control-label" for="employerContanctNo1">Starting:</label>
                                        <input type="text" class="form-control inputtext" id="employerContanctNo1"
                                            name="employerContanctNo1" placeholder="Required">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="control-label" for="employerContanctNo1">Most Recent:</label>
                                        <input type="text" class="form-control inputtext" id="employerContanctNo1"
                                            name="employerContanctNo1" placeholder="Required">
                                    </div>
                                </div>                                                                                   
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="control-label" for="employerContanctNo1">Number and type of employees supervised by you, (if any)</label>
                                        <input type="text" class="form-control inputtext" id="employerContanctNo1"
                                            name="employerContanctNo1" placeholder="Required">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label" for="positionHeld1">Name and Address of Employer:</label>
                                        <input type="text" class="form-control inputtext" id="positionHeld1"
                                            name="positionHeld1" placeholder="Required">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label" for="positionHeld1">Name and title of supervisor:</label>
                                        <input type="text" class="form-control inputtext" id="positionHeld1"
                                            name="positionHeld1" placeholder="Required">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="control-label" for="salary1">Brief description of your duties and responsibilities:</label>
                                        <input type="text" class="form-control inputnumber" id="salary1" name="salary1"
                                            placeholder="Required">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="control-label" for="monthsofservice1">Reason for leaving:</label>
                                        <input type="number" class="form-control inputnumber" id="monthsOfService1"
                                            name="monthsOfService1" placeholder="Required">
                                    </div>
                                </div>
                            </div> <!-- employer1  -->

                            <div class="form-row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="control-label" for="philhealth">2.</label>
                                    </div>
                                </div>                                
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="control-label" for="philhealth">Period:</label>
                                    </div>
                                </div> 
                                <div class="col-lg-8">
                                    <div class="form-group">
                                        <label class="control-label" for="philhealth">Positions you have handled in the same organization before:</label>
                                    </div>
                                </div>                                 
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label class="control-label" for="employerContanctNo1">From:</label>
                                        <input type="date" class="form-control inputtext" id="employerContanctNo1"
                                            name="employerContanctNo1" placeholder="Required">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label class="control-label" for="employerContanctNo1">To:</label>
                                        <input type="date" class="form-control inputtext" id="employerContanctNo1"
                                            name="employerContanctNo1" placeholder="Required">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="control-label" for="employerContanctNo1">Starting:</label>
                                        <input type="text" class="form-control inputtext" id="employerContanctNo1"
                                            name="employerContanctNo1" placeholder="Required">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="control-label" for="employerContanctNo1">Most Recent:</label>
                                        <input type="text" class="form-control inputtext" id="employerContanctNo1"
                                            name="employerContanctNo1" placeholder="Required">
                                    </div>
                                </div>                                                                                   
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="control-label" for="employerContanctNo1">Number and type of employees supervised by you, (if any)</label>
                                        <input type="text" class="form-control inputtext" id="employerContanctNo1"
                                            name="employerContanctNo1" placeholder="Required">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label" for="positionHeld1">Name and Address of Employer:</label>
                                        <input type="text" class="form-control inputtext" id="positionHeld1"
                                            name="positionHeld1" placeholder="Required">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label" for="positionHeld1">Name and title of supervisor:</label>
                                        <input type="text" class="form-control inputtext" id="positionHeld1"
                                            name="positionHeld1" placeholder="Required">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="control-label" for="salary1">Brief description of your duties and responsibilities:</label>
                                        <input type="text" class="form-control inputnumber" id="salary1" name="salary1"
                                            placeholder="Required">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="control-label" for="monthsofservice1">Reason for leaving:</label>
                                        <input type="number" class="form-control inputnumber" id="monthsOfService1"
                                            name="monthsOfService1" placeholder="Required">
                                    </div>
                                </div>
                            </div> <!-- employer2  -->    

                            <div class="form-row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="control-label" for="philhealth">3.</label>
                                    </div>
                                </div>                                
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="control-label" for="philhealth">Period:</label>
                                    </div>
                                </div> 
                                <div class="col-lg-8">
                                    <div class="form-group">
                                        <label class="control-label" for="philhealth">Positions you have handled in the same organization before:</label>
                                    </div>
                                </div>                                 
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label class="control-label" for="employerContanctNo1">From:</label>
                                        <input type="date" class="form-control inputtext" id="employerContanctNo1"
                                            name="employerContanctNo1" placeholder="Required">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label class="control-label" for="employerContanctNo1">To:</label>
                                        <input type="date" class="form-control inputtext" id="employerContanctNo1"
                                            name="employerContanctNo1" placeholder="Required">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="control-label" for="employerContanctNo1">Starting:</label>
                                        <input type="text" class="form-control inputtext" id="employerContanctNo1"
                                            name="employerContanctNo1" placeholder="Required">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="control-label" for="employerContanctNo1">Most Recent:</label>
                                        <input type="text" class="form-control inputtext" id="employerContanctNo1"
                                            name="employerContanctNo1" placeholder="Required">
                                    </div>
                                </div>                                                                                   
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="control-label" for="employerContanctNo1">Number and type of employees supervised by you, (if any)</label>
                                        <input type="text" class="form-control inputtext" id="employerContanctNo1"
                                            name="employerContanctNo1" placeholder="Required">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label" for="positionHeld1">Name and Address of Employer:</label>
                                        <input type="text" class="form-control inputtext" id="positionHeld1"
                                            name="positionHeld1" placeholder="Required">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label" for="positionHeld1">Name and title of supervisor:</label>
                                        <input type="text" class="form-control inputtext" id="positionHeld1"
                                            name="positionHeld1" placeholder="Required">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="control-label" for="salary1">Brief description of your duties and responsibilities:</label>
                                        <input type="text" class="form-control inputnumber" id="salary1" name="salary1"
                                            placeholder="Required">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="control-label" for="monthsofservice1">Reason for leaving:</label>
                                        <input type="number" class="form-control inputnumber" id="monthsOfService1"
                                            name="monthsOfService1" placeholder="Required">
                                    </div>
                                </div>
                            </div> <!-- employer3  -->   

                            <div class="form-row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="control-label" for="philhealth">4.</label>
                                    </div>
                                </div>                                
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="control-label" for="philhealth">Period:</label>
                                    </div>
                                </div> 
                                <div class="col-lg-8">
                                    <div class="form-group">
                                        <label class="control-label" for="philhealth">Positions you have handled in the same organization before:</label>
                                    </div>
                                </div>                                 
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label class="control-label" for="employerContanctNo1">From:</label>
                                        <input type="date" class="form-control inputtext" id="employerContanctNo1"
                                            name="employerContanctNo1" placeholder="Required">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label class="control-label" for="employerContanctNo1">To:</label>
                                        <input type="date" class="form-control inputtext" id="employerContanctNo1"
                                            name="employerContanctNo1" placeholder="Required">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="control-label" for="employerContanctNo1">Starting:</label>
                                        <input type="text" class="form-control inputtext" id="employerContanctNo1"
                                            name="employerContanctNo1" placeholder="Required">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="control-label" for="employerContanctNo1">Most Recent:</label>
                                        <input type="text" class="form-control inputtext" id="employerContanctNo1"
                                            name="employerContanctNo1" placeholder="Required">
                                    </div>
                                </div>                                                                                   
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="control-label" for="employerContanctNo1">Number and type of employees supervised by you, (if any)</label>
                                        <input type="text" class="form-control inputtext" id="employerContanctNo1"
                                            name="employerContanctNo1" placeholder="Required">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label" for="positionHeld1">Name and Address of Employer:</label>
                                        <input type="text" class="form-control inputtext" id="positionHeld1"
                                            name="positionHeld1" placeholder="Required">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label" for="positionHeld1">Name and title of supervisor:</label>
                                        <input type="text" class="form-control inputtext" id="positionHeld1"
                                            name="positionHeld1" placeholder="Required">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="control-label" for="salary1">Brief description of your duties and responsibilities:</label>
                                        <input type="text" class="form-control inputnumber" id="salary1" name="salary1"
                                            placeholder="Required">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="control-label" for="monthsofservice1">Reason for leaving:</label>
                                        <input type="number" class="form-control inputnumber" id="monthsOfService1"
                                            name="monthsOfService1" placeholder="Required">
                                    </div>
                                </div>
                            </div> <!-- employer4  -->    

                            <div class="form-row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="control-label" for="philhealth">5.</label>
                                    </div>
                                </div>                                
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="control-label" for="philhealth">Period:</label>
                                    </div>
                                </div> 
                                <div class="col-lg-8">
                                    <div class="form-group">
                                        <label class="control-label" for="philhealth">Positions you have handled in the same organization before:</label>
                                    </div>
                                </div>                                 
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label class="control-label" for="employerContanctNo1">From:</label>
                                        <input type="date" class="form-control inputtext" id="employerContanctNo1"
                                            name="employerContanctNo1" placeholder="Required">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label class="control-label" for="employerContanctNo1">To:</label>
                                        <input type="date" class="form-control inputtext" id="employerContanctNo1"
                                            name="employerContanctNo1" placeholder="Required">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="control-label" for="employerContanctNo1">Starting:</label>
                                        <input type="text" class="form-control inputtext" id="employerContanctNo1"
                                            name="employerContanctNo1" placeholder="Required">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="control-label" for="employerContanctNo1">Most Recent:</label>
                                        <input type="text" class="form-control inputtext" id="employerContanctNo1"
                                            name="employerContanctNo1" placeholder="Required">
                                    </div>
                                </div>                                                                                   
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="control-label" for="employerContanctNo1">Number and type of employees supervised by you, (if any)</label>
                                        <input type="text" class="form-control inputtext" id="employerContanctNo1"
                                            name="employerContanctNo1" placeholder="Required">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label" for="positionHeld1">Name and Address of Employer:</label>
                                        <input type="text" class="form-control inputtext" id="positionHeld1"
                                            name="positionHeld1" placeholder="Required">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label" for="positionHeld1">Name and title of supervisor:</label>
                                        <input type="text" class="form-control inputtext" id="positionHeld1"
                                            name="positionHeld1" placeholder="Required">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="control-label" for="salary1">Brief description of your duties and responsibilities:</label>
                                        <input type="text" class="form-control inputnumber" id="salary1" name="salary1"
                                            placeholder="Required">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="control-label" for="monthsofservice1">Reason for leaving:</label>
                                        <input type="number" class="form-control inputnumber" id="monthsOfService1"
                                            name="monthsOfService1" placeholder="Required">
                                    </div>
                                </div>
                            </div> <!-- employer5  -->                                                                                 
                               
                        </fieldset><!-- JobHistory  -->

                    </div>

                <div class="mt-3 mb-5 d-flex justify-content-center">
                    <input class="btn btn-primary submit" id="submit" type="submit" value="SUBMIT">
                </div>
            </form>


            <div class="modal fade" id="popUpModal" tabindex="-1" role="dialog" aria-labelledby="informationModalTitle"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="popUpModalTitle"></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Please make sure all information are true and correct.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="OK">OK</button>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>

   
            
      
<?php include('../_footer.php');  ?>
