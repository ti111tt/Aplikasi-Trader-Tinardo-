<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Data Karyawan</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .main {
      padding: 20px;
    }
   
    .breadcrumb {
      background-color: #e9ecef;
    }
    .card-title {
      color: #007bff;
    }
    .btn-primary {
      background-color: #007bff;
      border-color: #007bff;
    }
    .btn-secondary {
      background-color: #6c757d;
      border-color: #6c757d;
    }
    .form-control {
      border-radius: 0.25rem;
    }
    .form-label {
      font-weight: bold;
    }
  </style>
</head>
<body>
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Tambah Data Karyawan</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Forms</li>
          <li class="breadcrumb-item active">Tambah Data Karyawan</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Tambah Data Karyawan</h5>

              <!-- Horizontal Form -->
              <form action="<?= base_url('home/aksi_tkry') ?>" method="POST">
                <div class="form-group row mb-3">
                  <label for="NIK" class="col-sm-2 col-form-label">NIK</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="NIK" name="NIK" placeholder="Masukkan kode NIK" required>
                  </div>
                </div>

                <div class="form-group row mb-3">
                  <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama" required>
                  </div>
                </div>

                <div class="form-group row mb-3">
                  <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan alamat" required>
                  </div>
                </div>

                <div class="form-group row mb-3">
                  <label for="email" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email" required>
                  </div>
                </div>

                <div class="form-group row mb-3">
                  <label for="no_hp" class="col-sm-2 col-form-label">Nomor Telepon</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Masukkan nomor telepon" required>
                  </div>
                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
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
