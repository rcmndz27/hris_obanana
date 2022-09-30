$(function(){

    $('#LeaveBalanceEntry').click(function(e){
        e.preventDefault();
        $('#popUpModal').modal('toggle');

    });

    
    function CheckInput(){
    
        var inputValues = [];
    
        inputValues = [
            $('#emp_code'),
            $('#earned_sl'),
            $('#earned_vl'),
            $('#earned_fl')       
        ];


        var result = (CheckInputValue(inputValues) === '0') ? true : false;
        return result;
    }



$('#Submit').click(function(){

if (CheckInput() === true) {

param = {
'Action': 'InsertLeaveBalanceEnt',
'emp_code': $('#emp_code').val(), 
'earned_sl': $('#earned_sl').val(),
'earned_vl': $('#earned_vl').val(),
'earned_fl': $('#earned_fl').val(),
'eMplogName': $('#eMplogName').val(),
'earned_sl_bank': $('#earned_sl_bank').val()                  
}

param = JSON.stringify(param);

// console.log(param);
// return false;

swal({
  title: "Are you sure you want to add this employee leave balance details?",
  text: "Please make sure all information are true and correct.",
  icon: "success",
  buttons: true,
  dangerMode: true,
})
.then((appEnt) => {
  if (appEnt) {
    $.ajax({
        type: 'POST',
        url: '../leavebalance/leavebalanceent_process.php',
        data: {
            data: param
        },
        success: function (result) {
            console.log('success: ' + result);
            swal({
                title: "Success!", 
                text: "Successfully added the employee leave balance details!", 
                icon: "success",
            }).then(function() {
                location.href = '../leavebalance/leavebalancelist_view.php';
            });
        },
        error: function (result) {
            console.log('error: ' + result);
        }
    }); //ajax
  } else {
    swal({text:"You cancel the submission of your employee leave balance details!",icon:"error"});
  }
});

}else{
swal({text:"Please fill-up all required (*) fields. ",icon:"error"});
}
});


});







