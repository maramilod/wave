<?php
session_start();

if (isset($_POST['update'])) {
  include "../classes/dbh.classes.php";
  echo $ID = $_SESSION['ID'];
  $NAME = $_POST['name'];
  $PRICE = $_POST['price'];
  $IMAGE = $_FILES['image'];

  if (isset($IMAGE['tmp_name']) && $IMAGE['tmp_name'] != '') {
      $image_location = $IMAGE['tmp_name'];
      $image_name = $IMAGE['name'];
      $image_up = "../images/" . $image_name;
      if (move_uploaded_file($image_location, $image_up)) {
          $update = "UPDATE special_offers SET About='$NAME' , Offer_Price='$PRICE', Image='$image_up' WHERE Offer_ID=$ID";
          mysqli_query($conn, $update);
          echo "<scripe>alert ('done!')</script>";
      } else {
          echo "<scripe>alert ('error!')</script>";
      }
  } else {
      $update = "UPDATE special_offers SET About='$NAME' , Offer_Price='$PRICE' WHERE Offer_ID=$ID";
      mysqli_query($conn, $update);
  }
  header('location: offers.php');
}
?>
