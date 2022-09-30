$(function(){


    $("#search").click(function(e){

         e.preventDefault();
        document.getElementById("myDiv").style.display="block";

        if($('#dateTo').val()== '' ){

            swal({text:"Kindly fill up blank fields!",icon:"warning"});
            document.getElementById("myDiv").style.display="none";

       }else{   

        param = {
          Action: "GetAttendanceList",

          datefrom: $("#dateFrom").val(),
          dateto: $("#dateTo").val(),
          empcode: $("#empCode").val(),
        };
        
        param = JSON.stringify(param);
        
        $.ajax({
            type: "POST",
            url: "../controller/dtrProcess.php",
            data: {data:param} ,
            success: function (data){
                // console.log("success: "+ data);
                    $('#dtrList').remove();      
                    $('#btnExport').remove();
                    $('#dtrViewList').append(data);     
                // XLSXExport();
                document.getElementById("myDiv").style.display="none";
            },
            error: function (data){
                
                document.getElementById("myDiv").style.display="none";
                // console.log("error: "+ data);	
            }
        });

        }

    });    

});