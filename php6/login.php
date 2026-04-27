<?php
session_start();
require_once 'db.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = $_POST['login'] ?? '';
    $haslo = $_POST['haslo'] ?? '';

    $stmt = $conn->prepare("SELECT id, login, haslo, rola FROM uzytkownicy WHERE login = ?");
    $stmt->bind_param("s", $login);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        if (password_verify($haslo, $user['haslo'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user'] = $user['login'];
            $_SESSION['role'] = $user['rola'];
            $_SESSION['formularz_wyslany'] = false;

            $data_logowania = date('Y-m-d H:i:s');
            $stmt_log = $conn->prepare("INSERT INTO logi (user_id, data_logowania, formularz_wyslany) VALUES (?, ?, 'nie')");
            $stmt_log->bind_param("is", $user['id'], $data_logowania);
            $stmt_log->execute();
            $_SESSION['log_id'] = $conn->insert_id;
            $stmt_log->close();

            header("Location: panel.php");
            exit;
        } else {
            $error = 'Niepoprawne hasło.';
        }
    } else {
        $error = 'Nie znaleziono użytkownika.';
    }
    $stmt->close();
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Logowanie</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 400px; margin: 50px auto; }
        input { display: block; margin: 10px 0; padding: 8px; width: 100%; box-sizing: border-box; }
        button { padding: 10px 20px; cursor: pointer; }
        .error { color: red; }
    </style>
</head>
<body>
    <h2>Logowanie</h2>
    <?php if ($error): ?>
        <p class="error"><?php echo htmlspecialchars($error); ?></p>
    <?php endif; ?>
    <form method="post" action="">
        <label>Login:</label>
        <input type="text" name="login" required>
        <label>Hasło:</label>
        <input type="password" name="haslo" required>
        <button type="submit">Zaloguj</button>
    </form>
</body>
</html>

