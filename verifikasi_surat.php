<?php
include 'koneksi/konek1.php';

if (!isset($_GET['jenis']) || !isset($_GET['id'])) {
    die("Link tidak valid.");
}

$jenis = $_GET['jenis'];
$id = $_GET['id'];
$data = null;

switch ($jenis) {
    case 'sktm':
        $query = mysqli_query($konek1, "SELECT * FROM data_request_sktm NATURAL JOIN data_user WHERE id_request_sktm = '$id'");
        $data = mysqli_fetch_array($query, MYSQLI_ASSOC);
        $judul = "SURAT KETERANGAN TIDAK";
        $keperluan = $data['keperluan'] ?? '-';
        $no_surat = "145/0{$data['id_request_sktm']}/V.01.17/2025";
        $format3 = date('d F Y', strtotime($data['tanggal_request'] ?? ''));
        $nama_surat = strtoupper($data['nama'] ?? '');
        break;

    case 'skd':
        $query = mysqli_query($konek1, "SELECT * FROM data_request_skd NATURAL JOIN data_user WHERE id_request_skd = '$id'");
        $data = mysqli_fetch_array($query, MYSQLI_ASSOC);
        $judul = "SURAT KETERANGAN DOMISILI";
        $keperluan = "Surat Keterangan Domisili";
        $no_surat = "146/0{$data['id_request_skd']}/V.01.17/2025";
        $format3 = date('d F Y', strtotime($data['tanggal_request'] ?? ''));
        $nama_surat = strtoupper($data['nama'] ?? '');
        break;

    case 'sku':
        $query = mysqli_query($konek1, "SELECT * FROM data_request_sku NATURAL JOIN data_user WHERE id_request_sku = '$id'");
        $data = mysqli_fetch_array($query, MYSQLI_ASSOC);
        $judul = "SURAT KETERANGAN USAHA";
        $keperluan = $data['jenis_usaha'] ?? 'Keterangan Usaha';
        $no_surat = "147/0{$data['id_request_sku']}/V.01.17/2025";
        $format3 = date('d F Y', strtotime($data['tanggal_request'] ?? ''));
        $nama_surat = strtoupper($data['nama'] ?? '');
        break;

    case 'skp':
        $query = mysqli_query($konek1, "SELECT * FROM data_request_skp NATURAL JOIN data_user WHERE id_request_skp = '$id'");
        $data = mysqli_fetch_array($query, MYSQLI_ASSOC);
        $judul = "SURAT IZIN USAHA";
        $keperluan = "surat Izin Usaha";
        $no_surat = "148/0{$data['id_request_skp']}/V.01.17/2025";
        $format3 = date('d F Y', strtotime($data['tanggal_request'] ?? ''));
        $nama_surat = strtoupper($data['nama'] ?? '');
        break;

    default:
        die("Jenis surat tidak dikenali.");
}

if (!$data) {
    echo "<h2 style='text-align:center;color:red;'>❌ Data tidak ditemukan atau surat tidak valid.</h2>";
    exit;
}
?>


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Surat Digital</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary: #4361ee;
            --secondary: #3f37c9;
            --accent: #4895ef;
            --dark: #212529;
            --light: #f8f9fa;
            --success: #4cc9f0;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #e4e8f0 100%);
            min-height: 100vh;
            padding: 2rem;
            color: var(--dark);
            line-height: 1.6;
        }
        
        .container {
            background: white;
            max-width: 680px;
            margin: 2rem auto;
            padding: 2.5rem;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            position: relative;
            overflow: hidden;
        }
        
        .container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 8px;
            background: linear-gradient(90deg, var(--primary), var(--accent));
        }
        
        .header {
            text-align: center;
            margin-bottom: 2rem;
            position: relative;
        }
        
        .logo {
            width: 100px;
            height: auto;
            margin-bottom: 1rem;
            filter: drop-shadow(0 2px 4px rgba(0,0,0,0.1));
        }
        
        .badge {
            display: inline-block;
            background: var(--success);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 600;
            margin-top: 1rem;
            box-shadow: 0 4px 6px rgba(76, 201, 240, 0.3);
        }
        
        .document-card {
            border: 1px solid rgba(0,0,0,0.05);
            border-radius: 12px;
            padding: 2rem;
            margin-bottom: 2rem;
            background: #f9fafc;
            position: relative;
        }
        
        .document-card::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, var(--primary), var(--accent));
            border-bottom-left-radius: 12px;
            border-bottom-right-radius: 12px;
        }
        
        .document-title {
            color: var(--primary);
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            text-align: center;
            position: relative;
        }
        
        .document-title::after {
            content: '';
            display: block;
            width: 60px;
            height: 3px;
            background: var(--accent);
            margin: 0.5rem auto;
            border-radius: 3px;
        }
        
        .info-item {
            margin-bottom: 1.2rem;
            display: flex;
            align-items: flex-start;
        }
        
        .info-icon {
            color: var(--accent);
            margin-right: 1rem;
            font-size: 1.1rem;
            margin-top: 0.2rem;
        }
        
        .info-content {
            flex: 1;
        }
        
        .info-label {
            font-weight: 600;
            color: var(--dark);
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 0.3rem;
        }
        
        .info-value {
            font-size: 1.1rem;
            color: #555;
            padding-left: 0.5rem;
            border-left: 3px solid var(--accent);
        }
        
        .signature {
            margin-top: 2rem;
            padding-top: 1.5rem;
            border-top: 1px dashed #ddd;
            text-align: right;
        }
        
        .signature-name {
            font-weight: 700;
            font-size: 1.2rem;
            color: var(--primary);
            margin-top: 0.5rem;
        }
        
        .signature-title {
            font-size: 0.9rem;
            color: #666;
        }
        
        .qr-code {
            margin-top: 2rem;
            text-align: center;
        }
        
        .actions {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-top: 2rem;
        }
        
        .btn {
            padding: 0.8rem 1.5rem;
            border-radius: 8px;
            font-weight: 600;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .btn-primary {
            background: var(--primary);
            color: white;
        }
        
        .btn-outline {
            background: transparent;
            border: 2px solid var(--primary);
            color: var(--primary);
        }
        
        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        @media print {
            body {
                background: none;
                padding: 0;
            }
            .container {
                box-shadow: none;
                max-width: 100%;
            }
            .actions {
                display: none;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <img src="img/logopes.png" alt="Logo Desa" class="logo">
        <h2>Verifikasi Surat Digital</h2>
        <div class="badge">
            <i class="fas fa-check-circle"></i> Dokumen Sah dan Terverifikasi
        </div>
        <p style="color: #666; margin-top: 0.5rem;">Pemerintah Kabupaten Pesawaran • Kecamatan Gedong Tataan • Desa Bogorejo</p>
    </div>

    <div class="document-card">
        <h3 class="document-title"><?= $judul ?></h3>
        
        <div class="info-item">
            <div class="info-icon">
                <i class="fas fa-hashtag"></i>
            </div>
            <div class="info-content">
                <div class="info-label">Nomor Surat</div>
                <div class="info-value"><?= $no_surat ?></div>
            </div>
        </div>
        
        <div class="info-item">
            <div class="info-icon">
                <i class="far fa-calendar-alt"></i>
            </div>
            <div class="info-content">
                <div class="info-label">Tanggal Surat</div>
                <div class="info-value"><?= $format3 ?></div>
            </div>
        </div>
        
        <div class="info-item">
            <div class="info-icon">
                <i class="fas fa-clipboard-check"></i>
            </div>
            <div class="info-content">
                <div class="info-label">Perihal</div>
                <div class="info-value"><?= ucwords(strtolower($keperluan)) ?></div>
            </div>
        </div>
        
        <div class="info-item">
            <div class="info-icon">
                <i class="fas fa-user"></i>
            </div>
            <div class="info-content">
                <div class="info-label">Nama Pemohon</div>
                <div class="info-value"><?= $nama_surat ?></div>
            </div>
        </div>
        
        <div class="signature">
            <div class="signature-title">Divalidasi oleh:</div>
            <div class="signature-name">HERMANSYAH</div>
            <div class="signature-title">Kepala Desa Bogorejo</div>
        </div>
    </div>
</div>

</body>
</html>