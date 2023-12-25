<?php
session_start();
include "../classes/dbh.classes.php";

if (!$conn) {
  die('Database connection failed');
}

if (isset($_GET['id'])) {
  $ID = $_GET['id'];
  $query = mysqli_query($conn, "DELETE FROM special_offers WHERE Offer_ID = $ID") or die(mysqli_error($conn));
  header('location: offers.php');
} else {
  echo "ID not set";
}
?>
