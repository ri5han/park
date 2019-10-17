<?php

    session_start();
    require('include/dbconnect.php');

    if(isset($_GET['delete'])) {
        $username = $_SESSION['username'];    
        $query = "DELETE FROM users WHERE username='$username'";
        $result = mysqli_query($conn,$query);   

        header('Location: login.php?delete=1');
    }

?>