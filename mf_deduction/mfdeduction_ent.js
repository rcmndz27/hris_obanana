$(function(){

    $('#mfdeductionEntry').click(function(e){
        e.preventDefault();
        $('#popUpModal').modal('toggle');

    });

   
    function CheckInput(){
    
        var inputValues = [];
    
        inputValues = [
            $('#deduction_code'),
            $('#deduction_name'),
            $('#status')
        ];


        var result = (CheckInputValue(inputValues) === '0') ? true : false;
        return result;
    }



    $('#Submit').click(function(){


        if (CheckInput() === true) {

            param = {
                'Action': 'InsertMfdeductionEnt',
                'deduction_code': $('#deduction_code').val(),
                'deduction_name': $('#deduction_name').val(),
                'status': $('#status').children("option:selected").val()                 
            }
    
            param = JSON.stringify(param);

            // swal(param);
            // exit();

                     swal({
                          title: "Are you sure ?",
                          text: "You want to add this deduction.",
                          icon: "success",
                          buttons: true,
                          dangerMode: true,
                        })
                        .then((appEnt) => {
                          if (appEnt) {
                                    $.ajax({
                                        type: 'POST',
                                        url: '../mf_deduction/mfdeductionent_process.php',
                                        data: {
                                            data: param
                                        },
                                        success: function (result) {
                                            swal({
                                            title: "Success!", 
                                            text: "Successfully added the deduction details!", 
                                            type: "success",
                                            icon: "success",
                                            }).then(function() {
                                                location.href = '../mf_deduction/mfdeductionlist_view.php';
                                            }); 
                                        },
                                        error: function (result) {
                                            // console.log('error: ' + result);
                                        }
                                    }); //ajax
                          } else {
                            swal({text:"You cancel the addition of the deduction type!",icon:"error"});
                          }
                        });

                }else{
                    swal({text:"Please fill-up all required (*) fields. ",icon:"error"});
                }
            });


        });







