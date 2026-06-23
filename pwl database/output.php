<?php
include 'config/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $npm = $_POST['npm'];
    $nama = $_POST['nama'];
    $jenis_kelamin = $_POST['jk'];
    $umur = $_POST['umur'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];

    // Simpan ke database
    $insert = "INSERT INTO mahasiswa (npm, nama, jenis_kelamin, umur, alamat, email)
               VALUES ('$npm', '$nama', '$jenis_kelamin', '$umur', '$alamat', '$email')";
    
    if (!mysqli_query($conn, $insert)) {
        echo "Error: " . mysqli_error($conn);
    }
}

// Ambil semua data dari database
$query = mysqli_query($conn, "SELECT * FROM mahasiswa");
if (!$query) {
    echo "Error: " . mysqli_error($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Mahasiswa</title>
</head>
<body>
    <h2>Daftar Data Mahasiswa</h2>
    <a href="index.php">+ Tambah Data</a> <br><br>

    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>No</th>
            <th>NPM</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Umur</th>
            <th>Alamat</th>
            <th>Email</th>
            <th>Aksi</th>
        </tr>

        <?php
        if (mysqli_num_rows($query) > 0) {
            $no = 1;
            while ($row = mysqli_fetch_assoc($query)) { ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= htmlspecialchars($row['npm']); ?></td>
                    <td><?= htmlspecialchars($row['nama']); ?></td>
                    <td><?= htmlspecialchars($row['jenis_kelamin']); ?></td>
                    <td><?= htmlspecialchars($row['umur']); ?></td>
                    <td><?= htmlspecialchars($row['alamat']); ?></td>
                    <td><?= htmlspecialchars($row['email']); ?></td>
                    <td>
                        <a href="edit.php?npm=<?= $row['npm']; ?>">Edit</a> |
                        <a href="delete.php?npm=<?= $row['npm']; ?>" onclick="return confirm('Yakin ingin menghapus data ini?');">Delete</a>
                    </td>
                </tr>
            <?php }
        } else { ?>
            <tr>
                <td colspan="8" style="text-align: center;">Tidak ada data mahasiswa</td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>