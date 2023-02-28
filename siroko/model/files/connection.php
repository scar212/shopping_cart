<?php
    $servername = "localhost";
    $database = "siroko";
    $username = "root";
    $password = "";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $database);
    // Check connection
    if (!$conn->set_charset("utf8")) {
        die("Connection failed: " . mysqli_connect_error());
    }
    //echo "Connected successfully";
    //mysqli_close($conn);
?>