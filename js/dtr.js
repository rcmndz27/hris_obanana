$(function(){


    function XLSXExport(){
        $("#dtrList").tableExport({
            headers: true,
            footers: true,
            formats: ['xlsx'],
            filename: 'id',
            bootstrap: false,
            exportButtons: true,
            position: 'top',
            ignoreRows: null,
            ignoreCols: null,
            trimWhitespace: true,
            RTL: false,
            sheetname: 'id'
        });
    }

    $("#search").click(function(e){

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
                $("#tableList").html(data);
                XLSXExport();
                $(".xprtxcl").prepend('<i class="fas fa-file-export"></i> ');

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