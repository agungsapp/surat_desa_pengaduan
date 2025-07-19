<?php
include_once __DIR__ . '/../../../config.php'; // menyesuaikan posisi file sekarang
include_once KONEKSI_PATH . '/konek3.php';

if (isset($_GET['kode'])) {
	$sql_cek = "SELECT * FROM tb_lahir WHERE id_lahir='" . $_GET['kode'] . "'";
	$query_cek = mysqli_query($konek3, $sql_cek);
	$data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
}
?>

<div class="card card-success">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Ubah Data
		</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">No Sistem</label>
				<div class="col-sm-2">
					<input type="text" class="form-control" id="id_lahir" name="id_lahir" value="<?php echo $data_cek['id_lahir']; ?>"
						readonly />
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data_cek['nama']; ?>"
						required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tempat Lahir</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="tempat_lh" name="tempat_lh" placeholder="Tempat Lahir Bayi" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tanggal Lahir</label>
				<div class="col-sm-3">
					<input type="date" class="form-control" id="tgl_lh" name="tgl_lh" value="<?php echo $data_cek['tgl_lh']; ?>"
						required>
				</div>
			</div>


			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jenis Kelamin</label>
				<div class="col-sm-3">
					<select name="jekel" id="jekel" class="form-control">
						<option value="">-- Pilih jenis Kelamin --</option>
						<?php
						//menhecek data yg dipilih sebelumnya
						if ($data_cek['jekel'] == "Laki-Laki") echo "<option value='Laki-Laki' selected>Laki-Laki</option>";
						else echo "<option value='Laki-Laki'>Laki-Laki</option>";

						if ($data_cek['jekel'] == "Perempuan") echo "<option value='Perempuan' selected>Perempuan</option>";
						else echo "<option value='Perempuan'>Perempuan</option>";
						?>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Ayah</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nama_ayah" name="nama_ayah" placeholder="Nama Ayah" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Ibu</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nama_ibu" name="nama_ibu" placeholder="Nama Ibu" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Keluarga</label>
				<div class="col-sm-6">
					<select name="id_kk" id="id_kk" class="form-control select2bs4" required>
						<option selected="">- Pilih -</option>
						<?php
						// ambil data dari database
						$query = "select * from tb_kk";
						$hasil = mysqli_query($konek3, $query);
						while ($row = mysqli_fetch_array($hasil)) {
						?>
							<option value="<?php echo $row['id_kk'] ?>" <?= $data_cek['id_kk'] == $row['id_kk'] ? "selected" : null ?>>
								<?php echo $row['no_kk'] ?>
								-
								<?php echo $row['kepala'] ?>
							</option>
						<?php
						}
						?>
					</select>
				</div>
			</div>

		</div>
		<div class="card-footer">
			<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
			<a href="?page=data-lahir" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

if (isset($_POST['Ubah'])) {
	$sql_ubah = "UPDATE tb_lahir SET 
		nama='" . $_POST['nama'] . "',
		tempat_lh='" . $_POST['tempat_lh'] . "',
		tgl_lh='" . $_POST['tgl_lh'] . "',
		jekel='" . $_POST['jekel'] . "',
		nama_ayah='" . $_POST['nama_ayah'] . "',
		nama_ibu='" . $_POST['nama_ibu'] . "',
		id_kk='" . $_POST['id_kk'] . "'
		WHERE id_lahir='" . $_POST['id_lahir'] . "'";
	$query_ubah = mysqli_query($konek3, $sql_ubah);
	mysqli_close($konek3);

	if ($query_ubah) {
		echo "<script>
      Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-lahir';
        }
      })</script>";
	} else {
		echo "<script>
      Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-lahir';
        }
      })</script>";
	}
}
