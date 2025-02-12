<?php
include 'koneksi.php';

// Query untuk mendapatkan agregat data pembayaran
$query = "SELECT 
            SUM(jumlah) AS total_payment, 
            AVG(jumlah) AS average_payment, 
            MAX(jumlah) AS highest_payment, 
            MIN(jumlah) AS lowest_payment 
          FROM pembayaran_spp";

$result = $conn->query($query);
$row = $result->fetch_assoc();

$total = number_format($row['total_payment'], 2);
$average = number_format($row['average_payment'], 2);
$max = number_format($row['highest_payment'], 2);
$min = number_format($row['lowest_payment'], 2);

$conn->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistik Pembayaran SPP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-info d-flex align-items-center vh-100 text-center">
    <div class="container">
        <h2 class="mb-4 fw-bold text-light">Statistik Pembayaran SPP</h2>
        <div class="card shadow-lg p-3 mb-5 bg-white rounded">
            <div class="card-body">
                <p><strong>Total Pembayaran:</strong> Rp <?= $total; ?></p>
                <p><strong>Rata-rata Pembayaran:</strong> Rp <?= $average; ?></p>
                <p><strong>Pembayaran Tertinggi:</strong> Rp <?= $max; ?></p>
                <p><strong>Pembayaran Terendah:</strong> Rp <?= $min; ?></p>
            </div>
        </div>
        <a href="data.php" class="btn btn-light mt-2">Kembali</a>
    </div>
</body>
</html>
