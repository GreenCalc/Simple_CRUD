<?php
include 'config.php';

$stmt = $pdo->query("SELECT * FROM users");
$users = $stmt->fetchAll();

foreach ($users as $user) {
    echo "ID: " . $user['id'] . " - Nama: " . $user['name'] . " - Email: " . $user['email'] . " - Umur: " . $user['age'] . "<br>";
}
?>
