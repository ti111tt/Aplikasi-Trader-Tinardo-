

<div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detailModalLabel">Detail barang masuk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="userDetailForm">
          <input type="hidden" id="user_id" name="user_id">
          <div class="form-group">



            <label for="id_brg">kode barang</label>
            <input type="text" class="form-control" id="id_brg" name="id_brg" required>
          </div>
          <div class="form-group">
            <label for="nama_brg">nama barang</label>
            <input type="text" class="form-control" id="nama_brg" name="nama_brg" required>
          </div>
          <div class="form-group">
            <label for="jumlah"> jumlah </label>
            <input type="text" class="form-control" id="jumlah" name="jumlah" required>
          </div>
           <div class="form-group">
            <label for="tglmsk"> tanggal masuk</label>
            <input type="text" class="form-control" id="tglmsk" name="tglmsk" required>
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
      var userId = button.data('id_bm');

      $.ajax({
        url: '<?= base_url('home/aksi_update_bm') ?>',
        method: 'POST',
        data: { id: userId },
        dataType: 'json',
        success: function(data) {
          $('#user_id').val(data.id_bm);
          $('#id_brg').val(data.id_brg);
          $('#nama_brg').val(data.nama_brg);
          $('#jumlah').val(data.jumlah);
          $('#tglmsk').val(data.tglmsk);
        }
      });
    });

    $('#userDetailForm').on('submit', function(event) {
      event.preventDefault();
      $.ajax({
        url: '<?= base_url('home/aksi_update_bm') ?>',
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
