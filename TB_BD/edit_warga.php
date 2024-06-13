<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

include 'connect.php';

$id = $_GET['id'];
$sql = "SELECT * FROM warga WHERE ID_Warga = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $NIK = $_POST['NIK'];
    $status = $_POST['status'];
    $nama_tempat = $_POST['nama_tempat'];

    $sql = "UPDATE warga SET nama='$nama', NIK='$NIK', status='$status', nama_tempat='$nama_tempat' WHERE ID_Warga=$id";

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
    <title>Edit Warga</title>
    <link rel="stylesheet" type="text/css" href="styleedit.css">
</head>
<body>
    <div class="container">
        <h2>Edit Warga</h2>
        <form method="POST" action="">
            <label>Nama:</label><br>
            <input type="text" name="nama" value="<?php echo $row['nama']; ?>" required><br>
            <label>Nomor Induk Kependudukan:</label><br>
            <input type="text" name="NIK" value="<?php echo $row['NIK']; ?>" required><br>
            <label>Status:</label><br>
            <select name="status" required>
                <option value="Pengontrak" <?php echo $row['status'] == 'Pengontrak' ? 'selected' : ''; ?>>Pengontrak</option>
                <option value="Kos" <?php echo $row['status'] == 'Kos' ? 'selected' : ''; ?>>Kos</option>
            </select><br>
            <label>Nama Tempat:</label><br>
            <input type="text" name="nama_tempat" value="<?php echo $row['nama_tempat']; ?>" required><br><br>
            <input type="submit" value="Update">
        </form>
        <a href="index.php">Kembali ke Daftar</a>
    </div>
</body>
</html>
