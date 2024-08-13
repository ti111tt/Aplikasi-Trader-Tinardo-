<?php
// submit_order.php

// Pastikan untuk mengganti detail koneksi database sesuai dengan konfigurasi Anda
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nama_database";

$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ambil data JSON dari request
$data = json_decode(file_get_contents('php://input'), true);

if ($data) {
    // Ambil data dari request
    $cart = $data['cart'];
    $id_users = $data['id_users'];
    $paymentMethod = $data['paymentMethod'];
    $shippingAddress = $data['shippingAddress'];

    // Simpan setiap item dalam keranjang ke dalam tabel `keranjang`
    foreach ($cart as $item) {
        $id_pesanan = $item['id_pesanan'];
        $jumlah = $item['quantity'];
        $total_harga = $item['totalPrice'];
        $catatan = $item['note'];

        // Pastikan untuk menggunakan prepared statement untuk keamanan
        $stmt = $conn->prepare("INSERT INTO keranjang (id_pesanan, jumlah, id_users, total_harga, catatan) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("iiids", $id_pesanan, $jumlah, $id_users, $total_harga, $catatan);

        if ($stmt->execute() !== TRUE) {
            echo json_encode(['success' => false, 'message' => 'Error: ' . $stmt->error]);
            exit;
        }
    }

    echo json_encode(['success' => true, 'message' => 'Pesanan berhasil dibuat!']);
} else {
    echo json_encode(['success' => false, 'message' => 'Data tidak valid']);
}

$conn->close();
?>
