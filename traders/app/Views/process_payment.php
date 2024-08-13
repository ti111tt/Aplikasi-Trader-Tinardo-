<?php
header('Content-Type: application/json');
include 'database_connection.php'; // Pastikan koneksi database sudah benar

$response = array();

try {
    $data = json_decode(file_get_contents('php://input'), true);

    $address = $data['address'];
    $senderName = $data['senderName'];
    $paymentMethod = $data['paymentMethod'];
    $orders = $data['orders'];

    // Mulai transaksi database
    $pdo->beginTransaction();

    // Masukkan data ke tabel transaksi
    $stmt = $pdo->prepare("INSERT INTO transaksi (tgl_transaksi, kode_transaksi, id_users, id_brg, total_harga, nama_pengirim, alamat_pengirim, nama_penerima, alamat_penerima, type) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $totalPrice = array_sum(array_column($orders, 'total'));
    $kodeTransaksi = uniqid(); // Ganti dengan logika pembuatan kode transaksi jika diperlukan
    $stmt->execute([
        date('Y-m-d'), 
        $kodeTransaksi, 
        1, // Ganti dengan ID pengguna yang sesuai
        1, // Ganti dengan ID barang yang sesuai
        $totalPrice,
        $senderName, 
        $address, 
        'Penerima', // Ganti dengan nama penerima jika ada
        'Alamat Penerima', // Ganti dengan alamat penerima jika ada
        $paymentMethod
    ]);
    $transactionId = $pdo->lastInsertId();

    // Masukkan data detail pesanan ke tabel transaksi_detail
    $stmt = $pdo->prepare("INSERT INTO transaksi_detail (id_transaksi, nama_barang, jumlah, total_harga, catatan) VALUES (?, ?, ?, ?, ?)");
    foreach ($orders as $order) {
        $stmt->execute([$transactionId, $order['item'], $order['quantity'], $order['total'], $order['note']]);
    }

    // Hapus data dari tabel keranjang
    $stmt = $pdo->prepare("DELETE FROM keranjang WHERE id_user = ?"); // Ganti sesuai dengan parameter ID pengguna yang relevan
    $stmt->execute([1]); // Ganti dengan ID pengguna yang sesuai

    // Commit transaksi
    $pdo->commit();

    $response['success'] = true;
    $response['message'] = 'Pembayaran berhasil!';
} catch (Exception $e) {
    $pdo->rollBack();
    $response['success'] = false;
    $response['message'] = 'Terjadi kesalahan: ' . $e->getMessage();
}

echo json_encode($response);
