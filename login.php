<?php include 'koneksi/konek1.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Login Pemohon</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="main/css/sweetalert.css" rel="stylesheet" type="text/css">
  <script src="main/js/sweetalert.min.js"></script>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(to right, #87CEFA, #4682B4);
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .login-container {
      background-color: #ffffffcc;
      padding: 40px;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
      width: 360px;
      text-align: center;
    }

    .login-container img {
      width: 140px;
      margin-bottom: 15px;
    }

    h2 {
      color: #333;
      margin-bottom: 25px;
    }

    input {
      width: 92%;
      padding: 12px;
      margin: 10px auto;
      border: none;
      border-radius: 5px;
      background: #B0C4DE;
      color: #333;
      font-size: 1em;
      display: block;
    }

    button,
    a.btn {
      width: 92%;
      padding: 12px;
      margin: 15px auto 0 auto;
      font-weight: bold;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      display: block;
      text-align: center;
      text-decoration: none;
    }

    .btn-login {
      background-color: #4682B4;
      color: white;
    }

    .btn-batal {
      background-color: #dc3545;
      color: white;
    }

    .register-link {
      margin-top: 20px;
      font-size: 0.9em;
    }

    .register-link a {
      color: #007bff;
      text-decoration: none;
    }

    .register-link a:hover {
      text-decoration: underline;
    }

    .password-validation {
      color: red;
      font-size: 12px;
      display: none;
    }
  </style>
</head>

<body>

  <div class="login-container">
    <img src="main/img/LOGO (1).png" alt="Logo">
    <h2>Login Pemohon</h2>

    <form method="POST">
      <input
        type="text"
        name="nik"
        placeholder="NIK Anda.."
        maxlength="16"
        oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
        required>

      <input
        type="password"
        name="password"
        placeholder="Password Anda.."
        required>

      <button type="submit" name="login" class="btn-login">LOGIN</button>
      <a href="index.php" class="btn btn-batal">BATAL</a>

      <div class="register-link">
        Belum memiliki akun? <a href="register.php">Buat</a>
      </div>
    </form>
  </div>

  <?php
  if (isset($_POST['login'])) {
    $nik = $_POST['nik'];
    $password = $_POST['password'];

    // Cek login
    $sql_login = "SELECT * FROM data_user WHERE nik='$nik'";
    $query_login = mysqli_query($konek1, $sql_login);
    $data_login = mysqli_fetch_array($query_login, MYSQLI_BOTH);
    // return var_dump($data_login['password'], $password, password_verify($password, $data_login['password']));
    if ($data_login && $password == $data_login['password']) {
      session_start();
      $_SESSION['hak_akses'] = $data_login['hak_akses'];
      $_SESSION['nama']      = $data_login['nama'];
      $_SESSION['password']  = $data_login['password'];
      $_SESSION['nik']       = $data_login['nik'];

      echo "<script>swal('Selamat...', 'Login Berhasil!', 'success');</script>";
      echo '<meta http-equiv="refresh" content="2; url=demo1/main.php">';
    } else {
      echo "<script>swal('Gagal...', 'Login Gagal, NIK atau password salah!', 'error');</script>";
      echo '<meta http-equiv="refresh" content="2; url=login.php">';
    }
  }
  ?>

</body>

</html>