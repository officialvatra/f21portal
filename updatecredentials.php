<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost"; 
    $username = "root";
    $password = "root";
    $dbname = "2022-2023schema";
    $tablename = "elev";

    $newUsername = $_POST["username"];
    $newPassword = $_POST["password"];

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "UPDATE $tablename SET username='$newUsername', password='$newPassword' WHERE id=1";

    if ($conn->query($sql) === TRUE) {
        echo "Credentials updated successfully!";
    } else {
        echo "Error updating credentials: " . $conn->error;
    }

    $conn->close();
}
?>
