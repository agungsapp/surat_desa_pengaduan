<?php
include_once __DIR__ . '/../../../config.php'; // menyesuaikan posisi file sekarang
include_once KONEKSI_PATH . '/konek3.php';


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

<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Kelahiran
		</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=add-lahir" class="btn btn-primary">
					<i class="fa fa-edit"></i> Tambah Data</a>
				<a href="?page=suket-lahir" target="_blank" class="btn btn-info btn-border btn-round btn-sm">
					<span class="btn-label">
						<i class="fa fa-print"></i>
					</span>
					Cetak
				</a>
			</div>
			<br>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama</th>
						<th>Tempat Lahir</th>
						<th>Tanggal Lahir</th>
						<th>Jekel</th>
						<th>Keluarga</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>

					<?php
					$no = 1;
					$sql = $konek3->query("SELECT l.id_lahir, l.nama, l.tempat_lh, l.tgl_lh, l.jekel, k.no_kk, k.kepala from 
			  tb_lahir l inner join tb_kk k on k.id_kk=l.id_kk");
					while ($data = $sql->fetch_assoc()) {
					?>

						<tr>
							<td>
								<?php echo $no++; ?>
							</td>
							<td>
								<?php echo $data['nama']; ?>
							</td>
							<td>
								<?php echo $data['tempat_lh']; ?>
							</td>
							<td>
								<?php echo formatTanggalIndo($data['tgl_lh']); ?>
							</td>

							<td>
								<?php echo $data['jekel']; ?>
							</td>
							<td>
								<?php echo $data['no_kk']; ?>-
								<?php echo $data['kepala']; ?>
							</td>
							<td>
								<a href="?page=edit-lahir&kode=<?php echo $data['id_lahir']; ?>" title="Ubah"
									class="btn btn-success btn-sm">
									<i class="fa fa-edit"></i>
								</a>
								<a href="?page=del-lahir&kode=<?php echo $data['id_lahir']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')"
									title="Hapus" class="btn btn-danger btn-sm">
									<i class="fa fa-trash"></i>
									</>
							</td>
						</tr>

					<?php
					}
					?>
				</tbody>
				</tfoot>
			</table>
		</div>
	</div>
	<!-- /.card-body -->