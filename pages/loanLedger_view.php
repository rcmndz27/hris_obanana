<?php
    session_start();

    if (empty($_SESSION['userid']))
    {
        include_once('../loginfirst.php');
        exit();
    }
    else
    {
        include('../_header.php');
        include('../controller/loanLedger.php');
    }
?>

<!-- <div class='container loanledgerContainer'>
    <div class='row'>
        <div class='col-lg-12'>
            <h3 class='subtitle'><u>Loan Ledger</u></h3>
        </div>
    </div>
    <div class='row contentsContainer'>
        <div id='loanSummmary' class='col-lg-5'>
           
        </div>
        <div id='contents' class='col-lg-7'></div>
    </div>
</div> -->

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 pt-5">
            <h3>Loan Ledger</h3>
        </div>
    </div>
    <div class="row pt-3">
        <div class="col-md-12">
            <div class="panel-body">
                <div id="tableList" class="table-responsive-sm table-body"> <?php ShowAllLoan($empName); ?></div>
            </div>
        </div>
    </div>
</div>


<script type='text/javascript'>
    function ShowLoan()
    {
        $('#contents').html('');

        $('.btnViewLoan').click(function(e)
        {
            var url = "../controller/loanLedgerProcess.php";

            $.post (
                url,
                { dcNo: $(this).text() },
                function(data) { $("#contents").html(data).show(); }
            );
        });
    }
</script>

<?php  include('../_footer.php');?>