<?php
include_once __DIR__ . '/../../../config.php'; // menyesuaikan posisi file sekarang
include_once KONEKSI_PATH . '/konek3.php';

?><div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Data
		</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Penduduk</label>
				<div class="col-sm-6">
					<select name="id_pdd" id="id_pdd" class="form-control select2bs4" required>
						<option selected="selected">- Pilih Penduduk -</option>
						<?php
						// ambil data dari database
						$query = "select * from tb_pdd where status='Ada'";
						$hasil = mysqli_query($konek3, $query);
						while ($row = mysqli_fetch_array($hasil)) {
						?>
							<option value="<?php echo $row['id_pend'] ?>">
								<?php echo $row['nik'] ?>
								-
								<?php echo $row['nama'] ?>
							</option>
						<?php
						}
						?>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nomor KTP</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="KTP" name="KTP" placeholder="Masukan nomor KTP" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nomor KK</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="KK" name="KK" placeholder="Masukan nomor KK" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tgl Pindah</label>
				<div class="col-sm-3">
					<input type="date" class="form-control" id="tgl_pindah" name="tgl_pindah" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Alamat Asal</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="alamat_asal" name="alamat_asal" placeholder="Alamat asal" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tujuan Pindah</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="tujuan" name="tujuan" placeholder="Tujuan Pindah" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Alasan</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="alasan_pindah" name="alasan_pindah" placeholder="Alasan Pindah" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jumlah pengikut pindah</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="jumlah_pengikut" name="jumlah_pengikut" placeholder="Jumlah Pengikut Pindah" required>
				</div>
			</div>
		</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=data-pindah" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

if (isset($_POST['Simpan'])) {
	//mulai proses simpan data
	$sql_simpan = "INSERT INTO tb_pindah (id_pdd, KTP, KK, alamat_asal, tujuan, tgl_pindah, alasan_pindah, jumlah_pengikut) VALUES (
			'" . $_POST['id_pdd'] . "',
			'" . $_POST['KTP'] . "',
			'" . $_POST['KK'] . "',
			'" . $_POST['alamat_asal'] . "',
			'" . $_POST['tujuan'] . "',
            '" . $_POST['tgl_pindah'] . "',
            '" . $_POST['alasan_pindah'] . "',
			'" . $_POST['jumlah_pengikut'] . "')";
	$query_simpan = mysqli_query($konek3, $sql_simpan);

	$sql_ubah = "UPDATE tb_pdd SET 
			status='Pindah'
			WHERE id_pend='" . $_POST['id_pdd'] . "'";
	$query_ubah = mysqli_query($konek3, $sql_ubah);
	mysqli_close($konek3);

	if ($query_simpan && $query_ubah) {
		echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-pindah';
          }
      })</script>";
	} else {
		echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=add-pindah';
          }
      })</script>";
	}
}
     //selesai proses simpan data
