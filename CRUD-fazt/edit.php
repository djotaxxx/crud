<?php
include("db.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM task WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        //echo $title;
        $title = $row['title'];
        $description = $row['description'];
    }
}

if (isset($_POST['update'])) {
    //  echo 'updating';

    $id = $_GET['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    // echo $id;
    //  echo $title;
    //echo $description;

    $query = "UPDATE task set title = '$title', description = '$description' WHERE id = $id";
    mysqli_query($conn, $query);

    $_SESSION['message'] = 'Task Updated Successfully';
    $_SESSION['message_type'] = 'warning';
    header("Location: index.php");

}

?>

<?php include("includes/header.php") ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">

                <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="form-group">
                        <h2 class="text-center mt-3 mb-3">Update Tasks</h2>
                        <input type="text" name="title" value="<?php echo $title; ?>" class="form-control"
                            placeholder="Update Title">
                    </div>

                    <div class="form-group">
                        <textarea name="description" rows="4" class="form-control"
                            placeholder="Update description"><?php echo $description; ?></textarea>
                    </div>

                    <button class="btn btn-success btn-block" name="update">
                        Update
                    </button>

                </form>
            </div>
        </div>
    </div>

</div>


<?php include("includes/footer.php") ?>