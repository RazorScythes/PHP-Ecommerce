<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "userprofile";

// Create connection
$con = new mysqli($servername, $username, $password);
// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Create database
$db = "CREATE DATABASE userprofile";
$con->query($db);


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$sql = "CREATE TABLE User (
UserID INT(64) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
First_Name VARCHAR(255) NOT NULL,
Middle_Name VARCHAR(255) NOT NULL,
Last_Name VARCHAR(255) NOT NULL,
Username VARCHAR(255) NOT NULL,
Email VARCHAR(255) NOT NULL,
Password VARCHAR(255) NOT NULL,
Birthday VARCHAR(255) NOT NULL,
Picture VARCHAR(255) NOT NULL
)";

$conn->query($sql);

$con->close();
$conn->close();
?>