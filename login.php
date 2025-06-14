<?php
session_start();
require "koneksi.php";
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Login - RodaLancar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .warna1 {
            color: #27374D;
        }

        .warna2 {
            background-color: #526D82;
        }

        .warna3 {
            background-color: #9DB2BF;
        }

        .warna4 {
            background-color: #DDE6ED;
        }

        body {
            background-color: #DDE6ED;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            font-family: 'Segoe UI', sans-serif;
        }

        .login-box {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        .form-control {
            border-radius: 8px;
        }

        .btn-login {
            background-color: #526D82;
            color: white;
            font-weight: 600;
        }

        .btn-login:hover {
            background-color: #3e5569;
        }

        .text-muted {
            font-size: 0.9rem;
        }

        .alert {
            margin-top: 15px;
            border-radius: 8px;
        }
    </style>
</head>

<body>
    <div class="login-box">
        <h3 class="mb-4 warna1 text-center">RodaLancar</h3>
        <form method="post">
            <div class="mb-3">
                <label for="username" class="form-label warna1">Username</label>
                <input type="text" class="form-control" id="username" name="username" required autofocus>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label warna1">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" name="loginbtn" class="btn btn-login w-100">Masuk</button>
        </form>

        <div class="text-center mt-3">
            <p class="text-muted">Belum punya akun? <a href="registrasi.php" class="warna1">Daftar</a></p>
        </div>

        <?php
        if (isset($_POST['loginbtn'])) {
            $username = htmlspecialchars($_POST['username']);
            $password = htmlspecialchars($_POST['password']);

            $query = mysqli_query($con, "SELECT * FROM users WHERE username = '$username'");
            $countdata = mysqli_num_rows($query);
            $data = mysqli_fetch_array($query);

            if ($countdata > 0) {
                if (password_verify($password, $data['password'])) {
                    $_SESSION['username'] = $data['username'];
                    $_SESSION['role'] = $data['role'];
                    $_SESSION['login'] = true;

                    if ($data['role'] === 'admin') {
                        header('Location: adminpanel/index.php');
                    } else {
                        header('Location: index.php');
                    }
                    exit;
                } else {
                    echo '<div class="alert alert-warning">Password salah!</div>';
                }
            } else {
                echo '<div class="alert alert-warning">Username tidak ditemukan!</div>';
            }
        }
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>