<?php
$konek3 = new mysqli("localhost", "root", "root", "sidkdd");
if ($konek3->connect_error) {
    die("Koneksi 3 gagal: " . $konek3->connect_error);
}
