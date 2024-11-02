<?php
include 'config.php';

// Menampilkan data
$stmt = $pdo->query("SELECT * FROM users");
$users = $stmt->fetchAll();
?>

<h2>Daftar Pengguna</h2>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Umur</th>
        <th>Aksi</th>
    </tr>
    <?php foreach ($users as $user): ?>
    <tr>
        <td><?= $user['id'] ?></td>
        <td><?= $user['name'] ?></td>
        <td><?= $user['email'] ?></td>
        <td><?= $user['age'] ?></td>
        <td>
            <!-- Tombol Hapus -->
            <form method="POST" style="display:inline;">
                <input type="hidden" name="id" value="<?= $user['id'] ?>">
                <button type="submit" name="delete">Hapus</button>
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<?php
// Proses Hapus Data
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete'])) {
    $id = $_POST['id'];

    $stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
    $stmt->execute([$id]);

    echo "Data berhasil dihapus!";
    header("Refresh:0"); // Refresh halaman setelah penghapusan
}
?>
