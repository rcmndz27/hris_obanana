
<?php  
    include('config/db.php');
    global $connL;

    $query = "SELECT * from dbo.employee_profile";
    $stmt =$connL->prepare($query);
    $stmt->execute();
    $result = $stmt->fetch();
    
    if($result){
                do { 
                    echo '<pre>';
                    echo json_encode($result);
                    echo '</pre>';
                }
                while ( $result = $stmt->fetch());

   
                }

     ?>
