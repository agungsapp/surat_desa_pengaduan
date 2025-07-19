<?php
$konek2 = mysqli_connect("localhost", "root", "root", "pengaduan_masyarakat");

if (!$konek2) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
