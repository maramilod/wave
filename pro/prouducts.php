<?php
session_start();

if (isset($_SESSION['ID']) && isset($_SESSION['Email'])) {

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>mangement</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/test.css">
        <link rel="stylesheet" href="../css/pro1.css">


    </head>

    <body>

        <!-- Start Header -->
        <header>
            <a href="#" class="logo">
                <img decoding="async" src="img/logo.png" alt="Logo" /></a>

            <a class="btnLogin-popup" onclick="menutoggle()" href="../includes/logout.php">logout</a>


        </header>
        <!-- End Header -->
        <center>
            <div class="add">

                <h3>all service</h3>
                <form action="insert.php" method="post" enctype="multipart/form-data">
                    <h2> add more ^^ </h2> <!-- -_- -->
                    <input type="text" name='name'>
                    <br>
                    <input type="text" name='price'>
                    <br>
                    <input type="file" id="file" name='image' style='display:none;'>
                    <label for="file">choose the pic </label>
                    <button name='upload'> upload</button>
                    <br>
                    <br>
                </form>
            </div>


        </center>
        <?php
        $table = $_SESSION['Table_Name'];
        $ID = $_SESSION['ID'];
        include "../classes/dbh.classes.php";
        $RESUALT =   mysqli_query($conn, "SELECT * FROM $table");
        while ($ROW = mysqli_fetch_array($RESUALT)) {
            echo "
    <center>
    <main>
    <div class='card' style='width: 18rem;'>
        <img src='$ROW[image]' class='card-img-top' >
        <div class='card-body'>
            <h5 class='card-title'>$ROW[name]</h5>
            <p class='card-text'>$ROW[price]</p>
            <a href='delete.php? id=$ROW[id]' class='btn btn-danger'>Delete</a>
            <br><br>
            <a href='update.php? id=$ROW[id]' class='btn btn-primary'>Edite</a>
        </div>
    </div>
    </main>
    <center>
    ";
        }
        ?>
    </body>
    </html>
<?php
} else {

    header("Location: ../mynewproject/index/index.php");
    exit();
}
?>