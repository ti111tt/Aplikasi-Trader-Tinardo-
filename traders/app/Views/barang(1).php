<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product Table</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <style>
    .img-large {
      width: 150px;
      height: auto;
      display: block;
      margin: 0 auto;
    }
    .table-responsive {
      padding: 20px;
    }
    .table-striped {
      width: 100%;
      font-size: 1.1em;
    }
    .table-striped th, .table-striped td {
      padding: 15px;
      text-align: center;
      vertical-align: middle;
    }
    .table-striped th {
      background-color: #f2f2f2;
    }
    .quantity-buttons {
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .quantity-buttons button {
      margin: 0 5px;
      padding: 5px 10px;
    }
    .modal {
      display: none;
      position: fixed;
      z-index: 1;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgba(0, 0, 0, 0.6);
    }
    .modal-content {
      background-color: #fefefe;
      margin: 5% auto;
      padding: 20px;
      border: 1px solid #888;
      width: 50%;
      max-width: 800px;
      border-radius: 8px;
    }
    .close {
      color: #aaa;
      float: right;
      font-size: 28px;
      font-weight: bold;
    }
    .close:hover,
    .close:focus {
      color: black;
      text-decoration: none;
      cursor: pointer;
    }
    .form-group {
      margin-bottom: 15px;
    }
    .form-control {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }
    .total-row {
      font-weight: bold;
    }
    .payment-methods img {
      width: 60px;
      height: auto;
      margin: 0 5px;
    }
    .order-summary {
      width: 100%;
      margin: 20px auto;
    }
    .order-summary table {
      width: 100%;
    }
    .order-summary thead th,
    .order-summary tbody td {
      text-align: left;
    }
  </style>
</head>
<body>
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-12 grid-margin">
          <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
              <h3><?=$title?></h3>
              <h3>Selamat datang! Silahkan memilih pilihan anda ;></h3>
              <p class="text-subtitle text-muted">Berikut ini adalah produk-produknya. <?=$title?></p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
              <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <!-- Breadcrumb jika diperlukan -->
              </nav>
            </div>
          </div>
        </div>
      </div>
       <?php
          if(session()->get('level')==1 || session()->get('level') == 2){
            ?>
  <button class="btn btn-primary mb-3" onclick="showAddProductModal()">Tambah Barang Jual</button>
          <?php } ?>   <!-- Modal for adding new product -->
<div id="addProductModal" class="modal">
  <div class="modal-content">
    <span class="close" onclick="closeAddProductModal()">&times;</span>
    <h3>Tambah Barang Baru</h3>
    <form id="addProductForm" action="<?= base_url('Home/aksi_tambah_barang')?>" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="productName">Nama Barang:</label>
        <input type="text" id="productName" name="productName" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="productCode">Kode Barang:</label>
        <input type="text" id="productCode" name="productCode" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="productPrice">Harga Satuan:</label>
        <input type="number" id="productPrice" name="productPrice" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="productStock">Stok:</label>
        <input type="number" id="productStock" name="productStock" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="productImage">Gambar Barang:</label>
        <input type="file" id="productImage" name="productImage" class="form-control">
      </div>
      
      <button type="submit" class="btn btn-primary">Tambah Barang</button>
      <button type="button" class="btn btn-secondary" onclick="closeAddProductModal()">Batal</button>
    </form>
  </div>
</div>

      <section class="section">
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped" id="table1">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Gambar Barang</th>
                    <th>Nama Barang</th>
                    <th>Kode Barang</th>
                    <th>Harga Satuan</th>
                    <th>Stok</th>
 <?php
        if(session()->get('level')==5  ){
          ?>
                    <th>Aksi</th>
                    <?php } ?>
                  </tr>
                </thead>
                <tbody>
  <?php
  $no = 1;
  foreach($manda as $flora) {
  ?>
  <tr data-id="<?= $flora->id_brg ?>" data-price="<?= $flora->harga ?>" data-stock="<?= $flora->stok ?>">
    <td><?= $no++ ?></td>
    <td>
      <img src="<?= base_url('images/' . $flora->foto) ?>" alt="Gambar <?= $flora->id_brg ?>" class="img-large">
    </td>
    <td><?= $flora->nama_brg ?></td>
    <td><?= $flora->kode_brg ?></td>
    <td><?= $flora->harga ?></td>
    <td><?= $flora->stok ?></td>
    <?php
        if(session()->get('level')==5  ){
          ?>
               
    <td>
      <button class="btn btn-primary" onclick="showModal(<?= $flora->id_brg ?>, '<?= $flora->harga ?>')">
        <i class="fas fa-shopping-cart"></i>
      </button>
          </td>
          <?php } ?>
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

      <!-- Modal for adding to cart -->
      <div id="addToCartModal" class="modal">
        <div class="modal-content">
          <span class="close" onclick="closeModal()">&times;</span>
          <h3>Tambah ke Keranjang</h3>
          <form id="addToCartForm" action="<?= base_url('Home/aksi_keran')?>" method="post">
            <input type="hidden" id="item_id" name="item_id">
            <input type="hidden" id="item_name" name="item_name">
            <div class="form-group">
              <label for="quantity">Jumlah:</label>
              <input type="number" id="quantity" name="quantity" class="form-control" required min="1">
            </div>
            <div class="form-group">
              <label for="note">Catatan:</label>
              <input type="text" id="note" name="note" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Tambah ke Keranjang</button>
            <button type="button" class="btn btn-secondary" onclick="closeModal()">Batal</button>
          </form>
        </div>
      </div>



       <?php
        if(session()->get('level')==5  ){
          ?>
<!-- Order List Table -->
      <section class="section">
        <div class="card">
          <div class="card-body">
           
            <div class="table-responsive">
              <table class="table table-striped" id="orderTable">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Total Harga</th>
                    <th>Catatan</th>
                  </tr>
                </thead>
                <tbody id="orderBody">
                  <?php
                  $no = 1;
                  foreach($jol as $flora) {
                    $totalAmount += $flora->total_harga;
                  ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $flora->nama_brg ?></td>
                    <td><?= $flora->jumlah ?></td>
                    <td><?= number_format($flora->total_harga, 2, ',', '.') ?></td>
                    <td><?= $flora->catatan ?></td>
                  </tr>
                  <?php
                  }
                  ?>
                </tbody>
                <tfoot>
                  <tr class="total-row">
                    <td colspan="3">Total:</td>
                    <td id="totalAmount"><?= number_format($totalAmount, 2, ',', '.') ?></td>
                    <td></td>
                  </tr>
                </tfoot>
              </table>
              <button class="btn btn-success" onclick="showOrderSummary()">Pesan Sekarang</button>
            </div>
          </div>
        </div>
      </section>

      <!-- Order Summary Modal -->
      <div id="orderSummaryModal" class="modal">
        <div class="modal-content">
          <span class="close" onclick="closeOrderSummaryModal()">&times;</span>
          <h3>Pesan Sekarang</h3>
          <div class="order-summary">
            <h4>Daftar Pesanan</h4>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Barang</th>
                  <th>Jumlah</th>
                  <th>Total Harga</th>
                  <th>Catatan</th>
                </tr>
              </thead>
              <tbody id="orderSummaryBody">
                <!-- Order rows will be added here dynamically -->
              </tbody>
              <tfoot>
                <tr class="total-row">
                  <td colspan="3">Total:</td>
                  <td id="orderSummaryTotal">0</td>
                  <td></td>
                </tr>
              </tfoot>
            </table>
            <div class="form-group">
              <form id="addToCartForm" action="<?= base_url('Home/aksi_hs')?>" method="post">
              <label for="paymentMethod">Metode Pembayaran:</label>
              <div class="payment-methods">
                <label><input type="radio" name="metode" value="Dana" required> Dana</label>
                <label><input type="radio" name="metode" value="ShopeePay"> Shopeepay</label>
                <label><input type="radio" name="metode" value="QRIS"> QRIS</label>
                <label><input type="radio" name="metode" value="BCA"> BCA</label>
                <label><input type="radio" name="metode" value="GoPay"> Gopay</label>
                     <label><input type="radio" name="metode" value="GoPay"> Cash (khusus pick up)</label>
              </div>
            </div>
            <div class="form-group">
              <label for="shippingAddress">Alamat Pengiriman:</label>
              <textarea id="shippingAddress" name="alamat" class="form-control" rows="4" required></textarea>
            </div>
           
            <button type="submit" class="btn btn-primary" onclick="submitOrder()">Kirim Pesanan</button>
            <button type="button" class="btn btn-secondary" onclick="closeOrderSummaryModal()">Batal</button>
            </form>
          </div>
        </div>
      </div>

    </div>
  </div>
<?php } ?>
  <script>
  const orderBody = document.getElementById('orderBody');
  const totalAmountElem = document.getElementById('totalAmount');
  let totalAmount = 0;

  function showModal(id, name) {
  const row = document.querySelector(`#table1 tr[data-id="${id}"]`);
  const stock = parseInt(row.getAttribute('data-stock'), 10);

  if (stock === 0) {
    alert('Stok telah habis');
    return; // Tidak menampilkan modal jika stok 0
  }

  document.getElementById('item_id').value = id;
  document.getElementById('item_name').value = name;
  document.getElementById('addToCartModal').style.display = 'block';
}


  function closeModal() {
    document.getElementById('addToCartModal').style.display = 'none';
  }

  function addToCart(event) {
    event.preventDefault();
    const id = document.getElementById('item_id').value;
    const name = document.getElementById('item_name').value;
    const quantity = document.getElementById('quantity').value;
    const note = document.getElementById('note').value;
    const row = document.querySelector(`#table1 tr[data-id="${id}"]`);
    const price = parseFloat(row.getAttribute('data-price'));
    const totalPrice = price * quantity;

    const newRow = document.createElement('tr');
    newRow.innerHTML = `
      <td>${orderBody.children.length + 1}</td>
      <td>${name}</td>
      <td>${quantity}</td>
      <td>${formatCurrency(totalPrice)}</td>
      <td>${note}</td>
    `;
    orderBody.appendChild(newRow);

    totalAmount += totalPrice;
    totalAmountElem.innerText = formatCurrency(totalAmount);

    closeModal();
  }

  function showOrderSummary() {
    const orderSummaryBody = document.getElementById('orderSummaryBody');
    const orderSummaryTotal = document.getElementById('orderSummaryTotal');
    orderSummaryBody.innerHTML = orderBody.innerHTML;
    orderSummaryTotal.innerText = totalAmountElem.innerText;
    document.getElementById('orderSummaryModal').style.display = 'block';
  }

  function closeOrderSummaryModal() {
    document.getElementById('orderSummaryModal').style.display = 'none';
  }

  function submitOrder() {
    // Handle order submission logic here
    alert('Pesanan Anda telah dikirim!');
    closeOrderSummaryModal();
  }

  function formatCurrency(amount) {
    return new Intl.NumberFormat('id-ID', {
      style: 'currency',
      currency: 'IDR',
      minimumFractionDigits: 0,
      maximumFractionDigits: 0
    }).format(amount);
  }

  window.onclick = function(event) {
    if (event.target == document.getElementById('addToCartModal')) {
      closeModal();
    }
    if (event.target == document.getElementById('orderSummaryModal')) {
      closeOrderSummaryModal();
    }
  }
  function showAddProductModal() {
  document.getElementById('addProductModal').style.display = 'block';
}

function closeAddProductModal() {
  document.getElementById('addProductModal').style.display = 'none';
}

  </script>

</body>
</html>
