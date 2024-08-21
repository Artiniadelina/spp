<?php
include 'header.php'; 
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History Pembayaran</title>
    <link href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/custom.css'); ?>" rel="stylesheet"> <!-- Custom CSS -->
</head>
<body>
    <div class="container mt-5">
        <h1>History Pembayaran</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID Pembayaran</th>
                    <th>NISN</th>
                    <th>Tanggal Bayar</th>
                    <th>Bulan Dibayar</th>
                    <th>Tahun Dibayar</th>
                    <th>ID SPP</th>
                    <th>Jumlah Bayar</th>
                    <th>Petugas</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($history as $row): ?>
                <tr>
                    <td><?= $row['id_pembayaran']; ?></td>
                    <td><?= $row['nisn']; ?></td>
                    <td><?= $row['tgl_bayar']; ?></td>
                    <td><?= $row['bulan_dibayar']; ?></td>
                    <td><?= $row['tahun_dibayar']; ?></td>
                    <td><?= $row['id_spp']; ?></td>
                    <td><?= $row['jumlah_bayar']; ?></td>
                    <td><?= $row['nama_petugas']; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="<?= base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
</body>
</html>
