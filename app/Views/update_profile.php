<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin">
        <h3>Update Profile</h3>
        <p class="text-subtitle text-muted">Perbarui informasi profil Anda di sini</p>
        <div class="card">
          <div class="card-body">
            <form action="<?= base_url('home/update_profile') ?>" method="POST">
              <input type="hidden" name="user_id" value="<?= $user->id_users ?>">
              <div class="form-group">
                <label for="nama_users">Nama</label>
                <input type="text" class="form-control" id="nama_users" name="nama_users" value="<?= $user->nama_users ?>" required>
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= $user->email ?>" required>
              </div>
              <div class="form-group">
                <label for="no_telp">Nomor Telepon</label>
                <input type="text" class="form-control" id="no_telp" name="no_telp" value="<?= $user->no_telp ?>" required>
              </div>
              <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success">
        <?= $this->session->flashdata('success'); ?>
    </div>
<?php elseif ($this->session->flashdata('error')): ?>
    <div class="alert alert-danger">
        <?= $this->session->flashdata('error'); ?>
    </div>
<?php endif; ?>
