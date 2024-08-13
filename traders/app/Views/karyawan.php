<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="row">
          <div class="col-12 col-md-6 order-md-1 order-last">
            <h3><?=$title?></h3>
             <h3>Halaman Data karyawan</h3>
            <p class="text-subtitle text-muted">Berikut ini adalah data karyawan <?=$title?></p>
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
          <a href="<?=base_url('home/t_kry')?>">
            <button class="btn btn-success">Tambah Data Karyawan</button>
          </a>
          <a href="<?=base_url('home/print_kry')?>">
            <button class="btn btn-danger" id="printButton">Print Data karyawan</button>
          </a>
        </div>
        <table class="table table-striped" id="table1">
          <thead>
                <tr>
                  <th>No</th>
                  <th>NIK</th>
                  <th>Nama </th>
                  <th>Alamat</th>
                  <th>email</th>
                  <th>no telepon</th>
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
                  <td><?= $flora->NIK ?></td>
                  <td><?= $flora->nama ?></td>
                  <td><?= $flora->alamat ?></td>
                  <td><?= $flora->email ?></td>
                  <td><?= $flora->no_hp ?></td>
               <td>
  <!-- Detail Button -->
  <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#detailModal" data-id="<?= $flora->id_kry ?>">Detail</button>


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

<div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        
        <h5 class="modal-title" id="detailModalLabel">Detail karyawan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <!-- User Details Form -->
        <form id="userDetailForm" action="<?= base_url('home/update_kry') ?>" method="POST">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="userDetailForm">
          <input type="hidden" id="user_id" name="user_id">
          <div class="form-group">




            <label for="NIK">NIK</label>
                <input type="text" class="form-control" id="NIK" name="NIK" value="<?= $flora->NIK?>" required>
          </div>
          <div class="form-group">
            <label for="nama">nama</label>
              <input type="text" class="form-control" id="nama" name="nama" value="<?= $flora->nama?>" required>
          </div>
          <div class="form-group">
            <label for="alamat"> alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $flora->alamat?>" required>
          </div>
          <div class="form-group">
            <label for="email"> email</label>
                <input type="text" class="form-control" id="email" name="email" value="<?= $flora->email?>" required>
          </div>
          <div class="form-group">
            <label for="no_hp"> nomor telepon</label>
                <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?= $flora->no_hp?>" required>
          </div>
         
       <div class="form-group d-inline-block">
  <div class="form-group d-inline-block ml-2">
  <a href="<?= base_url('home/update_kry/'.$flora->id_kry) ?>">
    <button type="button" class="btn btn-danger" id="deleteUserBtn">simpan</button>
  </a>
<div class="form-group d-inline-block ml-2">
  <a href="<?= base_url('home/delete_kry/'.$flora->id_kry) ?>">
    <button type="button" class="btn btn-danger" id="deleteUserBtn">Hapus</button>
  </a>
</div>

      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    $('#detailModal').on('show.bs.modal', function(event) {
      var button = $(event.relatedTarget);
      var userId = button.data('id_kry');

      $.ajax({
        url: '<?= base_url('home/update_kry') ?>',
        method: 'POST',
        data: { id: userId },
        dataType: 'json',
        success: function(data) {
          $('#user_id').val(data.id_kry);
          $('#NIK').val(data.NIK);
          $('#nama').val(data.nama);
          $('#alamat').val(data.alamat);
          $('#email').val(data.email);
          $('#no_hp').val(data.no_hp);
        }
      });
    });

    $('#userDetailForm').on('submit', function(event) {
      event.preventDefault();
      $.ajax({
        url: '<?= base_url('home/update_kry') ?>',
        method: 'POST',
        data: $(this).serialize(),
        dataType: 'json',
        success: function(response) {
          if (response.status === 'success') {
            alert(response.message);
            $('#detailModal').modal('hide');
            location.reload(); // Untuk reload halaman agar tabel terupdate
          } else {
            alert(response.message);
          }
        },
        error: function() {
          alert('Terjadi kesalahan saat memperbarui data.');
        }
      });
    });
  });
</script>
