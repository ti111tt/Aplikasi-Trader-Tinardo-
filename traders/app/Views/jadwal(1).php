<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Pengiriman</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css" rel="stylesheet">
    <style>
        body {
            background: #f7f7f7;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .pagetitle {
            text-align: center;
            margin-bottom: 20px;
        }
        .pagetitle h1 {
            color: #343a40;
            font-weight: bold;
            font-size: 2.5rem;
        }
        .breadcrumb-item a {
            color: #007bff;
        }
        .breadcrumb-item.active {
            color: #6c757d;
        }
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background: #ffffff;
        }
        .table thead th {
            background: #007bff;
            color: #ffffff;
            font-weight: bold;
        }
        .table tbody tr:nth-child(even) {
            background: #f2f2f2;
        }
        .table tbody td {
            vertical-align: middle;
        }
        .btn-group {
            display: flex;
            gap: 10px;
        }
        .btn {
            border-radius: 50px;
            padding: 10px 20px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            font-weight: 600;
        }
        .btn-success {
            background-color: #28a745;
            border: none;
            color: #fff;
        }
        .btn-success:hover, .btn-success:focus {
            background-color: #218838;
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }
        .btn-success:active {
            background-color: #1e7e34;
            transform: translateY(0);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .btn-danger {
            background-color: #dc3545;
            border: none;
            color: #fff;
        }
        .btn-danger:hover, .btn-danger:focus {
            background-color: #c82333;
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }
        .btn-danger:active {
            background-color: #bd2130;
            transform: translateY(0);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Jadwal Pengiriman</h1>
            <nav>
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Home</a></li>
                    <li class="breadcrumb-item active">Jadwal Pengiriman</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="table1">
                            <thead>
                                <tr>
                                    <th>Nomor Pesanan</th>
                                    <th>Nama Produk</th>
                                    <th>Berat Produk</th>
                                    <th>Qty</th>
                                    <th>Alamat Tujuan</th>
                                    <th>Tanggal Pemesanan</th>
                                    <th>Tanggal Pengiriman</th>
                                    <th>Status Pengiriman</th>
                                    <th>Total</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($manda)): ?>
                                    <?php foreach($manda as $flora): ?>
                                        <tr>
                                            <td><?= $flora->id_pesanan ?></td>
                                            <td><?= $flora->nama_brg ?></td>
                                            <td><?= $flora->Berat ?></td>
                                            <td><?= $flora->Qty ?></td>
                                            <td><?= $flora->alamat ?></td>
                                            <td><?= $flora->tgl_pesan ?></td>
                                            <td><?= $flora->tgl_kirim ?></td>
                                            <td><?= $flora->status_pesanan ?></td>
                                            <td><?= $flora->total_harga ?></td>
                                            <td class="btn-group">
                                                <!-- Button for marking as completed -->
                                                <a href="<?= base_url('home/update_status/'.$flora->id_pesanan.'/completed') ?>" class="btn btn-success">Selesai</a>
                                                <!-- Button for marking as failed -->
                                                <a href="<?= base_url('home/update_status/'.$flora->id_pesanan.'/failed') ?>" class="btn btn-danger">Gagal</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="10">Tidak ada data pengiriman</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </main><!-- End #main -->

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>

    <script>
    $(document).ready(function() {
        $('#table1').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'excel', 'pdf', 'print'
            ]
        });
    });
    </script>
</body>
</html>
