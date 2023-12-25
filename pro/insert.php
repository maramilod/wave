<?php
session_start();

if (isset($_POST['upload'])) {

    include "../classes/dbh.classes.php";
    $table = $_SESSION['Table_Name'];
    $Type = $_SESSION['Type'];
    $NAME = $_POST['name'];
    $PRICE = $_POST['price'];
    $IMAGE = $_FILES['image'];
    $image_location = $_FILES['image']['tmp_name'];
    $image_name = $_FILES['image']['name'];
    $image_up = "../images/" . $image_name;

    $directory = '../images/';
    if (!is_dir($directory)) {
        mkdir($directory, 0777, true);
    }
    if (!is_writable($directory)) {
        chmod($directory, 0777);
    }

    $insert = "INSERT INTO $table (name , price , image ) VALUES ('$NAME','$PRICE','$image_up')";
    mysqli_query($conn, $insert);

    $id = mysqli_insert_id($conn);

    $insert_all_c = "INSERT INTO all_c (id, name , price , image ,tata , Type) VALUES ('$id','$NAME','$PRICE','$image_up', '$table','$Type')";
    mysqli_query($conn, $insert_all_c);

    if (move_uploaded_file($image_location, '../images/' . $image_name)) {
        echo "<scripe>alert ('done!')</script>";
    } else {
        echo "<scripe>alert ('error!')</script>";
    }
    header('location: /mynewproject/dash_b/dash.php');
}
