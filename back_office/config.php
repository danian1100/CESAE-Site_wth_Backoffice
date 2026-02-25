<?php
$servername = "localhost";
$database = "site_adofan";
$username = "user_adofan";
$password = "abc123";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$site_title = "BackOffice do Site Adomination - Fan Page";

// Define the base URL for the site
define("BASE_URL", "/siteado/");
// Define the base URL for the admin area
define("BASE_ADMIN_URL", BASE_URL . "back_office/");
// Define the base URL for the images
define("BASE_IMAGES_URL", BASE_URL . "images/");

define("BASE_IMAGES_SONGS_URL", dirname(__FILE__) . "/../images/addedsongs/");