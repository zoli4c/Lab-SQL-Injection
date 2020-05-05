<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "dbs_application";

    $conn = new mysqli($servername,$username,$password,$dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    //echo "Connected successfully<br>";
    $input_data = $_GET['id'];
    //$black_list = array("SELECT","FROM","WHERE","UNION","select","from","where","union");
    //$input_data = str_ireplace($black_list,"",$input_data);
    $query = "SELECT * FROM users WHERE id =".$input_data."limit 1";
    
    $result = $conn->query($query);
    
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "Hello ".$row['username']."<br>";
        }
    } else {
        echo "0 results";
    }
    $conn->close();
?>