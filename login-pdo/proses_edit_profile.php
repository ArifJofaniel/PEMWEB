<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

$newName = $_POST['name'];
$newBiografi = $_POST['biografi'];
$id = $_SESSION['user']['id'];

$sql = "UPDATE users SET name = :name, biografi = :biografi WHERE id = :id";
$stmt = $db->prepare($sql);

if ($stmt->execute([':name' => $newName, ':biografi' => $newBiografi, ':id' => $id])) {
    $_SESSION['user']['name'] = $newName;
    $_SESSION['user']['biografi'] = $newBiografi;
    
    header("Location: edit_profile.php?status=sukses");
    exit;
} else {
    header("Location: edit_profile.php?status=gagal");
    exit;
}
?>