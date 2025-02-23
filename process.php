<?php 
    include 'koneksi.php'; 

    $action = $_POST['jumlah'];
    $sql = "";

    switch ($action) {
        case 'sum' :
            $sql = "SELECT SUM(jumlah) AS total_payment FROM pembayaran_spp";
            break;
        case 'avg' : 
            $sql = "SELECT AVG(jumlah) AS average_payment FROM pembayaran_spp";
            break;
        case 'max' :
            $sql = "SELECT MAX(jumlah) AS highest_payment FROM pembayaran_spp";
            break;
        case 'min' : 
            $sql = "SELECT MIN(jumlah) AS lowest_payment FROM pembayaran_spp";
            break;
        default:
            die("Pilihan tidak valid.");
    }

    $result = $conn->query($sql);

    if ($result->num_rows > 0){
        $row = $result->fetch_assoc();
        echo "<h3>Hasil Agregat</h3>";

        if($action == 'sum') {
            echo "Total keuangan : " . number_format($row['total_payment'], 2); 
        } elseif ($action == 'avg') {
            echo "Total rata-rata : " . number_format($row['average_payment'], 2);
        } elseif ($action == 'max') {
            echo "Bayar terbanyak : " . number_format($row['highest_payment'], 2); 
        } elseif ($action == 'min') {
            echo "Bayar Tersedikit: " . number_format($row['lowest_payment'], 2);
        }
    } else {
        echo "Tidak ada data dalam tabel.";
    }
    
$conn->close();
?>