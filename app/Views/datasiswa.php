<?php
include 'header.php'; 
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Data Siswa</title>

    <!-- Custom fonts for this template -->
    <link href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?= base_url('assets/css/sb-admin-2.min.css'); ?>" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.min.css'); ?>" rel="stylesheet">
</head>

<body id="page-top">
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Data Siswa</h6>
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#createModal">
                    <i class="fas fa-plus"></i> Tambah Data
                </button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>NISN</th>
                                <th>NIS</th>
                                <th>Nama Siswa</th>
                                <th>Kelas</th>
                                <th>Alamat</th>
                                <th>No Telp</th>
                                <th>ID SPP</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "
                                SELECT s.nisn, s.nis, s.nama, k.nama_kelas, s.alamat, s.no_telp, s.id_spp
                                FROM siswa s
                                JOIN kelas k ON s.id_kelas = k.id_kelas
                                JOIN spp sp ON s.id_spp = sp.id_spp
                            ";
                            $exec = mysqli_query($conn, $query);
                            if (!$exec) {
                                echo "Error: " . mysqli_error($conn);
                            }
                            while ($res = mysqli_fetch_assoc($exec)) :
                            ?>
                            <tr>
                                <td><?= $res['nisn']; ?></td>
                                <td><?= $res['nis']; ?></td>
                                <td><?= $res['nama']; ?></td>
                                <td><?= $res['nama_kelas']; ?></td>
                                <td><?= $res['alamat']; ?></td>
                                <td><?= $res['no_telp']; ?></td>
                                <td><?= $res['id_spp']; ?></td>
                                <td>
                                    <button type="button" class="btn btn-warning btn-sm btn-edit" data-id="<?= $res['nisn']; ?>">
                                        <i class="fas fa-edit"></i> Edit
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm btn-delete" data-id="<?= $res['nisn']; ?>">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Your Website 2020</span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->

    <!-- Modal Tambah Data -->
    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Tambah Data Siswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="createForm" method="post" action="<?= base_url('datasiswa/create'); ?>">
                        <div class="form-group">
                            <label for="nisn">NISN</label>
                            <input type="text" class="form-control" id="nisn" name="nisn" required>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama Siswa</label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="id_kelas">Kelas</label>
                            <select class="form-control" id="id_kelas" name="id_kelas" required>
                                <!-- Option will be loaded here from database -->
                                <?php
                                // Fetch and display kelas options
                                $kelasQuery = "SELECT id_kelas, nama_kelas FROM kelas";
                                $kelasExec = mysqli_query($conn, $kelasQuery);
                                while ($kelas = mysqli_fetch_assoc($kelasExec)) {
                                    echo "<option value='{$kelas['id_kelas']}'>{$kelas['nama_kelas']}</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" required>
                        </div>
                        <div class="form-group">
                            <label for="no_telp">No Telepon</label>
                            <input type="text" class="form-control" id="no_telp" name="no_telp" required>
                        </div>
                        <div class="form-group">
                            <label for="id_spp">SPP</label>
                            <select class="form-control" id="id_spp" name="id_spp" required>
                                <!-- Option will be loaded here from database -->
                                <?php
                                // Fetch and display spp options
                                $sppQuery = "SELECT id_spp, nominal FROM spp";
                                $sppExec = mysqli_query($conn, $sppQuery);
                                while ($spp = mysqli_fetch_assoc($sppExec)) {
                                    echo "<option value='{$spp['id_spp']}'>{$spp['nominal']}</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit Data -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Data Siswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editForm" method="post" action="<?= base_url('datasiswa/update'); ?>">
                        <input type="hidden" id="edit_nisn" name="nisn">
                        <div class="form-group">
                            <label for="edit_nama">Nama Siswa</label>
                            <input type="text" class="form-control" id="edit_nama" name="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_id_kelas">Kelas</label>
                            <select class="form-control" id="edit_id_kelas" name="id_kelas" required>
                                <!-- Option will be loaded here from database -->
                                <?php
                                // Fetch and display kelas options
                                $kelasQuery = "SELECT id_kelas, nama_kelas FROM kelas";
                                $kelasExec = mysqli_query($conn, $kelasQuery);
                                while ($kelas = mysqli_fetch_assoc($kelasExec)) {
                                    echo "<option value='{$kelas['id_kelas']}'>{$kelas['nama_kelas']}</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="edit_alamat">Alamat</label>
                            <input type="text" class="form-control" id="edit_alamat" name="alamat" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_no_telp">No Telepon</label>
                            <input type="text" class="form-control" id="edit_no_telp" name="no_telp" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_id_spp">SPP</label>
                            <select class="form-control" id="edit_id_spp" name="id_spp" required>
                                <!-- Option will be loaded here from database -->
                                <?php
                                // Fetch and display spp options
                                $sppQuery = "SELECT id_spp, nominal FROM spp";
                                $sppExec = mysqli_query($conn, $sppQuery);
                                while ($spp = mysqli_fetch_assoc($sppExec)) {
                                    echo "<option value='{$spp['id_spp']}'>{$spp['nominal']}</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Script -->
    <script src="<?= base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/sb-admin-2.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/datatables/jquery.dataTables.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.min.js'); ?>"></script>
    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable();

            $('.btn-edit').on('click', function () {
                var nisn = $(this).data('id');
                $.ajax({
                    url: '<?= base_url('datasiswa/get_siswa'); ?>',
                    method: 'POST',
                    data: { nisn: nisn },
                    dataType: 'json',
                    success: function (data) {
                        $('#edit_nisn').val(data.nisn);
                        $('#edit_nama').val(data.nama);
                        $('#edit_id_kelas').val(data.id_kelas);
                        $('#edit_alamat').val(data.alamat);
                        $('#edit_no_telp').val(data.no_telp);
                        $('#edit_id_spp').val(data.id_spp);
                        $('#editModal').modal('show');
                    }
                });
            });

            $('.btn-delete').on('click', function () {
                var nisn = $(this).data('id');
                if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                    window.location.href = '<?= base_url('datasiswa/delete/'); ?>' + nisn;
                }
            });
        });
    </script>
</body>
</html>
