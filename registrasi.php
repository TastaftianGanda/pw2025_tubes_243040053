<?php
session_start();
require "koneksi.php";

$success = "";
$error = "";

if (isset($_POST['registerbtn'])) {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    $check = mysqli_query($con, "SELECT * FROM users WHERE username = '$username'");
    if (mysqli_num_rows($check) > 0) {
        $error = "Username sudah terdaftar!";
    } else {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $query = mysqli_query($con, "INSERT INTO users (username, password, role) VALUES ('$username', '$hashedPassword', 'user')");

        if ($query) {
            $success = "Registrasi berhasil! Anda akan diarahkan ke halaman login...";
            echo "<meta http-equiv='refresh' content='3;url=login.php'>";
        } else {
            $error = "Registrasi gagal. Coba lagi.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #DDE6ED;
            /* warna4 */
            font-family: 'Segoe UI', sans-serif;
        }

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

        .register-box {
            max-width: 400px;
            margin: auto;
            padding: 30px;
            border-radius: 10px;
            background-color: #FFFFFF;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
        }

        .form-label {
            font-weight: 500;
        }

        .btn-primary {
            background-color: #526D82;
            /* warna2 */
            border: none;
            font-weight: bold;
        }

        .btn-primary:hover {
            background-color: #3f586e;
        }

        a {
            color: #27374D;
            /* warna1 */
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="d-flex align-items-center justify-content-center" style="height: 100vh;">
        <div class="register-box shadow-sm">
            <h4 class="text-center mb-4 warna1">Registrasi Akun</h4>

            <?php if ($success): ?>
                <div class="alert alert-success"><?php echo $success; ?></div>
            <?php elseif ($error): ?>
                <div class="alert alert-danger"><?php echo $error; ?></div>
            <?php endif; ?>

            <form method="post">
                <div class="mb-3">
                    <label class="form-label warna1">Username</label>
                    <input type="text" class="form-control" name="username" required>
                </div>
                <div class="mb-3">
                    <label class="form-label warna1">Password</label>
                    <input type="password" class="form-control" name="password" required>
                </div>
                <button type="submit" name="registerbtn" class="btn btn-primary w-100">Daftar</button>
            </form>
            <div class="text-center mt-3">
                <a href="login.php">Sudah punya akun? Login</a>
            </div>
        </div>
    </div>
</body>

</html>