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
                'eMplogName': $('#eMplogName').val(),
                'status': $('#status').val()                     
            }
    
            param = JSON.stringify(param);

            // console.log(param);
            // return false;

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
                                                    swal({
                                                    title: "Success!", 
                                                    text: "Successfully added manpower details!", 
                                                    type: "success",
                                                    icon: "success",
                                                    }).then(function(e) {
                                                        location.href = '../applicantprofile/manpowerlist_view.php';
                                                    });                                     
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










