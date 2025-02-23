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
        <form action="process.php" method="POST">
            <label for="jumlah">Pilih Agregat:</label>
            <select name="jumlah" id="jumlah">
                <option value="sum">Total Pembayaran:</option>
                <option value="avg">Rata-rata Pembayaran:</option>
                <option value="max">Pembayaran Tertinggi:</option>
                <option value="min">Pembayaran Terendah:</option>
            </select>
            <br><br>
            <input class="btn btn-light mt-2" type="submit" value="Tampilkan">
            <a href="data.php" class="btn btn-light mt-2">Kembali</a>
        </form>
    </div>
</body>
</html>
