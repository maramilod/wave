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
        <title>mangement</title>
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
                        <a href="">
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

                <!-- cards -->

                <center>
                    <div class="add">
                        <form action="../pro/insert.php" method="post" enctype="multipart/form-data">
                            <input type="text" name='name' placeholder="title">
                            <br>
                            <input type="text" name='price' placeholder="price">
                            <br>
                            <input type="file" id="file" name='image' style='display:none;'>
                            <label for="file">choose the pic </label>
                            <button name='upload'> upload</button>
                            <br>
                            <br>
                        </form>
                    </div>


                </center>

                <!-- search -->
                <div class="search_c">
                    <form method="POST" action="">
                        <input type="text" name="search" placeholder="search by price type or name ...">
                        <input type="submit" value="Search" class="inline-block">
                    </form>
                </div>



                <?php
                $table = $_SESSION['Table_Name'] ?? '';
                $ID = $_SESSION['ID'] ?? '';
                include "../classes/dbh.classes.php";

                if (!$conn) {
                    die('Database connection failed');
                }

                if (isset($_POST['search'])) {
                    $searchTerm = $_POST['search'];
                    $query = mysqli_query($conn, "SELECT * FROM $table WHERE price LIKE '%$searchTerm%' OR name LIKE '%$searchTerm%'") or die(mysqli_error($conn));
                } else {
                    $query = mysqli_query($conn, "SELECT * FROM $table") or die(mysqli_error($conn));
                }

                if ($query && mysqli_num_rows($query) > 0) {
                    while ($ROW = mysqli_fetch_array($query)) {
                        echo "
                        <center>
                        <main>
                        <div class='card' style='width: 18rem;'>
                            <img src='$ROW[image]' class='card-img-top' >
                            <div class='card-body'>
                                <h5 class='card-title'>$ROW[name]</h5>
                                <p class='card-text'>$ROW[price]</p>
                                <a href='../pro/delete.php? id=$ROW[id]' class='btn btn-danger'>Delete</a>
                                <br><br>
                                <a href='../pro/update.php? id=$ROW[id]' class='btn btn-primary'>Edite</a>
                            </div>
                        </div>
                        </main>
                        <center>
                        ";
                    }
                } else {
                        echo "0 results";
                }
                ?>
            </div>
        </div>
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