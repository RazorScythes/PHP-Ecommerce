<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "products";

// Create connection
$con = new mysqli($servername, $username, $password);
// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Create database
$db = "CREATE DATABASE products";
$con->query($db);

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$sql = "CREATE TABLE ProductList (
ProductID INT(64) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
ProductName VARCHAR(255) NOT NULL,
Seller VARCHAR(255) NOT NULL,
Description Text NOT NULL,
Price INT(64) NOT NULL,
Category VARCHAR(255) NOT NULL,
Image VARCHAR(255) NOT NULL,
Purchased INT(64) NOT NULL,
Inventory INT(64) NOT NULL
)";

$conn->query($sql);

$con->close();
$conn->close();
?>