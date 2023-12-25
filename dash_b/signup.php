<?php
session_start();

if (isset($_SESSION['ID']) && isset($_SESSION['Email'])) {



    include "../classes/dbh.classes.php";

    if (isset($_POST['submit'])) {

        $name = $_POST['name'];
        $name = filter_var($name, FILTER_SANITIZE_STRING);
        $email = $_POST['email'];
        $email = filter_var($email, FILTER_SANITIZE_STRING);
        $location = $_POST['location'];
        $location = filter_var($location, FILTER_SANITIZE_STRING);
        $number = $_POST['number'];
        $number = filter_var($number, FILTER_SANITIZE_STRING);
        $type = $_POST['type'];
        $type = filter_var($type, FILTER_SANITIZE_STRING);

        $pass = $_POST['pass'];
        $pass = filter_var($pass, FILTER_SANITIZE_STRING);
        $c_pass = $_POST['c_pass'];
        $c_pass = filter_var($c_pass, FILTER_SANITIZE_STRING);

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
        if (move_uploaded_file($image_location, '../images/' . $image_name)) {
            echo "<scripe>alert ('done!')</script>";
        } 

        $verify_name = $con->prepare("SELECT * FROM `hosts` WHERE Table_Name = ?");
        $verify_name->execute([$name]);

        if ($verify_name->rowCount() > 0) {
            $warning_msg[] = 'Name already taken!';
        } else {
            if ($c_pass == 1) {
                $insert_user = $con->prepare("INSERT INTO `hosts`(Table_Name, Email, Password, Image, Location, Phone_Number, Type) VALUES(?,?,?,?,?,?,?)");
                $insert_user->execute([$name, $email, $pass, $image_up, $location, $number, $type]);
                $create_table = $con->prepare("CREATE TABLE `$name` (
            `id` INT NOT NULL AUTO_INCREMENT,
            `name` varchar(20) NOT NULL,
            `price` varchar(10) NOT NULL,
            `image` varchar(60) NOT NULL,
            `description` varchar(50),
            PRIMARY KEY (`id`)
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");
                $create_table->execute();

                $success_msg[] = 'Registered successfully!';
            } else {
                $warning_msg[] = '  Confirm password not matched!';
            }
        }
    }


?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/dash.css">
        <title>Change Password and Profile Image</title>
    </head>

    <body>
        <div class="container">
            <div class="navigation">
                <ul>
                    <li>
                        <a href="">
                            <span class="icon"><img src="../img/sea.png" alt=""></span>
                            <span class="title"><?php echo "Wave" ?></span>
                        </a>
                    </li>

                    <li>
                        <a href="admin.php">
                            <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                            <span class="title">Dashboard</span>
                        </a>
                    </li>

                    <li>
                        <a href="">
                            <span class="icon"><ion-icon name="sparkles-outline"></ion-icon></span>
                            <span class="title">Sign Up</span>
                        </a>
                    </li>


                    <li>
                        <a href="../includes/logout.php">
                            <span class="icon"><ion-icon name="log-out-outline"></ion-icon></span>
                            <span class="title">Sign Out</span>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- main -->
            <div class="main">
                <div class="topbar">
                    <div class="toggle">
                        <ion-icon name="menu-outline"></ion-icon>
                    </div>
                </div>


                <center>

                    <section class="account-form">
                        <div class="add">
                            <form action="" method="post" enctype="multipart/form-data">
                                <h3>make new account!</h3>
                                <p class="placeholder"></p>
                                <input type="text" name="name" required maxlength="20" placeholder="enter the name" class="box">
                                <p class="placeholder"> </p>
                                <input type="email" name="email" required maxlength="30" placeholder="enter the email" class="box">
                                <p class="placeholder"></p>
                                <input type="text" name="location" required maxlength="40" placeholder="enter the location" class="box">
                                <p class="placeholder"></p>
                                <input type="text" name="number" required maxlength="14" placeholder="enter the phone number" class="box">
                                <p class="placeholder"></p>
                                <input type="text" name="type" required maxlength="20" placeholder="enter the type " class="box">
                                <p class="placeholder"></p>

                                <input type="password" name="pass" required maxlength="50" placeholder="enter password" class="box">
                                <p class="placeholder"></p>

                                <input type="password" name="c_pass" required maxlength="50" placeholder="confirm password" class="box">
                                <p class="placeholder">profile pic</p>

                                <input type="file" name="image" class="box" accept="image/*">
                                <input type="submit" value="   register" name="submit" class="btn">
                            </form>
 </div>
                    </section>
           
            <center>
                <!-- sweetalert cdn link  -->
                <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

                <!-- custom js file link  -->
                <script src="../js/script.js"></script>

                <?php include '../components/alers.php'; ?>




                <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
                <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

                <script>
                    //Menu Toggle
                    let toggle = document.querySelector('.toggle');
                    let navigation = document.querySelector('.navigation');
                    let main = document.querySelector('.main');

                    toggle.onclick = function() {
                        navigation.classList.toggle('active');
                        main.classList.toggle('active');
                    }

                    //add hovered class selected list item
                    let list = document.querySelectorAll('.navigation li');

                    function activeLink() {
                        list.forEach((item) =>
                            item.classList.remove('hovered'));
                        this.classList.add('hovered');
                    }
                    list.forEach((item) =>
                        item.addEvenrListener('mouseover', activeLink));
                </script>
    </body>

    </html>
<?php
} else {

    header("Location: /mynewproject/index/index.php");
    exit();
}
?>