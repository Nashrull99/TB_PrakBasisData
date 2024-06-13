<?php
$servername = "localhost";
$username = "root";
$password = "Admin123@@";
$dbname = "pencatatan_warga";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
