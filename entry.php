<?php
$servername = "localhost";
$username = "simonsweeney";
$password = "";
$dbname = "peace";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO Entries (word, val)
VALUES ('John', 'Peace', 'john@example.com', '90')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>