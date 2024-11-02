<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];

    $stmt = $pdo->prepare("INSERT INTO users (name, email, age) VALUES (?, ?, ?)");
    $stmt->execute([$name, $email, $age]);

    echo "Data berhasil ditambahkan!";
}
?>

<form method="POST">
    Nama: <input type="text" name="name" required><br>
    Email: <input type="email" name="email" required><br>
    Umur: <input type="number" name="age" required><br>
    <button type="submit">Tambah Data</button>
</form>
