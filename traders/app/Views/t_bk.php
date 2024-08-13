<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Data Barang keluar</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Tambah Data Barang keluar</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Forms</li>
          <li class="breadcrumb-item active">Tambah Barang keluar</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Tambah Data Barang keluar</h5>

              <!-- Horizontal Form -->
              <form action="<?= base_url('home/aksi_tbk') ?>" method="POST">
                <div class="row mb-3">


                  <label for="id_brg" class="col-sm-2 col-form-label">Kode Barang</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="id_brg" name="id_brg" placeholder="Masukkan kode barang" required>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="nama_brg" class="col-sm-2 col-form-label">Nama Barang</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_brg" name="nama_brg" placeholder="Masukkan nama barang" required>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="jumlah" class="col-sm-2 col-form-label">Jumlah</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Masukkan jumlah barang" required>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="tgl_klr" class="col-sm-2 col-form-label">Tanggal keluar</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" id="tgl_klr" name="tgl_klr" required>
                  </div>
                </div>

                
                <div class="text-center">
                  <button type="submit" class="btn btn-primary"  href="bk"> Simpan</button>
                  <button type="reset" class="btn btn-secondary" href="bk">Reset</button>
                </div>
              </form><!-- End Horizontal Form -->

            </div>
          </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
