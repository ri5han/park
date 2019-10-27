<?php

    $conn = mysqli_connect('localhost','root','','park');
    if(mysqli_connect_errno()) {
        echo "<script>alert('Failed to connect db');</script>";
    } else {
        //echo "Connected to db";
    }

?>