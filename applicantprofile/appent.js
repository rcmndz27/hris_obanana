$(function(){

    $('#applicantEntry').click(function(e){
        e.preventDefault();
        $('#popUpModal').modal('toggle');

    });

        $('#refby_dis').show();
        $('#refdate_dis').show();
        $('#refby_show').hide();
        $('#refdate_show').hide();
    
    function CheckInput(){
    
        var inputValues = [];
    
        inputValues = [
            $('#firstname'),
            $('#familyname'),
            $('#streetbrgy'),
            $('#contactno1'),
            $('#city'),
            $('#emailadd')             
        ];


        var result = (CheckInputValue(inputValues) === '0') ? true : false;
        return result;
    }

    $('#howtoapply').change(function(){
                if($('#howtoapply').val() !== 'Referred By'){
                        $('#refby_dis').show();
                        $('#refdate_dis').show();
                        $('#refby_show').hide();
                        $('#refdate_show').hide();
                }else{            
                        $('#refby_dis').hide();
                        $('#refdate_dis').hide();
                        $('#refby_show').show();
                        $('#refdate_show').show();
                }   
    });



    $('#emailadd').change(function(){
        var format = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;
        var eadd = document.getElementById("emailadd").value;

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
                var input2 = document.getElementById('emailadd');
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
                'Action': 'InsertAppEnt',
                'fname': $('#firstname').val(),
                'mi': $('#middlei').val(),
                'fmname': $('#familyname').val(),
                'howtoa': $('#howtoapply').val(),
                'refby': $('#referredby').val(),
                'refdate': $('#referreddate').val(),
                'jpos1': $( "#jobpos1 option:selected" ).text(),
                'jpos2': $( "#jobpos2 option:selected" ).text(),
                'hono': $('#houseno').val(),
                'sbrgy': $('#streetbrgy').val(),
                'cty': $('#city').val(),
                'cn1':$('#contactno1').val(),
                'cn2':$('#contactno2').val(),
                'eadd': $('#emailadd').val(),
                'ttry':$( "#tertiary" ).val(),
                'ds1': $( "#discipline1 option:selected" ).text(),
                'scname1': $( "#schoolname1" ).val(),
                'scndry':$( "#secondary" ).val(),
                'ds2':$( "#discipline2 option:selected" ).text(), 
                'scname2':$( "#schoolname2" ).val()                       
            }
    
            param = JSON.stringify(param);

            // swal(param);
            // exit();

                     swal({
                          title: "Are you sure you want to submit this application?",
                          text: "Please make sure all information are true and correct.",
                          icon: "success",
                          buttons: true,
                          dangerMode: true,
                        })
                        .then((appEnt) => {
                          if (appEnt) {
                                    $.ajax({
                                        type: 'POST',
                                        url: '../applicantprofile/appent_process.php',
                                        data: {
                                            data: param
                                        },
                                        success: function (result) {
                                            // console.log('success: ' + result);
                                                    swal({
                                                    title: "Success!", 
                                                    text: "Successfully added new applicant details!", 
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
                    swal({text:"Please fill-up all required (*) fields. ",icon:"error"});
                }
            });


        });







