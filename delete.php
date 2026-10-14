<?php
require_once 'config.php';

if (isset($_GET['nama'])) {
    $nama = $_GET['nama'];

    $stmt = $conn->prepare("DELETE FROM pelanggan_biodata WHERE nama = ?");
    $stmt->bind_param("s", $nama);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "Gagal menghapus data.";
    }

    $stmt->close();
    $conn->close();
}
?>