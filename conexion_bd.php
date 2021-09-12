<?php
    $servername = "localhost";
    $database = "agenda";
    $username = "root";
    $password = "root2021";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $database);
    // Check connection
    if (!$conn) {
        header("location: index.php?id=1&msg=e1");
    }
   
?>