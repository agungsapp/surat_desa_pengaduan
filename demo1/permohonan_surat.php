<?php include '../koneksi/konek1.php'; ?>
<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script>
<div class="page-inner">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div class="d-flex align-items-center">
						<h4 class="card-title">STATUS REQUEST SURAT KETERANGAN TIDAK MAMPU</h4>
					</div>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table id="add1" class="display table table-striped table-hover">
							<thead>
								<tr>
									<th>Tanggal Request</th>
									<th>NIK</th>
									<th>Nama Lengkap</th>
									<th>Scan KTP</th>
									<th>Scan KK</th>
									<th>Keperluan</th>
									<th style="width: 10%">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$sql = "SELECT * FROM data_request_sktm natural join data_user WHERE status=2";
								$query = mysqli_query($konek1, $sql);
								while ($data = mysqli_fetch_array($query, MYSQLI_BOTH)) {
									$id_request_sktm = $data['id_request_sktm'];
									$tgl = $data['tanggal_request'];
									$format = date('d F Y', strtotime($tgl));
									$nik = $data['nik'];
									$nama = $data['nama'];
									$status = $data['status'];
									$ktp = $data['scan_ktp'];
									$kk = $data['scan_kk'];
									$keperluan = $data['keperluan'];

									if ($status == "1") {
										$status = "<b style='color:blue'>ACC</b>";
									} elseif ($status == "0") {
										$status = "<b style='color:red'>BELUM ACC</b>";
									}
								?>
									<tr>
										<td><?php echo $format; ?></td>
										<td><?php echo $nik; ?></td>
										<td><?php echo $nama; ?></td>
										<td><img src="../dataFoto/scan_ktp/<?php echo $ktp; ?>" width="50" height="50" alt=""></td>
										<td><img src="../dataFoto/scan_kk/<?php echo $kk; ?>" width="50" height="50" alt=""></td>
										<td><?php echo $keperluan; ?></td>
										<td>
											<div class="d-flex align-items-center gap-2">
												<!-- Checkbox -->
												<input type="checkbox" name="check[]" value="<?= $id_request_sktm ?>" class="form-check-input m-0">

												<form action="" method="post">
													<input type="hidden" name="id_request_sktm" value="<?= $id_request_sktm; ?>">
													<!-- ACC Button -->
													<button type="submit" name="acc_sktm" class="btn btn-success btn-sm px-2" title="Setujui Permohonan SKTM">
														<i class="fas fa-check-circle me-1"></i> ACC
													</button>
												</form>

												<!-- Detail Button -->
												<a href="?halaman=detail_sktm&id_request_sktm=<?= $id_request_sktm ?>"
													class="btn btn-info btn-sm px-2"
													data-toggle="tooltip"
													title="Lihat Detail Permohonan">
													<i class="fas fa-file-alt me-1"></i> Detail
												</a>

												<!-- Cetak Button -->
												<a href="?halaman=view_cetak_sktm&id_request_sktm=<?= $id_request_sktm ?>"
													class="btn btn-primary btn-sm px-2"
													data-toggle="tooltip"
													title="Cetak Surat Keterangan">
													<i class="fas fa-print me-1"></i> Cetak
												</a>
											</div>
										</td>

									</tr>
								<?php
								}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>


		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div class="d-flex align-items-center">
						<h4 class="card-title">STATUS REQUEST SURAT KETERANGAN USAHA</h4>
					</div>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table id="add2" class="display table table-striped table-hover">
							<thead>
								<tr>
									<th>Tanggal Request</th>
									<th>NIK</th>
									<th>Nama Lengkap</th>
									<th>Scan KTP</th>
									<th>Scan KK</th>
									<th>Status</th>
									<th style="width: 10%">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$sql = "SELECT * FROM data_request_sku natural join data_user WHERE status=2";
								$query = mysqli_query($konek1, $sql);
								while ($data = mysqli_fetch_array($query, MYSQLI_BOTH)) {
									$tgl = $data['tanggal_request'];
									$format = date('d F Y', strtotime($tgl));
									$nik = $data['nik'];
									$nama = $data['nama'];
									$status = $data['status'];
									$ktp = $data['scan_ktp'];
									$kk = $data['scan_kk'];
									$usaha  = $data['usaha'];
									$keperluan = $data['keperluan'];
									$keterangan = $data['keterangan'];
									$id_request_sku = $data['id_request_sku'];

									if ($status == "2") {
										$status = "<b style='color:blue'>SUDAH ACC LURAH</b>";
									} elseif ($status == "0") {
										$status = "<b style='color:red'>BELUM ACC</b>";
									}
								?>
									<tr>
										<td><?php echo $format; ?></td>
										<td><?php echo $nik; ?></td>
										<td><?php echo $nama; ?></td>
										<td><img src="../dataFoto/scan_ktp/<?php echo $ktp; ?>" width="50" height="50" alt=""></td>
										<td><img src="../dataFoto/scan_kk/<?php echo $kk; ?>" width="50" height="50" alt=""></td>
										<td class="fw-bold text-uppercase text-danger op-8"><?php echo $status; ?></td>
										<td>
											<div class="d-flex align-items-center gap-2">
												<!-- Checkbox -->
												<input type="checkbox" name="check[]" value="<?= $id_request_sku ?>" class="form-check-input m-0">

												<!-- ACC Button -->
												<form action="" method="post">
													<input type="hidden" name="id_request_sku" value="<?= $id_request_sku; ?>">
													<button type="submit" name="acc_sku" class="btn btn-success btn-sm" title="Setujui Permohonan">
														<i class="fas fa-check-circle me-1"></i> ACC
													</button>
												</form>

												<!-- Detail Button -->
												<a href="?halaman=detail_sku&id_request_sku=<?= $id_request_sku ?>"
													class="btn btn-info btn-sm"
													title="Lihat Detail Permohonan">
													<i class="fas fa-eye me-1"></i> Detail
												</a>

												<!-- Cetak Button -->
												<a href="?halaman=view_cetak_sku&id_request_sku=<?= $id_request_sku ?>"
													class="btn btn-primary btn-sm"
													title="Cetak Surat Keterangan">
													<i class="fas fa-print me-1"></i> Cetak
												</a>
											</div>
										</td>
									</tr>
								<?php
								}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>


		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div class="d-flex align-items-center">
						<h4 class="card-title">STATUS REQUEST SURAT IZIN USAHA</h4>
					</div>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table id="add3" class="display table table-striped table-hover">
							<thead>
								<tr>
									<th>Tanggal Request</th>
									<th>NIK</th>
									<th>Nama Lengkap</th>
									<th>Scan KTP</th>
									<th>Scan KK</th>
									<th>Status</th>
									<th style="width: 30%">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$sql = "SELECT * FROM data_request_skp natural join data_user where status=2";
								$query = mysqli_query($konek1, $sql);
								while ($data = mysqli_fetch_array($query, MYSQLI_BOTH)) {
									$tgl = $data['tanggal_request'];
									$format = date('d F Y', strtotime($tgl));
									$nik = $data['nik'];
									$nama = $data['nama'];
									$status = $data['status'];
									$ktp = $data['scan_ktp'];
									$kk = $data['scan_kk'];
									$keterangan = $data['keterangan'];
									$id_request_skp = $data['id_request_skp'];


									if ($status == "2") {
										$status = "<b style='color:blue'>SUDAH ACC LURAH</b>";
									} elseif ($status == "0") {
										$status = "<b style='color:red'>BELUM ACC</b>";
									}
								?>
									<tr>
										<td><?php echo $format; ?></td>
										<td><?php echo $nik; ?></td>
										<td><?php echo $nama; ?></td>
										<td><img src="../dataFoto/scan_ktp/<?php echo $ktp; ?>" width="50" height="50" alt=""></td>
										<td><img src="../dataFoto/scan_kk/<?php echo $kk; ?>" width="50" height="50" alt=""></td>
										<td class="fw-bold text-uppercase text-danger op-8"><?php echo $status; ?></td>
										<td>
											<div class="d-flex align-items-center gap-2">
												<!-- Checkbox -->
												<input type="checkbox" name="check[]" value="<?= $id_request_skp ?>" class="form-check-input">

												<!-- ACC Button -->
												<form action="" method="post">
													<input type="hidden" name="id_request_skp" value="<?= $id_request_skp; ?>">
													<button type="submit" name="acc_skp" class="btn btn-success btn-sm" title="Setujui Permohonan">
														<i class="fas fa-check-circle"></i> ACC
													</button>
												</form>


												<!-- Detail Button -->
												<a href="?halaman=detail_skp&id_request_skp=<?= $id_request_skp ?>"
													class="btn btn-info btn-sm"
													title="Lihat Detail">
													<i class="fas fa-search"></i> Detail
												</a>

												<!-- Cetak Button -->
												<a href="?halaman=view_cetak_skp&id_request_skp=<?= $id_request_skp ?>"
													class="btn btn-primary btn-sm"
													title="Cetak Surat">
													<i class="fas fa-print"></i> Cetak
												</a>
											</div>
										</td>
									</tr>
								<?php
								}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div class="d-flex align-items-center">
						<h4 class="card-title">STATUS REQUEST SURAT KETERANGAN DOMISILI</h4>
					</div>
				</div>
				<form method="POST">
					<div class="card-body">
						<div class="table-responsive">
							<table id="add4" class="display table table-striped table-hover">
								<thead>
									<tr>
										<th>Tanggal Request</th>
										<th>NIK</th>
										<th>Nama Lengkap</th>
										<th>Scan KTP</th>
										<th>Scan KK</th>
										<th>Status</th>
										<th style="width: 30%">Action</th>
									</tr>
								</thead>
								<tbody>

									<?php
									$sql = "SELECT * FROM data_request_skd natural join data_user where status=2";
									$query = mysqli_query($konek1, $sql);
									while ($data = mysqli_fetch_array($query, MYSQLI_BOTH)) {
										$tgl = $data['tanggal_request'];
										$format = date('d F Y', strtotime($tgl));
										$nik = $data['nik'];
										$nama = $data['nama'];
										$status = $data['status'];
										$ktp = $data['scan_ktp'];
										$kk = $data['scan_kk'];
										$id_request_skd = $data['id_request_skd'];

										if ($status == "2") {
											$status = "<b style='color:blue'>SUDAH ACC LURAH</b>";
										} elseif ($status == "0") {
											$status = "<b style='color:red'>BELUM ACC</b>";
										}
									?>
										<tr>
											<td><?php echo $format; ?></td>
											<td><?php echo $nik; ?></td>
											<td><?php echo $nama; ?></td>
											<td><img src="../dataFoto/scan_ktp/<?php echo $ktp; ?>" width="50" height="50" alt=""></td>
											<td><img src="../dataFoto/scan_kk/<?php echo $kk; ?>" width="50" height="50" alt=""></td>
											<td class="fw-bold text-uppercase text-danger op-8"><?php echo $status; ?></td>
											<td>
												<div class="btn-group" role="group">
													<!-- Checkbox -->
													<input type="checkbox" name="check[]" value="<?php echo $id_request_skd; ?>" class="mr-2">

													<!-- ACC Button -->
													<form action="" method="post">
														<input type="hidden" name="id_request_skd" value="<?= $id_request_skd; ?>">
														<button type="submit" name="acc_skd" class="btn btn-success btn-sm" title="ACC Permohonan">
															<i class="fas fa-check"></i> ACC
														</button>
													</form>

													<!-- Cek Data Button -->
													<a href="?halaman=detail_skd&id_request_skd=<?= $id_request_skd; ?>"
														class="btn btn-info btn-sm"
														title="Cek Data">
														<i class="fas fa-eye"></i> Detail
													</a>

													<!-- View Data Button -->
													<a href="?halaman=view_cetak_skd&id_request_skd=<?= $id_request_skd; ?>"
														class="btn btn-primary btn-sm"
														title="Cetak Surat">
														<i class="fas fa-print"></i> Cetak
													</a>
												</div>
											</td>
										<?php
									}
										?>
										<?php
										if (isset($_POST['kirim'])) {
											$keterangan = $_POST['keterangan'];
											$sql = mysqli_query($konek1, "UPDATE data_request_skd SET
					keterangan='$keterangan', status='3' WHERE id_request_skd='$id_request_skd'");
											if ($sql) {
												echo "<script language='javascript'>swal('Selamat...', 'Kirim Berhasil!', 'success');</script>";
												echo '<meta http-equiv="refresh" content="3; url=?halaman=permohonan_surat">';
											} else {
												echo "<script language='javascript'>swal('Gagal...', 'Kirim Gagal!', 'error');</script>";
												echo '<meta http-equiv="refresh" content="3; url=?halaman=permohonan_surat">';
											}
										}
										?>
								</tbody>
							</table>
						</div>
					</div>
				</form>
			</div>
		</div>

		<?php

		if (isset($_POST['acc_sktm'])) {
			$id_request_sktm = $_POST['id_request_sktm'];
			$sql = mysqli_query($konek1, "UPDATE data_request_sktm SET
					status='3' WHERE id_request_sktm='$id_request_sktm'");
			if ($sql) {
				echo "<script language='javascript'>swal('Selamat...', 'Acc Berhasil!', 'success');</script>";
				echo '<meta http-equiv="refresh" content="3; url=?halaman=permohonan_surat">';
			} else {
				echo "<script language='javascript'>swal('Gagal...', 'Kirim Gagal!', 'error');</script>";
				echo '<meta http-equiv="refresh" content="3; url=?halaman=permohonan_surat">';
			}
		}
		if (isset($_POST['acc_sku'])) {
			$id_request_sku = $_POST['id_request_sku'];
			$sql = mysqli_query($konek1, "UPDATE data_request_sku SET
					status='3' WHERE id_request_sku='$id_request_sku'");
			if ($sql) {
				echo "<script language='javascript'>swal('Selamat...', 'Acc Berhasil!', 'success');</script>";
				echo '<meta http-equiv="refresh" content="3; url=?halaman=permohonan_surat">';
			} else {
				echo "<script language='javascript'>swal('Gagal...', 'Kirim Gagal!', 'error');</script>";
				echo '<meta http-equiv="refresh" content="3; url=?halaman=permohonan_surat">';
			}
		}
		if (isset($_POST['acc_skp'])) {
			$id_request_skp = $_POST['id_request_skp'];
			$sql = mysqli_query($konek1, "UPDATE data_request_skp SET
					status='3' WHERE id_request_skp='$id_request_skp'");
			if ($sql) {
				echo "<script language='javascript'>swal('Selamat...', 'Acc Berhasil!', 'success');</script>";
				echo '<meta http-equiv="refresh" content="3; url=?halaman=permohonan_surat">';
			} else {
				echo "<script language='javascript'>swal('Gagal...', 'Kirim Gagal!', 'error');</script>";
				echo '<meta http-equiv="refresh" content="3; url=?halaman=permohonan_surat">';
			}
		}
		if (isset($_POST['acc_skd'])) {
			$id_request_skd = $_POST['id_request_skd'];
			$sql = mysqli_query($konek1, "UPDATE data_request_skd SET
					status='3' WHERE id_request_skd='$id_request_skd'");
			if ($sql) {
				echo "<script language='javascript'>swal('Selamat...', 'Acc Berhasil!', 'success');</script>";
				echo '<meta http-equiv="refresh" content="3; url=?halaman=permohonan_surat">';
			} else {
				echo "<script language='javascript'>swal('Gagal...', 'Kirim Gagal!', 'error');</script>";
				echo '<meta http-equiv="refresh" content="3; url=?halaman=permohonan_surat">';
			}
		}
		?>


	</div>
</div>