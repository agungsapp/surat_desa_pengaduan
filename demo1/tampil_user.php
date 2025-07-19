<?php 
// Pastikan file koneksi dapat di-include dengan benar
$konek_path = '../koneksi/konek1.php';
if (file_exists($konek_path)) {
    include($konek_path);
} else {
    die("File konek1.php tidak ditemukan. Pastikan file tersebut ada di folder yang benar.");
}

// Pastikan koneksi berhasil
if (!$konek1) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>

<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script> 

<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="fw-bold text-uppercase">TAMPIL ACC REQUEST SURAT KETERANGAN TIDAK MAMPU</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST">
                        <div class="table-responsive">
                            <table id="add1" class="display table table-striped table-hover" >
                                <thead>
                                    <tr>
                                        <th>Tanggal Request</th>
                                        <th>NIK</th>
                                        <th>Nama Lengkap</th>
                                        <th>Scan KTP</th>
                                        <th>Scan KK</th>
                                        <th>Keperluan</th>
                                        <th style="width: 10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    // Perbaiki query untuk mengambil data yang relevan
                                    $sql = "SELECT * FROM data_request_sktm NATURAL JOIN data_user WHERE status = 0";
                                    $query = mysqli_query($konek1, $sql);
                                    if ($query) {
                                        while($data = mysqli_fetch_array($query, MYSQLI_BOTH)) {
                                            $id_request_sktm = $data['id_request_sktm'];
                                            $tgl = $data['tanggal_request'];
                                            $format = date('d F Y', strtotime($tgl));
                                            $nik = $data['nik'];
                                            $nama = $data['nama'];
                                            $status = $data['status'];
                                            $ktp = $data['scan_ktp'];
                                            $kk = $data['scan_kk'];
                                            $keperluan = $data['keperluan'];

                                            // Menyederhanakan status dengan menggunakan kondisi
                                            $status_text = ($status == "1") ? "<b style='color:blue'>ACC</b>" : "<b style='color:red'>BELUM ACC</b>";
                                    ?>
                                    <tr>
                                        <td><?php echo $format; ?></td>
                                        <td><?php echo $nik; ?></td>
                                        <td><?php echo $nama; ?></td>
                                        <td><img src="../dataFoto/scan_ktp/<?php echo $ktp; ?>" width="50" height="50" alt=""></td>
                                        <td><img src="../dataFoto/scan_kk/<?php echo $kk; ?>" width="50" height="50" alt=""></td>
                                        <td><?php echo $keperluan; ?></td>
                                        <td>
                                            <input type="checkbox" name="check[<?php echo $i; ?>]" value="<?php echo $id_request_sktm; ?>">
                                            <input type="submit" name="acc" class="btn btn-primary btn-sm" value="ACC">
                                            <div class="form-button-action">
                                                <a type="button" data-toggle="tooltip" title="Cek Data" class="btn btn-link btn-primary btn-lg" href="?halaman=detail_sktm&id_request_sktm=<?= $id_request_sktm; ?>">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                        }
                                    } else {
                                        echo "<tr><td colspan='7'>Data tidak ditemukan.</td></tr>";
                                    }
                                    ?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
// Menangani form submit untuk ACC request
if (isset($_POST['acc'])) {
    if (isset($_POST['check'])) {
        foreach ($_POST['check'] as $value) {
            // Mengamankan ID request dengan int
            $value = intval($value);

            // Query untuk update status
            $ubah = "UPDATE data_request_sktm SET status = 1 WHERE id_request_sktm = $value"; 

            // Eksekusi query dan tampilkan alert sesuai hasilnya
            $query = mysqli_query($konek1, $ubah);

            if ($query) {
                echo "<script language='javascript'>swal('Selamat...', 'ACC Staf Berhasil!', 'success');</script>";
                echo '<meta http-equiv="refresh" content="2; url=?halaman=sudah_acc_sktm">';
            } else {
                echo "<script language='javascript'>swal('Gagal...', 'ACC Staf Gagal!', 'error');</script>";
                echo '<meta http-equiv="refresh" content="2; url=?halaman=sudah_acc_sktm">';
            }
        }
    }
}
?>
