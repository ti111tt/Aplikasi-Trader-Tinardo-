<!-- application/views/karyawan_view.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Karyawan</title>
    <!-- Include Bootstrap CSS -->
    <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
    <!-- Include FontAwesome CSS -->
    <link href="<?= base_url('assets/css/all.min.css') ?>" rel="stylesheet">
    <!-- Include Custom CSS -->
    <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">
</head>

<body>
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3><?= $title ?></h3>
                            <h3>Halaman Data Karyawan</h3>
                            <p class="text-subtitle text-muted">Berikut ini adalah data karyawan <?= $title ?></p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <!-- Breadcrumb jika diperlukan -->
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <section class="section">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <a href="<?= base_url('home/tambah_kry') ?>" class="btn btn-primary">Tambah Data Karyawan</a>
                            <button type="button" class="btn btn-primary" id="printData">Print Data Karyawan</button>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nik</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Email</th>
                                        <th>Nomor Telepon</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($manda as $flora) {
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $flora->NIK ?></td>
                                            <td><?= $flora->nama ?></td>
                                            <td><?= $flora->alamat ?></td>
                                            <td><?= $flora->email ?></td>
                                            <td><?= $flora->no_hp ?></td>
                                            <td>
                                                <!-- Detail Button -->
                                                <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#detailModal" data-id="<?= $flora->id ?>">!</button>
                                                <button class="btn btn-warning btn-sm">Reset Password</button>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <!-- Detail Modal -->
    <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailModalLabel">Detail Karyawan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- User Details Form -->
                    <form id="userDetailForm" action="<?= base_url('home/update_karyawan') ?>" method="POST">
                        <input type="hidden" id="user_id" name="user_id">
                        <div class="form-group">
                            <label for="user_nik">NIK</label>
                            <input type="text" class="form-control" id="user_nik" name="user_nik" required>
                        </div>

                        <div class="form-group">
                            <label for="user_name">Nama</label>
                            <input type="text" class="form-control" id="user_name" name="user_name" required>
                        </div>

                        <div class="form-group">
                            <label for="user_email">Email</label>
                            <input type="email" class="form-control" id="user_email" name="user_email" required>
                        </div>

                        <div class="form-group">
                            <label for="user_phone">Nomor Telepon</label>
                            <input type="text" class="form-control" id="user_phone" name="user_phone" required>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button type="button" class="btn btn-danger" id="deleteUserBtn">Hapus</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Include jQuery and Bootstrap JavaScript -->
    <script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>

    <!-- Add this JavaScript to handle the modal -->
    <script>
        $(document).ready(function() {
            $('#detailModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var userId = button.data('id');
                
                // Fetch user details based on userId
                $.ajax({
                    url: '<?= base_url('home/get_user_details') ?>',
                    method: 'POST',
                    data: { id: userId },
                    dataType: 'json',
                    success: function(data) {
                        $('#user_id').val(data.id);
                        $('#user_nik').val(data.NIK);
                        $('#user_name').val(data.nama);
                        $('#user_email').val(data.email);
                        $('#user_phone').val(data.no_hp);
                    }
                });
            });

            $('#printData').on('click', function() {
                window.print();
            });
        });
    </script>
</body>

</html>
