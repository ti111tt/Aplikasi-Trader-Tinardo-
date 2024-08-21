<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Data Pengiriman</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 8px; }
        th { background-color: #f2f2f2; }
        h1 { text-align: center; }
    </style>
</head>
<body>
    <h1>Data Pengiriman</h1>
    <table>
        <thead>
            <tr>
                <th>Nomor Pesanan</th>
                <th>Nama Produk</th>
                <th>Berat Produk</th>
                <th>Qty</th>
                <th>Alamat Tujuan</th>
                <th>Tanggal Pemesanan</th>
                <th>Tanggal Pengiriman</th>
                <th>Status Pesanan</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($manda as $flora): ?>
            <tr>
                <td><?= $flora->id_pesanan ?></td>
                <td><?= $flora->nama_brg ?></td>
                <td><?= $flora->berat ?></td>
                <td><?= $flora->Qty ?></td>
                <td><?= $flora->alamat ?></td>
                <td><?= $flora->tgl_pesan ?></td>
                <td><?= $flora->tgl_kirim ?></td>
                <td><?= $flora->status_pesanan ?></td>
                <td><?= $flora->total_harga ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
