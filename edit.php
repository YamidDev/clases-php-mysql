<?php 

    include ('db.php');

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM task WHERE id = '$id'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $title = $row['title'];
            $description = $row['description'];
        }
    }

    if(isset($_POST['update'])){
        $id = $_GET['id'];
        $title = $_POST['title'];
        $description = $_POST['description'];

        $query = "UPDATE task SET title = '$title', 
                        description = '$description' WHERE id = '$id'";
        mysqli_query($conn, $query);
        $_SESSION['message'] = 'Task has been updated';
        $_SESSION['message_type'] = 'warning';

        header("Location: index.php");
    }

?>
<?php include('includes/header.php'); ?>

    <div class="container p-4">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit.php?id=<?=$_GET['id']?>" method="post">
                    <div class="form-group">
                        <input type="text" name="title" class="form-control"
                            placeholder="Update task" value="<?= $title ?>">
                    </div>
                    <div class="form-group py-2">
                        <textarea name="description" class="form-control"
                            cols="30" rows="2">
                            <?= $description ?>
                        </textarea>
                    </div>
                    <button class="btn btn-success" name="update">
                        Update
                    </button>
                </form>
            </div>
        </div>
    </div>

<?php include('includes/footer.php'); ?>