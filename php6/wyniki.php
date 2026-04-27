<?php
session_start();
require_once 'db.php';

if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

$sql = "SELECT ud.id, u.login, ud.imie, ud.nazwisko, ud.email, ud.data_dodania
        FROM uzytkownicy_dane ud
        JOIN uzytkownicy u ON ud.user_id = u.id
        ORDER BY ud.data_dodania DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Wyniki - Panel administratora</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 900px; margin: 50px auto; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background-color: #f4f4f4; }
        button { padding: 10px 20px; cursor: pointer; margin-top: 20px; }
    </style>
</head>
<body>
    <h2>Wyniki - dane użytkowników</h2>

    <?php if ($result && $result->num_rows > 0): ?>
        <table>
            <tr>
                <th>ID</th>
                <th>Użytkownik</th>
                <th>Imię</th>
                <th>Nazwisko</th>
                <th>E-mail</th>
                <th>Data dodania</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['id']); ?></td>
                    <td><?php echo htmlspecialchars($row['login']); ?></td>
                    <td><?php echo htmlspecialchars($row['imie']); ?></td>
                    <td><?php echo htmlspecialchars($row['nazwisko']); ?></td>
                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                    <td><?php echo htmlspecialchars($row['data_dodania']); ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php else: ?>
        <p>Brak danych w tabeli.</p>
    <?php endif; ?>

    <a href="panel.php"><button>Powrót do panelu</button></a>
    <a href="logout.php"><button>Wyloguj</button></a>

    <?php
    $conn->close();
    ?>
</body>
</html>

