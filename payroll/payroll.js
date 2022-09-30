$(function(){


    function XLSXExport(){
        $("#payrollList").tableExport({
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
            sheetname: 'Payroll Attendance'
        });
    }

    $("#search").click(function(e){
             XLSXExport();
             $(".btn btn-primary").prepend('<i class="fas fa-file-export"></i> ');
        });
});

