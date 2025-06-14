<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>
<style>
    body {
        background-color: #DDE6ED;
        color: #27374D;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .warna1 {
        background-color: #27374D !important;
        color: white !important;
    }

    .warna2 {
        background-color: #526D82 !important;
        color: white !important;
    }

    .warna3 {
        background-color: #9DB2BF !important;
        color: #27374D !important;
    }

    .warna4 {
        background-color: #DDE6ED !important;
        color: #27374D !important;
    }

    .banner-unit {
        height: 40vh;
        background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('img/banner.png');
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
    }

    .banner-unit h1 {
        font-size: 3rem;
        font-weight: bold;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }

    .container-fluid.py-5 {
        background-color: #FFFFFF;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        border-radius: 15px;
        margin-top: 30px;
    }

    .container.fs-5.text-center {
        max-width: 800px;
        margin: 0 auto;
        line-height: 1.8;
    }

    .container.fs-5.text-center p {
        margin-bottom: 2rem;
    }
</style>

</style>

<body>
    <?php require "navbar.php"; ?>
    <div class="container-fluid banner-unit d-flex align-items-center">
        <div class="container">
            <h1 class="text-white text-center">Tentang Kami</h1>
        </div>
    </div>

    <div class="container-fluid py-5">
        <div class="container fs-5 text-center">
            <p>Selamat datang di RodaLancar, mitra perjalanan terpercaya Anda. Kami adalah perusahaan rental mobil profesional yang berdedikasi untuk memberikan layanan transportasi terbaik, nyaman, dan aman bagi seluruh pelanggan kami. Berdiri sejak 2023, kami telah melayani ribuan pelanggan dari berbagai latar belakang, baik untuk keperluan pribadi, wisata, bisnis, hingga perjalanan dinas.</p>
            <p>Kami memahami bahwa setiap perjalanan memiliki kebutuhan yang berbeda. Oleh karena itu, kami menyediakan berbagai jenis kendaraan mulai dari city car yang ekonomis, MPV yang nyaman untuk keluarga, hingga kendaraan premium untuk kebutuhan khusus. Semua armada kami selalu dalam kondisi prima karena dirawat secara rutin dan diawasi oleh tim teknisi yang berpengalaman.</p>
            <p>Di RodaLancar, kepuasan pelanggan adalah prioritas utama kami. Tim kami yang ramah dan profesional siap membantu Anda sejak pemesanan hingga selesai menggunakan layanan kami. Kami juga menyediakan layanan antar-jemput kendaraan, sopir berpengalaman, serta dukungan 24 jam untuk memastikan perjalanan Anda berjalan lancar tanpa hambatan.</p>
        </div>
    </div>

    <?php require "footer.php"; ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>