<?php
include_once __DIR__ . '/../../../config.php'; // menyesuaikan posisi file sekarang
include_once KONEKSI_PATH . '/konek3.php';

$sql = $konek3->query("SELECT COUNT(id_pend) as pend  from tb_pdd where status='Ada'");
while ($data = $sql->fetch_assoc()) {
	$pend = $data['pend'];
}

$sql = $konek3->query("SELECT COUNT(id_kk) as kartu  from tb_kk");
while ($data = $sql->fetch_assoc()) {
	$kartu = $data['kartu'];
}

$sql = $konek3->query("SELECT COUNT(id_pend) as laki  from tb_pdd where jekel='LK'");
while ($data = $sql->fetch_assoc()) {
	$laki = $data['laki'];
}

$sql = $konek3->query("SELECT COUNT(id_pend) as prem  from tb_pdd where jekel='PR'");
while ($data = $sql->fetch_assoc()) {
	$prem = $data['prem'];
}

$sql = $konek3->query("SELECT COUNT(id_lahir) as lahir from tb_lahir");
while ($data = $sql->fetch_assoc()) {
	$lahir = $data['lahir'];
}

$sql = $konek3->query("SELECT COUNT(id_mendu) as mendu  from tb_mendu");
while ($data = $sql->fetch_assoc()) {
	$mendu = $data['mendu'];
}

$sql = $konek3->query("SELECT COUNT(id_datang) as datang  from tb_datang");
while ($data = $sql->fetch_assoc()) {
	$datang = $data['datang'];
}

$sql = $konek3->query("SELECT COUNT(id_pindah) as pindah  from tb_pindah");
while ($data = $sql->fetch_assoc()) {
	$pindah = $data['pindah'];
}

?>
<div style="background: red">
	<img src="dist/img/baner.jpg" width="100%">
	<div style="text-align: center;">
		<b style="font-size: 30px; font-family:'Times New Roman', Times, serif; color: white">
			" Hallo, Selamat Datang Kaur Pemerintah "
		</b>
		<p style="font-family: Times New Roman; font-size: 17px; color:black">
			SIDKDW adalah sebuah sistem informasi yang mempermudah dalam pendataan penduduk Dusun Wonokasihan, Desa Sojokerto, Kecamatan Leksono dengan praktis, cepat, dan akurat.
		</p>
		<hr color="black" style="height: 2px;" />
	</div>
</div>

<div class="row">
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-info">
			<div class="inner">
				<h3>
					<?php echo $pend;  ?>
				</h3>

				<p>Jumlah Penduduk</p>
			</div>
			<div class="icon">
				<i class="ion ion-person-add"></i>
			</div>
			<a href="index.php?page=data-pend" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-success">
			<div class="inner">
				<h3>
					<?php echo $kartu;  ?>
				</h3>

				<p>Jumlah Kartu Keluarga</p>
			</div>
			<div class="icon">
				<i class="ion ion-card"></i>
			</div>
			<a href="index.php?page=data-kartu" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-red">
			<div class="inner">
				<h3>
					<?php echo $laki;  ?>
				</h3>

				<p>jumlah Laki-laki</p>
			</div>
			<div class="icon">
				<i class="ion ion-male"></i>
			</div>
			<a href="index.php?page=data-pend" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-warning">
			<div class="inner">
				<h3>
					<?php echo $prem;  ?>
				</h3>

				<p>Jumlah Perempuan</p>
			</div>
			<div class="icon">
				<i class="ion ion-female"></i>
			</div>
			<a href="index.php?page=data-pend" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>

	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-info">
			<div class="inner">
				<h3>
					<?php echo $lahir;  ?>
				</h3>

				<p>jumlah Lahir</p>
			</div>
			<div class="icon">
				<i class="ion ion-android-happy"></i>
			</div>
			<a href="index.php?page=data-lahir" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-success">
			<div class="inner">
				<h3>
					<?php echo $mendu;  ?>
				</h3>

				<p>Jumlah Meninggal</p>
			</div>
			<div class="icon">
				<i class="ion ion-android-sad"></i>
			</div>
			<a href="index.php?page=data-mendu" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-red">
			<div class="inner">
				<h3>
					<?php echo $datang;  ?>
				</h3>

				<p>jumlah Pendatang</p>
			</div>
			<div class="icon">
				<i class="ion ion-android-download"></i>
			</div>
			<a href="index.php?page=data-datang" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-warning">
			<div class="inner">
				<h3>
					<?php echo $pindah;  ?>
				</h3>

				<p>jumlah Pindah</p>
			</div>
			<div class="icon">
				<i class="ion ion-android-upload"></i>
			</div>
			<a href="index.php?page=data-pindah" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
</div>