<?php
$host = 'localhost';
$user = 'root';
$password = '1234'; 
$database = 'equestrian_db';

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Грешка при свързване: " . $conn->connect_error);
}
?>
