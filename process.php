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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Agregat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-info d-flex justify-content-center align-items-center vh-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg">
                    <div class="card-body text-center">
                        <h3 class="text-primary fw-bold">Hasil Agregat</h3>
                        <hr>
                        <?php 
                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            echo "<div class='alert alert-primary fs-5'>";
                            if($action == 'sum') {
                                echo "Total Keuangan: <strong>Rp " . number_format($row['total_payment'], 2, ',', '.') . "</strong>"; 
                            } elseif ($action == 'avg') {
                                echo "Total Rata-rata: <strong>Rp " . number_format($row['average_payment'], 2, ',', '.') . "</strong>";
                            } elseif ($action == 'max') {
                                echo "Bayar Terbanyak: <strong>Rp " . number_format($row['highest_payment'], 2, ',', '.') . "</strong>"; 
                            } elseif ($action == 'min') {
                                echo "Bayar Tersedikit: <strong>Rp " . number_format($row['lowest_payment'], 2, ',', '.') . "</strong>";
                            }
                            echo "</div>";
                        } else {
                            echo "<div class='alert alert-danger'>Tidak ada data dalam tabel.</div>";
                        }
                        ?>
                        <a href="perhitungan.php" class="btn btn-primary mt-3">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php $conn->close(); ?>
