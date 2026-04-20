<?php
session_start();
include 'koneksi.php';

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE email = :email";
$stmt = $db->prepare($sql);
$stmt->execute([':email' => $email]);


$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user && password_verify($password, $user['password'])) {
    $_SESSION['user'] = $user;
    header("Location: profile.php");
    exit;
} else {
    echo "<h3>Login gagal! Email atau Password salah.</h3>";
    echo "<a href='login.php'>Kembali ke Halaman Login</a>";
}
?>