<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = 'localhost';
$dbname = 'mieszkanie';
$username = 'root';
$password = '';

echo '<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Mieszkania - Zapytanie SQL </title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background: white; }
        table { border-collapse: collapse; width: 80%; margin: 20px auto; }
        th, td { border: 1px solid gray; padding: 12px; text-align: left; }
        th { background-color: white; font-weight: bold; }
        h1, h2 { text-align: center; color: black; }
        .info { background: white; padding: 10px; margin: 10px auto; width: 80%; border-left: 4px solid blue; }
        .error { background: blue; padding: 10px; margin: 10px auto; width: 80%; border-left: 4px solid red; color: red; }
        .success { background: white; padding: 10px; margin: 10px auto; width: 80%; border-left: 4px solid green; }
    </style>
</head>
<body>';

echo '<h1>Wyniki zapytania: mieszkania o powierzchni > 100m², ulica na "K", sort malejąco wg metrażu</h1>';


// SPOSÓB 1: MySQLi obiektowe
echo '<h2>Sposób 1: MySQLi obiektowe</h2>';

$mysqli = new mysqli($host, $username, $password, $dbname);
if ($mysqli->connect_error) {
    echo '<div class="error">Błąd połączenia: ' . htmlspecialchars($mysqli->connect_error) . '</div>';
    goto pdo_section;
}
$mysqli->set_charset('utf8mb4');

$query1 = "SELECT a.id_mieszkania as id, a.ulica, a.metraz, COALESCE(o.liczba_osob, 'N/A') as pokoje, 'N/A' as cena 
           FROM adres a LEFT JOIN osoby o ON a.id_mieszkania = o.id_mieszkania 
           WHERE a.metraz > 100 AND a.ulica LIKE 'K%' ORDER BY a.metraz DESC";

if ($result1 = $mysqli->query($query1)) {
    if ($result1->num_rows > 0) {
        echo '<table>';
        echo '<tr><th>ID</th><th>Ulica</th><th>Metraż (m²)</th><th>Cena</th><th>Pokoje</th></tr>';
        while ($row = $result1->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . htmlspecialchars($row['id']) . '</td>';
            echo '<td>' . htmlspecialchars($row['ulica']) . '</td>';
            echo '<td>' . number_format($row['metraz'], 2) . '</td>';
            echo '<td>' . htmlspecialchars($row['cena']) . '</td>';
            echo '<td>' . htmlspecialchars($row['pokoje']) . '</td>';
            echo '</tr>';
        }
        echo '</table>';
        echo '<p><strong>Liczba wyników: ' . $result1->num_rows . '</strong></p>';
    } else {
        echo '<p>Brak wyników (MySQLi)</p>';
    }
    $result1->free();
} else {
    echo '<div class="error">Błąd zapytania: ' . htmlspecialchars($mysqli->error) . '</div>';
}
$mysqli->close();

pdo_section:;

// SPOSÓB 2: PDO

echo '<h2>Sposób 2: PDO</h2>';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query2 = "SELECT a.id_mieszkania as id, a.ulica, a.metraz, COALESCE(o.liczba_osob, 'N/A') as pokoje, 'N/A' as cena 
               FROM adres a LEFT JOIN osoby o ON a.id_mieszkania = o.id_mieszkania 
               WHERE a.metraz > 100 AND a.ulica LIKE :prefix ORDER BY a.metraz DESC";
    
    $stmt = $pdo->prepare($query2);
    $stmt->bindValue(':prefix', 'K%', PDO::PARAM_STR);
    $stmt->execute();
    
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($rows) {
        echo '<table>';
        echo '<tr><th>ID</th><th>Ulica</th><th>Metraż (m²)</th><th>Cena</th><th>Pokoje</th></tr>';
        foreach ($rows as $row) {
            echo '<tr>';
            echo '<td>' . htmlspecialchars($row['id']) . '</td>';
            echo '<td>' . htmlspecialchars($row['ulica']) . '</td>';
            echo '<td>' . number_format($row['metraz'], 2) . '</td>';
            echo '<td>' . htmlspecialchars($row['cena']) . '</td>';
            echo '<td>' . htmlspecialchars($row['pokoje']) . '</td>';
            echo '</tr>';
        }
        echo '</table>';
        echo '<p><strong>Liczba wyników: ' . count($rows) . '</strong></p>';
    } else {
        echo '<p>Brak wyników (PDO)</p>';
    }
} catch (PDOException $e) {
    echo '<div class="error">Błąd PDO: ' . htmlspecialchars($e->getMessage()) . '</div>';
}

echo '</body></html>';
?>
