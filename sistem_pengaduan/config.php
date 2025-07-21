<?php
$host = 'localhost';
$dbname = 'vrrs2386_pengaduan_masyarakat';
$username = 'vrrs2386_bogorejo';
$password = 'bogorejo2025@#*';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Koneksi database gagal: " . $e->getMessage());
}
