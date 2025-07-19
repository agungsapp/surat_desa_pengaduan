<?php
include 'config.php';

// Hash password admin
$password = password_hash('admin123', PASSWORD_DEFAULT);

try {
    $stmt = $conn->prepare("INSERT INTO admin (username, password, nama_lengkap, email) 
                          VALUES (?, ?, ?, ?)");
    $stmt->execute(['admin', $password, 'Administrator', 'admin@example.com']);
    
    echo "Admin berhasil dibuat:<br>";
    echo "Username: 123<br>";
    echo "Password: admin123<br>";
    echo "<a href='login.php'>Login sekarang</a>";
    
    // Hapus file install.php setelah digunakan untuk keamanan
    unlink(__FILE__);
} catch(PDOException $e) {
    echo "Gagal membuat admin: " . $e->getMessage();
}