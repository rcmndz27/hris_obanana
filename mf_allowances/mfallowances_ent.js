$(function(){

    $('#mfallowancesEntry').click(function(e){
        e.preventDefault();
        $('#popUpModal').modal('toggle');

    });

   
    function CheckInput(){
    
        var inputValues = [];
    
        inputValues = [
            $('#benefit_code'),
            $('#benefit_name')
        ];


        var result = (CheckInputValue(inputValues) === '0') ? true : false;
        return result;
    }



    $('#Submit').click(function(){


        if (CheckInput() === true) {


   
            param = {
                'Action': 'InsertMfallowancesEnt',
                'benefit_code': $('#benefit_code').val(),
                'benefit_name': $('#benefit_name').val()                 
            }
    
            param = JSON.stringify(param);

            // swal(param);
            // exit();

                     swal({
                          title: "Are you sure ?",
                          text: "You want to add this allowances type.",
                          icon: "success",
                          buttons: true,
                          dangerMode: true,
                        })
                        .then((appEnt) => {
                          if (appEnt) {
                                    $.ajax({
                                        type: 'POST',
                                        url: '../mf_allowances/mfallowancesent_process.php',
                                        data: {
                                            data: param
                                        },
                                        success: function (result) {
                                            console.log('success: ' + result);
                                            swal({text:"Successfully added allowances type!",icon:"success"});
                                            location.reload();
                                        },
                                        error: function (result) {
                                            console.log('error: ' + result);
                                        }
                                    }); //ajax
                          } else {
                            swal({text:"You cancel the submission of your  allowances type!",icon:"error"});
                          }
                        });

                }else{
                    swal({text:"Please fill-up all required (*) fields. ",icon:"error"});
                }
            });


        });







