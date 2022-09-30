$(function(){


    function XLSXExport(){
        $("#attRepListTab").tableExport({
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
            sheetname: 'Attendance'
        });
    }


    $("#searchPerfect").click(function(e){

         e.preventDefault();
        document.getElementById("myDiv").style.display="block";

        if($('#dateTo').val()== '' ){
            swal({text:"Kindly fill up blank fields!",icon:"warning"});
            document.getElementById("myDiv").style.display="none";

       }else{   

        param = {
          Action: "GetAttRepList",
          datefrom: $("#dateFrom").val(),
          dateto: $("#dateTo").val()
        };
        
        param = JSON.stringify(param);

        var dfdateFr = new Date($("#dateFrom").val());
        var dfmonths = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        var dfrmM = dfmonths[dfdateFr.getMonth()];
        var dfrmD = dfdateFr.getDate();

        var dfdateTo = new Date($("#dateTo").val());
        var dtoM = dfmonths[dfdateTo.getMonth()];
        var dtoD = dfdateTo.getDate();
        var dtoY = dfdateTo.getFullYear();        
                
        $.ajax({
            type: "POST",
            url: "../att_report/attrepProcess.php",
            data: {data:param} ,
            success: function (data){
                // console.log("success: "+ data);
                $("#attRepListTab").html(data);
                XLSXExport();
                $(".fa-file-export").remove();
                $(".btn btn-primary").prepend('<i class="fas fa-file-export"></i>');
                document.getElementById("myDiv").style.display="none";
                document.getElementById('pfromt').innerHTML = 'from '+dfrmM+' '+dfrmD;
                document.getElementById('ptot').innerHTML = ' to '+dtoM+' '+dtoD+', '+dtoY;
            },
            error: function (data){
                
                document.getElementById("myDiv").style.display="none";
                // console.log("error: "+ data);	
            }
        });

        }

    });    

    function XLSXExportLate(){
        $("#lateListTab").tableExport({
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
            sheetname: 'Late'
        });
    }    


    $("#searchLate").click(function(e){

         e.preventDefault();
        document.getElementById("myDiv").style.display="block";

        if($('#dateToL').val()== '' ){
            swal({text:"Kindly fill up blank fields!",icon:"warning"});
            document.getElementById("myDiv").style.display="none";
       }else{   

        param = {
          Action: "GetLateList",
          datefrom: $("#dateFromL").val(),
          dateto: $("#dateToL").val()
        };
        
        param = JSON.stringify(param);

        var dfdateFr = new Date($("#dateFromL").val());
        var dfmonths = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        var dfrmM = dfmonths[dfdateFr.getMonth()];
        var dfrmD = dfdateFr.getDate();

        var dfdateTo = new Date($("#dateToL").val());
        var dtoM = dfmonths[dfdateTo.getMonth()];
        var dtoD = dfdateTo.getDate();
        var dtoY = dfdateTo.getFullYear();        
                
        $.ajax({
            type: "POST",
            url: "../att_report/attrepProcess.php",
            data: {data:param} ,
            success: function (data){
                // console.log("success: "+ data);
                $("#lateListTab").html(data);
                XLSXExportLate();
                $(".fa-file-export").remove();
                $(".btn btn-primary").prepend('<i class="fas fa-file-export"></i>');
                document.getElementById("myDiv").style.display="none";
                document.getElementById('Lpfromt').innerHTML = 'from '+dfrmM+' '+dfrmD;
                document.getElementById('Lptot').innerHTML = ' to '+dtoM+' '+dtoD+', '+dtoY;
            },
            error: function (data){
                
                document.getElementById("myDiv").style.display="none";
                // console.log("error: "+ data);    
            }
        });

        }

    });  

    function XLSXExportUT(){
        $("#utListTab").tableExport({
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
            sheetname: 'Undertime'
        });
    }    


$("#searchUT").click(function(e){

         e.preventDefault();
        document.getElementById("myDiv").style.display="block";

        if($('#dateToU').val()== '' ){
            swal({text:"Kindly fill up blank fields!",icon:"warning"});
            document.getElementById("myDiv").style.display="none";
       }else{   

        param = {
          Action: "GetUTList",
          datefrom: $("#dateFromU").val(),
          dateto: $("#dateToU").val()
        };
        
        param = JSON.stringify(param);

        var dfdateFr = new Date($("#dateFromU").val());
        var dfmonths = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        var dfrmM = dfmonths[dfdateFr.getMonth()];
        var dfrmD = dfdateFr.getDate();

        var dfdateTo = new Date($("#dateToU").val());
        var dtoM = dfmonths[dfdateTo.getMonth()];
        var dtoD = dfdateTo.getDate();
        var dtoY = dfdateTo.getFullYear();        
                
        $.ajax({
            type: "POST",
            url: "../att_report/attrepProcess.php",
            data: {data:param} ,
            success: function (data){
                // console.log("success: "+ data);
                $("#utListTab").html(data);
                XLSXExportUT();
                $(".fa-file-export").remove();
                $(".btn btn-primary").prepend('<i class="fas fa-file-export"></i>');
                document.getElementById("myDiv").style.display="none";
                document.getElementById('Upfromt').innerHTML = 'from '+dfrmM+' '+dfrmD;
                document.getElementById('Uptot').innerHTML = ' to '+dtoM+' '+dtoD+', '+dtoY;
            },
            error: function (data){          
                document.getElementById("myDiv").style.display="none";
                // console.log("error: "+ data);    
            }
        });

        }

    });  

    function XLSXExportN(){
        $("#nListTab").tableExport({
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
            sheetname: 'No Logs'
        });
    } 

    $("#searchN").click(function(e){

        e.preventDefault();
        document.getElementById("myDiv").style.display="block";

        if($('#dateToN').val()== '' ){
            swal({text:"Kindly fill up blank fields!",icon:"warning"});
            document.getElementById("myDiv").style.display="none";
       }else{   
        param = {
          Action: "GetNList",
          datefrom: $("#dateFromN").val(),
          dateto: $("#dateToN").val()
        };
        
        param = JSON.stringify(param);

        var dfdateFr = new Date($("#dateFromN").val());
        var dfmonths = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        var dfrmM = dfmonths[dfdateFr.getMonth()];
        var dfrmD = dfdateFr.getDate();

        var dfdateTo = new Date($("#dateToN").val());
        var dtoM = dfmonths[dfdateTo.getMonth()];
        var dtoD = dfdateTo.getDate();
        var dtoY = dfdateTo.getFullYear();        
                
        $.ajax({
            type: "POST",
            url: "../att_report/attrepProcess.php",
            data: {data:param} ,
            success: function (data){
                // console.log("success: "+ data);
                $("#nListTab").html(data);
                XLSXExportN();
                $(".fa-file-export").remove();
                $(".btn btn-primary").prepend('<i class="fas fa-file-export"></i>');
                document.getElementById("myDiv").style.display="none";
                document.getElementById('Npfromt').innerHTML = 'from '+dfrmM+' '+dfrmD;
                document.getElementById('Nptot').innerHTML = ' to '+dtoM+' '+dtoD+', '+dtoY;
            },
            error: function (data){          
                document.getElementById("myDiv").style.display="none";
                // console.log("error: "+ data);    
            }
        });

        }

    });         

});