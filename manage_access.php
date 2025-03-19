<?php
include 'koneksi.php'; 

$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi ke MySQL
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Jika tombol submit ditekan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST["username"];
    $action = $_POST["action"];
    $privilege = $_POST["privilege"];

    // Cek apakah user sudah ada di MySQL
    $sql_check = "SELECT User FROM mysql.user WHERE User = '$user'";
    $result = $conn->query($sql_check);

    if ($result->num_rows == 0) {
        echo "Error: User '$user' tidak ditemukan di MySQL.";
    } else {
        // Jika user ada, jalankan perintah GRANT atau REVOKE
        if ($action == "grant") {
            $sql = "GRANT $privilege ON user_management.* TO '$user'@'localhost'";
        } elseif ($action == "revoke") {
            $sql = "REVOKE $privilege ON user_management.* FROM '$user'@'localhost'";
        }

        if ($conn->query($sql) === TRUE) {
            echo "Akses berhasil diperbarui untuk $user";
        } else {
            echo "Error: " . $conn->error;
        }
    }
}

$conn->close();
?>
