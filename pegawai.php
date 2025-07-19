<?php include 'koneksi/konek1.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>LOGIN SISTEM</title>
  <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
  <style>
    body {
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      font-family: 'Jost', sans-serif;
      background: linear-gradient(to bottom, #87CEFA, #4682B4);
    }

    .main {
      width: 350px;
      height: 620px;
      background: #fff;
      border-radius: 10px;
      box-shadow: 5px 20px 50px rgba(0, 0, 0, 0.3);
      overflow: hidden;
      position: relative;
    }

    .main form {
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 40px 20px;
    }

    .main h2 {
      color: #4682B4;
      margin-bottom: 20px;
    }

    select,
    input {
      width: 80%;
      padding: 12px;
      margin: 10px 0;
      border: none;
      border-radius: 5px;
      background: #B0C4DE;
      color: #333;
      font-size: 1em;
    }

    button {
      width: 90%;
      padding: 12px;
      margin-top: 20px;
      background: #4682B4;
      color: #fff;
      font-weight: bold;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background 0.3s;
    }

    button:hover {
      background: #5F9EA0;
    }

    .btn-cancel {
      background: #f44336;
    }

    .btn-cancel:hover {
      background: #c0392b;
    }

    .logo {
      width: 120px;
      height: auto;
      margin-top: 30px;
    }
  </style>
</head>

<body>
  <div class="main">
    <form method="POST">
      <img src="main/img/LOGO.png" alt="Logo" class="logo" />
      <h2>LOGIN SISTEM</h2> <!-- Judul diubah -->

      <select name="hak_akses" required>
        <option value="">-- Pilih Hak Akses --</option> <!-- Opsi default -->
        <?php
        $SQL = "SELECT DISTINCT hak_akses FROM data_user WHERE hak_akses IN ('Staf', 'Pemohon')";
        $QUERY = mysqli_query($konek1, $SQL);
        if (mysqli_num_rows($QUERY) > 0) {
          while ($data = mysqli_fetch_array($QUERY, MYSQLI_BOTH)) {
            echo "<option value='{$data['hak_akses']}'>{$data['hak_akses']}</option>";
          }
        } else {
          echo "<option value='Staf'>Staf</option>";
          echo "<option value='Pemohon'>Pemohon</option>";
        }
        ?>
      </select>

      <!-- Input Username -->
      <input type="text" name="nik" placeholder="nik" required />

      <!-- Input Password -->
      <input type="password" name="password" placeholder="Password" required />

      <button type="submit" name="login">LOGIN</button>
      <button type="button" onclick="window.location.href='index.php'" class="btn-batal">BATAL</button>
      <div class="register-link">
        <div style="text-align: center;">
          <small>Warga/Masyarakat yang belum memiliki akun <a href="register.php"><br>Buat disini</a></small>
        </div>
      </div>
    </form>
  </div>

  <?php
  if (isset($_POST['login'])) {
    // Mengamankan input
    $nik = mysqli_real_escape_string($konek1, $_POST['nik']);
    $password = mysqli_real_escape_string($konek1, $_POST['password']);
    $hak_akses = mysqli_real_escape_string($konek1, $_POST['hak_akses']);

    $sql_login = "SELECT * FROM data_user WHERE nik='$nik' AND hak_akses='$hak_akses'";
    $query_login = mysqli_query($konek1, $sql_login);

    if (mysqli_num_rows($query_login) == 1) {
      $data_login = mysqli_fetch_array($query_login, MYSQLI_BOTH);

      // Cek password dengan dua metode:
      // 1. Jika password di-hash (gunakan password_verify)
      // 2. Jika password plain text (bandingkan langsung)
      if (password_verify($password, $data_login['password']) || $password == $data_login['password']) {
        session_start();
        $_SESSION['id_user'] = $data_login['id_user'];
        $_SESSION['nik'] = $data_login['nik'];
        $_SESSION['hak_akses'] = $data_login['hak_akses'];
        $_SESSION['nama'] = $data_login['nama'];

        // Redirect berdasarkan hak akses
        if ($hak_akses == 'Staf') {
          header("Location: /demo1/main2.php");
          exit();
        } elseif ($hak_akses == 'Pemohon') {
          header("Location: /demo1/main.php");
          exit();
        }
      } else {
        echo "<script>alert('Login Gagal. Password salah!');</script>";
        echo '<meta http-equiv="refresh" content="1; url=pegawai.php">';
      }
    } else {
      echo "<script>alert('Login Gagal. NIK atau hak akses tidak ditemukan!');</script>";
      echo '<meta http-equiv="refresh" content="1; url=pegawai.php">';
    }
  }
  ?>
</body>

</html>