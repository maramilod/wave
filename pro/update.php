<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel="stylesheet" href="../css/dash.css">
</head>

<body>
<div class="container">
            <div class="navigation">
                <ul>
                    <li>
                        <a href="">
                            <span class="icon"><img src="../img/sea.png" alt=""></span>
                            <span class="title">WAVE</span>
                        </a>
                    </li>

                    <li>
                        <a href="../dash_b/dash.php">
                            <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                            <span class="title"> Back To The Dashboard</span>
                        </a>
                    </li>

                    <li>
                        <a href="../dash_b/offers.php">
                            <span class="icon"><ion-icon name="people-outline"></ion-icon></span>
                            <span class="title">Offers</span>
                        </a>
                    </li>

                    <li>
                        <a href="">
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
</div>

    <?php
    session_start();
    include "../classes/dbh.classes.php";
    $ID = $_GET['id'];
    $_SESSION['ID'] = $ID;
    $table = $_SESSION['Table_Name'];
    $up = mysqli_query($conn, "SELECT * FROM $table WHERE id =$ID");
    $data = mysqli_fetch_array($up);
    ?>
    <center>
        <br><br><br><br><br><br>
        <div class="add">
        <br>
                <br>
            <h3>تعديل المنتجات</h3>
            <form action="up.php" method="post" enctype="multipart/form-data">
                <h2>ادخل البيانات</h2>
                <br>
                <input type="text" name='name' value='<?php echo $data['name'] ?>'>
                <br>
                <input type="text" name='price' value='<?php echo $data['price'] ?>'>
                <br>
                <!-- THIER IS A BUG HERE WHEN U DONT UPDATE THE IMAGE-->

                <input type="file" id="file" name='image' value='<?php echo $data['image'] ?>' style='display:none;'>

                <!-- ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ -->
                <label for="file">تحديث صورة للمنتج</label>
                <button name='update' type='submit'>تعديل المنتج</button>

                <br>
                <br>
            </form>
        </div>

    </center>

    </head>
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