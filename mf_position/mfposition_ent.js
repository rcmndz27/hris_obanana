$(function(){

    $('#mfpositionEntry').click(function(e){
        e.preventDefault();
        $('#popUpModal').modal('toggle');

    });

   
    function CheckInput(){
    
        var inputValues = [];
    
        inputValues = [
            $('#position'),
            $('#status')
        ];


        var result = (CheckInputValue(inputValues) === '0') ? true : false;
        return result;
    }



    $('#Submit').click(function(){


        if (CheckInput() === true) {
        
            param = {
                'Action': 'InsertMfpositionEnt',
                'position': $('#position').val(),
                'department': $('#department').val(),
                'status': $('#status').children("option:selected").val(),
                'empCode': $('#empCode').val(),                  
            }
    
            param = JSON.stringify(param);

            // swal(param);
            // exit();

                     swal({
                          title: "Are you sure ?",
                          text: "You want to add this job position.",
                          icon: "success",
                          buttons: true,
                          dangerMode: true,
                        })
                        .then((posEnt) => {
                          if (posEnt) {
                                    $.ajax({
                                        type: 'POST',
                                        url: '../mf_position/mfpositionent_process.php',
                                        data: {
                                            data: param
                                        },
                                        success: function (result) {
                                            // console.log('success: ' + result);
                                            swal({
                                            title: "Success!", 
                                            text: "Successfully added the job details!", 
                                            type: "success",
                                            icon: "success",
                                            }).then(function() {
                                                location.href = '../mf_position/mfpositionlist_view.php';
                                            }); 
                                        },
                                        error: function (result) {
                                            // console.log('error: ' + result);
                                        }
                                    }); //ajax
                          } else {
                            swal({text:"You cancel the addition of the job position!",icon:"error"});
                          }
                        });

                }else{
                    swal({text:"Please fill-up all required (*) fields. ",icon:"error"});
                }
            });


        });







