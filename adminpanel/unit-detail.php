<?php
require "session.php";
require "../koneksi.php";

$id = $_GET['q'];
$query = mysqli_query($con, "SELECT a.*, b.nama AS nama_kategori FROM unit_mobil a JOIN kategori b ON a.kategori_id=b.id WHERE a.id='$id'");
$data = mysqli_fetch_array($query);

$queryKategori = mysqli_query($con, "SELECT * FROM kategori WHERE id!='$data[kategori_id]'");
?>

<!DOCTYPE html>
<html lang="en">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unit Detail</title>
</head>
<style>
    form div {
        margin-bottom: 10px;
    }
</style>

<body>
    <?php require "navbar.php"; ?>
    <div class="container mt-4">
        <h2>Detail Unit</h2>

        <div class="col-12 col-md-6 mb-5">
            <form action="" method="post" enctype="multipart/form-data">
                <div>
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" id="nama" class="form-control" value="<?php echo $data['nama_kendaraan']; ?>" autocomplete="off" required>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="kategori" class="form-label">Kategori</label>
                        <select id="kategori" name="kategori" class="form-control" required>
                            <option value="<?php echo $data['kategori_id']; ?>"><?php echo $data['nama_kategori']; ?></option>
                            <?php
                            while ($dataKategori = mysqli_fetch_array($queryKategori)) {
                            ?>
                                <option value="<?php echo $dataKategori['id']; ?>"><?php echo $dataKategori['nama']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div>
                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="number" value="<?php echo $data['harga']; ?>" id="harga" name="harga" class="form-control" placeholder="Masukkan harga" required>
                        </div>
                    </div>
                    <div>
                        <label for="currentFoto">Foto Produk Sekarang</label>
                        <img src="../img/<?php echo $data['foto']; ?>" alt="" width="300px">
                    </div>
                    <div class="my-3">
                        <label for="foto">Foto</label>
                        <input type="file" name="foto" id="foto" class="form-control">
                    </div>
                    <div class="my-3">
                        <label for="detail">Detail</label>
                        <textarea name="detail" id="detail" cols="50" rows="5" class="form-control" required>
                            <?php echo $data['detail']; ?>
                        </textarea>
                    </div>
                    <div class="my-3">
                        <label for="ketersediaan_unit">Ketersediaan Unit</label>
                        <select name="ketersediaan_unit" id="ketersediaan_unit" class="form-control" required>
                            <option value="tersedia" <?= $data['ketersediaan_unit'] === 'tersedia' ? 'selected' : '' ?>>Tersedia</option>
                            <option value="tidaktersedia" <?= $data['ketersediaan_unit'] === 'tidaktersedia' ? 'selected' : '' ?>>Tidak Tersedia</option>
                        </select>


                    </div>
                    <button type="submit" class="btn btn-primary" name="simpan">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                    <button type="submit" class="btn btn-danger" name="hapus">
                        <i class="fas fa-save"></i> Hapus
                    </button>
                </div>
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
                    $queryUpdate = mysqli_query($con, "UPDATE unit_mobil SET kategori_id='$kategori', nama_kendaraan='$nama',harga='$harga',detail='$detail',ketersediaan_unit='$ketersediaan_unit' WHERE id=$id");
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
                                $queryUpdate = mysqli_query($con, "UPDATE unit_mobil SET foto='$target_file' WHERE id='$id'");

                                if ($queryUpdate) {
                                ?>
                                    <div class="alert alert-primary mt-3" role="alert">
                                        Unit berhasil di UPDATE
                                    </div>

                                    <meta http-equiv="refresh" content="2; url=unitmobil.php" />
                    <?php

                                } else {
                                    echo mysqli_error($con);
                                }
                            }
                        }
                    }
                }
            }

            if (isset($_POST['hapus'])) {
                $queryHapus = mysqli_query($con, "DELETE FROM unit_mobil WHERE id='$id'");

                if ($queryHapus) {
                    ?>
                    <div class="alert alert-primary mt-3" role="alert">
                        Unit Baru Berhasil diHapus
                    </div>
                    <meta http-equiv="refresh" content="1; url=unitmobil.php" />
            <?php
                }
            }
            ?>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>