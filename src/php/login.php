<?php
    session_start();
    $uname = $_GET["uname"];
    $pwd = $_GET["psw"];
    if(empty($_GET)){
        echo "ERROR";
    }
    $servername = "127.0.0.1";
    $username = "caleb";
    $password = "37683768";
    $dbname = "login";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    $sql = "SELECT * FROM info WHERE username='{$uname}'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $get_psw = $row["password"];
            $get_id = $row["UID"];
        }
    }
    if ($pwd == $get_psw){
        $_SESSION["id"] = $get_id;
        http_get("./retrieveItems.php");
    } else {
        echo "ERROR";
    }
    $conn->close();
?>