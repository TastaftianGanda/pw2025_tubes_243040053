<?php
require "session.php";
require "../koneksi.php";

// Validasi parameter ID - cek berbagai kemungkinan parameter
$id = null;
if (isset($_GET['q']) && !empty($_GET['q'])) {
    $id = mysqli_real_escape_string($con, $_GET['q']);
} elseif (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = mysqli_real_escape_string($con, $_GET['id']);
} else {
    echo "<script>alert('ID unit tidak ditemukan!'); window.location.href='unitmobil.php';</script>";
    exit;
}

// Query untuk mendapatkan data unit
$query = mysqli_query($con, "SELECT a.*, b.nama AS nama_kategori FROM unit_mobil a JOIN kategori b ON a.kategori_id=b.id WHERE a.id='$id'");

// Cek apakah data ditemukan
if (!$query || mysqli_num_rows($query) == 0) {
    echo "<script>alert('Unit tidak ditemukan!'); window.location.href='unitmobil.php';</script>";
    exit;
}

$data = mysqli_fetch_array($query);

// Query untuk mendapatkan kategori lain
$queryKategori = mysqli_query($con, "SELECT * FROM kategori WHERE id!='$data[kategori_id]'");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Unit - <?php echo htmlspecialchars($data['nama_kendaraan']); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<style>
    .form-container {
        background: #fff;
        border-radius: 15px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        padding: 2rem;
        margin-top: 2rem;
    }

    .form-title {
        color: #27374D;
        font-weight: 700;
        margin-bottom: 2rem;
        padding-bottom: 1rem;
        border-bottom: 3px solid #526D82;
        position: relative;
    }

    .form-title::after {
        content: '';
        position: absolute;
        bottom: -3px;
        left: 0;
        width: 100px;
        height: 3px;
        background: linear-gradient(45deg, #526D82, #27374D);
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-label {
        font-weight: 600;
        color: #27374D;
        margin-bottom: 0.5rem;
    }

    .form-control,
    .form-select {
        border: 2px solid #e9ecef;
        border-radius: 8px;
        padding: 0.75rem;
        transition: all 0.3s ease;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #526D82;
        box-shadow: 0 0 0 0.2rem rgba(82, 109, 130, 0.25);
    }

    .current-image {
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
        max-width: 100%;
        height: auto;
    }

    .current-image:hover {
        transform: scale(1.02);
    }

    .btn-primary {
        background: linear-gradient(45deg, #526D82, #27374D);
        border: none;
        border-radius: 8px;
        padding: 0.75rem 2rem;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        background: linear-gradient(45deg, #27374D, #526D82);
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(82, 109, 130, 0.4);
    }

    .btn-danger {
        background: linear-gradient(45deg, #dc3545, #c82333);
        border: none;
        border-radius: 8px;
        padding: 0.75rem 2rem;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-danger:hover {
        background: linear-gradient(45deg, #c82333, #dc3545);
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(220, 53, 69, 0.4);
    }

    .btn-secondary {
        background: #6c757d;
        border: none;
        border-radius: 8px;
        padding: 0.75rem 2rem;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-secondary:hover {
        background: #5a6268;
        transform: translateY(-2px);
    }

    .alert {
        border-radius: 10px;
        border: none;
        margin-top: 1rem;
    }

    .image-preview {
        background: #f8f9fa;
        border: 2px dashed #dee2e6;
        border-radius: 10px;
        padding: 2rem;
        text-align: center;
        margin-top: 1rem;
    }

    .breadcrumb {
        background: none;
        padding: 0;
        margin-bottom: 2rem;
    }

    .breadcrumb-item a {
        color: #526D82;
        text-decoration: none;
    }

    .breadcrumb-item.active {
        color: #27374D;
    }

    .status-badge {
        padding: 0.5rem 1rem;
        border-radius: 20px;
        font-weight: 600;
        font-size: 0.875rem;
    }

    .status-tersedia {
        background: #d4edda;
        color: #155724;
    }

    .status-tidak-tersedia {
        background: #f8d7da;
        color: #721c24;
    }

    @media (max-width: 768px) {
        .form-container {
            margin: 1rem;
            padding: 1.5rem;
        }

        .btn {
            width: 100%;
            margin-bottom: 0.5rem;
        }
    }
</style>

<body>
    <?php require "navbar.php"; ?>

    <div class="container mt-4">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php"><i class="fas fa-home"></i> Dashboard</a></li>
                <li class="breadcrumb-item"><a href="unitmobil.php"><i class="fas fa-car"></i> Unit Mobil</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detail Unit</li>
            </ol>
        </nav>

        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">
                <div class="form-container">
                    <h2 class="form-title">
                        <i class="fas fa-edit me-2"></i>Detail Unit Mobil
                    </h2>

                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <!-- Kolom Kiri -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama" class="form-label">
                                        <i class="fas fa-car me-2"></i>Nama Kendaraan
                                    </label>
                                    <input type="text" name="nama" id="nama" class="form-control"
                                        value="<?php echo htmlspecialchars($data['nama_kendaraan']); ?>"
                                        autocomplete="off" required>
                                </div>

                                <div class="form-group">
                                    <label for="kategori" class="form-label">
                                        <i class="fas fa-tag me-2"></i>Kategori
                                    </label>
                                    <select id="kategori" name="kategori" class="form-select" required>
                                        <option value="<?php echo $data['kategori_id']; ?>" selected>
                                            <?php echo htmlspecialchars($data['nama_kategori']); ?>
                                        </option>
                                        <?php while ($dataKategori = mysqli_fetch_array($queryKategori)) { ?>
                                            <option value="<?php echo $dataKategori['id']; ?>">
                                                <?php echo htmlspecialchars($dataKategori['nama']); ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="harga" class="form-label">
                                        <i class="fas fa-money-bill-wave me-2"></i>Harga per Hari
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text">Rp</span>
                                        <input type="number" value="<?php echo $data['harga']; ?>"
                                            id="harga" name="harga" class="form-control"
                                            placeholder="Masukkan harga" required min="0">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="ketersediaan_unit" class="form-label">
                                        <i class="fas fa-check-circle me-2"></i>Ketersediaan Unit
                                    </label>
                                    <select name="ketersediaan_unit" id="ketersediaan_unit" class="form-select" required>
                                        <option value="tersedia" <?= $data['ketersediaan_unit'] === 'tersedia' ? 'selected' : '' ?>>
                                            Tersedia
                                        </option>
                                        <option value="tidaktersedia" <?= $data['ketersediaan_unit'] === 'tidaktersedia' ? 'selected' : '' ?>>
                                            Tidak Tersedia
                                        </option>
                                    </select>
                                    <div class="mt-2">
                                        <span class="status-badge <?= $data['ketersediaan_unit'] === 'tersedia' ? 'status-tersedia' : 'status-tidak-tersedia' ?>">
                                            Status: <?= $data['ketersediaan_unit'] === 'tersedia' ? 'Tersedia' : 'Tidak Tersedia' ?>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <!-- Kolom Kanan -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="currentFoto" class="form-label">
                                        <i class="fas fa-image me-2"></i>Foto Saat Ini
                                    </label>
                                    <div class="text-center">
                                        <img src="../img/<?php echo htmlspecialchars($data['foto']); ?>"
                                            alt="<?php echo htmlspecialchars($data['nama_kendaraan']); ?>"
                                            class="current-image"
                                            style="max-width: 300px; max-height: 200px; object-fit: cover;"
                                            onerror="this.src='../img/default-car.jpg'">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="foto" class="form-label">
                                        <i class="fas fa-camera me-2"></i>Ganti Foto (Opsional)
                                    </label>
                                    <input type="file" name="foto" id="foto" class="form-control"
                                        accept="image/jpeg,image/png,image/gif">
                                    <div class="form-text">
                                        <i class="fas fa-info-circle me-1"></i>
                                        Format: JPG, PNG, GIF. Maksimal 10MB.
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="detail" class="form-label">
                                        <i class="fas fa-align-left me-2"></i>Detail Kendaraan
                                    </label>
                                    <textarea name="detail" id="detail" class="form-control"
                                        rows="6" required placeholder="Masukkan detail kendaraan..."><?php echo htmlspecialchars($data['detail']); ?></textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Tombol Aksi -->
                        <div class="row mt-4">
                            <div class="col-12">
                                <div class="d-flex flex-wrap gap-2 justify-content-center">
                                    <button type="submit" class="btn btn-primary" name="simpan">
                                        <i class="fas fa-save me-2"></i>Simpan Perubahan
                                    </button>
                                    <button type="button" class="btn btn-secondary" onclick="window.location.href='unitmobil.php'">
                                        <i class="fas fa-arrow-left me-2"></i>Kembali
                                    </button>
                                    <button type="submit" class="btn btn-danger" name="hapus"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus unit ini?')">
                                        <i class="fas fa-trash me-2"></i>Hapus Unit
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <?php
                    // Proses Simpan
                    if (isset($_POST['simpan'])) {
                        $nama = htmlspecialchars($_POST['nama']);
                        $kategori = htmlspecialchars($_POST['kategori']);
                        $harga = htmlspecialchars($_POST['harga']);
                        $detail = htmlspecialchars($_POST['detail']);
                        $ketersediaan_unit = htmlspecialchars($_POST['ketersediaan_unit']);

                        if (empty($nama) || empty($kategori) || empty($harga) || empty($detail)) {
                            echo '<div class="alert alert-danger mt-3" role="alert">
                                    <i class="fas fa-exclamation-triangle me-2"></i>
                                    Mohon lengkapi semua field yang diperlukan!
                                  </div>';
                        } else {
                            // Update data utama
                            $queryUpdate = mysqli_query($con, "UPDATE unit_mobil SET kategori_id='$kategori', nama_kendaraan='$nama', harga='$harga', detail='$detail', ketersediaan_unit='$ketersediaan_unit' WHERE id='$id'");

                            // Proses upload foto jika ada
                            $upload_success = true;
                            $upload_message = '';

                            if (!empty($_FILES["foto"]["name"])) {
                                $target_dir = "../img/";
                                $nama_file = basename($_FILES["foto"]["name"]);
                                $target_file = $target_dir . $nama_file;
                                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                                $image_size = $_FILES["foto"]["size"];

                                if ($image_size > 10000000) {
                                    $upload_success = false;
                                    $upload_message = 'Ukuran foto tidak boleh lebih dari 10MB';
                                } elseif (!in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
                                    $upload_success = false;
                                    $upload_message = 'Format foto harus JPG, JPEG, PNG, atau GIF';
                                } else {
                                    if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
                                        $queryUpdateFoto = mysqli_query($con, "UPDATE unit_mobil SET foto='$nama_file' WHERE id='$id'");
                                        if (!$queryUpdateFoto) {
                                            $upload_success = false;
                                            $upload_message = 'Gagal mengupdate foto di database';
                                        }
                                    } else {
                                        $upload_success = false;
                                        $upload_message = 'Gagal mengupload foto';
                                    }
                                }
                            }

                            if ($queryUpdate && $upload_success) {
                                echo '<div class="alert alert-success mt-3" role="alert">
                                        <i class="fas fa-check-circle me-2"></i>
                                        Unit berhasil diperbarui!
                                      </div>';
                                echo '<meta http-equiv="refresh" content="2; url=unitmobil.php" />';
                            } else {
                                $error_msg = !$queryUpdate ? 'Gagal mengupdate data: ' . mysqli_error($con) : $upload_message;
                                echo '<div class="alert alert-danger mt-3" role="alert">
                                        <i class="fas fa-exclamation-triangle me-2"></i>
                                        ' . $error_msg . '
                                      </div>';
                            }
                        }
                    }

                    // Proses Hapus
                    if (isset($_POST['hapus'])) {
                        $queryHapus = mysqli_query($con, "DELETE FROM unit_mobil WHERE id='$id'");

                        if ($queryHapus) {
                            echo '<div class="alert alert-success mt-3" role="alert">
                                    <i class="fas fa-check-circle me-2"></i>
                                    Unit berhasil dihapus!
                                  </div>';
                            echo '<meta http-equiv="refresh" content="1; url=unitmobil.php" />';
                        } else {
                            echo '<div class="alert alert-danger mt-3" role="alert">
                                    <i class="fas fa-exclamation-triangle me-2"></i>
                                    Gagal menghapus unit: ' . mysqli_error($con) . '
                                  </div>';
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script>
        // Preview foto sebelum upload
        document.getElementById('foto').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const currentImg = document.querySelector('.current-image');
                    currentImg.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });

        // Format input harga
        document.getElementById('harga').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            e.target.value = value;
        });

        // Validasi form sebelum submit
        document.querySelector('form').addEventListener('submit', function(e) {
            const nama = document.getElementById('nama').value.trim();
            const harga = document.getElementById('harga').value;
            const detail = document.getElementById('detail').value.trim();

            if (!nama || !harga || !detail) {
                e.preventDefault();
                alert('Mohon lengkapi semua field yang diperlukan!');
                return false;
            }

            if (parseInt(harga) <= 0) {
                e.preventDefault();
                alert('Harga harus lebih dari 0!');
                return false;
            }
        });
    </script>
</body>

</html>