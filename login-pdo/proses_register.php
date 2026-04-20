<?php
include 'koneksi.php';

$name = $_POST['name'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Opsional enkripsi sesuai soal (sangat disarankan)
$biografi = $_POST['biografi'];

$sql = "INSERT INTO users (name, email, password, biografi) VALUES (:name, :email, :password, :biografi)";
$stmt = $db->prepare($sql);

try {
    $stmt->execute([
        ':name' => $name, 
        ':email' => $email, 
        ':password' => $password,
        ':biografi' => $biografi
    ]);
    echo "Registrasi berhasil. <a href='login.php'>Login sekarang</a>";
} catch (PDOException $e) {
    echo "Registrasi gagal: " . $e->getMessage();
}
?>