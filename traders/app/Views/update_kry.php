

<div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detailModalLabel">Detail karyawan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="userDetailForm">
          <input type="hidden" id="user_id" name="user_id">
          <div class="form-group">



            <label for="NIK">NIK</label>
            <input type="text" class="form-control" id="NIK" name="NIK" required>
          </div>
          <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
          </div>
          <div class="form-group">
            <label for="alamat"> alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" required>
          </div>
           <div class="form-group">
            <label for="email"> email</label>
            <input type="text" class="form-control" id="email" name="email" required>
          </div>
           <div class="form-group">
            <label for="no_hp"> no telepon</label>
            <input type="text" class="form-control" id="no_hp" name="no_hp" required>
          </div>
        
          </div>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
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
        url: '<?= base_url('home/aksi_update_kry') ?>',
        method: 'POST',
        data: { id: userId },
        dataType: 'json',
        success: function(data) {
          $('#user_id').val(data.id_kry);
          $('#nama').val(data.nama);
          $('#alamat').val(data.email);
          $('#email').val(data.email);
          $('#no_hp').val(data.no_hp);
        }
      });
    });

    $('#userDetailForm').on('submit', function(event) {
      event.preventDefault();
      $.ajax({
        url: '<?= base_url('home/aksi_update_kry') ?>',
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
