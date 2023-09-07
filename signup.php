<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";  
    $username = "root";
    $password = "root";
    $dbname = "2022-2023schema";
    $tablename = "elev";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    
    $sql = "INSERT INTO `$tablename` (username, password, email) VALUES ('$username', '$password', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "Sign up successful! Redirecting to login page...";
        header("Refresh: 3; URL=login.html"); 
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>