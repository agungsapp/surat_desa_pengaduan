<?php
include_once __DIR__ . '/../../../config.php'; // menyesuaikan posisi file sekarang
include_once KONEKSI_PATH . '/konek3.php';

?>
<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Pindah
		</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=add-pindah" class="btn btn-primary">
					<i class="fa fa-edit"></i> Tambah Data</a>
				<a href="?page=suket-pindah" target="_blank" class="btn btn-info btn-border btn-round btn-sm">
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
						<th>NIK</th>
						<th>Nama</th>
						<th>Tanggal</th>
						<th>Alasan</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>

					<?php
					$no = 1;
					$sql = $konek3->query("SELECT p.id_pend, p.nik, p.nama, d.tgl_pindah, d.alasan_pindah, d.id_pindah from 
			  tb_pindah d inner join tb_pdd p on p.id_pend=d.id_pdd");
					while ($data = $sql->fetch_assoc()) {
					?>

						<tr>
							<td>
								<?php echo $no++; ?>
							</td>
							<td>
								<?php echo $data['nik']; ?>
							</td>
							<td>
								<?php echo $data['nama']; ?>
							</td>
							<td>
								<?php echo $data['tgl_pindah']; ?>
							</td>
							<td>
								<?php echo $data['alasan_pindah']; ?>
							</td>
							<td>
								<a href="?page=edit-pindah&kode=<?php echo $data['id_pindah']; ?>" title="Ubah"
									class="btn btn-success btn-sm">
									<i class="fa fa-edit"></i>
								</a>
								<a href="?page=del-pindah&kode=<?php echo $data['id_pend']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')"
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