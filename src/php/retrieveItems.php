<?php
    session_start();
    if(isset($_SESSION["id"])) {
        $id = $_SESSION["id"];
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
    
        $sql = "SELECT checklistItem FROM checklist_items WHERE personID='{$id}'";
        $result = $conn->query($sql);
    
        $return_items = [];
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $return_items[] = $row;
            }

            echo json_encode($return_items);
        }
        $conn->close();
    } else {
        echo "ERROR";
    }
?>