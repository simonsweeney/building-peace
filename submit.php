<?php
$servername = "localhost";
$username = "simonsweeney";
$password = "";
$dbname = "peace";

$word = (string)$_POST["word"];
$val = (string)$_POST["val"];


echo $word . "<br>" . $val;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO Entries (word, val)
VALUES ('$word', '$val')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

$home = "/output.php";
header('Location: '.$home);
?>