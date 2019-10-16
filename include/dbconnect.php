<?php

    $conn = mysqli_connect('localhost','root','','park');
    if(mysqli_connect_errno()) {
        echo "Failed to connect db";
    } else {
        //echo "Connected to db";
    }

?>