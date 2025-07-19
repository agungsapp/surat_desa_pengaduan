<?php
$hostname = 'localhost';
$username = 'root';
$password = 'root';
$database = 'surat_keterangan_desa';

$konek1 = mysqli_connect($hostname, $username, $password, $database);
if (!$konek1) {
    die("Koneksi 1 gagal: " . mysqli_connect_error());
}
