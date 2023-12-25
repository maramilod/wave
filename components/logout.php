<?php

include "../classes/dbh.classes.php";
setcookie('user_id', '', time() - 1, '/');

header('location: ../index/index.php#offers');

?>