<?php
if (isset($_POST['acc'])) {
  $id_request_sktm = $_POST['id_request_sktm'];
  $sql = mysqli_query($konek1, "UPDATE data_request_sktm SET
					status='2' WHERE id_request_sktm='$id_request_sktm'");
  if ($sql) {
    echo "<script language='javascript'>swal('Selamat...', 'Kirim Berhasil!', 'success');</script>";
    echo '<meta http-equiv="refresh" content="3; url=?halaman=permohonan_surat">';
  } else {
    echo "<script language='javascript'>swal('Gagal...', 'Kirim Gagal!', 'error');</script>";
    echo '<meta http-equiv="refresh" content="3; url=?halaman=permohonan_surat">';
  }
}
