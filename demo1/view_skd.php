<?php include '../koneksi/konek1.php';?>
<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script> 
<?php
	if(isset($_GET['id_request_sktm'])){
		$id=$_GET['id_request_sktm'];
		$sql = "SELECT * FROM data_request_sktm natural join data_user WHERE id_request_sktm='$id'";
		$query = mysqli_query($konek1,$sql);
        $data = mysqli_fetch_array($query,MYSQLI_BOTH);
        $id=$data['id_request_sktm'];
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
        $kawin = $data['kawin'];
        $pekerjaan = $data['pekerjaan'];
        $keperluan = $data['keperluan'];
        $nm_ayah = $data['nm_ayah'];
        $pk_ayah = $data['pk_ayah'];
        $nm_ibu = $data['nm_ibu'];
        $pk_ibu = $data['pk_ibu'];
        $acc = $data['acc'];
        $format4 = date('d F Y', strtotime($acc));
        if($acc==0){
            $acc="BELUM TTD";
        }elseif($acc==1){
           $acc;
        }
	}
?>
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
                                                <input type="date" name="tgl_acc" class="form-control">
                                                <div class="form-group">
                                                    <input type="submit" name="ttd" value="ACC" class="btn btn-primary btn-sm">
                                                </div>
                                            </div>
                                        </form>
                                        <?php
                                        if(isset($_POST['ttd'])){
                                            $ket="Surat sedang dalam proses cetak";
                                            $tgl = $_POST['tgl_acc'];
                                            $update = mysqli_query($konek1,"UPDATE data_request_sktm SET acc='$tgl', status=2, keterangan='$ket' WHERE id_request_sktm=$id");
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
            <td style="width: 80px;"><img src="img/kudus.png" width="70" height="90"></td>
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
        <span>Nomor: 145 / 0<?= $id; ?> / V.01.17 / 2025</span>
    </div>

    <br>

    <p style="font-size: 12pt;">Yang bertanda tangan di bawah ini, Kepala Desa Bogorejo Kecamatan Gedong Tataan Kabupaten Pesawaran, menerangkan bahwa:</p>

    <table style="margin-left: 20px;">
        <tr><td width="180px">Nama</td><td>: <?= strtoupper($nama);?></td></tr>
        <tr><td>NIK</td><td>: <?= $nik; ?></td></tr>
        <tr><td>Tempat, Tanggal Lahir</td><td>: <?= $tempat . ', ' . $format2; ?></td></tr>
        <tr><td>Jenis Kelamin</td><td>: <?= $jekel; ?></td></tr>
        <tr><td>Agama</td><td>: <?= $agama; ?></td></tr>
        <tr><td>Pekerjaan</td><td>: <?= $pekerjaan; ?></td></tr>
        <tr><td>Status Perkawinan</td><td>: <?= $kawin; ?></td></tr>
        <tr><td>Alamat</td><td>: <?= $alamat; ?></td></tr>
    </table>

    <br>

    <p style="font-size: 12pt; margin: 0;">Nama tersebut di atas sesuai dengan keterangan dari pamong setempat (Ketua RT) adalah benar berdomisili di <?= $alamat; ?> Desa Bogorejo, Kecamatan Gedong Tataan, Kabupaten Pesawaran.</p>
    <p style="font-size: 12pt; margin: 0;">Demikian Surat keterangan Domisili ini diberikan untuk dapat dipergunakan sebagaimana mestinya:</p>
    
<br>
<div style="text-align: center;">
    <u><strong style="font-size: 16pt;"><?= ucwords(strtolower($keperluan)); ?></strong></u><br>
</div>


<br><p style="font-size: 12pt; margin: 0;">Demikian Surat Keterangan ini disampaikan, agar dipergunakan sebagaimana mestinya</p>
    
    <br><br><br>

    <table width="100%">
    <tr>
        <td style="width: 20%;"></td> <!-- Mengatur lebar kiri lebih kecil -->
        <td style="float: right; text-align: left; padding-right: 30px;"> <!-- Memberi jarak ke kanan dengan padding -->
            Bogorejo, <?= $format3; ?><br>
            KEPALA DESA BOGOREJO,<br><br>
            <img src="img/kudus.png" width="120" height="80" style="margin-bottom: -10px;"><br><br>
            <u><b>(HERMANSYAH)</b></u>
        </td>
        <td style="width: 20%;"></td> <!-- Menambah ruang kosong di kanan untuk menyeimbangkan -->
    </tr>
</table>


</div>
