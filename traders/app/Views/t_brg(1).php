<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Barang</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <style>
    /* Tambahkan gaya CSS yang sesuai di sini */
  </style>
</head>
<body>
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-12 grid-margin">
          <h3>Daftar Barang Jual</h3>
          <button class="btn btn-primary mb-3" onclick="showAddProductModal()">Tambah Barang Jual</button>
          <section class="section">
            <div class="card">
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped" id="table1">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Gambar Barang</th>
                        <th>Nama Barang</th>
                        <th>Kode Barang</th>
                        <th>Harga Satuan</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no = 1;
                      foreach ($barang as $item) {
                      ?>
                      <tr>
                        <td><?= $no++ ?></td>
                        <td><img src="<?= base_url('images/' . $item->foto) ?>" alt="Gambar <?= $item->nama_brg ?>" class="img-large"></td>
                        <td><?= $item->nama_brg ?></td>
                        <td><?= $item->kode_brg ?></td>
                        <td><?= number_format($item->harga, 2, ',', '.') ?></td>
                        <td><?= $item->stok ?></td>
                        <td>
                          <button class="btn btn-primary" onclick="showEditProductModal(<?= $item->id_brg ?>)">
                            <i class="fas fa-edit"></i>
                          </button>
                          <button class="btn btn-danger" onclick="deleteProduct(<?= $item->id_brg ?>)">
                            <i class="fas fa-trash"></i>
                          </button>
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
    </div>
  </div>

  <script>
  function showAddProductModal() {
    document.getElementById('addProductModal').style.display = 'block';
  }

  function closeAddProductModal() {
    document.getElementById('addProductModal').style.display = 'none';
  }

  function deleteProduct(id) {
    if (confirm('Apakah Anda yakin ingin menghapus barang ini?')) {
      window.location.href = '<?= base_url('Home/delete_barang') ?>/' + id;
    }
  }
  </script>
</body>
</html>
