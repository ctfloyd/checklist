<?php
    $uname = $_GET["uname"];
    $pwd = $_GET["psw"];
    $servername = "127.0.0.1";
    $username = "caleb";
    $password = "PASSWORDÍ";
    $dbname = "login";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    $sql = "SELECT password FROM info WHERE username='{$uname}'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $get_psw = $row["password"];
        }
    } else {
        echo "Invalid username";
    }
    if ($pwd == $get_psw){
        echo "Login sucessful";
    } else {
        echo "Invalid password";
    }
    $conn->close();
?>