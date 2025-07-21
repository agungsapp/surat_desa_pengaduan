<?php
$konek3 = new mysqli("localhost", "vrrs2386_bogorejo", "bogorejo2025@#*", "vrrs2386_sidkdd");
if ($konek3->connect_error) {
    die("Koneksi 3 gagal: " . $konek3->connect_error);
}
