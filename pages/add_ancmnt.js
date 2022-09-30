var pdfFile;

function GetMedFile() {
    var selectedfile = document.getElementById("medicalfiles").files;
    if (selectedfile.length > 0) {
        var uploadedFile = selectedfile[0];
        var fileReader = new FileReader();
        var fl = uploadedFile.name;

        fileReader.onload = function (fileLoadedEvent) {
            var srcData = fileLoadedEvent.target.result;
            pdfFile =  fl;
        }
        fileReader.readAsDataURL(uploadedFile);
    }
}


function uploadFile() {

   var files = document.getElementById("medicalfiles").files;

   if(files.length > 0 ){

      var formData = new FormData();
      formData.append("file", files[0]);

      var xhttp = new XMLHttpRequest();

      // Set POST method and ajax file path
      xhttp.open("POST", "../pages/ajaxfile.php", true);

      // call on request changes state
      xhttp.onreadystatechange = function() {
         if (this.readyState == 4 && this.status == 200) {

           var response = this.responseText;
           if(response == 1){
              // alert("Upload successfully.");
           }else{
              // alert("File not uploaded.");
           }
         }
      };

      // Send request with data
      xhttp.send(formData);

   }else{
      // alert("Please select a file");
   }

}

    
  

$(function(){


$('#date_to').change(function(){

if($('#date_to').val() < $('#date_from').val()){

    swal({text:"Date to must be greater than date from!",icon:"error"});

    var input2 = document.getElementById('date_to');
    input2.value = '';               
}
});


$('#date_from').change(function(){

if($('#date_from').val() > $('#date_to').val()){
    var input2 = document.getElementById('date_to');
    document.getElementById("date_to").min = $('#date_from').val();
    input2.value = '';
}
});


document.getElementById("dfrom").style.display="none";
document.getElementById("dto").style.display="none";
document.getElementById("date_from").style.display="none";
document.getElementById("date_to").style.display="none";

    $('#status').change(function(){

        if ($(this).val() == 1){
            document.getElementById("dfrom").style.display="none";
            document.getElementById("dto").style.display="none";
            document.getElementById("date_from").style.display="none";
            document.getElementById("date_to").style.display="none";
            console.log('Permanent');
        }else {
            document.getElementById("dfrom").style.display="block";
            document.getElementById("dto").style.display="block";
            document.getElementById("date_from").style.display="block";
            document.getElementById("date_to").style.display="block";
            console.log('Temporary');
        }


    
});

    function CheckInput() {

        var inputValues = [];

        inputValues = [
            
            $('#description'),
            $('#status'),
            $('#medicalfiles')
            
        ];

        var result = (CheckInputValue(inputValues) === '0') ? true : false;
        return result;
    }


    $('#addAncmnt').click(function(e){
        e.preventDefault();
        $('#popUpModal').modal('toggle');


   });

    $('#Submit').click(function(){

            if (CheckInput() === true) {

                param = {
                    "Action":"AddAncmnt",
                    "description": $('#description').val(),
                    "status": $('#status').val(),
                    "date_from": $('#date_from').val(),
                    "date_to": $('#date_to').val(),
                    "filename": pdfFile
    
                };
                
                param = JSON.stringify(param);

                // console.log(param);
                // return false;

                        swal({
                          title: "Are you sure?",
                          text: "You want to add this announcement?",
                          icon: "success",
                          buttons: true,
                          dangerMode: true,
                        })
                        .then((applyLeave) => {
                            document.getElementById("myDiv").style.display="block";
                          if (applyLeave) {
                                    $.ajax({
                                        type: "POST",
                                        url: "../pages/addAncmntProcess.php",
                                        data: {data:param} ,
                                        success: function (data){
                                            console.log("success: "+ data);
                                                    swal({
                                                    title: "Success!", 
                                                    text: "Successfully added announcement details!", 
                                                    type: "success",
                                                    icon: "success",
                                                    }).then(function() {
                                                        location.href = '../pages/admin.php';
                                                    });
                                        },
                                        error: function (data){
                                            console.log("error: "+ data);    
                                        }
                                    });//ajax
                          } else {
                            document.getElementById("myDiv").style.display="none";
                            swal({text:"You cancel your addition of announcement!",icon:"error"});
                          }
                        });



            }else{
                swal({text:"Kindly fill up blank fields.",icon:"warning"});
            }

    
        
    });

    
 

});


