<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Data users</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Tambah Data users</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Forms</li>
          <li class="breadcrumb-item active">Tambah data users</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    
              <!-- Horizontal Form -->
              <form action="<?= base_url('home/aksi_tu') ?>" method="POST">
                <div class="row mb-3">
                  <label for="nama_users" class="col-sm-2 col-form-label">Nama users</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_users" name="nama_users" placeholder="Masukkan nama users" required>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="email" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email" required>
                  </div>
                </div>

                 <div class="row mb-3">
                  <label for="pw" class="col-sm-2 col-form-label">Password</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password" required>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="no_telp" class="col-sm-2 col-form-label">Nomor Telepon</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="Masukkan nomor telepon" required>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="id_level" class="col-sm-2 col-form-label">Jabatan</label>
                  <div class="col-sm-10">
                    <select class="form-control" id="id_level" name="id_level" required>
                      <option value="">Pilih Jabatan</option>
                      <?php foreach ($levels as $level): ?>
                        <option value="<?= $level->id_level ?>"><?= $level->nama_level ?></option>
                      <?php endforeach; ?>
                    </select>
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
