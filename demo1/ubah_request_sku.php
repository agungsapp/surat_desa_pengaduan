<?php include '../koneksi/konek1.php'; ?>
<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script>
<?php
if (isset($_GET['id_request_sku'])) {
	$id = $_GET['id_request_sku'];
	$tampil_nik = "SELECT * FROM data_request_sku NATURAL JOIN data_user WHERE id_request_sku=$id";
	$query = mysqli_query($konek1, $tampil_nik);
	$data = mysqli_fetch_array($query, MYSQLI_BOTH);
	$id = $data['id_request_sku'];
	$nik = $data['nik'];
	$nama = $data['nama'];
	$usaha = $data['usaha'];
	$keperluan = $data['keperluan'];
	$ktp = $data['scan_ktp'];
	$kk = $data['scan_kk'];
}
?>
<div class="page-inner">
	<div class="row">
		<div class="col-md-12">
			<form method="POST" enctype="multipart/form-data">
				<div class="card">
					<div class="card-header">
						<div class="card-title">UBAH DATA REQUEST SURAT KETERANGAN USAHA</div>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-6 col-lg-6">
								<input type="hidden" name="id_request_sku" value="<?= $id; ?>">
								<div class="form-group">
									<label>NIK</label>
									<input type="text" name="nik" class="form-control" value="<?= $nik . ' - ' . $nama; ?>" readonly>
								</div>
								<div class="form-group">
									<label>Usaha</label>
									<input type="text" name="usaha" class="form-control" value="<?= $usaha; ?>" placeholder="Usaha Anda.." autofocus>
								</div>
								<div class="form-group">
									<label>Keperluan</label>
									<input type="text" name="keperluan" class="form-control" value="<?= $keperluan; ?>" placeholder="Keperluan Anda..">
								</div>
							</div>
							<div class="col-md-6 col-lg-6">
								<div class="form-group">
									<label>Scan KTP</label><br>
									<img src="../dataFoto/scan_ktp/<?= $ktp; ?>" width="200" height="100" alt="">
								</div>
								<div class="form-group">
									<input type="file" name="ktp" class="form-control" size="37">
								</div>
								<div class="form-group">
									<label>Scan KTP</label><br>
									<img src="../dataFoto/scan_kk/<?= $kk; ?>" width="200" height="100" alt="">
								</div>
								<div class="form-group">
									<label>Scan KK</label>
									<input type="file" name="kk" class="form-control" size="37">
								</div>
							</div>
						</div>
					</div>
					<div class="card-action">
						<button name="ubah" class="btn btn-success">Ubah</button>
						<a href="?halaman=tampil_status" class="btn btn-default">Batal</a>
					</div>
				</div>
		</div>
		</form>
	</div>
</div>
<?php
if (isset($_POST['ubah'])) {
	$usaha = $_POST['usaha'];
	$keperluan = $_POST['keperluan'];
	$nik = $_POST['nik'];
	$id = $_POST['id_request_sku']; // pastikan ID ini dikirim dari form

	// Inisialisasi query
	$sql_update = "UPDATE data_request_sku SET 
		usaha='$usaha',
		keperluan='$keperluan'";

	// Cek upload KTP
	if (isset($_FILES['ktp']) && $_FILES['ktp']['error'] == 0) {
		$file_ktp = $nik . "_ktp.jpg";
		$sql_update .= ", scan_ktp='$file_ktp'";
		$ktp_uploaded = true;
	}

	// Cek upload KK
	if (isset($_FILES['kk']) && $_FILES['kk']['error'] == 0) {
		$file_kk = $nik . "_kk.jpg";
		$sql_update .= ", scan_kk='$file_kk'";
		$kk_uploaded = true;
	}

	$sql_update .= " WHERE id_request_sku=$id";
	$query = mysqli_query($konek1, $sql_update);

	if ($query) {
		// Copy file jika memang diupload
		if (!empty($ktp_uploaded)) {
			copy($_FILES['ktp']['tmp_name'], "../dataFoto/scan_ktp/" . $file_ktp);
		}
		if (!empty($kk_uploaded)) {
			copy($_FILES['kk']['tmp_name'], "../dataFoto/scan_kk/" . $file_kk);
		}
		echo "<script language='javascript'>swal('Selamat...', 'Ubah Berhasil', 'success');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_status">';
	} else {
		echo "<script language='javascript'>swal('Gagal...', 'Ubah Gagal', 'error');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_status">';
	}
}
?>