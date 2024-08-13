<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="row">
          <div class="col-12 col-md-6 order-md-1 order-last">
            <h3><?=$title?></h3>
            <h3>Halaman Pengiriman</h3>
            <p class="text-subtitle text-muted">Berikut ini adalah data pengiriman <?=$title?></p>
          </div>
          <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
              <!-- Breadcrumb jika diperlukan -->
            </nav>
          </div>
        </div>
      </div>
    </div>

    <!-- Notification Section -->
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>Penting!</strong> Untuk pesanan yang belum lunas, diberikan waktu satu minggu untuk pelunasan. 
      Jika pembayaran tidak dilakukan dalam waktu tersebut, pesanan akan dibatalkan.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>

    <section class="section">
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <div class="form-group">
              <a href="<?=base_url('home/t_pengiriman')?>">
                <button class="btn btn-success">Tambah Data Pengiriman</button>
              </a>
             <a href="<?= base_url('home/print_pengiriman') ?>">
  <button class="btn btn-danger" id="printButton">Print Data Pengiriman</button>
</a>

            </div>
            <table class="table table-striped" id="table1">
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
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach($manda as $flora){
                ?>
                <tr>
                  <td><?= $no++ ?></td>
                   <td><?= $flora->nama_brg ?></td>
                   <td><?= $flora->Berat ?></td>
                  <td><?= $flora->Qty ?></td>
                  <td><?= $flora->alamat ?></td>
                  <td><?= $flora->tgl_pesan ?></td>
                  <td><?= $flora->tgl_kirim ?></td>
                  <td><?= $flora->status_pesanan ?></td>
                  <td><?= $flora->total_harga ?></td>
                  <td>
                    <!-- Tombol Hapus -->
                    <a href="<?= base_url('home/delete_pesanan/'.$flora->id_pesanan) ?>" onclick="return confirm('Anda yakin ingin menghapus data ini?');">
                      <button class="btn btn-danger">
                        <i class="fa fa-trash"></i>
                      </button>
                    </a>
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
