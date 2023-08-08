<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "userprofile";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$sql = "CREATE TABLE Cartinfos (
ProductName VARCHAR(255) NOT NULL,
Seller VARCHAR(255) NOT NULL,
Category VARCHAR(255) NOT NULL,
Quantity INT(255) NOT NULL,
Price INT(255) NOT NULL,
Username VARCHAR(255) NOT NULL,
ID INT(11) NOT NULL
)";

$conn->query($sql);

$conn->close();
?>