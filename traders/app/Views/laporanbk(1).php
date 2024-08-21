<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="row">
          <div class="col-12 col-md-6 order-md-1 order-last">
            <h3><?=$title?></h3>
            <h3>Berikut adalah halaman laporan barang keluar</h3>
            <p class="text-subtitle text-muted">Berikut ini adalah data laporan barang keluar <?=$title?></p>
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
 
        <div style="text-align: right;">
    <a href="<?=base_url('home/print_bk')?>">
        <button class="btn btn-danger" id="printButton">Print Data barang keluar</button>
    </a>

            <table class="table table-striped" id="table1">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Kode Barang</th>
                  <th>Nama Barang</th>
                  <th>Jumlah</th>
                  <th>Tanggal Keluar</th>
                 
                  <th>create at</th>
                  <th>Update at</th>
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
                    <td><?= $flora->id_brg ?></td>
                  <td><?= $flora->nama_brg ?></td>
                  <td><?= $flora->jumlah ?></td>
                  <td><?= $flora->tgl_klr ?></td>

                   <td><?= $flora->created_at ?></td>
                   <td><?= $flora->updated_at ?></td>
                   
                  

                  
                  <td>
                    <!-- Detail Button -->
                    <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#detailModal" data-id="<?= $flora->id_bk ?>">!</button>
                  
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

<!-- Detail Modal -->
<div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detailModalLabel">Detail Barang keluar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- User Details Form -->
        <form id="userDetailForm" action="<?= base_url('controller/update_bk') ?>" method="POST">
          <input type="hidden" id="id_bm" name="id_bm">
          <div class="form-group">
            <label for="id_brg">Kode Barang</label>
            <input type="text" class="form-control" id="id_brg" name="id_brg" value="<?= $flora->id_brg ?>" required disabled>  
          </div>
          <div class="form-group">
            <label for="nama_brg">Nama Barang</label>
            <input type="text" class="form-control" id="nama_brg" name="nama_brg" value="<?= $flora->nama_brg ?>" required disabled>  
          </div>
          <div class="form-group">
            <label for="jumlah">Jumlah</label>
            <input type="text" class="form-control" id="jumlah" name="jumlah" value="<?= $flora->jumlah ?>" required disabled>  
          </div>
          <div class="form-group">
            <label for="tgl_klr">Tanggal keluar</label>
            <input type="text" class="form-control" id="tgl_klr" name="tgl_klr" value="<?= $flora->tgl_klr ?>" required disabled> 
          </div>
        </form>
        <button type="button" class="btn btn-warning" id="printItemBtn" >Print</button>
      </div>
    </div>
  </div>
</div>


<script>
  $(document).ready(function() {
    $('#detailModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget);
      var userId = button.data('id_bk');
      
      // Fetch user details based on userId
      $.ajax({
        url: '<?= base_url('controller/get_barang_details') ?>',
        method: 'POST',
        data: { id: userId },
        dataType: 'json',
        success: function(data) {
          $('#id_brg').val(data.id);
          $('#nama_brg').val(data.nama_brg);
          $('#jumlah').val(data.jumlah);
          $('#tgl_klr').val(data.tgl_klr);
          
          // Disable form fields and button
          $('#userDetailForm input').attr('disabled', true);
          $('#printItemBtn').attr('disabled', true);
        }
      });
    });
  });
</script>
