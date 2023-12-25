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
                            <span class="title"><?php echo "Wave" ?></span>
                        </a>
                    </li>

                    <li>
                        <a href="">
                            <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                            <span class="title">Dashboard</span>
                        </a>
                    </li>

                    <li>
                        <a href="signup.php">
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

                    <!-- userImg -->
                </div>


                <center>
                <section class="section-gray">
    <div class="container">
      <div class="row">

        <div class="col-lg-8">
          <div class="level-slider">

            <?php
            include "../classes/dbh.classes.php";
            $query = mysqli_query($conn, "SELECT * FROM hosts");
            if (mysqli_num_rows($query) > 0) {
             
              while ($row = mysqli_fetch_assoc($query)) {
                 if ($row['Table_Name'] != 'administrator' && $row['ID'] != 3){
                    echo "
                    <center>
                    <main>
                    <div class='card' style='width: 18rem;'>
                        <img src= '$row[Image]' class='card-img-top' >
                        <div class='card-body'>
                            <h5 class='card-title'>$row[Table_Name]</h5><br>
                            <a href='deletehost.php? id=$row[ID]' class='btn btn-danger'>Delete</a>
                            <br><br>
                        </div>
                    </div>
                    </main>
                    <center>
                    ";
                }}
            ?>


<center>
<!-- sweetalert cdn link  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<!-- custom js file link  -->
<script src="../js/script.js"></script>



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
}}
?>