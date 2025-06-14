<?php
require "session.php";
require "../koneksi.php";

$query = mysqli_query($con, "SELECT a.*, b.nama AS nama_kategori FROM unit_mobil a JOIN kategori b ON a.kategori_id=b.id");
$jumlahUnit = mysqli_num_rows($query);

$queryKategori = mysqli_query($con, "SELECT * FROM kategori");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unit Mobil</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        body {
            background-color: #e8f5e8;
            font-family: Arial, sans-serif;
        }

        .header-section {
            background: linear-gradient(135deg, #4a7c59 0%, #2d5a27 100%);
            color: white;
            padding: 20px 0;
            margin-bottom: 20px;
        }

        .header-section h1 {
            margin: 0;
            font-size: 1.8rem;
            font-weight: 500;
        }

        .breadcrumb {
            background: transparent;
            padding: 10px 0;
            margin: 10px 0 0 0;
        }

        .breadcrumb-item a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
        }

        .breadcrumb-item.active {
            color: white;
        }

        .fade-in .breadcrumb {
            background: white;
            border-radius: 8px;
            padding: 10px 15px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .fade-in .breadcrumb-item a {
            color: #6c757d;
        }

        .fade-in .breadcrumb-item.active {
            color: #495057;
        }

        .main-content {
            background: white;
            border-radius: 8px;
            padding: 25px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .form-section {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 30px;
        }

        .form-section h3 {
            color: #495057;
            margin-bottom: 20px;
            font-size: 1.3rem;
            font-weight: 500;
        }

        .form-control {
            border: 1px solid #ced4da;
            border-radius: 4px;
            padding: 8px 12px;
            font-size: 14px;
        }

        .form-control:focus {
            border-color: #80bdff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            border-radius: 4px;
            padding: 8px 16px;
            font-size: 14px;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .table-section h2 {
            color: #495057;
            margin-bottom: 20px;
            font-size: 1.3rem;
            font-weight: 500;
            display: flex;
            align-items: center;
        }

        .table-section h2 i {
            margin-right: 8px;
        }

        .table {
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 0;
            font-size: 14px;
        }

        .table thead th {
            background-color: #f8f9fa;
            border-bottom: 2px solid #dee2e6;
            color: #495057;
            font-weight: 600;
            padding: 12px;
            text-align: center;
        }

        .table tbody td {
            padding: 12px;
            text-align: center;
            vertical-align: middle;
            border-bottom: 1px solid #dee2e6;
        }

        .table tbody tr:hover {
            background-color: #f8f9fa;
        }

        .no-decoration {
            text-decoration: none;
        }

        label {
            font-weight: 500;
            color: #495057;
            margin-bottom: 5px;
        }
    </style>
</head>

<body>
    <?php require "navbar.php"; ?>

    <!-- Header Section -->
    <div class="header-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1><i class="fas fa-car"></i> Manajemen Unit Mobil</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <nav aria-label="breadcrumb" class="fade-in">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="../adminpanel" class="no-decoration">
                        <i class="fas fa-home me-2"></i>Dashboard
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <i class="fas fa-car me-2"></i>
                    Unit Mobil
                </li>
            </ol>
        </nav>

        <!-- Tambah Unit -->
        <div class="main-content">
            <div class="form-section">
                <h3>Tambah Unit Mobil</h3>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" id="nama" name="nama" class="form-control" placeholder="Masukkan nama unit mobil" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="kategori" class="form-label">Kategori</label>
                                <select id="kategori" name="kategori" class="form-control" required>
                                    <option value="">Pilih Seat</option>
                                    <?php
                                    while ($data = mysqli_fetch_array($queryKategori)) {
                                    ?>
                                        <option value="<?php echo $data['id']; ?>"><?php echo $data['nama']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div>
                            <div class="mb-3">
                                <label for="harga" class="form-label">Harga</label>
                                <input type="number" id="harga" name="harga" class="form-control" placeholder="Masukkan harga" required>
                            </div>
                        </div>
                        <div class="my-3">
                            <label for="ketersediaan_unit">Ketersediaan Unit</label>
                            <select name="ketersediaan_unit" id="ketersediaan_unit" class="form-control" required>
                                <option value="tersedia">Tersedia</option>
                                <option value="tidaktersedia">Tidak Tersedia</option>
                            </select>
                        </div>
                        <div class="my-3">
                            <label for="foto">Foto</label>
                            <input type="file" name="foto" id="foto" class="form-control" required>
                        </div>
                        <div class="my-3">
                            <label for="detail">Detail</label>
                            <textarea name="detail" id="detail" cols="50" rows="5" class="form-control" required></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" name="simpan">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                </form>

                <?php
                if (isset($_POST['simpan'])) {
                    $nama = htmlspecialchars($_POST['nama']);
                    $kategori = htmlspecialchars($_POST['kategori']);
                    $harga = htmlspecialchars($_POST['harga']);
                    $detail = htmlspecialchars($_POST['detail']);
                    $ketersediaan_unit = htmlspecialchars($_POST['ketersediaan_unit']);

                    $target_dir = "../img/";
                    $nama_file = basename($_FILES["foto"]["name"]);
                    $target_file = $target_dir . $nama_file;
                    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                    $image_size = $_FILES["foto"]["size"];

                    if ($nama == '' || $kategori == '' || $harga == '') {
                ?>
                        <div class="alert alert-danger mt-3" role="alert">Mohon Cek Kembali</div>
                        <?php
                    } else {
                        if ($nama_file != '') {
                            if ($image_size > 10000000) {
                        ?>
                                <div class="alert alert-danger mt-3" role="alert">
                                    Foto tidak boleh lebih dari 100MB
                                </div>
                                <?php
                            } else {
                                if ($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'gif') {
                                ?>
                                    <div class="alert alert-danger mt-3" role="alert">
                                        Foto wajib bertipe jpg dan png atau gif.
                                    </div>
                            <?php
                                } else {
                                    move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file);
                                    $foto = $nama_file;
                                }
                            }
                        }

                        // query insert to produk table //
                        $queryTambah = mysqli_query($con, "INSERT INTO unit_mobil (kategori_id, nama_kendaraan, harga, foto, detail, ketersediaan_unit)VALUES ('$kategori', '$nama', '$harga', '$foto', '$detail', '$ketersediaan_unit' )");

                        if ($queryTambah) {
                            ?>
                            <div class="alert alert-primary mt-3" role="alert">
                                Unit berhasil di Tambah
                            </div>

                            <meta http-equiv="refresh" content="2; url=unitmobil.php" />


                <?php
                        } else {
                            echo mysqli_error($con);
                        }
                    }
                }
                ?>
            </div>
        </div>

        <!-- List Unit Mobil -->
        <div class="main-content">
            <div class="table-section">
                <h2><i class="fas fa-list"></i> List Unit Mobil</h2>

                <div class="table-responsive mt-3">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Kategori</th>
                                <th>Harga</th>
                                <th>Ketersediaan Unit</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($jumlahUnit == 0) {
                            ?>
                                <tr>
                                    <td colspan="6" class="text-center" style="padding: 40px; color: #6c757d; font-style: italic;">
                                        Unit Mobil tidak tersedia
                                    </td>
                                </tr>
                                <?php
                            } else {
                                $jumlah = 1;
                                while ($data = mysqli_fetch_array($query)) {
                                ?>
                                    <tr>
                                        <td><?php echo $jumlah; ?></td>
                                        <td><?php echo $data['nama_kendaraan']; ?></td>
                                        <td><?php echo $data['nama_kategori']; ?></td>
                                        <td><?php echo $data['harga']; ?></td>
                                        <td><?php echo $data['ketersediaan_unit']; ?></td>
                                        <td>
                                            <!-- PERBAIKAN: Menambahkan ID unit mobil pada parameter q -->
                                            <a href="unit-detail.php?q=<?php echo $data['id']; ?>" class="btn btn-sm btn-info me-1">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                            <?php
                                    $jumlah++;
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>