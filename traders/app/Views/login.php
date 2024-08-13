<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f2f2f2;
            font-family: 'Arial', sans-serif;
        }

        .auth-form-light {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
        }

        .brand-logo img {
            width: 100px;
            margin-bottom: 20px;
        }

        .name h5 {
            margin-bottom: 0;
            color: #333;
        }

        .name h6 {
            color: #777;
        }

        .form-control {
            border-radius: 5px;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            border-radius: 5px;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-block {
            padding: 10px 20px;
            font-size: 16px;
        }

        .text-center a {
            color: #007bff;
            text-decoration: none;
        }

        .text-center a:hover {
            text-decoration: underline;
        }

        .g-recaptcha {
            margin-bottom: 15px;
        }

        .auth-form-light h4 {
            color: #333;
            margin-bottom: 30px;
        }
    </style>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo text-center">
                                <img src="<?php echo base_url('images/pt.JPG') ?>" alt="logo">
                            </div>
                            <div class="ms-3 name text-center">
                                <h5 class="font-bold">Selamat Datang  <?= session()->get('nama_users') ?></h5>
                            </div>
                            <h6 class="text-center">Silahkan isi data dibawah untuk masuk ke halaman berikutnya!</h6>

                            <form id="myForm" action="<?= base_url('login/aksi_login/?') ?>" method="post">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg" id="exampleInputEmail1"
                                        placeholder="Nama" name="nama_users">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg"
                                        id="exampleInputPassword1" placeholder="Password" name="password">
                                </div>
                                <div class="g-recaptcha" data-sitekey="6Lc3hiAqAAAAAEisl4y9qnkuRtY7ik2zpeQvlkMA"></div>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg">Log-in</button>
                                </div>
                                <div class="mt-3 text-center">
                                    <a href="<?= base_url('home/signup') ?>">Sign Up</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <script>
        document.getElementById('myForm').addEventListener('submit', function (event) {
            var response = grecaptcha.getResponse();
            if (response.length === 0) {
                alert("Please complete the reCAPTCHA.");
                event.preventDefault();
            }
        });
    </script>
</body>

</html>
