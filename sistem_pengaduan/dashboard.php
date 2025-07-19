<?php include 'config.php';


// Hitung statistik
$total = $conn->query("SELECT COUNT(*) FROM pengaduan")->fetchColumn();
$belum_diproses = $conn->query("SELECT COUNT(*) FROM pengaduan WHERE status = 'Belum Diproses'")->fetchColumn();
$diproses = $conn->query("SELECT COUNT(*) FROM pengaduan WHERE status = 'Sedang Diproses'")->fetchColumn();
$selesai = $conn->query("SELECT COUNT(*) FROM pengaduan WHERE status = 'Selesai'")->fetchColumn();

// Ambil 5 pengaduan terbaru
$recent = $conn->query("SELECT * FROM pengaduan ORDER BY tanggal_dibuat DESC LIMIT 5")->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; }
        .header { background: #333; color: white; padding: 15px; display: flex; justify-content: space-between; }
        .container { padding: 20px; }
        .stats { display: flex; gap: 15px; margin-bottom: 20px; }
        .stat-card { flex: 1; background: #f5f5f5; padding: 15px; border-radius: 5px; text-align: center; }
        .stat-card h3 { margin-top: 0; }
        .recent-pengaduan { margin-top: 30px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 10px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background: #f2f2f2; }
        .status-baru { color: #e74c3c; font-weight: bold; }
        .status-proses { color: #f39c12; font-weight: bold; }
        .status-selesai { color: #2ecc71; font-weight: bold; }
        .nav { display: flex; gap: 15px; background: #444; padding: 10px; }
        .nav a { color: white; text-decoration: none; }
        .nav a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="header">
        <h2>Halo, Welcome Back</h2>
        <div> 
            <a href="logout.php" style="color: white;">Logout</a>
        </div>
    </div>
    
    <div class="nav">
        <a href="dashboard.php">Dashboard</a>
        <a href="pengaduan.php">Kelola Pengaduan</a>
    </div>
    
    <div class="container">
        <h3>Statistik Pengaduan</h3>
        <div class="stats">
            <div class="stat-card">
                <h3>Total Pengaduan</h3>
                <p><?= $total ?></p>
            </div>
            <div class="stat-card">
                <h3>Belum Diproses</h3>
                <p><?= $belum_diproses ?></p>
            </div>
            <div class="stat-card">
                <h3>Sedang Diproses</h3>
                <p><?= $diproses ?></p>
            </div>
            <div class="stat-card">
                <h3>Selesai</h3>
                <p><?= $selesai ?></p>
            </div>
        </div>
        
        <div class="recent-pengaduan">
            <h3>Pengaduan Terbaru</h3>
            <table>
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Judul</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($recent as $p): ?>
                    <tr>
                        <td><?= date('d/m/Y H:i', strtotime($p['tanggal_dibuat'])) ?></td>
                        <td><?= htmlspecialchars($p['judul']) ?></td>
                        <td>
                            <?php 
                            $status_class = '';
                            if ($p['status'] == 'Belum Diproses') $status_class = 'status-baru';
                            elseif ($p['status'] == 'Sedang Diproses') $status_class = 'status-proses';
                            elseif ($p['status'] == 'Selesai') $status_class = 'status-selesai';
                            ?>
                            <span class="<?= $status_class ?>"><?= $p['status'] ?></span>
                        </td>
                        <td><a href="detail_pengaduan.php?id=<?= $p['id'] ?>">Detail</a></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>