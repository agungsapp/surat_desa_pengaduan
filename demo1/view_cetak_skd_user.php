<?php include '../koneksi/konek1.php';
include '../phpqrcode/qrlib.php';

	if(isset($_GET['id_request_skd'])){
		$id=$_GET['id_request_skd'];
		$sql = "SELECT * FROM data_request_skd natural join data_user WHERE id_request_skd='$id'";
		$query = mysqli_query($konek1,$sql);
        $data = mysqli_fetch_array($query,MYSQLI_BOTH);
        $id=$data['id_request_skd'];
        $nik = $data['nik'];
		$nama = $data['nama'];
		$tempat = $data['tempat_lahir'];
        $tgl = $data['tanggal_lahir'];
        $tgl2 = $data['tanggal_request'];
        $format1 = date('Y', strtotime($tgl2));
        $format2 = date('d-m-Y', strtotime($tgl));
        $format3 = date('d F Y', strtotime($tgl2));
		$agama = $data['agama'];
		$jekel = $data['jekel'];
		$nama = $data['nama'];
		$alamat = $data['alamat'];
		$status_warga = $data['status_warga'];
        $kawin = $data['kawin'];
        $request = $data['request'];
        $keterangan = $data['keterangan'];
        $pekerjaan = $data['pekerjaan'];
        $keperluan = $data['keperluan'];
        $status = $data['status'];
        $acc = $data['acc'];
        $format4 = date('d F Y', strtotime($acc));
        if($format4==0){
            $format4="kosong";
        }elseif($format4==1){
           $format4;
        }

        if($status==3){
            $keterangan="Sudah ACC Lurah, surat sedang dalam proses cetak oleh staf";
        }

    // === Generate QR Code setelah semua data aman ===
    $link_verifikasi = "http://localhost/surat_keterangan_desa/verifikasi_surat.php?jenis=skd&id=$id";
        $nama_file_qr = "../phpqrcode/skd_qr_$id.png";
        QRcode::png($link_verifikasi, $nama_file_qr, QR_ECLEVEL_H, 4);
        
    } else {
        die("ID request tidak ditemukan!");
    }
?>
<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script> 
 <div class="panel-header bg-primary-gradient">
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h2 class="text-white pb-2 fw-bold"></h2>
							</div>
						</div>
					</div>
                </div>
                <div class="page-inner mt--5">
					<div class="row mt--2">
						<div class="col-md-6">
							<div class="card full-height">
								<div class="card-body">
								    <div class="card-tools">
                                        <form action="" method="POST">
                                            <div class="form-group">
                                                
                                                <div class="form-group">
                                                         <?php if ($acc != "BELUM TTD") { ?>
    <a href="cetak_skd.php?id_request_skd=<?= $id ?>" target="_blank" class="btn btn-success btn-sm">
        <i class="fas fa-print"></i> Cetak Surat
    </a>
<?php } ?>

                                                </div>
                                            </div>
                                        </form>
                                        <?php
                                        if(isset($_POST['ttd'])){
                                            $ket="Surat sedang dalam proses cetak";
                                            $tgl = $_POST['tgl_acc'];
                                            $update = mysqli_query($konek1,"UPDATE data_request_skd SET acc='$tgl', status=2, keterangan='$ket' WHERE id_request_skd=$id");
                                            if($update){
                                                echo "<script language='javascript'>swal('Selamat...', 'ACC Lurah Berhasil', 'success');</script>" ;
                                                echo '<meta http-equiv="refresh" content="3; url=?halaman=belum_acc_sktm">';
                                            }else{
                                                echo "<script language='javascript'>swal('Gagal...', 'ACC Lurah Gagal', 'error');</script>" ;
                                                echo '<meta http-equiv="refresh" content="3; url=?halaman=view_sktm">';
                                            }

                                        }
                                        ?>
									</div>
								</div>
							</div>
						</div>
					</div>
                    
                    <?php
// Format tanggal Indonesia
$bulan = [
    1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
    'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
];

$tanggal = date('d');
$bulanIndo = $bulan[(int)date('m')];
$tahun = date('Y');

$format3 = "$tanggal $bulanIndo $tahun"; // Contoh hasil: 09 Mei 2025
?>

<div class="a4-container" style="font-family: 'Times New Roman', Times, serif; font-size: 12pt; padding: 40px;">
    <table style="text-align: center; border-bottom: 3px solid black; padding-bottom: 10px; width: 100%;">
        <tr>
            <td style="width: 80px;"><img src="img/logopes.png" width="70" height="90"></td>
            <td>
                <div style="line-height: 1.3;">
                    <strong style="font-size: 16pt;">PEMERINTAH KABUPATEN PESAWARAN</strong><br>
                    <strong style="font-size: 15pt;">KECAMATAN GEDONG TATAAN</strong><br>
                    <strong style="font-size: 17pt;">DESA BOGOREJO</strong><br>
                    <span style="font-size: 10pt;"><i>Sekretariat: Jln. Sriyono Desa Bogorejo, Kec. Gedong Tataan, Kab. Pesawaran Kode Pos 35366</i></span>
                </div>
            </td>
        </tr>
    </table>

    <br>

    <div style="text-align: center;">
        <u><strong style="font-size: 14pt;">SURAT KETERANGAN DOMISILI</strong></u><br>
        <span>Nomor: 145 / 0<?= $id; ?> / V.01.17 / | / 2025</span>
    </div>

    <br>

    <p style="font-size: 12pt;">Yang bertanda tangan di bawah ini, Kepala Desa Bogorejo Kecamatan Gedong Tataan Kabupaten Pesawaran, menerangkan dengan sesungguhnya bahwa:</p>

    <table style="margin-left: 20px;">
        <tr><td width="180px">Nama</td><td>: <?= strtoupper($nama);?></td></tr>
        <tr><td>NIK</td><td>: <?= $nik; ?></td></tr>
        <tr><td>Tempat, Tanggal Lahir</td><td>: <?= ucwords ($tempat) . ', ' . $format2; ?></td></tr>
        <tr><td>Jenis Kelamin</td><td>: <?= $jekel; ?></td></tr>
        <tr><td>Agama</td><td>: <?= $agama; ?></td></tr>
        <tr><td>Pekerjaan</td><td>: <?= $pekerjaan; ?></td></tr>
        <tr><td>Status Perkawinan</td><td>: <?= $kawin; ?></td></tr>
        <tr><td>Alamat</td><td>: <?= $alamat; ?></td></tr>
    </table>

    <br>

    <p style="font-size: 12pt;">Nama identitas di atas sesuai dengan keterangan dari pamong setempat (Ketua RT) adalah benar berdomisili di <?= ucwords ($alamat)?></p>
    <p style="font-size: 12pt; margin: 0;">Demikian Surat Keterangan Domisili ini disampaikan, agar dipergunakan sebagaimana mestinya</p>
    
    <br><br><br>

    <table width="100%">
    <tr>
        <td style="width: 20%;"></td> <!-- Mengatur lebar kiri lebih kecil -->
        <td style="float: right; text-align: left; padding-right: 30px;"> <!-- Memberi jarak ke kanan dengan padding -->
            Bogorejo, <?= $format3; ?><br>
            KEPALA DESA BOGOREJO,<br><br>
            <img src="../phpqrcode/skd_qr_<?= $id; ?>.png" width="80" height="80"><br>
            <u><b>(HERMANSYAH)</b></u>
        </td>
        <td style="width: 20%;"></td> <!-- Menambah ruang kosong di kanan untuk menyeimbangkan -->
    </tr>
</table>


</div>