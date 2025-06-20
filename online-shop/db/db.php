<?php
$host = 'localhost';
$user = 'root';
$password = ''; 
$database = 'equestrian_db';

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Грешка при свързване: " . $conn->connect_error);
}
?>