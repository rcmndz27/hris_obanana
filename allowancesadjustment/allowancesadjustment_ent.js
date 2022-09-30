$(function(){

    $('#allowancesAdjEntry').click(function(e){
        e.preventDefault();
        $('#popUpModal').modal('toggle');

    });

    
    function CheckInput(){
    
        var inputValues = [];
    
        inputValues = [
            $('#emp_code'),
            $('#allowancesadj_id'),
            $('#remarks'),
            $('#aladj_date'),
            $('#description'),
            $('#inc_decr'),
            $('#amount')        
        ];


        var result = (CheckInputValue(inputValues) === '0') ? true : false;
        return result;
    }




    $('#Submit').click(function(){

        var empcode = $('#emp_code').children("option:selected").val();
        var emp_code = empcode.split(" - ");


        if (CheckInput() === true) {
   
            param = {
                'Action': 'InsertAllowancesAdjEnt',
                'emp_code': emp_code[0],
                'description': $('#description').val(),
                'aladj_date': $('#aladj_date').val(),
                'inc_decr': $('#inc_decr').val(),
                'amount': $('#amount').val(),
                'remarks': $('#remarks').val()              
            }
    
            param = JSON.stringify(param);

            // console.log(param);
            // exit();

                     swal({
                          title: "Are you sure you want to add this employee allowances adjustment details?",
                          text: "Please make sure all information are true and correct.",
                          icon: "success",
                          buttons: true,
                          dangerMode: true,
                        })
                        .then((appEnt) => {
                          if (appEnt) {
                                    $.ajax({
                                        type: 'POST',
                                        url: '../allowancesadjustment/allowancesadjustmentent_process.php',
                                        data: {
                                            data: param
                                        },
                                        success: function (result) {
                                                    swal({
                                                    title: "Success!", 
                                                    text: "Successfully added employee allowances adjustment detailss!", 
                                                    type: "success",
                                                    icon: "success",
                                                    }).then(function() {
                                                        location.href = '../allowancesadjustment/allowancesadjustmentlist_view.php';
                                                    });
                                        },
                                        error: function (result) {
                                            // console.log('error: ' + result);
                                        }
                                    }); //ajax
                          } else {
                            swal({text:"You cancel the submission of your employee allowances adjustment details!",icon:"error"});
                          }
                        });

                }else{
                    swal({text:"Please fill-up all required (*) fields. ",icon:"error"});
                }
            });


        });







