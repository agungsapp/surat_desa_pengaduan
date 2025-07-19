<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pengaduan Masyarakat</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            color: #333;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        
        header {
            background-color: #2c3e50;
            color: white;
            padding: 20px 0;
            text-align: center;
        }
        
        .hero {
            background-color: #3498db;
            color: white;
            padding: 50px 20px;
            text-align: center;
            margin-bottom: 30px;
        }
        
        .cta-button {
            display: inline-block;
            background-color: #27ae60;
            color: white;
            padding: 12px 24px;
            text-decoration: none;
            border-radius: 4px;
            font-weight: bold;
            margin-top: 20px;
            transition: background-color 0.3s;
        }
        
        .cta-button:hover {
            background-color: #2ecc71;
        }
        
        .features {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            margin: 40px 0;
        }
        
        .feature {
            flex-basis: 30%;
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        
        footer {
            background-color: #2c3e50;
            color: white;
            text-align: center;
            padding: 20px 0;
            margin-top: 30px;
        }
        
        @media (max-width: 768px) {
            .features {
                flex-direction: column;
            }
            
            .feature {
                flex-basis: 100%;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>Pengaduan Masyarakat</h1>
            <p>Saluran komunikasi antara masyarakat dan pemerintah</p>
        </div>
    </header>
    
    <section class="hero">
        <div class="container">
            <h2>Laporkan Masalah Anda Dengan Mudah</h2>
            <p>Sampaikan keluhan, laporan, atau saran Anda secara online</p>
            <a href="form_pengaduan.php" class="cta-button">Buat Pengaduan Sekarang</a>
        </div>
    </section>
    
        
        <section>
        <div class="feature">
            <h2>Cara Melakukan Pengaduan</h2>
            <ol>
                <li>Isi form pengaduan dengan data yang valid</li>
                <li>Lampirkan bukti pendukung (jika ada)</li>
                <li>Submit pengaduan Anda</li>
                <li>Tim kami akan memverifikasi dan menindaklanjuti</li>
            </ol></div>
        </section>
    </div>
    
    <footer>
        <div class="container">
            <p>&copy; 2025 Pengaduan Masyarakat. Hak Cipta Dilindungi.</p>
            <p>Hubungi kami: kayla | (+62) 82183785338</p>
        </div>
    </footer>
</body>
</html>