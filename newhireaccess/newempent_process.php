<?php


    include('../newhireaccess/newempent.php');
    include('../config/db.php');

$newEmpEnt = new NewEmpEnt();

$newempent = json_decode($_POST["data"]);

if($newempent->{"Action"} == "InsertNewEmpEnt")
{

    $emp_code = $newempent->{"emp_code"};
    $emp_pic_loc = $newempent->{"emp_pic_loc"};
    $preffieldwork = $newempent->{"preffieldwork"};
    $preffieldwork1 = $newempent->{"preffieldwork1"};
    $positiontitle = $newempent->{"positiontitle"};
    $positiontitle1 = $newempent->{"positiontitle1"};
    // $reason_position = $newempent->{"reason_position"};
    // $expected_salary = $newempent->{"expected_salary"};
    $howtoapply = $newempent->{"howtoapply"};
    $referredby = $newempent->{"referredby"};
    $firstname = $newempent->{"firstname"};
    $middlename = $newempent->{"middlename"};
    $lastname = $newempent->{"lastname"};
    $maidenname = $newempent->{"maidenname"};
    $emp_address = $newempent->{"emp_address"};
    $emp_address2 = $newempent->{"emp_address2"};
    $telno = $newempent->{"telno"};
    $telno1 = $newempent->{"telno1"};
    $celno = $newempent->{"celno"};
    $celno1 = $newempent->{"celno1"};
    $emailaddress = $newempent->{"emailaddress"};
    $emailaddress1 = $newempent->{"emailaddress1"};
    $birthdate = $newempent->{"birthdate"};
    $birthplace = $newempent->{"birthplace"};
    $nationality = $newempent->{"nationality"};
    $residence_certno = $newempent->{"residence_certno"};
    $residence_certdate = $newempent->{"residence_certdate"};
    $residence_certplace = $newempent->{"residence_certplace"};
    $tin_no = $newempent->{"tin_no"};
    $sss_no = $newempent->{"sss_no"};
    $phil_no = $newempent->{"phil_no"};
    $pagibig_no = $newempent->{"pagibig_no"};
    $tax_status = $newempent->{"tax_status"};
    $married_dependents = $newempent->{"married_dependents"};
    $sex = $newempent->{"sex"};
    $marital_status = $newempent->{"marital_status"};
    $arrdepname = $newempent->{"depname"};
    $arrdepbirthdate = $newempent->{"depbirthdate"};
    $arrdeprelationship = $newempent->{"deprelationship"};
    $spousename = $newempent->{"spousename"};
    $spousebirthdate = $newempent->{"spousebirthdate"};
    $spouseoccupation = $newempent->{"spouseoccupation"};
    $spousecompany = $newempent->{"spousecompany"};
    $fathername = $newempent->{"fathername"};
    $fatheroccupation = $newempent->{"fatheroccupation"};
    $fatherbirthdate = $newempent->{"fatherbirthdate"};
    $mothername = $newempent->{"mothername"};
    $motheroccupation = $newempent->{"motheroccupation"};
    $motherbirthdate = $newempent->{"motherbirthdate"};
    $arrsibname = $newempent->{"sibname"};
    $arrsibrelationship = $newempent->{"sibrelationship"};
    $companyrelatives = $newempent->{"companyrelatives"};
    $contactpersonname = $newempent->{"contactpersonname"};
    $contactpersonno = $newempent->{"contactpersonno"};
    $contactpersonaddress = $newempent->{"contactpersonaddress"};
    $legalconvictioncharge = $newempent->{"legalconvictioncharge"};
    $legalconvictiondate = $newempent->{"legalconvictiondate"};
    $legalconvictionwhere = $newempent->{"legalconvictionwhere"};
    $legalconviction = $newempent->{"legalconviction"};
    $civilcase = $newempent->{"civilcase"};
    $arrconname = $newempent->{"conname"};
    $arrconoccupation = $newempent->{"conoccupation"};
    $arrconcompany = $newempent->{"concompany"};
    $arrconconviction = $newempent->{"conconviction"};
    $rightsemployee = $newempent->{"rightsemployee"};
    $arrschoolfrom = $newempent->{"schoolfrom"};
    $arrschoolto = $newempent->{"schoolto"};
    $arrschoolname = $newempent->{"schoolname"};
    $arrcoursename = $newempent->{"coursename"};
    $arrcertificatedegree = $newempent->{"certificatedegree"};
    $arrjobfrom = $newempent->{"jobfrom"};
    $arrjobto = $newempent->{"jobto"};
    $arrstartingposition = $newempent->{"startingposition"};
    $arrmostrecentposition = $newempent->{"mostrecentposition"};
    $arrnotypeemployees = $newempent->{"notypeemployees"};
    $arremployername = $newempent->{"employername"};
    $arremployeraddress = $newempent->{"employeraddress"};   
    $arrsupervisorname = $newempent->{"supervisorname"};
    $arrsupervisortitle = $newempent->{"supervisortitle"};
    $arrduties = $newempent->{"duties"};
    $arrreasonforleaving = $newempent->{"reasonforleaving"}; 
   
    $newEmpEnt->InsertNewEmpEnt($emp_code,$emp_pic_loc,$preffieldwork,$preffieldwork1,$positiontitle,$positiontitle1,$howtoapply,$referredby,$firstname,$middlename,$lastname,$maidenname,$emp_address,$emp_address2,$telno,$telno1,$celno,$celno1,$emailaddress,$emailaddress1,$birthdate,$birthplace,$nationality,$residence_certno,$residence_certdate,$residence_certplace,$tin_no,$sss_no,$phil_no,$pagibig_no,$tax_status,$married_dependents,$sex,$marital_status,$spousename,$spousebirthdate,$spouseoccupation,$spousecompany,$fathername,$fatheroccupation,$fatherbirthdate,$mothername,$motheroccupation,$motherbirthdate,$companyrelatives,$contactpersonname,$contactpersonno,$contactpersonaddress,$legalconvictioncharge,$legalconvictiondate,$legalconvictionwhere,$legalconviction,$civilcase,$rightsemployee);

    foreach($arrdepname as $key => $value){
            $depname = $value;
            $depbirthdate = $arrdepbirthdate[$key];
            $deprelationship = $arrdeprelationship[$key];

        $newEmpEnt->InsertNewEmpDep($depname,$depbirthdate,$deprelationship,$firstname,$middlename,$lastname);
    }

    foreach($arrsibname as $key => $value){
            $sibname = $value;
            $sibrelationship = $arrsibrelationship[$key];

        $newEmpEnt->InsertNewEmpSib($sibname,$sibrelationship,$firstname,$middlename,$lastname);
    }

    foreach($arrconname as $key => $value){
            $conname = $value;
            $conoccupation = $arrconoccupation[$key];
            $concompany = $arrconcompany[$key];
            $conconviction = $arrconconviction[$key];

        $newEmpEnt->InsertNewEmpCon($conname,$conoccupation,$concompany,$conconviction,$firstname,$middlename,$lastname);
    }

    foreach($arrschoolname as $key => $value){
            $schoolname = $value;
            $schoolfrom = $arrschoolfrom[$key];
            $schoolto = $arrschoolto[$key];
            $coursename = $arrcoursename[$key];
            $certificatedegree = $arrcertificatedegree[$key];

        $newEmpEnt->InsertNewEmpEdu($schoolname,$schoolfrom,$schoolto,$coursename,$certificatedegree,$firstname,$middlename,$lastname);
    }


    foreach($arrstartingposition as $key => $value){
            $startingposition = $value;
            $mostrecentposition = $arrmostrecentposition[$key];
            $jobfrom = $arrjobfrom[$key];
            $jobto= $arrjobto[$key];
            $notypeemployees = $arrnotypeemployees[$key];
            $employername = $arremployername[$key];
            $employeraddress = $arremployeraddress[$key];
            $supervisorname = $arrsupervisorname[$key];
            $supervisortitle = $arrsupervisortitle[$key];
            $duties = $arrduties[$key];
            $reasonforleaving = $arrreasonforleaving[$key];

        $newEmpEnt->InsertNewEmpJob($startingposition,$mostrecentposition,$jobfrom,$jobto,$notypeemployees,$employername,$employeraddress,$supervisorname,$supervisortitle,$duties,$reasonforleaving,$firstname,$middlename,$lastname);
    }



}
    

?>

