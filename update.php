<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];

    $stmt = $pdo->prepare("UPDATE users SET name = ?, email = ?, age = ? WHERE id = ?");
    $stmt->execute([$name, $email, $age, $id]);

    echo "Data berhasil diubah!";
}

$id = 1; // ID yang ingin diubah
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$id]);
$user = $stmt->fetch();
?>

<form method="POST">
    <input type="hidden" name="id" value="<?= $user['id'] ?>">
    Nama: <input type="text" name="name" value="<?= $user['name'] ?>" required><br>
    Email: <input type="email" name="email" value="<?= $user['email'] ?>" required><br>
    Umur: <input type="number" name="age" value="<?= $user['age'] ?>" required><br>
    <button type="submit">Ubah Data</button>
</form>
