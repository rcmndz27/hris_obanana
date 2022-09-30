$(function(){


$('#search').click(function(e){
    e.preventDefault();

    document.getElementById("myDiv").style.display="block";
    if($('#empCode').val()== '' || $('#dateTo').val()== '' ){

            swal({text:"Kindly fill up blank fields!",icon:"warning"});

       }else{    

            param = {
                "Action":"GetEmployeeAttendannce",
                "dateFrom":$('#dateFrom').val(),
                "dateTo":$('#dateTo').val(),
                "empCodeParam":$('#empCode').val()

            };
            
            param = JSON.stringify(param);

            
            $.ajax({
                type: "POST",
                url: "../dtr/dtr-viewing-process.php",
                data: {data:param} ,
                success: function (data){
                    // console.log("success: "+ data);
                    $('#empDtrList').remove();      
                    $('#btnExport').remove();
                    $('#dtrViewList').append(data);                  
                    // XLSXExport();
                    document.getElementById("myDiv").style.display="none";
                },
                error: function (data){
                    document.getElementById("myDiv").style.display="none";
                    // console.log("error: "+ data);	
                }
            });//ajax
          }

    });
    
});