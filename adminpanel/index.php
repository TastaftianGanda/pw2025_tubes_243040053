<?php
require "session.php";
require "../koneksi.php";


$queryKategori = mysqli_query($con, "SELECT * FROM kategori");
$jumlahKategori = mysqli_num_rows($queryKategori);

$queryUnitmobil = mysqli_query($con, "SELECT * FROM unit_mobil");
$jumlahUnitmobil = mysqli_num_rows($queryUnitmobil);



?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        body {
            background-color: #f8f9fa;
        }

        .dashboard-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease-in-out;
            margin-bottom: 20px;
        }

        .dashboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
        }

        .summary-kategori {
            background: linear-gradient(135deg, #10837c, #0f6b66);
        }

        .summary-galeri {
            background: linear-gradient(135deg, #106583, #0e5470);
        }

        .summary-produk {
            background: linear-gradient(135deg, #831065, #6b0e55);
        }

        .no-decoration {
            text-decoration: none;
        }

        .no-decoration:hover {
            text-decoration: underline;
        }

        .icon-container {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
        }

        .breadcrumb {
            background-color: white;
            border-radius: 10px;
            padding: 15px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .welcome-section {
            background: white;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 30px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <?php
    // Include navbar jika ada
    if (file_exists("navbar.php")) {
        require "navbar.php";
    }
    ?>

    <div class="container mt-4">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active" aria-current="page">
                    <i class="fas fa-home me-2"></i>Dashboard
                </li>
            </ol>
        </nav>

        <!-- Welcome Section -->
        <div class="welcome-section">
            <h2 class="mb-0">
                <i class="fas fa-user-circle me-2 text-primary"></i>
                Selamat Datang, <?php echo isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : 'Admin'; ?>!
            </h2>
        </div>

        <!-- Dashboard Cards -->
        <div class="row g-4">
            <!-- Card Kategori -->
            <div class="col-lg-4 col-md-6">
                <div class="card dashboard-card summary-kategori text-white">
                    <div class="card-body p-4">
                        <div class="row align-items-center">
                            <div class="col-4">
                                <div class="icon-container">
                                    <i class="fas fa-list fa-3x opacity-75"></i>
                                </div>
                            </div>
                            <div class="col-8">
                                <h3 class="card-title fs-4 mb-2">Kategori</h3>
                                <p class="card-text fs-5 mb-3">
                                    <?php
                                    // Contoh query untuk menghitung kategori
                                    // $kategori_count = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM kategori"));
                                    $kategori_count = mysqli_num_rows(mysqli_query($con, "SELECT * FROM kategori")); // Contoh data
                                    echo $kategori_count;
                                    ?>
                                    Kategori
                                </p>
                                <a href="kategori.php" class="text-white no-decoration">
                                    <i class="fas fa-arrow-right me-1"></i>Lihat Detail
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card Harga -->
            <div class="col-lg-4 col-md-6">
                <div class="card dashboard-card summary-produk text-white">
                    <div class="card-body p-4">
                        <div class="row align-items-center">
                            <div class="col-4">
                                <div class="icon-container">
                                    <i class="bi bi-cash-stack fa-3x opacity-75"></i>
                                </div>
                            </div>
                            <div class="col-8">
                                <h3 class="card-title fs-4 mb-2">Unit</h3>
                                <p class="card-text fs-5 mb-3">
                                    <?php
                                    // Contoh query untuk menghitung galeri
                                    $unit_count = mysqli_num_rows(mysqli_query($con, "SELECT * FROM unit_mobil"));
                                    echo $unit_count;
                                    ?>
                                    Daftar Unit Mobil
                                </p>
                                <a href="unitmobil.php" class="text-white no-decoration">
                                    <i class="fas fa-arrow-right me-1"></i>Lihat Detail
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
        <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../fontawesome/js/all.min.js"></script>
</body>

</html>