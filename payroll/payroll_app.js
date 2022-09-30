$(function(){


    function XLSXExport(){
        $("#payrollAppRegList").tableExport({
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
        e.preventDefault();
         XLSXExport();

    });

});