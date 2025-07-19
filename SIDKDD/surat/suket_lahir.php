<?php include_once __DIR__ . '/../../../config.php'; // menyesuaikan posisi file sekarang
include_once KONEKSI_PATH . '/konek3.php';


?>
<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-file"></i> Surat Keterangan Kelahiran
		</h3>
	</div>
	<form action="./report/cetak_lahir.php" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Kelahiran</label>
				<div class="col-sm-6">
					<select name="lahir" id="lahir" class="form-control select2bs4" required>
						<option selected="selected">- Pilih Data -</option>
						<?php
						// ambil data dari database
						$query = "select * from tb_lahir";
						$hasil = mysqli_query($konek3, $query);
						while ($row = mysqli_fetch_array($hasil)) {
						?>
							<option value="<?php echo $row['id_lahir'] ?>">
								<?php echo $row['nama'] ?>
							</option>
						<?php
						}
						?>
					</select>
				</div>
			</div>

		</div>
		<div class="card-footer">

			<input type="submit" name="Cetak" value="Cetak" class="btn btn-info">
		</div>
	</form>
</div>