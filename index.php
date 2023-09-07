<?php
if(isset($_GET['subject'])) {
    $subject = $_GET['subject'];

    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "elev";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM $subject";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h2>" . ucfirst($subject) . " Exercises</h2>";

        while ($row = $result->fetch_assoc()) {
            echo "<h3>" . $row["tittel"] . "</h3>";
            echo "<p>" . $row["oppgavetekst"] . "</p>";
            echo "<hr>";
        }
    } else {
        echo "<h2>No exercises found for " . ucfirst($subject) . "</h2>";
    }

    $conn->close();
}
?>
