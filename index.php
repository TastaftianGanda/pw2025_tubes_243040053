<?php
require "koneksi.php";
$queryUnit = mysqli_query($con, "SELECT id, nama_kendaraan, harga, foto, detail FROM unit_mobil LIMIT 6");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listing Mobil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
    .warna1 {
        background-color: #27374D;
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

    .banner {
        height: 100vh;
        background: linear-gradient(rgba(0, 0, 0, 40%), rgba(0, 0, 0, 40%)), url('img/banner.png');
        background-repeat: no-repeat;
        background-size: cover;
    }

    .high-kategori {
        height: 240px;
    }

    .no-decoration {
        text-decoration: none;
        color: white;
    }

    .kategori-4seat {
        background: linear-gradient(rgba(0, 0, 0, 40%), rgba(0, 0, 0, 40%)), url('img/Wuling.jpg');
        background-size: cover;
        background-position: center;
    }

    .kategori-6seat {
        background: linear-gradient(rgba(0, 0, 0, 40%), rgba(0, 0, 0, 40%)), url('img/6Seat.jpg');
        background-size: cover;
        background-position: center;
    }

    .kategori-8seat {
        background: linear-gradient(rgba(0, 0, 0, 40%), rgba(0, 0, 0, 40%)), url('img/7Seat.jpg');
        background-size: cover;
        background-position: center;
    }

    .text-harga {
        font-size: 1.2rem;
        font-weight: bold;
    }

    .image-box {
        height: 200px;
    }

    .image-box img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
    }
</style>

<body>
    <?php require "navbar.php"; ?>

    <div class="container-fluid banner d-flex align-items-center">
        <div class="container text-center text-white">
            <h1>Tempat Sewa Mobil Termurah</h1>
            <h3>Cari Mobil Apa?</h3>
            <div class="col-md-8 offset-md-2">
                <form method="get" action="unit-mobil.php">
                    <div class="input-group input-group-lg my-3">
                        <input type="text" class="form-control" placeholder="Nama Mobil" aria-label="Recipient's username" aria-describedby="basic-addon2" name="keyword">
                        <button class="btn warna2" type="submit">Cari</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Kategori -->
    <div class="container-fluid warna3 py-5">
        <div class="container text-center">
            <h3 class="warna2">Kategori</h3>

            <div class="row mt-3">
                <div class="col-md-4 mb-3">
                    <h3><a href="unit-mobil.php?kategori=4 Seat" class="no-decoration">4 Seat</a></h3>
                    <div class="high-kategori kategori-4seat">
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <h3><a href="unit-mobil.php?kategori=6 Seat" class="no-decoration">6 Seat</a></h3>
                    <div class="high-kategori kategori-6seat">
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <h3><a href="unit-mobil.php?kategori=8 Seat" class="no-decoration">8 Seat</a></h3>
                    <div class="high-kategori kategori-8seat">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--  -->
    <div class="container-fluid warna2 py-5">
        <div class="contailner text-center text-white">
            <h3>Tentang Kami</h3>
            <p class="fs-5 mt-3">Selamat datang di [RodaLancar Rent Car], solusi sewa mobil terpercaya untuk kebutuhan perjalanan pribadi, bisnis, maupun wisata Anda.

                Kami hadir dengan komitmen memberikan layanan rental mobil yang mudah, aman, dan nyaman. Didukung oleh armada kendaraan yang terawat dan tim profesional, kami siap menemani perjalanan Anda di berbagai kota di Indonesia.

                Misi Kami
                Memberikan pengalaman berkendara terbaik bagi pelanggan dengan pelayanan yang ramah, harga kompetitif, dan kendaraan berkualitas.
            <p class="fs-5 mt-3">Apa yang Kami Tawarkan?
            </p>
            <P class="fs-5 mt-3">🚗 Armada lengkap: MPV, SUV, city car, hingga mobil mewah</P>
            <P class="fs-5 mt-3">👨‍✈️ Layanan dengan/sopir atau lepas kunci</P>

            <P class="fs-5 mt-3"> 💰 Harga transparan, tanpa biaya tersembunyi</P>

            <P class="fs-5 mt-3">⏱️ Reservasi cepat & respons 24 jam</P>

            <P class="fs-5 mt-3">🧼 Mobil bersih dan rutin diservis</P>

            <p class="fs-5 mt-3"> Baik untuk kebutuhan harian, bulanan, perjalanan dinas, hingga keperluan wisata keluarga — [RodaLancar Rent Car] siap menjadi mitra perjalanan Anda</p>

        </div>
    </div>

    <!-- unit -->
    <div class="container-fluid py-5">
        <div class="container text-center">
            <h3>Unit Mobil</h3>

            <div class="row mt-5">
                <?php while ($data = mysqli_fetch_array($queryUnit)) { ?>
                    <div class="col-sm-6 col-md-4 mb-3">
                        <div class="card h-100">
                            <div class="image-box">
                                <img src="img/<?php echo $data['foto']; ?>" class="card-img-top" alt="...">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $data['nama_kendaraan']; ?></h5>
                                <p class="card-text text-truncate"><?php echo $data['detail']; ?></p>
                                <p class="card-text text-harga">Rp<?php echo $data['harga']; ?></p>
                                <a href="unit-detail.php?nama=<?php echo $data['nama_kendaraan']; ?>" class="btn warna2 text-white">Detail Lebih Lanjut</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <a class="btn btn-outline-primary mt-3" href="unit-mobil.php">Lihat Lebih Lanjut</a>
        </div>
    </div>

    <?php require "footer.php"; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>