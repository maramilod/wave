<?php
session_start();

if (isset($_POST['upload'])) {

    include "../classes/dbh.classes.php";
    $table = $_SESSION['Table_Name'];
    $Type = $_SESSION['Type'];
    $NAME = $_POST['about'];
    $PRICE = $_POST['price'];
    $SDate = $_POST['s_date'];
    $EDate = $_POST['e_date'];
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

    $insert = "INSERT INTO special_offers (About , Offer_Price , Offer_Start_Date , Offer_End_Date , Image , `table`  ) VALUES ('$NAME','$PRICE','$SDate','$EDate','$image_up','$table')";
    mysqli_query($conn, $insert);

    $id = mysqli_insert_id($conn);

    if (move_uploaded_file($image_location, '../images/' . $image_name)) {
        echo "<scripe>alert ('done!')</script>";
    } else {
        echo "<scripe>alert ('error!')</script>";
    }
    header('location: /mynewproject/dash_b/offers.php');
}
