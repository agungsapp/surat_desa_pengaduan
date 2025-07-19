
    <?php
// Mulai sesi
session_start();

// Hapus semua variabel sesi
session_unset();

// Hancurkan sesi
session_destroy();

//hapus cookie PHPSESSID 
if (ini_get("session.use_cookies")){
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time()- 42000,
    $params["path"], $params["domain"],
    $params["secure"], $params["httponly"]
);
}

// Alihkan pengguna ke halaman utama
header("Location: ../index.php");
exit();
?>