<?php
session_start();
if (isset($_SESSION['ID']) && isset($_SESSION['Email'])) {
    include "../classes/dbh.classes.php";



    if (
        isset($_POST['op']) && isset($_POST['np'])
        && isset($_POST['c_np']) && isset($_POST['ne'])
        && isset($_POST['npn']) && isset($_POST['nl'])
    ) {

        function validate($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $op = validate($_POST['op']);
        $np = validate($_POST['np']);
        $c_np = validate($_POST['c_np']);
        $ne = filter_var($_POST['ne'], FILTER_VALIDATE_EMAIL);
        $npn = validate($_POST['npn']);
        $nl = validate($_POST['nl']);

        if (empty($op)) {
            header("Location: setting.php?error=Old Password is required");
            exit();
        } else if ($np !== $c_np) {
            header("Location: setting.php?error=The confirmation password  does not match");
            exit();
        } else if (!filter_var($ne, FILTER_VALIDATE_EMAIL)) {
            header("Location: setting.php?error=Invalid email format");
            exit();
        } else {
            // hashing the password 
            //  $op = md5($op);
            // $np = md5($np);
            $id = $_SESSION['ID'];

            $sql = "SELECT Password
                FROM hosts WHERE 
                ID='$id' AND Password='$op'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) === 1) {
                if (!empty($np)) {
                    mysqli_query($conn, "UPDATE hosts
        	                SET Password='$np'
        	                WHERE ID='$id'");
                }

                if (!empty($ne)) {
                    mysqli_query($conn, "UPDATE hosts
                            SET Email='$ne'
                            WHERE ID='$id'");
                }

                if (!empty($npn)) {
                    mysqli_query($conn, "UPDATE hosts
                            SET PhoneNumber='$npn'
                            WHERE ID='$id'");
                }

                if (!empty($nl)) {
                    mysqli_query($conn, "UPDATE hosts
                            SET Location='$nl'
                            WHERE ID='$id'");
                }

                // Check if a file was uploaded
                if (isset($_FILES['image'])) {
                    // Define the path to the image
                    $image_path = "../images/" . $_SESSION['Image'];

                    // Check if the image file exists
                    if (file_exists($image_path)) {
                        // Delete the old image file
                        unlink($image_path);
                    }

                    // Define the path to the new image
                    $new_image_path = "../images/" . $_FILES['image']['name'];

                    // Attempt to move the uploaded file to the new location
                    if (move_uploaded_file($_FILES['image']['tmp_name'], $new_image_path)) {
                        // Update the database to reflect the change
                        $sql = "UPDATE hosts SET Image=:image WHERE ID=:id";
                        $stmt = $con->prepare($sql);
                        $stmt->bindParam(':image', $new_image_path);
                        $stmt->bindParam(':id', $_SESSION['ID']);
                        $stmt->execute();

                        // Redirect to the setting page
                        header("Location: setting.php?success=Image has been updated successfully");
                        exit();
                    }
                }

                header("Location: setting.php?success=Your setting has been changed successfully");
                exit();
            } else {
                header("Location: setting.php?error=Incorrect password");
                exit();
            }
        }
    } else {
        header("Location: setting.php");
        exit();
    }
} else {
    header("Location: ../index/index.php");
    exit();
}
