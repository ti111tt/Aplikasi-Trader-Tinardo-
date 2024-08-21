<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Data Kirim</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Tambah Data Kirim</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
          <li class="breadcrumb-item">Forms</li>
          <li class="breadcrumb-item active">Tambah Data Kirim</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <!-- Horizontal Form -->
    <form action="<?= base_url('home/aksi_tpengiriman') ?>" method="POST">
      <div class="row mb-3">
        <label for="nama_brg" class="col-sm-2 col-form-label">Nama Produk</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="nama_brg" name="nama_brg" placeholder="Masukkan nama produk" required>
        </div>
      </div>

      <div class="row mb-3">
        <label for="berat" class="col-sm-2 col-form-label">Berat</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="berat" name="berat" placeholder="Masukkan jumlah berat" required>
        </div>
      </div>

      <div class="row mb-3">
        <label for="Qty" class="col-sm-2 col-form-label">Qty</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="Qty" name="Qty" required>
        </div>
      </div>

      <div class="row mb-3">
        <label for="alamat" class="col-sm-2 col-form-label">Alamat Tujuan</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="alamat" name="alamat" required>
        </div>
      </div>

      <div class="row mb-3">
        <label for="tgl_pesan" class="col-sm-2 col-form-label">Tanggal Pemesanan</label>
        <div class="col-sm-10">
          <input type="date" class="form-control" id="tgl_pesan" name="tgl_pesan" placeholder="Masukkan tanggal pesan" required>
        </div>
      </div>

      <div class="row mb-3">
        <label for="tgl_kirim" class="col-sm-2 col-form-label">Tanggal Kirim</label>
        <div class="col-sm-10">
          <input type="date" class="form-control" id="tgl_kirim" name="tgl_kirim" placeholder="Masukkan tanggal kirim" required>
        </div>
      </div>

      <div class="row mb-3">
        <label for="status_pesanan" class="col-sm-2 col-form-label">Status Pesanan</label>
        <div class="col-sm-10">
          <select class="form-control" id="status_pesanan" name="status_pesanan" required>
            <option value="">Pilih Status Pesanan</option>
            <option value="lunas">Lunas</option>
            <option value="belum_lunas">Belum Lunas</option>
          </select>
        </div>
      </div>

      <div class="row mb-3">
        <label for="total_harga" class="col-sm-2 col-form-label">Total Pembayaran</label>
        <div class="col-sm-10">
          <input type="number" class="form-control" id="total_harga" name="total_harga" placeholder="Masukkan total harga pembayaran" required>
        </div>
      </div>

      <div class="text-center">
        <button type="submit" class="btn btn-primary">Simpan</button>
        <button type="reset" class="btn btn-secondary">Reset</button>
      </div>
    </form><!-- End Horizontal Form -->

  </main><!-- End #main -->

  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
