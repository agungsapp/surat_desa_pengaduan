<?php
include_once __DIR__ . '/../../../config.php'; // menyesuaikan posisi file sekarang
include_once KONEKSI_PATH . '/konek3.php';

if (isset($_POST['Cetak'])) {
	$id = $_POST['lahir'];
}

$tanggal = date("m/y");
$tgl = date("d/m/y");

function formatTanggalIndo($tgl_db)
{
	$bulan = [
		'01' => 'Januari',
		'02' => 'Februari',
		'03' => 'Maret',
		'04' => 'April',
		'05' => 'Mei',
		'06' => 'Juni',
		'07' => 'Juli',
		'08' => 'Agustus',
		'09' => 'September',
		'10' => 'Oktober',
		'11' => 'November',
		'12' => 'Desember'
	];

	$pecah = explode('-', $tgl_db); // hasil: [2025, 06, 25]
	return $pecah[2] . ' ' . $bulan[$pecah[1]] . ' ' . $pecah[0];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<style>
		@media print {
			img {
				display: block !important;
				visibility: visible !important;
			}
		}
	</style>

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
			$sql_tampil = "select * from tb_lahir where id_lahir='$id'";
			$query_tampil = mysqli_query($konek3, $sql_tampil);
			$no = 1;
			while ($data = mysqli_fetch_array($query_tampil, MYSQLI_BOTH)) {
			?>
		</table>
		<br>

		<div style="text-align: center;">
			<u><strong style="font-size: 14pt;">SURAT KETERANGAN KELAHIRAN</strong></u><br>
			<span>Nomor: 145 / 0<?= $id; ?> / V.01.17 / 2025</span>
		</div>

		<p style="font-size: 12pt;">Yang bertanda tangan di bawah ini, Kepala Desa Bogorejo Kecamatan Gedong Tataan Kabupaten Pesawaran, menerangkan dengan sesungguhnya bahwa:</p>
		<table style="margin-left: 20px;">
			<tbody>
				<tr>
					<td style="width: 170px;">Nama</td>
					<td style="width: 10px;">:</td>
					<td><?php echo ucwords(strtolower($data['nama'])); ?></td>
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
					<td>Tempat, Tanggal Lahir</td>
					<td>:</td>
					<td><?= ucwords($data['tempat_lh']) . ', ' . formatTanggalIndo($data['tgl_lh']); ?></td>
				</tr>
			</tbody>
		</table>

		<p style="font-size: 12pt;">Adalah benar anak kandung dari:</p>
		<table style="margin-left: 20px;">
			<tbody>
				<tr>
					<td style="width: 170px;">Nama Ayah</td>
					<td style="width: 10px;">:</td>
					<td><?php echo ucwords(strtolower($data['nama_ayah'])); ?></td>
				</tr>
				<tr>
					<td>Nama Ibu</td>
					<td>:</td>
					<td><?php echo ucwords(strtolower($data['nama_ibu'])); ?></td>
				</tr>
			</tbody>
		</table>
	<?php } ?>
	<p>Demikian Surat Keterangan ini dibuat untuk dapat dipergunakan sebagaimana mestinya.</P>
	<table width="100%">
		<tr>
			<td style="width: 20%;"></td> <!-- Mengatur lebar kiri lebih kecil -->
			<td style="float: right; text-align: left; padding-right: 30px;"> <!-- Memberi jarak ke kanan dengan padding -->
				Dikeluarkan di: Bogorejo,
				<br>Pada Tanggal: <?= formatTanggalIndo(date('Y-m-d')) ?>
				<br>KEPALA DESA BOGOREJO,<br><br>
				<br><br>
				<u><b>(HERMANSYAH)</b></u>
			</td>
			<td style="width: 20%;"></td> <!-- Menambah ruang kosong di kanan untuk menyeimbangkan -->
		</tr>
	</table>

	<script>
		window.print();
	</script>

</body>

</html>