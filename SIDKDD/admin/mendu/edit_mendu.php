<?php
include_once __DIR__ . '/../../../config.php'; // menyesuaikan posisi file sekarang
include_once KONEKSI_PATH . '/konek3.php';

if (isset($_GET['kode'])) {
	$sql_cek = "SELECT p.nama, m.id_mendu, m.tgl_mendu, m.jam_mendu, m.dikebumikan, m.tempat, m.nm_pelapor, m.tgl_pelapor, m.jk_pelapor, m.pekerjaan_pelapor, m.agama_pelapor, m.alamat_pelapor, m.hubungan FROM 
		tb_mendu m join tb_pdd p on m.id_pdd=p.id_pend WHERE id_mendu='" . $_GET['kode'] . "'";
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
					<input type="text" class="form-control" id="id_mendu" name="id_mendu" value="<?php echo $data_cek['id_mendu']; ?>"
						readonly />
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data_cek['nama']; ?>"
						readonly required>
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
		</div>
		<div class="card-footer">
			<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
			<a href="?page=data-mendu" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

if (isset($_POST['Ubah'])) {
	$sql_ubah = "UPDATE tb_mendu SET
		usia='" . $_POST['usia'] . "', 
		alamat_mendu='" . $_POST['alamat_mendu'] . "',
		tgl_mendu='" . $_POST['tgl_mendu'] . "',
		jam_mendu='" . $_POST['jam_mendu'] . "',
		dikebumikan='" . $_POST['dikebumikan'] . "',
		tempat='" . $_POST['tempat'] . "',
		nm_pelapor='" . $_POST['nm_pelapor'] . "',
		tgl_pelapor='" . $_POST['tgl_pelapor'] . "',
		jk_pelapor='" . $_POST['jk_pelapor'] . "',
		pekerjaan_pelapor='" . $_POST['pekerjaan_pelapor'] . "',
		agama_pelapor='" . $_POST['agama_pelapor'] . "',
		alamat_pelapor='" . $_POST['alamat_pelapor'] . "',
		hubungan='" . $_POST['hubungan'] . "'
		WHERE id_mendu='" . $_POST['id_mendu'] . "'";
	$query_ubah = mysqli_query($konek3, $sql_ubah);
	mysqli_close($konek3);

	if ($query_ubah) {
		echo "<script>
      Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-mendu';
        }
      })</script>";
	} else {
		echo "<script>
      Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-mendu';
        }
      })</script>";
	}
}
