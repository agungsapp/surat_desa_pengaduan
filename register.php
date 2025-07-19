<?php include 'koneksi/konek1.php'; ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Halaman Pendaftaran Pemohon</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins&display=swap">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(to bottom, #87CEFA, #4682B4); /* Steel Blue Sky */
      margin: 0;
      padding: 0;
    }

    .login-container {
      width: 100%;
      max-width: 400px;
      margin: 60px auto;
      background-color: white;
      border-radius: 16px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
      padding: 40px 30px;
    }

    .login-container h2 {
      text-align: center;
      color: #4682B4;
      margin-bottom: 25px;
    }

    .login-container img {
      display: block;
      margin: 0 auto 10px;
      width: 150px;
    }

    .form-group {
      margin-bottom: 15px;
    }

    input[type="text"],
    input[type="number"],
    input[type="password"],
    input[type="date"],
    select {
      width: 100%;
      padding: 10px;
      border-radius: 8px;
      border: 1px solid #ccc;
      font-size: 14px;
      box-sizing: border-box;
    }

    button, a.btn-link {
      width: 100%;
      padding: 10px;
      font-size: 16px;
      border-radius: 8px;
      border: none;
      cursor: pointer;
      margin-top: 10px;
    }

    button {
      background-color: #4682B4;
      color: white;
      transition: background-color 0.3s;
    }

    button:hover {
      background-color: #3a6c98;
    }

    a.btn-link {
      background-color: #dc3545;
      color: white;
      text-align: center;
      display: inline-block;
      text-decoration: none;
      margin-top: 10px; /* Ensure consistent margin */
    }

    .bottom-text {
      text-align: center;
      margin-top: 15px;
      font-size: 14px;
    }

    .bottom-text a {
      color: #4682B4;
      text-decoration: none;
    }

    .bottom-text a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

  <div class="login-container">
    <img src="main/img/LOGO (1).png" alt="Logo">
    <h2>HALAMAN PENDAFTARAN</h2>
    <form method="POST">
    <form method="POST" onsubmit="return cekDuplikatNik();">
      <div class="form-group">
        <input type="number" name="nik" placeholder="NIK Anda.." oninput="if (this.value.length > 16) this.value = this.value.slice(0, 16);" maxlength="16" required>
      </div>
      <div class="form-group">
        <input type="text" name="nama" placeholder="Nama Lengkap Anda.." required>
      </div>
      <div class="form-group">
        <select name="jekel" required>
          <option value="" disabled selected>Pilih Jenis Kelamin</option>
          <option value="Laki-Laki">Laki-Laki</option>
          <option value="Perempuan">Perempuan</option>
        </select>
      </div>
      <div class="form-group">
        <input type="text" name="kota" placeholder="Kota Lahir Anda.." required>
      </div>
      <div class="form-group">
        <input type="date" name="tgl" required>
      </div>
      <div class="form-group">
        <input type="password" name="password" placeholder="Password" required>
      </div>
      <button type="submit" name="register">DAFTAR</button>
      <a href="login.php" class="btn-link">BATAL</a>
    </form>
    <div class="bottom-text">
      Sudah memiliki akun? <a href="pegawai.php">Login</a>
    </div>
  </div>

  <?php
    if(isset($_POST['register'])){
        $nik = $_POST['nik'];
        $password = $_POST['password'];
        $hak_akses = "Pemohon";
        $nama = $_POST['nama'];
        $jekel = $_POST['jekel'];
        $kota = $_POST['kota'];
        $tgl = $_POST['tgl'];

        $cek_nik = mysqli_query($konek1, "SELECT * FROM data_user WHERE nik='$nik'");
if (mysqli_num_rows($cek_nik) > 0) {
    echo "<script>swal('Gagal!', 'NIK sudah terdaftar. Silakan login.', 'error');</script>";
    echo '<meta http-equiv="refresh" content="3; url=pegawai.php">';
} else {
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    $sql_simpan = "INSERT INTO data_user (nik, password, hak_akses, nama, tanggal_lahir, jekel, tempat_lahir) 
                   VALUES ('$nik', '$password_hash', '$hak_akses', '$nama', '$tgl', '$jekel', '$kota')";
    $query_simpan = mysqli_query($konek1, $sql_simpan);

    if ($query_simpan) {
        echo "<script>swal('Selamat!', 'Akun Berhasil dibuat!', 'success');</script>";
        echo '<meta http-equiv="refresh" content="3; url=pegawai.php">';
    } else {
        echo "<script>swal('Gagal!', 'Akun Gagal dibuat, NIK sudah terdaftar!', 'error');</script>";
        echo '<meta http-equiv="refresh" content="3; url=register.php">';
    }
}

        if($query_simpan){
            echo "<script>swal('Selamat!', 'Akun Berhasil dibuat!', 'success');</script>";
            echo '<meta http-equiv="refresh" content="3; url=pegawai.php">';
        }else{
            echo "<script>swal('Gagal!', 'Akun Gagal dibuat, NIK sudah terdaftar!', 'error');</script>";
            echo '<meta http-equiv="refresh" content="3; url=register.php">';
        }
    }
  ?>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  

</body>
</html>
