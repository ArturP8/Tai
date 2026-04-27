<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db_name = 'system_logowania';

$conn = new mysqli($host, $user, $pass);

if ($conn->connect_error) {
    die("Błąd połączenia z MySQL: " . $conn->connect_error);
}

$sql_create_db = "CREATE DATABASE IF NOT EXISTS $db_name CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci";
if (!$conn->query($sql_create_db)) {
    die("Błąd tworzenia bazy: " . $conn->error);
}

$conn->select_db($db_name);

