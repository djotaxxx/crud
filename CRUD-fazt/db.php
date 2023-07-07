<?php
//inicio de session:
session_start();
//conectandose a la base de datos:

$conn = mysqli_connect(
   'localhost',
   'root',
   '',
   'crud_fazt'
);

// if(isset($conn)) {
//     echo 'Db is conected';
// }
?>