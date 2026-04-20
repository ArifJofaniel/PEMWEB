<?php
session_start();
include 'koneksi.php';


if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

$sql = "SELECT name, email, biografi FROM users";
$query = $db->query($sql);


$users = $query->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head><title>Daftar User</title></head>
<body>
    <h2>Daftar Seluruh Pengguna</h2>
    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>Nama</th>
            <th>Email</th>
            <th>Biografi</th>
        </tr>
        <?php foreach ($users as $row) : ?>
        <tr>
            <td><?= htmlspecialchars($row['name']); ?></td>
            <td><?= htmlspecialchars($row['email']); ?></td>
            <td><?= htmlspecialchars($row['biografi']); ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <br>
    <a href="profile.php">Kembali ke Profil</a>
</body>
</html>