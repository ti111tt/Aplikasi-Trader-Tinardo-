<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
         <div class="navbar-brand">
           <a class="navbar-brand brand-logo" href="index.html">
             <div class="sidebar-header">
                  <img src="<?php echo base_url('images/pt.jpg') ?>" alt="logo">
                <div style="font-size: 20px; color: #333; font-weight: bold;">
                  <?= $setting->nama_toko ?>
                </div>
             </div>
          </a>
          <!-- Display Caption Below Logo -->
          <?php if (!empty($flora->caption)): ?>
            <div class="navbar-caption">
              <p><?= htmlspecialchars($flora->caption) ?></p>
            </div>
          <?php endif; ?>
        </div>
        <a class="navbar-brand brand-logo-mini" href="index.html"></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item nav-search d-none d-lg-block">
            <div class="input-group">
              <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                <span class="input-group-text" id="search">
                  <i class="icon-search"></i>
                </span>
              </div>
              <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now" aria-label="search" aria-describedby="search">
            </div>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="icon-bell mx-0"></i>
              <span class="count"></span>
            </a>
          <!-- Dropdown Notifikasi -->
<div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
    <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
    <a class="dropdown-item preview-item">
        <div class="preview-thumbnail">
            <div class="preview-icon bg-success">
                <i class="ti-info-alt mx-0"></i>
            </div>
        </div>
        <div class="preview-item-content">
            <h6 class="preview-subject font-weight-normal">Application Error</h6>
            <p class="font-weight-light small-text mb-0 text-muted">Just now</p>
        </div>
    </a>
    <a class="dropdown-item preview-item">
        <div class="preview-thumbnail">
            <div class="preview-icon bg-warning">
                <i class="ti-settings mx-0"></i>
            </div>
        </div>
        <div class="preview-item-content">
            <h6 class="preview-subject font-weight-normal">Settings</h6>
            <p class="font-weight-light small-text mb-0 text-muted">Private message</p>
        </div>
    </a>
    <a class="dropdown-item preview-item">
        <div class="preview-thumbnail">
            <div class="preview-icon bg-info">
                <i class="ti-user mx-0"></i>
            </div>
        </div>
        <div class="preview-item-content">
            <h6 class="preview-subject font-weight-normal">New user registration</h6>
            <p class="font-weight-light small-text mb-0 text-muted">2 days ago</p>
        </div>
    </a>
    <!-- Tombol Log Out -->
    <a class="dropdown-item preview-item" href="logout">
        <div class="preview-thumbnail">
            <div class="preview-icon bg-danger">
                <i class="ti-power-off mx-0"></i>
            </div>
        </div>
        <div class="preview-item-content">
            <h6 class="preview-subject font-weight-normal">Log Out</h6>
            <p class="font-weight-light small-text mb-0 text-muted">Click to log out</p>
        </div>
    </a>
</div>

<!-- Dropdown Profil -->
<li class="nav-item nav-profile dropdown">
    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
        <img src="images/faces/face28.jpg" alt="profile"/>
    </a>
    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
        <a class="nav-link" href="update_profile" aria-controls="ui-basic"> updatee profile </a>
    </div>
</li>

          </li>
          <li class="nav-item nav-settings d-none d-lg-flex">
            <a class="nav-link" href="#">
              <i class="icon-ellipsis"></i>
            </a>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>
      <div id="right-sidebar" class="settings-panel">
        <i class="settings-close ti-close"></i>
        <ul class="nav nav-tabs border-top" id="setting-panel" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="chats-tab" data-toggle="tab" href="#chats-section" role="tab" aria-controls="chats-section">CHATS</a>
          </li>
        </ul>
        <div class="tab-content" id="setting-content">
          <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel" aria-labelledby="todo-section">
            <div class="add-items d-flex px-3 mb-0">
              <form class="form w-100">
                <div class="form-group d-flex">
                  <input type="text" class="form-control todo-list-input" placeholder="tambah note :">
                  <button type="submit" class="add btn btn-primary todo-list-add-btn" id="add-task">Add</button>
                </div>
              </form>
            </div>
            <div class="list-wrapper px-3">
              <ul class="d-flex flex-column-reverse todo-list">
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Meeting jam 2
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                     cek transaksi
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                     bimbingan pkl
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
               
                
              </ul>
            </div>
            <h4 class="px-3 text-muted mt-5 font-weight-light mb-0">Events</h4>
            <div class="events pt-4 px-3">
              <div class="wrapper d-flex mb-2">
                <i class="ti-control-record text-primary mr-2"></i>
                <span>Feb 11 2018</span>
              </div>
              <p class="mb-0 font-weight-thin text-gray">tambah codingan</p>
             
            </div>
            <div class="events pt-4 px-3">
              <div class="wrapper d-flex mb-2">
                <i class="ti-control-record text-primary mr-2"></i>
                <span>Feb 7 2018</span>
              </div>
              <p class="mb-0 font-weight-thin text-gray">Meeting dgn pak bos</p>
                        </div>
          </div>
          <!-- To do section tab ends -->
          <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
            <div class="d-flex align-items-center justify-content-between border-bottom">
              <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
              <small class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 font-weight-normal">See All</small>
            </div>
            <ul class="chat-list">
              <li class="list active">
                <div class="profile"><img src="images/faces/face1.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Thomas Douglas</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">19 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face2.jpg" alt="image"><span class="offline"></span></div>
                <div class="info">
                  <div class="wrapper d-flex">
                    <p>Catherine</p>
                  </div>
                  <p>Away</p>
                </div>
                <div class="badge badge-success badge-pill my-auto mx-2">4</div>
                <small class="text-muted my-auto">23 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face3.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Daniel Russell</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">14 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face4.jpg" alt="image"><span class="offline"></span></div>
                <div class="info">
                  <p>James Richardson</p>
                  <p>Away</p>
                </div>
                <small class="text-muted my-auto">2 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face5.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Madeline Kennedy</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">5 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face6.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Sarah Graves</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">47 min</small>
              </li>
            </ul>
          </div>
          <!-- chat tab ends -->
        </div>
      </div>
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      
<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="dashboard">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
  <?php
        if(session()->get('level')==1){
          ?>
               <li class="nav-item">
  <a class="nav-link" href="users" aria-controls="ui-basic">
    <i class="fas fa-users menu-icon"></i>
    <span class="menu-title">Data users</span>
    </a>
</li>
<?php } ?>


  <?php
        if(session()->get('level')==1){
          ?>
          <li class="nav-item">
  <a class="nav-link" href="karyawan" aria-controls="ui-basic">
    <i class="fas fa-user-tie menu-icon"></i>
    <span class="menu-title">Data karyawan</span>
    </a>
</li>
<?php } ?>
 


 <?php
          if(session()->get('level')==2 || session()->get('level') == 2){
            ?>
<li class="nav-item">
  <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
    <i class="fas fa-box menu-icon"></i>
    <span class="menu-title">Data barang</span>
  </a>
</li>

            </a>
            </li>
            <div class="collapse" id="charts">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="bm">Data Barang Masuk</a></li>
              </ul>
            </div>
            <div class="collapse" id="charts">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="bk"> Data Barang Keluar</a></li>
              </ul>
            </div>
          </li>

<?php } ?>


  
<?php
        if(session()->get('level')==1){
          ?>
            <li class="nav-item">
  <a class="nav-link" href="pt" aria-controls="ui-basic">
    <i class="fas fa-building menu-icon"></i>
    <span class="menu-title">Data Perusahaan</span>
    
  </a>
</li>
  <?php } ?>

  <?php
        if(session()->get('level')==5){
          ?>
            <li class="nav-item">
  <a class="nav-link" href="barang" aria-controls="ui-basic">
    <i class="fas fa-building menu-icon"></i>
    <span class="menu-title">Order Barang</span>
    
  </a>
</li>
  <?php } ?>

  <!-- <?php
        if(session()->get('level')==5){
          ?>
            <li class="nav-item">
  <a class="nav-link" href="transaksi" aria-controls="ui-basic">
    <i class="fas fa-building menu-icon"></i>
    <span class="menu-title">Transaksi</span>
    
  </a>
</li>
  <?php } ?>
 -->
  <?php
        if(session()->get('level')==5){ //khusus pembeli
          ?>
            <li class="nav-item">
  <a class="nav-link" href="historypesanan" aria-controls="ui-basic">
    <i class="fas fa-building menu-icon"></i>
    <span class="menu-title">History</span>
    
  </a>
</li>
  <?php } ?>

  <?php
        if(session()->get('level')==1  ){
          ?>
<li class="nav-item">
  <a class="nav-link" data-toggle="collapse" href="#reports" aria-expanded="false" aria-controls="reports">
    <i class="fas fa-file-alt menu-icon"></i>
    <span class="menu-title">Laporan</span>
    <i class="menu-arrow"></i>
  </a>
  <div class="collapse" id="reports">
    <ul class="nav flex-column sub-menu">
      <li class="nav-item">
        <a class="nav-link" href="laporantransaksi">
          Transaksi Pembayaran
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="laporanbm">
          Barang Masuk
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="laporanbk">
          Barang Keluar
        </a>
      </li>
    </ul>
  </div>
</li>
 <?php } ?>


  <?php
        if(session()->get('level')==1){ //khusus admin
          ?>           <!-- Dropdown Menu untuk Laporan -->
</li><li class="nav-item">
  <a class="nav-link" data-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
    <i class="fas fa-history menu-icon"></i>
    <span class="menu-title">History</span>
    <i class="menu-arrow"></i>
  </a>
</li>
</a>
<?php } ?>

<div class="collapse" id="icons">
  <ul class="nav flex-column sub-menu">
    <li class="nav-item">
      <a class="nav-link" href="hstran">
        <i class="fas fa-credit-card"></i> Transaksi
      </a>
    </li>
  </ul>
</div>



           <div class="collapse" id="icons">
  <ul class="nav flex-column sub-menu">
    <li class="nav-item">
      <a class="nav-link" href="/hslogin">
    <i class="fas fa-sign-in-alt"></i> Login
</a>

    </li>
  </ul>
</div>

<!-- <?php
        if(session()->get('level')==1){
          ?>
       <li class="nav-item">
  <a class="nav-link" data-toggle="collapse" href="laporantransaksi" aria-expanded="false" aria-controls="auth">
    <i class="fas fa-money-bill-wave menu-icon"></i>
    <span class="menu-title">Transaksi</span>
  </a>
</li>
<?php } ?>
 -->


<?php
        if(session()->get('level')==1){
          ?> 
          <li class="nav-item">
  <a class="nav-link" href="historypesanan" aria-controls="ui-basic">
    <i class="fas fa-user-tie menu-icon"></i>
    <span class="menu-title"> Pesanan Customer </span>
    </a>
</li>
<?php } ?>



<?php
        if(session()->get('level')==2){
          ?>
       <li class="nav-item">
  <a class="nav-link" href="<?= base_url('home/pengiriman') ?>">
    <i class="fas fa-shipping-fast menu-icon"></i>
    <span class="menu-title">Pengiriman</span>
  </a>
</li>

<?php } ?>

<?php
        if(session()->get('level')==2){
          ?>
       <li class="nav-item">
  <a class="nav-link" href="<?= base_url('home/jadwal') ?>">
    <i class="fas fa-shipping-fast menu-icon"></i>
    <span class="menu-title">jadwal</span>
  </a>
</li>

<?php } ?>


 <?php
        if(session()->get('level')==1 || session()->get('level') == 2){
          ?>
            <li class="nav-item">
  <a class="nav-link" href="barang" aria-controls="ui-basic">
    <i class="fas fa-tag menu-icon"></i>
    <span class="menu-title">Barang Jual</span>
    
  </a>
</li>
  <?php } ?>



<?php
        if(session()->get('level')==2){ //khusus KP
          ?>
            <li class="nav-item">
  <a class="nav-link" href="hspengiriman" aria-controls="ui-basic">
    <i class="fas fa-building menu-icon"></i>
    <span class="menu-title">History</span>
    
  </a>
</li>
  <?php } ?>





            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                
                

                </ul>
            </div>
          </li>
                    </li>
        </ul>
      </nav>