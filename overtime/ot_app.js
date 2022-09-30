 $(function(){

   $('#planot').hide();

    function CheckInput() {

        var inputValues = [];

        inputValues = [

            $('#otdate'),
            $('#remarks'),
            $('#otstartdtime'),
            $('#otenddtime')         
        ]

        var result = (CheckInputValue(inputValues) === '0') ? true : false;
        return result;
    }


$('#Submit').click(function(){

    
            var e_req = $('#e_req').val();
            var n_req = $('#n_req').val();
            var e_appr = $('#e_appr').val();
            var n_appr = $('#n_appr').val();            


            if (CheckInput() === true) {

                param = {
                    "Action":"ApplyOtApp",
                    "otdate": $('#otdate').val(),
                    "otstartdtime": $('#otstartdtime').val(),
                    "otenddtime": $('#otenddtime').val(),
                    "remarks": $('#remarks').val(),
                    "e_req": e_req,
                    "n_req": n_req,
                    "e_appr": e_appr,
                    "n_appr": n_appr
                };
                
                param = JSON.stringify(param);

                // console.log(param);
                // return false;

                            swal({
                              title: "Are you sure?",
                              text: "You want to apply this overtime?",
                              icon: "info",
                              buttons: true,
                              dangerMode: true,
                            })
                            .then((applyOT) => {
                            document.getElementById("myDiv").style.display="block";
                              if (applyOT) {
                                        $.ajax({
                                        type: "POST",
                                        url: "../overtime/ot_app_process.php",
                                        data: {data:param} ,
                                        success: function (data){
                                            console.log("success: "+ data);
                                                    swal({
                                                    title: "Success!", 
                                                    text: "Successfully added overtime details!", 
                                                    type: "success",
                                                    icon: "success",
                                                    }).then(function() {
                                                        location.href = '../overtime/ot_app_view.php';
                                                    });
                                        },
                                        error: function (data){
                                            // alert('error');
                                        }
                                    });//ajax

                              } else {
                                document.getElementById("myDiv").style.display="none";
                                swal({text:"You cancel your overtime!",icon:"error"});
                              }
                            });

                 
            }else{
                swal({text:"Kindly fill up blank fields!",icon:"error"});
            }
                        
      
        
    });



 $('#applyOvertime').click(function(e){
        e.preventDefault();
        $('#popUpModal').modal('toggle');

    });

});
