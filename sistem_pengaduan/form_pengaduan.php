<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pengaduan Masyarakat</title>
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
            --light: #f8f9fa;
            --dark: #212529;
            --gray: #6c757d;
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
            max-width: 800px;
            margin: 0 auto;
            padding: 2rem;
        }
        
        .card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            padding: 2.5rem;
            margin-bottom: 2rem;
        }
        
        .header {
            text-align: center;
            margin-bottom: 2rem;
        }
        
        .header h1 {
            color: var(--primary);
            font-size: 2.2rem;
            margin-bottom: 0.5rem;
        }
        
        .header p {
            color: var(--gray);
            font-size: 1rem;
        }
        
        .form-group {
            margin-bottom: 1.5rem;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: var(--dark);
        }
        
        .form-control {
            width: 100%;
            padding: 0.8rem 1rem;
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
        
        .required {
            color: var(--danger);
            margin-left: 4px;
        }
        
        .btn {
            display: inline-block;
            background-color: var(--primary);
            color: white;
            padding: 0.8rem 1.8rem;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            text-align: center;
            text-decoration: none;
            font-family: 'Poppins', sans-serif;
        }
        
        .btn:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(67, 97, 238, 0.2);
        }
        
        .btn-block {
            display: block;
            width: 100%;
        }
        
        .alert {
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
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
        
        .alert ul {
            padding-left: 1.5rem;
        }
        
        .file-upload {
            position: relative;
            margin-top: 0.5rem;
        }
        
        .file-upload-label {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.5rem;
            border: 2px dashed #ddd;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-align: center;
        }
        
        .file-upload-label:hover {
            border-color: var(--primary);
            background-color: rgba(67, 97, 238, 0.05);
        }
        
        .file-upload-label i {
            font-size: 1.5rem;
            color: var(--primary);
            margin-right: 0.5rem;
        }
        
        .file-upload-input {
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
        }
        
        .file-info {
            margin-top: 0.5rem;
            font-size: 0.875rem;
            color: var(--gray);
        }
        
        .footer {
            text-align: center;
            color: var(--gray);
            font-size: 0.875rem;
            margin-top: 1.5rem;
        }
        
        @media (max-width: 768px) {
            .container {
                padding: 1.5rem;
            }
            
            .card {
                padding: 1.5rem;
            }
            
            .header h1 {
                font-size: 1.8rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1><i class="fas fa-comment-dots"></i> Form Pengaduan</h1>
            <p>Sampaikan keluhan atau masukan Anda kepada kami</p>
        </div>
        
        <div class="card">
            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $nama = $_POST['nama'] ?? '';
                $email = $_POST['email'] ?? '';
                $no_hp = $_POST['no_hp'] ?? '';
                $judul = $_POST['judul'] ?? '';
                $isi = $_POST['isi'] ?? '';
                $kategori = $_POST['kategori'] ?? '';
                
                // Validasi
                $errors = [];
                if (empty($judul)) $errors[] = "Judul pengaduan harus diisi";
                if (empty($isi)) $errors[] = "Isi pengaduan harus diisi";
                
                // Handle file upload
                $bukti = '';
                if (!empty($_FILES['bukti']['name'])) {
                    $allowed = ['jpg', 'jpeg', 'png', 'pdf'];
                    $ext = strtolower(pathinfo($_FILES['bukti']['name'], PATHINFO_EXTENSION));
                    
                    if (!in_array($ext, $allowed)) {
                        $errors[] = "Hanya file JPG, PNG, atau PDF yang diperbolehkan";
                    } elseif ($_FILES['bukti']['size'] > 5000000) {
                        $errors[] = "Ukuran file terlalu besar (maksimal 5MB)";
                    } else {
                        $bukti = 'uploads/' . uniqid() . '.' . $ext;
                        move_uploaded_file($_FILES['bukti']['tmp_name'], $bukti);
                    }
                }
                
                if (empty($errors)) {
                    try {
                        $stmt = $conn->prepare("INSERT INTO pengaduan (nama, email, no_hp, judul, isi, kategori, bukti) 
                                               VALUES (?, ?, ?, ?, ?, ?, ?)");
                        $stmt->execute([$nama, $email, $no_hp, $judul, $isi, $kategori, $bukti]);
                        
                        echo '<div class="alert alert-success">
                                <i class="fas fa-check-circle"></i> Pengaduan berhasil dikirim. Terima kasih atas partisipasi Anda.
                              </div>';
                        // Reset form
                        $nama = $email = $no_hp = $judul = $isi = $kategori = '';
                    } catch(PDOException $e) {
                        echo '<div class="alert alert-danger">
                                <i class="fas fa-exclamation-circle"></i> Terjadi kesalahan: ' . $e->getMessage() . '
                              </div>';
                    }
                } else {
                    echo '<div class="alert alert-danger">
                            <i class="fas fa-exclamation-circle"></i>
                            <ul>';
                    foreach ($errors as $error) {
                        echo "<li>$error</li>";
                    }
                    echo '</ul></div>';
                }
            }
            ?>
            
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" id="nama" name="nama" class="form-control" value="<?= htmlspecialchars($nama ?? '') ?>" placeholder="Nama lengkap Anda">
                </div>
                
                <div class="row" style="display: flex; gap: 1rem;">
                    <div class="form-group" style="flex: 1;">
                        <label for="no_hp">Nomor WhatsApp <span class="required">*</span></label>
                        <input type="tel" id="no_hp" name="no_hp" class="form-control" value="<?= htmlspecialchars($no_hp ?? '') ?>" placeholder="+62">
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="judul">Judul Pengaduan <span class="required">*</span></label>
                    <input type="text" id="judul" name="judul" class="form-control" required value="<?= htmlspecialchars($judul ?? '') ?>" placeholder="Masukkan judul pengaduan">
                </div>
                
                <div class="form-group">
                    <label for="isi">Isi Pengaduan <span class="required">*</span></label>
                    <textarea id="isi" name="isi" class="form-control" required placeholder="Jelaskan pengaduan Anda secara detail"><?= htmlspecialchars($isi ?? '') ?></textarea>
                </div>
                
                <div class="form-group">
                    <label for="kategori">Kategori <small>(opsional)</small></label>
                    <select id="kategori" name="kategori" class="form-control">
                        <option value="">-- Pilih Kategori --</option>
                        <option value="Pelayanan" <?= ($kategori ?? '') == 'Pelayanan' ? 'selected' : '' ?>>Pelayanan Publik</option>
                        <option value="Fasilitas" <?= ($kategori ?? '') == 'Fasilitas' ? 'selected' : '' ?>>Fasilitas Umum</option>
                        <option value="Lingkungan" <?= ($kategori ?? '') == 'Lingkungan' ? 'selected' : '' ?>>Lingkungan</option>
                        <option value="Lainnya" <?= ($kategori ?? '') == 'Lainnya' ? 'selected' : '' ?>>Lainnya</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label>Upload Bukti <small>(opsional)</small></label>
                    <div class="file-upload">
                        <label class="file-upload-label" id="fileLabel">
                            <i class="fas fa-cloud-upload-alt"></i>
                            <span id="fileName">Pilih file atau seret ke sini</span>
                        </label>
                        <input type="file" id="bukti" name="bukti" class="file-upload-input" accept=".jpg,.jpeg,.png,.pdf">
                    </div>
                    <div class="file-info">
                        Format: JPG, PNG, PDF (maksimal 5MB)
                    </div>
                </div>
                
                <div class="form-group">
                    <button type="submit" class="btn btn-block">
                        <i class="fas fa-paper-plane"></i> Kirim Pengaduan
                    </button>
                </div>
            </form>
        </div>
        
        <div class="footer">
            <p>Anda akan menerima pemberitahuan status pengaduan melalui WhatsApp</p>
        </div>
    </div>

    <script>
        // Menampilkan nama file yang dipilih
        document.getElementById('bukti').addEventListener('change', function(e) {
            const fileName = e.target.files[0] ? e.target.files[0].name : 'Pilih file atau seret ke sini';
            document.getElementById('fileName').textContent = fileName;
            
            if (e.target.files[0]) {
                document.getElementById('fileLabel').style.borderColor = '#4361ee';
                document.getElementById('fileLabel').style.backgroundColor = 'rgba(67, 97, 238, 0.05)';
            }
        });
        
        // Drag and drop
        const fileLabel = document.getElementById('fileLabel');
        
        fileLabel.addEventListener('dragover', (e) => {
            e.preventDefault();
            fileLabel.style.borderColor = '#4361ee';
            fileLabel.style.backgroundColor = 'rgba(67, 97, 238, 0.1)';
        });
        
        fileLabel.addEventListener('dragleave', () => {
            fileLabel.style.borderColor = '#ddd';
            fileLabel.style.backgroundColor = 'transparent';
        });
        
        fileLabel.addEventListener('drop', (e) => {
            e.preventDefault();
            document.getElementById('bukti').files = e.dataTransfer.files;
            const fileName = e.dataTransfer.files[0].name;
            document.getElementById('fileName').textContent = fileName;
            fileLabel.style.borderColor = '#4361ee';
            fileLabel.style.backgroundColor = 'rgba(67, 97, 238, 0.05)';
        });
    </script>
</body>
</html>