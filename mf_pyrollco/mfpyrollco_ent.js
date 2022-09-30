$(function(){

    $('#mfpyrollcoEntry').click(function(e){
        e.preventDefault();
        $('#popUpModal').modal('toggle');

    });

   
    function CheckInput(){
    
        var inputValues = [];
    
        inputValues = [
            $('#pyrollco_from'),
            $('#pyrollco_to'),
            $('#co_type')
        ];


        var result = (CheckInputValue(inputValues) === '0') ? true : false;
        return result;
    }



    $('#Submit').click(function(){


        if (CheckInput() === true) {
   
            param = {
                'Action': 'InsertMfpyrollcoEnt',
                'pyrollco_from': $('#pyrollco_from').val(),
                'pyrollco_to': $('#pyrollco_to').val(),
                'co_type': $('#co_type').val(),
                'eMplogName': $('#eMplogName').val()                             
            }
    
            param = JSON.stringify(param);

            // console.log(param);
            // return false;

                     swal({
                          title: "Are you sure ?",
                          text: "You want to add this payroll cut-off.",
                          icon: "success",
                          buttons: true,
                          dangerMode: true,
                        })
                        .then((appEnt) => {
                          if (appEnt) {
                                    $.ajax({
                                        type: 'POST',
                                        url: '../mf_pyrollco/mfpyrollcoent_process.php',
                                        data: {
                                            data: param
                                        },
                                        success: function (result) {
                                            swal({
                                            title: "Success!", 
                                            text: "Successfully added the payroll cut-off details!", 
                                            type: "success",
                                            icon: "success",
                                            }).then(function() {
                                                location.href = '../mf_pyrollco/mfpyrollcolist_view.php';
                                            }); 
                                        },
                                        error: function (result) {
                                            // console.log('error: ' + result);
                                        }
                                    }); //ajax
                          } else {
                            swal({text:"You cancel the addition of the payroll cut-off!",icon:"error"});
                          }
                        });

                }else{
                    swal({text:"Please fill-up all required (*) fields. ",icon:"error"});
                }
            });


        });







