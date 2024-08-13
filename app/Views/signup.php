<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <style>
        body {
            background-color: #f4f7f6;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container-fluid {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .auth-form-light {
            background-color: white;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            padding: 30px;
            width: 100%;
            max-width: 400px;
            text-align: center;
        }
        .brand-logo img {
            width: 80px; /* Reduced size */
            height: auto;
            margin-bottom: 20px;
        }
        h4 {
            color: #333;
            margin-bottom: 20px;
            font-weight: 600;
        }
        .form-control {
            border-radius: 5px;
            border: 1px solid #ccc;
            padding: 10px;
            font-size: 16px;
            margin-bottom: 15px;
        }
        .form-control:focus {
            border-color: #007bff;
            box-shadow: none;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
            width: 100%;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .text-center a {
            color: #007bff;
            text-decoration: none;
            margin-top: 20px;
            display: inline-block;
        }
        .text-center a:hover {
            text-decoration: underline;
        }
        .mt-3 {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth px-0">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                <div class="brand-logo">
                    <img src="<?php echo base_url('images/logo_perusahaan3.PNG')?>" alt="logo">
                </div>
                <h4>Create an Account</h4>
               <form action="<?= base_url('home/login') ?>" method="post">

                    <div class="form-group">
                        <input type="text" class="form-control form-control-lg" name="nama_users" placeholder="Nama" required>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control form-control-lg" name="email" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control form-control-lg" name="password" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-lg" name="no_telp" placeholder="No. Telp" required>
                    </div>
                   <!--  <div class="form-group">
                        <select class="form-control form-control-lg" name="id_level" required>
                            <option value="">Pilih Jabatan</option>
                            <option value="1">Admin</option>
                            <option value="2">Kepala Gudang</option>
                            <option value="5">Trader</option>
                        </select>
                    </div> -->
                   <div class="mt-3">
  <div class="mt-3">
    <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5" type="submit">Daftar</button>
</div>


                </form>
                <div class="mt-2 text-center">
                    <a href="<?= base_url('login') ?>">Kembali ke halaman login</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
