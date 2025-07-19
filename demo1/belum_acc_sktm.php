<?php 
// Koneksi ke database
include '../koneksi/konek1.php';

// Cek koneksi
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
                        <h4 class="fw-bold text-uppercase">Belum ACC Request Surat Keterangan Tidak Mampu</h4>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Form untuk submit ACC -->
                    <form action="" method="POST">
                        <div class="table-responsive">
                            <table id="add1" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Tanggal Request</th>
                                        <th>NIK</th>
                                        <th>Nama Lengkap</th>
                                        <th>Status</th>
                                        <th>Scan KTP</th>
                                        <th>Scan KK</th>
                                        <th>Keterangan</th>
                                        <th style="width: 10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Query untuk mengambil data request yang statusnya 1 (belum ACC)
                                    $sql = "SELECT * FROM data_request_sktm NATURAL JOIN data_user WHERE status=1";
                                    $query = mysqli_query($konek1, $sql);

                                    // Cek apakah query berhasil
                                    if (!$query) {
                                        echo "Error: " . mysqli_error($konek1);
                                    } else {
                                        while ($data = mysqli_fetch_array($query, MYSQLI_BOTH)) {
                                            // Format tanggal request
                                            $tgl = $data['tanggal_request'];
                                            $format = date('d F Y', strtotime($tgl));
                                            $nik = $data['nik'];
                                            $nama = $data['nama'];
                                            $status = $data['status'];
                                            $id = $data['id_request_sktm'];
                                            $ktp = $data['scan_ktp'];
                                            $kk = $data['scan_kk'];
                                            $keterangan = $data['keterangan'];
                                            $id_request_sktm = $data['id_request_sktm'];

                                            // Status
                                            $status_text = ($status == "1") ? "Sudah ACC Staf" : "BELUM ACC";
                                    ?>
                                    <tr>
                                        <td><?php echo $format; ?></td>
                                        <td><?php echo $nik; ?></td>
                                        <td><?php echo $nama; ?></td>
                                        <td class="fw-bold text-uppercase text-success op-8"><?php echo $status_text; ?></td>
                                        <td><img src="../dataFoto/scan_ktp/<?php echo $ktp; ?>" width="50" height="50" alt=""></td>
                                        <td><img src="../dataFoto/scan_kk/<?php echo $kk; ?>" width="50" height="50" alt=""></td>
                                        <td><i><?php echo $keterangan; ?></i></td>
                                        <td>
                                            <div class="form-button-action">
                                                <a type="button" data-toggle="tooltip" title="Lihat Surat" class="btn btn-link btn-primary btn-lg" href="?halaman=view_sktm&id_request_sktm=<?= $id_request_sktm; ?>">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                        }
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
// Proses untuk ACC (update status)
if (isset($_POST['acc'])) {
    if (isset($_POST['check'])) {
        foreach ($_POST['check'] as $value) {
            // Update status permintaan menjadi ACC (status = 1)
            $ubah = "UPDATE data_request_sktm SET status = 1 WHERE id_request_sktm = $value";
            $query = mysqli_query($konek1, $ubah);

            // Cek apakah query berhasil
            if ($query) {
                // Jika berhasil, tampilkan SweetAlert dan refresh halaman
                echo "<script language='javascript'>swal('Selamat...', 'ACC Berhasil!', 'success');</script>";
                echo '<meta http-equiv="refresh" content="3; url=?halaman=belum_acc_sktm">';
            } else {
                // Jika gagal, tampilkan SweetAlert dan refresh halaman
                echo "<script language='javascript'>swal('Gagal...', 'ACC Gagal!', 'error');</script>";
                echo '<meta http-equiv="refresh" content="3; url=?halaman=belum_acc_sktm">';
            }
        }
    }
}
?>
