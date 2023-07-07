<?php
//incluindo archivo de conexion bbdd:
include("db.php");

//Validando formulario:
if (isset($_POST['save_task'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];

    //inserto los datos en la database:
    $query = "INSERT INTO task(title,description) VALUES ('$title', '$description')";
    //almaceno los datos:
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query failed");
    }
    //almacenamos datos en la session para printarla posteriormente:
    $_SESSION['message'] = 'Task saved succesfully';
    $_SESSION['message_type'] = 'success';

    header("Location: index.php");


    //echo "salving";
    // echo $title;
    // echo $description;
}
?>