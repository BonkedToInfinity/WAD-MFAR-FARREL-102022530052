<?php
session_start();
require_once 'config.php';

if (isset($_POST['submit_btn'])) {

    $nama = $_POST['nama'] ?? '';
    $telepon = $_POST['telepon'] ?? '';
    $alamat = $_POST['alamat'] ?? '';
    $catatan = $_POST['catatan'] ?? '';


    if (empty($nama)) {
        die("Error: Nama tidak boleh kosong!");
    }

    $stmt = $conn->prepare("INSERT INTO pelanggan_biodata (nama, nomortelpon, alamat, catatan) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("siss", $nama, $telepon, $alamat, $catatan);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "Gagal menyimpan data: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: index.php");
    exit();
}
?>