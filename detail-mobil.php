<?php
require "koneksi.php";

// Cek apakah parameter dikirim
if (!isset($_GET['nama']) || empty($_GET['nama'])) {
    echo "<div class='alert alert-warning text-center'>Parameter nama tidak valid.</div>";
    exit;
}

$nama = htmlspecialchars($_GET['nama']);
$queryUnit = mysqli_query($con, "SELECT * FROM unit_mobil WHERE nama_kendaraan = '$nama'");

// Cek query berhasil atau tidak
if (!$queryUnit) {
    echo "<div class='alert alert-danger text-center'>Query error: " . mysqli_error($con) . "</div>";
    exit;
}

$unit = mysqli_fetch_array($queryUnit);

// Cek apakah data mobil ditemukan
if (!$unit) {
    echo "<div class='alert alert-danger text-center'>Mobil dengan nama tersebut tidak ditemukan.</div>";
    exit;
}

// Query untuk unit terkait
$kategori_id = $unit['kategori_id'];
$id_mobil = $unit['id'];
$queryUnitTerkait = mysqli_query($con, "SELECT * FROM unit_mobil WHERE kategori_id = '$kategori_id' AND id != '$id_mobil' LIMIT 4");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Mobil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

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

    .text-harga {
        font-size: 1.2rem;
        font-weight: bold;
    }

    .mb-3 img {
        height: 200px;
    }

    .unit-terkait-img {
        height: 100%;
        width: 100%;
        object-fit: cover;
        object-position: center;
    }
</style>

<body>
    <?php require "navbar.php"; ?>

    <!-- Bagian Detail Mobil -->
    <div class="container-fluid py-5 warna4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-5 mb-4">
                    <div class="card shadow">
                        <img src="img/<?php echo $unit['foto']; ?>" class="w-100 card-img-top" alt="">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="card shadow p-4 warna3 text-white">
                        <h1 class="mb-3"><?php echo $unit['nama_kendaraan']; ?></h1>
                        <p class="fs-5"><?php echo $unit['detail'] ?></p>
                        <p class="text-harga text-warning fs-4">
                            Rp <?php echo $unit['harga']; ?>
                        </p>
                        <p class="fs-5">
                            Status Ketersediaan :
                            <strong class="text-white"><?php echo $unit['ketersediaan_unit']; ?></strong>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bagian Unit Terkait -->
    <div class="container-fluid py-5 warna1">
        <div class="container">
            <h2 class="text-center text-white mb-5">Unit Terkait</h2>
            <div class="row">
                <?php while ($data = mysqli_fetch_array($queryUnitTerkait)) { ?>
                    <div class="col-md-6 col-lg-3 mb-4">
                        <div class="card shadow h-100">
                            <a href="detail-mobil.php?nama=<?php echo urlencode($data['nama_kendaraan']) ?>">
                                <img src="img/<?php echo $data['foto'] ?>" class="img-fluid unit-terkait-img rounded-top" alt="">
                            </a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>


    <?php require 'footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>