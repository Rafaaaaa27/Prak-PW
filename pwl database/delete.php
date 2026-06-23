<?php
include 'config/koneksi.php';

$npm = $_GET['npm'];

$delete = mysqli_query($conn, "DELETE FROM mahasiswa WHERE npm = '$npm'");

if ($delete) {
    header("Location: output.php");
} else {
    echo "Error: " . mysqli_error($conn);
}
exit;