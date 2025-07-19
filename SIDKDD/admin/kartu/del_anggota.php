<?php
include_once __DIR__ . '/../../../config.php'; // menyesuaikan posisi file sekarang
include_once KONEKSI_PATH . '/konek3.php';

if (isset($_GET['kode'])) {
    $sql_hapus = "DELETE FROM tb_anggota WHERE id_anggota='" . $_GET['kode'] . "'";
    $query_hapus = mysqli_query($konek3, $sql_hapus);

    $kode = $_GET['kode'];

    if ($query_hapus) {
        echo "<script>
                Swal.fire({title: 'Hapus Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                        window.location = 'index.php?page=data-kartu';
                    }
                })</script>";
    } else {
        echo "<script>
                Swal.fire({title: 'Hapus Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                        window.location = 'index.php?page=data-kartu';
                    }
                })</script>";
    }
}
