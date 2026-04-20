<?php
include 'koneksi.php';

$sql = "SELECT * FROM users";
$query = $db->query($sql);

while ($row = $query->fetch()) {
    echo $row['name'] . " - " . $row['email'] . "<br>";
}
?>
