<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Kelas</title>
</head>
<body>
    <h1>Edit Kelas</h1>
    <form action="<?= base_url('datakelas/update'); ?>" method="post">
        <!-- CSRF Protection Token -->
        <?= csrf_field(); ?>
        
        <input type="hidden" name="id_kelas" value="<?= esc($kelas['id_kelas']); ?>">
        
        <label for="nama_kelas">Nama Kelas:</label><br>
        <input type="text" id="nama_kelas" name="nama_kelas" value="<?= esc($kelas['nama_kelas']); ?>" required><br><br>
        
        <input type="submit" value="Update">
    </form>
    <a href="<?= base_url('datakelas'); ?>">Kembali</a>
</body>
</html>
