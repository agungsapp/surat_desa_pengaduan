<?php
include 'config.php';

$id = $_GET['id'] ?? 0;
$pengaduan = $conn->prepare("SELECT * FROM pengaduan WHERE id = ?");
$pengaduan->execute([$id]);
$pengaduan = $pengaduan->fetch();

if (!$pengaduan) {
    header('Location: pengaduan.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $status = $_POST['status'];
    $tanggapan = $_POST['tanggapan'];

    try {
        $stmt = $conn->prepare("UPDATE pengaduan SET status = ?, tanggapan = ?, tanggal_ditanggapi = NOW() WHERE id = ?");
        $stmt->execute([$status, $tanggapan, $id]);

        $success = "Pengaduan berhasil diperbarui";
        $pengaduan['status'] = $status;
        $pengaduan['tanggapan'] = $tanggapan;

        // Integrasi WhatsApp dengan Fonnte
        if (!empty($pengaduan['no_hp'])) {
            $tokenFonnte = "9iTL39SE56ApsTXJ9cpr"; // Ganti dengan token API dari Fonnte
            $nomorTujuan = $pengaduan['no_hp']; // Nomor HP warga
            $pesan = "Pengaduan Anda: " . htmlspecialchars($pengaduan['judul']) . "\nStatus: " . $status . "\nTanggapan: " . $tanggapan;

            // Format nomor HP ke format internasional (hapus "0" di awal, tambah kode negara)
            $nomorTujuan = preg_replace('/^0/', '62', $nomorTujuan);

            $curl = curl_init();
            $data = [
                'target' => $nomorTujuan,
                'message' => $pesan,
            ];

            curl_setopt($curl, CURLOPT_HTTPHEADER, [
                "Authorization: $tokenFonnte"
            ]);
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
            curl_setopt($curl, CURLOPT_URL, "https://api.fonnte.com/send");
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

            $result = curl_exec($curl);
            $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
            curl_close($curl);

            // Cek status pengiriman
            if ($httpCode == 200) {
                $success .= " | Notifikasi WhatsApp berhasil dikirim ke $nomorTujuan";
            } else {
                $error = "Gagal mengirim notifikasi WhatsApp: " . $result;
            }
        } else {
            $error = "Nomor HP tidak tersedia untuk pengiriman notifikasi WhatsApp.";
        }
    } catch (PDOException $e) {
        $error = "Gagal memperbarui pengaduan: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pengaduan</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        :root {
            --primary: #4361ee;
            --primary-dark: #3a56d4;
            --secondary: #3f37c9;
            --success: #4cc9f0;
            --danger: #f72585;
            --warning: #f8961e;
            --info: #4895ef;
            --light: #f8f9fa;
            --dark: #212529;
            --gray: #6c757d;
            --light-gray: #e9ecef;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5f7fa;
            color: var(--dark);
            line-height: 1.6;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            padding: 1.5rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .header h2 {
            font-weight: 600;
            font-size: 1.5rem;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .logout-btn {
            color: white;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s;
            padding: 0.5rem 1rem;
            border-radius: 6px;
        }

        .logout-btn:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }

        .nav {
            background-color: white;
            padding: 1rem 2rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            margin-bottom: 1.5rem;
        }

        .back-link {
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            padding: 2rem;
            margin-bottom: 2rem;
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid var(--light-gray);
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--dark);
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .card-title i {
            color: var(--primary);
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .info-item {
            margin-bottom: 1rem;
        }

        .info-label {
            font-weight: 500;
            color: var(--gray);
            font-size: 0.875rem;
            margin-bottom: 0.25rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .info-value {
            font-weight: 500;
            color: var(--dark);
            font-size: 1rem;
        }

        .status {
            display: inline-flex;
            align-items: center;
            padding: 0.5rem 1rem;
            border-radius: 50px;
            font-size: 0.875rem;
            font-weight: 600;
            gap: 0.5rem;
        }

        .status-new {
            background-color: rgba(231, 76, 60, 0.1);
            color: var(--danger);
        }

        .status-process {
            background-color: rgba(248, 150, 30, 0.1);
            color: var(--warning);
        }

        .status-completed {
            background-color: rgba(46, 204, 113, 0.1);
            color: var(--success);
        }

        .status-rejected {
            background-color: rgba(108, 117, 125, 0.1);
            color: var(--gray);
        }

        .content-box {
            background-color: var(--light);
            border-radius: 8px;
            padding: 1.5rem;
            margin-top: 1rem;
        }

        .bukti-container {
            margin-top: 1.5rem;
        }

        .bukti-img {
            max-width: 100%;
            max-height: 400px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            margin-top: 1rem;
            display: block;
        }

        .file-download {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1.25rem;
            background-color: var(--light);
            border-radius: 8px;
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
            margin-top: 1rem;
            transition: all 0.3s;
        }

        .file-download:hover {
            background-color: rgba(67, 97, 238, 0.1);
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: var(--dark);
        }

        .form-control {
            width: 100%;
            padding: 0.875rem 1rem;
            font-size: 1rem;
            border: 1px solid #ddd;
            border-radius: 8px;
            transition: all 0.3s ease;
            font-family: 'Poppins', sans-serif;
        }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.2);
            outline: none;
        }

        textarea.form-control {
            min-height: 150px;
            resize: vertical;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            background-color: var(--primary);
            color: white;
            padding: 0.875rem 1.75rem;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
        }

        .btn:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(67, 97, 238, 0.2);
        }

        .btn-outline {
            background-color: transparent;
            border: 1px solid var(--primary);
            color: var(--primary);
        }

        .btn-outline:hover {
            background-color: rgba(67, 97, 238, 0.1);
        }

        .alert {
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .alert-success {
            background-color: rgba(76, 201, 240, 0.1);
            border-left: 4px solid var(--success);
            color: #0e7490;
        }

        .alert-danger {
            background-color: rgba(247, 37, 133, 0.1);
            border-left: 4px solid var(--danger);
            color: #be123c;
        }

        .action-buttons {
            display: flex;
            gap: 1rem;
            margin-top: 1.5rem;
        }

        @media (max-width: 768px) {
            .container {
                padding: 1rem;
            }

            .header {
                padding: 1rem;
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }

            .info-grid {
                grid-template-columns: 1fr;
            }

            .action-buttons {
                flex-direction: column;
            }

            .btn {
                width: 100%;
                justify-content: center;
            }
        }
    </style>
</head>

<body>
    <div class="header">
        <h2><i class="fas fa-clipboard-list"></i> Detail Pengaduan</h2>

    </div>

    <div class="nav">
        <a href="pengaduan.php" class="back-link">
            <i class="fas fa-arrow-left"></i> Kembali ke Daftar Pengaduan
        </a>
    </div>

    <div class="container">
        <?php if (isset($success)): ?>
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i> <?= $success ?>
            </div>
        <?php elseif (isset($error)): ?>
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-circle"></i> <?= $error ?>
            </div>
        <?php endif; ?>



        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-info-circle"></i> Informasi Pengaduan
                </h3>
                <div class="status <?php
                                    if ($pengaduan['status'] == 'Belum Diproses') echo 'status-new';
                                    elseif ($pengaduan['status'] == 'Sedang Diproses') echo 'status-process';
                                    elseif ($pengaduan['status'] == 'Selesai') echo 'status-completed';
                                    elseif ($pengaduan['status'] == 'Ditolak') echo 'status-rejected';
                                    ?>">
                    <?php
                    if ($pengaduan['status'] == 'Belum Diproses') echo '<i class="fas fa-clock"></i>';
                    elseif ($pengaduan['status'] == 'Sedang Diproses') echo '<i class="fas fa-spinner"></i>';
                    elseif ($pengaduan['status'] == 'Selesai') echo '<i class="fas fa-check-circle"></i>';
                    elseif ($pengaduan['status'] == 'Ditolak') echo '<i class="fas fa-times-circle"></i>';
                    ?>
                    <?= $pengaduan['status'] ?>
                </div>
            </div>

            <div class="info-grid">
                <div class="info-item">
                    <div class="info-label">
                        <i class="far fa-calendar-alt"></i> Tanggal
                    </div>
                    <div class="info-value">
                        <?= date('d M Y H:i', strtotime($pengaduan['tanggal_dibuat'])) ?>
                    </div>
                </div>

                <div class="info-item">
                    <div class="info-label">
                        <i class="far fa-user"></i> Pelapor
                    </div>
                    <div class="info-value">
                        <?= !empty($pengaduan['nama']) ? htmlspecialchars($pengaduan['nama']) : 'Anonim' ?>
                    </div>
                </div>


                <div class="info-item">
                    <div class="info-label">
                        <i class="fas fa-phone"></i> No. HP
                    </div>
                    <div class="info-value">
                        <?= !empty($pengaduan['no_hp']) ? htmlspecialchars($pengaduan['no_hp']) : '-' ?>
                    </div>
                </div>

                <div class="info-item">
                    <div class="info-label">
                        <i class="fas fa-tag"></i> Kategori
                    </div>
                    <div class="info-value">
                        <?= !empty($pengaduan['kategori']) ? htmlspecialchars($pengaduan['kategori']) : '-' ?>
                    </div>
                </div>
            </div>

            <div class="info-item">
                <div class="info-label">
                    <i class="far fa-comment-alt"></i> Judul Pengaduan
                </div>
                <div class="info-value" style="font-size: 1.125rem;">
                    <?= htmlspecialchars($pengaduan['judul']) ?>
                </div>
            </div>

            <div class="info-item">
                <div class="info-label">
                    <i class="far fa-file-alt"></i> Isi Pengaduan
                </div>
                <div class="content-box">
                    <?= nl2br(htmlspecialchars($pengaduan['isi'])) ?>
                </div>
            </div>

            <?php if (!empty($pengaduan['bukti'])): ?>
                <div class="info-item bukti-container">
                    <div class="info-label">
                        <i class="far fa-image"></i> Bukti Pendukung
                    </div>
                    <?php
                    $ext = pathinfo($pengaduan['bukti'], PATHINFO_EXTENSION);
                    if (in_array($ext, ['jpg', 'jpeg', 'png', 'gif'])): ?>
                        <img src="../<?= $pengaduan['bukti'] ?>" alt="Bukti Pengaduan" class="bukti-img">
                    <?php else: ?>
                        <a href="../<?= $pengaduan['bukti'] ?>" target="_blank" class="file-download">
                            <i class="fas fa-download"></i> Download File
                        </a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-edit"></i> Tanggapan Admin
                </h3>
            </div>

            <form method="post">
                <div class="form-group">
                    <label for="status" class="form-label">Status</label>
                    <select id="status" name="status" class="form-control">
                        <option value="Belum Diproses" <?= $pengaduan['status'] == 'Belum Diproses' ? 'selected' : '' ?>>Belum Diproses</option>
                        <option value="Sedang Diproses" <?= $pengaduan['status'] == 'Sedang Diproses' ? 'selected' : '' ?>>Sedang Diproses</option>
                        <option value="Selesai" <?= $pengaduan['status'] == 'Selesai' ? 'selected' : '' ?>>Selesai</option>
                        <option value="Ditolak" <?= $pengaduan['status'] == 'Ditolak' ? 'selected' : '' ?>>Ditolak</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="tanggapan" class="form-label">Tanggapan</label>
                    <textarea id="tanggapan" name="tanggapan" class="form-control" placeholder="Tulis tanggapan Anda..."><?= htmlspecialchars($pengaduan['tanggapan'] ?? '') ?></textarea>
                </div>

                <div class="action-buttons">
                    <button type="submit" class="btn">
                        <i class="fas fa-save"></i> Simpan Perubahan
                    </button>
                    <a href="pengaduan.php" class="btn btn-outline">
                        <i class="fas fa-times"></i> Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>