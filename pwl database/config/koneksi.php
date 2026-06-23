<?php
$servername = "localhost";
$username = "root"; 
$password = "";     

// Koneksi tanpa memilih database terlebih dahulu
$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Buat database jika belum ada
$sql = "CREATE DATABASE IF NOT EXISTS pwl";
if ($conn->query($sql) === TRUE) {
    // echo "Database berhasil dibuat atau sudah ada";
} else {
    echo "Error creating database: " . $conn->error;
}

// Sekarang pilih database
$conn->select_db("pwl");

// Buat tabel mahasiswa jika belum ada
$sql_table = "CREATE TABLE IF NOT EXISTS mahasiswa (
    npm VARCHAR(15) PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    jenis_kelamin ENUM('Laki-laki', 'Perempuan') NOT NULL,
    umur INT NOT NULL,
    alamat TEXT NOT NULL,
    email VARCHAR(100) NOT NULL
)";

if ($conn->query($sql_table) !== TRUE) {
    echo "Error creating table: " . $conn->error;
}

// echo "Koneksi berhasil!";
?>