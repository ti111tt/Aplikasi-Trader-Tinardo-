<!-- app/Views/history_hapus_view.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Penghapusan</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="my-4">Riwayat Penghapusan Data</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tabel</th>
                    <th>ID Record</th>
                    <th>Data yang Dihapus</th>
                    <th>Waktu Penghapusan</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($history as $record): ?>
                    <tr>
                        <td><?= $record['id'] ?></td>
                        <td><?= $record['table_name'] ?></td>
                        <td><?= $record['record_id'] ?></td>
                        <td><?= $record['deleted_data'] ?></td>
                        <td><?= $record['deleted_at'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
