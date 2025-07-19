<?php
include 'koneksi/konek1.php';

if (isset($_POST['nik'])) {
    $nik = $_POST['nik'];
    $cek = mysqli_query($konek1, "SELECT * FROM data_user WHERE nik = '$nik'");
    if (mysqli_num_rows($cek) > 0) {
        echo 'ada';
    } else {
        echo 'tidak';
    }
}
?>
