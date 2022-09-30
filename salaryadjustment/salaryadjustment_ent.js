$(function(){

    $('#salaryAdjEntry').click(function(e){
        e.preventDefault();
        $('#popUpModal').modal('toggle');

    });

    
    function CheckInput(){
    
        var inputValues = [];
    
        inputValues = [
            $('#emp_code'),
            $('#salaryAdj_id'),
            $('#remarks'),
            $('#description'),
            $('#inc_decr'),
            $('#amount')        
        ];


        var result = (CheckInputValue(inputValues) === '0') ? true : false;
        return result;
    }




    $('#Submit').click(function(){

        var empcode = $('#emp_code').val();
        // var emp_code = empcode.split(" - ");
        var ddcut_off = $('#ddcutoff').children("option:selected").val();
        var ddcutoff = ddcut_off.split(" - ");


        if (CheckInput() === true) {
   
            param = {
                'Action': 'InsertSalaryAdjEnt',
                'emp_code': empcode,
                'description': $('#description').val(),
                'period_from': ddcutoff[0],
                'period_to': ddcutoff[1],
                'inc_decr': $('#inc_decr').val(),
                'amount': $('#amount').val(),
                'eMplogName': $('#eMplogName').val(),
                'remarks': $('#remarks').val()              
            }
    
            param = JSON.stringify(param);

            // console.log(param);
            // return false;

                     swal({
                          title: "Are you sure you want to add this employee salary adjustment details?",
                          text: "Please make sure all information are true and correct.",
                          icon: "success",
                          buttons: true,
                          dangerMode: true,
                        })
                        .then((appEnt) => {
                          if (appEnt) {
                                    $.ajax({
                                        type: 'POST',
                                        url: '../salaryadjustment/salaryadjustmentent_process.php',
                                        data: {
                                            data: param
                                        },
                                        success: function (result) {
                                                    swal({
                                                    title: "Success!", 
                                                    text: "Successfully added employee salary adjustment detailss!", 
                                                    type: "success",
                                                    icon: "success",
                                                    }).then(function() {
                                                        location.href = '../salaryadjustment/salaryadjustmentlist_view.php';
                                                    });
                                        },
                                        error: function (result) {
                                            // console.log('error: ' + result);
                                        }
                                    }); //ajax
                          } else {
                            swal({text:"You cancel the submission of your employee salary adjustment details!",icon:"error"});
                          }
                        });

                }else{
                    swal({text:"Please fill-up all required (*) fields. ",icon:"error"});
                }
            });


        });







