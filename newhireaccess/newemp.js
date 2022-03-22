var empImgFile;

function GetEmpImgFile() {
    var selectedfile = document.getElementById("empimgpic").files;
    if (selectedfile.length > 0) {
        var uploadedFile = selectedfile[0];
        var fileReader = new FileReader();
        var fl = uploadedFile.name;

        fileReader.onload = function (fileLoadedEvent) {
            var srcData = fileLoadedEvent.target.result;
            empImgFile =  fl;
        }
        fileReader.readAsDataURL(uploadedFile);
    }
}


$(function(){


    $('#newEmployeeEntry').click(function(e){
        e.preventDefault();
        $('#popUpModal').modal('toggle');

    });


        var fil = document.getElementById('nationality');
        fil.value = 'Filipino';

        $('#refby_dis').show();
        $('#refby_show').hide();
        $('#married_dependents_dis').show();
        $('#married_dependents_show').hide();

    
    function CheckInput(){
    
        var inputValues = [];
    
        inputValues = [
            // $('#empimgpic'),
            // $('#telno'),            
            // $('#reason_position'),
            // $('#expected_salary'),
            $('#preffieldwork'),
            $('#preffieldwork1'),
            $('#positiontitle'),
            $('#positiontitle1'),
            $('#howtoapply'),
            $('#firstname'),
            $('#lastname'),
            $('#emp_address'),
            $('#emp_address2'),
            $('#celno'),
            $('#emailaddress'),
            $('#birthdate'),
            $('#birthplace'),
            $('#age'),
            $('#nationality'),
            $('#sex'),
            $('#marital_status'),
            $('#contactpersonname'),
            $('#contactpersonno')
        ];

        var result = (CheckInputValue(inputValues) === '0') ? true : false;
        return result;
    }


    $('#howtoapply').change(function(){
                if($('#howtoapply').val() !== 'Referred By'){
                        $('#refby_dis').show();
                        $('#refby_show').hide();
                }else{            
                        $('#refby_dis').hide();
                        $('#refby_show').show();
                }   
    });


    $('#tax_status').change(function(){
                if($('#tax_status').val() !== 'Married'){
                        $('#married_dependents_dis').show();
                        $('#married_dependents_show').hide();
                }else{            
                        $('#married_dependents_dis').hide();
                        $('#married_dependents_show').show();
                }   
    });

   

    $('#birthdate').change(function(){

    var dot = $('#birthdate').val();

    var currentDate = new Date(dot);
    var day = ("0" + (currentDate.getDate())).slice(-2);
    var month = ("0" + (currentDate.getMonth() + 1)).slice(-2);
    var year = currentDate.getFullYear()
    var dobb =  month + "/" + day + "/" + year;

    var dob = new Date(dobb);

    var age = getAge(dobb);

    var ages = document.getElementById('age');
    ages.value = age;

    });

    $('#spousebirthdate').change(function(){

    var dot = $('#spousebirthdate').val();

    var currentDate = new Date(dot);
    var day = ("0" + (currentDate.getDate())).slice(-2);
    var month = ("0" + (currentDate.getMonth() + 1)).slice(-2);
    var year = currentDate.getFullYear()
    var dobb =  month + "/" + day + "/" + year;

    var dob = new Date(dobb);

    var age = getAge(dobb);

    var ages = document.getElementById('spouseage');
    ages.value = age;

    });


    function getAge(dateString) {

    var today = new Date();
    var birthDate = new Date(dateString);
    var age = today.getFullYear() - birthDate.getFullYear();
    var m = today.getMonth() - birthDate.getMonth();
    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
        age--;
    }
    return age;
}

    $('#perma').click(function(){
    
        var empad = document.getElementById('emp_address2');
        empad.value = $('#emp_address').val();

    });

     function onlyNumberKey(evt) {
          
        // Only ASCII character in that range allowed
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
            return swal({text:"Only numbers are allowed!",icon:"error"});;
        return true;
    }




    $('#emailaddress').change(function(){
        var format = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;
        var eadd = document.getElementById("emailaddress").value;

        if(format.test(eadd)){
          // return swal('correct email');
        } else {      
            swal({
           title: "Oops...wrong email format",
           text: "example: useremp@yahoo.com",
            type: "error",
             icon: "error",
              dangerMode: true
            }).then(function() {
                var input2 = document.getElementById('emailaddress');
                input2.value = '';                       
            });          

        }   

    });

    $('#emailaddress1').change(function(){
        var format = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;
        var eadd = document.getElementById("emailaddress1").value;

        if(format.test(eadd)){
          // return swal('correct email');
        } else {
            swal({
           title: "Oops...wrong email format",
           text: "example: useremp@yahoo.com",
            type: "error",
             icon: "error",
              dangerMode: true
            }).then(function() {
                var input2 = document.getElementById('emailaddress1');
                input2.value = '';                       
            }); 
        }   

    });



    $('#jobpos1').change(function(){
        
        if($('#jobpos1').val() === $('#jobpos2').val()){
             swal({title: "Position applied 1st preference should not be equal to 2nd preference.",
                          icon: "warning",
                          dangerMode: true
                        });

               $('#jobpos1 option').prop('selected', function() {
                    return this.defaultSelected;
                });
         }else{
            
         }

    });

    $('#jobpos2').change(function(){
        
        if($('#jobpos1').val() === $('#jobpos2').val()){
             swal({title: "Position applied 1st preference should not be equal to 2nd preference.",
                          icon: "warning",
                          dangerMode: true
                        });
                         
               $('#jobpos2 option').prop('selected', function() {
                    return this.defaultSelected;
                });

         }else{

         }

    });


    $('#Submit').click(function(){

        if (CheckInput() === true) {
    
            param = {
                'Action': 'InsertNewEmpEnt',
                "emp_pic_loc": empImgFile,
                'preffieldwork': $('#preffieldwork').val(),
                'preffieldwork1': $('#preffieldwork1').val(),
                'positiontitle': $('#positiontitle').val(),
                'positiontitle1': $('#positiontitle1').val(),  
                // 'reason_position': $('#reason_position').val(),
                // 'expected_salary': $('#expected_salary').val(),  
                'howtoapply': $( "#howtoapply option:selected" ).text(),
                'referredby': $('#referredby').val(),                                
                'firstname': $('#firstname').val(),
                'middlename': $('#middlename').val(),
                'lastname': $('#lastname').val(),
                'maidenname':$('#maidenname').val(),
                'emp_address':$('#emp_address').val(),
                'emp_address2': $('#emp_address2').val(),
                'telno':$( "#telno" ).val(),
                'telno1': $( "#telno1" ).val(),
                'celno':$( "#celno" ).val(),
                'celno1':$( "#celno1" ).val(),
                'emailaddress':$( "#emailaddress" ).val(),
                'emailaddress1':$( "#emailaddress1" ).val(),
                'birthdate':$( "#birthdate" ).val(),                       
                'birthplace':$( "#birthplace" ).val(),
                'nationality':$( "#nationality" ).val(),
                'residence_certno':$( "#residence_certno" ).val(),
                'residence_certdate':$( "#residence_certdate" ).val(),
                'residence_certplace':$( "#residence_certplace" ).val(),
                'tin_no':$( "#tin_no" ).val(),
                'sss_no':$( "#sss_no" ).val(),
                'phil_no':$( "#phil_no" ).val(),
                'pagibig_no':$( "#pagibig_no" ).val(),
                'tax_status':$( "#tax_status" ).val(),
                'married_dependents':$( "#married_dependents" ).val(),
                'sex':$( "#sex" ).val(),
                'marital_status':$( "#marital_status" ).val(),
                'depname': $("input[name='depname[]']").map(function(){return $(this).val();}).get(),
                'depbirthdate': $("input[name='depbirthdate[]']").map(function(){return $(this).val();}).get(),
                'deprelationship': $("input[name='deprelationship[]']").map(function(){return $(this).val();}).get(),
                'spousename':$( "#spousename" ).val(),
                'spousebirthdate':$( "#spousebirthdate" ).val(),
                'spouseoccupation':$( "#spouseoccupation" ).val(),
                'spousecompany':$( "#spousecompany" ).val(),
                'fathername':$( "#fathername" ).val(),
                'fatheroccupation':$( "#fatheroccupation" ).val(),
                'fatherbirthdate':$( "#fatherbirthdate" ).val(),
                'mothername':$( "#mothername" ).val(),
                'motheroccupation':$( "#motheroccupation" ).val(),
                'motherbirthdate':$( "#motherbirthdate" ).val(),
                'sex':$( "#sex" ).val(),
                'sibname': $("input[name='sibname[]']").map(function(){return $(this).val();}).get(),
                'sibrelationship': $("input[name='sibrelationship[]']").map(function(){return $(this).val();}).get(),
                'companyrelatives':$( "#companyrelatives" ).val(),
                'contactpersonname':$( "#contactpersonname" ).val(),
                'contactpersonno':$( "#contactpersonno" ).val(),
                'contactpersonaddress':$( "#contactpersonaddress" ).val(),
                'legalconvictioncharge':$( "#legalconvictioncharge" ).val(),
                'legalconvictiondate':$( "#legalconvictiondate" ).val(),
                'legalconvictionwhere':$( "#legalconvictionwhere" ).val(),
                'legalconviction':$( "#legalconviction" ).val(),
                'civilcase':$( "#civilcase" ).val(),
                'conname': $("input[name='conname[]']").map(function(){return $(this).val();}).get(),
                'conoccupation': $("input[name='conoccupation[]']").map(function(){return $(this).val();}).get(),
                'concompany': $("input[name='concompany[]']").map(function(){return $(this).val();}).get(),
                'conconviction': $("input[name='conconviction[]']").map(function(){return $(this).val();}).get(),                                
                'rightsemployee':$( "#rightsemployee" ).val(),
                'schoolfrom': $("input[name='schoolfrom[]']").map(function(){return $(this).val();}).get(),
                'schoolto': $("input[name='schoolto[]']").map(function(){return $(this).val();}).get(),
                'schoolname': $("input[name='schoolname[]']").map(function(){return $(this).val();}).get(),
                'coursename': $("input[name='coursename[]']").map(function(){return $(this).val();}).get(),
                'certificatedegree': $("input[name='certificatedegree[]']").map(function(){return $(this).val();}).get(),
                'jobfrom': $("input[name='jobfrom[]']").map(function(){return $(this).val();}).get(),
                'jobto': $("input[name='jobto[]']").map(function(){return $(this).val();}).get(),
                'startingposition': $("input[name='startingposition[]']").map(function(){return $(this).val();}).get(),
                'mostrecentposition': $("input[name='mostrecentposition[]']").map(function(){return $(this).val();}).get(),
                'notypeemployees': $("input[name='notypeemployees[]']").map(function(){return $(this).val();}).get(),
                'employername': $("input[name='employername[]']").map(function(){return $(this).val();}).get(),
                'employeraddress': $("input[name='employeraddress[]']").map(function(){return $(this).val();}).get(),
                'supervisorname': $("input[name='supervisorname[]']").map(function(){return $(this).val();}).get(),
                'supervisortitle': $("input[name='supervisortitle[]']").map(function(){return $(this).val();}).get(),
                'duties': $("input[name='duties[]']").map(function(){return $(this).val();}).get(),
                'reasonforleaving': $("input[name='reasonforleaving[]']").map(function(){return $(this).val();}).get()
            }
        
            // console.log(param);
            // exit();
            param = JSON.stringify(param);


            var files = document.getElementById("empimgpic").files;

                   if(files.length > 0 ){

                      var formData = new FormData();
                      formData.append("file", files[0]);

                      var xhttp = new XMLHttpRequest();

                      // Set POST method and ajax file path
                      xhttp.open("POST", "newemp_uploadajaxfile.php", true);

                      // call on request changes state
                      xhttp.onreadystatechange = function() {
                         if (this.readyState == 4 && this.status == 200) {

                           var response = this.responseText;
                           if(response == 1){
                               swal({
                                  title: "Are you sure you want to submit this employee details?",
                                  text: "Please make sure all information are true and correct.",
                                  icon: "success",
                                  buttons: true,
                                  dangerMode: true,
                                })
                                .then((newEmp) => {
                                  if (newEmp) {
                                            $.ajax({
                                                type: 'POST',
                                                url: '../newhireaccess/newempent_process.php',
                                                data: {
                                                    data: param
                                                },
                                                success: function (result) {                                            
                                                    // console.log('success: ' + result);
                                                    swal({
                                                    title: "Wow!", 
                                                    text: "Successfully added new employee details!", 
                                                    type: "success",
                                                    icon: "success",
                                                    }).then(function() {
                                                        location.href = '../index.php';
                                                    });
                                                },
                                                error: function (result) {
                                                    // console.log('error: ' + result);
                                                }
                                            }); //ajax
                                  } else {
                                    swal({text:"You cancel the submission of your applicant details!",icon:"error"});
                                  }
                                });
                           }else{
                              swal("File not uploaded.");
                           }
                         }
                      };

                      // Send request with data
                      xhttp.send(formData);

                   }else{
                      swal("Please select an image file");
                   }
                    

                }else{
                    swal({text:"Please fill-up all required (*) fields. ",icon:"error"});
                }
            });


        });







