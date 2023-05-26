<?php
    $con = new mysqli('localhost', 'root', '', 'iii');

    if ($con) {
       // echo 'Connection Established';
    } else {
        die(mysqli_error($con));
    }
?>