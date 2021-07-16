<?php 
    include ('db.php');

    if(isset($_GET['id'])) {
        $task_id = $_GET['id'];
        $stmnt = "DELETE FROM task WHERE id = $task_id";
        $result_set = mysqli_query($conn, $stmnt);

        if(!$result_set){
            die("Query Failed");
        }

        $_SESSION['message'] = 'Task Deleted';
        $_SESSION['message_type'] = 'danger';

        header("Location: index.php");
    }
