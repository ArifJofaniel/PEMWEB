<?php
session_start();

// KETENTUAN: Hanya bisa diakses kalau sudah login
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

$user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html>
<head><title>Edit Profil</title></head>
<body>
    <h2>Edit Profil</h2>
    
    <?php
    if (isset($_GET['status'])) {
        if ($_GET['status'] == 'sukses') {
            echo "<p style='color: green;'><b>Profil berhasil diupdate!</b></p>";
        } else if ($_GET['status'] == 'gagal') {
            echo "<p style='color: red;'><b>Gagal mengupdate profil.</b></p>";
        }
    }
    ?>
    
    <form action="proses_edit_profile.php" method="POST">
        <label>Nama:</label><br>
        <input type="text" name="name" value="<?= htmlspecialchars($user['name']); ?>" required><br><br>
        
        <label>Email (Tidak bisa diubah):</label><br>
        <input type="email" value="<?= htmlspecialchars($user['email']); ?>" disabled><br><br>
        
        <label>Biografi:</label><br>
        <textarea name="biografi" rows="3" required><?= htmlspecialchars($user['biografi']); ?></textarea><br><br>
        
        <button type="submit">Simpan Perubahan</button>
    </form>
    <br>
    <a href="profile.php">Kembali ke Profil</a>
</body>
</html>