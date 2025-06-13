<?php
require 'koneksi.php';

$queryKategori = mysqli_query($con, "SELECT * FROM kategori");

if (isset($_GET['keyword'])) {
    $queryUnit = mysqli_query($con, "SELECT * FROM unit_mobil WHERE nama_kendaraan LIKE '%$_GET[keyword]%'");
} else if (isset($_GET['kategori'])) {
    $queryGetKategoriId = mysqli_query($con, "SELECT * FROM kategori WHERE nama = '$_GET[kategori]'");
    $kategoriId = mysqli_fetch_array($queryGetKategoriId);

    $queryUnit = mysqli_query($con, "SELECT * FROM unit_mobil WHERE kategori_id = '$kategoriId[id]'");
} else {
    $queryUnit = mysqli_query($con, "SELECT * FROM unit_mobil");
}

$countUnit = mysqli_num_rows($queryUnit);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unit Mobil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
    .banner-unit {
        height: 40vh;
        background: linear-gradient(rgba(0, 0, 0, 40%), rgba(0, 0, 0, 40%)), url('img/banner.png');
        background-position: center;
        background-repeat: no-repeat;
    }

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

    .list-group a {
        text-decoration: none;
    }
</style>

<body>
    <?php
    require 'navbar.php'; ?>

    <div class="container-fluid banner-unit d-flex align-items-center">
        <div class="container">
            <h1 class="text-white text-center">Unit Mobil</h1>
        </div>
    </div>

    <!-- body -->
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-3 mb-5">
                <h3>Kategori Unit</h3>
                <ul class="list-group">
                    <?php while ($kategori = mysqli_fetch_array($queryKategori)) {  ?>
                        <a href="unit-mobil.php?kategori=<?php echo $kategori['nama']; ?>">
                            <li class=" list-group-item"><?php echo $kategori['nama']; ?></li>
                        </a>
                    <?php } ?>
                </ul>
            </div>
            <div class="col-lg-9">
                <h3 class="text-center mb-3">Unit Mobil</h3>
                <div class="row">
                    <?php
                    if ($countUnit < 1) {
                    ?>
                        <div class="col-12">
                            <div class="alert text-center py-5" role="alert">
                                <h4>Maaf, unit mobil tidak ditemukan.</h4>
                            </div>
                        <?php
                    };
                        ?>
                        <?php while ($unit = mysqli_fetch_array($queryUnit)) { ?>
                            <div class="col-md-4 mb-4">
                                <div class="card h-100">
                                    <div class="image-box">
                                        <img src="img/<?php echo $unit['foto']; ?>" class="card-img-top" alt="...">
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $unit['nama_kendaraan']; ?></h5>
                                        <p class="card-text text-truncate"><?php echo $unit['detail']; ?></p>
                                        <p class="card-text text-harga"><?php echo $unit['harga']; ?>
                                        </p>
                                        <a href="unit-detail.php?nama=asfasf" class="btn warna2 text-white">Detail Lebih Lanjut</a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        </div>
                </div>
            </div>
        </div>
    </div>

    <?php require 'footer.php'; ?>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>