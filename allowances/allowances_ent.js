$(function(){

    $('#allowancesEntry').click(function(e){
        e.preventDefault();
        $('#popUpModal').modal('toggle');

    });

    
    function CheckInput(){
    
        var inputValues = [];
    
        inputValues = [
            $('#emp_code'),
            $('#benefit_id'),
            $('#period_cutoff'),
            $('#effectivity_date'),
            $('#amount')          
        ];


        var result = (CheckInputValue(inputValues) === '0') ? true : false;
        return result;
    }



    $('#Submit').click(function(){

        if (CheckInput() === true) {
   
            param = {
                'Action': 'InsertAllowancesEnt',
                'emp_code': $('#emp_code').val(), 
                'benefit_id': $('#benefit_id').val() ,
                'period_cutoff': $( "#period_cutoff option:selected" ).text(),
                'effectivity_date': $('#effectivity_date').val(),
                'eMplogName': $('#eMplogName').val(),
                'amount': $('#amount').val()                   
            }
    
            param = JSON.stringify(param);

            // console.log(param);
            // return false;

                     swal({
                          title: "Are you sure you want to add this employee allowance details?",
                          text: "Please make sure all information are true and correct.",
                          icon: "success",
                          buttons: true,
                          dangerMode: true,
                        })
                        .then((appEnt) => {
                          if (appEnt) {
                                    $.ajax({
                                        type: 'POST',
                                        url: '../allowances/allowancesent_process.php',
                                        data: {
                                            data: param
                                        },
                                        success: function (result) {
                                            swal({
                                                title: "Success!", 
                                                text: "Successfully added the employee allowances details!", 
                                                icon: "success",
                                            }).then(function() {
                                                location.href = '../allowances/allowanceslist_view.php';
                                            });
                                        },
                                        error: function (result) {
                                            console.log('error: ' + result);
                                        }
                                    }); //ajax
                          } else {
                            swal({text:"You cancel the submission of your employee allowance details!",icon:"error"});
                          }
                        });

                }else{
                    swal({text:"Please fill-up all required (*) fields. ",icon:"error"});
                }
            });


        });







