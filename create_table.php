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

// sql to create table
$sql = "CREATE TABLE Entries (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
name VARCHAR(30) NOT NULL,
word VARCHAR(30) NOT NULL,
email VARCHAR(50),
val VARCHAR(50) NOT NULL,
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table Entries created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>