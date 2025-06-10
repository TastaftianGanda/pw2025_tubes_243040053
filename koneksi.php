<?php
// Koneksi ke database MySQL
$con = mysqli_connect("localhost", "root", "", "db_mobil");

// Cek koneksi
if (!$con) {
   die("Koneksi gagal: " . mysqli_connect_error());
}
