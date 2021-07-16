<?php include('list_task.php'); ?>

<?php include('includes/header.php'); ?>
<div class="container p-4">
    <div class="row">

        <div class="col-md-4">

            <?php if (isset($_SESSION['message'])) { ?>
                <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php session_unset();} ?>

            <div class="card card-body">
                <form action="save_task.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="title" id="title" class="form-control" placeholder="Task Title" autofocus>
                    </div>
                    <div class="form-group py-2">
                        <textarea name="description" rows="2" class="form-control" placeholder="Task Description"></textarea>
                    </div>
                    <input type="submit" class="btn btn-outline-success btn-block" value="Save Task" 
                        name="save_task">
                </form>
            </div>
        </div>

        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while( $row = mysqli_fetch_array($result_tasks)) { ?>
                        <tr>
                            <td><?=$row['id']?></td>
                            <td><?=$row['title']?></td>
                            <td><?=$row['description']?></td>
                            <td><?=$row['created_at']?></td>
                            <td>
                                <a href="edit.php?id=<?=$row['id']?>" class="btn btn-secondary">
                                    <i class="far fa-pencil"></i>
                                </a>
                                <a href="delete_task.php?id=<?=$row['id']?>" class="btn btn-danger">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>

    </div>
</div>
<?php include('includes/footer.php'); ?>