<?php include '../koneksi/konek1.php';?>

<?php
	if(isset($_GET['nik'])){
		$tampil_nik = "SELECT * FROM data_user WHERE nik='$_SESSION[nik]'";
		$query = mysqli_query($konek1,$tampil_nik);
		$data = mysqli_fetch_array($query,MYSQLI_BOTH);
		$nik = $data['nik'];
		$nama = $data['nama'];
		$tempat = $data['tempat_lahir'];
		$tanggal = $data['tanggal_lahir'];
		$jekel = $data['jekel'];
		$agama = $data['agama'];
		$alamat = $data['alamat'];
		$telepon = $data['telepon'];
		$pekerjaan = $data['pekerjaan'];
		$nm_ayah = $data['nm_ayah'];
		$nm_ibu = $data['nm_ibu'];
		$pk_ayah = $data['pk_ayah'];
		$pk_ibu = $data['pk_ibu'];
		$kawin = $data['kawin'];
	}
	
?>

<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script> 
<div class="page-inner">
					<div class="row">
						<div class="col-md-12">	
						<form method="POST">
							<div class="card">
								<div class="card-header">
									<div class="card-title">UBAH BIODATA</div>
								</div>
								<div class="card-body">
									<div class="row">
											<div class="col-md-6 col-lg-6">
												<div class="form-group">
													<label>NIK</label>
													<input type="number" name="nik" class="form-control" placeholder="NIK Anda.." value="<?= $nik;?>" readonly>
												</div>
												<div class="form-group">
													<label>Nama Lengkap</label>
													<input type="text" name="nama" class="form-control" placeholder="Nama Lengkap Anda.." value="<?= $nama;?>">
												</div>
												<div class="form-check">
													<label>Jenis Kelamin</label><br/>
													<label class="form-radio-label">
														<input class="form-radio-input" type="radio" name="jekel" value="<?= $jekel?>"  checked="">
														<span class="form-radio-sign">Laki-Laki</span>
													</label>
													<label class="form-radio-label ml-3">
														<input class="form-radio-input" type="radio" name="jekel" value="<?= $jekel?>">
														<span class="form-radio-sign">Perempuan</span>
													</label>
												</div>
												<div class="form-group">
													<label>Tempat Lahir</label>
													<input type="text" name="tempat" class="form-control" value="<?= $tempat;?>" placeholder="Tempat Lahir Anda..">
												</div>
												<div class="form-group">
													<label>Tanggal Lahir</label>
													<input type="date" name="tgl" class="form-control" value="<?= $tanggal;?>">
												</div>
											</div>
											<div class="col-md-6 col-lg-6">
												<div class="form-group">
													<label>Agama</label>
													<select name="agama" class="form-control">
														<option value="">Pilih Agama Anda</option>
														<option <?php if( $agama=='Islam'){echo "selected"; } ?> value='Islam'>Islam</option>
														<option <?php if( $agama=='Katolik'){echo "selected"; } ?> value='Kristen'>Katolik</option>
														<option <?php if( $agama=='Kristen'){echo "selected"; } ?> value='Kristen'>Kristen</option>
														<option <?php if( $agama=='Hindu'){echo "selected"; } ?> value='Hindu'>Hindu</option>
														<option <?php if( $agama=='Budha'){echo "selected"; } ?> value='Budha'>Budha</option>
														<option <?php if( $agama=='Kepercayaan Lainnya'){echo "selected"; } ?> value='Budha'>Kepercayaan Lainnya</option>
													</select>
												</div>
												<div class="form-group">
													<label for="comment">Alamat</label>
													<textarea class="form-control" name="alamat" rows="5"><?= $alamat?></textarea>
												</div>				
												<div class="form-group">
													<label>Telepon</label>
													<input type="number" name="telepon" class="form-control" value="<?= $telepon?>" placeholder="Telepon Anda..">
												</div>
											
												<div class="form-group">
													<label>Status Perkawinan</label>
													<select name="kawin" class="form-control">
														<option disabled="" selected="">Pilih Status Perkawinan</option>
														<option value="Menikah (Tercatat atau belum tercatat)" <?php if($kawin=="Menikah (Tercatat atau belum tercatat)") echo 'selected'?>>Menikah (Tercatat atau belum tercatat)</option>
														<option value="Belum Menikah" <?php if($kawin=="Belum Menikah") echo 'selected'?>>Belum Menikah</option>
														<option value="Cerai Hidup" <?php if($kawin=="Cerai Hidup") echo 'selected'?>>Cerai Hidup</option>
														<option value="Cerai Mati" <?php if($kawin=="Cerai Mati") echo 'selected'?>>Cerai Mati</option>
													</select>
												</div>
												<div class="form-group">
													<label>Pekerjaan</label>
													<select name="pekerjaan" class="form-control" id="selectPekerjaan">
														<option disabled="" selected="">Pilih Status Pekerjaan</option>
														<option value="Tidak/Belum Bekerja" <?php if($pekerjaan=="Tidak/Belum Bekerja") echo 'selected'; ?>>Tidak/Belum Bekerja</option>
														<option value="Lainnya" <?php if($pekerjaan != "Tidak/Belum Bekerja") echo 'selected'; ?>>Lainnya</option>
													</select>

													<!-- Input hanya muncul jika "Lainnya" dipilih -->
													<input type="text" name="pekerjaan" id="inputPekerjaan" class="form-control mt-2" 
														value="<?= $pekerjaan != 'Tidak/Belum Bekerja' ? htmlspecialchars($pekerjaan) : ''; ?>" 
														placeholder="Tulis pekerjaan..." 
														style="display: <?= $pekerjaan != 'Tidak/Belum Bekerja' && !empty($pekerjaan) ? 'block' : 'none'; ?>">
												</div>

													<script>
														document.getElementById('selectPekerjaan').addEventListener('change', function() {
															var inputPekerjaan = document.getElementById('inputPekerjaan');
															if (this.value === 'Lainnya') {
																inputPekerjaan.style.display = 'block';
															} else {
																inputPekerjaan.style.display = 'none';
																inputPekerjaan.value = ''; // reset input jika tidak memilih "Lainnya"
															}
														});
													</script>
													<div class="form-group">
													<label>Nama Ayah</label>
													<input type="text" name="nm_ayah" class="form-control" value="<?= $nm_ayah;?>" placeholder="Nama Ayah">
												</div>
												<div class="form-group">
													<label>Nama ibu</label>
													<input type="text" name="nm_ibu" class="form-control" value="<?= $nm_ibu;?>" placeholder="Nama Ibu">
												</div>
												<div class="form-group">
													<label>Pekerjaan Ayah</label>
													<input type="text" name="pk_ayah" class="form-control" value="<?= $pk_ayah;?>" placeholder="Pekerjaan Ayah">
												</div>
												<div class="form-group">
													<label>Pekerjaan Ibu</label>
													<input type="text" name="ibu" class="form-control" value="<?= $pk_ibu;?>" placeholder="Pekerjaan Ibu">
												</div>
											</div>
									</div>
								</div>
								<div class="card-action">
									<button name="ubah" class="btn btn-success">Ubah</button>
									<a href="?halaman=beranda" class="btn btn-default">Batal</a>
								</div>
							</div>
						</div>
						</form>
					</div>
</div>

<?php
if(isset($_POST['ubah'])){
	$nik = $_POST['nik'];
	$nama = $_POST['nama'];
	$tempat = $_POST['tempat'];
	$tgl = $_POST['tgl'];
	$jekel = $_POST['jekel'];
	$agama = $_POST['agama'];
	$alamat = $_POST['alamat'];
	$telepon = $_POST['telepon'];
	$pekerjaan = $_POST['pekerjaan'];
	$nm_ayah = $_POST['nm_ayah'];
	$nm_ibu = $_POST['nm_ibu'];
	$pk_ayah = $_POST['pk_ayah'];
	$pk_ibu = $_POST['ibu']; // sesuai dengan name input di form
	$kawin = $_POST['kawin'];

	$sql = "UPDATE data_user SET
		nama='$nama',
		tanggal_lahir='$tgl',
		tempat_lahir='$tempat',
		jekel='$jekel',
		agama='$agama',
		alamat='$alamat',
		telepon='$telepon',
		pekerjaan='$pekerjaan',
		nm_ayah='$nm_ayah',
		nm_ibu='$nm_ibu',
		pk_ayah='$pk_ayah',
		pk_ibu='$pk_ibu',
		kawin='$kawin'
	WHERE nik=$_SESSION[nik]";

	$query = mysqli_query($konek1, $sql);

	if($query){
		echo "<script language='javascript'>swal('Selamat...', 'Ubah Berhasil', 'success');</script>" ;
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_pemohon">';
	}else{
		echo "<script language='javascript'>swal('Gagal...', 'Ubah Gagal', 'error');</script>" ;
		echo '<meta http-equiv="refresh" content="3; url=?halaman=ubah_pemohon">';
	}
}
?>
