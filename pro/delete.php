<?php

session_start();
include "../classes/dbh.classes.php";
echo $ID = $_GET['id'];
echo $table = $_SESSION['Table_Name'];
mysqli_query($conn, "DELETE FROM $table WHERE id= $ID");
mysqli_query($conn, "DELETE FROM all_c WHERE id= $ID AND tata = '$table'");
header('location: ../dash_b/dash.php');
?>
