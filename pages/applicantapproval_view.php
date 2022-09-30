<?php
    session_start();
    if (empty($_SESSION["userid"]))
    {
        header( "refresh:1;url=../index.php" );
    }
    else
    {
        include("../_header.php");

        if ($empType == "Staff")
        {
          header( "refresh:1;url=../index.php" );
        }
        else
        {
          include("../controller/applicantapproval.php");
        }
    }
?>

<style type="text/css">
  
  table,th{

                border: 1px solid #dee2e6;
                font-weight: 600;
                font-size: 14px;
 }   


table,td{

                border: 1px solid #dee2e6;
 }  

 th,td{
    border: 1px solid #dee2e6;
 }
  
table {
        border: 1px solid #dee2e6;
        color: #ffff;
        margin-bottom: 100px;
        border: 2px solid black;
        background-color: white;
      }


.bld{
  font-weight: bolder;
}

.mbt {
    background-color: #faf9f9;
    padding: 30px;
    border-radius: 0.25rem;
}
</style>
<div class="container">
    <div class="section-title">
          <h1>APPLICANT APPROVAL</h1>
        </div>
    <div class="main-body mbt">

          <!-- Breadcrumb -->
          <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item active" aria-current="page"><b><i class='fas fa-users fa-fw'>
                        </i>&nbsp;APPLICANT APPROVAL</b></li>
            </ol>
          </nav>

   <div class="form-row pt-3">
      <div class="col-md-6 my-1">
        <input type="text" id="keyword" class="form-control" placeholder="Applicant Name or Position">
      </div>

      <div class="col-md-6 my-1">
        <button type="submit" class="serchtv" id="search"><i class="fas fa-search"></i> SEARCH</button>
      </div>
    </div>
  </form>

  <div class="row">
    <div class="col-md-12">
      <div class="panel-body">
        <div id="applicantTable" class="table-responsive-sm table-body"></div>
      </div>
    </div>
  </div>
</div>
</div>
<br><br>


<script type="text/javascript" src="../js/applicantapproval.js"></script>

<?php include('../_footer.php');  ?>


