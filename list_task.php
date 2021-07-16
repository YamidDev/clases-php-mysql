<?php
    
    include ('db.php');
    
    $stmt =  "SELECT * FROM task"; 
    $result_tasks = mysqli_query($conn, $stmt);

    if(!$result_tasks) {
        die('Query Failed');
    }

