<?php
include_once __DIR__ . '/../../../config.php'; // menyesuaikan posisi file sekarang
include_once KONEKSI_PATH . '/konek3.php';

$id_kartu = $_GET['id_kartu'];

// Ambil data KK dari tb_kk
$tb_kk = mysqli_fetch_assoc(mysqli_query($konek3, "SELECT * FROM tb_kk WHERE id_kk = '$id_kartu'"));
if ($tb_kk) {
    // Data ada, lanjutkan untuk menampilkan informasi
} else {
    echo "Data KK tidak ditemukan.";
}

// Ambil data anggota dari tb_anggota JOIN tb_pdd (penduduk)
$anggota = mysqli_query($konek3, "
    SELECT p.nama, p.nik, p.jekel, p.tempat_lh, p.tgl_lh, p.pekerjaan, a.hubungan 
    FROM tb_anggota a 
    JOIN tb_pdd p ON a.id_pend = p.id_pend 
    WHERE a.id_kk = '$id_kartu'
");
if (mysqli_num_rows($anggota) > 0) {
    // Jika ada data anggota keluarga, lanjutkan menampilkan tabel
} else {
    echo "Anggota keluarga tidak ditemukan.";
}

?>


<!DOCTYPE html>
<html>

<head>
    <title>Cetak Kartu Keluarga</title>
    <style>
        body {
            font-family: Arial;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }

        h2,
        h4 {
            text-align: center;
        }
    </style>
</head>

<body onload="window.print()">

    <h2>Data Kartu Keluarga</h2>
    <h4>No. KK: <?= $tb_kk['no_kk']; ?></h4>


    <p>
    <h4>Kepala Keluarga: <?= isset($tb_kk['kepala']) ? $tb_kk['kepala'] : 'Tidak diketahui'; ?></h4>
    <p><strong>Alamat:</strong> <?= isset($tb_kk['alamat']) ? $tb_kk['alamat'] : 'Tidak diketahui'; ?>, RT <?= isset($tb_kk['rt']) ? $tb_kk['rt'] : '-'; ?>/RW <?= isset($tb_kk['rw']) ? $tb_kk['rw'] : '-'; ?>, Desa <?= isset($tb_kk['desa']) ? $tb_kk['desa'] : 'Tidak diketahui'; ?>, Kecamatan <?= isset($tb_kk['kecamatan']) ? $tb_kk['kecamatan'] : 'Tidak diketahui'; ?>, Kabupaten <?= isset($tb_kk['kabupaten']) ? $tb_kk['kabupaten'] : 'Tidak diketahui'; ?></p>


    </p>

    <h4>Daftar Anggota Keluarga</h4>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIK</th>
                <th>Jenis Kelamin</th>
                <th>Tempat & Tgl Lahir</th>
                <th>Hubungan</th>
                <th>Pekerjaan</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            while ($row = mysqli_fetch_assoc($anggota)) {
                echo "<tr>
                        <td>{$no}</td>
                        <td>{$row['nama']}</td>
                        <td>{$row['nik']}</td>
                        <td>{$row['jekel']}</td>
                        <td>{$row['tempat_lh']}, {$row['tgl_lh']}</td>
                        <td>{$row['hubungan']}</td>
                        <td>{$row['pekerjaan']}</td>
                    </tr>";
                $no++;
            }
            ?>
        </tbody>
    </table>

</body>

</html>