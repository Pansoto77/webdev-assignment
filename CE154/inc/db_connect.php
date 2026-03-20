<?php
$servername = "csee-myweb.essex.ac.uk";
$username = "pk24707"; 
$password = "ASt5H6ScFxHvG"; 
$dbname = "ce154_pk24707";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
?>