<?php include_once __DIR__ . '/../../config.php';
include_once KONEKSI_PATH . '/konek3.php';


if (isset($_POST['Cetak'])) {
	$id = $_POST['id_pend'];
}

$tanggal = date("m/y");
$tgl = date("d/m/y");


?>



<!DOCTYPE html>
<html lang="en">

<head>
	<title>CETAK SURAT</title>
</head>

<body>
	<div class="a4-container" style="font-family: 'Times New Roman', Times, serif; font-size: 11pt; padding: 20px;">
		<table style="text-align: center; border-bottom: 3px solid black; padding-bottom: 10px; width: 100%;">
			<tr>
				<td style="width: 80px;"><img src="http://localhost/surat_keterangan_desa/SIDKDD/dist/img/logopes.png" width="70" height="90"> </td>
				<td>
					<div style="line-height: 1.3;">
						<strong style="font-size: 16pt;">PEMERINTAH KABUPATEN PESAWARAN</strong><br>
						<strong style="font-size: 15pt;">KECAMATAN GEDONG TATAAN</strong><br>
						<strong style="font-size: 17pt;">DESA BOGOREJO</strong><br>
						<span style="font-size: 10pt;"><i>Sekretariat: Jln. Sriyono Desa Bogorejo, Kec. Gedong Tataan, Kab. Pesawaran Kode Pos 35366</i></span>
					</div>
				</td>
			</tr>
			<?php
			$sql_tampil = "SELECT * FROM tb_pindah 
			JOIN tb_pdd ON tb_pindah.id_pdd = tb_pdd.id_pend 
			WHERE tb_pindah.id_pdd = '$id'";

			$query_tampil = mysqli_query($konek3, $sql_tampil);
			$no = 1;
			while ($data = mysqli_fetch_array($query_tampil, MYSQLI_BOTH)) {
			?>
		</table>
		<br>

		<div style="text-align: center;">
			<u><strong style="font-size: 14pt;">SURAT KETERANGAN PINDAH ANTAR DESA</strong></u><br>
			<span>Nomor: 145 / 0<?= $id; ?> / V.01.17 / | / 2025</span>
		</div>

		<p style="font-size: 12pt;">Yang bertanda tangan di bawah ini, Kepala Desa Bogorejo Kecamatan Gedong Tataan Kabupaten Pesawaran, memberikan Surat Keterangan Pindah kepada:</p>

		<table>
			<tbody>
				<tr>
					<td>Nama</td>
					<td>:</td>
					<td>
						<?php echo $data['nama']; ?>
					</td>
				</tr>
				<tr>
					<td>NIK</td>
					<td>:</td>
					<td>
						<?php echo $data['nik']; ?>
					</td>
				</tr>
				<tr>
					<td>Nomor KTP</td>
					<td>:</td>
					<td>
						<?php echo $data['KTP']; ?>
					</td>
				</tr>
				<tr>
					<td>Nomor KK</td>
					<td>:</td>
					<td>
						<?php echo $data['KK']; ?>
					</td>
				</tr>
				<tr>
					<td>Jenis Kelamin</td>
					<td>:</td>
					<td>
						<?php
						echo ($data['jekel'] == 'LK') ? 'Laki-Laki' : 'Perempuan';
						?>

					</td>
				</tr>
				<tr>
					<td>Warga Negara</td>
					<td>:</td>
					<td>
						Indonesia
					</td>
				</tr>
				<tr>
					<td>Agama</td>
					<td>:</td>
					<td>
						<?php echo $data['agama']; ?>
					</td>
				</tr>
				<tr>
					<td>Status Perkawinan</td>
					<td>:</td>
					<td>
						<?php echo $data['kawin']; ?>
					</td>
				</tr>
				<tr>
					<td>Pekerjaan</td>
					<td>:</td>
					<td>
						<?php echo $data['pekerjaan']; ?>
					</td>
				</tr>
				<tr>
					<td>Alamat Asal</td>
					<td>:</td>
					<td>
						<?php echo $data['alamat_asal']; ?>
					</td>
				</tr>
				<tr>
					<td>Tujuan Pindah</td>
					<td>:</td>
					<td>
						<?php echo $data['tujuan']; ?>
					</td>
				</tr>
				<tr>
					<td>Pada Tanggal</td>
					<td>:</td>
					<td>
						<?php echo $data['tgl_pindah']; ?>
					</td>
				</tr>
				<tr>
					<td>Alasan Pindah</td>
					<td>:</td>
					<td>
						<?php echo $data['alasan_pindah']; ?>
					</td>
				</tr>
				<tr>
					<td>Jumlah pengikut pindah</td>
					<td>:</td>
					<td>
						<?php echo $data['jumlah_pengikut']; ?>
					</td>
				</tr>
				</tr>
			<?php } ?>
			</tbody>
		</table>
		<table width="100%">
			<tr>
				<td style="width: 20%;"></td> <!-- Mengatur lebar kiri lebih kecil -->
				<td style="float: right; text-align: left; padding-right: 30px;"> <!-- Memberi jarak ke kanan dengan padding -->
					Dikeluarkan di: Bogorejo,
					<br>Pada Tanggal: <?= date('d F Y'); ?><br>
					<br>KEPALA DESA BOGOREJO,<br><br><br><br>
					<u><b>(HERMANSYAH)</b></u>
				</td>
				<td style="width: 20%;"></td> <!-- Menambah ruang kosong di kanan untuk menyeimbangkan -->
			</tr>
		</table>

		<p><u><i>KETERANGAN:</i></u></p>
		<p><i>Semenjak diterbitkannya surat keterangan pindah, nama tersebut telah dihapus dari Desa Bogorejo.</i></p>

		<script>
			window.print();
		</script>

</body>

</html>