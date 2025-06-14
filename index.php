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

    .banner {
        height: 100vh;
        background: linear-gradient(rgba(0, 0, 0, 40%), rgba(0, 0, 0, 40%)), url('img/banner.png');
        background-repeat: no-repeat;
        background-size: cover;
        position: relative;
    }

    .banner::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, rgba(39, 55, 77, 0.8), rgba(82, 109, 130, 0.6));
    }

    .banner-content {
        position: relative;
        z-index: 2;
    }

    .high-kategori {
        height: 200px;
        border-radius: 15px;
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        position: relative;
    }

    .high-kategori:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(39, 55, 77, 0.3);
    }

    .kategori-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(45deg, rgba(39, 55, 77, 0.7), rgba(82, 109, 130, 0.5));
        display: flex;
        align-items: center;
        justify-content: center;
        transition: background 0.3s ease;
    }

    .high-kategori:hover .kategori-overlay {
        background: linear-gradient(45deg, rgba(39, 55, 77, 0.5), rgba(82, 109, 130, 0.3));
    }

    .no-decoration {
        text-decoration: none;
        color: white;
        font-size: 1.5rem;
        font-weight: 600;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }

    .kategori-4seat {
        background: url('img/Wuling.jpg');
        background-size: cover;
        background-position: center;
    }

    .kategori-6seat {
        background: url('img/6Seat.jpg');
        background-size: cover;
        background-position: center;
    }

    .kategori-8seat {
        background: url('img/7Seat.jpg');
        background-size: cover;
        background-position: center;
    }

    .text-harga {
        font-size: 1.3rem;
        font-weight: bold;
        color: #27374D;
    }

    .image-box {
        height: 200px;
        overflow: hidden;
        border-radius: 10px 10px 0 0;
    }

    .image-box img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        transition: transform 0.3s ease;
    }

    .card:hover .image-box img {
        transform: scale(1.05);
    }

    .card {
        border: none;
        border-radius: 15px;
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(39, 55, 77, 0.2);
    }

    .btn-custom {
        border-radius: 25px;
        padding: 10px 20px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-custom:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }

    .search-box {
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50px;
        padding: 20px;
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .search-box .form-control {
        border-radius: 25px;
        border: none;
        padding: 15px 20px;
        font-size: 1.1rem;
    }

    .search-box .btn {
        border-radius: 25px;
        padding: 15px 30px;
        font-weight: 600;
    }

    .about-section {
        position: relative;
        overflow: hidden;
    }

    .about-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, #526D82, #27374D);
        opacity: 0.9;
    }

    .about-content {
        position: relative;
        z-index: 2;
    }

    .feature-icon {
        width: 60px;
        height: 60px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 15px;
        font-size: 1.5rem;
        color: white;
    }

    .section-title {
        position: relative;
        display: inline-block;
        margin-bottom: 30px;
    }

    .section-title::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 3px;
        background: linear-gradient(90deg, #526D82, #9DB2BF);
        border-radius: 2px;
    }

    .hero-text {
        font-size: 3.5rem;
        font-weight: 700;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        margin-bottom: 20px;
    }

    .hero-subtitle {
        font-size: 1.3rem;
        margin-bottom: 30px;
        opacity: 0.9;
    }

    @media (max-width: 768px) {
        .hero-text {
            font-size: 2.5rem;
        }

        .high-kategori {
            height: 150px;
        }

        .search-box {
            padding: 15px;
        }
    }
</style>

<body>
    <?php require "navbar.php"; ?>

    <!-- Hero Banner -->
    <div class="container-fluid banner d-flex align-items-center">
        <div class="container text-center text-white banner-content">
            <div class="hero-text">Tempat Sewa Mobil Termurah</div>
            <div class="hero-subtitle">Temukan mobil impian Anda dengan harga terjangkau</div>

            <div class="col-lg-8 offset-lg-2">
                <div class="search-box">
                    <form method="get" action="unit-mobil.php">
                        <div class="input-group input-group-lg">
                            <input type="text" class="form-control" placeholder="Cari nama mobil..." name="keyword">
                            <button class="btn warna2 text-white" type="submit">
                                <i class="fas fa-search me-2"></i>Cari
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Kategori -->
    <div class="container-fluid warna4 py-5">
        <div class="container text-center">
            <h3 class="section-title warna1">Kategori Kendaraan</h3>
            <p class="lead text-muted mb-5">Pilih kategori sesuai kebutuhan perjalanan Anda</p>

            <div class="row mt-4">
                <div class="col-md-4 mb-4">
                    <div class="high-kategori kategori-4seat">
                        <div class="kategori-overlay">
                            <a href="unit-mobil.php?kategori=4 Seat" class="no-decoration">
                                <i class="fas fa-car me-2"></i>4 Seat
                            </a>
                        </div>
                    </div>
                    <p class="mt-3 text-muted">Perfect untuk pasangan atau keluarga kecil</p>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="high-kategori kategori-6seat">
                        <div class="kategori-overlay">
                            <a href="unit-mobil.php?kategori=6 Seat" class="no-decoration">
                                <i class="fas fa-users me-2"></i>6 Seat
                            </a>
                        </div>
                    </div>
                    <p class="mt-3 text-muted">Ideal untuk keluarga sedang</p>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="high-kategori kategori-8seat">
                        <div class="kategori-overlay">
                            <a href="unit-mobil.php?kategori=8 Seat" class="no-decoration">
                                <i class="fas fa-users me-2"></i>8 Seat
                            </a>
                        </div>
                    </div>
                    <p class="mt-3 text-muted">Cocok untuk grup besar atau rombongan</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Tentang Kami -->
    <div class="container-fluid about-section py-5">
        <div class="container text-center text-white about-content">
            <h3 class="section-title">Tentang RodaLancar Rent Car</h3>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <p class="fs-5 mb-4">Selamat datang di RodaLancar Rent Car, solusi sewa mobil terpercaya untuk kebutuhan perjalanan pribadi, bisnis, maupun wisata Anda.</p>
                    <p class="mb-5">Kami hadir dengan komitmen memberikan layanan rental mobil yang mudah, aman, dan nyaman. Didukung oleh armada kendaraan yang terawat dan tim profesional, kami siap menemani perjalanan Anda di berbagai kota di Indonesia.</p>
                    <p>Untuk Pemesanan Bisa Langsung Whatsapp Admin</p>
                    <div class="feature-icon">
                        <a href="https://wa.me/6285724522167"><i class="bi bi-whatsapp"></i></a>
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-md-2 col-6 mb-4">
                    <div class="feature-icon">
                        <i class="fas fa-car"></i>
                    </div>
                    <h6>Armada Lengkap</h6>
                    <small>MPV, SUV, City Car hingga mobil mewah</small>
                </div>
                <div class="col-md-2 col-6 mb-4">
                    <div class="feature-icon">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <h6>Dengan/Tanpa Sopir</h6>
                    <small>Fleksibel sesuai kebutuhan</small>
                </div>
                <div class="col-md-2 col-6 mb-4">
                    <div class="feature-icon">
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                    <h6>Harga Transparan</h6>
                    <small>Tanpa biaya tersembunyi</small>
                </div>
                <div class="col-md-2 col-6 mb-4">
                    <div class="feature-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h6>Layanan 24 Jam</h6>
                    <small>Respons cepat kapan saja</small>
                </div>
                <div class="col-md-2 col-6 mb-4">
                    <div class="feature-icon">
                        <i class="fas fa-sparkles"></i>
                    </div>
                    <h6>Mobil Bersih</h6>
                    <small>Rutin diservis & maintenance</small>
                </div>
                <div class="col-md-2 col-6 mb-4">
                    <div class="feature-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h6>Terpercaya</h6>
                    <small>Pengalaman bertahun-tahun</small>
                </div>
            </div>
        </div>
    </div>

    <!-- Unit Mobil -->
    <div class="container-fluid py-5">
        <div class="container text-center">
            <h3 class="section-title warna1">Unit Mobil Terpopuler</h3>
            <p class="lead text-muted mb-5">Pilihan mobil berkualitas dengan harga terjangkau</p>

            <div class="row mt-4">
                <?php while ($data = mysqli_fetch_array($queryUnit)) { ?>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card h-100">
                            <div class="image-box">
                                <img src="img/<?php echo $data['foto']; ?>" class="card-img-top" alt="<?php echo $data['nama_kendaraan']; ?>">
                            </div>
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title warna1"><?php echo $data['nama_kendaraan']; ?></h5>
                                <p class="card-text text-muted flex-grow-1"><?php echo $data['detail']; ?></p>
                                <div class="mt-auto">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <span class="text-harga">Rp<?php echo number_format($data['harga'], 0, ',', '.'); ?></span>
                                        <small class="text-muted">/hari</small>
                                    </div>
                                    <a href="detail-mobil.php?nama=<?php echo $data['nama_kendaraan']; ?>" class="btn warna2 text-white btn-custom w-100">
                                        <i class="fas fa-info-circle me-2"></i>Detail Mobil
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>

            <div class="mt-5">
                <a class="btn warna1 btn-custom btn-lg px-5" href="unit-mobil.php">
                    <i class="fas fa-cars me-2"></i>Lihat Semua Mobil
                </a>
            </div>
        </div>
    </div>

    <?php require "footer.php"; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>