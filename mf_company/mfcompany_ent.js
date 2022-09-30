$(function(){

    $('#mfcompanyEntry').click(function(e){
        e.preventDefault();
        $('#popUpModal').modal('toggle');

    });

   
    function CheckInput(){
    
        var inputValues = [];
    
        inputValues = [
            $('#code'),
            $('#descs'),
            $('#status')
        ];


        var result = (CheckInputValue(inputValues) === '0') ? true : false;
        return result;
    }




    $('#Submit').click(function(){


        if (CheckInput() === true) {
   
            param = {
                'Action': 'InsertMfcompanyEnt',
                'code': $('#code').val(),
                'descs': $('#descs').val(),
                'status': $('#status').children("option:selected").val()                                    
            }
    
            param = JSON.stringify(param);

            // swal(param);
            // exit();

                     swal({
                          title: "Are you sure ?",
                          text: "You want to add this company.",
                          icon: "success",
                          buttons: true,
                          dangerMode: true,
                        })
                        .then((appEnt) => {
                          if (appEnt) {
                                    $.ajax({
                                        type: 'POST',
                                        url: '../mf_company/mfcompanyent_process.php',
                                        data: {
                                            data: param
                                        },
                                        success: function (result) {
                                            swal({
                                            title: "Success!", 
                                            text: "Successfully added the company details!", 
                                            type: "success",
                                            icon: "success",
                                            }).then(function() {
                                                location.href = '../mf_company/mfcompanylist_view.php';
                                            });  
                                        },
                                        error: function (result) {
                                            // console.log('error: ' + result);
                                        }
                                    }); //ajax
                          } else {
                            swal({text:"You cancel the addition of the company!",icon:"error"});
                          }
                        });

                }else{
                    swal({text:"Please fill-up all required (*) fields. ",icon:"error"});
                }
            });


        });







