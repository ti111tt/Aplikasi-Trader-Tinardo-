<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History Pesanan</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 90%;
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        .header h3 {
            font-size: 28px;
            margin: 0;
            color: #007bff;
        }
        .header p {
            font-size: 16px;
            color: #6c757d;
        }
        .table-wrapper {
            overflow-x: auto;
            overflow-y: hidden;
            margin-bottom: 20px;
        }
        .table {
            width: 100%;
            min-width: 800px;
            border-collapse: collapse;
            background: #fff;
            border-radius: 8px;
            overflow: hidden;
        }
        .table thead {
            background: #007bff;
            color: #fff;
            font-size: 16px;
        }
        .table th, .table td {
            padding: 15px;
            text-align: left;
        }
        .table tbody tr {
            border-bottom: 1px solid #ddd;
        }
        .table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .table tbody tr:hover {
            background-color: #e9ecef;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 20px;
            border-radius: 5px;
            background-color: #28a745;
            color: #fff;
            text-decoration: none;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        .btn:hover {
            background-color: #218838;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            color: #6c757d;
        }
        .icon {
            color: #007bff;
            font-size: 24px;
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h3><i class="fas fa-history icon"></i> History Pesanan</h3>
            <p class="text-subtitle">Berikut ini adalah riwayat pesanan.</p>
        </div>

        <section class="section">
            <div class="table-wrapper">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Transaksi</th>
                            <th>ID Makanan</th>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                            <th>ID User</th>
                            <th>Total Harga</th>
                            <th>Catatan</th>
                            <th>Metode Pembayaran</th>
                            <th>Alamat Pengiriman</th>
                            <th>Tanggal Dibuat</th>
                            <th>Tanggal Diperbarui</th>
                            <th>Status Admin</th>
                            <th>Status Transit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($hs as $flora): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $flora->kode_hs_pesan ?></td>
                                <td><?= $flora->id_makanan ?></td>
                                <td><?= $flora->nama_brg ?></td>
                                <td><?= $flora->jumlah ?></td>
                                <td><?= $flora->nama_users ?></td>
                                <td><?= $flora->total_harga ?></td>
                                <td><?= $flora->catatan ?></td>
                                <td><?= $flora->metode_pembayaran ?></td>
                                <td><?= $flora->alamat_pengiriman ?></td>
                                <td><?= $flora->created_at ?></td>
                                <td><?= $flora->updated_at ?></td>
                                <td>
                                    <select name="status_admin">
                                        <option value="Dikonfirmasi" <?= $flora->status_admin == 'Dikonfirmasi' ? 'selected' : '' ?>>Dikonfirmasi</option>
                                        <option value="Gagal Dikonfirmasi" <?= $flora->status_admin == 'Gagal Dikonfirmasi' ? 'selected' : '' ?>>Gagal Dikonfirmasi</option>
                                    </select>
                                </td>
                                <td>
                                    <select name="status_transit">
                                        <option value="Pengiriman Berhasil" <?= $flora->status_transit == 'Pengiriman Berhasil' ? 'selected' : '' ?>>Pengiriman Berhasil</option>
                                        <option value="Pengiriman Gagal" <?= $flora->status_transit == 'Pengiriman Gagal' ? 'selected' : '' ?>>Pengiriman Gagal</option>
                                    </select>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </section>
        <?php if(session()->get('level') == 1 || session()->get('level') == 2): ?>
        <div class="footer">
            <a href="home/dashboard" class="btn"><i class="fas fa-arrow-left icon"></i> Kembali</a>
            <button onclick="printPage()" class="btn"><i class="fas fa-print icon"></i> Print</button>
        </div>
        <?php endif; ?>
    </div>

    <script>
        function printPage() {
            window.print();
        }
    </script>
</body>
</html>
