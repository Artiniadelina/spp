<?php
include 'header.php'; 
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pembayaran</title>
    <link href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/custom.css'); ?>" rel="stylesheet"> <!-- Custom CSS -->
</head>
<body>
    <div class="container mt-5">
        <h1>Data Pembayaran</h1>
        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#createModal">
            Tambah Pembayaran
        </button>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID Pembayaran</th>
                    <th>ID Petugas</th>
                    <th>NISN</th>
                    <th>Tanggal Bayar</th>
                    <th>Bulan Dibayar</th>
                    <th>Tahun Dibayar</th>
                    <th>ID SPP</th>
                    <th>Jumlah Bayar</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pembayaran as $row): ?>
                <tr>
                    <td><?php echo $row['id_pembayaran']; ?></td>
                    <td><?php echo $row['id_petugas']; ?></td>
                    <td><?php echo $row['nisn']; ?></td>
                    <td><?php echo $row['tgl_bayar']; ?></td>
                    <td><?php echo $row['bulan_dibayar']; ?></td>
                    <td><?php echo $row['tahun_dibayar']; ?></td>
                    <td><?php echo $row['id_spp']; ?></td>
                    <td><?php echo $row['jumlah_bayar']; ?></td>
                    <td>
                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModal" data-id="<?php echo $row['id_pembayaran']; ?>">Edit</button>
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal" data-id="<?php echo $row['id_pembayaran']; ?>">Delete</button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Modal Create -->
    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Tambah Pembayaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo site_url('pembayaran/store'); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="id_petugas">Petugas</label>
                            <select name="id_petugas" id="id_petugas" class="form-control" required>
                                <?php foreach ($petugas as $petugas_item): ?>
                                    <option value="<?php echo $petugas_item['id_petugas']; ?>">
                                        <?php echo $petugas_item['nama_petugas']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="nisn">NISN</label>
                            <input type="text" name="nisn" id="nisn" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="tgl_bayar">Tanggal Bayar</label>
                            <input type="date" name="tgl_bayar" id="tgl_bayar" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="bulan_dibayar">Bulan Dibayar</label>
                            <input type="text" name="bulan_dibayar" id="bulan_dibayar" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="tahun_dibayar">Tahun Dibayar</label>
                            <input type="text" name="tahun_dibayar" id="tahun_dibayar" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="id_spp">SPP</label>
                            <select name="id_spp" id="id_spp" class="form-control" required>
                                <?php foreach ($spp as $spp_item): ?>
                                    <option value="<?php echo $spp_item['id_spp']; ?>">
                                        <?php echo $spp_item['tahun']; ?> - <?php echo $spp_item['nominal']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="jumlah_bayar">Jumlah Bayar</label>
                            <input type="number" name="jumlah_bayar" id="jumlah_bayar" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Edit -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Pembayaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="editForm" action="<?php echo site_url('pembayaran/update'); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">
                        <input type="hidden" name="id_pembayaran" id="edit_id_pembayaran">
                        <div class="form-group">
                            <label for="edit_id_petugas">Petugas</label>
                            <select name="id_petugas" id="edit_id_petugas" class="form-control" required>
                                <?php foreach ($petugas as $petugas_item): ?>
                                    <option value="<?php echo $petugas_item['id_petugas']; ?>">
                                        <?php echo $petugas_item['nama_petugas']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="edit_nisn">NISN</label>
                            <input type="text" name="nisn" id="edit_nisn" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="edit_tgl_bayar">Tanggal Bayar</label>
                            <input type="date" name="tgl_bayar" id="edit_tgl_bayar" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="edit_bulan_dibayar">Bulan Dibayar</label>
                            <input type="text" name="bulan_dibayar" id="edit_bulan_dibayar" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="edit_tahun_dibayar">Tahun Dibayar</label>
                            <input type="text" name="tahun_dibayar" id="edit_tahun_dibayar" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="edit_id_spp">SPP</label>
                            <select name="id_spp" id="edit_id_spp" class="form-control" required>
                                <?php foreach ($spp as $spp_item): ?>
                                    <option value="<?php echo $spp_item['id_spp']; ?>">
                                        <?php echo $spp_item['tahun']; ?> - <?php echo $spp_item['nominal']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="edit_jumlah_bayar">Jumlah Bayar</label>
                            <input type="number" name="jumlah_bayar" id="edit_jumlah_bayar" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Delete -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Hapus Pembayaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="deleteForm" action="<?php echo site_url('pembayaran/delete'); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">
                        Apakah Anda yakin ingin menghapus data ini?
                        <input type="hidden" name="id_pembayaran" id="delete_id_pembayaran">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <script>
        $('#editModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var id = button.data('id'); // Extract info from data-* attributes

            // Ajax call to fetch data based on id
            $.ajax({
                url: '<?php echo site_url('pembayaran/edit'); ?>/' + id,
                method: 'GET',
                dataType: 'json',
                success: function (data) {
                    $('#edit_id_pembayaran').val(data.id_pembayaran);
                    $('#edit_id_petugas').val(data.id_petugas);
                    $('#edit_nisn').val(data.nisn);
                    $('#edit_tgl_bayar').val(data.tgl_bayar);
                    $('#edit_bulan_dibayar').val(data.bulan_dibayar);
                    $('#edit_tahun_dibayar').val(data.tahun_dibayar);
                    $('#edit_id_spp').val(data.id_spp);
                    $('#edit_jumlah_bayar').val(data.jumlah_bayar);
                }
            });
        });

        $('#deleteModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var id = button.data('id'); // Extract info from data-* attributes
            $('#delete_id_pembayaran').val(id);
        });
    </script>
</body>
</html>
