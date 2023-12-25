<?php
session_start();

if (isset($_SESSION['ID']) && isset($_SESSION['Email'])) {
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
                            <span class="title"><?php echo $_SESSION['Table_Name']; ?></span>
                        </a>
                    </li>

                    <li>
                        <a href="dash.php">
                            <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                            <span class="title">Dashboard</span>
                        </a>
                    </li>

                    <li>
                        <a href="offers.php">
                            <span class="icon"><ion-icon name="sparkles-outline"></ion-icon></span>
                            <span class="title">Offers</span>
                        </a>
                    </li>

                    <li>
                        <a href="setting.php">
                            <span class="icon"><ion-icon name="settings-outline"></ion-icon></span>
                            <span class="title">Settings</span>
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

                    <!-- userImg -->
                    <div class="user">
                        <img src="<?php echo $_SESSION['Image']; ?>" alt="">
                    </div>
                </div>


                <center>
                    <div class="add">
                        <form action="change.php" method="post" enctype="multipart/form-data">
                            <br>
                            <br>
                            <h2>Change Password</h2>
                            <?php if (isset($_GET['error'])) { ?>
                                <p class="error"><?php echo $_GET['error']; ?></p>
                            <?php } ?>

                            <?php if (isset($_GET['success'])) { ?>
                                <p class="success"><?php echo $_GET['success']; ?></p>
                            <?php } ?>


                            <input type="password" name="op" placeholder="Old Password">
                            <br>


                            <input type="password" name="np" placeholder="New Password">
                            <br>


                            <input type="password" name="c_np" placeholder="Confirm New Password">
                            <br>


                            <input type="text" name="ne" placeholder="Change the Email">
                            <br>


                            <input type="text" name="npn" placeholder="Change The Phone Number">
                            <br>


                            <input type="text" name="nl" placeholder="Change The Location">
                            <br>

                            <input type="file" name="image" class="box" accept="image/*">

                            <button type="submit">CHANGE</button>
                        </form>
                    </div>
                </center>












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