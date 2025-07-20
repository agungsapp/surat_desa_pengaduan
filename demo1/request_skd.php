<?php include '../koneksi/konek1.php'; ?>
<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script>
<?php
$tampil_nik = "SELECT * FROM data_user WHERE nik=$_SESSION[nik]";
$query = mysqli_query($konek1, $tampil_nik);
$data = mysqli_fetch_array($query, MYSQLI_BOTH);
$nik = $data['nik'];
$nama = $data['nama'];
?>
<div class="page-inner">
	<div class="row">
		<div class="col-md-12">
			<form method="POST" enctype="multipart/form-data">
				<div class="card">
					<div class="card-header">
						<div class="card-title">FORM TAMBAH REQUEST SURAT KETERANGAN DOMISILI</div>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-6 col-lg-6">
								<div class="form-group">
									<label>NIK</label>
									<input type="text" class="form-control" value="<?= $nik . ' - ' . $nama; ?>" readonly>
								</div>
								<div class="form-group">
									<input type="hidden" name="nik" class="form-control" value="<?= $nik; ?>" readonly>
								</div>

								<input type="hidden" name="keperluan" class="form-control" placeholder="Keperluan Anda.." value="kosong" autofocus>


								<input type="hidden" name="alamat" class="form-control" value="kosong" placeholder="Masukan alamat lengkap (contoh: nama jalan, rt/rw, nama desa..)">

							</div>
							<div class="col-md-6 col-lg-6">
								<div class="form-group">
									<label>Scan KTP</label>
									<input type="file" name="ktp" class="form-control" size="37" required>
								</div>
								<div class="form-group">
									<label>Scan KK</label>
									<input type="file" name="kk" class="form-control" size="37" required>
								</div>
							</div>
						</div>
					</div>
					<div class="card-action">
						<button name="kirim" class="btn btn-success">Kirim</button>
						<a href="?halaman=beranda" class="btn btn-default">Batal</a>
					</div>
				</div>
		</div>
		</form>
	</div>
</div>

<?php
if (isset($_POST['kirim'])) {
	$nik = $_POST['nik'];
	$keperluan = $_POST['keperluan'];

	// Buat nama file yang unik
	$uniq = time(); // atau gunakan uniqid() untuk lebih acak

	$file_ktp = $nik . "_ktp_" . $uniq . ".jpg";
	$file_kk  = $nik . "_kk_" . $uniq . ".jpg";

	// Simpan ke database
	$sql = "INSERT INTO data_request_skd (nik, scan_ktp, scan_kk, keperluan) 
	        VALUES ('$nik', '$file_ktp', '$file_kk', '$keperluan')";
	$query = mysqli_query($konek1, $sql) or die(mysqli_error($konek1));

	if ($query) {
		// Simpan file ke folder jika benar diupload
		if (is_uploaded_file($_FILES['ktp']['tmp_name'])) {
			copy($_FILES['ktp']['tmp_name'], "../dataFoto/scan_ktp/" . $file_ktp);
		}
		if (is_uploaded_file($_FILES['kk']['tmp_name'])) {
			copy($_FILES['kk']['tmp_name'], "../dataFoto/scan_kk/" . $file_kk);
		}

		echo "<script language='javascript'>swal('Selamat...', 'Kirim Berhasil', 'success');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_status">';
	} else {
		echo "<script language='javascript'>swal('Gagal...', 'Kirim Gagal', 'error');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=request_skd">';
	}
}
?>