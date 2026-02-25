<?php
$servername = "localhost";
$database = "site_adofan";
$username = "user_adofan";
$password = "abc123";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$site_title = "Adomination - Fan Page";