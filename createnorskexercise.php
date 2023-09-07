<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["subject"])) {
    $servername = "localhost";  
    $username = "root";
    $password = "root";
    $dbname = "2022-2023schema";
    $tablename = "norskoppgaver";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $tittel = $_POST["tittel"];
    $oppgavetekst = $_POST["oppgavetekst"];

    $sql = "INSERT INTO norskoppgaver (tittel, oppgavetekst) VALUES ('$tittel', '$oppgavetekst')";

    if ($conn->query($sql) === TRUE) {
        echo "Exercise created successfully.";
    } else {
        echo "Error creating exercise: " . $conn->error;
    }

    $conn->close();
}
?>
