<?php
$servername = "mysql16.citynetwork.se";
$username = "119897-sx52251";
$password = "Ademaz_1";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>