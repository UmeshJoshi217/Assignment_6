<?php
$host = "localhost"; // or your server IP
$user = "root";      // DB username
$password = "";      // DB password
$database = "UserSystem";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
