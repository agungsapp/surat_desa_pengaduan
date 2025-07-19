<?php
// Jangan mulai session lagi, karena sudah dimulai di main.php
if (empty($_SESSION['nik'])) {
    die("Akses ditolak");
}

$hak_akses = $_SESSION['hak_akses'];
$nama = $_SESSION['nama'];
$nik = $_SESSION['nik'];
$timeout = 600; // 10 menit = 600 detik
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > $timeout) {
    session_unset();  // hapus semua session
    session_destroy(); // hancurkan session
    header("Location: /logout.php"); // arahkan ke logout
    exit();
}
$_SESSION['last_activity'] = time(); // update waktu aktivitas terakhir

include '../koneksi/konek1.php';
switch ($hak_akses) {
    case "Pemohon":  // Gunakan titik dua, bukan titik koma
?>
        <!-- TAMPILAN UNTUK PEMOHON -->
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Halo <?php echo $nama; ?>!</h2>
                        <h5 class="text-white op-7 mb-2">Sebelum Anda Request Surat Keterangan Lengkapi Biodata Anda, Klik Biodata Anda</h5>
                    </div>
                    <div class="ml-md-auto py-2 py-md-0">
                        <a href="?halaman=tampil_pemohon" class="btn btn-sm btn-primary btn-round">
                            <i class="fas fa-user"></i> Biodata Anda</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-inner mt--5">
            <div class="row mt--2">
                <?php
                $surat = [
                    ["Surat Keterangan Tidak Mampu", "primary", "request_sktm"],
                    ["Surat Keterangan Usaha", "success", "request_sku"],
                    ["Surat Izin Usaha", "warning", "request_skp"],
                    ["Surat Keterangan Domisili", "secondary", "request_skd"]
                ];
                foreach ($surat as $s) {
                ?>
                    <div class="col-md-3 pr-md-0">
                        <div class="card-pricing2 card-<?php echo $s[1]; ?>">
                            <div class="pricing-header">
                                <h4 class="fw-bold text-center text-uppercase mb-3"><?php echo $s[0]; ?></h4>
                            </div>
                            <div class="price-value">
                                <div class="value">
                                    <span class="amount"><i class="flaticon-envelope-1 fa-3x"></i></span>
                                </div>
                            </div>
                            <div class="pricing-footer text-center mt-3">
                                <a href="?halaman=<?php echo $s[2]; ?>" class="btn btn-<?php echo $s[1]; ?> btn-lg btn-round py-3 px-4">
                                    <i class="fas fa-plus-circle mr-2"></i> REQUEST
                                </a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    <?php
        break;

    case "Staf":
    ?>
        <!-- TAMPILAN UNTUK STAF -->
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Halo <?php echo $hak_akses; ?>!</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-inner">
            <h3 class="fw-bold text-uppercase">JUMLAH REQUEST SURAT KETERANGAN SUDAH ACC</h3>
            <div class="row">
                <?php
                $jenis_surat = [
                    ["SKTM", "data_request_sktm", "primary", "sudah_acc_sktm"],
                    ["SKU", "data_request_sku", "success", "sudah_acc_sku"],
                    ["SKP", "data_request_skp", "warning", "sudah_acc_skp"],
                    ["SKD", "data_request_skd", "secondary", "sudah_acc_skd"]
                ];
                foreach ($jenis_surat as $js) {
                    $sql = "SELECT * FROM $js[1] WHERE status=1";
                    $query = mysqli_query($konek1, $sql);
                    $count = mysqli_num_rows($query);
                ?>
                    <div class="col-sm-6 col-md-3">
                        <div class="card card-stats card-round">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <a href="?halaman=<?php echo $js[3]; ?>">
                                        <div class="col-icon">
                                            <div class="icon-big text-center icon-<?php echo $js[2]; ?> bubble-shadow-small">
                                                <i class="flaticon-envelope-1"></i>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="col col-stats ml-3 ml-sm-0">
                                        <div class="numbers">
                                            <p class="card-category"><?php echo $js[0]; ?></p>
                                            <h4 class="card-title"><?php echo $count; ?></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>

    <?php
        break;

    case "Lurah":
    ?>
        <!-- TAMPILAN UNTUK LURAH -->
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Halo <?php echo $hak_akses; ?>!</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-inner">
            <h4 class="page-title">TAMPIL REQUEST SURAT KETERANGAN</h4>
            <div class="row">
                <?php
                $jenis_surat = [
                    ["SKTM", "data_request_sktm", "primary", "belum_acc_sktm"],
                    ["SKU", "data_request_sku", "success", "belum_acc_sku"],
                    ["SKP", "data_request_skp", "warning", "belum_acc_skp"],
                    ["SKD", "data_request_skd", "secondary", "belum_acc_skd"]
                ];
                foreach ($jenis_surat as $js) {
                    $sql = "SELECT * FROM $js[1] WHERE status=0";
                    $query = mysqli_query($konek1, $sql);
                    $count = mysqli_num_rows($query);
                ?>
                    <div class="col-sm-6 col-md-3">
                        <div class="card card-stats card-round">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <a href="?halaman=<?php echo $js[3]; ?>">
                                        <div class="col-icon">
                                            <div class="icon-big text-center icon-<?php echo $js[2]; ?> bubble-shadow-small">
                                                <i class="flaticon-envelope-1"></i>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="col col-stats ml-3 ml-sm-0">
                                        <div class="numbers">
                                            <p class="card-category"><?php echo $js[0]; ?></p>
                                            <h4 class="card-title"><?php echo $count; ?></h4>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    // ... kode PHP Anda yang sudah ada ...

                    switch ($hak_akses) {
                        case "Pemohon":
                            // ... kode untuk Pemohon ...
                            break;
                        case "Staf":
                            // ... kode untuk Staf ...
                            break;
                        case "Lurah":
                            // ... kode untuk Lurah ...
                            break;
                    } // akhir dari switch case

                    // Tambahkan script JavaScript di sini, sebelum penutup 
                    ?>
                    ?>

                    <script>
                        // Auto logout setelah 10 menit tidak ada aktivitas
                        let idleTime = 0;
                        const timeoutMinutes = 1; // Ubah sesuai kebutuhan
                        const logoutUrl = "../logout.php";

                        function resetIdleTime() {
                            idleTime = 0;
                        }

                        function checkIdleTime() {
                            idleTime++;
                            if (idleTime >= timeoutMinutes) {
                                window.location.href = logoutUrl;
                            }
                        }

                        // Cek setiap menit
                        setInterval(checkIdleTime, 60000);

                        // Deteksi berbagai aktivitas
                        ['mousemove', 'keypress', 'click', 'scroll', 'touchstart'].forEach(
                            event => document.addEventListener(event, resetIdleTime)
                        );

                        // Reset saat page load
                        window.addEventListener('load', resetIdleTime);
                    </script>
                <?php } ?>
            </div>
        </div>
<?php
        break;
}
?>