<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

include 'connect.php';

$sql = "SELECT * FROM warga";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pencatatan Warga Non-Domisili</title>
    <link rel="stylesheet" type="text/css" href="styleindex.css">
</head>
<body>
    <h2>Pencatatan Warga Non-Domisili</h2>
    <div class="button-container">
        <a href="add_warga.php" class="button">Tambah Warga</a>
        <a href="logout.php" class="button logout">Logout</a>
    </div>
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Nomor Induk Kependudukan</th>
                <th>Status</th>
                <th>Nama Tempat</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['nama']); ?></td>
                <td><?php echo htmlspecialchars($row['NIK']); ?></td>
                <td><?php echo htmlspecialchars($row['status']); ?></td>
                <td><?php echo htmlspecialchars($row['nama_tempat']); ?></td>
                <td>
                    <a href="edit_warga.php?id=<?php echo htmlspecialchars($row['ID_Warga']); ?>">Edit</a>
                    <a href="delete_warga.php?id=<?php echo htmlspecialchars($row['ID_Warga']); ?>">Delete</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>




