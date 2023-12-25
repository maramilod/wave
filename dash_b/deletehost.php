
<?php
session_start();
include "../classes/dbh.classes.php";

if (!$conn) {
 die('Database connection failed');
}

if (isset($_GET['id'])) {
 $ID = $_GET['id'];


 // Fetch the table name from the row
 $result = mysqli_query($conn, "SELECT Table_Name FROM hosts WHERE ID = $ID");
 $row = mysqli_fetch_assoc($result);
 $table_name = $row['Table_Name'];
 $query = mysqli_query($conn, "DELETE FROM hosts WHERE ID = $ID") or die(mysqli_error($conn));
 // Drop the table
 $drop_table = "DROP TABLE IF EXISTS `$table_name`";
 mysqli_query($conn, $drop_table) or die(mysqli_error($conn));

 header('location: admin.php');
} else {
 echo "ID not set";
}
?>
