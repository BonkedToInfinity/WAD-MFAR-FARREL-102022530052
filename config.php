<?php

$host = 'localhost';
$user = 'root';
$password = '';
$database = 'biodata_pelanggan_db';

$conn = new mysqli ($host, $user, $password, $database);

if ($conn->connect_error) {
    die(''. $conn->connect_error);
}

?>