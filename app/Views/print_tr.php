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
    <!-- Sertakan pustaka xlsx untuk Excel -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.3/xlsx.full.min.js"></script>
    <style>
        /* Styling untuk tombol export */
        .export-buttons {
            text-align: center;
            margin: 20px auto;
        }

        .export-btn {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            margin: 5px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .export-btn:hover {
            background-color: #45a049;
        }

        .no-print {
            display: block;
        }

        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Data Transaksi</h1>
        <table id="table1" class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nomor Pesanan</th>
                    <th>Nomor Surat</th>
                    <th>Kode Transaksi</th>
                    <th>Nama Barang</th>
                    <th>Tanggal Surat</th>
                    <th>Tanggal Pembelian</th>
                    <th>Total Harga</th>
                    <th>Waktu Transaksi</th>
                    <th>Nama Pengirim</th>
                    <th>Alamat Pengirim</th>
                    <th>Nama Penerima</th>
                    <th>Alamat Penerima</th>
                    <th>Type Pembayaran</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Deleted At</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach($manda as $flora) {
                ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $flora->id_pesanan ?></td>
                    <td><?= $flora->no_surat ?></td>
                    <td><?= $flora->kode_transaksi ?></td>
                    <td><?= $flora->nama_brg ?></td>
                    <td><?= $flora->tgl_surat ?></td>
                    <td><?= $flora->tgl_pembelian ?></td>
                    <td><?= $flora->total_harga ?></td>
                    <td><?= $flora->transaksi_time ?></td>
                    <td><?= $flora->nama_pengirim ?></td>
                    <td><?= $flora->alamat_pengirim ?></td>
                    <td><?= $flora->nama_penerima ?></td>
                    <td><?= $flora->alamat_penerima ?></td>
                    <td><?= $flora->type ?></td>
                    <td><?= $flora->created_at ?></td>
                    <td><?= $flora->updated_at ?></td>
                    <td><?= $flora->deleted_at ?></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <div class="export-buttons no-print">
            <button id="print-btn" class="export-btn">Print</button>
            <button id="excel-btn" class="export-btn">Export to Excel</button>
            <button id="pdf-btn" class="export-btn">Export to PDF</button>
        </div>
    </div>

    <script>
        document.getElementById('print-btn').addEventListener('click', function() {
            window.print();
        });

        document.getElementById('excel-btn').addEventListener('click', function() {
            var wb = XLSX.utils.book_new();
            var ws = XLSX.utils.table_to_sheet(document.querySelector('#table1'));
            XLSX.utils.book_append_sheet(wb, ws, "Sheet1");
            XLSX.writeFile(wb, "data_transaksi.xlsx");
        });

        document.getElementById('pdf-btn').addEventListener('click', function() {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF();
            
            // Add store details
            doc.setFontSize(16);
            doc.text("Mitra Dagang Utama", 10, 10);
            doc.setFontSize(12);
            doc.text("Komplek Citra Buana Centre Park 1 Blok CC No. 5", 10, 15);
            doc.text("Kampung Seraya, Kepulauan Riau 29432 29444", 10, 20);
            doc.text("Nomor Telepon: 085268187779", 10, 25);
            
            // Add separator line
            doc.setLineWidth(0.5);
            doc.line(10, 30, 200, 30);

            // Add table title
            doc.setFontSize(14);
            doc.text("Data Transaksi", 10, 35);

            // Generate table
            doc.autoTable({
                startY: 40,
                html: '#table1',
                headStyles: { fillColor: '#4CAF50', textColor: 'white' },
                bodyStyles: { fontSize: 10 }
            });

            // Save the PDF
            doc.save("data_transaksi.pdf");
        });
    </script>
</body>
</html>
