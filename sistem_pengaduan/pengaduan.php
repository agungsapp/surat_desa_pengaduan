<?php
include 'config.php';

// Filter status
$status = $_GET['status'] ?? '';
$where = '';
if (in_array($status, ['Belum Diproses', 'Sedang Diproses', 'Selesai', 'Ditolak'])) {
    $where = "WHERE status = '$status'";
}

// Ambil data pengaduan
$query = "SELECT * FROM pengaduan $where ORDER BY tanggal_dibuat DESC";
$pengaduan = $conn->query($query)->fetchAll();
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Pengaduan</title>
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
            max-width: 1200px;
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

        .user-info i {
            font-size: 1.2rem;
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

        .nav-links {
            display: flex;
            gap: 1.5rem;
        }

        .nav-link {
            color: var(--gray);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s;
            padding: 0.5rem 0;
            position: relative;
        }

        .nav-link:hover {
            color: var(--primary);
        }

        .nav-link.active {
            color: var(--primary);
        }

        .nav-link.active::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background-color: var(--primary);
            border-radius: 3px 3px 0 0;
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
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--dark);
        }

        .filter-buttons {
            display: flex;
            gap: 0.75rem;
            flex-wrap: wrap;
        }

        .filter-btn {
            padding: 0.5rem 1rem;
            border-radius: 6px;
            background-color: var(--light-gray);
            color: var(--gray);
            text-decoration: none;
            font-size: 0.875rem;
            font-weight: 500;
            transition: all 0.3s;
            border: none;
            cursor: pointer;
        }

        .filter-btn:hover {
            background-color: #dee2e6;
        }

        .filter-btn.active {
            background-color: var(--primary);
            color: white;
        }

        .table-responsive {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            min-width: 800px;
        }

        thead th {
            background-color: var(--light);
            color: var(--gray);
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.5px;
            padding: 1rem;
            text-align: left;
            position: sticky;
            top: 0;
        }

        tbody tr {
            transition: all 0.3s;
        }

        tbody tr:hover {
            background-color: rgba(67, 97, 238, 0.05);
        }

        tbody td {
            padding: 1rem;
            border-bottom: 1px solid var(--light-gray);
            vertical-align: top;
        }

        .status {
            display: inline-flex;
            align-items: center;
            padding: 0.25rem 0.75rem;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 600;
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

        .action-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            background-color: var(--primary);
            color: white;
            border-radius: 6px;
            text-decoration: none;
            font-size: 0.875rem;
            font-weight: 500;
            transition: all 0.3s;
        }

        .action-btn:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(67, 97, 238, 0.2);
        }

        .badge {
            display: inline-block;
            padding: 0.25rem 0.5rem;
            font-size: 0.75rem;
            border-radius: 4px;
            background-color: var(--light-gray);
            color: var(--gray);
            margin-right: 0.5rem;
            margin-bottom: 0.5rem;
        }

        .empty-state {
            text-align: center;
            padding: 3rem;
            color: var(--gray);
        }

        .empty-state i {
            font-size: 3rem;
            margin-bottom: 1rem;
            color: var(--light-gray);
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

            .filter-buttons {
                justify-content: center;
            }

            .card {
                padding: 1.5rem;
            }
        }
    </style>
</head>

<body>
    <div class="header">
        <h2><i class="fas fa-tasks"></i> Kelola Pengaduan</h2>

    </div>

    <div class="nav">
        <div class="nav-links">
            <a href="../demo1/main2.php" class="nav-link active"><i class="fas fa-arrow-left"></i> Kembali Ke Dashboard</a>
        </div>
    </div>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Daftar Pengaduan</h3>
                <div class="filter-buttons">
                    <a href="pengaduan.php" class="filter-btn <?= empty($status) ? 'active' : '' ?>">Semua</a>
                    <a href="?status=Belum Diproses" class="filter-btn <?= $status == 'Belum Diproses' ? 'active' : '' ?>">Belum Diproses</a>
                    <a href="?status=Sedang Diproses" class="filter-btn <?= $status == 'Sedang Diproses' ? 'active' : '' ?>">Sedang Diproses</a>
                    <a href="?status=Selesai" class="filter-btn <?= $status == 'Selesai' ? 'active' : '' ?>">Selesai</a>
                    <a href="?status=Ditolak" class="filter-btn <?= $status == 'Ditolak' ? 'active' : '' ?>">Ditolak</a>
                </div>
            </div>

            <div class="table-responsive">
                <?php if (count($pengaduan) > 0): ?>
                    <table>
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Judul</th>
                                <th>Pelapor</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($pengaduan as $p): ?>
                                <tr>
                                    <td>
                                        <div><?= date('d M Y', strtotime($p['tanggal_dibuat'])) ?></div>
                                        <small class="text-muted"><?= date('H:i', strtotime($p['tanggal_dibuat'])) ?></small>
                                    </td>
                                    <td>
                                        <strong><?= htmlspecialchars($p['judul']) ?></strong>
                                        <?php if (!empty($p['kategori'])): ?>
                                            <div><span class="badge"><?= htmlspecialchars($p['kategori']) ?></span></div>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <div><strong><?= !empty($p['nama']) ? htmlspecialchars($p['nama']) : 'Anonim' ?></strong></div>
                                        <?php if (!empty($p['no_hp'])): ?>
                                            <small><i class="fas fa-phone"></i> <?= htmlspecialchars($p['no_hp']) ?></small><br>
                                        <?php endif; ?>
                                        <?php if (!empty($p['email'])): ?>
                                            <small><i class="fas fa-envelope"></i> <?= htmlspecialchars($p['email']) ?></small>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php
                                        $status_class = '';
                                        if ($p['status'] == 'Belum Diproses') $status_class = 'status-new';
                                        elseif ($p['status'] == 'Sedang Diproses') $status_class = 'status-process';
                                        elseif ($p['status'] == 'Selesai') $status_class = 'status-completed';
                                        elseif ($p['status'] == 'Ditolak') $status_class = 'status-rejected';
                                        ?>
                                        <span class="status <?= $status_class ?>">
                                            <?php
                                            if ($p['status'] == 'Belum Diproses') echo '<i class="fas fa-clock"></i> ';
                                            elseif ($p['status'] == 'Sedang Diproses') echo '<i class="fas fa-spinner"></i> ';
                                            elseif ($p['status'] == 'Selesai') echo '<i class="fas fa-check-circle"></i> ';
                                            elseif ($p['status'] == 'Ditolak') echo '<i class="fas fa-times-circle"></i> ';
                                            ?>
                                            <?= $p['status'] ?>
                                        </span>
                                    </td>
                                    <td>
                                        <a href="detail_pengaduan.php?id=<?= $p['id'] ?>" class="action-btn">
                                            <i class="fas fa-eye"></i> Detail
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <div class="empty-state">
                        <i class="fas fa-inbox"></i>
                        <h3>Tidak ada pengaduan</h3>
                        <p>Tidak ditemukan pengaduan dengan status ini</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>

</html>