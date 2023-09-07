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

    $sql = "SELECT * FROM `$tablename` WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "Login successful! Redirecting to main page...";
        header("Refresh: 3; URL=index.html"); 
        exit();
    } else {
        echo "Invalid username or password.";
    }

    $conn->close();
}
?>
