<?php
include("db.php");
include("includes/header.php");

?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4">

            <?php
            if (isset($_SESSION['message'])) { ?>
                <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message'] ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php session_unset();
            } ?>


            <div class="card card-body shadow">
                <form action="save_task.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" placeholder="Task title" autofocus>
                    </div>

                    <div class="form-group mt-3 mb-3">
                        <textarea name="description" id="" rows="4" class="form-control"
                            placeholder="Task Description"></textarea>
                    </div>

                    <input type="submit" class="btn btn-success d-grid gap-2 col-12 mx-auto" name="save_task"
                        value="Save Task">
                </form>
            </div>
        </div>

        <div class="col-md-8">
            <table class="table shadow">
                <thead class="table">
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $query = "SELECT * FROM task";
                    $result_tasks = mysqli_query($conn, $query);

                    while ($row = mysqli_fetch_assoc($result_tasks)) { ?>
                        <tr>
                            <td>
                                <?php echo $row['title']; ?>
                            </td>
                            <td>
                                <?php echo $row['description']; ?>
                            </td>
                            <td>
                                <?php echo $row['created_at']; ?>
                            </td>

                            <td>
                                <a href="edit.php?id=<?php echo $row['id'] ?>" class="btn btn-secondary"><i
                                        class="fas fa-marker"></i>
                                </a>
                            </td>

                            <td>
                                <a href="delete_task.php?id=<?php echo $row['id'] ?>" class="btn btn-danger"><i
                                        class="far fa-trash-alt"></i>
                                </a>
                            </td>

                        </tr>
                    <?php }
                    ?>
                </tbody>
            </table>

        </div>
    </div>
</div>

<?php include("includes/footer.php"); ?>