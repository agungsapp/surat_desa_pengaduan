<?php 
	include "../inc/konek3.php";

	if (isset($_POST['btnCetak'])) {
		$id = $_POST['id_pend'];

		// Ambil tanggal
		$tanggal = date("Y-m-d");
		$tgl_format = date("d/m/Y");
		$bulan_tahun = date("m/y");

		// Ambil data penduduk
		$sql_tampil = "SELECT * FROM tb_pdd WHERE id_pend ='$id'";
		$query_tampil = mysqli_query($konek3, $sql_tampil);
		$data = mysqli_fetch_array($query_tampil, MYSQLI_BOTH);

		$nama_pemohon = $data['nama'];
		$jenis_surat = "Ket.Domisili";

		// Hitung nomor urut
		$query_last = mysqli_query($konek3, "SELECT COUNT(*) as total FROM surat WHERE jenis_surat='$jenis_surat'");
		$data_last = mysqli_fetch_array($query_last);
		$no_urut = $data_last['total'] + 1;

		$no_surat = sprintf("%03d", $no_urut) . "/$jenis_surat/" . $bulan_tahun;

		// Simpan ke tabel tb_surat
		mysqli_query($konek3, "INSERT INTO surat (nomor_surat, tanggal, nama_pemohon, jenis_surat) 
			VALUES ('$no_surat', '$tanggal', '$nama_pemohon', '$jenis_surat')");
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>CETAK SURAT</title>
	<style>
		.ttd-img {
			width: 200px;
			height: auto;
		}
	</style>
</head>
<body>
	<center>
		<h2>PEMERINTAH KABUPATEN PESAWARAN<br>KECAMATAN GEDONG TATAAN<br>DESA BOGOREJO</h2>
		<h4>Sekretariat: Jln. Sriyono Desa Bogorejo Kec.Gedong Tataan Kab.Pesawaran Kode Pos 35366</h4>
		<br>________________________________________________________________________</br>

		<h4><u>SURAT KETERANGAN DOMISILI</u></h4>
		<h4>Nomor: <?= $no_surat ?></h4>
	</center>

	<p>Yang bertandatangan di bawah ini Kepala Desa Bogorejo Kecamatan Gedong Tataan Kabupaten Pesawaran menerangkan bahwa :</p>
	<table>
		<tr><td>Nama</td><td>:</td><td><?= $data['nama']; ?></td></tr>
		<tr><td>NIK</td><td>:</td><td><?= $data['nik']; ?></td></tr>
		<tr><td>Tempat Tanggal Lahir</td><td>:</td><td><?= $data['tempat_lh']; ?>/<?= $data['tgl_lh']; ?></td></tr>
		<tr><td>Jenis Kelamin</td><td>:</td><td><?= $data['jekel']; ?></td></tr>
		<tr><td>Agama</td><td>:</td><td><?= $data['agama']; ?></td></tr>
		<tr><td>Pekerjaan</td><td>:</td><td><?= $data['pekerjaan']; ?></td></tr>
		<tr><td>Status Perkawinan</td><td>:</td><td><?= $data['kawin']; ?></td></tr>
		<tr><td>Alamat</td><td>:</td><td><?= $data['Alamat']; ?></td></tr>
	</table>

	<p>Nama identitas di atas sesuai dengan keterangan dari pamong setempat (Ketua RT) adalah benar berdomisili di Jl. ....... RT/RW:...... Desa Bogorejo Kecamatan Gedong Tataan Kabupaten Pesawaran</p>
	<p>Demikian Surat Keterangan Domisili ini diberikan untuk dapat dipergunakan sebagaimana mestinya.</p>

	<br><br><br>
<div style="text-align: right; margin-top: 50px;">
  <p>Bogorejo, 
	<?php echo date('d M Y'); ?>
	<br>KEPALA DESA BOGOREJO</p>
  <img src="LOGO.png" alt="TTD QR Ahmad Tunusi" width="130">
  <div style="border: 1px solid black; padding: 10px; width: 300px;">
    <p style="font-size: 12px; margin: 0;">
      Dokumen ini telah ditandatangani secara elektronik menggunakan<br>
      sertifikat elektronik yang diterbitkan oleh Balai Sertifikat Elektronik (BSrE).<br>
      ID : 200415901<br>
      NIP : 150490112020001
    </p>
  </div>
  <p><strong>AHMAD TUNUSI</strong></p>
</div>

	<script>
		window.print();
	</script>
</body>
</html>
