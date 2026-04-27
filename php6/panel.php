<?php
session_start();
require_once 'db.php';

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $imie = $_POST['imie'] ?? '';
    $nazwisko = $_POST['nazwisko'] ?? '';
    $email = $_POST['email'] ?? '';
    $user_id = $_SESSION['user_id'];

    $stmt = $conn->prepare("INSERT INTO uzytkownicy_dane (user_id, imie, nazwisko, email) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isss", $user_id, $imie, $nazwisko, $email);

    if ($stmt->execute()) {
        $_SESSION['formularz_wyslany'] = true;
        $message = 'Dane zostały zapisane.';
    } else {
        $message = 'Błąd podczas zapisywania danych: ' . $conn->error;
    }
    $stmt->close();
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Panel użytkownika</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 500px; margin: 50px auto; }
        input { display: block; margin: 10px 0; padding: 8px; width: 100%; box-sizing: border-box; }
        button { padding: 10px 20px; cursor: pointer; margin-top: 10px; }
        .success { color: green; }
    </style>
</head>
<body>
    <h2>Witaj, <?php echo htmlspecialchars($_SESSION['user']); ?>!</h2>
    <p>Rola: <?php echo htmlspecialchars($_SESSION['role']); ?></p>

    <?php if ($message): ?>
        <p class="success"><?php echo htmlspecialchars($message); ?></p>
    <?php endif; ?>

    <h3>Formularz danych</h3>
    <form method="post" action="">
        <label>Imię:</label>
        <input type="text" name="imie" required>
        <label>Nazwisko:</label>
        <input type="text" name="nazwisko" required>
        <label>E-mail:</label>
        <input type="email" name="email" required>
        <button type="submit">Wyślij</button>
    </form>

    <br>
    <a href="logout.php"><button>Wyloguj</button></a>

    <?php if ($_SESSION['role'] === 'admin'): ?>
        <br><br>
        <a href="wyniki.php"><button>Wyniki (admin)</button></a>
    <?php endif; ?>
</body>
</html>

