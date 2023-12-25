<?php
session_start();
include "../classes/dbh.classes.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {

    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //grabbing the data
    $uname = validate($_POST['uname']);
    $pass = validate($_POST['password']);
    $pass = filter_var($pass, FILTER_SANITIZE_STRING);
    if (empty($uname)) {
        header("Location: ../index.php?error=User Name is required");
        exit();
    } else if (empty($pass)) {
        header("location: ../index.php?error=Password is required");
        exit();
    } else {
        $sql = "SELECT * FROM hosts WHERE Email='$uname' AND Password='$pass'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['Email'] === $uname && $row['Password'] === $pass) {
                $_SESSION['Email'] = $row['Email'];
                $_SESSION['Password'] = $row['Password'];
                $_SESSION['ID'] = $row['ID'];
                $_SESSION['Table_Name'] = $row['Table_Name'];
                $_SESSION['Type'] = $row['Type'];
                $_SESSION['Phone_Number'] = $row['Phone_Number'];
                $_SESSION['Image'] = $row['Image'];
                if ($row['Table_Name'] == 'administrator' && $row['ID'] == 3)
                {
                    header("Location: ../dash_b/admin.php");
                exit();
                }
                header("Location: ../dash_b/dash.php");
                exit();
            } else {
                header("Location: ../index/index.php?error=$pass Incorect User name or password :)");
                exit();
            }
        } else {
            header("Location: ../index/index.php?error=$pass Incorect User name or password :)");
            exit();
        }
    }
} else {
    header("Location: index/index.php");
    exit();
}
