<?php
session_start();
date_default_timezone_set('Asia/Jakarta');

// Panggil semua koneksi
include 'koneksi/config.php';
include 'koneksi/konek1.php';
include 'koneksi/konek2.php';
include 'koneksi/konek3.php';


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Pelayanan Surat & Pengaduan Online Desa Bogorejo</title>
    <!-- core CSS -->
    <link href="main/css/bootstrap.min.css" rel="stylesheet">
    <link href="main/css/font-awesome.min.css" rel="stylesheet">
    <link href="main/css/animate.min.css" rel="stylesheet">
    <link href="main/css/owl.carousel.css" rel="stylesheet">
    <link href="main/css/owl.transitions.css" rel="stylesheet">
    <link href="main/css/prettyPhoto.css" rel="stylesheet">
    <link href="main/css/main.css" rel="stylesheet">
    <link href="main/css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="main/img/LOGO (1).png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head>
<!--/head-->

<body id="beranda" class="homepage">
   
    <header id="header">
        <nav id="main-menu" class="navbar navbar-default navbar-fixed-top" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php" style="display: flex; align-items: center;">
                     <img src="main/img/LOGO (1).png" alt="Logo Desa Bogorejo" style="height: 50px; width: auto; margin-right: 10px;">
                     <span style="font-weight: bold; font-size: 18px; color: #333; margin-bottom: 0;">DESA BOGOREJO</span>
                    </a>
                </div>

                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li class="scroll active"><a href="#beranda">Beranda</a></li>
                        <li class="scroll"><a href="#tentang">Tentang Desa</a></li>
                        <li class="scroll"><a href="#jadwal">Jadwal</a></li>
                        <li class="scroll"><a href="informasi.php">Informasi</a></li>
                        <li class="dropdown scroll">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                Layanan <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="pegawai.php">Permohonan Pengajuan Surat</a></li>
                                <li><a href="sistem_pengaduan/index.php">Pengaduan Masyarakat</a></li>
                            </ul>
                            </li>
                        <li class="scroll"><a href="#get-in-touch">Lokasi</a></li>

                    </ul>
                </div>
            </div>
            
            <!--/.container-->
        </nav>
        <!--/nav-->
    </header>
    <!--/header-->

    <section id="cta2">
  <div class="container">
    <div class="text-center">
      <h2 class="wow fadeInUp" data-wow-duration="300ms" data-wow-delay="0ms">
        WEBSITE INFORMASI & ADMINISTRASI<br><span>DESA BOGOREJO</span>
      </h2>
    </div>
  </div>
</section>


    <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f0f7f4;
      margin: 0;
      padding: 20px;
    }

    #cta2 {
  position: relative;
  padding: 100px 0;
  background: linear-gradient(135deg, #0077b6, #00b4d8);
  color: #fff;
  text-align: center;
  overflow: hidden;
}

#cta2::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
  background: rgba(0, 0, 0, 0.4); /* ini overlay gelapnya */
  z-index: 1;
}

#cta2 .container {
  position: relative;
  z-index: 2; /* biar teks tampil di atas overlay */
}

#cta2 h2 {
  font-size: 36px;
  font-weight: bold;
  text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.5); /* bantu tambah keterbacaan */
  margin-bottom: 0;
}

#cta2 span {
  font-size: 42px;
  display: inline-block;
  margin-top: 10px;
  font-weight: 800;
  color: #ffdd57;
  text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.4);
}

    .accordion {
      max-width: 600px;
      margin: auto;
    }

    .accordion-item {
      background-color:cornflowerblue;
      border-radius: 16px;
      margin-bottom: 25px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
      overflow: hidden;
      transition: box-shadow 0.3s;
      cursor: pointer;
    }

    .accordion-item:hover {
      box-shadow: 0 6px 14px rgba(0, 0, 0, 0.1);
    }

    .accordion-header {
      padding: 18px 24px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      font-weight: 600;
      font-size: 18px;
      color: white;
    }

    .arrow {
      font-size: 18px;
      transition: transform 0.3s ease;
    }

    .accordion-content {
      max-height: 0;
      overflow: hidden;
      padding: 0 24px;
      color: #555;
      background-color: #f9fefc;
      transition: max-height 0.4s ease, padding 0.3s;
    }

    .accordion-item.active .accordion-content {
      max-height: 300px; 
      padding: 16px 24px 24px;
      overflow:auto;
    }

    .accordion-item.active .arrow {
      transform: rotate(180deg);
    }
  </style>
</head>
<body>
<br><section id="tentang">
        <div class="container">
            <div class="section-header">
  <div class="accordion">
<br>
    <div class="accordion-item" onclick="toggleAccordion(this)">
      <div class="accordion-header"> 
       <br> <span>Visi</span>
        <span class="arrow">&#9660;</span>
      </div>
      <div class="accordion-content">
      Visi Desa Bogorejo adalah 
                    <b>"Terbangunnya tata kelola pemerintah desa yang lebih baik
guna mewujudkan kehidupan masyarakat yang adil, makmur dan bermartabat." </b>
Falsafah Desa Bogorejo adalah 
 <b>Hamewayu Hayuning Dhesi “ </b>
 yang dapat di artikan
"Memperindah Keindahan Desa". Memperindah Keindahan Desa yang dimaksud bukan hanya
memperindah unsur fisik desa (infrastruktur) semata tetapi juga memperindah unsur
masyarakat dalam kehidupan beragama,  berbudaya, berekonomi.
Secara filosofi atau nilai luhur masyarakat desa Bogorejo mempunyai semangat untuk
selalu berjuang membangun desa baik mental maupun spiritual.</p>
      </div>
    </div>

    <div class="accordion-item" onclick="toggleAccordion(this)">
  <div class="accordion-header">
    <br> <span>Misi</span>
    <span class="arrow">&#9660;</span>
  </div>
  <div class="accordion-content">
    <p>Untuk menjabarkan Visi Desa Bogorejo agar bisa terwujud maka diperlukan misi sebagai dasar menjalankan roda pemerintahan. Adapun misi Desa Bogorejo adalah:</p>

    <ul>
      <li style="list-style-type: none;"><b>A. PEMBANGUNAN FISIK</b></li>
      <li>Melaksanakan pembangunan infrastruktur dengan berpedoman pada RPJM Desa</li>
      <li>Pembangunan yang merata di seluruh wilayah kedusunan sesuai dengan kebutuhan</li>

      <div id="selengkapnya" style="display: none;">
        <li style="list-style-type: none; margin-top: 10px;"><b>B. PEMBANGUNAN NON FISIK</b></li>

        <li style="list-style-type: none;"><b>1. Bidang Pemerintahan</b></li>
        <li>Penataan ulang kelembagaan dan aparatur desa melalui penciptaan etos kerja sesuai peraturan</li>
        <li>Meningkatkan pengawasan terhadap pelaksanaan kegiatan pembangunan dari APBN/APBD</li>
        <li>Evaluasi menyeluruh terhadap Peraturan Desa yang tidak berorientasi pada kualitas masyarakat</li>
        <li>Meningkatkan pendapatan pajak bumi bangunan melalui program pendaftaran kolektif WP Baru</li>
        <li>Meningkatkan sumber daya manusia, taraf kesehatan, dan pendapatan masyarakat</li>
        <li>Menyelenggarakan urusan pemerintahan secara profesional dan tertib administrasi</li>
        <li>Meningkatkan kesadaran hukum</li>

        <br><li style="list-style-type: none;"><b>2. Bidang Sosial Kemasyarakatan</b></li>
        <li>Bekerjasama dengan lembaga masyarakat, tokoh agama, pemuda untuk membina masyarakat</li>
        <li>Meningkatkan peran pemuda melalui Karang Taruna, Risma, dan organisasi lainnya</li>
        <li>Meningkatkan pemberdayaan perempuan</li>
        <li>Menumbuhkan kewirausahaan untuk ekonomi kreatif</li>
        <li>Pengadaan sarana transportasi untuk kepentingan sosial masyarakat</li>

        <br><li style="list-style-type: none;"><b>3. Bidang Keagamaan</b></li>
        <li>Meningkatkan kegiatan keagamaan melalui majelis taklim untuk ukhuwah islamiyah</li>
        <li>Melanjutkan tradisi kegiatan keagamaan masyarakat</li>
      </div>

      <li style="list-style-type: none; margin-top: 10px;">
        <a href="javascript:void(0);" onclick="toggleSelengkapnya(this)">Baca Selengkapnya</a>
      </li>
    </ul>
  </div>
</div>

<script>
  function toggleSelengkapnya(link) {
    var isi = document.getElementById("selengkapnya");
    if (isi.style.display === "none") {
      isi.style.display = "block";
      link.textContent = "Sembunyikan";
    } else {
      isi.style.display = "none";
      link.textContent = "Baca Selengkapnya";
    }
  }
</script>

    <div class="accordion-item" click="toggleAccordion(this)">
      <div class="accordion-header">
       <br><span><a href="bagan.php" style="color: white;">Struktur Desa</a></span>
        <span class="arrow"></span>
      </div>
      <div class="accordion-content">
      </div>
    </div>
    <div class="accordion-item" click="toggleAccordion(this)">
      <div class="accordion-header">
       <br><span><a href="infografis.php" style="color: white;">Infrografis Penduduk</a></span>
        <span class="arrow"></span>
      </div>
      <div class="accordion-content">
      </div>
    </div>

    <div class="accordion-item" onclick="toggleAccordion(this)">
      <div class="accordion-header">
       <br> <span>Sejarah Desa</span>
        <span class="arrow">&#9660;</span>
      </div>
      <div class="accordion-content">
        <p>Desa Bogorejo adalah sebuah desa yang terletak di Kecamatan Gedong Tataan, Kabupaten Pesawaran, Provinsi Lampung. 
            <br>Awalnya Desa Bogorejo adalah sebuah wilayah kedusunan dari Desa Gedong Tataan. Dusun Bogorejo di setujui untuk menjadi desa persiapan dengan dasar Surat Keputusan Gubernur Lampung Nomor :
G/082/B.III/HK/1987, tertanggal 26 Maret 1987.
Dan pada Tanggal 12 Juli 1991 Desa Persiapan Bogorejo di resmikan menjadi Desa Definitive
Bogorejo melalui Surat
Keputusan Gubernur Lampung Nomor: G/272/B.III/HK/1991 Desa Persiapan Bogorejo</p>
      </div>
    </div>

  </div>
  <script>
    function toggleAccordion(element) {
      element.classList.toggle("active");
    }
  </script>

</div>
</div>
</section>
</body>
</html>
     

<section id="jadwal">
  <div class="container">
    <div class="section-header">
      <br>
      <h2 class="section-title text-center wow fadeInDown">Waktu Pelayanan</h2>
    </div>

    <div class="row" style="background: linear-gradient(135deg, #f0f4f8, #d9e6f2); padding: 20px 10px; border-radius: 8px;">
      <!-- Kolom Gambar -->
      <div class="col-sm-6 wow fadeInLeft">
        <img class="img-responsive" src="main/img/attendance.png" alt="" style="max-width: 100%; height: auto;">
      </div>

      <!-- Kolom Jadwal -->
      <div class="col-sm-6">
        <div class="media service-box wow fadeInRight">
          <div class="pull-left">
            <img src="main/img/clock.png" alt="">
          </div>
          <div class="media-body">
            <h4 class="media-heading">SENIN - KAMIS</h4>
            <p>07.00 - 14.00 WIB</p>
          </div>
        </div>

        <div class="media service-box wow fadeInRight">
          <div class="pull-left">
            <img src="main/img/clock.png" alt="">
          </div>
          <div class="media-body">
            <h4 class="media-heading">JUM'AT</h4>
            <p>07.00 - 11.00 WIB</p>
          </div>
        </div>

        <div class="media service-box wow fadeInRight">
          <div class="pull-left">
            <img src="main/img/clock.png" alt="">
          </div>
          <div class="media-body">
            <h4 class="media-heading">SABTU - MINGGU</h4>
            <p>LIBUR</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


                </div>
            </div>
        </div>
    </section>


    
    <section id="get-in-touch">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">LOKASI</h2>
                
            </div>
        </div>
    </section>
    <!--/#get-in-touch-->


    <section id="contact">
        <div>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3972.1754414068223!2d105.09469757408509!3d-5.390213453881168!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e40d33e040667cf%3A0xc8d3577e9808fce8!2sBalai%20Desa%20Bogorejo%20Gedung%20Tataan!5e0!3m2!1sid!2sid!4v1745588614460!5m2!1sid!2sid"  width="100%" height="650px" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0" alt="lokasi kelurahan"></iframe>
        </div>
    </section>
    <!--/#bottom-->

    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    &copy; <?php echo date('Y');?> KANTOR DESA BOGOREJO KECAMATAN GEDONG TATAAN
                </div>
            </div>
        </div>
    </footer>
    <!--/#footer-->

    <script src="main/js/jquery.js"></script>
    <script src="main/js/bootstrap.min.js"></script>
    <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script src="main/js/owl.carousel.min.js"></script>
    <script src="main/js/mousescroll.js"></script>
    <script src="main/js/smoothscroll.js"></script>
    <script src="main/js/jquery.prettyPhoto.js"></script>
    <script src="main/js/jquery.isotope.min.js"></script>
    <script src="main/js/jquery.inview.min.js"></script>
    <script src="main/js/wow.min.js"></script>
    <script src="main/js/main.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Swal -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.15.2/dist/sweetalert2.all.min.js"></script>
	<!-- Optional: include a polyfill for ES6 Promises for IE11 -->
	<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
</body>

</html>