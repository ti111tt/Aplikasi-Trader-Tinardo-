  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="row">
          <div class="col-12 col-md-6 order-md-1 order-last">
            <h3><?=$title?></h3>
             <h3>Halaman Data riwayat transaksi</h3>
            <p class="text-subtitle text-muted">Berikut ini adalah data riwayat transaksi <?=$title?></p>
          </div>
          <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
              <!-- Breadcrumb jika diperlukan -->
            </nav>
          </div>
        </div>
      </div>
    </div>

    <section class="section">
  <div class="card">
    <div class="card-body">
      <div class="table-responsive">
        <div class="form-group">
          
          <a href="<?=base_url('home/print_hstran')?>">
            <button class="btn btn-danger" id="printButton">Print Data riwayat transaksi</button>
          </a>
        </div>
        <table class="table table-striped" id="table1">
          <thead>
                <tr>
                                    <th>No</th>
                                    <th>Nomor Pesanan</th>
                                    <th>Nomor Surat</th>
                                    <th>Nama Barang</th>
                                    <th>Tanggal Surat</th>
                                    <th>Tanggal Pembelian</th>
                                    <th>Total Pembelian</th>
                                    <th>Waktu Transaksi</th>
                                    <th>Nama Pengirim</th>
                                    <th>Alamat Pengirim</th>
                                    <th>Nama Penerima</th>
                                    <th>Alamat Penerima</th>
                                    <th>Type</th>
                                    <th>Created at</th>
                                    <th>Updated at</th>
                                    <th>Deleted at</th>
                                    <th>Action</th>
  
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach($manda as $flora){
                ?>
                <tr>
                  <td><?= $no++ ?></td>
                                    <td><?php echo $flora->id_pesanan?></td>
                                    <td><?php echo $flora->no_surat?></td> 
                                    <td><?php echo $flora->nama_brg?></td>        
                                    <td><?php echo $flora->tgl_surat ?></td>
                                    <td><?php echo $flora->tgl_pembelian ?></td>
                                    <td><?php echo $flora->total_harga ?></td>
                                    <td><?php echo $flora->transaksi_time ?></td>
                                    <td><?php echo $flora->nama_pengirim ?></td>
                                    <td><?php echo $flora->alamat_pengirim ?></td>
                                    <td><?php echo $flora->nama_penerima?></td>
                                    <td><?php echo $flora->alamat_penerima ?></td>
                                    <td><?php echo $flora->type ?></td>
                                    <td><?php echo $flora->created_at ?></td>
                                    <td><?php echo $flora->updated_at ?></td>
                                    <td><?php echo $flora->deleted_at ?></td>
               <td>
  <!-- Detail Button -->
  <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#detailModal" data-id="<?= $flora->id_hstran ?>">Detail</button>
 

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

