$(function(){

      $('#manpowerEntry').click(function(e){
        e.preventDefault();
        $('#popUpModal').modal('toggle');

    });
    
    function CheckInput(){
    
        var inputValues = [];
    
        inputValues = [    
        ];


        var result = (CheckInputValue(inputValues) === '0') ? true : false;
        return result;
    }

    $('#Submit').click(function(){


        if (CheckInput() === true) {

            param = {
                'Action': 'InsertManpowerEnt',
                'position': $( "#position option:selected" ).text(),
                'req_ment': $('#req_ment').val(),
                'date_needed': $('#date_needed').val(),
                'status': $('#status').val()                     
            }
    
            param = JSON.stringify(param);

            // swal(param);
            // exit();

                     swal({
                          title: "Are you sure you want to submit this?",
                          text: "Please make sure all information are true and correct.",
                          icon: "success",
                          buttons: true,
                          dangerMode: true,
                        })
                        .then((plaEnt) => {
                          if (plaEnt) {
                                    $.ajax({
                                        type: 'POST',
                                        url: '../applicantprofile/maent_process.php',
                                        data: {
                                            data: param
                                        },
                                        success: function (result) {
                                            console.log('success: ' + result);
                                            location.reload();
                                        },
                                        error: function (result) {
                                            // console.log('error: ' + result);
                                        }
                                    }); //ajax
                          } else {
                            swal({text:"You cancel the submission of your manpower request details!",icon:"error"});
                          }
                        });

                }else{
                }
            });


        });










