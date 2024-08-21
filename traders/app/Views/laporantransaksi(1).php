<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Transaksi</title>
    <!-- Sertakan pustaka jsPDF -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <!-- Sertakan pustaka jsPDF autoTable -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.18/jspdf.plugin.autotable.min.js"></script>
</head>
<body>
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3><?=$title?></h3>
                            <h4>Berikut adalah halaman data transaksi</h4>
                            <p class="text-subtitle text-muted">Berikut ini adalah data transaksi <?=$title?></p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end"></nav>
                        </div>
                    </div>
                </div>
            </div>

            <section class="section">
                <div class="card">
                    <div style="text-align: right;">
                        <a href="#" id="printButton">
                           <a href="<?= base_url('home/print_tr') ?>" class="btn btn-danger">Print Data Transaksi</a>

                        </a>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>nomor pesanan</th>
                                        <th>nomor surat</th>
                                        <th>kode transaksi</th>
                                        <th>nama barang</th>
                                        <th>tanggal surat</th>
                                        <th>tanggal Pembelian</th>
                                        <th>total harga</th>
                                        <th>waktu transaksi</th>
                                        <th>nama Pengirim</th>
                                        <th>alamat pengirim</th>
                                        <th>nama Penerima</th>
                                        <th>alamat penerima</th>
                                        <th>type pembayaran</th>
                                        <th>Created at</th>
                                        <th>Updated at</th>
                                        <th>Deleted at</th>
                                       
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
                                        <td><?php echo $flora->kode_transaksi?></td>
                                        <td><?php echo $flora->nama_brg ?></td>
                                        <td><?php echo $flora->tgl_surat ?></td>
                                        <td><?php echo $flora->tgl_pembelian ?></td>
                                        <td><?php echo $flora->total_harga ?></td>
                                        <td><?php echo $flora->transaksi_time ?></td>
                                        <td><?php echo $flora->nama_pengirim ?></td>
                                        <td><?php echo $flora->alamat_pengirim?></td>
                                        <td><?php echo $flora->nama_penerima ?></td>
                                        <td><?php echo $flora->alamat_penerima ?></td>
                                        <td><?php echo $flora->type ?></td>
                                        <td><?php echo $flora->created_at ?></td>
                                        <td><?php echo $flora->updated_at ?></td>
                                         <td><?php echo $flora->deleted_at ?></td>
                                      
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

   

    <script>
      document.addEventListener('DOMContentLoaded', function () {
        const { jsPDF } = window.jspdf;

        // Fungsi untuk mencetak transaksi
        document.getElementById('printButton').addEventListener('click', function () {
          const doc = new jsPDF('p', 'pt', 'a4');
          doc.setFontSize(12);
          const table = document.getElementById('table1');

          // Konversi tabel ke PDF
          doc.autoTable({ html: table });

          // Unduh PDF
          doc.save('data_transaksi.pdf');
        });

        // Fungsi untuk menampilkan detail transaksi di modal
        $('#detailModal').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget);
          var userId = button.data('id');
          
          // Fetch user details based on userId
          $.ajax({
            url: '<?= base_url('controller/get_transaksi_details') ?>',
            method: 'POST',
            data: { id: userId },
            dataType: 'json',
            success: function(data) {
              $('#id_transaksi').val(data.id);
              $('#id_pesanan').val(data.id_pesanan);
              $('#no_surat').val(data.no_surat);
              $('#nama_brg').val(data.nama_brg);
              $('#tgl_surat').val(data.tgl_surat);
              $('#tgl_pembelian').val(data.tgl_pembelian);
              $('#total_harga').val(data.total_harga);
              $('#type').val(data.type);
              $('#transaksi_time').val(data.transaksi_time);
              $('#nama_pengirim').val(data.nama_pengirim);
              $('#alamat_pengirim').val(data.alamat_pengirim);
              $('#nama_penerima').val(data.nama_penerima);
              $('#alamat_penerima').val(data.alamat_penerima);

              // Disable form fields
              $('#userDetailForm input').attr('disabled', true);
              $('#printItemBtn').attr('disabled', true);
            }
          });
        });
      });
    </script>
</body>
</html>
