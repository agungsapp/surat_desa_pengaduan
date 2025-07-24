<?php include_once __DIR__ . '/../../config.php';
include_once KONEKSI_PATH . '/konek3.php';

if (isset($_POST['Cetak'])) {
	$id = $_POST['id_mendu'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>CETAK SURAT</title>
	<style>
		body {
			font-family: 'Times New Roman', Times, serif;
			font-size: 11pt;
			margin: 0;
			padding: 0;
		}

		.a4-container {
			width: 210mm;
			min-height: 297mm;
			padding: 15mm 20mm;
			box-sizing: border-box;
		}

		table {
			width: 100%;
			line-height: 1.3;
			border-collapse: collapse;
		}

		td {
			vertical-align: top;
		}

		.label {
			width: 160px;
			padding-bottom: 2px;
		}

		.value {
			padding-left: 5px;
		}

		.center {
			text-align: center;
		}
	</style>
</head>

<body>

	<div class="a4-container">
		<table style="border-bottom: 2px solid black; padding-bottom: 10px; text-align: center;">
			<tr>
				<td style="width: 80px;">
					<img src="https://desabogorejo.my.id/sidkdd/dist/img/logopes.png" width="65" height="85">
				</td>
				<td>
					<strong style="font-size: 14pt;">PEMERINTAH KABUPATEN PESAWARAN</strong><br>
					<strong style="font-size: 13pt;">KECAMATAN GEDONG TATAAN</strong><br>
					<strong style="font-size: 15pt;">DESA BOGOREJO</strong><br>
					<span style="font-size: 9pt;"><i>Sekretariat: Jln. Sriyono Desa Bogorejo, Gedong Tataan, Pesawaran, 35366</i></span>
				</td>
			</tr>
		</table>

		<div class="center" style="margin-top: 10px;">
			<u><strong style="font-size: 13pt;">SURAT KETERANGAN KEMATIAN</strong></u><br>
			<span>Nomor: 145 / 0<?= $id; ?> / V.01.17 / | / 2025</span>
		</div>

		<?php
		$sql_tampil = "SELECT 
			m.id_mendu, m.usia, m.alamat_mendu, m.tgl_mendu, m.jam_mendu, m.sebab, m.dikebumikan, m.tempat, 
			m.nm_pelapor, m.tgl_pelapor, m.jk_pelapor, m.pekerjaan_pelapor, 
			m.agama_pelapor, m.alamat_pelapor, m.hubungan,
			p.nik, p.nama, p.jekel, p.pekerjaan, p.agama, p.alamat 
		FROM tb_mendu m 
		INNER JOIN tb_pdd p ON m.id_pdd = p.id_pend 
		WHERE m.id_mendu = '$id'";
		$query_tampil = mysqli_query($konek3, $sql_tampil);
		while ($data = mysqli_fetch_array($query_tampil, MYSQLI_BOTH)) {
		?>

			<p style="margin-top: 15px;">Yang bertanda tangan di bawah ini, Kepala Desa Bogorejo Kecamatan Gedong Tataan Kabupaten Pesawaran, menerangkan dengan sesungguhnya bahwa:</p>

			<table>
				<tr>
					<td class="label">Nama</td>
					<td class="value">: <?= ucwords(strtolower($data['nama'])); ?></td>
				</tr>
				<tr>
					<td class="label">NIK</td>
					<td class="value">: <?= $data['nik']; ?></td>
				</tr>
				<tr>
					<td class="label">Usia</td>
					<td class="value">: <?= $data['usia']; ?> Tahun</td>
				</tr>
				<tr>
					<td class="label">Jenis Kelamin</td>
					<td class="value">: <?= $data['jekel']; ?></td>
				</tr>

				<tr>
					<td class="label">Pekerjaan</td>
					<td class="value">: <?= ucwords(strtolower($data['pekerjaan'])); ?></td>
				</tr>
				<tr>
					<td class="label">Agama</td>
					<td class="value">: <?= $data['agama']; ?></td>
				</tr>
				<tr>
					<td class="label">Alamat</td>
					<td class="value">: <?= $data['alamat_mendu']; ?></td>
				</tr>
			</table>

			<p style="margin-top: 10px;">Adalah benar telah meninggal dunia:</p>

			<table>
				<tr>
					<td class="label">Tanggal</td>
					<td class="value">: <?= date('d F Y', strtotime($data['tgl_mendu'])); ?></td>
				</tr>
				<tr>
					<td class="label">Dikebumikan</td>
					<td class="value">: <?= $data['dikebumikan']; ?></td>
				</tr>
				<tr>
					<td class="label">Tempat</td>
					<td class="value">: <?= ucwords(strtolower($data['tempat'])); ?></td>
				</tr>

			</table>

			<p style="margin-top: 10px;">Surat kematian ini berdasarkan keterangan pelapor:</p>

			<table>
				<tr>
					<td class="label">Nama</td>
					<td class="value">: <?= $data['nm_pelapor']; ?></td>
				</tr>
				<tr>
					<td class="label">Tanggal Lahir</td>
					<td class="value">: <?= date('d F Y', strtotime($data['tgl_pelapor'])); ?></td>
				</tr>
				<tr>
					<td class="label">Jenis Kelamin</td>
					<td class="value">: <?= $data['jk_pelapor']; ?></td>
				</tr>
				<tr>
					<td class="label">Pekerjaan</td>
					<td class="value">: <?= $data['pekerjaan_pelapor']; ?></td>
				</tr>
				<tr>
					<td class="label">Agama</td>
					<td class="value">: <?= $data['agama_pelapor']; ?></td>
				</tr>
				<tr>
					<td class="label">Alamat</td>
					<td class="value">: <?= $data['alamat_pelapor']; ?></td>
				</tr>
			</table>

			<p style="margin-top: 10px;">Hubungan pelapor dengan yang meninggal: <?= ucwords(strtolower($data['hubungan'])); ?></p>
			<p>Demikian Surat Keterangan Kematian ini dibuat untuk diketahui dan dapat dipergunakan sebagaimana mestinya.</p>

		<?php } ?>

		<table style="margin-top: 20px;">
			<tr>
				<td style="width: 60%"></td>
				<td style="text-align: left;">
					Bogorejo, <?= date('d F Y'); ?><br>
					Kepala Desa Bogorejo,<br><br><br>
					<u><b>(HERMANSYAH)</b></u>
				</td>
			</tr>
		</table>
	</div>

	<script>
		window.print();
	</script>

</body>

</html>