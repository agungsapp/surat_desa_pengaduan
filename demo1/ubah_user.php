<!-- <?php include '../koneksi/konek1.php';?>
<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script> 
<?php
    if(isset($_GET['nik'])){
        $nik = $_GET['nik'];
        $sql = "SELECT * FROM data_user WHERE nik='$nik'";
        $query = mysqli_query($konek1,$sql);
        $data=mysqli_fetch_array($query,MYSQLI_BOTH);
        $username = $data['nik'];
        $password = $data['password'];
        $nama = $data['nama'];
		$jekel = $data['jekel'];
		$tempat = $data['tempat_lahir'];
		$tanggal = $data['tanggal_lahir'];
		$alamat = $data['alamat'];
		$pekerjaan = $data['pekerjaan'];
		$kawin = $data['kawin'];
		$hak_akses = $data['hak_akses'];
    }
?>

<div class="page-inner">
					<div class="row">
						<div class="col-md-12">	
						<form method="POST">
							<div class="card">
								<div class="card-header">
									<div class="card-title">FORM UBAH USER</div>
								</div>
								<div class="card-body">
									<div class="row">
											<div class="col-md-6 col-lg-6">
												<div class="form-group">
													<label>NIK</label>
													<input type="text" readonly="" name="nik" value="<?php echo $username;?>" class="form-control" autofocus>
												</div>
												<div class="form-group">
													<label>Nama</label>
													<input type="text" name="nama" class="form-control" value="<?php echo $nama;?>" placeholder="Nama..">
												</div>
												<div class="form-group">
													<label>Tempat Lahir</label>
													<input type="text" name="tempat" class="form-control" value="<?php echo $tempat;?>" placeholder="Tempat Lahir.." >
												</div>
												<div class="form-group">
													<label>Tanggal Lahir</label>
													<input type="date" name="tanggal" class="form-control"  value="<?php echo $tanggal;?>">
												</div>
												<div class="form-group">
													<label>Jenis Kelamin</label>
													<select name="jekel" class="form-control">
														<option disabled="" selected="">Pilih Jenis Kelamin</option>
														<option value="Laki-Laki" <?php if($jekel=="Laki-Laki") echo 'selected'?>>Laki-Laki</option>
														<option value="Perempuan" <?php if($jekel=="Perempuan") echo 'selected'?>>Perempuan</option>
													</select>
												</div>
												<div class="form-group">
													<label>Alamat</label>
													<textarea name="alamat" class="form-control"  cols="30" rows="10" placeholder="Alamat.."><?php echo $alamat;?></textarea>
												</div>

												<div class="form-group">
													<label>pekerjaan</label>
													<input type="text" name="pekerjaan" class="form-control" value="<?php echo $pekerjaan;?>" placeholder="Pekerjaan" >
												</div>

												<div class="form-group">
													<label>Status Perkawinan</label>
													<select name="kawin" class="form-control">
														<option disabled="" selected="">Status Perkawinan</option>
														<option value="Menikah (tercatat atau belum tercatat)" <?php if($kawin=="Menikah (tercatat atau belum tercatat)") echo 'selected'?>>Menikah (tercatat atau belum tercatat)</option>
														<option value="Belum Menikah" <?php if($kawin=="Belum Menikah") echo 'selected'?>>Belum Menikah</option>
														<option value="Cerai Hidup" <?php if($kawin=="Cerai Hidup") echo 'selected'?>>Cerai Hidup</option>
														<option value="Cerai Mati" <?php if($kawin=="Cerai Mati") echo 'selected'?>>Cerai Mati</option>
													</select>
												</div>
												<div class="form-group">
													<label>Password</label>
													<input type="text" name="password" value="<?php echo $password;?>" class="form-control">
                                                </div>
                                                <div class="form-group">
													<label>Hak Akses</label>
													<select name="hak_akses" class="form-control">
														<option value="Pemohon" <?php if($hak_akses=="Pemohon") echo 'selected'?>>Pemohon</option>
														<option value="Lurah" <?php if($hak_akses=="Lurah") echo 'selected'?>>Lurah</option>
														<option value="Staf" <?php if($hak_akses=="Staf") echo 'selected'?>>Staf</option>
													</select>
												</div>
											</div>
									</div>
								</div>
								<div class="card-action">
									<button name="ubah" class="btn btn-success btn-sm">Ubah</button>
									<a href="?halaman=tampil_user" class="btn btn-default btn-sm">Batal</a>
								</div>
							</div>
						</div>
						</form>
					</div>
</div>

<?php
if(isset($_POST['ubah'])){
    $nik = $_POST['nik'];
    $password = $_POST['password'];
    $hak_akses = $_POST['hak_akses'];
	$nama = $data['nama'];
		$jekel = $data['jekel'];
		$tempat = $data['tempat'];
		$tanggal = $data['tanggal'];
		$alamat = $data['alamat'];
		$pekerjaan = $data['pekerjaan'];
		$kawin = $data['kawin'];

    $sql = "UPDATE data_user SET
    password='$password',
    hak_akses='$hak_akses',
	nama='$nama' WHERE nik='$nik'";
    $query = mysqli_query($konek1,$sql);

	if($query){
		echo "<script language='javascript'>swal('Selamat...', 'Ubah Berhasil', 'success');</script>" ;
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_user">';
	  }else{
		echo "<script language='javascript'>swal('Gagal...', 'Ubah Gagal', 'error');</script>" ;
		echo '<meta http-equiv="refresh" content="3; url=?halaman=ubah_user">';
	  }
}
?> -->

<?php
	if(isset($_GET['nik'])){
		$nik = $_GET['nik'];
		$tampil_nik = "SELECT * FROM data_user WHERE nik=$nik";
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
									<div class="card-title">UBAH USER</div>
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
												<div class="form-group">
													<label>Jenis Kelamin</label>
													<select name="jekel" class="form-control">
														<option disabled="" selected="">Pilih Jenis Kelamin</option>
														<option value="Laki-Laki" <?php if($jekel=="Laki-Laki") echo 'selected'?>>Laki-Laki</option>
														<option value="Perempuan" <?php if($jekel=="Perempuan") echo 'selected'?>>Perempuan</option>
													</select>
												</div>
												<div class="form-group">
													<label>Tempat Lahir</label>
													<input type="text" name="tempat" class="form-control" value="<?= $tempat;?>" placeholder="Tempat Lahir Anda..">
												</div>
												<div class="form-group">
													<label>Tanggal Lahir</label>
													<input type="date" name="tgl" class="form-control" value="<?= $tanggal;?>">
												</div>
												<div class="form-group">
													<label for="comment">Alamat</label>
													<textarea class="form-control" name="alamat" rows="5"><?= $alamat?></textarea>
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
													<label>Pekerjaan</label>
													<input type="text" name="pekerjaan" class="form-control" value="<?= $pekerjaan;?>" placeholder="Pekerjaan">
												</div>
												<div class="form-group">
													<label>Status Perkawinan</label>
													<select name="kawin" class="form-control">
														<option disabled="" selected="">Pilih Status Perkawinan</option>
														<option value="Menikah (Tercatat atau belum tercatat)" <?php if($kawin=="Menikah (Tercatat atau belum tercatat)") echo 'selected'?>>Menikah (Tercatat atau belum tercatat)</option>
														<option value="Belum Menikah" <?php if($kawin=="Belum Menikah") echo 'selected'?>>Belum Menikah"</option>
														<option value="Cerai Hidup" <?php if($kawin=="Cerai Hidup") echo 'selected'?>>Cerai Hidup</option>
														<option value="Cerai Mati" <?php if($kawin=="Cerai Mati") echo 'selected'?>>Cerai Mati</option>
													</select>
												</div>
												<div class="form-group">
													<label>Password</label>
													<input type="text" name="password" value="<?php echo $password;?>" class="form-control">
                                                </div>
                                                <div class="form-group">
													<label>Hak Akses</label>
													<select name="hak_akses" class="form-control">
														<option disbaled="" selected="">Pilih Hak Akses</option>
														<option value="Pemohon" <?php if($hak_akses=="Pemohon") echo 'selected'?>>Pemohon</option>
														<option value="Lurah" <?php if($hak_akses=="Lurah") echo 'selected'?>>Lurah</option>
														<option value="Staf" <?php if($hak_akses=="Staf") echo 'selected'?>>Staf</option>
													</select>
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
	$pekerjaan = $_POST['pekerjaan'];
	$kawin = $_POST['kawin'];
	$password = $_POST['password'];
	$hak_akses = $_POST['hak_akses'];

	$sql = "UPDATE data_user SET
	nama='$nama',
	tanggal_lahir='$tgl',
	tempat_lahir='$tempat',
	jekel='$jekel',
	agama='$agama',
	alamat='$alamat',
	pekerjaan='$pekerjaan',
	kawin='$kawin',
	password='$password',
	hak_akses='$hak_akses' WHERE nik=$nik";
	$query = mysqli_query($konek1,$sql);

	if($query){
		echo "<script language='javascript'>swal('Selamat...', 'Ubah Berhasil', 'success');</script>" ;
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_user">';
	  }else{
		echo "<script language='javascript'>swal('Gagal...', 'Ubah Gagal', 'error');</script>" ;
		echo '<meta http-equiv="refresh" content="3; url=?halaman=ubah_user">';
	  }
}
	
?>