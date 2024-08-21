<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

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

        .captcha-container {
            display: none;
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
                            <?php if (isset($word) && !empty($word)): ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?= esc($word) ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
<?php endif; ?>
                            
                            <form id="myForm" action="<?= base_url('home/aksi_login') ?>" method="post">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg" id="exampleInputEmail1"
                                        placeholder="Nama" name="username">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg"
                                        id="exampleInputPassword1" placeholder="Password" name="password">
                                </div>
                                <div class="form-group captcha-container" id="captchaContainer">

                            <label for="captcha_code">Enter CAPTCHA</label>
                            <input type="text" class="form-control" id="captcha_code" name="captcha_code" placeholder="Enter CAPTCHA code" required>
                            <img id="captchaImage" src="" alt="CAPTCHA">
                            <div class="form-group" id="recaptchaContainer" style="display: none;"></div>

                        </div>
                       

                                <div class="g-recaptcha" data-sitekey="6Lc3hiAqAAAAAEisl4y9qnkuRtY7ik2zpeQvlkMA"></div>
                                <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg">Log-in</button>
                                <div class="mt-3">
                                    
                                </div>
                                <div class="mt-3 text-center">
    <a href="<?= base_url('home/signup') ?>">Sign Up</a>
    <br>
    <a href="<?= base_url('home/lppw') ?>">Forgot Password?</a>
</div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const captchaContainer = document.getElementById('captchaContainer');
        const recaptchaContainer = document.getElementById('recaptchaContainer');
        const captchaCodeInput = document.getElementById('captcha_code');
        const captchaImage = document.getElementById('captchaImage');

        if (navigator.onLine) {
            // Jika ada koneksi internet, tampilkan Google reCAPTCHA
            recaptchaContainer.style.display = 'block';
            captchaContainer.style.display = 'none';
            captchaCodeInput.removeAttribute('required'); // Hapus required jika CAPTCHA gambar tidak ditampilkan
        } else {
            // Jika tidak ada koneksi internet, tampilkan CAPTCHA gambar
            recaptchaContainer.style.display = 'none';
            captchaContainer.style.display = 'block';
            captchaCodeInput.setAttribute('required', 'required'); // Tambahkan required jika CAPTCHA gambar ditampilkan
            captchaImage.src = '<?= base_url('home/generateCaptcha') ?>'; // URL ke fungsi CAPTCHA gambar
        }
    });
    document.getElementById('myForm').addEventListener('submit', function(event) {
            var response = grecaptcha.getResponse();
            if (response.length === 0) {
                // reCAPTCHA is not verified
                alert("Please complete the reCAPTCHA.");
                event.preventDefault();
            }
        });
</script>

</body>
</html>
</body>

</html>
