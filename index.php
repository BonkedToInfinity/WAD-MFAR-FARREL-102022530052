<?php
require_once 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biodata Pelanggan Laundry</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <header class="form-header">
            <h2>Biodata Pelanggan</h2>
            <p>Silakan isi biodata, nomor telepon, dan catatan penanganan khusus untuk pakaian Anda.</p>
        </header>

        <form action="auth_process.php" method="POST" class="laundry-form">
            <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input type="text" id="nama" name="nama" placeholder="Masukkan nama lengkap" required>
            </div>

            <div class="form-group">
                <label for="telepon">Nomor Telpon / WhatsApp</label>
                <input type="tel" id="telepon" name="telepon" placeholder="Contoh: 081234567890" required>
            </div>

            <div class="form-group">
                <label for="alamat">Alamat Pelanggan</label>
                <textarea id="alamat" name="alamat" rows="3" placeholder="Masukkan alamat lengkap penjemputan/pengiriman"></textarea>
            </div>

            <div class="form-group">
                <label for="catatan">Catatan Penanganan Khusus Pakaian</label>
                <textarea id="catatan" name="catatan" rows="4" placeholder="Contoh: Baju putih jangan dicampur, dll."></textarea>
            </div>

            <div class="form-actions">
                <button type="submit" name="submit_btn" class="btn btn-primary">Simpan Data Pelanggan</button>
                <button type="reset" name="reset_btn" class="btn btn-secondary">Reset</button>
            </div>
        </form>

        <div class="data-section" style="margin-top: 35px; border-top: 2px solid #eef2f5; padding-top: 20px;">
            <h3 style="color: #007bff; font-size: 20px; margin-bottom: 15px; font-weight: 600;">Data dan Catatan pelangan</h3>
            
            <div class="card-container">
                <?php 
                $result = $conn->query("SELECT * FROM pelanggan_biodata");
                
                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) : 
                ?>
                <div class="customer-card">
                    <div class="card-info">
                        <h4 class="card-name"></h4>
                        <p><span>Nama:</span> <?= htmlspecialchars($row['nama']); ?></p>
                        <p><span>No. Telp/WA:</span> <?= htmlspecialchars($row['nomortelpon']); ?></p>
                        <p><span>Alamat:</span> <?= htmlspecialchars($row['alamat']); ?></p>
                        <p><span>Catatan:</span> <?= htmlspecialchars($row['catatan']); ?></p>
                    </div>
                    <div class="card-actions">
                        <a href="update.php?nama=<?= urlencode($row['nama']); ?>" class="btn-card btn-edit">Edit</a>
                        <a href="delete.php?nama=<?= urlencode($row['nama']); ?>" class="btn-card btn-delete" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                    </div>
                </div>
                <?php 
                    endwhile; 
                } else {
                    echo "<p style='color: #666; font-size: 14px;'>Belum ada data pelanggan yang tersimpan.</p>";
                }
                ?>
            </div>
        </div>

    </div>
</body>
</html>