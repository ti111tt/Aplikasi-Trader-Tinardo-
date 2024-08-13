<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="row">
          <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Data Pengiriman</h3>
            <p class="text-subtitle text-muted">Berikut ini adalah data pengiriman dengan status: <?= $status ?></p>
          </div>
        </div>
      </div>
    </div>

    <section class="section">
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped">
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
                <?php foreach($hs_pengiriman as $item): ?>
                <tr>
                  <td><?= $item->id_pesanan ?></td>
                  <td><?= $item->nama_brg ?></td>
                  <td><?= $item->berat ?></td>
                  <td><?= $item->Qty ?></td>
                  <td><?= $item->alamat ?></td>
                  <td><?= $item->tgl_pesan ?></td>
                  <td><?= $item->tgl_kirim ?></td>
                  <td><?= $item->status_pesanan ?></td>
                  <td><?= $item->total_harga ?></td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>
