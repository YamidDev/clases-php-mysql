<?php

    include ('db.php');
    
    if(isset($_POST['save_task'])) {
        $title = $_POST['title'];
        $description = $_POST['description'];
        
        $stmt = "INSERT INTO task(title, description) VALUES ('$title', '$description')";
        
        $result_set = mysqli_query($conn, $stmt);

        if (!$result_set) {
            die("Query Failed");
        }


        $_SESSION['message'] = 'Task Saved successfully';
        $_SESSION['message_type'] = 'success';


        header('Location: index.php');


    }