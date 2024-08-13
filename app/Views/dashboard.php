<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skydash Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/pt.jpg" />
</head>

      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Welcome! <?= session()->get('id_level')?></h3>
                  <h6 class="font-weight-normal mb-0"> <span class="text-primary"></span></h6>
                </div>
                <div class="col-12 col-xl-4">
                 <div class="justify-content-end d-flex">
                  <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                    <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                     <i class="mdi mdi-calendar"></i> Today (10 Jan 2021)
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                      <a class="dropdown-item" href="#">January - March</a>
                      <a class="dropdown-item" href="#">March - June</a>
                      <a class="dropdown-item" href="#">June - August</a>
                      <a class="dropdown-item" href="#">August - November</a>
                    </div>
                  </div>
                 </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
  <div class="row">
  <!-- Bagian foto/logo -->
  <div class="col-md-6 mb-4">
    <div class="card tale-bg">
      <div class="card-people mt-auto">
        <img src="<?php echo base_url('images/pt1.jpg') ?>" alt="logo" style="width: 100%; height: auto;">
        <div class="weather-info">
          <div class="d-flex">
            <!-- Konten tambahan bisa ditambahkan di sini jika diperlukan -->
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bagian tentang perusahaan -->
  <div class="col-md-6 mb-4 stretch-card transparent">
    <div class="card">
      <div class="card-body">
        <p class="card-title">Tentang Perusahaan</p>
        <p class="font-weight-500">PT Mitra Dagang Utama adalah perusahaan yang bergerak di bidang distribusi dan penjualan bahan-bahan pokok atau sembako. Berdiri sejak tahun 2012, perusahaan ini telah menjadi salah satu pemain utama dalam industri distribusi sembako di Indonesia.</p>
        <div class="d-flex flex-wrap mb-5">
          <div class="mr-5 mt-3">
            <p class="text-muted">Customer</p>
            <h3 class="text-primary fs-30 font-weight-medium">12.3k</h3>
          </div>
          <div class="mr-5 mt-3">
            <p class="text-muted">Orderan</p>
            <h3 class="text-primary fs-30 font-weight-medium">14k</h3>
          </div>
          <div class="mr-5 mt-3">
            <p class="text-muted">Rating</p>
            <h3 class="text-primary fs-30 font-weight-medium">71.56%</h3>
          </div>
        </div>
        <canvas id="order-chart"></canvas>
      </div>
    </div>
  </div>
</div>


<!-- Pemasukan dan Pengeluaran Stok Barang di bawah foto/logo -->
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between">
          <p class="card-title">Pemasukan dan Pengeluaran Stok Barang</p>
          <a href="#" class="text-info">View all</a>
        </div>
        <p class="font-weight-500">Sejauh ini persentase peningkatan barang berpihak pada barang masuk karena peningkatan barang masuk berkembang pesat pada tahun ini.</p>
        <div id="sales-legend" class="chartjs-legend mt-4 mb-2"></div>
        <canvas id="sales-chart"></canvas>
      </div>
    </div>
  </div>
</div>

            
                 
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="js/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <script src="js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->
</body>

</html>

