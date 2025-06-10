<?php
session_start();
require "../koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>

<style>
    * {
        box-sizing: border-box;
    }

    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-image: url(img/backround.jpg);
        background-size: cover;
        background-position: center;
        margin: 0;
        padding: 0;
    }

    .main {
        height: 100vh;
    }

    .login-box {
        width: 500px;
        height: 300px;
        box-sizing: border-box;
        border-radius: 10px;
    }

    .login {
        text-align: center;
        font-weight: bold;
        font-size: 20px;
    }
</style>


<body>
    <div class="main d-flex flex-column justify-content-center align-items-center">
        <div class="login-box p-5 shadow">
            <form action="" method="post">
                <div class="login">
                    <p>Login Admin</p>
                </div>
                <div>
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username"
                        id="username">
                </div>
                <div>
                    <label for="password">password</label>
                    <input type="password" class="form-control" name="password"
                        id="password">
                </div>
                <div>
                    <button class="btn btn-success form-control mt-3" type="submit"
                        name="loginbtn">Login</button>
                </div>
            </form>
        </div>
        <div class="mt-3 style= whidth: 500px">
            <?php
            if (isset($_POST['loginbtn'])) {
                $username = htmlspecialchars($_POST['username']);
                $password = htmlspecialchars($_POST['password']);

                $query = mysqli_query($con, "SELECT * FROM users WHERE username='$username'");
                $countdata = mysqli_num_rows($query);
                $data = mysqli_fetch_array($query);

                if ($countdata > 0) {
                    if ($password === $data['password']) {
                        $_SESSION['username'] = $data['username'];
                        $_SESSION['login'] = true;
                        header('location: ../adminpanel');
                    } else {
            ?>
                        <div class="alert alert-warning" role="alert">
                            Password salah
                        </div>
                    <?php
                    }
                } else {
                    ?>
                    <div class="alert alert-warning" role="alert">
                        Akun tidak tersedia
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>