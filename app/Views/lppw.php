<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background-color: #f2f2f2;
            font-family: 'Arial', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .auth-form-light {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
            padding: 40px;
            max-width: 400px;
            width: 100%;
        }

        .brand-logo img {
            width: 100px;
            margin-bottom: 20px;
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

        .auth-form-light h4 {
            color: #333;
            margin-bottom: 30px;
        }

        .notification {
            color: green;
            font-weight: bold;
            text-align: center;
            margin-top: 20px;
        }

        .password-field {
            position: relative;
        }

        .password-field input {
            padding-right: 40px;
        }

        .password-field .fa-eye {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="auth-form-light text-left">
        <div class="brand-logo text-center">
            <img src="<?php echo base_url('images/pt.JPG') ?>" alt="logo">
        </div>
        <h4 class="text-center">Forgot Password</h4>

        <?php if (session()->getFlashdata('message')): ?>
            <div class="notification">
                <?= session()->getFlashdata('message') ?>
            </div>
        <?php endif; ?>

        <form id="forgotPasswordForm" action="<?= base_url('home/forgot_password_action') ?>" method="post">
            <div class="form-group">
                <input type="email" class="form-control form-control-lg" placeholder="Enter your email" name="email" required>
            </div>
            <div class="form-group password-field">
                <input type="password" class="form-control form-control-lg" placeholder="Enter new password" name="new_password" id="password" required>
                <i class="fas fa-eye" id="togglePassword"></i>
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg">Submit</button>
                <a href="<?= base_url('home/login') ?>" class="btn btn-secondary btn-block btn-lg shadow-lg">Cancel</a>
            </div>
        </form>
    </div>

    <!-- Add FontAwesome for eye icon -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const togglePassword = document.getElementById('togglePassword');
            const passwordInput = document.getElementById('password');

            togglePassword.addEventListener('click', function() {
                // Toggle the type attribute using getAttribute() method
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                // Toggle the eye slash icon
                this.classList.toggle('fa-eye');
                this.classList.toggle('fa-eye-slash');
            });
        });
    </script>
</body>

</html>
