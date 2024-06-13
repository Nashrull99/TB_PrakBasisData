<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $NIK = $_POST['NIK'];
    $status = $_POST['status'];
    $nama_tempat = $_POST['nama_tempat'];

    $sql = "INSERT INTO warga (nama, NIK, status, nama_tempat) VALUES ('$nama', '$NIK', '$status', '$nama_tempat')";

    if ($conn->query($sql) === TRUE) {
        header('Location: index.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Warga</title>
    <link rel="stylesheet" type="text/css" href="styleadd.css">
</head>
<body>
    <div class="container">
        <h2>Tambah Warga</h2>
        <form method="POST" action="">
            <label>Nama:</label><br>
            <input type="text" name="nama" required><br>
            <label>Nomor Induk Kependudukan:</label><br>
            <input type="text" name="NIK" required><br>
            <label>Status:</label><br>
            <select name="status" required>
                <option value="Pengontrak">Pengontrak</option>
                <option value="Kos">Kos</option>
            </select><br>
            <label>Nama Tempat:</label><br>
            <input type="text" name="nama_tempat" required><br><br>
            <input type="submit" value="Tambah">
        </form>
        <a href="index.php">Kembali ke Daftar</a>
    </div>
</body>
</html>
