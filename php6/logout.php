<?php
session_start();
require_once 'db.php';

if (isset($_SESSION['log_id'])) {
    $formularz_wyslany = !empty($_SESSION['formularz_wyslany']) ? 'tak' : 'nie';
    $log_id = $_SESSION['log_id'];

    $stmt = $conn->prepare("UPDATE logi SET formularz_wyslany = ? WHERE id = ?");
    $stmt->bind_param("si", $formularz_wyslany, $log_id);
    $stmt->execute();
    $stmt->close();
}

$conn->close();

session_unset();
session_destroy();

header("Location: login.php");
exit;

