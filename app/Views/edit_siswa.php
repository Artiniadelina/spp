<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Siswa</title>
</head>
<body>
    <h1>Edit Siswa</h1>
    <form action="<?= base_url('datasiswa/update'); ?>" method="post">
        <input type="hidden" name="id_siswa" value="<?= $siswa['id_siswa']; ?>">
        <label>NISN:</label><br>
        <input type="text" name="nisn" value="<?= $siswa['nisn']; ?>" required><br>
        <label>Nama:</label><br>
        <input type="text" name="nama" value="<?= $siswa['nama']; ?>" required><br>
        <label>Angkatan:</label><br>
        <input type="text" name="id_angkatan" value="<?= $siswa['id_angkatan']; ?>" required><br>
        <label>Kelas:</label><br>
        <input type="text" name="id_kelas" value="<?= $siswa['id_kelas']; ?>" required><br>
        <label>Jurusan:</label><br>
        <input type="text" name="id_jurusan" value="<?= $siswa['id_jurusan']; ?>" required><br>
        <label>Alamat:</label><br>
        <textarea name="alamat" required><?= $siswa['alamat']; ?></textarea><br>
        <input type="submit" value="Update">
    </form>
    <a href="<?= base_url('datasiswa'); ?>">Kembali</a>
</body>
</html>
