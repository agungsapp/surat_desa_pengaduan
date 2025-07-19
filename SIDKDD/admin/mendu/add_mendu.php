<?php
include_once __DIR__ . '/../../../config.php'; // menyesuaikan posisi file sekarang
include_once KONEKSI_PATH . '/konek3.php';

?>
<div class="card card-primary">
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
				<label class="col-sm-2 col-form-label">Usia</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="usia" name="usia" placeholder="usia yang meninggal" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Alamat</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="alamat_mendu" name="alamat_mendu" placeholder="alamat yang meninggal" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tanggal Meninggal</label>
				<div class="col-sm-3">
					<input type="date" class="form-control" id="tgl_mendu" name="tgl_mendu" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Dikebumikan</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="dikebuminkan" name="dikebumikan" placeholder="dikebumikan" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tempat Pemakaman</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="tempat" name="tempat" placeholder="tempat pemakaman" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Pelapor</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nm_pelapor" name="nm_pelapor" placeholder="nama pelapor" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tanggal Lahir Pelapor</label>
				<div class="col-sm-6">
					<input type="date" class="form-control" id="tgl_pelapor" name="tgl_pelapor" placeholder="tanggal lahir pelapor" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jenis Kelamin Pelapor</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="jk_pelapor" name="jk_pelapor" placeholder="jenis kelamin pelapor" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Agama Pelapor</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="agama_pelapor" name="agama_pelapor" placeholder="agama pelapor" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Pekerjaan Pelapor</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="pekerjaan_pelapor" name="pekerjaan_pelapor" placeholder="pekerjaan pelapor" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Alamat Pelapor</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="alamat_pelapor" name="alamat_pelapor" placeholder="alamat pelapor" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Hubungan</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="hubungan" name="hubungan" placeholder="Hubungan.." required>
				</div>
			</div>
			<div class="card-footer">
				<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
				<a href="?page=data-mendu" title="Kembali" class="btn btn-secondary">Batal</a>
			</div>
	</form>
	</d>

	<?php

	if (isset($_POST['Simpan'])) {
		//mulai proses simpan data
		$sql_simpan = "INSERT INTO tb_mendu (id_pdd, usia, alamat_mendu, tgl_mendu, jam_mendu, dikebumikan, tempat, nm_pelapor, tgl_pelapor, jk_pelapor, pekerjaan_pelapor, agama_pelapor, alamat_pelapor, hubungan) VALUES (
			'" . $_POST['id_pdd'] . "',
			 '" . $_POST['usia'] . "',
			 '" . $_POST['alamat_mendu'] . "',
            '" . $_POST['tgl_mendu'] . "',
            '" . $_POST['jam_mendu'] . "',
			'" . $_POST['dikebumikan'] . "',
			'" . $_POST['tempat'] . "',
			'" . $_POST['nm_pelapor'] . "',
			'" . $_POST['tgl_pelapor'] . "',
			'" . $_POST['jk_pelapor'] . "',
			'" . $_POST['pekerjaan_pelapor'] . "',
			'" . $_POST['agama_pelapor'] . "',
			'" . $_POST['alamat_pelapor'] . "',
			'" . $_POST['hubungan'] . "')";
		$query_simpan = mysqli_query($konek3, $sql_simpan);

		$sql_ubah = "UPDATE tb_pdd SET 
			status='Meninggal'
			WHERE id_pend='" . $_POST['id_pdd'] . "'";
		$query_ubah = mysqli_query($konek3, $sql_ubah);
		mysqli_close($konek3);

		if ($query_simpan && $query_ubah) {
			echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-mendu';
          }
      })</script>";
		} else {
			echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=add-mendu';
          }
      })</script>";
		}
	}
     //selesai proses simpan data
