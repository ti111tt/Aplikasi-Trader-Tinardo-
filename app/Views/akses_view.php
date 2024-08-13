<!-- app/Views/akses_view.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaturan Akses</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="my-4">Pengaturan Akses Pengguna</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID Pengguna</th>
                    <th>Nama Pengguna</th>
                    <th>Level Akses</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= $user['id_users'] ?></td>
                        <td><?= $user['nama_users'] ?></td>
                        <td>
                            <form action="<?= base_url('akses/update_level') ?>" method="post">
                                <input type="hidden" name="id_users" value="<?= $user['id_users'] ?>">
                                <select name="id_level" class="form-control">
                                    <?php foreach ($levels as $level): ?>
                                        <option value="<?= $level['id_level'] ?>" <?= $user['id_level'] == $level['id_level'] ? 'selected' : '' ?>>
                                            <?= $level['nama_level'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <button type="submit" class="btn btn-primary mt-2">Update</button>
                            </form>
                        </td>
                        <td>
                            <!-- Optionally add more actions here -->
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
