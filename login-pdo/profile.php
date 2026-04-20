<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
$user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html>
<head><title>Profil</title></head>
<body>
    <h2>Profil User</h2>
    <p><strong>Nama:</strong> <?= htmlspecialchars($user['name']); ?></p>
    <p><strong>Email:</strong> <?= htmlspecialchars($user['email']); ?></p>
    <p><strong>Biografi:</strong> <?= nl2br(htmlspecialchars($user['biografi'])); ?></p>
    
    <hr>
    <h3>Menu Navigasi</h3>
    <ul>
        <li><a href="edit_profile.php">Edit Profil</a></li>
        <li><a href="daftar_user.php">Lihat Daftar Semua User</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</body>
</html>